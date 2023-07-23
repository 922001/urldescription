<?php

$conn = mysqli_connect("localhost","root","","creslms");
$department = $_POST['department'];
$announcement = $_POST['announcement'];

     $sql = "INSERT INTO announcement (department,announcement)
     VALUES ('$department','$announcement')";
     
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     $conn->close();
?>