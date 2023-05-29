<?php
    require 'mySql.php';

    if (isset($_POST['submit'])) {
        $stmt = $pdo->prepare('INSERT INTO person (email, birthday, firstname, surname) VALUES (:email, :birthday, :firstname, :surname)');
        $values = [
            'firstname' => $_POST['firstname'],
            'surname' => $_POST['surname'],
            'email' => $_POST['email'],
            'birthday' => $_POST['birthday']
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
            <h3>Sample New Course Entery Form</h3>
                <div class="sketch">
                    <img src="./sampleEntryForm.png" alt="New course entry form">
                </div> 
                <div class="addmore">
                <h3>Enter A New Course Below</h3>    
                    <form action="newCourse.php" method="POST">
                        <label>Course Title</label> <input type="text" name="course_title"/>
                        <label>UCAS Code</label> <input type="text" name="course_ucas_code"/>
                        <label>Course Level</label> <input type="text" name="course_level"/>
                                
                        <input type="submit" value="Add Course" />  
                    </form>
                </div>
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>