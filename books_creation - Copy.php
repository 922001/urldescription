<?php
include('profile.php');

$conn = mysqli_connect("localhost", "root", "", "creslms");
$department = $_POST['department'];
$name = $_POST['name'];
$image = $_POST['book_img'];
$book_link = $_POST['book_link'];
$username =$user['name'];


$sql = "INSERT INTO book (department,name,book_img,book_link)
     VALUES ('$department','$name','$image','$book_link')";
   mysqli_query($conn,"insert into activity_log (date,name,action) values(NOW(),'$username','Added books $name')");


if (mysqli_query($conn, $sql)) {
   echo "New record has been added successfully !";
} else {
   echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
$conn->close();
?>