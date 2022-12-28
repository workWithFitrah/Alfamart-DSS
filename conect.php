<?php    
  $host = 'localhost';  
  $user = 'root';        
  $password = '';        
  $database = 'kry_alfa';    
      
  $konek_db = mysqli_connect($host, $user, $password, $database);      

  // Check connection
if (mysqli_connect_errno()){
	echo "Koneksi gagal " . mysqli_connect_error();
}

?>