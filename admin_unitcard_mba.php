<?php include('profile.php'); ?>
<?php
$deid = $_GET['user_id'];
$deid = base64_decode($deid);
$enid = base64_encode($deid);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="navbar.css">
   
    <link rel="stylesheet" href="session.css" />
    <link rel="stylesheet" href="admin_unitcard.css" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
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

        <div class="sec-header">
            <div class="sidebar-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>

        <!--sidebar start-->
        <div class="sidebar">
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
            </div>

            <!-- <center class="profile">
                        <img src="sem image.jpg" alt="">
                        <p>Jessica</p>
                    </center> -->
            <?php
            $dep = $_GET['department'];
            $subjectId = $_GET['subject_id'];
            $semester = $_GET['semester'];
            ?>
            <li class="item">
                <a href="add_unit_mba.php?user_id=<?php echo $enid; ?>&subject_id=<?php echo $subjectId; ?>&department=<?php echo $dep; ?>&semester=<?php echo $semester; ?>"
                    class="menu-btn">
                    <i class="fas fa-plus"></i><span>Add Unit Image</span>
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



            <?php
            $dep = $_GET['department'];
            $subjectId = $_GET['subject_id'];
            $semester = $_GET['semester'];
            ?>
            <li class="item">
                <a href="admin_subjectsmba.php?user_id=<?php echo $enid; ?>&department=MBA&semester=<?php echo $semester; ?>"
                    class="menu-btn">
                    <i class="fas fa-arrow-left"></i><span>Back</span>
                </a>
            </li>
        </div>
    </div>
    <!--sidebar end-->
    <!--main container start-->

    <div class="container">
        <div class="box-container">
            <?php
            
            $query = "SELECT * FROM subject_unit WHERE subject_id = $subjectId";
            $result = mysqli_query($conn, $query);
            $subjectImage = array();
            $count = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $subjectImage[$count] = $row['image_url'];
                $count++;
            }
            echo "<div class='box-container'>";
            for ($index = 0; $index <= 2; $index++) {
                $unitIndex = $index + 1;
                echo "<div class='card'>
              <div class='image'>";
                if ($index < sizeof($subjectImage)) {
                    echo "<img src='$subjectImage[$index]'>";
                } else {
                    echo "<img src=''>";
                }
                echo "</div>
              <div class='title'>
                <h1>UNIT $unitIndex</h1>";
                echo "<a href='admin_session_mba.php?user_id=" . $enid . "&subject_id=$subjectId&unit=$unitIndex&session=1&semester=$semester'>
                <button>session 1</button></a>";
                echo "<a href='admin_session_mba.php?user_id=" . $enid . "&subject_id=$subjectId&unit=$unitIndex&session=2&semester=$semester'>
                <button>session 2</button></a>";
                echo " </div>
            </div>";
            }
            echo "</div>";
            for ($index = 3; $index <= 4; $index++) {
                $unitIndex = $index + 1;
                echo "<div class='card1'>
              <div class='image'>";
                if ($index < sizeof($subjectImage)) {
                    echo "<img src='$subjectImage[$index]'>";
                } else {
                    echo "<img src=''>";
                }
                echo "</div>
              <div class='title'>
                <h1>UNIT $unitIndex</h1>";
                echo "<a href='admin_session_mba.php?user_id=" . $enid . "&subject_id=$subjectId&unit=$unitIndex&session=1&semester=$semester'>
                <button>session 1</button></a>";
                echo "<a href='admin_session_mba.php?user_id=" . $enid . "&subject_id=$subjectId&unit=$unitIndex&session=2&semester=$semester'>
                <button>session 2</button></a>";
                echo " </div>
            </div>";
            }
            echo "</div>";
            ?>
            




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

    <script type="text/javascript">
        $(document).ready(function () {
            $(".sidebar-btn").click(function () {
                $(".wrapper").toggleClass("collapse");
            });
        });
    </script>
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