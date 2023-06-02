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
                
            </ul>
        </nav>
        <main>
            <h2>Please Sign IN:</h2>
            <form action="signinsignup.php" method="POST">
                <label>Admin name</label> <input type="text" name="usersname"/>
                <label>Password</label> <input type="text" name="userpassword"/>

                <input type="submit" name="signin" value="Submit" />
            </form>
            <h2>Please Sign Up:</h2>
            <form action="signinsignup.php" method="POST">
                <label>Admin name</label> <input type="text" name="usersname"/>
                <label>Password</label> <input type="text" name="userpassword"/>

                <input type="submit" name="signup" value="Submit" />
            </form>
        </main>
        <footer>&copy; CSYM019 2023</footer>
    </body>
</html>