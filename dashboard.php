<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Noto+Sans+Thai:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text: #f8fafc;
        }

        body {
            font-family: 'Outfit', 'Noto Sans Thai', sans-serif;
            background: #0f172a;
            color: var(--text);
            margin: 0;
            padding: 2rem;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }

        h1 {
            font-weight: 600;
            background: linear-gradient(to right, #818cf8, #c084fc);
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            padding: 2rem;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .info-item label {
            display: block;
            color: #94a3b8;
            font-size: 0.875rem;
            margin-bottom: 0.25rem;
        }

        .info-item span {
            font-size: 1.125rem;
            font-weight: 600;
        }

        .logout-btn {
            padding: 0.5rem 1.5rem;
            background: rgba(248, 113, 113, 0.1);
            color: #f87171;
            border: 1px solid rgba(248, 113, 113, 0.2);
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #f87171;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>ยินดีต้อนรับ, <?php echo htmlspecialchars($user['name']); ?></h1>
            <a href="logout.php" class="logout-btn">ออกจากระบบ</a>
        </div>

        <div class="card">
            <div class="user-info">
                <div class="info-item">
                    <label>รหัสผู้ใช้</label>
                    <span><?php echo htmlspecialchars($user['userID']); ?></span>
                </div>
                <div class="info-item">
                    <label>อีเมล</label>
                    <span><?php echo htmlspecialchars($user['email']); ?></span>
                </div>
                <div class="info-item">
                    <label>เบอร์โทรศัพท์</label>
                    <span><?php echo htmlspecialchars($user['mobile']); ?></span>
                </div>
                <div class="info-item">
                    <label>เพศ</label>
                    <span><?php echo htmlspecialchars($user['gender']); ?></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
