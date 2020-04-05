<?php
    
    require("config.php");
    
    $con = mysqli_connect($db_host,$db_user,$db_pass);
    if(mysqli_connect_errno($con)){
        echo "Unable to connect: ".mysqli_connect_error();
    }

    mysqli_query($con, 'SET CHARACTER SET utf8');
    $db_selected = mysqli_select_db($con, $db_name);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/sendMsg.css">
    <title>畢製調查</title>
</head>
<body>
   
   <div class="title-top">
            <div class="title-left"><span>加入</span></div>
            <div class="title-right"><span>我們</span></div>
    </div>
    <div style="clear: both;"></div>
   
    <div class="main-content">

        <div class="main-green">
           
            <div class="msg-display">
                <?php
                
                    $sql = "SELECT * FROM sendmsg";
                    $result = mysqli_query($con,$sql);
                    $total_records = mysqli_num_rows($result);
                    for($i=0;$i<$total_records;$i++){
                        $row = mysqli_fetch_array($result);
                        echo "<div class='col'>";
                        echo "<div class='mark'>
                                <label>✦</label>
                              </div>";
                        echo "<div class='msg'>";
                        echo "<span>".$row['send_name']."</span>";
                        echo "<span style='color: black;'>想要找</span>";
                        echo "<span>".$row['send_todo']."</span>";
                        echo "<span style='color: black;'>組員，目前缺</span>";
                        echo "<span>".$row['msg_content']."</span>";
                        echo "</div>";
                        echo "</div>";
                        echo "<br><br>";
                    }
                
                ?>    
            </div>
           
            <div class="msg-send">
                <form action="action/sendMsgAction.php" method="post">
                    <span>我是</span>
                    <input type="text" name="myname" placeholder="姓名" id="name-text">
                    <span>我們組想做</span>

                    <!-- Select What to do -->
                    <select name="todo" id="todo">
                        <option value="" selected disabled hidden>選擇</option>
                        <option value="影視">影視</option>
                        <option value="動畫">動畫</option>
                        <option value="遊戲">遊戲</option>
                        <option value="互動">互動</option>
                    </select>

                    <span>，我們想找</span>
                  
                    <input type="text" name="tofind" placeholder="請輸入" id="long-text">
    
                    <input type="submit" value="發送">
                </form>
            </div>
            
        </div>
    </div>
    
    <div class="bottom">

    </div>

    <script>
        $(document).ready(function(){
            
            $("form").submit(function(){
                var empty_text = true;
                var empty_select = true;
                
                if($("#name-text").val()!="" && $("#long-text").val()!=""){
                    empty_text = false;
                }else{
                    empty_text = true;
                }
                
                if($('#todo').val()!= null){
                      empty_select = false;
                }else{
                      empty_select = true;
                }
               
                if(empty_text==true || empty_select==true){
                    alert("要填完");
                    return false;
                }else{
                    return true;
                }
                
            });
            
        });
    </script>
    
    <?php  mysqli_close($con); ?>

</body>
</html>