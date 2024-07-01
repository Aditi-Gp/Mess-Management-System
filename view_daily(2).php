
<?php
include('db_connection.php');

if(isset($_POST['submit'])) {
    $day = $_POST['day'];

    $query = "SELECT * FROM mess_menu WHERE day='$day'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) > 0) {

        echo "<h2>Menu for $day</h2>";
        echo "<table>";
        echo "<tr><th>Day</th><th>Dinner</th><th>Lunch</th><th>Breakfast</th><th>Recipe ID</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['day'] . "</td>";
            echo "<td>" . $row['dinner'] . "</td>";
            echo "<td>" . $row['lunch'] . "</td>";
            echo "<td>" . $row['bfast'] . "</td>";
            echo "<td>" . $row['recip_id']."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No menu available for $day.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Daily Menu</title>
</head>
<body>
    <h1>View Daily Menu</h1>
    <form method="POST" action="">
        <label for="day">Enter Day:</label>
        <input type="text" id="day" name="day" placeholder="e.g., Monday"><br>
        <input type="submit" name="submit" value="View Menu">
    </form>
</body>
</html>
