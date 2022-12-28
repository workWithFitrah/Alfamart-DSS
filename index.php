<html>
<?php
include('conect.php');
mysqli_query($konek_db,"TRUNCATE TABLE `konversi`");
?>

<head>
	<title>Penilaian karyawan terbaik</title>
</head>

<style>


h1, h2, article {
    margin-left: 40px;
    margin-right: 40px;
}    
h2 {
    font-size: 40px;
    color: #e5474b;
}

hr {
    border: 0;
    border-bottom: solid 1px;
    border-bottom-color: #e5474b;
    margin: 2em 0;
    margin-left: 40px;
    margin-right: 40px;
  }
 
table, td, th {    
    border: 1px solid #e5474b;
    text-align: center;
}


table {
    border-collapse: collapse;
    width: 95%;
    margin: 0 0 2em 0;
    margin-left: 40px;
    margin-right: 40px;
}

th, td {
    padding: 15px;
}

input[type=button] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: center;
  margin: 9px 2px;
}

input[type=button]:hover {
  background-color: #45a049;
}

input[type=button2] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 600px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: center;
  text-align: center;
  margin-left: 40px;
  margin-right: 40px;
}

input[type=button2]:hover {
  background-color: #45a049;
}

footer {
    background-color: #e5474b;
    color: #f2a3a5;
    padding: 10px;
    font-size: 80%;
  }

</style>

<body>

<hr>
<h1>SISTEM PENDUKUNG KEPUTUSAN PEMILIHAN KARYAWAN BERPRESTASI ALFAMART</h1>
<hr>

<h2>Tabel data</h2>
<table border=1>
	<tr>
		<th>No. Induk Karyawan</th>
		<th>Nama Karyawan</th>        
		<th>Target toko</th> 
		<th>Sikap</th>     
		<th>Kecerdasan</th>
		<th>Marketing</th>
		<th>Aksi</th>
	</tr> 
<?php
$queri="Select * From alternatif";
$hasil=mysqli_query ($konek_db,$queri);   
while ($data = mysqli_fetch_array ($hasil)){  
 			
 			echo "      
        			<tr>  
        			
                    <td>".$data[0]."</td>
					<td>".$data[1]."</td>  
        			<td>".$data[2]."</td>
                    <td>".$data[3]."</td>
                    <td>".$data[4]."</td>
                    <td>".$data[5]."</td>
                    <td>
  <a href=editdata.php?id=".$data[0]."><input type=button value=edit class=btn btn-success btn-block></a>
  <a href=hapus.php?id=".$data[0]." onclick='return checkDelete()'><input type=button value=hapus class=btn btn-success btn-block></a></td>
                    </tr>
 
        	";      
			}

            // <input type="submit" name ="submit" value="Simpan" class="btn btn-success"  onclick="return checkInput()">
 ?>
</table>
<!--button untuk data baru-->
    <p><a href="data_baru.php"><input type="button2" value="Masukan Data Baru" class="btn btn-success btn-block"></a></p>


<h2>Konversi</h2>
<table border="1">
    <tr>
        <td>No. Induk Karyawan</td>
        <td>Nama Karyawan</td>   
        <th>target toko</th>
        <th>sikap</th>
        <th>kecerdasan</th>
        <th>marketing</th>
    </tr>
<?php
$queri="SELECT * FROM alternatif";
$hasil=mysqli_query ($konek_db,$queri);   
while ($data = mysqli_fetch_array ($hasil)){
$nik=$data[0];
$nama=$data[1];
//menkonversi nilai yang diambil dari database

        if ($data[2] < 100000000) {
            $targetKonversi = 1;
        } elseif($data[2] >= 100000000 && $data[2] < 200000000){
            $targetKonversi = 2;
        } elseif($data[2] >= 200000000 && $data[2] < 300000000){
            $targetKonversi = 3;
        } elseif($data[2] >= 300000000 && $data[2] < 400000000){
            $targetKonversi = 4;
        } elseif($data[2] >= 400000000){
            $targetKonversi = 5;
        }

        if ($data[3] == "sangat kurang") {
            $sikapKonversi = 1;
        } elseif($data[3] == "kurang"){
            $sikapKonversi = 2;
        } elseif($data[3] == "cukup") {
            $sikapKonversi = 3;
        } elseif($data[3] == "baik"){
            $sikapKonversi = 4;
        } elseif($data[3] == "sangat baik") {
            $sikapKonversi = 5;
        }

        if ($data[4] == "sangat kurang") {
            $kecerdasanKonversi = 1;
        } elseif($data[4] == "kurang"){
            $kecerdasanKonversi = 2;
        } elseif($data[4] == "cukup"){
            $kecerdasanKonversi = 3;
        } elseif($data[4] == "baik"){
            $kecerdasanKonversi = 4;
        } elseif($data[4] == "sangat baik"){
            $kecerdasanKonversi = 5;
        }

        if ($data[5] == "sangat kurang") {
            $marketingKonversi = 1;
        } elseif($data[5] == "kurang"){
            $marketingKonversi = 2;
        } elseif($data[5] == "cukup"){
            $marketingKonversi = 3;
        } elseif($data[5] == "baik"){
            $marketingKonversi = 4;
        } elseif($data[5] == "sangat baik"){
            $marketingKonversi = 5;
        }
        echo " <tr>                     
                <td>".$nik."</td>
                <td>".$nama."</td>
                <td>".$targetKonversi."</td>
                <td>".$sikapKonversi."</td>
                <td>".$kecerdasanKonversi."</td>
                <td>".$marketingKonversi."</td>
                </tr>   
            ";
             mysqli_query($konek_db," INSERT into konversi values('$nik','$targetKonversi','$sikapKonversi','$kecerdasanKonversi','$marketingKonversi', '$nama')");

            } 
        ?>
</table>

<!--bobot-->
<h2>Bobot</h2>
<table border=1> 
    <tr>
        <th>Target toko</th> 
        <th>Sikap</th>     
        <th>Kecerdasan</th>
        <th>Marketing</th>
        <th>Aksi</th>
    </tr> 
<?php
$queri="Select * From bobot";
$hasil=mysqli_query ($konek_db,$queri);   
while ($data = mysqli_fetch_array ($hasil)){   
            echo "      
                    <tr>  
                    <td>".$data[0]."</td>
                    <td>".$data[1]."</td>  
                    <td>".$data[2]."</td>
                    <td>".$data[3]."</td>
                    <td><a href=editbobot.php><input type=button value=edit class=btn btn-success btn-block></a></td>
                    </tr>   
            ";      
            }
 ?> 
</table> 


<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
function checkDelete(){
    return confirm('Yakin menghapus data ini?');
}
</script>

<!--button untuk melakukan perhitungan saw-->
    <p><a href="proses.php"><input type="button2" value="Proses" class="btn btn-success btn-block"></a></p>


    <footer> </footer>
</body>

</html>