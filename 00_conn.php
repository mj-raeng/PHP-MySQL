<?php
	
	/////////////////////////////// [초기화] /////////////////////////////
	header("content-type:text/html; charset=utf-8");
	/*
		파일질라에 업로드 하기 전에 셋팅하기
		id명:		root를 본인아이디 변경하기
		pw:		""를 본인 비번으로 바꾸기
		db명 :	본인 아이디로 변경하기

		+ 바꾸고 00_conn.php 파일만 , 파일질라에 업로드 하기
	
	*/
	$conn = mysqli_connect("localhost","rlaghwns","rlaalswns!2","inboard");
	

	if($conn->connect_error){
		echo $conn-> connect_errorno;
		exit;
	}

	$conn -> set_charset("utf8");
	
	/////////////////////////////////////////////////////////////////////////////////

?>