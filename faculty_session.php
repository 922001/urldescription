<?php include('profile3.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Faculty dashbord</title>
    <link rel="stylesheet" href="navbar.css">
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

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            margin-left: 65px;
            width: 900px;
            height: 450px;
            margin-top: 50px;
        }

        h1 {
            margin-top: 20px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .contain {
            padding: 2px 16px;
        }

        .card1 {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            margin-top: 30px;
            margin-left: 20px;
            width: 250px;
            height: 200px;
            display: inline-table;
        }

        .card1:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .contain1 {
            padding: 2px 16px;
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
                    
                    <li><a href="#"><i class="fas fa-bell"></i></a></li>
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
            $subid = $_GET['subject_id'];
            $unit = $_GET['unit'];
            $session = $_GET['session'];
            $sem = $_GET['semester'];
            $userid = $_GET['user_id'];
            ?>

            




            <?php
            $unitName = $_GET['unit'];
            $sessionName = $_GET['session'];
            $userId = $_GET['user_id'];
            $subId = $_GET['subject_id'];
            $sem = $_GET['semester'];
            $dep = $_GET['department'];
            $sem1 = $_GET['sem'];
            ?>
            <li class="item">
                <a href="faculty_unitcard.php?user_id=<?php echo $user['id']; ?>&department=<?php echo $dep; ?>&subject_id=<?php echo $subId; ?>&sem=<?php echo $sem1; ?>&semester=<?php echo $sem; ?>"
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
            $var_value = $_GET['subject_id'];
            $unit = $_GET['unit'];
            $sem = $_GET['semester'];
            
            $query = "SELECT * FROM session WHERE subject_id = '$var_value' and unit = '$unit' ";
            $result = mysqli_query($conn, $query);
            $ebook = null;
            while ($row = mysqli_fetch_assoc($result)) {

                $ebook = $row['ebook_link'];
            }



            echo "<div class='card'>
 <center>
 <h1><b>UNIT $unitName - SESSION $sessionName</b></h1>
 </center>
 <br>";


            echo "<hr>
  <div class='contain'>
  <div class='card1'>
 <center>
 <a href='faculty_video1.php?department=$dep&user_id=$userId&subject_id=$subId&sem=$sem1&session_id=$sessionName&unit=$unitName&semester=$sem'>
 <img src='evideo.jpg' alt='Avatar' style='width:100%'>
 </center>
 

  <div class='contain1'>
    
    <p><b>VIDEO</b></p> 
  </div>
</div> 
<div class='card1'>
 <center>
 <a href='$ebook' target='blank'>
 <img src='ebook.jpg' alt='Avatar' style='width:100%'>
 </center>
 

  <div class='contain1'>
    
    <p><b>FLIPBOOK</b></p> 
  </div>
</div> 
<div class='card1'>
 <center>
 
 <a href='faculty_quiz.php?department=$dep&user_id=$userId&subject_id=$subId&sem=$sem1&unit=$unitName&session=$sessionName&semester=$sem&n=1'>
 <img src='quiz3.jpg' alt='Avatar' style='width:100%'>
 </center>
 
 

  <div class='contain1'>
    
    <p><b>ASSESSMENT</b></p> 
  </div>
</div> 


  </div>
</div>";
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

        $query = "UPDATE faculty SET image = '$imageName' WHERE id = $id";
        mysqli_query($conn, $query);


    }
    ?>

</body>

</html>
<?php include('footer.php'); ?>