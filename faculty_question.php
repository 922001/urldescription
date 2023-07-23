<?php include('quiz_db.php'); ?>
<?php session_start(); ?>
<?php
$number = $_GET['n'];
$subject_id = $_GET['subject_id'];
$unit = $_GET['unit'];
$session = $_GET['session'];
$semester = $_GET['semester'];
$userid = $_GET['user_id'];
$dep = $_GET['department'];
$sem1 = $_GET['sem'];


$query = "SELECT * FROM questions WHERE semester = '$semester' and subject_id = '$subject_id' and unit = '$unit'and session = '$session'";
$results = $mysqli->query($query);
$total = $results->num_rows;

$query = "SELECT * FROM questions WHERE semester = '$semester' and subject_id = '$subject_id' and unit = '$unit'and session = '$session' and question_number = '$number'";
$result = $mysqli->query($query);
$question = $result->fetch_assoc();

$query = "SELECT * FROM choices WHERE semester = '$semester' and subject_id = '$subject_id' and unit = '$unit'and session = '$session' and question_number = '$number'";
$result = $mysqli->query($query);
;
$choices = $mysqli->query($query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Faculty dashbord</title>
    <link rel="stylesheet" href="quiz.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h1>Quiz</h1>



    <div class="row">
  <div class="col-4"></div>
  <div class="col-8"></div>
</div>
<div class="row">
  <div class="col-sm-4" style="background-color:peachpuff;">Question
            <?php echo $question['question_number']; ?> <hr><?php echo $question['text']; ?>
        </div>
  <div class="col-sm-8" style="background-color:lavenderblush;"><div class="alert alert-info">Question
            <?php echo $question['question_number']; ?> of
            <?php echo $total; ?>
        </div>
        <p class="question">
            <?php echo $question['text']; ?>
        </p>
        <form method="post" action="faculty_process.php">
            <ul class="choices">
                <?php while ($row = $choices->fetch_assoc()): ?>
                    <li><input class="form-check-input" name="choice" type="radio" value="<?php echo $row['id']; ?>" /><?php echo $row['text'] ?></li>
                <?php endwhile; ?>
            </ul>
            <input class="btn btn-primary" type="submit" value="Next">
            <input type="hidden" name="number" value="<?php echo $number; ?>" />
            <input type="hidden" name="semester" value="<?php echo $semester; ?>" />
            <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>" />
            <input type="hidden" name="session" value="<?php echo $session; ?>" />
            <input type="hidden" name="unit" value="<?php echo $unit; ?>" />
            <input type="hidden" name="user_id" value="<?php echo $userid; ?>" />
            <input type="hidden" name="department" value="<?php echo $dep; ?>" />
            <input type="hidden" name="sem" value="<?php echo $sem1; ?>" />
    </div>
</body>

</html>
<?php include('footer.php'); ?>