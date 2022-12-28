<?php
include('conect.php');
$query="DELETE from alternatif where nik='".$_GET['id']."'";
mysqli_query($konek_db, $query);
header("location:index.php");
?>