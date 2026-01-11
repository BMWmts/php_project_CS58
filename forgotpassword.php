<?php
require_once 'config.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST['userID'];
    $email = $_POST['email'];
    
    $stmt = $conn->prepare("SELECT * FROM members WHERE userID = ? AND email = ?");
    $stmt->bind_param("ss", $userID, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // In a real app, send email here.
        // For this local demo, we'll redirect to the reset page.
        header("Location: resetpassword.php?userID=" . urlencode($userID));
        exit();
    } else {
        $error = "ไม่พบชื่อผู้ใช้หรืออีเมลนี้ในระบบ";
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รีเซ็ตรหัสผ่าน</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Noto+Sans+Thai:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text: #f8fafc;
        }

        body {
            font-family: 'Outfit', 'Noto Sans Thai', sans-serif;
            background: radial-gradient(circle at top left, #1e1b4b, #0f172a);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .forgot-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            padding: 2.5rem;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            margin-top: 0;
            text-align: center;
            font-weight: 600;
            font-size: 2rem;
            background: linear-gradient(to right, #818cf8, #c084fc);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 2rem;
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            color: #94a3b8;
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.2);
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        button:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
        }

        .error {
            color: #f87171;
            font-size: 0.875rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .back-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        .back-link a {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.3s ease;
        }

        .back-link a:hover {
            color: white;
        }
    </style>
</head>
<body>
    <div class="forgot-card">
        <h2>รีเซ็ตรหัสผ่าน</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="input-group">
                <label>ชื่อผู้ใช้</label>
                <input type="text" name="userID" required placeholder="1001">
            </div>
            <div class="input-group">
                <label>อีเมล</label>
                <input type="email" name="email" required placeholder="john.doe@example.com">
            </div>
            <button type="submit">ส่งข้อมูล</button>
        </form>
        <div class="back-link">
            <a href="login.php">← กลับหน้าเข้าสู่ระบบ</a>
        </div>
    </div>
</body>
</html>
