<?php
	session_start();
	require 'config.php';

	$collection_nasabah->deleteOne(['_id' => $_GET['id']]);

	$_SESSION['success'] = "Data Berhasil Dihapus";
	
	header("Location: index.php");
?>