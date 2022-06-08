<?php
	
	#01) 초기화 셋팅하기
	include "00_conn.php";

	#02) 제목, 이름, 이메일, 암호, 내용
	#모두 변수로 만들고, 넘어오는지 확인하기
	
	$title		= $_POST['title'];
	$name	= $_POST['name'];
	$email	= $_POST['email'];
	$pass	= $_POST['pass'];
	$content	= $_POST['content'];

	#03) 넘어오는 정보 확인하기
	#echo "넘어오는 값 확인하기: ".$title."/ ".$name." / ".$email." / ".$pass." / ".$content."<br/>";


	#04) 매우중요
	# inboard에 저장되어 있는 테이블 확인하기 (freeboard, members)
	# members 테이블의 경우, 회원가입 용
	# freeboard 테이블의 경우, 게시글 작성

	# freeboard의 필드순서 매우중요!
	# 앞에 form에서 만든 input과 순서가 다르기 때문에 반드시 확인하기
	# name, email, pass, title, content, wdate, (view는 제외, 다른 페이지에서 작업)


	#05) 넘어오는 input의 정보들이 비어 있지 않다면 입력받은 값들 freeboard , 테이블에 넘겨주기!
	#아니라면 필수 입력입니다. 기입해주세요, 문구띄우고 이전 페이지로 돌아가도록 만들기
	#새로 기입하는 부분이기 때문에 INSERT INTO , sql문 작성하기


	/*
		[매우중요]
			1) 순서바뀌어도 상관은 없으나 주로 테이블에 나열된 필드 순서대로 작업함!
			2) input 공간의 순서대로 작업해도 상관없으나..
				db에 저장되는 table 필드는 마음대로 바꾸기 어렵기 때문에 맞춰주는 것이 안전하다.
	*/

	if(!empty($name) && !empty($email) && !empty($pass) && !empty($title) && !empty($content)){
		$sql = "INSERT INTO freeboard (name, email, pass, title, content, wdate)
		VALUES
		('$name', '$email', '$pass', '$title', '$content',now())";

		mysqli_query($conn, $sql);
	}
	else{
		echo "<script>alert('필수 입력 정보입니다. 기입해주세요.'); history.go(-1);</script>";
	}

	#06) 로그인 끊어주기
	mysqli_close($conn);

	#07) 05_list_basic.php 페이지로 넘어가도록 설정하기
	echo "<meta http-equiv='Refresh' content='1; url=05_list_basic.php'/>";
?>