<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgetpassword</title>
    <link rel="stylesheet" href="forgetpassword.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>

    <?php
       if(isset($_SESSION['status']))
       {
        ?>
        <div class="alert alert-success">
            <h5><?= $_SESSION['status'];?></h5>?
            
        </div>
        <?php
        unset($_SESSION['status']);
       }
       ?>
    <div class="split-screen">
        <div class="left">
            <section class="copy">
            </section>
        </div>

        <div class="right">
            
            <form action="sendmail.php" method="post">
                <section class="copy">
                    <div class="img"><img src="loginlogo.png" alt="Cresent-Logo"></div>
                    <h2>RESET PASSWORD</h2>
                    
                </section>
                
                <div class="input-container">
                    
                    <label for="email">EMAIL</label>
                    <input type="email" id="email" placeholder="Enter your Email Address" name="email" autocomplete="off" required>
                    <i class="fas fa-id-badge"></i>
                </div>
                
                <button class="reset-btn" type="submit" name="reset" value="reset"> Send password reset link </button>
                    
            </form>
            
        </div>
    </div>
    </div>
    
</body>
</html>

