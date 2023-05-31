<?php
    require 'mySql.php';

    if (isset($_POST['submitnew'])) {
        $stmt = $pdo->prepare('INSERT INTO course (course_title, course_ucas_code, course_level, course_start, location, course_description, course_satisfaction, duration_fulltime, duration_parttime, duration_foundation, uk_fees_fulltime, uk_fees_parttime, uk_fees_foundation, international_fees_fulltime, international_fees_foundation, work_placement, entry_grades_alevel, entry_grades_btec, entry_grades_tlevel, foundation_grades_alevel, foundation_grades_btec, foundation_grades_tlevel, language_requirements, year1_module1, y1_m1_credits, year1_module2, y1_m2_credits, year1_module3, y1_m3_credits, year1_module4, y1_m4_credits, year1_module5, y1_m5_credits, year1_module6, y1_m6_credits, year2_module1, y2_m1_credits, year2_module2, y2_m2_credits, year2_module3, y2_m3_credits, year2_module4, y2_m4_credits, year2_module5, y2_m5_credits, year2_module6, y2_m6_credits, year3_module1, y3_m1_credits, year3_module2, y3_m2_credits, year3_module3, y3_m3_credits, year3_module4, y3_m4_credits, year3_module5, y3_m5_credits, year3_module6, y3_m6_credits) 
                                VALUES (:title, :ucas, :gradlevel, :starting, :place, :descript, :satisfaction, :durfull, :durpart, :durfound, :ukfull, :ukpart, :ukfound, :intfull, :intfound, :work, :entalev, :entbtec, :enttlev, :foualev, :foubtec, :foutlev, :lang, :y1m1, :y1m1cr, :y1m2, :y1m2cr, :y1m3, :y1m3cr, :y1m4, :y1m4cr, :y1m5, :y1m5cr, :y1m6, :y1m6cr, :y2m1, :y2m1cr, :y2m2, :y2m2cr, :y2m3, :y2m3cr, :y2m4, :y2m4cr, :y2m5, :y2m5cr, :y2m6, :y2m6cr, :y3m1, :y3m1cr, :y3m2, :y3m2cr, :y3m3, :y3m3cr, :y3m4, :y3m4cr, :y3m5, :y3m5cr, :y3m6, :y3m6cr)');
        $values = [
            'title' => $_POST['course_title'], 'ucas' => $_POST['course_ucas_code'], 'gradlevel' => $_POST['course_level'], 'starting' => $_POST['course_start'],
            'place' => $_POST['course_location'], 'descript' => $_POST['course_description'], 'satisfaction' => $_POST['student_satisfaction'],
            'durfull' => $_POST['duration_fulltime'], 'durpart' => $_POST['duration_parttime'], 'durfound' => $_POST['duration_foundation'],
            'ukfull' => $_POST['ukfees_fulltime'], 'ukpart' => $_POST['ukfees_parttime'], 'ukfound' => $_POST['ukfees_foundation'],
            'intfull' => $_POST['internationalfees_fulltime'], 'intfound' => $_POST['internationalfees_foundation'], 'work' => $_POST['workplacement'],
            'entalev' => $_POST['entry_alevel'], 'entbtec' => $_POST['entry_btec'], 'enttlev' => $_POST['entry_tlevel'],
            'foualev' => $_POST['foundation_alevel'], 'foubtec' => $_POST['foundation_btec'], 'foutlev' => $_POST['foundation_tlevel'], 'lang' => $_POST['language'],
            'y1m1' => $_POST['y1_m1'], 'y1m1cr' => $_POST['y1_m1_cr'], 'y1m2' => $_POST['y1_m2'], 'y1m2cr' => $_POST['y1_m2_cr'], 'y1m3' => $_POST['y1_m3'], 'y1m3cr' => $_POST['y1_m3_cr'],  'y1m4' => $_POST['y1_m4'], 'y1m4cr' => $_POST['y1_m4_cr'], 'y1m5' => $_POST['y1_m5'], 'y1m5cr' => $_POST['y1_m5_cr'], 'y1m6' => $_POST['y1_m6'], 'y1m6cr' => $_POST['y1_m6_cr'],
            'y2m1' => $_POST['y2_m1'], 'y2m1cr' => $_POST['y2_m1_cr'], 'y2m2' => $_POST['y2_m2'], 'y2m2cr' => $_POST['y2_m2_cr'], 'y2m3' => $_POST['y2_m3'], 'y2m3cr' => $_POST['y2_m3_cr'],  'y2m4' => $_POST['y2_m4'], 'y2m4cr' => $_POST['y2_m4_cr'], 'y2m5' => $_POST['y2_m5'], 'y2m5cr' => $_POST['y2_m5_cr'], 'y2m6' => $_POST['y2_m6'], 'y2m6cr' => $_POST['y2_m6_cr'],
            'y3m1' => $_POST['y3_m1'], 'y3m1cr' => $_POST['y3_m1_cr'], 'y3m2' => $_POST['y3_m2'], 'y3m2cr' => $_POST['y3_m2_cr'], 'y3m3' => $_POST['y3_m3'], 'y3m3cr' => $_POST['y3_m3_cr'],  'y3m4' => $_POST['y3_m4'], 'y3m4cr' => $_POST['y3_m4_cr'], 'y3m5' => $_POST['y3_m5'], 'y3m5cr' => $_POST['y3_m5_cr'], 'y3m6' => $_POST['y3_m6'], 'y3m6cr' => $_POST['y3_m6_cr']

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