<?php

	# 1) 초기화 셋팅하기
	include "00_conn.php";


	/*
		2) 연동되는 페이지 확인하기

			(매우중요)
				: 해당하는 페이지들로 DB에 있는 중복되지 않는 번호가 넘어오는지 확인하기

			05_list_basic.php -> 09_read.php (삭제 버튼 클릭) -> 13_delete.php -> 14_delete_control.php
	*/

	$no = $_GET['no'];
	$pass = $_POST['pass'];

	# echo "넘어오는 번호 확인하기: ".$no." <br/>";
	
		
	/*
		3) DB에 저장되어 있는 "암호" 와 같은 정보를 출력받기 위하여 no와 같은 필드 조회하기! 

		: SELECT pass FROM freeboard WHERE no='$no';
			: 위에 방식은 다른 필드는 조회할 수 없고, 반드시 필요한 pass 필드만 조회하는 방식


		: SELECT * FROM freeboard WHERE no='$no';
			: 위에 방식은 모든 필드를 조회했기 때문에 사용자가 해당하는 값을 얼마든지 출력받을 수 있음!
			: 날짜, 이름, 타이틀 등등 조회가능!
	*/

	$sql = "SELECT * FROM freeboard WHERE no='$no'";
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result);

	/*
		4) 위에 구문을 보면..
			: 모든 필드를 호출했기 때문에 pass뿐 아니라 다른 필드들도 호출가능!


		5) $pass와 조회된 no와 같은 pass가 있다면 해당하는 글 삭제하기!


		[중요]
			: 조회를 할때는 모든 필드를 조회하거나 해당하는 필드만 조회하기 때문에
			*이나 pass, name 같은 필드명을 앞에 붙이지만..

			: 지울때는 해당하는 필드 자체를 지우기 때문에 모든 필드를 조회하거나 하는 작업이 필요없음!
	*/

	if($row['pass'] == $pass){
		$delSql = "DELETE FROM freeboard WHERE no='$no'";
		mysqli_query($conn,$delSql);
		
		echo "<p style='text-align:center;color:blue;'>성공적으로 삭제되었습니다.</p>";
		echo "<meta http-equiv='Refresh' content='2;05_list_basic.php'/>";
	}
	else{
		echo "<script>alert('비밀번호가 일치하지 않습니다. 확인해 주세요.');history.go(-1);</script>";
	}
	
	/*
		[매우중요]

			1) phpMyAdmin 페이지에서 확인해 보면 해당하는 번호가 지워진 것을 알 수 있음!
			2) 다시 글쓰기를 할 경우, 지워진 번호를 채우는 것이 아니라 그 다음 번호 부터 증가되는 것을 알 수 있음!
			3) no 필드는 "중복되지 않고 자동증가" 되기 때문에 비워져 있어도 문제가 되지는 않음!
			(해당하는 번호를 채우지 못해도 상관없음!)
	
	*/


?>