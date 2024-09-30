<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header('location: ../');
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

if($_SESSION['userdata']['status'] == 0){
    $status = '<b style="color: red">Not Voted</b>';
}
else{
    $status = '<b style="color: green">Voted</b>';
}
?>

<html>
    <head>
        <title>Online Voting System - Dashborad</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
        <style>
            #profile{
                width: 20%;
                background-color: white;
                padding: 20px;
                float: left;
            }
            #group{
                width: 73%;
                background-color: white;
                padding: 20px;
                float: right;
            }
            #mainpanel{
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <div id="mainSection">
            <center>
                <div id="headersection">
                    <a href="../"><button style="float: left; margin: 10px;">Back</button></a>
                    <a href="logout.php"><button style="float: right; margin: 10px">Logout</button></a>
                    <br>
                    <h1>Online Voting System</h1>
                </div>
            </center>
            <hr/>
            <div id="mainpanel">
            <div id="profile">
                <center>
                    <img src="../uploads/<?php echo $userdata['photo']?>" height="100" width="100">
                </center>
                <br/><br/>
                <b>Name: <?php echo $userdata['name']?></b><br/><br/>
                <b>Mobile: <?php echo $userdata['mobile']?></b><br/><br/>
                <b>Address: <?php echo $userdata['address']?></b><br/><br/>
                <b>Status: <?php echo $status?></b><br/><br/>
            </div>
            <div id="group">
                <?php
                if($_SESSION['groupsdata']){
                    for($i = 0; $i < count($groupsdata); $i++){
                ?>
                    <div>
                        <img style="float: right;" src="../uploads/<?php echo $groupsdata[$i]['photo']?>" height="100" width="100"><br/><br/>
                        <b>Group Name: </b> <?php echo $groupsdata[$i]['name']?><br/><br/>
                        <b>Votes: </b><?php echo $groupsdata[$i]['votes']?><br/><br/>
                        <form action="../api/vote.php" method="POST">
                            <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes']?>">
                            <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
                            <?php
                            if($_SESSION['userdata']['status'] == 0){
                                ?>
                                <button name="votebtn" id="votebtn">Vote</button>
                                <?php
                            }
                            else{
                                ?>
                                <button name="votebtn" id="votebtn" style="cursor: not-allowed; background-color: green" disabled>Voted</button>
                                <?php
                            }
                            ?>
                            
                        </form>
                        <hr/>
                    </b>
                <?php
                    }
                }
                ?>
            </div>
            </div>
        </div>
    </body>
</html>