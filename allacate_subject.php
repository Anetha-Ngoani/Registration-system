<?php 
    include 'config/db.php'; 
    if(!isset($_SESSION['user'])) header("Location: login.php");
    $sid=$_GET['sid']; 
    $stu=$conn->query("SELECT s.*,c.class_level FROM students s JOIN classes c ON s.class_id=c.id WHERE s.id=$sid")->fetch_assoc();
    if(isset($_POST['save'])){ 
        $conn->query("DELETE FROM student_subjects WHERE student_id=$sid");
        foreach($_POST['subjects'] as $subid){
            $conn->query("INSERT INTO student_subjects(student_id,subject_id) VALUES($sid,$subid)");
        } $msg="Masomo yamehifadhiwa";
    }
    $subs=$conn->query("SELECT * FROM subjects WHERE class_level='{$stu['class_level']}'");
    $taken=$conn->query("SELECT subject_id FROM student_subjects WHERE student_id=$sid"); 
    $taken_ids=[]; while($t=$taken->fetch_assoc())$taken_ids[]=$t['subject_id'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Allocate Subjects</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="header">
            <img src="assets/img/logo.png">
            <h1>Weka Masomo: <?=$stu['fullname']?></h1>
            <div class="nav">
                <a href="students.php">Rudi</a>
            </div>
        </div>
        <div class="container">
            <h3>Darasa: <?=$stu['class_level']?></h3>
            <?php 
                if(isset($msg)) 
                echo "<p style='color:green'>$msg</p>";
            ?>
            <form method="POST">
                <?php 
                    while($sub=$subs->fetch_assoc()){
                        $chk=in_array($sub['id'],$taken_ids)?'checked':''; 
                        echo "<label><input type='checkbox' name='subjects[]' value='{$sub['id']}' $chk> {$sub['subject_name']} - {$sub['subject_code']}</label><br>";
                     }
                ?>
                <button class="btn" name="save">Hifadhi Masomo</button>
            </form>
        </div>
    </body>
</html>
