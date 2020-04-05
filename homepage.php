<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/homepage.css">
    <title>畢製調查</title>
</head>
<body>
 
    <div class="title">
            <div class="title-left"><span>對號</span></div>
            <div class="title-right"><span>入座</span></div>
        </div>
    <div style="clear: both;"></div>
    
    <div class="MainBody">
        <div class="fillin-form">
            <form action="action/indexaction.php" method="post">

                <div class="stu-input">
                    <span>學號</span>
                    <input type="text" name="myNum" placeholder="請輸入" id="num-text">
                </div>
                <div class="stu-input">
                    <span>姓名</span>
                    <input type="text" name="myName" placeholder="請輸入" id="name-text">
                </div>

                <!-- Select Group -->
                <div class="stu-input-select">
                    <span>組別</span>
                    <div class="box-1">
                        <select name="myGroup" id="myGroup">
                            <option value="" selected disabled hidden>請選擇組別 ▼</option>
                            <option value="設計組">設計組</option>
                            <option value="科技組">科技組</option>
                        </select>
                    </div>  
                </div>
                
                

                <!-- Select What to do -->
                <div class="stu-input-select2">
                    <span>想做什麼</span>
                    <div class="box-2">
                        <select name="todo" id="todo">
                            <option value="" selected disabled hidden>請選擇 ▼</option>
                            <option value="影視">影視</option>
                            <option value="動畫">動畫</option>
                            <option value="遊戲">遊戲</option>
                            <option value="互動">互動</option>
                            <option value="行銷">行銷</option>
                        </select>   
                    </div>
                    
                </div>
                
                <div class="set-col">
                   <!-- More Detail -->
                    <div class="detail">
                        <!-- dynamically added by using jquery below -->
                    </div>

                    <div class="tips">
                       (可複選)<br>
                        想做什麼？<br>
                        ↓
                    </div> 
                </div>
                
                
                <!-- Radio Button -->
                <div class="done">
                   <label class="contain">分完組
                       <input type="radio" name="done" value="分完組">
                       <span class="chkmark"></span>
                   </label>
                   <label class="contain">有組但缺人
                       <input type="radio" name="done" value="分組中">
                       <span class="chkmark"></span>
                   </label>
                   <label class="contain">未分組
                       <input type="radio" name="done" value="未分組">
                       <span class="chkmark"></span>
                   </label>
                </div>
                
                <div class="stu-input">
                    <span>專長</span>
                    <input class="limit-text" size="21" type="text" name="talent" placeholder="最多18個字" id="talent-text">
                </div>
                
                <div class="stu-input-4">
                    <span>其他補充</span>
                    <input class="limit-text2" type="text" name="more_to_say" placeholder="沒有也沒關係(35↓)">
                </div>
                
                <div class="stu-input-4">
                    <span>作品連結</span>
                    <input type="text" name="production_link" placeholder="沒有也沒關係">
                </div>
                

                <span class="submit-btn">
                    <input type="submit" value="提交">
                </span>
                
            </form>
        </div>
    </div> 
    
    <div class="bottom">

    </div>


    <script>
        
        
        
        $(document).ready(function(){
            
            /* 字數限制 */
            $(".limit-text").keyup(function() {
                var maxChars = 18;
                if ($(this).val().length > maxChars) {
                    $(this).val($(this).val().substr(0, maxChars));

                    //Take action, alert or whatever suits
                    alert("為了後面顯示的美觀！最多只能輸入18個字！拜託了各位哥哥姊姊");
                }
            });
            $(".limit-text2").keyup(function() {
                var maxChars = 35;
                if ($(this).val().length > maxChars) {
                    $(this).val($(this).val().substr(0, maxChars));

                    //Take action, alert or whatever suits
                    alert("為了後面顯示的美觀！最多只能輸入35個字！拜託了各位哥哥姊姊");
                }
            });
            
            //submit送出
            $("form").submit(function(){
                var empty_radio = true;
                var empty_text = true;
                var empty_select = true;
                var empty_checkbox = true;

                if($("#num-text").val()!="" && $("#name-text").val()!="" && $("#talent-text").val()!=""){
                    empty_text = false;
                }else{
                    empty_text = true;
                }
                if($('#myGroup').val()!= null && $('#todo').val()!= null){
                      empty_select = false;
                }else{
                      empty_select = true;
                }
                if($(".detail input:checked").length > 0){
                    empty_checkbox = false;
                }else{
                    empty_checkbox = true;
                }
                if($(".done input:checked").length > 0){
                    empty_radio = false;
                }else{
                    empty_radio = true;
                }
                
                if(empty_text==true || empty_select==true || empty_checkbox==true || empty_radio==true){
                    alert("除了作品連結＆其他補充以外都要填完");
                    return false;
                }else{
                    return true;
                }
                
            });
            

            /* CheckBox Select */
            var Movie = [
                        {display: "導演",value: "導演"},
                        {display: "美術",value: "美術"},
                        {display: "編劇",value: "編劇"},
                        {display: "音效",value: "音效"},
                        {display: "後製",value: "後製"},
                        {display: "攝影",value: "攝影"},
                        {display: "製片",value: "製片"},];
            var Animation = [
                        {display: "美術",value: "美術"},
                        {display: "編劇",value: "編劇"},
                        {display: "音效",value: "音效"},
                        {display: "後製",value: "後製"}];
            var Game = [
                        {display: "美術",value: "美術"},
                        {display: "建模",value: "建模"},
                        {display: "程式",value: "程式"},
                        {display: "企劃",value: "企劃"},
                        {display: "音效",value: "音效"}];
            var Interactive = [
                        {display: "美術",value: "美術"},
                        {display: "程式",value: "程式"},
                        {display: "企劃",value: "企劃"}];
            var Sale = [
                        {display: "美術",value: "美術"},
                        {display: "企劃",value: "企劃"}
            ]

            $("#todo").change(function(){
                var select_todo = $("#todo option:selected").val();
                switch(select_todo){
                    case "影視":
                        moreDetail(Movie);
                        break;
                    case "動畫":
                        moreDetail(Animation);
                        break;
                    case "遊戲":
                        moreDetail(Game);
                        break;
                    case "互動":
                        moreDetail(Interactive);
                        break;
                    case "行銷":
                        moreDetail(Sale);
                        break;
                    default:
                        $(".detail").empty();
                        $(".detail").append("<p>請先選擇你想做啥</p>");
                        break;
                }
            });

            function moreDetail(arr){
                $(".detail").empty();
                $(arr).each(function(i){
                    $(".detail").append("<label class='container'>" + arr[i].display + "<input type='checkbox' name='detail[]' value='" + arr[i].value + "'><span class='checkmark'></span></label>");
                });
            }
            
        });
    </script>


</body>
</html>