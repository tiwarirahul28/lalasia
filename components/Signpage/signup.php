<?php 
// include_once("./ProductPage/CommonFunction.php");
include_once(__DIR__. '/../ProductPage/CommonFunction.php');
$success = 0;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("./Database/connect.php");
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $cpassword = $_POST['confirm_password'];
    $ipAddress = getIPAddress();

    $user_exist = "SELECT * FROM `users` WHERE user_email = '$email'";
    $exist_result = mysqli_query($connection, $user_exist);
    $user_exist_count = mysqli_num_rows($exist_result);
    if ($user_exist_count > 0) {
        echo "<script>alert('User with this email already exists')</script>";
    }elseif($password != $cpassword){
        echo "<script>alert('Passwords do not match')</script>";
    } 
    else{
        $Insert_User = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`, `user_cpassword`, `user_ip`) VALUES ('$username', '$email', '$hash_password', '$cpassword', '$ipAddress')";
        $Insert_Result = mysqli_query($connection, $Insert_User);
        if($Insert_Result){
            echo "<script>alert('Registration successful')</script>";
            header('location:sign-in.php');
        }else{
            echo "<script>alert('Registration failed')</script>";
        }
    }
}
?>
<div class="signup--section">
    <div class="signup--container">
        <div class="signup--img">
            <div class="logo">
                <img src="./images/logo.png" alt="" />
            </div>
            <div class="text--content">
                <div class="images-box">
                    <img src="./images/sign/Frame4.svg" alt="" />
                    <img src="./images/sign/stock.svg" alt="" />
                </div>
            </div>
        </div>
        <div class="signup--content">
            <div class="account--link">
                <p>have an account? <a href="sign-in.php">Sign in!</a></p>
            </div>
            <div class="form--content">
                <div class="form-box">
                    <h2>Get Started With MAKER</h2>
                    <p>Getting started is easy</p>
                    <form action="" method="POST">
                        <div>
                            <input type="text" name="name" placeholder="Full Name" required autocomplete="off">
                        </div>
                        <div>
                            <input type="text" name="email" placeholder="Enter Email" required autocomplete="off">
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Password" required autocomplete="off">
                        </div>
                        <div>
                            <input type="password" name="confirm_password" placeholder="Confirm Password" required autocomplete="off">
                        </div>
                        <div class="">
                            <input type="submit" value="Create Account">
                        </div>
                    </form>
                    <p class="bottom-para">By continuing you indicate that you read and agreed to the Terms of Use</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .signup--section{
        width: 100%;
        height: 100vh;
    }
    .signup--container{
        display: grid;
        grid-template-columns: 45% 55%;
        height: 100%;
    }
    .signup--img{
        background-image: url(./images/sign/signup.svg);
        background-repeat: no-repeat;
        background-position: center;
        height: 100%;
        background-size: 100%;
        padding: 50px;
    }
    .signup--img .text--content{
        display: flex;
        align-items: center;
        height: 100%;
    }
    .signup--img .images-box{
        display: flex;
        flex-direction: column;
        gap: 30px;
        width: 40%;
    }
    .signup--img .images-box img{
        width: 100%;
    }
    .signup--content{
        background-color: #f0f2f5;
        width: 100%;
        height: 100%;
        padding: 50px;
    }
    .signup--content .account--link{
        width: 100%;
        display: flex;
        justify-content: end;
    }
    .signup--content .account--link p{
        font-size: 14px;
        font-weight: 300;
        line-height: 14.5px;
        color: #000000;
    }
    .signup--content .account--link a{
        font-weight: 400;
        color: #20DC49;
    }
    .signup--content .form--content{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        text-align: center;
    }
    .signup--content .form--content h2{
        font-size: 24px;
        font-weight: 600;
        line-height: 44px;
        color: #000000;
    }
    .signup--content .form--content p{
        font-size: 15.04px;
        font-weight: 400;
        line-height: 29px;
        color: #7E7E7E;
    }
    form {
        width: 80%;
        margin: auto;
        text-align: left;
    }
    form div{
        display: flex;
        flex-direction: column;
        margin: 25px 0;
    }
    form div input{
        padding: 20px;
        border-radius: 10px;
        border: 1px solid #D9D9D9;
    }
    form div input::placeholder{
        font-size: 14px;
        font-weight: 400;
        line-height: 14.5px;
        color: #5A5A5A;
    }
    form div input[type=submit]{
        background-color: #20DC49;
        cursor: pointer;
        transition: 0.3s;
    }
    form div input[type=submit]:hover{
        background-color: transparent;
        border: 1px solid #20DC49;
    }
    .bottom-para{
        margin-top: 5em;
    }
    @media screen and (max-width: 768px) {
        .signup--container{
            grid-template-columns: 100%;
        }
        .signup--img{
            display: none;
        }
        /* .signup--content{
            background-image: url(./images/sign/signup.svg);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100vh;
            padding: 50px;
            background-color: transparent;
        } */
        .signup--content{
            padding: 50px 20px
        }
        form{
            width: 100%;
        }
    }
</style>