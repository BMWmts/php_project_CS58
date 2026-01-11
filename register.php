<?php
require_once 'config.php';
session_start();

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $conn->real_escape_string($_POST["userID"]);
    $passKey = password_hash($_POST["passKey"], PASSWORD_DEFAULT);
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $mobile = $conn->real_escape_string($_POST["mobile"]);
    $gender = $conn->real_escape_string($_POST["gender"]);

    // เช็คชื่อผู้ใช้
    $checkSql = "SELECT userID FROM members WHERE userID = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("s", $userID);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        $error = "ชื่อผู้ใช้นี้มีอยู่ในระบบแล้ว";
    } else {
        $sql = "INSERT INTO members (userID, passKey, name, email, mobile, gender) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $userID, $passKey, $name, $email, $mobile, $gender);
        
        if ($stmt->execute()) {
            // ดึงข้อมูลผู้ใช้ใหม่เพื่อเก็บใน session
            $newUserID = $userID;
            $getUserSql = "SELECT * FROM members WHERE userID = ?";
            $getUserStmt = $conn->prepare($getUserSql);
            $getUserStmt->bind_param("s", $newUserID);
            $getUserStmt->execute();
            $userResult = $getUserStmt->get_result();
            
            $_SESSION["user"] = $userResult->fetch_assoc();
            header("Location: page.php");
            exit();
        } else {
            $error = "สมัครสมาชิกไม่สำเร็จ: " . $conn->error;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&family=Noto+Sans+Thai:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #E8F4FA;
            --primary-hover: #83ccf0ff;
            --bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text: #f8fafc;
        }

        body {
            font-family: 'Outfit', 'Noto Sans Thai', sans-serif;
            background: radial-gradient(circle at top left, #83ccf0ff, #E8F4FA);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .register-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            padding: 2rem;
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 450px;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            margin-bottom: 2rem;
            text-align: center;
            font-weight: 600;
            font-size: 2rem;
            color: var(--primary);
        }

        .input-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            color: #94a3b8;
        }

        input, select {
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

        select option {
            background: #1e293b;
            color: white;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(232, 244, 250, 0.1);
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary);
            color: #0f172a;
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
            box-shadow: 0 10px 15px -3px rgba(131, 204, 240, 0.4);
        }

        .error {
            color: #f87171;
            font-size: 0.875rem;
            text-align: center;
            margin-bottom: 1rem;
        }

        .links {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
        }

        .links a {
            color: var(--primary);
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <h2>สมัครสมาชิก</h2>
        <?php if ($error): ?>
            <div class="error"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="input-group">
                <label>ชื่อผู้ใช้</label>
                <input type="text" name="userID" required>
            </div>
            <div class="input-group">
                <label>รหัสผ่าน</label>
                <input type="password" name="passKey" required>
            </div>
             <div class="input-group">
                <label>ชื่อจริง-นามสกุล</label>
                <input type="text" name="name" required>
            </div>
            <div class="input-group">
                <label>เพศ</label>
                <select name="gender" required>
                    <option value="" disabled selected>เลือกเพศ</option>
                    <option value="male">ชาย</option>
                    <option value="female">หญิง</option>
                </select>
            </div>
            <div class="input-group">
                <label>อีเมล</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label>เบอร์โทรศัพท์</label>
                <input type="tel" name="mobile" maxlength="10" required>
            </div>
            <button type="submit">ยืนยันการสมัครสมาชิก</button>
        </form>
        <div class="links">
            <a href="index.php">มีบัญชีอยู่แล้ว? เข้าสู่ระบบ</a>
        </div>
    </div>
</body>
</html>
