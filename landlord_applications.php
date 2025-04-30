<?php
session_start();
require 'connect.php';
// $conn = connectDB();


if (!isset($_SESSION['user_id'])) {
header("Location: login.php");
exit();
}

$landlord_id = $_SESSION['user_id'];


$stmt = $conn->prepare("SELECT user_type FROM userinfo WHERE user_id = ?");
$stmt->bind_param("i", $landlord_id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user || $user['user_type'] !== 'landlord') {
header("Location: login.php");
exit();
}


$query = "SELECT a.id, p.location, t.fullName, a.message, a.status,
a.application_date, p.property_id, p.price, p.bedroomQuantity,
l.user_id as property_owner_id, l.fullName as property_owner
FROM applications a
JOIN properties p ON a.property_id = p.property_id
JOIN userinfo t ON a.tenant_id = t.user_id
JOIN userinfo l ON p.landlord_id = l.user_id
WHERE a.landlord_id = ? OR p.landlord_id = ?
ORDER BY a.application_date DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $landlord_id, $landlord_id);
$stmt->execute();
$applications = $stmt->get_result();


$propStmt = $conn->prepare("SELECT property_id, location FROM properties WHERE landlord_id = ?");
$propStmt->bind_param("i", $landlord_id);
$propStmt->execute();
$properties = $propStmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
<title>View Applications</title>
<link rel="stylesheet" href="styling/headerAndFooter.css">
<link rel="stylesheet" href="style.css">
<style>

.application {
border: 1px solid #e0e0e0;
padding: 20px;
margin: 20px auto;
max-width: 800px;
border-radius: 10px;
background: #fff;
box-shadow: 0 3px 15px rgba(0,0,0,0.1);
transition: transform 0.3s ease;
}
.application:hover {
transform: translateY(-3px);
box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}
.application h3 {
color: #2c3e50;
margin-top: 0;
border-bottom: 1px solid #eee;
padding-bottom: 10px;
}
.property-meta {
display: flex;
flex-wrap: wrap;
gap: 10px;
margin: 15px 0;
}
.property-meta span {
background: #f5f7fa;
padding: 6px 12px;
border-radius: 20px;
font-size: 0.85em;
color: #4a5568;
}
.pending { color: #e67e22; background: #fff4e6; padding: 3px 8px; border-radius: 4px; }
.approved { color: #27ae60; background: #e6f7ee; padding: 3px 8px; border-radius: 4px; }
.rejected { color: #e74c3c; background: #ffebee; padding: 3px 8px; border-radius: 4px; }
.action-buttons {
margin-top: 20px;
display: flex;
gap: 10px;
}
button {
padding: 10px 20px;
border: none;
border-radius: 6px;
cursor: pointer;
transition: all 0.3s;
font-weight: 600;
}
.approve-btn {
background: #27ae60;
color: white;
}
.approve-btn:hover { background: #219955; transform: scale(1.03); }
.reject-btn {
background: #e74c3c;
color: white;
}
.reject-btn:hover { background: #c0392b; transform: scale(1.03); }
.message-box {
background: #f8f9fa;
padding: 15px;
border-radius: 8px;
margin: 10px 0;
border-left: 4px solid #3498db;
}
.debug-panel {
background: #f8f9fa;
padding: 20px;
margin: 30px auto;
max-width: 800px;
border-radius: 10px;
border-left: 5px solid #ff9800;
}
.no-apps {
text-align: center;
padding: 40px;
background: #f8f9fa;
border-radius: 10px;
margin: 30px auto;
max-width: 800px;
}
.status-filter {
text-align: center;
margin: 20px 0;
}
.status-filter a {
padding: 8px 15px;
margin: 0 5px;
border-radius: 20px;
text-decoration: none;
color: #4a5568;
background: #f0f2f5;
transition: all 0.3s;
}
.status-filter a:hover, .status-filter a.active {
background: #4CAF50;
color: white;
}
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
<li><a href="accountBalance.php">ACCOUNT BALANCE |</a></li>
<li><a href="properties.php">PROPERTIES |</a></li>
<li><a href="faqGuidelines.php">FAQ SUMMARY |</a></li>
<li><a href="contactUs.php">CONTACT US |</a></li>
<li><a href="logout.php">LOG OUT </a></li>

</ul>
</nav>

<main>
<h1>Tenant Applications</h1>


<div class="status-filter">
<a href="?status=all" class="<?= (!isset($_GET['status']) || $_GET['status'] === 'all') ? 'active' : '' ?>">All</a>
<a href="?status=pending" class="<?= (isset($_GET['status']) && $_GET['status'] === 'pending') ? 'active' : '' ?>">Pending</a>
<a href="?status=approved" class="<?= (isset($_GET['status']) && $_GET['status'] === 'approved') ? 'active' : '' ?>">Approved</a>
<a href="?status=rejected" class="<?= (isset($_GET['status']) && $_GET['status'] === 'rejected') ? 'active' : '' ?>">Rejected</a>
</div>

<?php if ($applications->num_rows === 0): ?>
<div class="no-apps">
<h3>No applications found</h3>
<p>You currently don't have any rental applications.</p>

<div class="debug-panel">
<h4>Debug Information</h4>
<p>Landlord ID: <?= $landlord_id ?></p>

<h5>Your Properties:</h5>
<?php if ($properties->num_rows > 0): ?>
<ul>
<?php while ($property = $properties->fetch_assoc()): ?>
<li>ID: <?= $property['property_id'] ?> - <?= htmlspecialchars($property['location']) ?></li>
<?php endwhile; ?>
</ul>
<?php else: ?>
<p>You don't have any properties listed yet.</p>
<a href="add_property.php" class="approve-btn" style="display: inline-block; margin-top: 15px;">
Add Your First Property
</a>
<?php endif; ?>
</div>
</div>
<?php else: ?>
<?php while ($app = $applications->fetch_assoc()): ?>
<div class="application">
<h3><?= htmlspecialchars($app['location']) ?></h3>


<p><strong>Property Owner:</strong>
<?= htmlspecialchars($app['property_owner']) ?>
(ID: <?= $app['property_owner_id'] ?>)
</p>

<div class="property-meta">
<span>£<?= number_format($app['price'], 2) ?>/month</span>
<span><?= $app['bedroomQuantity'] ?> bedroom<?= $app['bedroomQuantity'] > 1 ? 's' : '' ?></span>
<span>Property ID: <?= $app['property_id'] ?></span>
</div>

<p><strong>Applicant:</strong> <?= htmlspecialchars($app['fullName']) ?></p>
<p><strong>Status:</strong> <span class="<?= $app['status'] ?>"><?= ucfirst($app['status']) ?></span></p>
<p><strong>Date Applied:</strong> <?= date('F j, Y \a\t g:i a', strtotime($app['application_date'])) ?></p>
<p><strong>Message:</strong></p>
<div class="message-box"><?= nl2br(htmlspecialchars($app['message'])) ?></div>

<?php if ($app['status'] == 'pending'): ?>
<div class="action-buttons">
<button class="approve-btn" onclick="updateStatus(<?= $app['id'] ?>, 'approved')">
<i class="fas fa-check"></i> Approve
</button>
<button class="reject-btn" onclick="updateStatus(<?= $app['id'] ?>, 'rejected')">
<i class="fas fa-times"></i> Reject
</button>
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
})
.catch(error => {
console.error('Error:', error);
alert('Request failed. Please check console for details.');
});
}
}
</script>
</body>
</html>