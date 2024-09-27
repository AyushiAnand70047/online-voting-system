<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header('location: ../');
}
?>

<html>
    <head>
        <title>Online Voting System - Dashborad</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <div id="headersection">
            <button style="float: left;">Back</button>
            <button style="float: right;">Logout</button>
            <br>
            <h1>Online Voting System</h1>
        </div>
        <hr/>
        <div id="profile"></div>
        <div id="group"></div>
    </body>
</html>