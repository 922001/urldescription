<?php session_start(); ?>
<?php
$number = $_GET['n'];
$subject_id = $_GET['subject_id'];
$unit = $_GET['unit'];
$session = $_GET['session'];
$semester = $_GET['semester'];
$user_id = $_GET['user_id'];
$dep = $_GET['department'];
$sem1 = $_GET['sem'];
// $userid = "<script>document.write(localStorage.getItem('uid'));</script>";
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



        <h2>You're Done!</h2>
        <p class="alert alert-success">Congrats! You have completed the test</p>
        <p>Final Score:
            <?php echo $_SESSION['score']; ?>
        </p>
        <a href="faculty_question.php?user_id=<?php echo $user_id; ?>&sem=<?php echo $sem1; ?>&n=1&department=<?php echo $dep; ?>&semester=<?php echo $semester; ?>&subject_id=<?php echo $subject_id; ?>&session=<?php echo $session; ?>&unit=<?php echo $unit; ?>"
            class="btn btn-primary">take again</a>

        <a href="faculty_session.php?user_id=<?php echo $user_id; ?>&sem=<?php echo $sem1; ?>&department=<?php echo $dep; ?>&semester=<?php echo $semester; ?>&subject_id=<?php echo $subject_id; ?>&session=<?php echo $session; ?>&unit=<?php echo $unit; ?>"
            class="btn btn-primary">Back</a>
    </div>

    <!-- <footer>
            <div class="container">
                Copyright &copy; 2014, PHP Quizzer
            </div>
        </footer> -->
    <script>
        var user_id = localStorage.getItem('uid');
    </script>
</body>

</html>
<?php session_destroy(); ?>
<?php include('footer.php'); ?>