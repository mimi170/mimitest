<!DOCTYPE html>
<html>

<head>

    <title>SkillSwap - Home</title>

    <link rel="stylesheet" href="style.css">

    <style>

        .home-hero {

            min-height: 520px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 50px;

            background:
                linear-gradient(
                    135deg,
                    #171936,
                    #29235c,
                    #5146a8
                );

            border-radius: 30px;

            padding: 60px;

            color: white;

            position: relative;

            overflow: hidden;

            box-shadow:
                0 22px 55px rgba(31, 29, 75, 0.22);

        }

        .home-hero:before {

            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            border-radius: 50%;

            background: rgba(255,255,255,0.07);

            right: -130px;

            top: -150px;

        }

        .home-hero:after {

            content: "";

            position: absolute;

            width: 230px;
            height: 230px;

            border-radius: 50%;

            background: rgba(126,112,255,0.15);

            left: 45%;

            bottom: -150px;

        }

        .hero-content {

            max-width: 600px;

            position: relative;

            z-index: 2;

        }

        .hero-badge {

            display: inline-block;

            padding: 8px 15px;

            background: rgba(255,255,255,0.12);

            border: 1px solid rgba(255,255,255,0.16);

            border-radius: 20px;

            color: #eeeeff;

            font-size: 13px;

            margin-bottom: 20px;

        }

        .hero-content h1 {

            color: white;

            font-size: 50px;

            line-height: 1.12;

            margin: 0 0 20px;

            letter-spacing: -1px;

        }

        .hero-content h1 span {

            color: #bcb5ff;

        }

        .hero-content p {

            color: #dcdcff;

            font-size: 17px;

            line-height: 1.8;

            margin-bottom: 30px;

        }

        .hero-buttons {

            display: flex;

            gap: 12px;

            flex-wrap: wrap;

        }

        .hero-buttons button {

            margin: 0;

        }

        .secondary-button {

            background: rgba(255,255,255,0.12);

            border: 1px solid rgba(255,255,255,0.22);

            box-shadow: none;

        }

        .secondary-button:hover {

            background: rgba(255,255,255,0.18);

            box-shadow: none;

        }

        /* HERO VISUAL */

        .hero-visual {

            width: 330px;

            height: 330px;

            flex-shrink: 0;

            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;

            z-index: 2;

        }

        .visual-card {

            width: 260px;

            padding: 30px;

            background: rgba(255,255,255,0.11);

            border: 1px solid rgba(255,255,255,0.17);

            border-radius: 25px;

            backdrop-filter: blur(12px);

            box-shadow:
                0 20px 45px rgba(0,0,0,0.15);

        }

        .visual-icon {

            width: 65px;

            height: 65px;

            border-radius: 18px;

            background: rgba(255,255,255,0.13);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 30px;

            margin-bottom: 20px;

        }

        .visual-card h3 {

            color: white;

            margin: 0 0 10px;

            font-size: 20px;

        }

        .visual-card p {

            color: #dcdcff;

            font-size: 13px;

            line-height: 1.6;

            margin: 0;

        }

        /* FEATURES */

        .features-title {

            text-align: center;

            margin: 55px 0 25px;

        }

        .features-title h2 {

            font-size: 28px;

            margin-bottom: 8px;

        }

        .features-title p {

            color: #7a7f94;

            margin: 0;

        }

        .features {

            display: grid;

            grid-template-columns: repeat(3, 1fr);

            gap: 22px;

        }

        .feature-card {

            background: white;

            padding: 28px;

            border-radius: 20px;

            border: 1px solid #e7e9f2;

            box-shadow:
                0 8px 25px rgba(30,35,70,0.07);

            transition: 0.25s;

        }

        .feature-card:hover {

            transform: translateY(-5px);

            box-shadow:
                0 15px 32px rgba(30,35,70,0.11);

        }

        .feature-icon {

            width: 52px;

            height: 52px;

            display: flex;

            align-items: center;

            justify-content: center;

            background: #f0efff;

            border-radius: 15px;

            font-size: 24px;

            margin-bottom: 18px;

        }

        .feature-card h3 {

            color: #34384f;

            margin: 0 0 8px;

        }

        .feature-card p {

            color: #777d91;

            font-size: 14px;

            line-height: 1.7;

            margin: 0;

        }

        /* CTA */

        .home-cta {

            margin-top: 45px;

            padding: 35px;

            text-align: center;

            background: white;

            border-radius: 22px;

            border: 1px solid #e7e9f2;

            box-shadow:
                0 8px 25px rgba(30,35,70,0.07);

        }

        .home-cta h2 {

            margin: 0 0 10px;

        }

        .home-cta p {

            color: #777d91;

            margin-bottom: 20px;

        }

        .home-cta button {

            margin: 0;

        }

        /* FOOTER */

        .footer {

            text-align: center;

            padding: 35px 10px 10px;

            color: #8a8fa2;

            font-size: 13px;

        }

        @media (max-width: 850px) {

            .home-hero {

                flex-direction: column;

                align-items: flex-start;

                padding: 45px;

            }

            .hero-visual {

                display: none;

            }

            .hero-content h1 {

                font-size: 42px;

            }

            .features {

                grid-template-columns: 1fr;

            }

        }

        @media (max-width: 550px) {

            .home-hero {

                padding: 32px 25px;

                min-height: auto;

            }

            .hero-content h1 {

                font-size: 34px;

            }

            .hero-content p {

                font-size: 15px;

            }

            .hero-buttons {

                flex-direction: column;

            }

            .hero-buttons a {

                width: 100%;

            }

            .hero-buttons button {

                width: 100%;

            }

        }

    </style>

