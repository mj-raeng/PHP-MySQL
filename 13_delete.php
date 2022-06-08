<?php
	
	# 01) 초기화 링크 걸기
	include "00_conn.php";

	# 02) 넘어오는 번호 확인하기
	# ?는 get방식으로 처리

	$no = $_GET['no'];
	echo "넘어오는 번호 확인: ".$no."<br/>";


	/*
		03) 넘어온 no 와 같은 필드 정보 모두 호출하기

			: 모든 필드의 정보를 호출하는 이유는?
			: ? 타고 넘길때, no나 이름, 글, 날짜 어떤 것도 담을 수 있기 때문에 모든 정보를 호출함!

			: SELECT no FROM freeboard no='$no';
			: 위에 구문은 no 필드만 조회했기 때문에 다른 정보는 타고 넘길 수 없음!

			: SELECT * FROM freeboard no='$no'
			: 넘어온 no와 같은 no 필드를 기준으로 모든 정보 조회가능!

		[현재 페이지에서는 pass 필드만 필요함]

			: 현재 페이지에서는 넘어온 no와 pass만 필요하기 때문에 pass필드와 no만 있어도 문제는 없음!
			: SELECT pass FORM freeboard no='$no';
	
	*/

	$sql = "SELECT * FROM freeboard WHERE no='$no'";
	$result = mysqli_query($conn,$sql);

	# 04) 한줄씩 읽도록 만들기
	$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="ko">
 <head>
	<title>write</title>
	<meta charset="utf-8"/>
	<style>
		*{margin:0; padding:0;}
		body{margin:0; padding:0; background-color:#f9f9f9;}

		#wrap{width:400px; margin:50px auto 0; background-color:#fff;
		box-shadow:3px 3px 3px rgba(0,0,0,0.3); padding:20px 40px;}

		h2{text-align:center; padding-bottom:20px;}
		form{font-size:13px;}
		form p{padding:10px 0; margin-bottom:20px;}

		form label{display:block; float:left; width:80px; text-align:center; line-height:25px;}
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
		<h2>FREE BOARD <span style="color:red;">DELETE</span></h2>
		<form action="14_delete_control.php?no=<?=$row['no']?>" method="post">
			<p>
				<label for="pass">비밀번호</label>
				<input id="pass" type="password" name="pass" value="" required placeholder="10자 까지 입력" maxlength="10" autocomplete="off"/>
			</p>
			<p id="btnArea">
				<input class="button" type="submit" value="삭제" title="삭제"/>
				<input class="button" type="reset" value="다시쓰기" title="다시쓰기"/>
			</p>
		</form>
	</div>
 </body>
</html>
<!--
	[label (라벨, 레이블) ]
	
	: select, textarea, input , 대체텍스트 용도로 label을 사용한다!
	: label을 사용하지 못할 경우, title을 사용하여 대체한다!
	: label이 있을 경우에도 title 사용은 가능하다!

	+++++++++++++++++++++++++++++++++++++++++++++++++++++++

	[form영역안에서 a태그 활용하기]
		
	: form영역 안에서 a태그 사용 금지?
		
		submit에 a태그를 설정하면...
			전송하는 기능과 a태그의 href가 기능을 하면서 form의 action과 충돌이 발생한다!
			: 주소와 주소의 충돌이 발생함! 

		reset에 a태그를 설정하면...
			다시쓰기 기능과 a태그의 href가 기능을 하면서 form의 action과 충돌이 발생한다!
			

		: submit, reset은 모두 기능을 하면서 a태그의 href와 충돌이 발생하는 부분이 발생한다!
		: video태그에 a를 부모로 사용할 경우, href와 source 가 충돌이 발생할 수 있음!
		: video태그에 a태그를 사용하여 링크 영역을 설정할 수 있음!

		

		: checkbox, radio 버튼도 a태그를 묶지 않도록 하는 것이 기본이지만 상황에 따라서는 사용한다!

		: 기능을 가지는 태그들은 a로 묶어줄때 "validator" 로 반드시 확인하기!

	[정리]
		
		* form안에서 a태그를 사용하지 못하는 것이 아니라 기능을 가지는 요소를 담지 않도록 한다!
-->