<?php 
include 'haha.php';
if (isset($_GET['deleteid'])) {
	$id=$_GET['deleteid'];

	$sql="delete from `tb_user` where id=$id";
	
	$result=mysqli_query($conn,$sql);
	if ($result) {
		//echo "deleted successfull";
		header('location:display.php');
	}else{
		die(mysqli_error($conn));
	}
}
 ?>