<?php
require('config.php');

//id is from (var:id)
$id =$_GET['id'];
$query = mysqli_query($conn, "DELETE FROM
                        subject WHERE id = '$id'");
if ($query==TRUE)
{
echo"<script>

alert ('Succesfully Deleted!')
window.location.href = 'subject.php'
</script>";
}
else{
    echo "Something Went Wrong";
}

?>