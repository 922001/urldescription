<?php include('quiz_db.php'); ?>

<?php
$subject_id = $_GET['subject_id'];
$unit = $_GET['unit'];
$session = $_GET['session'];
$semester = $_GET['semester'];
$user_id = $_GET['user_id'];
$dep = $_GET['department'];
$sem1 = $_GET['sem'];

$query = "SELECT * FROM questions WHERE semester = '$semester' and subject_id = '$subject_id' and unit = '$unit'and session = '$session'";
$results = $mysqli->query($query);
$total = $results->num_rows;
if ($total == 0) {
    echo "<div class='container'><h1>Assessment Not uploaded Yet</h1></div>";
}


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



        <h2>Test Your PHP Knowledge</h2>
        <p>Multiple choice quizz</p>
        <ul>
            <li class="list-items"><strong>Number of questions:</strong>
                <?php echo $total; ?>
            </li>
            <li class="list-items"><strong>Type:</strong>Multiple choice</li>
            <li class="list-items"><strong>Estimated time:</strong>
                <?php echo $total * .5; ?>minutes
            </li>
        </ul>
        <?php if ($total > 0) {
            echo "<a href='faculty_question.php?n=1&user_id=$user_id&sem=$sem1&department=$dep&semester=$semester&subject_id=$subject_id&session=$session&unit=$unit' class='btn btn-primary'>Start quiz</a>";

            echo "<a href='faculty_session.php?user_id=$user_id&em=$sem1&department=$dep&semester=$semester&subject_id=$subject_id&session=$session&unit=$unit' class='btn btn-primary'>Back</a>";
            
            
        } ?>
    </div>

    <!-- <footer>
<div class="container">
    Copyright &copy; 2014, PHP Quizzer
</div>
</footer> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
<?php include('footer.php'); ?>