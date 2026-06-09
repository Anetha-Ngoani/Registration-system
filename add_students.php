<?php 
    include 'config/db.php'; 
    if(!isset($_SESSION['user'])) header("Location: login.php");
    if(isset($_POST['save'])){
        $adm="TSS".rand(1000,9999); 
        $name=$_POST['fullname']; 
        $gender=$_POST['gender']; 
        $dob=$_POST['dob']; 
        $class=$_POST['class_id']; 
        $guard=$_POST['guardian']; 
        $phone=$_POST['phone'];
        $photo=$_FILES['photo']['name']; 
        move_uploaded_file($_FILES['photo']['tmp_name'],"assets/img/$photo");
        $conn->query("INSERT INTO students(admission_no,fullname,gender,dob,class_id,guardian_name,guardian_phone,photo) VALUES('$adm','$name','$gender','$dob',$class,'$guard','$phone','$photo')");
        $msg="Mwanafunzi $name amesajiliwa. No: $adm";
    }$cls=$conn->query("SELECT * FROM classes");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Student</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="header">
            <img src="assets/img/logo.png">
            <h1>Sajili Mwanafunzi Mpya</h1>
            <div class="nav">
                <a href="dashboard.php">Dashboard</a>
            </div>
        </div>
        <div class="container">
            <h2>Fomu ya Usajili</h2>
            <?php if(isset($msg)) echo "<p style='color:green'>$msg</p>";
            ?>
            <form method="POST" enctype="multipart/form-data">
                <input name="fullname" placeholder="Jina Kamili" required>
                <select name="gender" required>
                    <option value="">Jinsia</option>
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <input type="date" name="dob" required>
                <select name="class_id" required>
                    <option value="">Chagua Darasa</option>
                    <?php while($c=$cls->fetch_assoc())echo "<option value='{$c['id']}'>{$c['class_name']}</option>";
                    ?>
                </select>
                <input name="guardian" placeholder="Jina la Mzazi/Mlezi" required><br>
                <input name="phone" placeholder="Simu ya Mzazi" required><br>
                <input type="file" name="photo" accept="image/*" required>
                <button class="btn" name="save">Hifadhi</button>
            </form>
        </div>
    </body>
</html>
