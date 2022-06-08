<?php

	# 01) 초기화 링크걸기
	include "00_conn.php";

	# 02) ?를 통해서 넘어오는 정보 확인하기
	$no = $_GET['no'];
	
	echo "넘어오는 번호 확인하기: ".$no;


	/*
		03) 넘겨온 no와 같은 no 필드의 모든 정보 조회하기!
			
			어떤 테이블의 정보인지 확인하기 (freeboard)
		
		: 요청할 sql문 작성하기
		: 로그인이 되었다면 요청한 sql문 넘겨주기
	*/

	$sql = "SELECT * FROM freeboard WHERE no='$no' ";
	$result = mysqli_query($conn, $sql);



	# 04) 출력받기에서 매우중요
	# 한줄 씩 읽을 수 있도록 문법 작성하기
	
	$row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="ko">
 <head>
	<title>read</title>
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
		<h2>FREE BOARD <span style="color:red;">READ</span></h2>
		<form action="#none" method="post">
			<p>
				<label for="title">제목</label>
				<input id="title" type="text" value="<?=$row['title']?>" readonly/>
			</p>
			<p>
				<label for="name">이름</label>
				<input id="name" type="text" value="<?=$row['name']?>" readonly/>
			</p>
			<p>
				<label for="email">이메일</label>
				<input id="email" type="email" value="<?=$row['email']?>" readonly/>
			</p>
			<p>
				<label for="view">조회</label>
				<input id="view" type="text" value="<?=$row['view']?>" readonly/>
			</p>
			<p>
				<label for="wdate">날짜</label>
				<input id="wdate" type="text" value="<?=$row['wdate']?>" readonly/>
			</p>
			<p class="content">
				<label for="content">내용</label>
<textarea id="content">
<?=$row['content']?>
</textarea>
			</p>
			<p id="btnArea">
				<a href="05_list_basic.php" title="목록"><input class="button" type="button" value="목록"/></a>
				<a href="10_edit.php?no=<?=$row['no']?>" title="수정"><input class="button" type="button" value="수정"/></a>
				<a href="13_delete.php?no=<?=$row['no']?>" title="삭제"><input class="button" type="button" value="삭제"/></a>
			</p>
		</form>
	</div>
<?php
	
	/*
		문제) 현재 넘겨받은 번호와 같은 번호의 no 필드 조회하고 view필드에 view값이 +1이 되도록 update 하기!


			: 요청할 sql문 작성하기
			: 로그인 되었다면 넘겨주기
			: 로그인 끊기
	*/
	$upSql = "UPDATE freeboard SET view=view+1 WHERE no='$no' ";
	
	mysqli_query($conn, $upSql);
	mysqli_close($conn);

?>
 </body>
</html>
<!--
	[form에서 사용하는 문서 구분하기]
		
		1) 07_write.php
				
				: 전체 내용을 새로 기입하는 페이지로 기존에 만들었었던 milk_insert 페이지와 종류가 같다!
				: 페이지 구분시 , 입력을 만드는 파트인지, 출력을 만드는 파트인지 구분하기
				: 입력을 받는 화면을 구성한다면...
					input태그의 name 속성을 이용하여 다음 control 페이지로 넘겨줄 수 있어야 한다!
					유일하게 action 줄을 탈 수 있는 중요 속성이 name이다!
			
		2) 09_read.php

				: name은 작성된 글을 넘겨주는 속성이기 때문에 출력을 받기에는 어렵다!
				: placeholder, value, title, 보여줄 수 있는 속성이라면 어느 속성이든 출력은 가능하다!

				: placeholder 는 임시적인 값으로 클릭하는 순간 또는 기입되는 순간 내용이 사라짐!
				: value는 화면에 확실하게 인식되는 값으로 계산식 페이지를 만들거나 중요 내용을 표기할
				때 많이 사용된다!

				: title은 "대체 텍스트 용도" 로 사용되기 때문에 화면에 직접적으로 보여주지는 않는다!
					(title은 메인을 대체하는 수단!)
				
				: read.php의 경우엔 milk_result.php 처럼 결과를 보여주는 페이지로 사용된다.

		[매우중요]

			1) 페이지 분석시, 정보를 새로 기입하는 페이지라면 INSERT INTO로 만들어지는 페이지이다!
			(주로 화면단에서 name 속성으로 넘겨받음!)

			2) 기존의 정보를 수정하는 페이지라면 UPDATE로 만들어진 페이지이다!
			(정보를 넘겨받아야 하기 때문에 name 속성으로 넘겨 받아야함!)


			3) 화면에 결과만 보여줄 경우, 조회해서 화면에 분산 해주는 작업! (result)
				(넘겨받은 정보를 화면에 출력받기 때문에 name 속성이 필요없음!)
				(name 속성은 기입되어진 정보를 넘겨줄때만 사용!)


		[DB단에서 input 사용하기]
			
			* id, type, name 필수로 사용된다!

			* id는 꾸며주기 위해서 사용하기 보다 javascript, jQuery 등에서 컨트롤 하기 위해서 
			사용되는 중요 속성이다.
			
				: 컨트롤 할 값이 없다면 id 제외 가능함!

			* type도 text인 경우 제외하고, 특별한 상황이 아니라면 제외시키는 경우가 많음!
				
				: submit, reset, checkbox 처럼 목적을 가질때만 type 사용!

			* name과 value로만 사용되는 경우가 많음!
				
				: name은 넘겨주기 위하여 사용하고, value는 출력받기 위하여 사용되는 경우가 많다!


		+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

		[form 사용하기]
			
			1) form영역안에 form 사용할 수 없음!
			2) form을 사용하면 굉장히 안전하기 때문에 NULL 값이 잘 잡히지 않는다!
			3) ajax 영역은 form 처럼 action, method 같은 개념이 없어서 쓸모없는 항목들이 
			담기는 경우들이 생김!
				
				: 초기화 작업을 하는 경우가 많이 생길 수 있음
				: javascript( isNaN (알 수 없는 문자) )
				: isset	(NULL) 값을 확인하는 값

			4) DB를 다루는 파트에서는 공간을 다루기 때문에 NULL 값이 형성이 되면 더이상의 자료를
			등록받지 못하거나 출력받지 못할 수 있음! 주의하기!

			5) 서버를 타야하는 문서만  문서.php로 만들어서 표현함!
				서버를 타지않는 문서는 문서.html로 만들어도 문제는 없다!

				현재 members, freeboard 테이블과 연결되어 있는 모든 문서는 DB를 타고 넘어와야 하기
				때문에 서버를 탈 수 있는 문서 , 문서.php로 만 저장 받을 수 있다!

			
			6) 현재 read.php의 경우 name 속성으로 넘겨줄 자료가 없고, 더 이상의 control.php 파일이
			존재 하지 않기 때문에 form영역이 필요없음!

				(단! 언제 다시 입력파트로 사용할지 모르기 때문에 form을 작성해둠)
-->