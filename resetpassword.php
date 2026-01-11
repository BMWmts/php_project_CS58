<?php
require_once 'config.php';

$error = "";
$success = "";
$userID = $_GET['userID'] ?? '';

if (!$userID) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPass = $_POST['newPass'];
    $confirmPass = $_POST['confirmPass'];
    
    if ($newPass !== $confirmPass) {
        $error = "รหัสผ่านไม่ตรงกัน";
    } else {
        $stmt = $conn->prepare("UPDATE members SET passKey = ? WHERE userID = ?");
        $stmt->bind_param("ss", $newPass, $userID);
        
        if ($stmt->execute()) {
            $success = "รีเซ็ตรหัสผ่านสำเร็จ ระบบกำลังพาท่านไปหน้าเข้าสู่ระบบ...";
            // Auto redirect after 3 seconds
            header("refresh:3;url=login.php");
        } else {
            $error = "เกิดข้อผิดพลาดในการอัปเดตข้อมูล";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รีเซ็ตรหัสผ่านใหม่</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Noto+Sans+Thai:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --success: #10b981;
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

        .reset-card {
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

        .success {
            color: var(--success);
            font-size: 0.875rem;
            text-align: center;
            margin-bottom: 1rem;
            padding: 1rem;
            background: rgba(16, 185, 129, 0.1);
            border-radius: 12px;
            border: 1px solid rgba(16, 185, 129, 0.2);
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
    <div class="reset-card">
        <h2>รีเซ็ตรหัสผ่านใหม่</h2>
        
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success"><?php echo $success; ?></div>
            <div class="back-link">
                <p style="font-size: 0.75rem; color: #64748b;">กำลังพาท่านกลับสู่หน้าเข้าสู่ระบบ...</p>
            </div>
        <?php else: ?>
            <form method="POST">
                <div class="input-group">
                    <label>รหัสผ่านใหม่</label>
                    <input type="password" name="newPass" required>
                </div>
                <div class="input-group">
                    <label>ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" name="confirmPass" required>
                </div>
                <button type="submit">เปลี่ยนรหัสผ่าน</button>
            </form>
        <?php endif; ?>

        <div class="back-link">
            <a href="login.php">← กลับหน้าเข้าสู่ระบบ</a>
        </div>
    </div>
</body>
</html>
