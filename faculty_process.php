<?php include('quiz_db.php'); ?>
<?php session_start(); ?>
<?php


//Check to see if score is set error_handler 
if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if ($_POST) {
   
    $number = $_POST['number'];
    $subject_id = $_POST['subject_id'];
    $unit = $_POST['unit'];
    $session = $_POST['session'];
    $semester = $_POST['semester'];
    $userid = $_POST['user_id'];
    $dep = $_POST['department'];
    $sem1 = $_POST['sem'];
  
    $selected_choice = $_POST['choice'];
    $next = $number + 1;

    $query = "SELECT * FROM questions WHERE semester = '$semester' and subject_id = '$subject_id' and unit = '$unit' and session = '$session'";
    $results = $mysqli->query($query) or die($mysqli->error . __LINE__);
    $total = $results->num_rows;

    $query = "SELECT * FROM choices WHERE question_number = '$number' and semester = '$semester' and subject_id = '$subject_id' and unit = '$unit' and session = '$session' and is_correct = 1";

    $result = $mysqli->query($query) or die($mysqli->error . __LINE__);

    $row = $result->fetch_assoc();

    $correct_choice = $row['id'];

    if ($correct_choice == $selected_choice) {
        $_SESSION['score']++;
    }

    if ($number == $total) {
        header("Location: faculty_final.php?n=" . $next . "&user_id=$userid&sem=$sem1&department=$dep&semester=$semester&subject_id=$subject_id&session=$session&unit=$unit");
        exit();
    } else {
        header("Location: faculty_question.php?n=" . $next . "&user_id=$userid&sem=$sem1&department=$dep&semester=$semester&subject_id=$subject_id&session=$session&unit=$unit");
    }
}
?>