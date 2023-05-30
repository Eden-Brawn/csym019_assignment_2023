<?php
    require 'mySql.php';

    $course = $pdo->prepare('SELECT * FROM course WHERE course_title = :course');
    $edit = [
        'course' => $_POST['editcourse']
    ];
    $course ->execute($edit); 

    if(isset($_POST['editcourse'])){
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
?>