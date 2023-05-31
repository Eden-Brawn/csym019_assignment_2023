<?php
    require 'mySql.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Course Report</title>
        <link rel="stylesheet" href="layout.css">
        <script src="course.js"></script>
    </head>
    <body>
        <header>
            <h3>CSYM019 - UNIVERSITY COURSES</h3>
        </header>
        <nav>
            <ul>
                <li><a href="./courseSelectionForm.php">Course Report</a></li>
                <li><a href="./newCourse.php">New Course</a></li>
            </ul>
        </nav>
        <main>
<?php
    if(isset($_POST['editcourse'])){
        $course = $pdo->prepare('SELECT * FROM course WHERE course_title = :course');
        $edit = [
            'course' => $_POST['editcourse']
        ];
        $course ->execute($edit);
        foreach ($course as $row){
            echo '<h2>Edit '. $row['course_title'].'</h2>
            <form action="newCourse.php?edit='. $row['course_id'].'"  method="post">
                <label>Course Title</label> <input type="text" name="title" value="'. $row['course_title'].'"/>
                <label>Course UCAS Code</label> <input type="text" name="ucas" value="'. $row['course_ucas_code'].'"/>
                <label>Course Level</label> <input type="text" name="level" value="'. $row['course_level'].'"/>
                <input type="submit" name="altercourse" value="Confirm Edit" />
            </form>';
        }
    }
    if(isset($_POST['deletecourse'])){
        $course = $pdo->prepare('SELECT * FROM course WHERE course_title = :course');
        $edit = [
            'course' => $_POST['deletecourse']
        ];
        $course ->execute($edit);
        foreach ($course as $row){
            echo '<h2>WARNING</h2><h3>Are You Sure You Want To Delete '. $row['course_title'].'</h3>
                <form action="newCourse.php?del='. $row['course_id'].'"  method="post">
                    <input type="submit" name="removecourse" value="Yes" />
                    <input type="submit" name="course" value="No" />
                </form>';
        }
    }
?>
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>