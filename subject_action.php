<?php
require('config.php');

if (isset($_POST['btnsave'])) {
    $subject_code = $_POST['subject_code'];
    $description = $_POST['description'];
    
  

    $qry = mysqli_query($conn,"INSERT INTO subject(subject_code,description)
                                VALUES('$subject_code','$description')");

    if($qry==TRUE){
        echo "<script>alert('Succesfully Inserted')
        window.location.href='subject.php'</script>";
    }else{
        echo "<script>alert('Something Went Wrong')</script>";
    }

}

//para di maulit ulit yung data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $subject_code = $_POST['subject_code'];
    $description = $_POST['description'];
    
    $qry = mysqli_query($conn,"UPDATE subject SET 
                                subject_code = '$subject_code',description ='$description'
                                WHERE id = '$id'
                                ");
                            
    if($qry == TRUE){
        echo "<script>
        alert('Data Updated');
        window.location.href='subject.php'
        </script>";
    }else{

        echo "<script>
        alert('Something Went Wrong!');
        window.location.href= 'update_subject.php'
        </script>";
    }

}
?>



