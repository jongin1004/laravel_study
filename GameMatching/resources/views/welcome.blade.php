<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- jquery -->
        <script src="http://code.jquery.com/jquery-3.1.0.min.js"></script>
        {{-- <script src="/js/motion.js"></script>     --}}
                
        <!-- Styles -->
        {{-- <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style> --}}

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            #test{
                margin:50px;
                border:2px solid black;
                height:200px;
                width:200px;
                cursor:pointer;
            }

            #modal {
            display: none;
            position:relative;
            width:100%;
            height:100%;
            z-index:1;
            }

            #modal h2 {
            margin:0;   
            }

            #modal button {
            display:inline-block;
            width:100px;
            margin-left:calc(100% - 100px - 10px);
            }

            #modal .modal_content {
            width:300px;
            margin:100px auto;
            padding:20px 10px;
            background:#fff;
            border:2px solid #666;
            }

            #modal .modal_layer {
            position:fixed;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:rgba(0, 0, 0, 0.5);
            z-index:-1;
            }
        </style>

    </head>
    <body class="antialiased" onload="doPopupopen();">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <section class="example1">
                <h2>아코디언 패널 예시</h2>
                <p>해당 구역을 클릭 시 아래로 펼쳐지는 제이쿼리 동작입니다</p>
                <dl>
                    <dt>프로젝트이름</dt>
                    <dd style="display:none;">겜칭<br>아아앙</dd>
                    <dt>지금은 뭐하는거임?</dt>
                    <dd style="display:none;">Jquery 아코디언패널</dd>
                    <dt>왜 할려고??</dt>
                    <dd style="display:none;">유저 프로필 눌렀을 때 메뉴목록 보여주게</dd>
                </dl>
            </section>

            <div id="test">
                안녕하세요
            </div>

            <div>
                <a href="/chating">
                    <button>채팅하기</button>
                </a>
                
            </div>

            <div>
                <a href="/letter" onclick="window.open(this.href, '_blank', 'width=600px,height=480px,toolbars=no,scrollbars=no'); return false;">완전 간단하게 팝업 띄우기!!</a>
            </div>

            <div id="root">
   
                <button type="button" id="modal_opne_btn">모달 창 열기</button>
            
            </div>

            <div id="modal">
            
                <div class="modal_content">
                    <h2>모달 창</h2>
                
                    <p>모달 창 입니다.</p>
                
                    <button type="button" id="modal_close_btn">모달 창 닫기</button>
                
                </div>
            
                <div class="modal_layer"></div>
            </div>
            
        </div>

        <?php  
        $timeData = '2021-04-11T21:40:15.000000Z';
        // $timeZone = new DateTime($timeData, new DateTimeZone('KST'));
        // // $dt = $timeZone->format('Y-m-d H:i:s');

        // echo "$timeData<br>";
        echo "$timeData<br>"; 

        // $timeData = $dt;
        $addTime = strtotime("+9 hours", strtotime($timeData));
        $dt = date('Y-m-d H:i:s', $addTime);

        echo $dt;
        ?>
    </body>

    <script type="text/javascript">
    $(function(){ 

        // $("dd").hide();
        
        $(".example1 dt").click(function(){
            
            if($(this).next().css("display") == "none"){
                $(this).next().slideDown(200);
                // $(this).css({background:"url(images/close_img.png) no-repeat 750px center"})
            }else{
                $(this).next().slideUp(200);
                // $(this).css({background:"url(images/open_img.png) no-repeat 750px center"})
            }
            
        });
    });

    $(document).ready(function() {

        var test = $('#test');
        var moveTimer;

        test.on("mouseout",function(){
            $(this).css({
            'background-color' : 'white',
            }).text("");
            clearTimeout(moveTimer);
        });

        test.on("mousemove",function(){        
            clearTimeout(moveTimer);
            moveTimer = setTimeout(function(){
            test.css({
                'background-color' : 'red',
            }).text("The mouse is not moving.");
            },700)

            $(this).css({
            'background-color' : 'blue',
            }).text("Mdfdf...");
        });
    });

    /* 단축키 추가하기 */
    var shortcut = new Array();
    shortcut['w'] = "/forum/"; /* 새 글 쓰기 */
    shortcut['h'] = "/"; /* 새 글 쓰기 */

    $(document).keypress(function(e){
        var key = e.key;
        var tagName = e.target.tagName;

        if(tagName!='INPUT' && tagName!='TEXTAREA'){
            key = key.toLowerCase();

            for (var i in shortcut){
                if (key == i){
                    window.location = shortcut[i];
                }
            }
        }
    });

    //모달창 관련 script
    $("#modal_opne_btn").click(function(){
        $("#modal").attr("style", "display:block");
    });
   
     $("#modal_close_btn").click(function(){
        $("#modal").attr("style", "display:none");
    });

    </script>
</html>
