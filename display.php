<?php

    require("config.php");
    $movie="影視";
    $animation="動畫";
    $game="遊戲";
    $interactive="互動";
    $sale = "行銷";


    $con = mysqli_connect($db_host, $db_user, $db_pass);
    if (mysqli_connect_errno($con)) {
        echo "Unable to connect: " . mysqli_connect_error();
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
    <link rel="stylesheet" href="css/display.css">
    <title>畢製調查</title>
</head>
<body>
    
    <div class="title-top">
            <div class="title-left"><span>收集</span></div>
            <div class="title-right"><span>結果</span></div>
    </div>
    <div style="clear: both;"></div>

    <div class="MainBody">
        
        <a href="index.php" class="back"><div><span>回主頁</span></div></a>
        
        <div class="select-btn-content">
           <div id="overflow">
            <div class="select-btn all-btn">ALL</div>
            <div class="select-btn movie-btn">影視</div>
            <div class="select-btn animation-btn">動畫</div>
            <div class="select-btn game-btn">遊戲</div>
            <div class="select-btn interactive-btn">互動</div>
            <div class="select-btn sale-btn">行銷</div>
            <div style="clear: both;"></div>
            </div>
            
            
            <!-- detail-btn-content -->
            <div class="detail detail-btn-movie">
                <div class="detail-btn movie-return">←</div>
                <div class="detail-btn movie-director">導演</div>
                <div class="detail-btn movie-art">美術</div>
                <div class="detail-btn movie-writer">編劇</div>
                <div class="detail-btn movie-music">音效</div>
                <div class="detail-btn movie-postproduction">後製</div>
                <div class="detail-btn movie-camera">攝影</div>
                <div class="detail-btn movie-producer">製片</div>
                <div style="clear: both;"></div>
            </div>
            
            <div class="detail detail-btn-anim">
                <div class="detail-btn anim-return">←</div>
                <div class="detail-btn anim-art">美術</div>
                <div class="detail-btn anim-writer">編劇</div>
                <div class="detail-btn anim-music">音效</div>
                <div class="detail-btn anim-postproduction">後製</div>
                <div style="clear: both;"></div>
            </div>
            
            <div class="detail detail-btn-game">
                <div class="detail-btn game-return">←</div>
                <div class="detail-btn game-art">美術</div>
                <div class="detail-btn game-build">建模</div>
                <div class="detail-btn game-code">程式</div>
                <div class="detail-btn game-plan">企劃</div>
                <div class="detail-btn game-music">音效</div>
                <div style="clear: both;"></div>
            </div>
            
            <div class="detail detail-btn-interactive">
                <div class="detail-btn interactive-return">←</div>
                <div class="detail-btn interactive-art">美術</div>
                <div class="detail-btn interactive-code">程式</div>
                <div class="detail-btn interactive-plan">企劃</div>
                <div style="clear: both;"></div>
            </div>
            
            <div class="detail detail-btn-sale">
                <div class="detail-btn sale-return">←</div>
                <div class="detail-btn sale-art">美術</div>
                <div class="detail-btn sale-plan">企劃</div>
                <div style="clear: both;"></div>
            </div>
            
        </div>
        
        <div class="detail-btn-content">
            
        </div>

         
        <div class="showDetail">
           
           <div class="checkDone">
               <label class='container'>只顯示分組中＆未分組
                   <input type='checkbox' value=''>
                   <span class='checkmark'></span>
                </label>
           </div>
            
            <?php 
                $sql = "SELECT * FROM users WHERE todo='$movie'";
                $result = mysqli_query($con, $sql);
                $total_records = mysqli_num_rows($result);
                for($i=0;$i<$total_records;$i++){
                    $row = mysqli_fetch_array($result);
                    echo "<div class='detail-card Movie ";if($row['done']=='分完組') echo "done";echo"'>
                            <div class='col-1'>
                                <div><span class='txt-name'>".$row['stu_name']."</span></div>
                                <div><span class='txt-group'>".$row['stu_group']."</span></div>
                                <div><span class='txt-done'>".$row['done']."</span></div>";
                    if($row['link']!=null){
                       echo "<a href='".$row['link']."' target='_blank'><span class='txt-link'>作品集</span></a>";
                    }
                                
                    echo "</div>
                            <div class='col-2'>
                                <span class='txt-todo'>影視</span>
                                <span style='color: #00AA90; margin-right: 3vw;'>|</span>
                                <span class='txt-detail'>".$row['detail']."</span>
                            </div>
                            <div class='col-3'>
                                <span class='txt-ps'>".$row['talent']."</span>
                            </div>
                            <div class='col-4'>
                                <span class='txt-ps'>".$row['tosay']."</span>
                            </div>
                          </div>";
                }
            
            ?>
            
            <?php 
                $sql = "SELECT * FROM users WHERE todo='$animation'";
                $result = mysqli_query($con, $sql);
                $total_records = mysqli_num_rows($result);
                for($i=0;$i<$total_records;$i++){
                    $row = mysqli_fetch_array($result);
                    echo "<div class='detail-card Animation ";if($row['done']=='分完組') echo "done";echo"'>
                            <div class='col-1'>
                                <div><span class='txt-name'>".$row['stu_name']."</span></div>
                                <div><span class='txt-group'>".$row['stu_group']."</span></div>
                                <div><span class='txt-done'>".$row['done']."</span></div>";
                    if($row['link']!=null){
                        echo "<a href='".$row['link']."' target='_blank' class='link-btn'><span class='txt-link'>作品集</span></a>";
                    }
                                
                    echo "</div>
                            <div class='col-2'>
                                <span class='txt-todo'>動畫</span>
                                <span style='color: #00AA90; margin-right: 3vw;'>|</span>
                                <span class='txt-detail'>".$row['detail']."</span>
                            </div>
                            <div class='col-3'>
                                <span class='txt-ps'>".$row['talent']."</span>
                            </div>
                            <div class='col-4'>
                                <span class='txt-ps'>".$row['tosay']."</span>
                            </div>
                          </div>";
                }
            
            ?>
            
            <?php 
                $sql = "SELECT * FROM users WHERE todo='$game'";
                $result = mysqli_query($con, $sql);
                $total_records = mysqli_num_rows($result);
                for($i=0;$i<$total_records;$i++){
                    $row = mysqli_fetch_array($result);
                    echo "<div class='detail-card Game ";if($row['done']=='分完組') echo "done";echo"'>
                            <div class='col-1'>
                                <div><span class='txt-name'>".$row['stu_name']."</span></div>
                                <div><span class='txt-group'>".$row['stu_group']."</span></div>
                                <div><span class='txt-done'>".$row['done']."</span></div>";
                    if($row['link']!=null){
                        echo "<a href='".$row['link']."' target='_blank'><span class='txt-link'>作品集</span></a>";
                    }
                                
                    echo "</div>
                            <div class='col-2'>
                                <span class='txt-todo'>遊戲</span>
                                <span style='color: #00AA90; margin-right: 3vw;'>|</span>
                                <span class='txt-detail'>".$row['detail']."</span>
                            </div>
                            <div class='col-3'>
                                <span class='txt-ps'>".$row['talent']."</span>
                            </div>
                            <div class='col-4'>
                                <span class='txt-ps'>".$row['tosay']."</span>
                            </div>
                          </div>";
                }
            
            ?>
            
            <?php 
                $sql = "SELECT * FROM users WHERE todo='$interactive'";
                $result = mysqli_query($con, $sql);
                $total_records = mysqli_num_rows($result);
                for($i=0;$i<$total_records;$i++){
                    $row = mysqli_fetch_array($result);
                    echo "<div class='detail-card Interactive ";if($row['done']=='分完組') echo "done";echo"'>
                            <div class='col-1'>
                                <div><span class='txt-name'>".$row['stu_name']."</span></div>
                                <div><span class='txt-group'>".$row['stu_group']."</span></div>
                                <div><span class='txt-done'>".$row['done']."</span></div>";
                    if($row['link']!=null){
                        echo "<a href='".$row['link']."' target='_blank'><span class='txt-link'>作品集</span></a>";
                    }
                                
                    echo "</div>
                            <div class='col-2'>
                                <span class='txt-todo'>互動</span>
                                <span style='color: #00AA90; margin-right: 3vw;'>|</span>
                                <span class='txt-detail'>".$row['detail']."</span>
                            </div>
                            <div class='col-3'>
                                <span class='txt-ps'>".$row['talent']."</span>
                            </div>
                            <div class='col-4'>
                                <span class='txt-ps'>".$row['tosay']."</span>
                            </div>
                          </div>";
                }
            
            ?>
            
            <?php 
                $sql = "SELECT * FROM users WHERE todo='$sale'";
                $result = mysqli_query($con, $sql);
                $total_records = mysqli_num_rows($result);
                for($i=0;$i<$total_records;$i++){
                    $row = mysqli_fetch_array($result);
                    echo "<div class='detail-card Sale ";if($row['done']=='分完組') echo "done";echo"'>
                            <div class='col-1'>
                                <div><span class='txt-name'>".$row['stu_name']."</span></div>
                                <div><span class='txt-group'>".$row['stu_group']."</span></div>
                                <div><span class='txt-done'>".$row['done']."</span></div>";
                    if($row['link']!=null){
                        echo "<a href='".$row['link']."' target='_blank'><span class='txt-link'>作品集</span></a>";
                    }
                                
                    echo "</div>
                            <div class='col-2'>
                                <span class='txt-todo'>行銷</span>
                                <span style='color: #00AA90; margin-right: 3vw;'>|</span>
                                <span class='txt-detail'>".$row['detail']."</span>
                            </div>
                            <div class='col-3'>
                                <span class='txt-ps'>".$row['talent']."</span>
                            </div>
                            <div class='col-4'>
                                <span class='txt-ps'>".$row['tosay']."</span>
                            </div>
                          </div>";
                }
            
            ?>
            
            
        </div>
        

    </div>
    
    <div class="bottom">

    </div>
    

    <script>
    
        $(document).ready(function(){
            
            var storeState = ".done";
            var value = "";
            var isinside = false;
            /* is Done ? */
            
            function checkdone(){
                if($("input[type='checkbox']").prop('checked')==true) {
                    $(".done").hide();
                }else{
                    $(storeState).show();
                    if(isinside){
                        filterInside();
                    }
                }
            }
            
            function filterInside(){
                $(".showDetail "+storeState).filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
            }
            
            $("input[type='checkbox']").change(function() {
                
                checkdone();
                      
            });
            
            
            /* --------------------- */
            
            $(".detail").hide();
            
            // Select Button jQuery
            $(".movie-btn").click(function(){
                $(".detail-card").hide();
                $(".Movie").show();
                
                $(".select-btn").hide();
                $(".detail").hide();
                $(".detail-btn-movie").show();
                storeState = ".Movie";
                checkdone();
            });
            
            $(".animation-btn").click(function(){
                $(".detail-card").hide();
                $(".Animation").show();
                
                $(".select-btn").hide();
                $(".detail").hide();
                $(".detail-btn-anim").show();
                storeState = ".Animation";
                checkdone();
            });
            
            $(".game-btn").click(function(){
                $(".detail-card").hide();
                $(".Game").show();
                
                $(".select-btn").hide();
                $(".detail").hide();
                $(".detail-btn-game").show();
                storeState = ".Game";
                checkdone();
            });
            
            
            $(".interactive-btn").click(function(){
                $(".detail-card").hide();
                $(".Interactive").show();
                
                $(".select-btn").hide();
                $(".detail").hide();
                $(".detail-btn-interactive").show();
                storeState = ".Interactive";
                checkdone();
            });
            
            $(".sale-btn").click(function(){
                $(".detail-card").hide();
                $(".Sale").show();
                
                $(".select-btn").hide();
                $(".detail").hide();
                $(".detail-btn-sale").show();
                storeState = ".Sale";
                checkdone();
            });
            
            $(".all-btn").click(function(){
                $(".detail-card").show();
                storeState = ".done";
                checkdone();
            });
            
            
            // Select Detail Button
            //------------------------------------------------
            // movie
            $(".movie-return").click(function(){
                $(".detail-card").show();
                
                $(".detail-btn-movie").hide();
                $(".select-btn").show();
                storeState = ".done";
                isinside = false;
                checkdone();
            });
            $(".movie-director").on('click',function() {
                value = "導演";
                isinside = true;
                $(".showDetail .Movie").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".movie-art").on('click',function() {
                value = "美術";
                isinside = true;
                $(".showDetail .Movie").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".movie-writer").on('click',function() {
                value = "編劇";
                isinside = true;
                $(".showDetail .Movie").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".movie-music").on('click',function() {
                value = "音效";
                isinside = true;
                $(".showDetail .Movie").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".movie-postproduction").on('click',function() {
                value = "後製";
                isinside = true;
                $(".showDetail .Movie").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".movie-camera").on('click',function() {
                value = "攝影";
                isinside = true;
                $(".showDetail .Movie").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".movie-producer").on('click',function() {
                value = "製片";
                isinside = true;
                $(".showDetail .Movie").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            //-----------------------------------------------
            // animation
            $(".anim-return").click(function(){
                $(".Animation").hide();
                $(".detail-card").show();
                
                $(".detail-btn-anim").hide();
                $(".select-btn").show();
                storeState = ".done";
                isinside = false;
                checkdone();
            });
            $(".anim-art").on('click',function() {
                value = "美術";
                isinside = true;
                $(".showDetail .Animation").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".anim-writer").on('click',function() {
                value = "編劇";
                isinside = true;
                $(".showDetail .Animation").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".anim-music").on('click',function() {
                value = "音效";
                isinside = true;
                $(".showDetail .Animation").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".anim-producer").on('click',function() {
                value = "製片";
                isinside = true;
                $(".showDetail .Animation").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            
            //-----------------------------------------------
            //game
            $(".game-return").click(function(){
                $(".detail-card").show();
                
                $(".detail-btn-game").hide();
                $(".select-btn").show();
                storeState = ".done";
                isinside = false;
                checkdone();
            });
            $(".game-art").on('click',function() {
                value = "美術";
                isinside = true;
                $(".showDetail .Game").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".game-build").on('click',function() {
                value = "建模";
                isinside = true;
                $(".showDetail .Game").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".game-code").on('click',function() {
                value = "程式";
                isinside = true;
                $(".showDetail .Game").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".game-plan").on('click',function() {
                value = "企劃";
                isinside = true;
                $(".showDetail .Game").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".game-music").on('click',function() {
                value = "音效";
                isinside = true;
                $(".showDetail .Game").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
        
            //-----------------------------------------------
            //interactive
            $(".interactive-return").click(function(){
                $(".detail-card").show();
                
                $(".detail-btn-interactive").hide();
                $(".select-btn").show();
                storeState = ".done";
                isinside = false;
                checkdone();
            });
            $(".interactive-art").on('click',function() {
                value = "美術";
                isinside = true;
                $(".showDetail .Interactive").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".interactive-code").on('click',function() {
                value = "程式";
                isinside = true;
                $(".showDetail .Interactive").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".interactive-plan").on('click',function() {
                value = "企劃";
                isinside = true;
                $(".showDetail .Interactive").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            //-----------------------------------------------
            //sale
            $(".sale-return").click(function(){
                $(".detail-card").show();
                
                $(".detail-btn-sale").hide();
                $(".select-btn").show();
                storeState = ".done";
                isinside = false;
                checkdone();
            });
            $(".sale-art").on('click',function() {
                value = "美術";
                isinside = true;
                $(".showDetail .Sale").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            $(".sale-plan").on('click',function() {
                value = "企劃";
                isinside = true;
                $(".showDetail .Sale").filter(function() {
                    $(this).toggle($(this).text().indexOf(value)!=-1);
                });
                checkdone();
            });
            
        });
    
    </script>
    
    
    <?php  mysqli_close($con); ?>
    
</body>
</html>