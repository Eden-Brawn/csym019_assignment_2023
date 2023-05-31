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
                <div class="container">    
                <?php
                $course = $pdo->prepare('SELECT * FROM course');
                $course ->execute();
                    echo '<table><col><col><col><col><col><col><col><colgroup span="3"></colgroup><colgroup span="3"></colgroup><colgroup span="2"></colgroup><col><colgroup span="3"></colgroup><colgroup span="3"></colgroup><col><colgroup span="12"></colgroup>'.
                    '<thead><tr><th rowspan="2">Course Name</th><th rowspan="2">UCAS Code</th><th rowspan="2">Level</th><th rowspan="2">Start</th><th rowspan="2">Location</th><th rowspan="2">Description</th><th rowspan="2">Satisfaction</th><th colspan="3">Duration</th><th colspan="3">UK Fees</th><th colspan="2">International Fees</th><th rowspan="2">Work Placement</th><th colspan="3">Entry Requirements</th><th colspan="3">Foundation Requirements</th><th rowspan="2">Language Requirements</th><th colspan="12">Year 1</th><th colspan="12">Year 2</th><th colspan="12">Year 3</th>'.
                    '<tr><th>Full Time</th><th>Part Time</th><th>Foundation</th><th>Full Time</th><th>Part Time</th><th>Foundation</th><th>Full Time</th><th>Foundation</th><th>A Level</th><th>BTEC</th><th>T Level</th><th>A Level</th><th>BTEC</th><th>T Level</th><th>Module 1</th><th>Credits</th><th>Module 2</th><th>Credits</th><th>Module 3</th><th>Credits</th><th>Module 4</th><th>Credits</th><th>Module 5</th><th>Credits</th><th>Module 6</th><th>Credits</th><th>Module 1</th><th>Credits</th><th>Module 2</th><th>Credits</th><th>Module 3</th><th>Credits</th><th>Module 4</th><th>Credits</th><th>Module 5</th><th>Credits</th><th>Module 6</th><th>Credits</th><th>Module 1</th><th>Credits</th><th>Module 2</th><th>Credits</th><th>Module 3</th><th>Credits</th><th>Module 4</th><th>Credits</th><th>Module 5</th><th>Credits</th><th>Module 6</th><th>Credits</th></tr></tr></thead>';
                    foreach ($course as $row){  
                        echo '<tr class="height">' .
                                '<td>' .$row['course_title'] . '</td>'.
                                '<td>'. $row['course_ucas_code'] . '</td>'.
                                '<td>' . $row['course_level'] . '</td>'.
                                '<td>' .$row['course_start'] . '</td>'.
                                '<td>'. $row['location'] . '</td>'.
                                '<td class="scroll">' . $row['course_description'] . '</td>'.
                                '<td>' .$row['course_satisfaction'] . '</td>'.
                                '<td>'. $row['duration_fulltime'] . '</td>'.
                                '<td>' . $row['duration_parttime'] . '</td>'.
                                '<td>' .$row['duration_foundation'] . '</td>'.
                                '<td>'. $row['uk_fees_fulltime'] . '</td>'.
                                '<td>' . $row['uk_fees_parttime'] . '</td>'.
                                '<td>' .$row['uk_fees_foundation'] . '</td>'.
                                '<td>'. $row['international_fees_fulltime'] . '</td>'.
                                '<td>' . $row['international_fees_foundation'] . '</td>'.
                                '<td>' .$row['work_placement'] . '</td>'.
                                '<td>'. $row['entry_grades_alevel'] . '</td>'.
                                '<td>' . $row['entry_grades_btec'] . '</td>'.
                                '<td>' .$row['entry_grades_tlevel'] . '</td>'.
                                '<td>'. $row['foundation_grades_alevel'] . '</td>'.
                                '<td>' . $row['foundation_grades_btec'] . '</td>'.
                                '<td>' .$row['foundation_grades_tlevel'] . '</td>'.
                                '<td>'. $row['language_requirements'] . '</td>'.
                                '<td>' . $row['year1_module1'] . '</td>'.
                                '<td>' .$row['y1_m1_credits'] . '</td>'.
                                '<td>'. $row['year1_module2'] . '</td>'.
                                '<td>' . $row['y1_m2_credits'] . '</td>'.
                                '<td>' .$row['year1_module3'] . '</td>'.
                                '<td>'. $row['y1_m3_credits'] . '</td>'.
                                '<td>' . $row['year1_module4'] . '</td>'.
                                '<td>' .$row['y1_m4_credits'] . '</td>'.
                                '<td>'. $row['year1_module5'] . '</td>'.
                                '<td>' . $row['y1_m5_credits'] . '</td>'.
                                '<td>' .$row['year1_module6'] . '</td>'.
                                '<td>'. $row['y1_m6_credits'] . '</td>'.
                                '<td>' . $row['year2_module1'] . '</td>'.
                                '<td>' .$row['y2_m1_credits'] . '</td>'.
                                '<td>'. $row['year2_module2'] . '</td>'.
                                '<td>' . $row['y2_m2_credits'] . '</td>'.
                                '<td>' .$row['year2_module3'] . '</td>'.
                                '<td>'. $row['y2_m3_credits'] . '</td>'.
                                '<td>' . $row['year2_module4'] . '</td>'.
                                '<td>' .$row['y2_m4_credits'] . '</td>'.
                                '<td>'. $row['year2_module5'] . '</td>'.
                                '<td>' . $row['y2_m5_credits'] . '</td>'.
                                '<td>' .$row['year2_module6'] . '</td>'.
                                '<td>'. $row['y2_m6_credits'] . '</td>'.
                                '<td>' . $row['year3_module1'] . '</td>'.
                                '<td>' .$row['y3_m1_credits'] . '</td>'.
                                '<td>'. $row['year3_module2'] . '</td>'.
                                '<td>' . $row['y3_m2_credits'] . '</td>'.
                                '<td>' .$row['year3_module3'] . '</td>'.
                                '<td>'. $row['y3_m3_credits'] . '</td>'.
                                '<td>' . $row['year3_module4'] . '</td>'.
                                '<td>' .$row['y3_m4_credits'] . '</td>'.
                                '<td>'. $row['year3_module5'] . '</td>'.
                                '<td>' . $row['y3_m5_credits'] . '</td>'.
                                '<td>' .$row['year3_module6'] . '</td>'.
                                '<td>'. $row['y3_m6_credits'] . '</td>'.
                            '</tr>';
                    }
                    echo '</table>';
                ?>
                </div>
                    <p class="note">The sketch above provides a sample table for selecting the courses to include in the report. Once the courses have been selected from the table, the report can be created by clicking the button below.</p>
                    <p class="blueNote">You can click of the button below to view a sketch of the report you are expected to develop.</p>
                    <input type="submit" value="Create Course Report" />
                    <!--input type="reset" value="Cancel" /-->                
            </form>
            
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>