<?php
	require_once __DIR__ . "/vendor/autoload.php";

	$collection_nasabah = (new MongoDB\Client)->pegadaian->nasabah;
	$collection_pinjaman = (new MongoDB\Client)->pegadaian->pinjaman;
	$collection_pegawai = (new MongoDB\Client)->pegadaian->pegawai;
?>