```php
<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['upload_pic'])) {

    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {

        $file_name = $_FILES['profile_pic']['name'];
        $tmp_name = $_FILES['profile_pic']['tmp_name'];

        $allowed = array("jpg", "jpeg", "png", "webp");

        $extension = strtolower(
            pathinfo($file_name, PATHINFO_EXTENSION)
        );

        if (in_array($extension, $allowed)) {

            $new_name = "profile_" . $user_id . "." . $extension;

            $upload_folder = "uploads/";

            if (!is_dir($upload_folder)) {
                mkdir($upload_folder);
            }

            move_uploaded_file(
                $tmp_name,
                $upload_folder . $new_name
            );

            $sql = "UPDATE users
                    SET profile_pic='$new_name'
                    WHERE id='$user_id'";

            mysqli_query($conn, $sql);
        }
    }
}

$sql = "SELECT * FROM users WHERE id='$user_id'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>

<head>

    <title>My Profile - SkillSwap</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .profile-cover {
            background:
                linear-gradient(
                    135deg,
                    #151832,
                    #29235c,
                    #5146a8
                );

            border-radius: 28px;

            padding: 45px 45px 35px;

            position: relative;

            overflow: hidden;

            color: white;

            box-shadow:
                0 20px 50px rgba(31, 29, 75, 0.22);
        }

        .profile-cover:before {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            background: rgba(255,255,255,0.07);

            right: -100px;
            top: -140px;
        }

        .profile-cover:after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(123,110,255,0.16);

            right: 180px;
            bottom: -120px;
        }

        .profile-main {
            position: relative;

            z-index: 2;

            display: flex;

            align-items: center;

            gap: 28px;
        }

        .profile-photo-wrap {
            position: relative;
        }

        .profile-photo {
            width: 145px;
            height: 145px;

            object-fit: cover;

            border-radius: 50%;

            border: 5px solid rgba(255,255,255,0.95);

            box-shadow:
                0 10px 30px rgba(0,0,0,0.22);

            background: #eeeeff;
        }

        .profile-info h1 {
            color: white;

            font-size: 36px;

            margin: 0 0 8px;
        }

        .profile-email {
            color: #dcdcff;

            margin: 0 0 14px;

            font-size: 15px;
        }

        .student-badge {
            display: inline-block;

            padding: 7px 14px;

            background: rgba(255,255,255,0.13);

            border: 1px solid rgba(255,255,255,0.18);

            border-radius: 20px;

            font-size: 13px;

            color: #f0efff;
        }

        .upload-area {
            position: relative;

            z-index: 3;

            margin-top: 30px;
        }

        .upload-area input {
            background: white;

            color: #555;

            max-width: 330px;
        }

        .profile-grid {
            display: grid;

            grid-template-columns: 2fr 1fr;

            gap: 22px;

            margin-top: 25px;
        }

        .profile-card {
            background: white;

            padding: 28px;

            border-radius: 20px;

            border: 1px solid #e7e9f2;

            box-shadow:
                0 8px 25px rgba(30,35,70,0.07);
        }

        .profile-card h2 {
            margin-top: 0;

            color: #303650;

            font-size: 21px;
        }

        .profile-card p {
            color: #73788d;

            line-height: 1.7;
        }

        .skill-box {
            display: flex;

            align-items: center;

            gap: 18px;

            padding: 20px;

            background: #f8f8fc;

            border-radius: 15px;

            margin-top: 15px;
        }

        .skill-box-icon {
            width: 50px;
            height: 50px;

            flex-shrink: 0;

            display: flex;

            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: #eeecff;

            font-size: 23px;
        }

        .skill-box h3 {
            margin: 0 0 5px;

            color: #393d58;

            font-size: 16px;
        }

        .skill-box p {
            margin: 0;

            color: #666b80;

            font-size: 15px;
        }

        .details-list {
            margin-top: 15px;
        }

        .detail {
            display: flex;

            justify-content: space-between;

            gap: 15px;

            padding: 15px 0;

            border-bottom: 1px solid #edf0f5;

        }

        .detail:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #85899b;

            font-size: 14px;
        }

        .detail-value {
            color: #363a54;

            font-weight: 600;

            text-align: right;
        }

        .about-card {
            margin-top: 22px;

            background:
                linear-gradient(
                    135deg,
                    #f7f6ff,
                    #f5f8ff
                );

            padding: 28px;

            border-radius: 20px;

            border: 1px solid #e5e4f5;
        }

        .about-card h2 {
            margin-top: 0;

            color: #4c47a0;
        }

        .profile-actions {
            margin-top: 25px;
        }

        @media (max-width: 800px) {

            .profile-grid {
                grid-template-columns: 1fr;
            }

            .profile-main {
                flex-direction: column;

                text-align: center;
            }

            .profile-cover {
                padding: 35px 25px;
            }

        }

        @media (max-width: 500px) {

            .profile-info h1 {
                font-size: 28px;
            }

            .profile-photo {
                width: 120px;
                height: 120px;
            }

            .detail {
                flex-direction: column;
            }

            .detail-value {
                text-align: left;
            }

        }

    </style>

</head>

<body>

<nav>

    <a href="dashboard.php">SkillSwap</a>

    <a href="dashboard.php">Home</a>

    <a href="skills.php">Explore Skills</a>

    <a href="my_requests.php">Requests</a>

    <a href="logout.php">Logout</a>

</nav>


<div class="container">


    <!-- PROFILE HEADER -->

    <div class="profile-cover">

        <div class="profile-main">


            <div class="profile-photo-wrap">

                <?php

                if (
                    !empty($user['profile_pic']) &&
                    file_exists("uploads/" . $user['profile_pic'])
                ) {

                ?>

                    <img
                        src="uploads/<?php echo $user['profile_pic']; ?>"
                        class="profile-photo"
                    >

                <?php

                } else {

                ?>

                    <img
                        src="https://via.placeholder.com/145"
                        class="profile-photo"
                    >

                <?php } ?>

            </div>


            <div class="profile-info">

                <h1>
                    <?php echo $user['name']; ?>
                </h1>

                <p class="profile-email">
                    <?php echo $user['email']; ?>
                </p>

                <span class="student-badge">
                    🎓 SkillSwap Student Member
                </span>

            </div>


        </div>


        <div class="upload-area">

            <form
                method="POST"
                enctype="multipart/form-data"
            >

                <input
                    type="file"
                    name="profile_pic"
                    accept="image/*"
                    required
                >

                <br>

                <button
                    type="submit"
                    name="upload_pic"
                >
                    📷 Change Profile Picture
                </button>

            </form>

        </div>

    </div>


    <!-- MAIN CONTENT -->

    <div class="profile-grid">


        <!-- SKILLS -->

        <div class="profile-card">

            <h2>✨ My Skill Profile</h2>

            <p>
                Share your knowledge and discover opportunities
                to learn from other students.
            </p>


            <div class="skill-box">

                <div class="skill-box-icon">
                    📚
                </div>

                <div>

                    <h3>Skills I Can Teach</h3>

                    <p>
                        <?php echo $user['teach']; ?>
                    </p>

                </div>

            </div>


            <div class="skill-box">

                <div class="skill-box-icon">
                    🎯
                </div>

                <div>

                    <h3>Skills I Want to Learn</h3>

                    <p>
                        <?php echo $user['learn']; ?>
                    </p>

                </div>

            </div>

        </div>


        <!-- DETAILS -->

        <div class="profile-card">

            <h2>👤 Account Details</h2>

            <div class="details-list">


                <div class="detail">

                    <span class="detail-label">
                        Student ID
                    </span>

                    <span class="detail-value">
                        #<?php echo $user['id']; ?>
                    </span>

                </div>


                <div class="detail">

                    <span class="detail-label">
                        Account
                    </span>

                    <span class="detail-value">
                        Active
                    </span>

                </div>


                <div class="detail">

                    <span class="detail-label">
                        Platform
                    </span>

                    <span class="detail-value">
                        SkillSwap
                    </span>

                </div>


                <div class="detail">

                    <span class="detail-label">
                        Role
                    </span>

                    <span class="detail-value">
                        Student
                    </span>

                </div>


            </div>

        </div>


    </div>


    <!-- ABOUT -->

    <div class="about-card">

        <h2>🌟 About SkillSwap</h2>

        <p>
            SkillSwap connects students who want to teach
            and learn from each other. Your profile helps
            other students understand what you can offer
            and what you want to learn.
        </p>

    </div>


    <div class="profile-actions">

        <a href="dashboard.php">

            <button>
                ← Back to Dashboard
            </button>

        </a>

    </div>


</div>

</body>

</html>
```
