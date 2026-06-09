<?php
    include 'config/db.php';

    if(!isset($_SESSION['user'])){
        header("Location: login.php");
        exit();
    }

    $sql = "SELECT students.*, classes.class_name
            FROM students
            INNER JOIN classes
            ON students.class_id = classes.id
            ORDER BY students.id DESC";

    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Students</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="header">
            <img src="assets/img/logo.png" alt="Logo">
            <h1>Student List</h1>
            <div class="nav">
                <a href="dashboard.php">Dashboard</a>
                <a href="add_student.php">Add Student</a>
            </div>
        </div>

        <div class="container">
            <h2>Registered Students</h2>
            <table border="1" width="100%">
                <tr>
                    <th>Photo</th>
                    <th>Admission No</th>
                    <th>Full Name</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Guardian Phone</th>
                    <th>Action</th>
                </tr>

                <?php
                    if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                ?>
                <tr>
                    <td>
                        <img src="assets/img/<?php echo $row['photo']; ?>"
                            width="50" height="50">
                    </td>

                    <td><?php echo $row['admission_no']; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['class_name']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['guardian_phone']; ?></td>

                    <td>
                        <a href="allocate_subjects.php?sid=<?php echo $row['id']; ?>">
                            Subjects
                        </a>
                        |
                        <a href="report_card.php?sid=<?php echo $row['id']; ?>">
                            Report
                        </a>
                    </td>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="7">No students found</td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </body>
</html>
