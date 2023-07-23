<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <div class="split-screen">
        <div class="left">
            <section class="copy">
            </section>
        </div>

        <div class="right">
            
            <form action="" method="post"id="createform" onsubmit="return validate()">
                <section class="copy">
                <div class="img"><img src="loginlogo.png" alt="Cresent-Logo"></div>
                    <h2>Admin Signup</h2>
                    <div class="login-container">
                        <p>Already have an account?<a href="loginpage.php">
                        <strong>LOGIN</strong></a></p>
                    </div>
                </section>
                <div class="input-container">
               
                    <label for="username">USER NAME</label>
                    
                  
                    <input type="text" id="username" placeholder="Enter your Username" name="name" autocomplete="off" required>
                    
                    <i class="fas fa-user"></i>
                    <span id="usernameid" class="text-danger"></span> 
                  
                    
                </div>
               
                <div class="input-container">
                    
                    <label for="registernumber">REGISTER NUMBER</label>
                    <input type="text" id="registernumber" placeholder="Enter your Register Number" name="registernumber" autocomplete="off" required>
                    <i class="fas fa-id-badge"></i>
                </div>
                
                
                <div class="input-container">
                    <label for="email">EMAIL</label>
                    <input type="email"id="email" placeholder="Enter Your Email ID" name="email" title="Enter your email id" autocomplete="off" required>
                    <i class="fas fa-envelope"></i>
                    <span id="emailid" class="text-danger"></span> 
                </div>
                <div class="input-container">
                    <label for="password">PASSWORD</label>
                    <input type="password" id="password" placeholder="Enter your Password" name="password" title="Enter your password" autocomplete="off" required>
                    <i class="fas fa-lock"></i>
                    <span id="passwordid" class="text-danger"></span> 
                </div>
                
                <div class="input-container">
                    <label for="password">CONFIRM PASSWORD</label>
                    <input type="password" id="confirmPassword" placeholder="Confirm your password" title="Confirm your password" autocomplete="off" required >
                    <i class="fas fa-lock"></i>
                    <span id="confirmPasswordid" class="text-danger"></span> 
                </div>


            
                <button class="signup-btn" type="submit" name="register" onclick="updateData()"> Sign UP </button>
            </form>
        </div>
    </div>
    </div>
  
    <script type="text/javascript">
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


    function updateData() {
      $('#createform').click(
        function (e) {
          console.log("Entered createData");
          var element = document.getElementById("createform");
          e.preventDefault();
          $.ajax({
            type: "POST",
            url: '/lmscres/updatedata2.php',
            data: $(this).serialize(),
            success: function (response) {
              console.log(response);
              alert(response);
              element.reset();
              location.reload();
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
              console.log(errorThrown);
            }
          });
        });
    }
  </script>
  <script type="text/javascript">
    function validate() {

var user = document.getElementById('username').value;
var password = document.getElementById('password').value;
var Confirmpassword = document.getElementById('confirmPassword').value;
var email = document.getElementById('email').value;



 if ((user.length <=2)  ||  (user.length >=20)) {
  document.getElementById('usernameid').innerHTML =" ** user name should be between 2 to 20 characters "
}else if (!isNaN(user)) {
  document.getElementById('usernameid').innerHTML = " ** Only Characters are allowed"

}


if (password == "") {
  document.getElementById('passwordid').innerHTML =" ** Enter Password"
  return false;
}else if (password == user) {
  document.getElementById('passwordid').innerHTML =" ** Password cant'be your FirstName or LastName"
  return false;
}else if ((password.length <=6)  ||  (password.length >=20)) {
  document.getElementById('passwordid').innerHTML =" ** user password should be between 6 to 20 characters "
  return false;
}

if (Confirmpassword == "") {
  document.getElementById('confirmPasswordid').innerHTML =" ** Enter ConfirmPassword"
  return false;
}else if (password!= Confirmpassword) {
  document.getElementById('confirmPasswordid').innerHTML =" ** Password does'nt Match"
  return false;
}




if (email == "") {
  document.getElementById('emailid').innerHTML = " ** Enter Email ID"
  return false;
}else if (email.indexOf('@') <= 0) {
  document.getElementById('emailid').innerHTML = " **  @ Invalid Position"
  return false;
}else if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
  document.getElementById('emailid').innerHTML = " **  . Invalid Position"
  return false;
}


}



</script>
<?php
    $name = $_POST['name'];
    $registernumber = $_POST['registernumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into admin(name,registernumber,email, password) values(?, ?, ?, ?)");
		$stmt->bind_param("siss", $name, $registernumber,$email,$password);
		
		$execval = $stmt->execute();
		
    echo '<script>alert("registration succesful")</script>';
		$stmt->close();
		$conn->close();
	}
?>
</body>
</html>
<?php include('footer.php'); ?>