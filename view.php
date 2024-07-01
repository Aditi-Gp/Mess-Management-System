
<?php 
include('db_connection.php');
$query = "SELECT * FROM mess_menu";
$result = mysqli_query($connection, $query);
?>

<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Menu</h1>

        <br>
        <br>
        <br>

        <table>
            <tr>
                <th>Day</th>
                <th>Dinner</th>
                <th>Lunch</th>
                <th>Breakfast</th>
                <th>Recipe ID</th>
                <th>Actions</th>
            </tr>

<?php
    while ($row = mysqli_fetch_assoc($result)) {
         ?>
        <tr>
            <td><?php echo $row['day']; ?></td>
            <td><?php echo $row['dinner']; ?></td>
            <td><?php echo $row['lunch']; ?></td>
            <td><?php echo $row['bfast']; ?></td>
            <td><?php echo $row['recip_id']; ?></td>
            <td>
                 <a href="update_menu.php?id=<?php echo $row['recip_id']; ?>" class="btn-secondary">Update Menu</a>
            </td>
        </tr>
    <?php
        }
    ?>

        </table>
    </div>
</div>
