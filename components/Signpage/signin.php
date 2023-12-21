<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("./Database/connect.php");

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql_check_user = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result_check_user = mysqli_query($connection, $sql_check_user);

    if ($result_check_user) {
        $num = mysqli_num_rows($result_check_user);
        if ($num > 0) {
            $row_data = mysqli_fetch_assoc($result_check_user);
            if (password_verify($password, $row_data['user_password'])) {
                session_start();
                $_SESSION['user_name'] = $row_data['user_name']; // Corrected variable
                header('location:index.php');
            } else {
                echo "<script>alert('Password is incorrect!');</script>";
            }            
        } else {
            echo "<script>alert('Invalid login');</script>";
        }
    } else {
        // Handle query error
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<?php
 // if ($result_check_user) {
    //     $num = mysqli_num_rows($result_check_user);
    //     if ($num > 0) {
    //         echo "Login successful";
    //         // $Login = 1;
    //         session_start();
    //         $_SESSION['user_name'] = $username;
    //         header('location:index.php');
    //     } else {
    //         echo "Invalid login";
    //         // $Invalid = 1;
    //     }
    // }
?>

<div class="signin--section">
    <div class="signin--container">
        <div class="signin--content">
            <div class="account--link">
                <img src="./images/logo.png" alt="" />
                <p>Don’t have an account? <a href="sign-up.php">Sign up!</a></p>
            </div>
            <div class="form--content">
                <div class="form-box">
                    <h2>Welcome Back</h2>
                    <p>Login into your account</p>
                    <form action="" method="POST">
                        <div>
                            <input type="text" name="email" placeholder="Enter Email" autocomplete="off">
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="Password" autocomplete="off">
                        </div>
                        <div class="">
                            <input type="submit" value="Log in">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="signin--img">
            <div class="text--content">
                <div class="images-box">
                    <!-- <img src="./images/sign/signin-card.svg" alt="" /> -->
                    <img src="./images/sign/notch.svg" alt="" />
                    <p>Today, we create innovative solutions to the challenges that consumers face in both their everyday lives and events.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .signin--section{
        width: 100%;
        height: 100vh;
    }
    .signin--container{
        display: grid;
        grid-template-columns: 55% 45%;
        height: 100%;
    }
    .signin--img{
        background-image: url(./images/sign/signin.svg);
        background-repeat: no-repeat;
        background-position: center;
        height: 100%;
        background-size: 100%;
        padding: 50px;
    }
    .signin--img .text--content{
        display: flex;
        align-items: end;
        height: 100%;
    }
    .signin--img .images-box{
        display: flex;
        flex-direction: column;
        gap: 30px;
        width: 70%;
        justify-content: end;
        background-image: url(./images/sign/signin-card.svg);
        background-size: 100%;
        padding: 30px;
        background: #FFF2F221;
    }
    .signin--img .images-box img{
        width: 70%;
    }
    .signin--img .images-box p{
        font-size: 20px;
        font-weight: 400;
        line-height: 32.97px;
        color: #ffffff;
    }
    .signin--content{
        background-color: #f0f2f5;
        width: 100%;
        height: 100%;
        padding: 50px;
    }
    .signin--content .account--link{
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .signin--content .account--link p{
        font-size: 14px;
        font-weight: 300;
        line-height: 14.5px;
        color: #000000;
    }
    .signin--content .account--link a{
        font-weight: 400;
        color: #20DC49;
    }
    .signin--content .form--content{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        text-align: center;
    }
    .signin--content .form--content h2{
        font-size: 36px;
        font-weight: 600;
        line-height: 44px;
        color: #000000;
    }
    .signin--content .form--content p{
        font-size: 18px;
        font-weight: 300;
        line-height: 29px;
        color: #000000;
        padding-top: 10px;
    }
    .form-box{
        width: 60%;
        margin: auto;
    }
    form {
        width: 100%;
        margin: auto;
        text-align: left;
    }
    form div{
        display: flex;
        flex-direction: column;
        margin: 40px 0;
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
        background-color: transparent;
        cursor: pointer;
        transition: 0.3s;
    }
    form div input[type=submit]:hover{
        background-color: #20DC49;
    }
    .bottom-para{
        margin-top: 5em;
    }
    @media screen and (max-width: 768px) {
        .signin--container{
            grid-template-columns: 100%;
        }
        .signin--content{
            padding: 50px 20px;
        }
        .signin--img{
            display: none;
        }
        .form-box{
            width: 100%;
        }
        .account--link img{
            width: 100px;
        }
    }
</style>