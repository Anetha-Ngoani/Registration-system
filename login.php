<?php 
    include 'config/db.php';
    if(isset($_POST['login'])){
        $u=$_POST['username']; 
        $p=$_POST['password'];
        $res=$conn->query("SELECT * FROM users WHERE username='$u'");
        if($res->num_rows==1){
            $row=$res->fetch_assoc();
            if(password_verify($p,$row['password'])){
                $_SESSION['user']=$row; 
                header("Location: dashboard.php");
                }
            else $err="Password si sahihi";
        }else $err="Username haipo";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login - TENDO SCHOOL</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div style="max-width:400px;margin:100px auto">
            <div class="header">
                <img src="logo.png">
                <h1>TENDO SECONDARY SCHOOL</h1>
            </div>
            <div class="container">
                <h2>Login</h2>
                <?php if(isset($err)) 
                    echo "<p style='color:red'>$err</p>";
                ?>
                <form method="POST">
                    <input name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button class="btn" name="login">Ingia</button>
                </form>
                <p style="font-size:13px;margin-top:10px">Admin: admin</p>
            </div>
        </div>
    </body>
</html>
