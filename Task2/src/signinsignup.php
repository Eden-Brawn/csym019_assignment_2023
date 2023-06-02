<?php
session_start();
    require 'mySql.php';
    if(isset($_POST['signin'])){
        $search = $pdo->prepare('SELECT * FROM admins WHERE admin_name = :adminname');
        $values = [
            'adminname' => $_POST['admin']
        ];
        $search->execute($values);
        $entry = $search->fetch();
        if (password_verify($_POST['pass'], $entry['admin_password'])) {
            $_SESSION['logged'] = true; 
            header("location:newCourse.php");
        }
        else{
            echo 'Not Recognised, Retry Please.';
        }
    }
    
    
    if(isset($_POST['signup'])){
        $add = $pdo->prepare('INSERT INTO admins (admin_name, admin_password) 
                                VALUES (:adminnew, :passnew)');
            $_SESSION['logged'] = true; 
            $passwordhash = password_hash($_POST['passnew'], PASSWORD_DEFAULT);
            $new = [
                'adminnew' => $_POST['adminnew'],
                'passnew' => $passwordhash
            ];
            $add->execute($new); 
            header("location:newCourse.php");
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
                
            </ul>
        </nav>
        <main>
            <div class="addmore">
                <h2>Please Sign IN:</h2>
                <form action="signinsignup.php" method="POST">
                    <label>Admin name</label> <input type="text" name="admin"/>
                    <label>Password</label> <input type="text" name="pass"/>

                    <input type="submit" name="signin" value="Submit" />
                </form>
                <h2>Please Sign Up:</h2>
                <form action="signinsignup.php" method="POST">
                    <label>Admin name</label> <input type="text" name="adminnew"/>
                    <label>Password</label> <input type="text" name="passnew"/>

                    <input type="submit" name="signup" value="Submit" />
                </form>
            </div>
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>