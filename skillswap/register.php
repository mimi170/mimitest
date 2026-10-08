<?php
include "db.php";

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $teach = $_POST['teach'];
    $learn = $_POST['learn'];

    $sql = "INSERT INTO users (name, email, password, teach, learn)
            VALUES ('$name', '$email', '$password', '$teach', '$learn')";

    if (mysqli_query($conn, $sql)) {

        header("Location: login.php");
        exit();

    } else {

        echo "Registration Failed!";

    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Register - SkillSwap</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .auth-page {

            min-height: calc(100vh - 72px);

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 40px 20px;

        }

        .register-wrapper {

            width: 100%;

            max-width: 1000px;

            display: grid;

            grid-template-columns: 0.9fr 1.1fr;

            background: white;

            border-radius: 26px;

            overflow: hidden;

            border: 1px solid #e5e7f0;

            box-shadow:
                0 20px 60px rgba(31, 41, 70, 0.12);

        }

        /* LEFT SIDE */

        .register-info {

            background:
                linear-gradient(
                    145deg,
                    #171936,
                    #29235c,
                    #5146a8
                );

            padding: 50px;

            color: white;

            display: flex;

            flex-direction: column;

            justify-content: center;

            position: relative;

            overflow: hidden;

        }

        .register-info:before {

            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            border-radius: 50%;

            background: rgba(255,255,255,0.07);

            right: -110px;

            top: -110px;

        }

        .register-info:after {

            content: "";

            position: absolute;

            width: 190px;
            height: 190px;

            border-radius: 50%;

            background: rgba(126,112,255,0.15);

            left: -90px;

            bottom: -90px;

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

        .register-info h1 {

            color: white;

            font-size: 36px;

            margin: 0 0 15px;

            position: relative;

            z-index: 2;

        }

        .register-info > p {

            color: #dcdcff;

            line-height: 1.8;

            font-size: 15px;

            position: relative;

            z-index: 2;

        }

        .benefits {

            margin-top: 25px;

            position: relative;

            z-index: 2;

        }

        .benefit {

            margin: 14px 0;

            color: #eeeeff;

            font-size: 14px;

        }

        /* RIGHT */

        .register-form-area {

            padding: 45px 50px;

        }

        .register-form-area h2 {

            margin: 0 0 8px;

            color: #303650;

            font-size: 28px;

        }

        .form-subtitle {

            color: #85899b;

            margin-bottom: 28px;

            font-size: 14px;

        }

        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 18px;

        }

        .form-group {

            margin-bottom: 18px;

        }

        .form-group.full {

            grid-column: 1 / -1;

        }

        .form-group label {

            display: block;

            font-weight: 600;

            color: #3d4159;

            margin-bottom: 7px;

            font-size: 14px;

        }

        .form-group input {

            max-width: 100%;

            width: 100%;

            margin: 0;

            padding: 14px 15px;

            border-radius: 11px;

        }

        .register-button {

            width: 100%;

            margin: 8px 0 0;

            padding: 14px;

            font-size: 15px;

        }

        .login-text {

            text-align: center;

            margin-top: 22px;

            color: #777d91;

            font-size: 14px;

        }

        .login-text a {

            font-weight: 600;

            text-decoration: none;

        }

        .back-home {

            text-align: center;

            margin-top: 12px;

            font-size: 14px;

        }

        .back-home a {

            text-decoration: none;

            color: #777d91;

        }

        .back-home a:hover {

            color: #6257c7;

        }

        @media (max-width: 800px) {

            .register-wrapper {

                grid-template-columns: 1fr;

                max-width: 550px;

            }

            .register-info {

                padding: 35px;

            }

            .benefits {

                display: none;

            }

            .register-form-area {

                padding: 35px;

            }

        }

        @media (max-width: 550px) {

            .auth-page {

                padding: 25px 15px;

            }

            .form-grid {

                grid-template-columns: 1fr;

                gap: 0;

            }

            .form-group.full {

                grid-column: auto;

            }

            .register-info {

                padding: 30px 22px;

            }

            .register-form-area {

                padding: 28px 22px;

            }

            .register-info h1 {

                font-size: 29px;

            }

        }

    </style>

</head>

<body>

<nav>

    <a href="index.php">SkillSwap</a>

    <a href="index.php">Home</a>

    <a href="login.php">Login</a>

</nav>


<div class="auth-page">

    <div class="register-wrapper">


        <!-- LEFT SIDE -->

        <div class="register-info">

            <div class="brand-icon">
                🚀
            </div>

            <h1>
                Join SkillSwap
            </h1>

            <p>
                Create your account and become part of
                a student community where knowledge
                goes both ways.
            </p>


            <div class="benefits">

                <div class="benefit">
                    ✓ Share what you know
                </div>

                <div class="benefit">
                    ✓ Learn from other students
                </div>

                <div class="benefit">
                    ✓ Build meaningful connections
                </div>

                <div class="benefit">
                    ✓ Exchange skills easily
                </div>

            </div>

        </div>


        <!-- RIGHT SIDE -->

        <div class="register-form-area">

            <h2>
                Create Account
            </h2>

            <div class="form-subtitle">
                Fill in your information to get started.
            </div>


            <form method="POST">


                <div class="form-grid">


                    <div class="form-group">

                        <label>
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            placeholder="Enter your name"
                            required
                        >

                    </div>


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


                    <div class="form-group full">

                        <label>
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Create a password"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            📚 Skill I Can Teach
                        </label>

                        <input
                            type="text"
                            name="teach"
                            placeholder="Example: Python"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            🎯 Skill I Want to Learn
                        </label>

                        <input
                            type="text"
                            name="learn"
                            placeholder="Example: Web Development"
                            required
                        >

                    </div>


                </div>


                <button
                    type="submit"
                    name="register"
                    class="register-button"
                >
                    Create My Account →
                </button>


            </form>


            <div class="login-text">

                Already have an account?

                <a href="login.php">
                    Login here
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