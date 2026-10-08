<?php
session_start();
include "db.php";

$message = "";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        $_SESSION['email'] = $user['email'];
        $_SESSION['user_id'] = $user['id'];

        header("Location: dashboard.php");
        exit();

    } else {

        $message = "Invalid Email or Password!";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Login - SkillSwap</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .auth-page {
            min-height: calc(100vh - 72px);

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px 20px;
        }

        .login-wrapper {
            width: 100%;

            max-width: 950px;

            display: grid;

            grid-template-columns: 1fr 1fr;

            background: white;

            border-radius: 26px;

            overflow: hidden;

            border: 1px solid #e5e7f0;

            box-shadow:
                0 20px 60px rgba(31, 41, 70, 0.12);
        }

        /* LEFT SIDE */

        .login-info {

            background:
                linear-gradient(
                    145deg,
                    #171936,
                    #29235c,
                    #5146a8
                );

            padding: 55px;

            color: white;

            display: flex;

            flex-direction: column;

            justify-content: center;

            position: relative;

            overflow: hidden;
        }

        .login-info:before {

            content: "";

            position: absolute;

            width: 260px;
            height: 260px;

            border-radius: 50%;

            background: rgba(255,255,255,0.07);

            right: -100px;
            top: -100px;
        }

        .login-info:after {

            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(126,112,255,0.15);

            left: -80px;
            bottom: -80px;
        }

        .brand-icon {

            width: 58px;
            height: 58px;

            border-radius: 16px;

            background: rgba(255,255,255,0.13);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 27px;

            margin-bottom: 25px;

            position: relative;

            z-index: 2;
        }

        .login-info h1 {

            color: white;

            font-size: 38px;

            margin: 0 0 15px;

            position: relative;

            z-index: 2;
        }

        .login-info p {

            color: #dcdcff;

            line-height: 1.8;

            font-size: 15px;

            position: relative;

            z-index: 2;
        }

        .feature-list {

            margin-top: 25px;

            position: relative;

            z-index: 2;
        }

        .feature {

            margin: 14px 0;

            color: #eeeeff;

            font-size: 14px;
        }

        /* RIGHT SIDE */

        .login-form-area {

            padding: 55px;

            display: flex;

            flex-direction: column;

            justify-content: center;
        }

        .login-form-area h2 {

            margin: 0 0 8px;

            color: #303650;

            font-size: 28px;
        }

        .login-subtitle {

            color: #85899b;

            margin-bottom: 30px;

            font-size: 14px;
        }

        .form-group {

            margin-bottom: 20px;
        }

        .form-group label {

            display: block;

            font-weight: 600;

            color: #3d4159;

            margin-bottom: 8px;

            font-size: 14px;
        }

        .form-group input {

            max-width: 100%;

            margin: 0;

            padding: 15px 16px;

            border-radius: 11px;
        }

        .login-button {

            width: 100%;

            margin: 5px 0 0;

            padding: 14px;

            font-size: 15px;
        }

        .error-message {

            background: #fff1f1;

            color: #b54040;

            border: 1px solid #f2d0d0;

            padding: 12px 15px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;

            font-weight: 600;
        }

        .register-text {

            text-align: center;

            margin-top: 25px;

            color: #777d91;

            font-size: 14px;
        }

        .register-text a {

            font-weight: 600;

            text-decoration: none;
        }

        .back-home {

            text-align: center;

            margin-top: 15px;

            font-size: 14px;
        }

        .back-home a {

            text-decoration: none;

            color: #777d91;
        }

        .back-home a:hover {

            color: #6257c7;
        }

        @media (max-width: 750px) {

            .login-wrapper {

                grid-template-columns: 1fr;

                max-width: 520px;
            }

            .login-info {

                padding: 35px;

            }

            .login-info h1 {

                font-size: 30px;
            }

            .login-form-area {

                padding: 35px;
            }

            .feature-list {

                display: none;
            }

        }

        @media (max-width: 450px) {

            .auth-page {

                padding: 25px 15px;
            }

            .login-info,
            .login-form-area {

                padding: 28px 22px;
            }

        }

    </style>

</head>

<body>

<nav>

    <a href="index.php">SkillSwap</a>

    <a href="index.php">Home</a>

    <a href="register.php">Register</a>

</nav>


<div class="auth-page">

    <div class="login-wrapper">


        <!-- LEFT -->

        <div class="login-info">

            <div class="brand-icon">
                🔐
            </div>

            <h1>
                Welcome Back
            </h1>

            <p>
                Login to your SkillSwap account and
                continue learning, teaching, and
                connecting with other students.
            </p>


            <div class="feature-list">

                <div class="feature">
                    ✓ Share your skills
                </div>

                <div class="feature">
                    ✓ Discover new skills
                </div>

                <div class="feature">
                    ✓ Connect with students
                </div>

                <div class="feature">
                    ✓ Exchange knowledge
                </div>

            </div>

        </div>


        <!-- RIGHT -->

        <div class="login-form-area">

            <h2>
                Sign In
            </h2>

            <div class="login-subtitle">
                Enter your account details to continue.
            </div>


            <?php if ($message != "") { ?>

                <div class="error-message">

                    <?php echo $message; ?>

                </div>

            <?php } ?>


            <form method="POST">


                <div class="form-group">

                    <label>
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    name="login"
                    class="login-button"
                >
                    Login to SkillSwap →
                </button>


            </form>


            <div class="register-text">

                Don't have an account?

                <a href="register.php">
                    Create an account
                </a>

            </div>


            <div class="back-home">

                <a href="index.php">
                    ← Back to Home
                </a>

            </div>


        </div>


    </div>

</div>

</body>

</html>