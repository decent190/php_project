<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php"); // redirect to login if not logged in
    exit();
}

// Connect to database
$conn = new mysqli("localhost", "root", "", "cowrywise_clone");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user info
$user_id = $_SESSION['user_id'];
$user_query = $conn->query("SELECT full_name FROM users WHERE id = $user_id");
$user = $user_query->fetch_assoc();

// Fetch savings plans
$plans_query = $conn->query("SELECT * FROM savings_plans WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Cowrywise Clone</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
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
        .container {
            padding: 40px;
        }
        .plan {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .plan h3 {
            margin-top: 0;
            color: #002147;
        }
        .btn {
            background: #00a859;
            color: white;
            padding: 10px 20px;
            border: none;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<header>
    <h1>Cowrywise Clone</h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <h2>Welcome, <?php echo $user['full_name']; ?>!</h2>
    <p>Here are your savings plans:</p>

    <?php if ($plans_query->num_rows > 0): ?>
        <?php while($plan = $plans_query->fetch_assoc()): ?>
            <div class="plan">
                <h3><?php echo $plan['plan_name']; ?></h3>
                <p>Target: ₦<?php echo number_format($plan['target_amount'], 2); ?></p>
                <p>Saved: ₦<?php echo number_format($plan['saved_amount'], 2); ?></p>
                <p>Duration: <?php echo $plan['start_date']; ?> to <?php echo $plan['end_date']; ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>You have no savings plans yet.</p>
    <?php endif; ?>

    <a href="create_plan.php" class="btn">Create New Plan</a>
</div>

</body>
</html>