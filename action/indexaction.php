<?php
require('../config.php');

$myNum = $_POST["myNum"];
$myName = $_POST["myName"];
$myGroup = $_POST["myGroup"];
$todo = $_POST["todo"];
$detail = $_POST["detail"];
$link = $_POST['production_link'];
$tosay = $_POST['more_to_say'];
$done = $_POST['done'];
$talent = $_POST['talent'];

//put all detail into detail_total
$arrkey = array_keys($detail);
$last_key = end($arrkey);
$detail_total = "";
foreach ($detail as $key => $element) {
    if ($key == $last_key) {
        $detail_total = $detail_total . $element;
    } else {
        $detail_total = $detail_total . $element . "、";
    }
}


//伺服器連線，選擇資料庫
$con=mysqli_connect($db_host, $db_user, $db_pass);
    
//mysql_error()函數會返回上一個mysql操作產生的文本錯誤信息
    
if (mysqli_connect_errno($con)) {
    echo "Unable to connect: " . mysqli_connect_error();
}
    
 mysqli_query($con, 'SET CHARACTER SET utf8');
 $db_seleted=mysqli_select_db($con, $db_name);
 $sql="INSERT INTO users(stu_num,stu_name,stu_group,todo,detail,link,tosay,done,talent) 
       VALUES('$myNum','$myName','$myGroup','$todo','$detail_total','$link','$tosay','$done','$talent') 
       ON DUPLICATE KEY UPDATE stu_num='$myNum',stu_group='$myGroup',todo='$todo',detail='$detail_total',link='$link',tosay='$tosay',done='$done',talent='$talent'";
 $result=mysqli_query($con, $sql);
    
 mysqli_close($con);
 header('Location: ../display.php');
