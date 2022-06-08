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
		<h2>FREE BOARD <span style="color:red;">WRITE</span></h2>
		<form action="08_write_control.php" method="post">
			<p>
				<label for="title">제목</label>
				<input id="title" type="text" name="title" required/>
			</p>
			<p>
				<label for="name">이름</label>
				<input id="name" type="text" name="name" required/>
			</p>
			<p>
				<label for="email">이메일</label>
				<input id="email" type="email" name="email" required/>
			</p>
			<p>
				<label for="pass">비밀번호</label>
				<input id="pass" type="password" name="pass" required placeholder="10자 까지 입력" maxlength="10" autocomplete="off"/>
			</p>
			<p class="content">
				<label for="content">내용</label>
<textarea id="content" name="content">
</textarea>
			</p>
			<p id="btnArea">
				<input class="button" type="submit" value="저장" title="저장"/>
				<input class="button" type="reset" value="다시쓰기" title="다시쓰기"/>
				<a href="05_list_basic.php" title="목록"><input class="button" type="button" value="목록" title="목록"/></a>
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