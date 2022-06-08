<?php

	include "00_conn.php";

	$no = $_GET['no'];
	$pass = $_POST['pass'];
	# echo "넘어온 정보 : ".$pass."<br/>";

	$sql = "SELECT * FROM freeboard WHERE no='$no'";
	$result = mysqli_query($conn,$sql);

	$row = mysqli_fetch_array($result);

	if($row['pass']==$pass){

		$sql = "DELETE FROM freeboard WHERE no='$no'";
		mysqli_query($conn,$sql);
		echo "<p>성공적으로 삭제되었습니다.</p>";
		echo "<meta http-equiv='Refresh' content='2; url=05_list_basic.php'/>";
	}
	else{
		echo "<script>alert('비밀번호가 일치하지 않습니다. 확인해주세요.');history.go(-1);</script>";
	}
?>