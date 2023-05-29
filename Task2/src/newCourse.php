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
            <h3>Sample New Course Entery Form</h3>
            <form action="post">
                <div class="sketch">
                    <img src="./sampleEntryForm.png" alt="New course entry form">
                </div>    
                <div class="addmore">
                    <h2>Here you can add an article:</h2>
                    <form action="newCourse.php" method="POST">
                        <label>Enter Course Details</label>
                        <label>Course Title</label> <input type="text" name="course_title"/>
                        <label>UCAS Code</label> <input type="text" name="course_ucas_code"/>
                        <label>Course Level</label> <input type="text" name="course_level"/>
                        
                        <input type="submit" name="newcourse" value="Submit" />
                    </form>



                    <!-- add more feilds for the remaining recipe info ...-->
                    <p class="note">The sketch above provides an incomplete list of the required information for a new course. You need to add the missing feilds to the New Course Entry Form you are going to develop.</p>
                    <input type="submit" value="Add Course" />
                    <!--input type="reset" value="Cancel" /-->                
                </div>
            </form>
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>