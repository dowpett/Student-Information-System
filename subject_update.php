<?php
require('config.php');

//id is from (var:id)
$id =$_POST['id'];
$query = mysqli_query($conn, "SELECT * FROM
                        subject WHERE id = '$id'

");
$res =$query->fetch_assoc();
echo json_encode($res);
?>
