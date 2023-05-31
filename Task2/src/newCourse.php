<?php
    require 'mySql.php';

    if (isset($_POST['submitnew'])) {
        $stmt = $pdo->prepare('INSERT INTO course (course_title, course_ucas_code, course_level) VALUES (:title, :ucas, :gradlevel, :starting)');
        $values = [
            'title' => $_POST['course_title'], 'ucas' => $_POST['course_ucas_code'], 'gradlevel' => $_POST['course_level'],
            'starting' => $_POST['course_start']
        ];
        $stmt->execute($values);
    }
    if(isset($_POST['removecourse'])){
            $delete = $pdo->prepare('DELETE FROM course WHERE course_id = :course');
            $values = [
                'course' => $_GET['del']
            ];
            $delete->execute($values);
    }
    if(isset($_POST['altercourse'])){
        $course = $pdo->prepare('UPDATE course SET course_title = :title, course_ucas_code = :ucas, course_level = :gradlevel WHERE course_id = :edit');
        $edit = [
            'title' => $_POST['title'],
            'ucas' => $_POST['ucas'],
            'gradlevel' => $_POST['level'],
            'edit' => $_GET['edit']

        ];
        $course->execute($edit);
}
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
                    <label>Starting Month/s</label> <input type="text" name="course_start"/>
                    <label>Location</label> <input type="text" name="course_location"/>
                    <label>Description</label> <textarea name="description" id="" cols="30" rows="10"></textarea><br><br>
                    <label>Student Satisfaction</label> <input type="text" name="satisfaction"/>
                    <label>Duration</label><br>
                    <div class="formrow1"><label>Fulltime</label> <input type="text" name="duration_fulltime"/><label>Parttime</label> <input type="text" name="duration_parttime"/><label>Foundation</label> <input type="text" name="duration_foundation"/></div>
                    <label>UK Fees</label><br>
                    <div class="formrow1"><label>Fulltime</label> <input type="text" name="ukfees_fulltime"/><label>Parttime</label> <input type="text" name="ukfees_parttime"/><label>Foundation</label> <input type="text" name="ukfees_foundation"/></div>               
                    <label>International Fees</label><br>
                    <div class="formrow1"><label>Fulltime</label> <input type="text" name="internationalfees_fulltime"/><label>Foundation</label> <input type="text" name="international_foundation"/></div>
                    <label>Work Placement Fee</label>
                    <input type="text" name="workplacement" />
                    <label>Entry Requirements</label><br>
                    <div class="formrow1"><label>A Level</label> <input type="text" name="entry_alevel"/><label>BTEC</label> <input type="text" name="entry_btec"/><label>T Level</label> <input type="text" name="entry_tlevel"/></div>
                    <label>Foundation Requirements</label><br>
                    <div class="formrow1"><label>A Level</label> <input type="text" name="foundation_alevel"/><label>BTEC</label> <input type="text" name="foundation_btec"/><label>T Level</label> <input type="text" name="foundation_tlevel"/></div>
                    <label>Language Requirements</label>
                    <input type="text" name="language" />
                    <label>Year 1</label>
                    <div class="formrow1"><label>Module 1</label> <input type="text" name="y1_m1"/><label>Credits</label> <input type="text" name="y1_m1_cr"/><label>Module 2</label> <input type="text" name="y1_m2"/><label>Credits</label> <input type="text" name="y1_m2_cr"/><label>Module 3</label> <input type="text" name="y1_m3"/><label>Credits</label> <input type="text" name="y1_m3_cr"/><label>Module 4</label> <input type="text" name="y1_m4"/><label>Credits</label> <input type="text" name="y1_m4_cr"/><label>Module 5</label> <input type="text" name="y1_m5"/><label>Credits</label> <input type="text" name="y1_m5_cr"/><label>Module 6</label> <input type="text" name="y1_m6"/><label>Credits</label> <input type="text" name="y1_m6_cr"/></div>
                    <label>Year 2</label>
                    <div class="formrow1"><label>Module 1</label> <input type="text" name="y2_m1"/><label>Credits</label> <input type="text" name="y2_m1_cr"/><label>Module 2</label> <input type="text" name="y2_m2"/><label>Credits</label> <input type="text" name="y2_m2_cr"/><label>Module 3</label> <input type="text" name="y2_m3"/><label>Credits</label> <input type="text" name="y2_m3_cr"/><label>Module 4</label> <input type="text" name="y2_m4"/><label>Credits</label> <input type="text" name="y2_m4_cr"/><label>Module 5</label> <input type="text" name="y2_m5"/><label>Credits</label> <input type="text" name="y2_m5_cr"/><label>Module 6</label> <input type="text" name="y2_m6"/><label>Credits</label> <input type="text" name="y2_m6_cr"/></div>
                    <label>Year 3</label>
                    <div class="formrow1"><label>Module 1</label> <input type="text" name="y3_m1"/><label>Credits</label> <input type="text" name="y3_m1_cr"/><label>Module 2</label> <input type="text" name="y3_m2"/><label>Credits</label> <input type="text" name="y3_m2_cr"/><label>Module 3</label> <input type="text" name="y3_m3"/><label>Credits</label> <input type="text" name="y3_m3_cr"/><label>Module 4</label> <input type="text" name="y3_m4"/><label>Credits</label> <input type="text" name="y3_m4_cr"/><label>Module 5</label> <input type="text" name="y3_m5"/><label>Credits</label> <input type="text" name="y3_m5_cr"/><label>Module 6</label> <input type="text" name="y3_m6"/><label>Credits</label> <input type="text" name="y3_m6_cr"/></div>
                    <input type="submit" name="submitnew" value="Add Course" />  
                </form>
            </div>  
            <div class="editcourse">
                <h3>Edit A Course Below</h3>  
                <form action="editDeleteCourse.php" method="post" id="confirm">
                    <select name="editcourse" />
                        <option value="">Choose A Course To Edit</option>
                        <?php
                            $course = $pdo->prepare('SELECT course_title FROM course');
                            $course ->execute(); 
                            foreach ($course as $title){
                                echo '<option value="' . $title['course_title'] .'">'. $title['course_title'] .'</option>';
                            }
                        ?>
                    </select>
                    <input type="submit" value="Edit Course" />  
                </form>
            </div>  
            <div class="delcourse">
                <h3>Delete A Course Below</h3>  
                <form action="editDeleteCourse.php" method="post" id="confirm">
                    <select name="deletecourse" />
                        <option value="">Choose A Course To Delete</option>
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
            
            </div>
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>