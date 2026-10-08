```php
<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT name, email, teach, learn FROM users
        WHERE teach LIKE '%$search%'
        OR learn LIKE '%$search%'";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>

    <title>Dashboard - SkillSwap</title>

    <link rel="stylesheet" href="style.css">

    <style>

        /* HERO */

        .hero {
            background: linear-gradient(
                135deg,
                #171936,
                #29235c,
                #5146a8
            );

            border-radius: 28px;

            padding: 55px;

            color: white;

            position: relative;

            overflow: hidden;

            box-shadow:
                0 20px 50px rgba(31, 29, 75, 0.25);
        }

        .hero:before {
            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            border-radius: 50%;

            background: rgba(255,255,255,0.08);

            right: -80px;
            top: -100px;
        }

        .hero:after {
            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border-radius: 50%;

            background: rgba(130,120,255,0.15);

            right: 180px;
            bottom: -100px;
        }

        .hero h1 {
            color: white;

            font-size: 42px;

            margin: 0 0 12px;

            position: relative;

            z-index: 2;
        }

        .hero p {
            color: #dcdcff;

            font-size: 17px;

            line-height: 1.7;

            max-width: 650px;

            position: relative;

            z-index: 2;
        }

        /* SEARCH */

        .search-box {
            background: white;

            padding: 12px;

            border-radius: 16px;

            margin-top: 28px;

            display: flex;

            gap: 10px;

            max-width: 650px;

            position: relative;

            z-index: 3;
        }

        .search-box input {
            margin: 0;

            border: none;

            background: transparent;

            box-shadow: none;

            flex: 1;
        }

        .search-box input:focus {
            box-shadow: none;
        }

        .search-box button {
            margin: 0;
        }

        /* SECTION TITLE */

        .section-title {
            margin: 40px 0 20px;

            display: flex;

            justify-content: space-between;

            align-items: center;
        }

        .section-title h2 {
            margin: 0;
        }

        /* ACTION CARDS */

        .dashboard-actions {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;
        }

        .dashboard-card {
            background: white;

            padding: 25px;

            border-radius: 20px;

            text-decoration: none;

            color: #292d45;

            border: 1px solid #e8eaf3;

            box-shadow:
                0 8px 25px rgba(30, 35, 70, 0.07);

            transition: 0.25s;
        }

        .dashboard-card:hover {
            transform: translateY(-7px);

            box-shadow:
                0 18px 35px rgba(30, 35, 70, 0.13);

            border-color: #c9c2ff;
        }

        .icon {
            width: 48px;
            height: 48px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 14px;

            background: #f0efff;

            font-size: 22px;

            margin-bottom: 18px;
        }

        .dashboard-card h3 {
            margin: 0 0 8px;

            color: #292d45;
        }

        .dashboard-card p {
            margin: 0;

            color: #7a7f94;

            font-size: 14px;

            line-height: 1.6;
        }

        /* STUDENTS */

        .student-card {
            background: white;

            border-radius: 18px;

            padding: 22px;

            margin-bottom: 16px;

            border: 1px solid #e8eaf3;

            box-shadow:
                0 6px 20px rgba(30, 35, 70, 0.06);
        }

        .student-card h3 {
            margin-top: 0;

            color: #34385a;
        }

        .student-info {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 15px;

            color: #6f7488;

            font-size: 14px;
        }

        /* MOBILE */

        @media (max-width: 850px) {

            .dashboard-actions {
                grid-template-columns: repeat(2, 1fr);
            }

            .hero {
                padding: 35px;
            }

            .hero h1 {
                font-size: 34px;
            }
        }

        @media (max-width: 550px) {

            .dashboard-actions {
                grid-template-columns: 1fr;
            }

            .student-info {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 28px;
            }

            .hero h1 {
                font-size: 28px;
            }

            .search-box {
                display: block;
                padding: 8px;
            }

            .search-box button {
                width: 100%;
                margin-top: 8px;
            }
        }

    </style>

</head>

<body>

<!-- NAVBAR -->

<nav>

    <a href="dashboard.php">SkillSwap</a>

    <a href="dashboard.php">Home</a>

    <a href="profile.php">My Profile</a>

    <a href="logout.php">Logout</a>

</nav>


<div class="container">


    <!-- HERO -->

    <div class="hero">

        <h1>Learn. Teach. Connect.</h1>

        <p>
            Welcome to SkillSwap — a student community where
            you can share your skills, discover new talents,
            and learn from other students.
        </p>


        <form method="GET" class="search-box">

            <input
                type="text"
                name="search"
                placeholder="Search for a skill..."
                value="<?php echo $search; ?>"
            >

            <button type="submit">
                Search
            </button>

        </form>

    </div>


    <!-- ACTIONS -->

    <div class="section-title">

        <h2>What would you like to do?</h2>

    </div>


    <div class="dashboard-actions">


        <a href="add_skill.php" class="dashboard-card">

            <div class="icon">➕</div>

            <h3>Add a Skill</h3>

            <p>
                Share a skill that you can teach
                to other students.
            </p>

        </a>


        <a href="my_skills.php" class="dashboard-card">

            <div class="icon">📚</div>

            <h3>My Skills</h3>

            <p>
                View and manage the skills
                you have added.
            </p>

        </a>


        <a href="skills.php" class="dashboard-card">

            <div class="icon">🔍</div>

            <h3>Explore Skills</h3>

            <p>
                Discover useful skills offered
                by other students.
            </p>

        </a>


        <a href="my_requests.php" class="dashboard-card">

            <div class="icon">💬</div>

            <h3>My Requests</h3>

            <p>
                Check and manage your
                skill exchange requests.
            </p>

        </a>

    </div>


    <!-- STUDENTS -->

    <div class="section-title">

        <h2>Students & Skills</h2>

    </div>


    <?php while ($row = mysqli_fetch_assoc($result)) { ?>

        <div class="student-card">

            <h3>
                <?php echo $row['name']; ?>
            </h3>

            <div class="student-info">

                <div>
                    📧
                    <?php echo $row['email']; ?>
                </div>

                <div>
                    📚
                    <b>Can Teach:</b>
                    <?php echo $row['teach']; ?>
                </div>

                <div>
                    🎯
                    <b>Wants to Learn:</b>
                    <?php echo $row['learn']; ?>
                </div>

            </div>

        </div>

    <?php } ?>


</div>

</body>

</html>
```
