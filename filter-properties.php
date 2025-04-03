<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "landlordpro");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$location = $_GET['location'] ?? 'Any';
$price_range = $_GET['price'] ?? 'Any';
$bedrooms = $_GET['bedrooms'] ?? 'Any';

$sql = "SELECT * FROM properties WHERE status = 'available'";

if ($location != 'Any') {
    $sql .= " AND location = '" . $conn->real_escape_string($location) . "'";
}

if ($price_range != 'Any') {
    $ranges = [
        '0-500' => "price BETWEEN 0 AND 500",
        '500-1000' => "price BETWEEN 500 AND 1000", 
        '1000-2000' => "price BETWEEN 1000 AND 2000"
    ];
    $sql .= " AND " . $ranges[$price_range];
}

if ($bedrooms != 'Any') {
    $sql .= $bedrooms == '3' 
        ? " AND bedroomQuantity >= 3" 
        : " AND bedroomQuantity = " . (int)$bedrooms;
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="property-card">';
        echo '<h3>' . htmlspecialchars($row['title'] ?? $row['location'] . ' Property') . '</h3>';
        echo '<p><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>';
        echo '<p><strong>Price:</strong> £' . number_format($row['price'], 2) . '</p>';
        echo '<p><strong>Bedrooms:</strong> ' . $row['bedroomQuantity'] . '</p>';
        echo '</div>';
    }
} else {
    echo '<p class="no-results">No matching properties found</p>';
}

$conn->close();
?>