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
            <button id="add" type="button">Add New Course</button><!--https://developer.mozilla.org/en-US/docs/Web/HTML/Element/button -->
            <button id="edit" type="button">Edit Course</button>
            <button id="delete" type="button">Delete Course</button>
            <div class="addmore">
                <h3>Enter A New Course Below</h3>    
                <form action="newCourse.php" method="POST">
                    <label>Course Title</label> <input type="text" name="course_title"/>
                    <label>UCAS Code</label> <input type="text" name="course_ucas_code"/>
                    <label>Course Level</label> <input type="text" name="course_level"/>
                                    
                    <input type="submit" name="submitnew" value="Add Course" />  
                </form>
            </div>  
            <div class="editcourse">

            </div>  
            <div class="delcourse">
                <form action="newCourse.php" method="post">
                    <select name="deletecourse" />
                        <option value="">Choose A Course</option>
                        <?php
                            $course = $pdo->prepare('SELECT course_title FROM course');
                            $course ->execute(); 
                            foreach ($course as $title){
                                echo '<option value="' . $title['course_title'] .'">'. $title['course_title'] .'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" value="Delete Course" />  
                </form>
                <?php
                    if (isset($_POST['deletecourse'])) {
                        echo '
                        <div>
                            <h3>WARNING</h3>
                            <p>Are You Sure You Want To Delete ' . $_POST['deletecourse'] . '</p>
                        </div>';
                    }?>
            
            </div>
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>