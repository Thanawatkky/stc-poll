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
            <form action="api/ac_register.php" method="post">
                <?php 
                        if(isset($_SESSION['success'])) {  
                ?>
                    <div class="alert-success"><?php echo $_SESSION['success']; ?></div>
                <?php
                    unset($_SESSION['success']);
                }
                if(isset($_SESSION['error'])) { 
                ?>
                    <div class="alert-error"><?php echo $_SESSION['error']; ?></div>
                <?php
                   unset($_SESSION['error']);
                } 
                ?>
                <div class="col-2">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="example@example.com.." class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password." class="form-control" required>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="fname">Firstname</label>
                        <input type="text" name="fname" id="fname" placeholder="Enter your firstname." class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Lastname</label>
                        <input type="text" name="lname" id="lname" placeholder="Enter your lastname." class="form-control" required>
                    </div>
                </div>
                <p style="text-align: center; margin: 10px 0;">มีบัญชีอยู่แล้วใช่ไหม? <a href="login.php" style="text-decoration: none;">เข้าสู่ระบบ</a></p>
                <button class="btn-submit" type="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>
</html>