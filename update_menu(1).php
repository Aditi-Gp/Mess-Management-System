<!-- update_menu.php -->

<?php
include('db_connection.php');

if(isset($_POST['submit'])) {
    $recip_id = $_POST['recip_id'];
    $day = $_POST['day'];
    $dinner = $_POST['dinner'];
    $lunch = $_POST['lunch'];
    $bfast = $_POST['bfast'];

    $query = "UPDATE mess_menu SET day='$day', dinner='$dinner', lunch='$lunch', bfast='$bfast' WHERE recip_id=$recip_id";
    $result = mysqli_query($connection, $query);

    if($result) {
        header("Location: view.php");
        exit();
    } else {
        echo "Error updating menu item: " . mysqli_error($connection);
    }
}

if(isset($_GET['id'])) {
    $recip_id = $_GET['id'];
    $query = "SELECT * FROM mess_menu WHERE recip_id = $recip_id";
    $result = mysqli_query($connection, $query);
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Menu item not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Menu</title>
</head>
<body>
    <h1>Update Menu</h1>
    <form method="POST" action="">
        <input type="hidden" name="recip_id" value="<?php echo $row['recip_id']; ?>">
        <label for="day">Day:</label>
        <input type="text" id="day" name="day" value="<?php echo $row['day']; ?>"><br>
        <label for="dinner">Dinner:</label>
        <input type="text" id="dinner" name="dinner" value="<?php echo $row['dinner']; ?>"><br>
        <label for="lunch">Lunch:</label>
        <input type="text" id="lunch" name="lunch" value="<?php echo $row['lunch']; ?>"><br>
        <label for="bfast">Breakfast:</label>
        <input type="text" id="bfast" name="bfast" value="<?php echo $row['bfast']; ?>"><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
