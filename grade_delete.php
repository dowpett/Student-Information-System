<?php
require('config.php');

//id is from (var:id)
$id =$_GET['id'];
$query = mysqli_query($conn, "DELETE FROM
                        grade WHERE id = '$id'");
if ($query==TRUE)
{
echo"<script>

alert ('Succesfully Deleted!')
window.location.href = 'grade.php'
</script>";
}
else{
    echo "Something Went Wrong";
}

?>
