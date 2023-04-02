<?php
require('config.php');

if (isset($_POST['btnsave'])) {
    $studId = $_POST['studId'];
    $studName = $_POST['studName'];
    $yr_sec = $_POST['yr_sec'];
    $subject = $_POST['subject'];
  

    $qry = mysqli_query($conn,"INSERT INTO student(studId,studName,subject, yr_sec)
                                VALUES('$studId','$studName','$subject','$yr_sec')");

    if($qry==TRUE){
        echo "<script>alert('Succesfully Inserted')
        window.location.href='list.php'</script>";
    }else{
        echo "<script>alert('Something Went Wrong')</script>";
    }

}

//para di maulit ulit yung data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $studId = $_POST['studId'];
    $studName = $_POST['studName'];
    $yr_sec = $_POST['yr_sec'];
    $subject = $_POST['subject'];
   
    $qry = mysqli_query($conn,"UPDATE student SET 
                                studId = '$studId',studName ='$studName',yr_sec ='$yr_sec',subject ='$subject'
                                WHERE id = '$id'
                                ");
                            
    if($qry == TRUE){
        echo "<script>
        alert('Data Updated');
        window.location.href='list.php'
        </script>";
    }else{

        echo "<script>
        alert('Something Went Wrong!');
        window.location.href= 'list_update.php'
        </script>";
    }

}
?>



