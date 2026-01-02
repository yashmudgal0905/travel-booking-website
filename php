<!DOCTYPE html>
<html>
<head>
    <title>Tour Website</title>
</head>
<body>

<h1>Available Tours</h1>

<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch tours
$sql = "SELECT id, title, description, price FROM tours";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>Description: " . $row["description"] . "</p>";
        echo "<p>Price: $" . $row["price"] . "</p>";
        echo "<a href='book_tour.php?id=" . $row["id"] . "'>Book Now</a>";
        echo "<hr>";
    }
} else {
    echo "No tours available.";
}

$conn->close();
?>

</body>
</html>
