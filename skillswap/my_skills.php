```php
<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM skills WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>

    <title>My Skills - SkillSwap</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .skills-hero {
            background: linear-gradient(
                135deg,
                #171936,
                #29235c,
                #5146a8
            );

            padding: 40px;

            border-radius: 24px;

            color: white;

            margin-bottom: 30px;

            box-shadow:
                0 18px 45px rgba(31, 29, 75, 0.20);
        }

        .skills-hero h1 {
            color: white;
            margin: 0 0 10px;
        }

        .skills-hero p {
            color: #dcdcff;
            margin: 0;
            line-height: 1.7;
        }

        .my-skills-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 22px;
        }

        .my-skill-card {
            background: white;

            padding: 28px;

            border-radius: 20px;

            border: 1px solid #e7e9f2;

            box-shadow:
                0 8px 25px rgba(30, 35, 70, 0.07);

            transition: 0.25s;

            position: relative;
        }

        .my-skill-card:hover {
            transform: translateY(-5px);

            box-shadow:
                0 16px 35px rgba(30, 35, 70, 0.12);
        }

        .skill-icon {
            width: 50px;
            height: 50px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #f0efff;

            border-radius: 14px;

            font-size: 23px;

            margin-bottom: 18px;
        }

        .my-skill-card h2 {
            color: #292d45;

            margin: 0 0 12px;

            font-size: 22px;
        }

        .my-skill-card p {
            color: #73788d;

            line-height: 1.7;

            min-height: 55px;
        }

        .delete-btn {
            background: linear-gradient(
                135deg,
                #e05252,
                #ee6b6b
            );

            box-shadow:
                0 5px 15px rgba(224, 82, 82, 0.18);
        }

        .delete-btn:hover {
            box-shadow:
                0 9px 22px rgba(224, 82, 82, 0.25);
        }

        .empty-state {
            background: white;

            padding: 55px 30px;

            border-radius: 22px;

            text-align: center;

            border: 1px solid #e7e9f2;

            box-shadow:
                0 8px 25px rgba(30, 35, 70, 0.07);
        }

        .empty-icon {
            font-size: 50px;

            margin-bottom: 15px;
        }

        @media (max-width: 700px) {

            .my-skills-grid {
                grid-template-columns: 1fr;
            }

            .skills-hero {
                padding: 30px;
            }

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


    <div class="skills-hero">

        <h1>My Skills</h1>

        <p>
            Manage the skills you have shared with
            the SkillSwap student community.
        </p>

    </div>


    <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="my-skills-grid">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="my-skill-card">

                    <div class="skill-icon">
                        📚
                    </div>

                    <h2>
                        <?php echo $row['skill_name']; ?>
                    </h2>

                    <p>
                        <?php echo $row['description']; ?>
                    </p>

                    <a
                        href="delete_skill.php?id=<?php echo $row['id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this skill?');"
                    >

                        <button class="delete-btn">
                            Delete Skill
                        </button>

                    </a>

                </div>

            <?php } ?>

        </div>

    <?php } else { ?>

        <div class="empty-state">

            <div class="empty-icon">
                📚
            </div>

            <h2>No Skills Added Yet</h2>

            <p>
                You haven't shared any skills yet.
                Add your first skill and start helping other students.
            </p>

            <a href="add_skill.php">

                <button>
                    + Add Your First Skill
                </button>

            </a>

        </div>

    <?php } ?>


    <br>

    <a href="dashboard.php">

        <button>
            ← Back to Dashboard
        </button>

    </a>


</div>

</body>

</html>
```