</head>

<body>

<nav>

    <a href="index.php">SkillSwap</a>

    <a href="index.php">Home</a>

    <a href="skills.php">Explore Skills</a>

    <a href="login.php">Login</a>

    <a href="register.php">Register</a>

</nav>


<div class="container">


    <!-- HERO -->

    <div class="home-hero">


        <div class="hero-content">

            <div class="hero-badge">
                🎓 Student Skill Exchange Platform
            </div>

            <h1>
                Learn Skills.<br>
                <span>Share Knowledge.</span>
            </h1>

            <p>
                SkillSwap helps students connect with each other
                to teach, learn, and exchange valuable skills
                in a simple and friendly environment.
            </p>


            <div class="hero-buttons">

                <a href="register.php">

                    <button>
                        Get Started →
                    </button>

                </a>

                <a href="skills.php">

                    <button class="secondary-button">
                        Explore Skills
                    </button>

                </a>

            </div>

        </div>


        <div class="hero-visual">

            <div class="visual-card">

                <div class="visual-icon">
                    🔄
                </div>

                <h3>
                    Skills Exchange
                </h3>

                <p>
                    Teach what you know and learn
                    something new from another student.
                </p>

            </div>

        </div>


    </div>


    <!-- FEATURES -->

    <div class="features-title">

        <h2>
            Why SkillSwap?
        </h2>

        <p>
            Everything you need to exchange skills with students.
        </p>

    </div>


    <div class="features">


        <div class="feature-card">

            <div class="feature-icon">
                📚
            </div>

            <h3>
                Share Your Skills
            </h3>

            <p>
                Add the skills you know and help
                other students learn from your experience.
            </p>

        </div>


        <div class="feature-card">

            <div class="feature-icon">
                🔍
            </div>

            <h3>
                Discover Skills
            </h3>

            <p>
                Explore skills offered by other students
                and find something new to learn.
            </p>

        </div>


        <div class="feature-card">

            <div class="feature-icon">
                🤝
            </div>

            <h3>
                Connect & Exchange
            </h3>

            <p>
                Send requests, connect with students,
                and start exchanging knowledge.
            </p>

        </div>


    </div>


    <!-- CTA -->

    <div class="home-cta">

        <h2>
            Ready to start your skill journey?
        </h2>

        <p>
            Join SkillSwap and turn your knowledge
            into an opportunity to learn.
        </p>

        <a href="register.php">

            <button>
                Create Your Account →
            </button>

        </a>

    </div>


    <div class="footer">

        © 2026 SkillSwap · Student Skill Exchange Platform

    </div>


</div>

</body>

</html>