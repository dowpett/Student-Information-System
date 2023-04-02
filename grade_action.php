<?php
require('config.php');

if (isset($_POST['btnsave'])) {
    $studName = $_POST['studName'];
    $yr_sec = $_POST['yr_sec'];
    $subject_id = $_POST['subject_id'];
    $grade = $_POST['grade'];
  

    $qry = mysqli_query($conn,"INSERT INTO grade(studName,yr_sec,subject_id, grade)
                                VALUES('$studName','$yr_sec','$subject_id','$grade')");

    if($qry==TRUE){
        echo "<script>alert('Succesfully Inserted')
        window.location.href='grade.php'</script>";
    }else{
        echo "<script>alert('Something Went Wrong')</script>";
    }

}

//para di maulit ulit yung data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $studName = $_POST['studName'];
    $yr_sec = $_POST['yr_sec'];
    $subject_id = $_POST['subject_id'];
    $grade = $_POST['grade'];
   
    $qry = mysqli_query($conn,"UPDATE grade SET 
                                studName = '$studName',yr_sec ='$yr_sec',subject_id ='$subject_id',grade = '$grade'
                                WHERE id = '$id'
                                ");
                            
    if($qry == TRUE){
        echo "<script>
        alert('Data Updated');
        window.location.href='grade.php'
        </script>";
    }else{

        echo "<script>
        alert('Something Went Wrong!');
        window.location.href= 'grade_update.php'
        </script>";
    }

}
?>



