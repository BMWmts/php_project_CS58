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
            --primary: #e3e4ecff;
            --bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text: #f8fafc;
        }

        body {
            font-family: 'Outfit', 'Noto Sans Thai', sans-serif;
            background: #e1e3e9ff;
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
            background: linear-gradient(to right, #222020ff, #a5a8a8ff);
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
  padding: 17px 40px;
  border-radius: 50px;
  cursor: pointer;
  border: 0;
  background-color: white;
  box-shadow: rgb(0 0 0 / 5%) 0 0 8px;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  font-size: 15px;
  transition: all 0.5s ease;
}

.logout-btn:hover {
  letter-spacing: 3px;
  background-color: #e80f0fff;
  color: hsl(0, 0%, 100%);
  box-shadow: #191a1aff 0px 7px 29px 0px;
}

.logout-btn:active {
  letter-spacing: 2px;
  background-color: #e80f0fff;
  color: hsl(0, 0%, 100%);
  box-shadow: #191a1aff 0px 0px 0px 0px;
  transform: translateY(10px);
  transition: 100ms;
}

.back-btn {
  padding: 17px 40px;
  border-radius: 50px;
  cursor: pointer;
  border: 0;
  background-color: white;
  box-shadow: rgb(255 255 255 / 5%) 0 0 8px;
  letter-spacing: 1.5px;
  text-transform: uppercase;
  font-size: 15px;
  transition: all 0.5s ease;
}

.back-btn:hover {
  letter-spacing: 3px;
  background-color: #2fca4eff;
  color: hsl(0, 0%, 100%);
  box-shadow: #ecf0f0ff 0px 7px 29px 0px;
}

.back-btn:active {
  letter-spacing: 2px;
  background-color: #2fca4eff;
  color: hsl(0, 0%, 100%);
  box-shadow: #ecf0f0ff 0px 0px 0px 0px;
  transform: translateY(10px);
  transition: 100ms;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>ยินดีต้อนรับ, <?php echo htmlspecialchars($user['name']); ?></h1>
            <a href="logout.php" class="logout-btn">logout</a>
            <a href="page.php" class="back-btn">หน้าหลัก</a>
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
