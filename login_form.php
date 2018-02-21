<?
	include "session.php";

	if($ses_userid != "") {
		echo "<script>
		location.replace(login.php);
		</script>";
		die;
	}
?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, uesr-scalable=no">
<!-- 기계 크기에 맞게 렌더링 해줌 -->
<title>애슐리에 오신 것을 환영합니다.</title>
<meta name="subject" content="애슐리 소개 사이트">
<meta name="title" content="애슐리">
<meta name="keyword" content="애슐리, ashley, 스테이크, 샐러드바, 레스토랑">
<meta http-equiv="author" content="Ji_Hye">
<script type="text/javascript">
// 주소창 자동 닫힘
window.addeventlistener("load", function(){
    settimeout(loaded, 100);
}, false);
    
function loaded() {
    window.scrollto(0, 1);
}
</script>
<link rel="stylesheet" href="common.css">
<link rel="stylesheet" href="hd.css">
<style>
    .wrap{ width:100%; height:100%; background:#f3eee3; }
    
    #top_nav { width:100%; }
    #top_nav ul { width:100%; }
    #top_nav li { width:25%; float:left; }
    #top_nav img { width:100%; display:block; }
    
    #sub_nav { width:100%; height:6.5%; clear:both; }
    #sub_nav ul { height:100%; width:100%; }
    #sub_nav li { width:50%; float:left; height:100%; background:#F9DB8F; 
        position:relative; }
    #sub_nav a { position:absolute; display:block; color:#666; font-size:0.7rem; 
        top:50%; left:50%; transform:translate(-50%,-50%); }
    #sub_nav .sel { background:#F8D375; }
    #sub_nav .sel a { font-weight:bold; }
    
    span { line-height:3; font-size:0.5rem; }
    span:nth-of-type(1) { margin-left:8px; }
    span:nth-of-type(2) { color:#F69147; }    
    
    #form_wrap { width:100%; background:#202042; color:#eee; }
    #form_wrap label { display:block; color:#eee; text-align:center; float:left; width:28%;
        margin-top:8%; line-height:2.3; font-weight:600; }
    
    #form_wrap .text_box { padding:7% 0 6% 0; width:80%; margin:0 auto; box-sizing:border-box; 
        font-size:0.8rem; text-align:center; line-height:10; border-bottom:1px solid #F8D375; }
    #form_wrap .text_box h2 { color:#F8D375; }
    
    #fuserid, #fpasswd { display:block; width:60%; float:left; height:6%; margin-top:8%; }
    
    #btn_frame { width:60%; clear:both; padding-top:5%; margin:0 auto; }
	#btn_frame input { display:block; width:45%; line-height:3; border:0; 
        background:#F8D375; text-align:center; color:#666; float:left; margin-top:3%; 
        border-radius:20px; }
    #btn_frame .last { margin-left:10%; }
    
    #join_box { padding-top:6%; width:65%; margin:0 auto; padding-bottom:4%; }
    #join_box p { line-height:2.7; float:left; font-size:0.9rem; }
    #join_box a { display:block; width:30%; line-height:2.5; background:#F69147;; color:#eee;
        float:left; margin-left:10%; font-size:0.9rem; border-radius:20px; text-align:center;}
    
</style>
<link rel="stylesheet" href="ft.css">
<script>
function chk_logform(){
	if(login_form.fuserid.value=="") {
		alert('Input ID');
		login_form.fuserid.focus();
		return false;
	} else if(login_form.fpasswd.value=="") {
		alert('Input Password');
		login_form.fpasswd.focus();
		return false;
	} else {
		return true;
	}
}

</script>
</head>

<body>
    <input type="checkbox" id="m_ck">
    <div class="wrap">
        <header id="hd">            
            <div class="menu_box">
                <label for="m_ck" class="menu">
                    <img src="img/sub1/menu_1.png" alt="menu">
                </label>
            </div>
            
            <a href="index.html" class="logo">
                <img src="img/main/logo2.png" alt="logo">
            </a>
            
            <input type="radio" id="m_ra1" name="m_ra">
            <input type="radio" id="m_ra2" name="m_ra">
            <input type="radio" id="m_ra3" name="m_ra">
            <ul>
                <li>
                    <label for="m_ra1" class="la1">매장안내
                        <div class="sub_box"><img src="img/sub1/menu_11.png" alt="menu"></div>
                    </label>
                    <ul>
                        <li>
                            <a href="sub1.html">CLASSIC</a>
                        </li>
                        <li>
                            <a href="sub2.html">W</a>
                        </li>
                        <li>
                            <a href="sub3.html">A Lab</a>
                        </li>                       
                        <li class="last">
                            <a href="sub4.html">QUEENS</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="store.html">매장찾기</a>
                </li>
                <li>
                    <a href="board/list.php">공지사항</a>
                </li>
                <li>
                    <label for="m_ra2" class="la2">멤버십
                        <div class="sub_box"><img src="img/sub1/menu_11.png" alt="menu"></div>
                    </label>
                    <ul>
                        <li>
                            <a href="member.html">멤버십 안내</a>
                        </li>
                        <li class="last">
                            <a href="login_form.php">나의 멤버십</a>
                        </li>
                    </ul>
                </li>
                <li class="last">
                    <label for="m_ra3" class="la3">상담신청
                        <div class="sub_box"><img src="img/sub1/menu_11.png" alt="menu"></div>
                    </label>
                    <ul>                    
                        <li>
                            <a href="sms:010-6423-4234">sms</a>
                        </li>
                        <li>
                            <a href="tel:010-6423-4234">tell</a>
                        </li>
                        <li class="last">
                            <a href="mailto:biso15@naver.com">mail</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="close_bg">
                <label for="m_ck" class="close">
                    <img src="img/sub1/menu_1.png" alt="close">
                </label>
            </div>
        </header>
           
        <nav id="top_nav">
            <img src="img/member/mem2.jpg" alt="title">
        </nav>

        <nav id="sub_nav">
            <ul>
            <li><a href="member.html">멤버십 안내</a></li>
            <li class="sel"><a href="login_form.php">나의 멤버십</a></li>
            </ul>
        </nav>

        <span>홈  >  멤버십  ></span>
        <span>나의 멤버십</span> 

        <div id="form_wrap">
            <div class="text_box">
                <h2>반갑습니다. 애슐리 회원님!</h2>
                <p>E:LAND E:AT의 다양한 서비스를 이용하시려면</p>
                <p> 로그인을 해주세요.</p>
            </div>
            <form name="login_form" action="login.php" method="post" onsubmit="return chk_logform();">
                <label for="fuserid">ID</label>
                <input type="text" name="fuserid" id="fuserid" size="19" title="아이디 입력"><br/><br/>
                <label for="fpasswd">PW</label>
                <input type="password" name="fpasswd" id="fpasswd" size="20" title="패스워드 입력"><br/><br/>
                <div id="btn_frame">
                    <input type="submit" name="submit" value="login">
                    <input type="reset" name="reset" value="Reset" class="last"><br /><br />
                </div>
                <div id="join_box">
                    <p>아직 회원이 아니라면 ?</p><a href="add_form.php">join</a><br /><br />
                </div>
            </form>
        </div>

        <footer id="ft">
            <p class="copyright">Copyrightⓒ2018 Ji_Hye</p>
        </footer>
    </div>
</body>
</html>