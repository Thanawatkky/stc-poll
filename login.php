<?php 
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">
                <h1 class="txt-logo">Poll</h1>
            </div>
            <form action="api/ac_login.php" method="post" style="width: 600px;">
                <?php 

                    if(isset($_SESSION['success'])) {

                    
                ?>
                <div class="alert-success" style="width: 300px; margin: 0 auto;"><?php echo $_SESSION['success']; ?></div>
                <?php
                unset($_SESSION['success']);
             }
             if(isset($_SESSION['error'])) { 
             ?>
                    <div class="alert-error" style="width: 300px; margin: 0 auto;"><?php echo $_SESSION['error']; ?></div>
                <?php
                   unset($_SESSION['error']);
                } 
                ?>
                <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="example@example.com.." class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password." class="form-control" required>
                    </div>
                <p style="text-align: center; margin: 10px 0;">ยังไม่มีบัญชีใช่ไหม? <a href="register.php" style="text-decoration: none;">สมัครสมาชิก</a></p>
                <button class="btn-submit-login" type="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>
</html>