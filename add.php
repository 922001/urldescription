<?php include 'quiz_db.php'; ?>
<?php
if (isset($_POST['submit'])) {
    $question_number = $_POST['question_number'];

    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];

    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $unit = $_POST['unit'];
    $session = $_POST['session'];

    $choices = array();
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    $choices[5] = $_POST['choice5'];
    $query = "INSERT INTO questions (question_number,text,semester,subject_id,unit,session) VALUES('$question_number','$question_text','$semester','$subject','$unit','$session')";
    $insert_row = $mysqli->query($query) or die($mysqli->error . __LINE__);
    if ($insert_row) {
        foreach ($choices as $choice => $value) {
            if ($value != '') {
                if ($correct_choice == $choice) {
                    $is_correct = 1;
                } else {
                    $is_correct = 0;
                }
                $query = "INSERT INTO choices (question_number,is_correct,text,semester,subject_id,unit,session) VALUES('$question_number','$is_correct','$value','$semester','$subject','$unit','$session')";
                $insert_row = $mysqli->query($query) or die($mysqli->error . __LINE__);
                if ($insert_row) {
                    continue;
                } else {
                    die('Error : (' . $mysqli->errno . ') ' . $mysqli->error);
                }
            }
        }
        $msg = 'question has been added';

    }

}
$query = "SELECT * FROM questions";
$questions = $mysqli->query($query) or die($mysqli->error . __LINE__);
$total = $questions->num_rows;
$next = $total + 1;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Add Quiz</title>
    <link rel="stylesheet" href="quiz.css" type="text/css" />
</head>

<body>
    <header>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Add A Question</h2>
            <?php
            if (isset($msg)) {
                echo '<p>' . $msg . '</p>';

            }
            ?>
            <form method="post" action="add.php">
                <p>
                    <label>Question Number</label>
                    <input type="number" value="<?php echo $next; ?>" name="question_number" />
                </p>
                <p>
                    <label>Question Text</label>
                    <input type="text" name="question_text" />
                </p>
                <p>
                    <label>Choice #1</label>
                    <input type="text" name="choice1" />
                </p>
                <p>
                    <label>Choice #2</label>
                    <input type="text" name="choice2" />
                </p>
                <p>
                    <label>Choice #3</label>
                    <input type="text" name="choice3" />
                </p>
                <p>
                    <label>Choice #4</label>
                    <input type="text" name="choice4" />
                </p>
                <p>
                    <label>Choice #5</label>
                    <input type="text" name="choice5" />
                </p>
                <p>
                    <label>Correct choice number</label>
                    <input type="number" name="correct_choice" />
                </p>
                <p>
                    <label>semester</label>
                    <input type="number" name="semester" />
                </p>
                <p>
                    <label>subject</label>
                    <input type="number" name="subject" />
                </p>
                <p>
                    <label>unit</label>
                    <input type="number" name="unit" />
                </p>
                <p>
                    <label>session</label>
                    <input type="number" name="session" />
                </p>
                <p>
                    <input type="submit" name="submit" value="submit" />
                </p>
            </form>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; 2014, PHP Quizzer
        </div>
    </footer>
</body>

</html>