<!DOCTYPE html>
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
    
    #sub_nav { width:100%; height:6.5%; background-image:url("img/join/bg.jpg"); 
        background-size:100%; position:relative; }
    
    #sub_nav p { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); 
        color:#666; font-weight:bold; }
    
    span { line-height:3; font-size:0.5rem; }
    span:nth-of-type(1) { margin-left:8px; }
    span:nth-of-type(2) { color:#F69147; }            
    
	#form_wrap { width:100%; background:#202042; padding-bottom:22%;}
	#form_wrap label { display:block; width:25%; float:left; line-height:2.8; font-size:0.8rem; 
        margin-top:8%; color:#eee; font-weight:600; text-align:center; }
	#fuserid, #fname, #fpasswd, #fpasswd_re { display:block; width:68%; float:left;
        line-height:2.8; margin-top:8%; }    
    #fuserid { width:45%; }
    .n { clear:both; }
	#form_wrap #pw_label { line-height:1.6; }    
	#ck_btn1 { display:block; width:20%; float:left; margin:8% 4% 0; line-height:1.5; 
        text-align:center; padding:3% 0; background:#F69147; font-size:0.8rem; border:0; 
        border-radius:20px; color:#eee; font-weight:600; }
	#btn_frame { width:80%; clear:both; padding-top:3%; margin:0 auto; }
	#btn_frame input { display:block; width:46%; line-height:3; border:0; background:#F8D375; 
        text-align:center; color:#666; float:left; border-radius:20px; 
        font-weight:600; } 
    #btn_frame .last { margin-left:8%; }
    
	.radio_frame { width:100%; clear:both; padding-top:3%; }
    #form_wrap .radio_frame label { display:block; width:25%; margin-top:0; line-height:2.8;
        float:left; }
	.radio_frame input[type=radio] { display:block; width:10%; float:left; margin-top:3%; }
    
	#form_wrap #email_box label { display:block; width:25%; float:left; margin-top:0; 
        line-height:3.5; color:#eee; font-weight:600; }
	#form_wrap #email_box input { display:block; width:68%; float:left; line-height:2.8;
        margin-top:0; }    
    
</style>
<link rel="stylesheet" href="ft.css">
<script>
function chk_input() {
	if(user_form.fuserid.value=="") {
		alert("Input your ID");
		user_form.fuserid.focus();
		return false;
	} else if(user_form.fname.value=="") {
		alert("Input your Name");
		user_form.fname.focus();
		return false;
	} else if(user_form.fpasswd.value=="") {
		alert("Input Password");
		user_form.fpasswd.focus();
		return false;
	} else if(user_form.fpasswd_re.value=="") {
		alert("Input Password one more");
		user_form.fpasswd_re.focus();
		return false;
	} else if(user_form.fpasswd.value != user_form.fpasswd_re.value) {
		alert("[Password] not match, please rewrite your PW");
		user_form.fpasswd.value="";
		user_form.fpasswd_re.value="";
		user_form.fpasswd.focus();
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
        <p>JOIN US</p>
    </nav>
    
    <span>홈  >  </span>
    <span>회원가입</span>     
    
	<div id="form_wrap">
	<form name="user_form" action="add_db.php" method="post" onsubmit="return chk_input()">
		<label for="fuserid">ID</label>
		<input type="text" name="fuserid" id="fuserid" size="12" maxlength="12" onblur="if(fuserid.value!='') chk_id();">
		<input type="button" name="button" value="ID check" id="ck_btn1" onclick="chk_id();">
		<script>
		function chk_id() {
			if(user_form.fuserid.value=='') {
				alert('Input ID');
				user_form.fuserid.focus();
			} else {
				window.open('id_chk.php?fuserid='+user_form.fuserid.value,'IDwin','width=400,height=200');
			}
		}
		</script>
		<br /><br />
		<label for="fname" class="n">Name</label>
		<input type="text" name="fname" id="fname" size="12" maxlength="10"> <br /><br />
		<label for="fpasswd">Password</label>
		<input type="password" name="fpasswd" id="fpasswd" size="12" maxlength="10"> <br /><br />
		<label for="fpassword_re" id="pw_label">Confirming Password</label>
		<input type="password" name="fpasswd_re" id="fpasswd_re" size="12" maxlength="10" onblur="chk_passwd()"> <br />
		<br /><br /><br />
		<div class="radio_frame">
			<label for="">Sex</label>
			<input type="radio" name="fsex" value="m" id="man" checked> <label for="man">Man</label> 
			<input type="radio" name="fsex" value="w" id="woman"> <label for="woman">Woman</label> 
		</div>
		<div class="radio_frame" id="email_box">
			<label for="femail">E-mail</label>
			<input type="text" name="femail" size="30" maxlength="30"> <br /><br /><br />
		</div>
		<div id="btn_frame">
			<input type="submit" name="smt" value="가입하기"> 
			<input type="reset" name="rst" value="다시작성" class="last">
		</div>
	</form>
	</div>
        
	    <footer id="ft">
            <p class="copyright">Copyrightⓒ2018 Ji_Hye</p>
        </footer>
    </div>
</body>
</html>