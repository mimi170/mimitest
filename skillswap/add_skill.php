```php
<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add_skill'])) {

    $user_id = $_SESSION['user_id'];
    $skill_name = $_POST['skill_name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO skills (user_id, skill_name, description)
            VALUES ('$user_id', '$skill_name', '$description')";

    if (mysqli_query($conn, $sql)) {
        $message = "Skill Added Successfully!";
    } else {
        $message = "Failed to Add Skill!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Skill - SkillSwap</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .add-hero {
            background: linear-gradient(
                135deg,
                #171936,
                #29235c,
                #5146a8
            );

            padding: 42px;

            border-radius: 24px;

            color: white;

            margin-bottom: 25px;

            box-shadow:
                0 18px 45px rgba(31, 29, 75, 0.20);
        }

        .add-hero h1 {
            color: white;
            margin: 0 0 10px;
        }

        .add-hero p {
            color: #dcdcff;
            line-height: 1.7;
            margin: 0;
        }

        .form-card {
            background: white;

            padding: 35px;

            border-radius: 22px;

            border: 1px solid #e7e9f2;

            box-shadow:
                0 10px 30px rgba(30, 35, 70, 0.08);

            max-width: 800px;

            margin: auto;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;

            font-weight: bold;

            color: #373b55;

            margin-bottom: 8px;
        }

        .form-group input,
        .form-group textarea {
            max-width: 100%;
        }

        .form-help {
            color: #85899b;

            font-size: 13px;

            margin-top: 7px;
        }

        .success-message {
            background: #ecfdf5;

            color: #16704b;

            border: 1px solid #c9f0df;

            padding: 14px 18px;

            border-radius: 12px;

            margin-bottom: 22px;

            font-weight: bold;
        }

        .form-actions {
            margin-top: 25px;
        }

    </style>

</head>

<body>

<nav>

    <a href="dashboard.php">SkillSwap</a>

    <a href="dashboard.php">Home</a>

    <a href="profile.php">My Profile</a>

    <a href="my_requests.php">Requests</a>

    <a href="logout.php">Logout</a>

</nav>


<div class="container">


    <div class="add-hero">

        <h1>Share Your Skill</h1>

        <p>
            Add a skill you can teach and help another student
            learn something valuable.
        </p>

    </div>


    <div class="form-card">

        <?php if (isset($message)) { ?>

            <div class="success-message">
                <?php echo $message; ?>
            </div>

        <?php } ?>


        <form method="POST">


            <div class="form-group">

                <label>Skill Name</label>

                <input
                    type="text"
                    name="skill_name"
                    placeholder="Example: Python, Photoshop, Web Development"
                    required
                >

                <div class="form-help">
                    Enter the name of the skill you can teach.
                </div>

            </div>


            <div class="form-group">

                <label>Skill Description</label>

                <textarea
                    name="description"
                    placeholder="Describe what you can teach, your experience, or what students can learn from you..."
                    required
                ></textarea>

                <div class="form-help">
                    A clear description helps other students understand your skill.
                </div>

            </div>


            <div class="form-actions">

                <button
                    type="submit"
                    name="add_skill"
                >
                    Add Skill →
                </button>

                <a href="dashboard.php">
                    <button type="button">
                        Cancel
                    </button>
                </a>

            </div>


        </form>

    </div>


</div>

</body>

</html>
```
