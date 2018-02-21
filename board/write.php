<?php
	require_once("../dbconfig.php");

	//$_GET['bno']이 있을 때만 $bno 선언
	if(isset($_GET['bno'])) {
		$bNo = $_GET['bno'];
	}
		 
	if(isset($bNo)) {
		$sql = 'select b_title, b_content, b_id from board_free where b_no = ' . $bNo;
		$result = $db->query($sql);
		$row = $result->fetch_assoc();
	}
?>
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
	<link rel="stylesheet" href="./css/normalize.css" />
	<link rel="stylesheet" href="./css/board.css" />
	<link rel="stylesheet" href="../common.css">
    <link rel="stylesheet" href="../hd.css">
	<style>
    .wrap{ width:100%; height:100%; background:#f3eee3; overflow-y:hidden; }
    
    #top_nav { width:100%; height:6.5%; background-image:url("../img/store/bg.jpg"); 
        background-size:100%; position:relative; }
    #top_nav p { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); 
        color:#eee; font-weight:bold; }
        
    span { line-height:3; font-size:0.5rem; }
    span:nth-of-type(1) { margin-left:8px; }
    span:nth-of-type(2) { color:#F69147; } 
    
    .boardArticle { width:95%; margin:0 auto; color:#666; margin-bottom:38.5%; } 
    .boardArticle h3 { line-height:2.6; }
    #boardWrite th { border:none; border-bottom:1px solid #666; width:23%; }
    #boardWrite .first { border-top:2px solid #666; }
    #boardWrite input { display:block; width:93%; }
    #boardWrite textarea { width:93%; }
        
    .btnSet .btn { background:#666; padding:1% 3%; border-radius:20px; margin:4% 2%; ; display:block; }
    .btnSet .btnSubmit { width:15%; float:left; color:#eee; border:none; font-size:0.8rem; }
    .btnSet .btnList { width:9%; float:right; color:#eee; line-height:1.5; font-size:0.8rem; text-align:center; }
    #bContent { height:100px; }
    
    </style>
    <link rel="stylesheet" href="../ft.css">
</head>
<body>
    <input type="checkbox" id="m_ck">
    <div class="wrap">
        <header id="hd">            
            <div class="menu_box">
                <label for="m_ck" class="menu">
                    <img src="../img/sub1/menu_1.png" alt="menu">
                </label>
            </div>
            
            <a href="../index.html" class="logo">
                <img src="../img/main/logo2.png" alt="logo">
            </a>
            
            <input type="radio" id="m_ra1" name="m_ra">
            <input type="radio" id="m_ra2" name="m_ra">
            <input type="radio" id="m_ra3" name="m_ra">
            <ul>
                <li>
                    <label for="m_ra1" class="la1">매장안내
                        <div class="sub_box"><img src="../img/sub1/menu_11.png" alt="menu"></div>
                    </label>
                    <ul>
                        <li>
                            <a href="../sub1.html">CLASSIC</a>
                        </li>
                        <li>
                            <a href="../sub2.html">W</a>
                        </li>
                        <li>
                            <a href="../sub3.html">A Lab</a>
                        </li>                       
                        <li class="last">
                            <a href="../sub4.html">QUEENS</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="../store.html">매장찾기</a>
                </li>
                <li>
                    <a href="list.php">공지사항</a>
                </li>
                <li>
                    <label for="m_ra2" class="la2">멤버십
                        <div class="sub_box"><img src="../img/sub1/menu_11.png" alt="menu"></div>
                    </label>
                    <ul>
                        <li>
                            <a href="../member.html">멤버십 안내</a>
                        </li>
                        <li class="last">
                            <a href="../login_form.php">나의 멤버십</a>
                        </li>
                    </ul>
                </li>
                <li class="last">
                    <label for="m_ra3" class="la3">상담신청
                        <div class="sub_box"><img src="../img/sub1/menu_11.png" alt="menu"></div>
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
                    <img src="../img/sub1/menu_1.png" alt="close">
                </label>
            </div>
        </header>

        <nav id="top_nav">
            <p>글쓰기</p>
        </nav>

        <span>홈  >  NOTICE  ></span>
        <span>글쓰기</span> 



        <article class="boardArticle">
            <h3>글쓰기</h3>
            <div id="boardWrite">
                <form action="./write_update.php" method="post">
                    <?php
                    if(isset($bNo)) {
                        echo '<input type="hidden" name="bno" value="' . $bNo . '">';
                    }
                    ?>
                    <table id="boardWrite">
                        <caption class="readHide"></caption>
                        <tbody>
                            <tr class="first">
                                <th scope="row"><label for="bID">아이디</label></th>
                                <td class="id">
                                    <?php
                                    if(isset($bNo)) {
                                        echo $row['b_id'];
                                    } else { ?>
                                        <input type="text" name="bID" id="bID">
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="bPassword">비밀번호</label></th>
                                <td class="password"><input type="password" name="bPassword" id="bPassword"></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="bTitle">제목</label></th>
                                <td class="title"><input type="text" name="bTitle" id="bTitle" value="<?php echo isset($row['b_title'])?$row['b_title']:null?>"></td>
                            </tr>
                            <tr>
                                <th scope="row"><label for="bContent">내용</label></th>
                                <td class="content"><textarea name="bContent" id="bContent"><?php echo isset($row['b_content'])?$row['b_content']:null?></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="btnSet" style="">
                        <button type="submit" class="btnSubmit btn" style="">
                            <?php echo isset($bNo)?'수정':'작성'?>
                        </button>
                        <a href="./list.php" class="btnList btn" style="">목록</a>
                    </div>
                </form>
            </div>
        </article>
	
	        <footer id="ft">
            <p class="copyright">Copyrightⓒ2018 Ji_Hye</p>
        </footer>
    </div>
</body>
</html>