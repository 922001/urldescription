<?php include('profile1.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Faculty dashbord</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="video.css" />



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
                   
                    <li><a href="#"><i class="fas fa-bell"></i></a></li>
                    <li><a href="logout.php"><i class="fas fa-power-off"></i></a></li>
                </ul>
            </div>
        </div>
        <!--header menu end-->
        <?php
        $subid = $_GET['subject_id'];
        $unit = $_GET['unit'];
        $session = $_GET['session_id'];
        $sem = $_GET['semester'];
        $dep = $_GET['department'];
        $sem1 = $_GET['sem'];
        ?>

        <div class="sec-header">
            <div class="sidebar-btn"><a href="faculty_session.php?department=<?php echo $dep; ?>&user_id=<?php echo $user['id']; ?>&subject_id=<?php echo $subid; ?>&unit=<?php echo $unit; ?>&sem=<?php echo $sem1; ?>&session=<?php echo $session; ?>&semester=<?php echo $sem;?>" style="color:white";>
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
        <div class="box-container">
        <?php
                $subject_id = $_GET['subject_id'];
                $session_id =  $_GET['session_id'];
                $unit = $_GET['unit'];
                $name = $_GET['name'];

                
                
                $query="SELECT * FROM modules WHERE subject_id = '$subject_id' and session_id = '$session_id' and unit='$unit'";
                $result = mysqli_query($conn, $query);
                $namearr = array();
                $videoarr = array();
                $count = 0;
                $index = 0;
                while($row = mysqli_fetch_assoc($result))
                     {
                        $name = $row['name'];
                        $video_link = $row['video_link'];
                        $namearr[$count]=$name;
                        $videoarr[$count]=$video_link;
                        $count++;
                     }  
                        
?>
                     
<div id='container' class='container'>
        
        <div class='inside-nav'>
        <h1><?php echo $name ?> - Video Content</h1>
       
            <ul class="ulist">
                
                <!-- <li><a href='#'>Edit</a></li> -->
              </ul>
        </div>
          <div class='content'>
          <div class='main-video'>
              <div class='video'>
                  <h1 id="header_id" value="Module 1">Module 1 - Video Content</h1>
                  <video src='<?php echo $videoarr[$index] ?>' id='video' controls muted autoplay controlsList="nodownload"></video>
                  <button type='submit' class='top-btnn' onclick='backVideo(<?php echo json_encode($videoarr) ?>, <?php echo $count ?>)'>PREVIOUS</button> 
                  <button  type='submit' class='top-btnn1' onclick='getVideo(<?php echo json_encode($videoarr) ?>, <?php echo $count ?>)'>NEXT</button> 
                  <br>
                  <br>
                  <a href="https://docs.google.com/forms/d/e/1FAIpQLSdom7p2xbWwWp9v0KMoWDOYn89YzgH5wr-IwT9BZduES6TpsQ/viewform?embedded=true" width="640" height="579" frameborder="0" marginheight="0" marginwidth="0"Loading…"><h3>Click here to fill up the feedback form </h3></a>
                
                  
                  
              </div>
          </div>
      </div>  

    </div>

    <script>
      videoPlayer = document.getElementById("video");
      h1s= document.getElementById("header_id");
      console.log(h1s.textContent);
      idx = 0;
      headerIndex = 1;
      function getVideo(videoArr, count)
      {
      idx = (idx+1)%count;
      headerIndex = (headerIndex+1);
      if(headerIndex > count)
      {
        headerIndex = 1;
      }
      console.log("Header "+headerIndex);
      h1s.textContent = "Module "+headerIndex+" - Video Content";
      console.log(idx+" count "+count);
      var nextVideo = videoArr[idx];
      videoPlayer.src = nextVideo;
      videoPlayer.play();
      }
      function backVideo(videoArr, count)
      {
        console.log(idx);
        idx = (idx-1)%count;
      headerIndex = (headerIndex-1);
      if(headerIndex < 1)
      {
        headerIndex = count;
      }
      if(idx < 0)
      {
        idx = count - 1;
      }
      console.log("Header "+headerIndex);
      h1s.textContent = "Module "+headerIndex+" - Video Content";
      console.log(idx+" count "+count);
      var nextVideo = videoArr[idx];
      videoPlayer.src = nextVideo;
      videoPlayer.play();
      }
    
    </script>

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

        $query = "UPDATE student SET image = '$imageName' WHERE id = $id";
        mysqli_query($conn, $query);


    }
    ?>

</body>

</html>
<?php include('footer.php'); ?>