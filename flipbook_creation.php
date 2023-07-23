<?php

$conn = mysqli_connect("localhost", "root", "", "creslms");
$flipbook = $_POST['flipbook'];
$session = $_POST['sessionid'];
$subject = $_POST['subjectid'];




$sql = "INSERT INTO session(ebook_link,id,subject_id)
     VALUES ('$flipbook','$session','$subject')";

if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
$conn->close();
?>