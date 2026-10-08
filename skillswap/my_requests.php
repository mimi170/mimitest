```php id="9f2kqv"
<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$receiver_id = $_SESSION['user_id'];

$sql = "SELECT requests.*, users.name, skills.skill_name
        FROM requests
        JOIN users ON requests.sender_id = users.id
        JOIN skills ON requests.skill_id = skills.id
        WHERE requests.receiver_id = '$receiver_id'
        ORDER BY requests.created_at DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>

<head>

    <title>My Requests - SkillSwap</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .request-hero {
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

        .request-hero h1 {
            color: white;
            margin: 0 0 10px;
        }

        .request-hero p {
            color: #dcdcff;
            margin: 0;
            line-height: 1.7;
        }

        .requests-list {
            display: grid;

            gap: 20px;
        }

        .request-card {
            background: white;

            padding: 28px;

            border-radius: 20px;

            border: 1px solid #e7e9f2;

            box-shadow:
                0 8px 25px rgba(30, 35, 70, 0.07);

            transition: 0.25s;
        }

        .request-card:hover {
            transform: translateY(-4px);

            box-shadow:
                0 15px 32px rgba(30, 35, 70, 0.11);
        }

        .request-top {
            display: flex;

            justify-content: space-between;

            align-items: flex-start;

            gap: 20px;

            margin-bottom: 20px;
        }

        .request-user {
            display: flex;

            align-items: center;

            gap: 15px;
        }

        .user-icon {
            width: 52px;
            height: 52px;

            border-radius: 50%;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #f0efff;

            font-size: 23px;
        }

        .request-user h2 {
            margin: 0 0 5px;

            font-size: 19px;

            color: #292d45;
        }

        .request-user p {
            margin: 0;

            color: #7a7f94;

            font-size: 13px;
        }

        .status {
            padding: 7px 13px;

            border-radius: 20px;

            font-size: 13px;

            font-weight: bold;

            text-transform: capitalize;
        }

        .status.pending {
            background: #fff7df;
            color: #a06b00;
        }

        .status.accepted {
            background: #eafaf3;
            color: #18794e;
        }

        .status.rejected {
            background: #fff0f0;
            color: #b64040;
        }

        .request-info {
            background: #f8f8fc;

            padding: 18px;

            border-radius: 13px;

            margin-bottom: 18px;
        }

        .request-info p {
            margin: 7px 0;

            color: #62677b;

            line-height: 1.6;
        }

        .message-box {
            border-left: 3px solid #7567d9;

            padding-left: 15px;

            color: #62677b;

            line-height: 1.7;

            margin-bottom: 20px;
        }

        .request-actions button {
            margin-left: 0;
            margin-right: 8px;
        }

        .reject-btn {
            background: linear-gradient(
                135deg,
                #df6262,
                #ec7a7a
            );

            box-shadow:
                0 5px 15px rgba(223, 98, 98, 0.18);
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

        @media (max-width: 600px) {

            .request-top {
                flex-direction: column;
            }

            .request-hero {
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

    <a href="skills.php">Explore Skills</a>

    <a href="logout.php">Logout</a>

</nav>


<div class="container">


    <div class="request-hero">

        <h1>My Requests</h1>

        <p>
            Manage students who want to learn
            the skills you offer.
        </p>

    </div>


    <?php if (mysqli_num_rows($result) > 0) { ?>

        <div class="requests-list">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="request-card">


                    <div class="request-top">

                        <div class="request-user">

                            <div class="user-icon">
                                👤
                            </div>

                            <div>

                                <h2>
                                    <?php echo $row['name']; ?>
                                </h2>

                                <p>
                                    wants to learn from you
                                </p>

                            </div>

                        </div>


                        <span class="status <?php echo $row['status']; ?>">

                            <?php echo $row['status']; ?>

                        </span>

                    </div>


                    <div class="request-info">

                        <p>
                            <b>📚 Skill:</b>
                            <?php echo $row['skill_name']; ?>
                        </p>

                    </div>


                    <div class="message-box">

                        <b>💬 Message</b>

                        <p>
                            <?php echo $row['message']; ?>
                        </p>

                    </div>


                    <?php if ($row['status'] == 'pending') { ?>

                        <div class="request-actions">

                            <a href="accept_request.php?id=<?php echo $row['id']; ?>">

                                <button>
                                    ✓ Accept
                                </button>

                            </a>


                            <a href="reject_request.php?id=<?php echo $row['id']; ?>">

                                <button class="reject-btn">
                                    ✕ Reject
                                </button>

                            </a>

                        </div>

                    <?php } ?>


                </div>

            <?php } ?>

        </div>

    <?php } else { ?>


        <div class="empty-state">

            <div class="empty-icon">
                💬
            </div>

            <h2>No Requests Yet</h2>

            <p>
                You don't have any skill exchange requests at the moment.
            </p>

            <a href="skills.php">

                <button>
                    Explore Skills
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
