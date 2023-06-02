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
        <?php if(isset($_SESSION['logged'])){ ?>
<?php
    if(isset($_POST['addcourse'])){
        echo'<div class="addmore">
        <h3>Enter A New Course Below</h3>    
        <form action="newCourse.php" method="POST">
            <label>Course Title</label> <input type="text" name="course_title"/>
            <label>UCAS Code</label> <input type="text" name="course_ucas_code"/>
            <label>Course Level</label> <input type="text" name="course_level"/>
            <label>Starting Month/s</label> <input type="text" name="course_start"/>
            <label>Location</label> <input type="text" name="course_location"/>
            <label>Description</label> <textarea name="description" id="" cols="30" rows="50"></textarea><br><br>
            <label>Student Satisfaction</label> <input type="text" name="satisfaction"/>
            <label>Duration</label><br>
            <div class="formrow1"><label>Fulltime</label> <input type="text" name="duration_fulltime"/><label>Parttime</label> <input type="text" name="duration_parttime"/><label>Foundation</label> <input type="text" name="duration_foundation"/></div>
            <label>UK Fees</label><br>
            <div class="formrow1"><label>Fulltime</label> <input type="text" name="ukfees_fulltime"/><label>Parttime</label> <input type="text" name="ukfees_parttime"/><label>Foundation</label> <input type="text" name="ukfees_foundation"/></div>               
            <label>International Fees</label><br>
            <div class="formrow1"><label>Fulltime</label> <input type="text" name="internationalfees_fulltime"/><label>Foundation</label> <input type="text" name="internationalfees_foundation"/></div>
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
    </div>  ';
    }

    if(isset($_POST['editcourse'])){
        $course = $pdo->prepare('SELECT * FROM course WHERE course_title = :course');
        $edit = [
            'course' => $_POST['editcourse']
        ];
        $course ->execute($edit);
        foreach ($course as $row){
            echo '<div class="addmore"><h2>Edit '. $row['course_title'].'</h2>
            <form action="newCourse.php?'. $row['course_id'] .'" method="POST">
                    <label>Course Title</label> <input type="text" name="course_title" value="'.$row['course_title'].'"/>
                    <label>UCAS Code</label> <input type="text" name="course_ucas_code" value="'.$row['course_ucas_code'].'"/>
                    <label>Course Level</label> <input type="text" name="course_level" value="'.$row['course_level'].'"/>
                    <label>Starting Month/s</label> <input type="text" name="course_start" value="'.$row['course_start'].'"/>
                    <label>Location</label> <input type="text" name="course_location" value="'.$row['location'].'"/>
                    <label>Description</label> <textarea name="description" id="" cols="30" rows="10">'.$row['course_description'].'</textarea><br><br>
                    <label>Student Satisfaction</label> <input type="text" name="satisfaction" value="'.$row['course_satisfaction'].'"/>
                    <label>Duration</label><br>
                    <div class="formrow1"><label>Fulltime</label> <input type="text" name="duration_fulltime" value="'.$row['duration_fulltime'].'"/><label>Parttime</label> <input type="text" name="duration_parttime"value="'.$row['duration_parttime'].'"/><label>Foundation</label> <input type="text" name="duration_foundation"value="'.$row['duration_foundation'].'"/></div>
                    <label>UK Fees</label><br>
                    <div class="formrow1"><label>Fulltime</label> <input type="text" name="ukfees_fulltime" value="'.$row['uk_fees_fulltime'].'"/><label>Parttime</label> <input type="text" name="ukfees_parttime" value="'.$row['uk_fees_parttime'].'"/><label>Foundation</label> <input type="text" name="ukfees_foundation" value="'.$row['uk_fees_foundation'].'"/></div>               
                    <label>International Fees</label><br>
                    <div class="formrow1"><label>Fulltime</label> <input type="text" name="internationalfees_fulltime" value="'.$row['international_fees_fulltime'].'"/><label>Foundation</label> <input type="text" name="internationalfees_foundation" value="'.$row['international_fees_foundation'].'"/></div>
                    <label>Work Placement Fee</label>
                    <input type="text" name="workplacement" value="'.$row['work_placement'].'"/>
                    <label>Entry Requirements</label><br>
                    <div class="formrow1"><label>A Level</label> <input type="text" name="entry_alevel" value="'.$row['entry_grades_alevel'].'"/><label>BTEC</label> <input type="text" name="entry_btec" value="'.$row['entry_grades_btec'].'"/><label>T Level</label> <input type="text" name="entry_tlevel" value="'.$row['entry_grades_tlevel'].'"/></div>
                    <label>Foundation Requirements</label><br>
                    <div class="formrow1"><label>A Level</label> <input type="text" name="foundation_alevel" value="'.$row['foundation_grades_alevel'].'"/><label>BTEC</label> <input type="text" name="foundation_btec"value="'.$row['foundation_grades_btec'].'"/><label>T Level</label> <input type="text" name="foundation_tlevel"value="'.$row['foundation_grades_tlevel'].'"/></div>
                    <label>Language Requirements</label>
                    <input type="text" name="language" value="'.$row['language_requirements'].'"/>
                    <label>Year 1</label>
                    <div class="formrow1"><label>Module 1</label> <input type="text" name="y1_m1" value="'.$row['year1_module1'].'"/><label>Credits</label> <input type="text" name="y1_m1_cr" value="'.$row['y1_m1_credits'].'"/><label>Module 2</label> <input type="text" name="y1_m2" value="'.$row['year1_module2'].'"/><label>Credits</label> <input type="text" name="y1_m2_cr" value="'.$row['y1_m2_credits'].'"/><label>Module 3</label> <input type="text" name="y1_m3" value="'.$row['year1_module3'].'"/><label>Credits</label> <input type="text" name="y1_m3_cr" value="'.$row['y1_m3_credits'].'"/><label>Module 4</label> <input type="text" name="y1_m4" value="'.$row['year1_module4'].'"/><label>Credits</label> <input type="text" name="y1_m4_cr" value="'.$row['y1_m4_credits'].'"/><label>Module 5</label> <input type="text" name="y1_m5" value="'.$row['year1_module5'].'"/><label>Credits</label> <input type="text" name="y1_m5_cr" value="'.$row['y1_m5_credits'].'"/><label>Module 6</label> <input type="text" name="y1_m6" value="'.$row['year1_module6'].'"/><label>Credits</label> <input type="text" name="y1_m6_cr" value="'.$row['y1_m1_credits'].'"/></div>
                    <label>Year 2</label>
                    <div class="formrow1"><label>Module 1</label> <input type="text" name="y2_m1" value="'.$row['year2_module1'].'"/><label>Credits</label> <input type="text" name="y2_m1_cr" value="'.$row['y2_m1_credits'].'"/><label>Module 2</label> <input type="text" name="y2_m2" value="'.$row['year2_module2'].'"/><label>Credits</label> <input type="text" name="y2_m2_cr" value="'.$row['y2_m2_credits'].'"/><label>Module 3</label> <input type="text" name="y2_m3" value="'.$row['year2_module3'].'"/><label>Credits</label> <input type="text" name="y2_m3_cr" value="'.$row['y2_m3_credits'].'"/><label>Module 4</label> <input type="text" name="y2_m4" value="'.$row['year2_module4'].'"/><label>Credits</label> <input type="text" name="y2_m4_cr" value="'.$row['y2_m4_credits'].'"/><label>Module 5</label> <input type="text" name="y2_m5" value="'.$row['year2_module5'].'"/><label>Credits</label> <input type="text" name="y2_m5_cr" value="'.$row['y2_m5_credits'].'"/><label>Module 6</label> <input type="text" name="y2_m6" value="'.$row['year2_module6'].'"/><label>Credits</label> <input type="text" name="y2_m6_cr" value="'.$row['y2_m1_credits'].'"/></div>
                    <label>Year 3</label>
                    <div class="formrow1"><label>Module 1</label> <input type="text" name="y3_m1" value="'.$row['year3_module1'].'"/><label>Credits</label> <input type="text" name="y3_m1_cr" value="'.$row['y3_m1_credits'].'"/><label>Module 2</label> <input type="text" name="y3_m2"  value="'.$row['year3_module2'].'"/><label>Credits</label> <input type="text" name="y3_m2_cr" value="'.$row['y3_m2_credits'].'"/><label>Module 3</label> <input type="text" name="y3_m3" value="'.$row['year3_module3'].'"/><label>Credits</label> <input type="text" name="y3_m3_cr" value="'.$row['y3_m3_credits'].'"/><label>Module 4</label> <input type="text" name="y3_m4" value="'.$row['year3_module4'].'"/><label>Credits</label> <input type="text" name="y3_m4_cr" value="'.$row['y3_m4_credits'].'"/><label>Module 5</label> <input type="text" name="y3_m5" value="'.$row['year3_module5'].'"/><label>Credits</label> <input type="text" name="y3_m5_cr" value="'.$row['y3_m5_credits'].'"/><label>Module 6</label> <input type="text" name="y3_m6" value="'.$row['year3_module6'].'"/><label>Credits</label> <input type="text" name="y3_m6_cr" value="'.$row['y3_m1_credits'].'"/></div>
                    <input type="submit" name="submitnew" value="Add Course" />  
                </form></div>';
        }
    }
    if(isset($_POST['deletecourse'])){
        $course = $pdo->prepare('SELECT * FROM course WHERE course_title = :course');
        $edit = [
            'course' => $_POST['deletecourse']
        ];
        $course ->execute($edit);
        foreach ($course as $row){
            echo '<div class="addmore"><h2>WARNING</h2><h3>Are You Sure You Want To Delete '. $row['course_title'].'</h3>
                <form action="newCourse.php?del='. $row['course_id'].'"  method="post">
                    <input type="submit" name="removecourse" value="Yes" />
                    <input type="submit" name="course" value="No" />
                </form></div>';
        }
    }
?>
<?php } 
        else{ echo '<p>Please Login Click Here: </p>'?> 
            <div class="addmore">
                <form action="signinsignup.php" method="POST">
                    <input type="submit" name="login" value="login Please" />  
                </form>
            </div>    
        <?php
            }
        ?> 
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>