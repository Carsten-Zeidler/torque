<?php
//include("creds.php");
session_set_cookie_params(0,dirname($_SERVER['SCRIPT_NAME']));
session_start();

// Get the Full URL to the session.php file
$thisfile = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$parts = strtok("url.php", $thisfile);
$parts = array("https://".$_SERVER["SERVER_NAME"]."/");

if (isset($_GET["makechart"])) {
    $baselink = $parts[0]."session.php";
    if (isset($_GET["seshid"])) {
        $seshid = strval($_GET["seshid"]);
        if (isset($_POST["plotdata"])) {
            $plotdataarray = $_POST["plotdata"];
            $s1data = $plotdataarray[0];
            $s2data = $plotdataarray[1];
            $outurl = $baselink."?id=".$seshid."&s1=".$s1data."&s2=".$s2data;
        }
        else {
            $seshid = $_SESSION['recent_session_id'];
            $outurl = $baselink."?id=".$seshid;
        }
    }
    else {
        $seshid = $_SESSION['recent_session_id'];
        $outurl = $baselink."?id=".$seshid;
    }
}
else {
    $baselink = $parts[0]."session.php";
    if (isset($_POST["seshidtag"])) {
        $seshid = strval($_POST["seshidtag"]);
        $outurl = $baselink."?id=".$seshid;
    }
    else {
        $seshid = $_SESSION['recent_session_id'];
        $outurl = $baselink."?id=".$seshid;
    }
}

header("Location: ".$outurl);

?>
