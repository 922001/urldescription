<?php include('profile.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Add Unit</title>
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="form.css">
  



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
    .box-container{
      margin-top: -70px;
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
            <p><?php echo $user['name'];?></p>

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
                $var_value = $_GET['subject_id'];
                
                
                $query="SELECT * FROM subject WHERE id = $var_value";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result))
                    {
                        
                        $semester = $row['semester'];
                        $department = $row['department'];
                       
                        
                    }
                ?>
      <li class="item">

        <a href="admin_unitcard_mba.php?user_id=<?php echo $user['id']; ?>&department=<?php echo $department; ?>&subject_id=<?php echo  $var_value ; ?>&semester=<?php echo $semester ; ?>" class="menu-btn">
          <i class="fas fa-arrow-left"></i><span>Back</span>
        </a>
      </li>
    </div>
  </div>
  <!--sidebar end-->
  <!--main container start-->

  <div class="container">
    <div class="box-container">
    <div class="testbox">
    <form id="createform" method="post">
     <div class="banner">
        <h1>ADD UNIT IMAGE</h1>
      </div>
      <div class="item">
        <div class="name-item">
 
         
      
        </div>
        </div>
        
      
      <div class="item">
        <p>Image</p>
        <input type="text" name="image" id="image" placeholder="image" required>
      </div>
      <div class="item">
        <p>Enter the Subject Id</p>
        <input type="text" name="subjectid" id="subjectid" placeholder="Subject Id" required>
      </div>
      <div class="item">
        <p>Enter the Unit</p>
        <input type="text" name="unit" id="unit" placeholder="Unit" required>
      </div>
    
        <div class="btn-block">
          <button type="submit" onclick="createData()">Save</button>
        </div>
    </form>
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
  <script  type="text/javascript">
//       const navBar = document.querySelector("nav"),
//         menuBtns = document.querySelectorAll(".menu-icon"),
//         overlay = document.querySelector(".overlay");
//
//       menuBtns.forEach((menuBtn) => {
//         menuBtn.addEventListener("click", () => {
//           navBar.classList.toggle("open");
//
//         });
//       });
//
//       overlay.addEventListener("click", () => {
//         navBar.classList.remove("open");
//       });


          function createData()
          {
              $('#createform').click(
              function(e)
              {
                      console.log("Entered createData");
                      var element = document.getElementById("createform");
                      e.preventDefault();
                      $.ajax({
                          type: "POST",
                          url: '/lmscres/unit_creation.php',
                          data:  $(this).serialize(),
                          success: function(response)
                          {
                             	console.log(response);
                               alert(response);
                               element.reset();
                               Location.reload();
                          },
                           error: function(XMLHttpRequest, textStatus, errorThrown)
                         {
                             console.log(errorThrown);
                         }
                     });
                   });
          }
    </script>

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