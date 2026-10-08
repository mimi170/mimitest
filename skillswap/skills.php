```php
<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT skills.*, users.name
        FROM skills
        JOIN users ON skills.user_id = users.id
        ORDER BY skills.created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>

    <title>Explore Skills - SkillSwap</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .page-hero {
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

        .page-hero h1 {
            color: white;
            margin: 0 0 10px;
        }

        .page-hero p {
            color: #dcdcff;
            margin: 0;
            line-height: 1.7;
        }

        .skills-grid {
            display: grid;

            grid-template-columns: repeat(2, 1fr);

            gap: 22px;
        }

        .skill-card {
            background: white;

            padding: 28px;

            border-radius: 20px;

            border: 1px solid #e7e9f2;

            box-shadow:
                0 8px 25px rgba(30, 35, 70, 0.07);

            transition: 0.25s;
        }

        .skill-card:hover {
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

        .skill-card h2 {
            margin: 0 0 10px;

            color: #292d45;

            font-size: 22px;
        }

        .owner {
            color: #6558d9;

            font-weight: bold;

            margin-bottom: 15px;
        }

        .description {
            color: #73788d;

            line-height: 1.7;

            min-height: 50px;
        }

        .skill-card textarea {
            max-width: 100%;

            margin-top: 15px;
        }

        @media (max-width: 700px) {

            .skills-grid {
                grid-template-columns: 1fr;
            }

            .page-hero {
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


    <div class="page-hero">

        <h1>Explore Skills</h1>

        <p>
            Discover skills shared by students and
            connect with people who can help you learn.
        </p>

    </div>


    <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="skills-grid">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="skill-card">

                    <div class="skill-icon">
                        💡
                    </div>

                    <h2>
                        <?php echo $row['skill_name']; ?>
                    </h2>

                    <div class="owner">
                        👤 <?php echo $row['name']; ?>
                    </div>

                    <p class="description">
                        <?php echo $row['description']; ?>
                    </p>


                    <form action="request.php" method="POST">

                        <input
                            type="hidden"
                            name="receiver_id"
                            value="<?php echo $row['user_id']; ?>"
                        >

                        <input
                            type="hidden"
                            name="skill_id"
                            value="<?php echo $row['id']; ?>"
                        >

                        <textarea
                            name="message"
                            placeholder="Write a message to the student..."
                            required
                        ></textarea>

                        <br>

                        <button type="submit">
                            Send Skill Request →
                        </button>

                    </form>

                </div>

            <?php } ?>

        </div>

    <?php } else { ?>

        <div class="card">

            <h2>No Skills Available Yet</h2>

            <p>
                Be the first student to add a skill!
            </p>

            <a href="add_skill.php">
                <button>Add Your Skill</button>
            </a>

        </div>

    <?php } ?>


</div>

</body>

</html>
```
