<?php
	
	# 01) 초기화 링크 설정하기 
	include "00_conn.php";


	# 02) 번호가 넘어오는지 확인하기
	# 05_list_basic.php 부터 , 09_read.php 수정 버튼 클릭시 현재 페이지로 번호가 넘어오는지 확인하기
	
	$no = $_GET['no'];
	
	echo "넘어오는 번호 확인: ".$no." <br/>";

	# 03) no필드에서 넘겨받은 no와 같은 정보 모두 조회하기
	# 1) 요청할 sql문 작성하기
	# 2) 로그인이 되었다면 넘겨주기

	$sql = "SELECT * FROM freeboard WHERE no='$no' ";
	$result = mysqli_query($conn, $sql);

	# 04) 한줄씩 읽어주기
	$row = mysqli_fetch_array($result);


	# 해당하는 no 출력받아보기 
	echo "해당하는 번호 출력받기: ".$row['no']."<br/>";
?>
<!DOCTYPE html>
<html lang="ko">
 <head>
	<title>edit</title>
	<meta charset="utf-8"/>
	<style>
		*{margin:0; padding:0;}
		body{margin:0; padding:0; background-color:#f9f9f9;}

		#wrap{width:400px; margin:50px auto 0; background-color:#fff;
		box-shadow:3px 3px 3px rgba(0,0,0,0.3); padding:20px 40px;}

		h2{text-align:center; padding-bottom:20px;}
		form{font-size:13px;}
		form p{padding:10px 0; margin-bottom:20px;}

		form label{display:block; float:left; width:80px; text-align:center;
		line-height:25px;}

		form input:not(.button){width:280px; height:25px; text-indent:10px;}
		form textarea{width:280px; height:200px; text-indent:10px;}
		form label[for="content"]{line-height:200px;}

		#btnArea{background-color:#fff; text-align:center;}
		#btnArea input{padding:5px 20px; background-color:#fff; border:1px solid #aaa;}
		#btnArea input:hover{background-color:#f00; color:#fff; cursor:pointer;}
	</style>
 </head>
 <body>
	<div id="wrap">
		<h2>FREE BOARD <span style="color:red;">EDIT</span></h2>
		<form action="11_edit_control.php?no=<?=$row['no']?>" method="post">
			<p>
				<label for="title">제목</label>
				<input id="title" type="text" value="<?=$row['title']?>" name="title" required/>
			</p>
			<p>
				<label for="name">이름</label>
				<input id="name" type="text" value="<?=$row['name']?>" name="name" required/>
			</p>
			<p>
				<label for="email">이메일</label>
				<input id="email" type="email" value="<?=$row['email']?>" name="email" required/>
			</p>
			<p>
				<label for="pass">비밀번호</label>
				<input id="pass" type="password" value="<?=$row['pass']?>" name="pass" required autocomplete="off" readonly/>
			</p>
			<p class="content">
				<label for="content">내용</label>
<textarea id="content" name="content">
<?=$row['content']?>
</textarea>
			</p>
			<p id="btnArea">
				<input class="button" type="submit" value="저장"/>
				<input class="button" type="reset" value="다시쓰기"/>
				<a href="05_list_basic.php" title="목록"><input class="button" type="button" value="목록"/></a>
			</p>
		</form>
	</div>
 </body>
</html>