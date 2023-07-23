<?php include('profile.php'); ?>
<?php include('quiz_db.php'); ?>

<?php
$subject_id = $_GET['subject_id'];
$unit = $_GET['unit'];
$session = $_GET['session'];
$semester = $_GET['semester'];
$user_id = $_GET['user_id'];

$query = "SELECT * FROM questions WHERE semester = '$semester' and subject_id = '$subject_id' and unit = '$unit'and session = '$session'";
$results = $mysqli->query($query);
$total = $results->num_rows;
if ($total == 0) {
    echo "<div class='container'><h1>Assessment Not uploaded Yet</h1></div>";
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="video.css" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="quiz.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style media="screen">
        .upload {

            width: 90px;
            margin-top: 10px;
            margin-left: 65px;

        }

        .upload img {
            border-radius: 50%;
            border: 3px solid #DCDCDC;
            width: 90px;
            height: 90px;
        }

        .upload .rightRound {

            position: absolute;
            top: 75px;
            left: 128px;
            background: #00B4FF;
            width: 25px;
            height: 25px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .upload .leftRound {
            position: absolute;
            top: 75px;
            left: 75px;
            background: red;
            width: 25px;
            height: 25px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .upload .fa {
            color: white;
        }

        .upload input {
            position: absolute;
            transform: scale(2);
            opacity: 0;
        }

        .upload input::-webkit-file-upload-button,
        .upload input[type=submit] {
            cursor: pointer;
        }
    </style>



</head>

<body>

    <!--wrapper start-->
    <div class="wrapper">
        <!-- header menu start-->
        <div class="header">
            <div class="header-menu">
                <img class="logo" src="logo (1).png">

                <ul>

                    <!-- <li><a href="#"><i class="fas fa-bell"></i></a></li> -->
                    <li><a href="logout.php"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
        <!--header menu end-->
        <?php
        $subid = $_GET['subject_id'];
        $unit = $_GET['unit'];
        $session = $_GET['session_id'];
        $sem = $_GET['semester']
            ?>

        <div class="sec-header">
            <div class="sidebar-btn"><a
                    href="admin_session.php?user_id=<?php echo $user['id']; ?>&subject_id=<?php echo $subid; ?>&unit=<?php echo $unit; ?>&session=<?php echo $session; ?>&semester=<?php echo $sem; ?>"
                    style="color:white" ;>
                    <i class="fas fa-arrow-left"></i></a>
            </div>
        </div>

        <!--sidebar start-->
        <!-- <div class="sidebar">
            <div class="sidebar-menu">


                <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="upload">
                        <img src="img/<?php echo $user['image']; ?>" id="image">
                        <p>
                            <?php echo $user['name']; ?>
                        </p>

                        <div class="rightRound" id="upload">
                            <input type="file" name="fileImg" id="fileImg" accept=".jpg, .jpeg, .png">
                            <i class="fa fa-camera"></i>
                        </div>

                        <div class="leftRound" id="cancel" style="display: none;">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="rightRound" id="confirm" style="display: none;">
                            <input type="submit">
                            <i class="fa fa-check"></i>

                        </div>
                </form>
            </div> -->

        <!-- <center class="profile">
                        <img src="sem image.jpg" alt="">
                        <p>Jessica</p>
                    </center> -->
        <!-- <li class="item">
                <a href="add_subjects.php?" class="menu-btn">
                    <i class="fas fa-plus"></i><span>Add</span>
                </a>
            </li>

            <li class="item" id="profile">
                <a href="#profile" class="menu-btn">
                    <i class="fas fa-book"></i><span>Semester <i class="fas fa-chevron-down drop-down"></i></span>
                </a>
                <div class="sub-menu">
                    <a href="#"><span>Semester 1</span></a>
                    <a href="#"></i><span>Semester 2</span></a>
                    <a href="#"></i><span>Semester 3</span></a>
                    <a href="#"></i><span>Semester 4</span></a>
                </div>
            </li>


            <li class="item">
                <a href="#" class="menu-btn">
                    <i class="fas fa-info-circle"></i><span>Request Form</span>
                </a>
            </li>
            <li class="item">
                <a href="studentfrontpage.php?user_id=2&department=MCA&semester=1" class="menu-btn">
                    <i class="fas fa-arrow-left"></i><span>Back</span>
                </a>
            </li>
        </div>
    </div> -->
        <!--sidebar end-->
        <!--main container start-->

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
            echo "<a href='question.php?n=1&user_id=$user_id&semester=$semester&subject_id=$subject_id&session=$session&unit=$unit' class='btn btn-danger'>Start quiz</a>";

            echo "<a href='admin_session.php?user_id=$user_id&semester=$semester&subject_id=$subject_id&session=$session&unit=$unit' class='btn btn-primary'>Back</a>";
            
            
        } ?>
    </div>



    </div>
    </div>
    <script>
        function myFunction() {
            alert('Currently unavailable')
        }
    </script>

    <!--card -->

    <!-- card ends -->



    <!--main container end-->

    <!--wrapper end-->

    <!-- <script type="text/javascript">
        $(document).ready(function () {
            $(".sidebar-btn").click(function () {
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script> -->
    <script type="text/javascript">
        document.getElementById("fileImg").onchange = function () {
            document.getElementById("image").src = URL.createObjectURL(fileImg.files[0]); // Preview new image

            document.getElementById("cancel").style.display = "block";
            document.getElementById("confirm").style.display = "block";

            document.getElementById("upload").style.display = "none";
        }

        var userImage = document.getElementById('image').src;
        document.getElementById("cancel").onclick = function () {
            document.getElementById("image").src = userImage; // Back to previous image

            document.getElementById("cancel").style.display = "none";
            document.getElementById("confirm").style.display = "none";

            document.getElementById("upload").style.display = "block";
        }
    </script>

    <?php
    if (isset($_FILES["fileImg"]["name"])) {
        $id = $_POST["id"];

        $src = $_FILES["fileImg"]["tmp_name"];
        $imageName = uniqid() . $_FILES["fileImg"]["name"];

        $target = "img/" . $imageName;

        move_uploaded_file($src, $target);

        $query = "UPDATE admin SET image = '$imageName' WHERE id = $id";
        mysqli_query($conn, $query);


    }
    ?>

</body>

</html>
<?php include('footer.php'); ?>