<?php
require('config.php');

if (isset($_POST['btnsave'])) {
    $schedule = $_POST['schedule'];
    $section = $_POST['section'];
    $subject_id = $_POST['subject_id'];
    
  

    $qry = mysqli_query($conn,"INSERT INTO schedule(schedule,section,subject_id)
                                VALUES('$schedule','$section','$subject_id')");

    if($qry==TRUE){
        echo "<script>alert('Succesfully Inserted')
        window.location.href='schedule.php'</script>";
    }else{
        echo "<script>alert('Something Went Wrong')</script>";
    }

}

//para di maulit ulit yung data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $schedule = $_POST['schedule'];
    $section = $_POST['section'];
    $subject_id = $_POST['subject_id'];
   
    $qry = mysqli_query($conn,"UPDATE schedule SET 
                                schedule = '$schedule',section ='$section',subject_id ='$subject_id'
                                WHERE id = '$id'
                                ");
                            
    if($qry == TRUE){
        echo "<script>
        alert('Data Updated');
        window.location.href='schedule.php'
        </script>";
    }else{

        echo "<script>
        alert('Something Went Wrong!');
        window.location.href= 'update_subject.php'
        </script>";
    }

}
?>



