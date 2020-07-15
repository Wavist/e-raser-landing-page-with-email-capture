<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>e-raser</title>
</head>
<body>


<?php

require_once "config.php";
 
// Define variables and initialize with empty values
$email = "";
$email_err  = "";
$success = "Success";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE email = ?";
             
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    
    // Check input errors before inserting in database
    if(empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (email) VALUES (?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(!mysqli_stmt_execute($stmt)){
                echo "Something went wrong. Please try again later.";
            }
               
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}

?>


<div class="text-center text-white header1">
    <h3 class="header"><b>e-raser</b></h3>

    
    <div class="box1"></div>


    <h1 class="" style="font-size: 70px;"><b>Take Control Over <br> Your Privacy</b></h1>

    <div class="box3"></div><br>
    <!-- <div class="box4"></div> -->

    <p>A mobile solution that erases your <br>
        phone number from another person’s device.</p>

        <center>
        <form method="post" action="<?php $_PHP_SELF ?>">
        <div class="form-group">
            <input type="email" name="email"  placeholder="Enter Email Address" class="form-control" value="<?php echo $email; ?>">
            <span class="help-block"><?php echo $email_err; ?></span>
            <input type="submit" class="btn btn-mute" value="Notify Me">
        </div>
        </form>
       </center>

       <div class="box5"></div><br>
       <!-- <div class="box6"></div> -->

    </div>

    <div class="container text-center">
        <h3 class="steps">Three Steps To Control Your Privacy</h3>

        <div class="row p-2">
            <div class="col">
                <div class="card light">
                    <div class="container">
                    <p class="upper"><b>Get phone number</b></p>
                    <p class="lower">Get the phone number of the
                        recipient—the person who
                        has your phone number.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card light">
                    <div class="container">
                    <p class="upper"><b>Connect to device</b></p>
                    <p class="lower middle">With the phone number inputed, 
                        Connect to the recipient’s device
                        to access their contact list.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card light">
                    <div class="container">
                        <p class="upper"><b>Search and delete</b></p>
                    <p class="lower bottom">Search for your phone number
                        in their contact list and voila!</p>
                    </div>
                </div>
            </div>
        </div></div>

<section>
    <h3 class="step">Preview on what to expect</h3>

    <div class="mobilediv">
    <img src="assets/img/Vector 3.png" alt="" class="left1">
    <img src="assets/img/Login screen.png" alt="" class="mobile_screens">
    <img src="assets/img/Vector 3 (1).png" alt="" class="right1">
    </div>

    <div>
    <img src="assets/img/Home screen (1).png" alt="" class="mobile_screens">
    <img src="assets/img/Vector 3 (1).png" alt="" class="right2">
    </div>

    <div>
    <img src="assets/img/Vector 3.png" alt="" class="left2">
    <img src="assets/img/Home screen-1 (1).png" alt="" class="mobile_screens">
    <img src="assets/img/Vector 3 (1).png" alt="" class="right3">
    <p class="right4 text-center"><img src="assets/img/Vector 3 (2).png" alt="">03. <br>
Click to delete your <br> phone number from device</p>
    </div>
    
    <p class="step"><b>Voila!</b><img src="assets/img/pngkey 2.png" alt=""></p>
    
    <div>
    <img src="assets/img/Home screen-2.png" alt="" class="mobile_screens">
    </div>

</section>

<div class=" text-center">
        <div class="footcard" style="height: 55rem;">

        <div class="box7"></div><br>
       <!-- <div class="box8"></div> -->

            <div class="foot-img">
                <img src="assets/img/Home screen-1 (2).png" alt="" class="innerfoot-img">
                <img src="assets/img/Login screen (1).png" alt="" class="innerfoot-img">
                <img src="assets/img/Splash screen.png" alt="" class="innerfoot-img">
                <img src="assets/img/Home screen (2).png" alt="" class="innerfoot-img">
                <img src="assets/img/Home screen-1 (2).png" alt="" class="innerfoot-img">
            </div>
            <div class="container links">
                <a href=""><img src="assets/img/Vector (2).png" width="150px" alt=""></a>
                <a href=""><img src="assets/img/Vector (3).png" width="150px" alt=""></a>
            </div>
        </div>

        <p class="stepss">Be the first to get notified when this <br>
            digital solution is ready.</p>
            <center>
            <form method="post" action="<?php $_PHP_SELF ?>">
                 <input type="email" name="email" placeholder="Enter Email Address" class="form-control" value="<?php echo $email; ?>">
                 <span class="help-block"><?php echo $email_err; ?></span>
                 <input type="submit" class="btn btn-mute" value="Notify Me">
            </form>
            </center>
           
            <div class="box9"></div><br>
       <!-- <div class="box10"></div> -->

            <p class="header" style="margin-top: 8rem;font-size: 14px;">&#169 2020 e-raser, All rights reserved</h3> 
    </div>
</body>
</html>