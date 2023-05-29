<?php
    require 'mySql.php';

    if (isset($_POST['submitnew'])) {
        $stmt = $pdo->prepare('INSERT INTO course (course_title, course_ucas_code, course_level) VALUES (:title, :ucas, :gradlevel)');
        $values = [
            'title' => $_POST['course_title'],
            'ucas' => $_POST['course_ucas_code'],
            'gradlevel' => $_POST['course_level']
        ];
        $stmt->execute($values);
    }
    ?>

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
            
            <div class="addmore">
                <h3>Enter A New Course Below</h3>    
                <form action="newCourse.php" method="POST">
                    <label>Course Title</label> <input type="text" name="course_title"/>
                    <label>UCAS Code</label> <input type="text" name="course_ucas_code"/>
                    <label>Course Level</label> <input type="text" name="course_level"/>
                                    
                    <input type="submit" name="submitnew" value="Add Course" />  
                </form>
            </div>    
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>