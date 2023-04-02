<?php
require('config.php');

//id is from (var:id)
$id =$_GET['id'];
$query = mysqli_query($conn, "DELETE FROM
                        student WHERE id = '$id'");
if ($query==TRUE)
{
echo"<script>

alert ('Succesfully Deleted!')
window.location.href = 'list.php'
</script>";
}
else{
    echo "Something Went Wrong";
}

?>
