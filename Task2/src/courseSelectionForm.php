<?php
    require 'mySql.php';

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
            <h3>Sample Course Selection Form</h3>
            <form action="./sampleReport.png" class="addmore">
            <?php
            $course = $pdo->prepare('SELECT * FROM course');
            $course ->execute();
                echo '<table>';
                echo '<tr><th>Course Name</th><th>UCAS Code</th><th>Level</th></tr>';
                foreach ($course as $row){  
                    echo '<tr>' .
                            '<td>' .$row['course_title'] . '</td>'.
                            '<td>'. $row['course_ucas_code'] . '</td>'.
                            '<td>' . $row['course_level'] . '</td>'.
                        '</tr>';
                }
                echo '</table>';
            ?>
                <p class="note">The sketch above provides a sample table for selecting the courses to include in the report. Once the courses have been selected from the table, the report can be created by clicking the button below.</p>
                <p class="blueNote">You can click of the button below to view a sketch of the report you are expected to develop.</p>
                <input type="submit" value="Create Course Report" />
                <!--input type="reset" value="Cancel" /-->                
            </form>
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>