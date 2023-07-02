<?php

// if (isset($_GET["rid"])){
//     $rid=$_GET["rid"];

    include "connection.php";
    $sql="DELETE FROM receivers WHERE rid=$rid";
    if (mysqli_query($conn, $sql)) {
        $msg="You have cancelled request for the blood.";
        header("location:../userlist.php?msg=".$msg );
        } else {
        $error="Error deleting record: " . mysqli_error($conn);
        header("location:../userlist.php?error=".$error );
        mysqli_close($conn);

        }
    
       
?>