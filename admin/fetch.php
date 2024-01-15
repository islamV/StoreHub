<?php 
$tabel = $_GET['page'] ;

$sql = "SELECT * FROM `$tabel`";
$stmt = $conn->prepare($sql);
$stmt->execute(); 
