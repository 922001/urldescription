<?php include('profile2.php'); ?>
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Superadmin dashboard</title>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="form.css">




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script> -->
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
            width: 450px;
            height: 350px;
            display: inline-table;
            border-radius: 5px;
            margin-left: 10px;
            margin-top: 100px;

        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        img {
            border-radius: 5px 5px 0 0;
        }

        .container {
            padding: 80px 9%;
            padding-bottom: 100px;
            margin-right: 100px;
            margin-top: 50px;
            padding-right: 0px;
            margin-left: 280px;


        }


        .box-container {
            margin: 2%;
            display: block;
            box-sizing: border-box;
            margin-right: 200px;
        }

        h1,
        h3 {
            text-align: center;
        }

        table {
            border-spacing: 1px;
            table-layout: fixed;
            margin-left: auto;
            margin-right: auto;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            color: green;
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
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


                <form class="form" id="form" action="profile_script.php?user_id=<?php echo $user['id'] ?>"
                    enctype="multipart/form-data" method="post">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="upload">
                        <img src="img/<?php echo $user['image']; ?>" id="image">
                        <p>
                            <?php echo $user['username']; ?>
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

            <li class="item">
                <a href="superadmin1.php?user_id=<?php echo $user['id']; ?>" class="menu-btn">
                    <i class="fas fa-arrow-left"></i><span>Back</span>
                </a>
            </li>

        </div>
    </div>
    <!--sidebar end-->
    <!--main container start-->

    <div class="container">

        <div class="box-container">
            <table id="tab1">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Action</th>

                    </tr>
                </thead>

            </table>






        </div>
    </div>
    <script type="text/javascript" src="profile_script.js"></script>
    <script>
        function myFunction() {
            alert('Currently unavailable')
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#tab1').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": 'fetch_data.php'

            });
        });
        //   const navBar = document.querySelector("nav"),
        //     menuBtns = document.querySelectorAll(".menu-icon"),
        //     overlay = document.querySelector(".overlay");

        //   menuBtns.forEach((menuBtn) => {
        //     menuBtn.addEventListener("click", () => {
        //       navBar.classList.toggle("open");

        //     });
        //   });

        //   overlay.addEventListener("click", () => {
        //     navBar.classList.remove("open");
        //   });


        function createData() {
            $('#createform').click(
                function (e) {
                    console.log("Entered createData");
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: '/lmscres/superadmin_student.php',
                        data: $(this).serialize(),
                        success: function (response) {
                            console.log(response);
                            alert(response);
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            console.log(errorThrown);
                        }
                    });
                });
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
    <!-- <script type="text/javascript">
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
    </script> -->


    <?php
    $conn = mysqli_connect("localhost", "root", "", "creslms");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $rrn = $_POST['rrn'];
        $email = $_POST['email'];
        $department = $_POST['department'];
        $phonenumber = $_POST['phonenumber'];
        $year = $_POST['year'];
        $username = $user['username'];



        $sql = "INSERT INTO student (name,registernumber,email,department,phonenumber,year) 
VALUES ('$name','$rrn','$email','$department','$phonenumber','$year')";
        mysqli_query($conn, "insert into activity_log (date,name,action) values(NOW(),'$username','Added student $name')");

        if (!mysqli_query($conn, $sql)) {

            echo "data not insert";
        } else {

            echo '<script>alert("registration succesful")</script>';



        }


    }



    ?>


</body>

</html>
<?php include('footer.php'); ?>