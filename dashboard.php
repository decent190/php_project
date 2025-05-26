<?php
session_start();
$loggedIn = isset($_SESSION['user_id']); // Adjust this based on how you handle sessions
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cowrywise Clone | Save and Grow Your Money</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f7fa;
            color: #222;
        }

        header {
            background: #002147;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: 600;
        }

        .hero {
            padding: 80px 40px;
            background: linear-gradient(135deg, #002147, #0e2a55);
            color: white;
            text-align: center;
        }

        .hero h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            max-width: 600px;
            margin: auto;
        }

        .hero a {
            display: inline-block;
            margin-top: 30px;
            background: #00a859;
            padding: 12px 30px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
        }

        .features {
            padding: 60px 40px;
            display: flex;
            justify-content: space-around;
            text-align: center;
            background: white;
        }

        .feature {
            max-width: 300px;
        }

        .feature h3 {
            color: #002147;
        }

        footer {
            padding: 30px 40px;
            background: #002147;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h1>Cowrywise Clone</h1>
    <nav>
        <a href="dashboard.php">Home</a>
        <?php if ($loggedIn): ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="form.php">Sign Up</a>
            <a href="signin.php">Login</a>
        <?php endif; ?>
    </nav>
</header>

<section class="hero">
    <h2>Save and Invest with Discipline</h2>
    <p>Start your journey to financial freedom with our secure and automated savings platform built for smart users like you.</p>
    <?php if (!$loggedIn): ?>
        <a href="form.php">Get Started</a>
    <?php else: ?>
        <a href="index.php">Go to Dashboard</a>
    <?php endif; ?>
</section>

<section class="features">
    <div class="feature">
        <h3>Automated Savings</h3>
        <p>Set your target and let the system help you stay consistent with your savings goal.</p>
    </div>
    <div class="feature">
        <h3>Track Growth</h3>
        <p>Monitor your savings and investment growth in real-time with simple dashboards.</p>
    </div>
    <div class="feature">
        <h3>Secure & Safe</h3>
        <p>Your data and money are protected with top-notch security features.</p>
    </div>
</section>

<footer>
    &copy; <?php echo date("Y"); ?> Cowrywise Clone | Built for Educational Use
</footer>

</body>
</html>