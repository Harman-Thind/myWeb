<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galaxy Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Our Galaxies</h1>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "galaxy_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to select all galaxies
    $sql = "SELECT * FROM galaxies";
    $result = $conn->query($sql);

    // Display galaxies
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='galaxy'>";
            echo "<h2>" . $row["name"] . "</h2>";
            echo "<img src='" . $row["image_url"] . "' alt='" . $row["name"] . "' class='galaxy-image'>";
            echo "<p class='description'>" . $row["description"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
    ?>
</div>

<script>
    // Add JavaScript for dynamic effects
    const galaxies = document.querySelectorAll('.galaxy');

    galaxies.forEach(galaxy => {
        galaxy.addEventListener('mouseenter', () => {
            galaxy.classList.add('galaxy-hover');
        });

        galaxy.addEventListener('mouseleave', () => {
            galaxy.classList.remove('galaxy-hover');
        });
    });
</script>

</body>
</html>
