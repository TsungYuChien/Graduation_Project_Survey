<?php
    require("../config.php");

    $myName = $_POST["myname"];
    $todo = $_POST["todo"];
    $detail = $_POST["tofind"];

    $con = mysqli_connect($db_host, $db_user, $db_pass);

    if (mysqli_connect_errno($con)) {
        echo "Unable to connect: ".mysqli_connect_error();
    }
    mysqli_query($con, "SET CHARACTER SET utf8");
    $db_selected = mysqli_select_db($con, $db_name);
    $sql = "INSERT INTO sendmsg(send_name,send_todo,msg_content) VALUES ('$myName','$todo','$detail')ON DUPLICATE KEY UPDATE send_todo='$todo',msg_content='$detail'";
    $result = mysqli_query($con, $sql);
    
    mysqli_close($con);
    header('Location: ../sendMsg.php');
