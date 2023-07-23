<?php session_start(); ?>
<?php
$deid = $_GET['user_id'];
$deid = base64_decode($deid);
$enid = base64_encode($deid);
?>
<?php
$number = $_GET['n'];
$subject_id = $_GET['subject_id'];
$unit = $_GET['unit'];
$session = $_GET['session'];
$semester = $_GET['semester'];
// $user_id = $_GET['user_id'];
// $userid = "<script>document.write(localStorage.getItem('uid'));</script>";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>PHP Quizzer</title>
        <link rel="stylesheet" href="quiz.css" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    
    <body> 
        
            <div class="container">
                <h1>Quiz</h1>
            
       
        
                <h2>You're Done!</h2> 
                <p class = "alert alert-success">Congrats! You have completed the test</p>
                <p>Final Score: <?php echo $_SESSION['score'];?> </p> 
                <a href="question.php?user_id=<?php echo $enid;?>&n=1&semester=<?php echo $semester;?>&subject_id=<?php echo $subject_id;?>&session=<?php echo $session;?>&unit=<?php echo $unit;?>" class="btn btn-primary">take again</a>

                <a href="quiz.php?user_id=<?php echo $enid;?>&semester=<?php echo $semester;?>&subject_id=<?php echo $subject_id;?>&session=<?php echo $session;?>&unit=<?php echo $unit;?>" class="btn btn-primary">Back</a>
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
    

