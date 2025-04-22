<?php
session_start();
require 'connect.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT user_type FROM userinfo WHERE user_id = ?"); 
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user || $user['user_type'] !== 'landlord') { 
    header("Location: login.php");
    exit();
}

$landlord_id = $_SESSION['user_id'];
$query = "SELECT a.id, p.location, t.fullName, a.message, a.status, a.application_date
          FROM applications a
          JOIN properties p ON a.property_id = p.property_id
          JOIN userinfo t ON a.tenant_id = t.user_id
          WHERE a.landlord_id = ?
          ORDER BY a.application_date DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $landlord_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Applications</title>
    <link rel="stylesheet" href="styling/headerAndFooter.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .application {
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px auto;
            max-width: 800px;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .pending { color: orange; font-weight: bold; }
        .approved { color: green; font-weight: bold; }
        .rejected { color: red; font-weight: bold; }
        .action-buttons { margin-top: 10px; }
        button {
            padding: 8px 15px;
            margin-right: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .approve-btn { background: #4CAF50; color: white; }
        .reject-btn { background: #f44336; color: white; }
        h1 { text-align: center; margin: 20px 0; }
    </style>
</head>
<body>

<header>
    <div class="logoWrapper">
        <a href="index.php" id="logo">
            <img src="images/landlordProLogo.png" alt="LandlordPro Logo" height="60" width="60">
        </a>
        <div class="logoText">
            <p>LandlordPro Properties</p>
            <p id="slogan">Your Comfort, Our Priority</p>
        </div>
    </div>
    <div>
        <input class="searchBar" placeholder="Search &#x1F50E;" aria-label="Search properties">
    </div>
</header>

<nav class="navBar">
    <ul>
        <li><a href="landlord_applications.php" style="color:#4CAF50;font-weight:bold;">VIEW APPLICATIONS |</a></li>
        <li><a href="logout.php">LOG OUT |</a></li>
        <li><a href="properties.php">PROPERTIES |</a></li>
        <li><a href="contactUs.php">CONTACT US |</a></li>
        <li><a href="faqGuidlines.php">FAQ GUIDELINES</a></li>
    </ul>
</nav>

<main>
    <h1>Tenant Applications</h1>
    
    <?php if ($result->num_rows === 0): ?>
        <p style="text-align: center;">No applications found.</p>
    <?php else: ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="application">
                <h3>Property: <?= htmlspecialchars($row['location']) ?></h3>
                <p><strong>Applicant:</strong> <?= htmlspecialchars($row['fullName']) ?></p>
                <p><strong>Status:</strong> <span class="<?= $row['status'] ?>"><?= ucfirst($row['status']) ?></span></p>
                <p><strong>Date Applied:</strong> <?= date('F j, Y', strtotime($row['application_date'])) ?></p>
                <p><strong>Message:</strong><br><?= nl2br(htmlspecialchars($row['message'])) ?></p>
                
                <?php if ($row['status'] == 'pending'): ?>
                    <div class="action-buttons">
                        <button class="approve-btn" onclick="updateStatus(<?= $row['id'] ?>, 'approved')">Approve</button>
                        <button class="reject-btn" onclick="updateStatus(<?= $row['id'] ?>, 'rejected')">Reject</button>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<footer class="site-footer">
    <div class="footer-content">
        <p class="copyright">Copyright &copy; <span id="year">2024</span> LandlordPro</p>
        <div class="footer-links">
            <a href="mailto:landlordpro@gmail.com">landlordpro@gmail.com</a>
            <a href="mailto:contact@landlordpro.com">contact@landlordpro.com</a>
            <a href="/privacy">Privacy Policy</a>
            <a href="/terms">Terms of Service</a>
        </div>
    </div>
</footer>

<script>
    document.getElementById('year').textContent = new Date().getFullYear();
    
    function updateStatus(appId, status) {
        if (confirm(`Are you sure you want to ${status} this application?`)) {
            fetch('update_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `id=${appId}&status=${status}`
            })
            .then(response => {
                if (response.ok) {
                    location.reload();
                } else {
                    alert('Error updating status');
                }
            });
        }
    }
</script>
</body>
</html>