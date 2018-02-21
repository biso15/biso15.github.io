<?php
	require_once("../dbconfig.php");
	
	/* 페이징 시작 */
	//페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
	if(isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	
	/* 검색 시작 */
	
	if(isset($_GET['searchColumn'])) {
		$searchColumn = $_GET['searchColumn'];
		$subString .= '&amp;searchColumn=' . $searchColumn;
	}
	if(isset($_GET['searchText'])) {
		$searchText = $_GET['searchText'];
		$subString .= '&amp;searchText=' . $searchText;
	}
	
	if(isset($searchColumn) && isset($searchText)) {
		$searchSql = ' where ' . $searchColumn . ' like "%' . $searchText . '%"';
	} else {
		$searchSql = '';
	}
	
	/* 검색 끝 */
	
	$sql = 'select count(*) as cnt from board_free' . $searchSql;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	
	$allPost = $row['cnt']; //전체 게시글의 수
	
	if(empty($allPost)) {
		$emptyData = '<tr><td class="textCenter" colspan="5">글이 존재하지 않습니다.</td></tr>';
	} else {

		$onePage = 15; // 한 페이지에 보여줄 게시글의 수.
		$allPage = ceil($allPost / $onePage); //전체 페이지의 수
		
		if($page < 1 && $page > $allPage) {
?>
			<script>
				alert("존재하지 않는 페이지입니다.");
				history.back();
			</script>
<?php
			exit;
		}
	
		$oneSection = 10; //한번에 보여줄 총 페이지 개수(1 ~ 10, 11 ~ 20 ...)
		$currentSection = ceil($page / $oneSection); //현재 섹션
		$allSection = ceil($allPage / $oneSection); //전체 섹션의 수
		
		$firstPage = ($currentSection * $oneSection) - ($oneSection - 1); //현재 섹션의 처음 페이지
		
		if($currentSection == $allSection) {
			$lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
		} else {
			$lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
		}
		
		$prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
		$nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
		
		$paging = '<ul>'; // 페이징을 저장할 변수
		
		//첫 페이지가 아니라면 처음 버튼을 생성
		if($page != 1) { 
			$paging .= '<li class="page page_start"><a href="./index.php?page=1' . $subString . '">처음</a></li>';
		}
		//첫 섹션이 아니라면 이전 버튼을 생성
		if($currentSection != 1) { 
			$paging .= '<li class="page page_prev"><a href="./index.php?page=' . $prevPage . $subString . '">이전</a></li>';
		}
		
		for($i = $firstPage; $i <= $lastPage; $i++) {
			if($i == $page) {
				$paging .= '<li class="page current">' . $i . '</li>';
			} else {
				$paging .= '<li class="page"><a href="./index.php?page=' . $i . $subString . '">' . $i . '</a></li>';
			}
		}
		
		//마지막 섹션이 아니라면 다음 버튼을 생성
		if($currentSection != $allSection) { 
			$paging .= '<li class="page page_next"><a href="./index.php?page=' . $nextPage . $subString . '">다음</a></li>';
		}
		
		//마지막 페이지가 아니라면 끝 버튼을 생성
		if($page != $allPage) { 
			$paging .= '<li class="page page_end"><a href="./index.php?page=' . $allPage . $subString . '">끝</a></li>';
		}
		$paging .= '</ul>';
		
		/* 페이징 끝 */
		
		
		$currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
		$sqlLimit = ' limit ' . $currentLimit . ', ' . $onePage; //limit sql 구문
		
		$sql = 'select * from board_free' . $searchSql . ' order by b_no desc' . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
		$result = $db->query($sql);
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
    <link rel="stylesheet" href="common.css">
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
        
    .boardArticle { width:95%; margin:0 auto; color:#666; margin-bottom:67%; }
    .boardArticle h3 { float:left; line-height:2.6; }
        
	.paging ul { list-style:none; }
	.paging li { float:left; padding-right:10px; }
    
    #boardList { position:relative; }
    #boardList table { margin-bottom:3%; }
        
    .btnSet { position:absolute; top:0; right:0;  background:#666; padding:1% 3%; border-radius:20px; margin:2%; }
    .btnSet a { display:block; color:#eee; line-height:2; font-size:0.8rem; text-align:center; } 
    
    .searchBox { padding-bottom:17%; padding-left:12%; }
    .searchBox select, .searchBox input, .searchBox button { float:left; margin-right:3%; 
        margin-top:5%; line-height:1; }
    
    .searchBox input { display:block; width:40%; }
    .searchBox button { background:#666; border-radius:20px; color:#eee; border:none; 
        padding:3% 6%; font-size:0.8rem; line-height:1.3; margin-top:3%; }
        
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
            <p>NOTICE</p>
        </nav>

        <span>홈  ></span>
        <span>NOTICE</span> 



        <article class="boardArticle">
            <h3>NOTICE</h3>
            <div id="boardList">
                <table>
                    <caption class="readHide"></caption>
                    <thead>
                        <tr>
                            <th scope="col" class="no">번호</th>
                            <th scope="col" class="title">제목</th>
                            <th scope="col" class="author">작성자</th>
                            <th scope="col" class="date">작성일</th>
                            <th scope="col" class="hit">조회</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            if(isset($emptyData)) {
                                echo $emptyData;
                            } else {
                                while($row = $result->fetch_assoc())
                                {
                                    $datetime = explode(' ', $row['b_date']);
                                    $date = $datetime[0];
                                    $time = $datetime[1];
                                    if($date == Date('Y-m-d'))
                                        $row['b_date'] = $time;
                                    else
                                        $row['b_date'] = $date;
                            ?>
                            <tr>
                                <td class="no"><?php echo $row['b_no']?></td>
                                <td class="title">
                                    <a href="./view.php?bno=<?php echo $row['b_no']?>"><?php echo $row['b_title']?></a>
                                </td>
                                <td class="author"><?php echo $row['b_id']?></td>
                                <td class="date"><?php echo $row['b_date']?></td>
                                <td class="hit"><?php echo $row['b_hit']?></td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                    </tbody>
                </table>
                <div class="btnSet">
                    <a href="./write.php" class="btnWrite btn">글쓰기</a>
                </div>
                <div class="paging">
                    <?php echo $paging ?>
                </div>
                <div class="searchBox">
                    <form action="./list.php" method="get">
                        <select name="searchColumn">
                            <option <?php echo $searchColumn=='b_title'?'selected="selected"':null?> value="b_title">제목</option>
                            <option <?php echo $searchColumn=='b_content'?'selected="selected"':null?> value="b_content">내용</option>
                            <option <?php echo $searchColumn=='b_id'?'selected="selected"':null?> value="b_id">작성자</option>
                        </select>
                        <input type="text" name="searchText" value="<?php echo isset($searchText)?$searchText:null?>">
                        <button type="submit">검색</button>
                    </form>
                </div>
            </div>
        </article>
	
	        <footer id="ft">
            <p class="copyright">Copyrightⓒ2018 Ji_Hye</p>
        </footer>
    </div>
</body>
</html>