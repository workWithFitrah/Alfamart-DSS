<html>
<?php
//koneksi database
    include('conect.php');
    mysqli_query($konek_db,"TRUNCATE TABLE `hasil`");
?>
<head>

    <title>Hasil</title>

</head>

<link rel="stylesheet" type="text/css" href="style.css">


<body>


    <footer></footer>


<h2>Bobot</h2>
<table border=1> 
    <tr>
        <td>Target toko</td> 
        <td>Sikap</td>     
        <td>Kecerdasan</td>
        <td>Marketing</td>
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
                    </tr> 
            ";      
            }
 ?>
 </table><br>    

<!--tabel nilai max-->
<h2>Nilai Max</h2> 
<table border=1>
    <tr>
        <th>target</th>
        <th>sikap</th>
        <th>kecerdasan</th>
        <th>marketing</th>
    </tr>
                                
<?php
        $sql="SELECT MAX(targetKonversi), MAX(sikapKonversi), MAX(kecerdasanKonversi), MAX(marketingKonversi)FROM konversi";
        $result=mysqli_query($konek_db,$sql); //row melihat dari sql 
        while($row=mysqli_fetch_array($result)){
            $Maxtarget          =$row[0];
            $Maxsikap           =$row[1];
            $Maxkecerdasan      =$row[2];
            $Maxmarketing       =$row[3];   
        }
           echo "      
                    <tr> 
                    <td>".$Maxtarget."</td>  
                    <td>".$Maxsikap."</td>
                    <td>".$Maxkecerdasan."</td>
                    <td>".$Maxmarketing."</td>
                    </tr>   
            ";        
        ?>
</table>


<!--tabel x/max-->
<br>
<h2> Normalisasi (x/nilai max) </h2>

<table border="1">
    <thead>
        <tr>
            <th>nik</th>
            <th>nama</th>
            <th>target</th>
            <th>sikap</th>
            <th>kecerdasan</th>
            <th>marketing</th>
            </tr>
    </thead>

<?php 
        $sql="SELECT * FROM konversi";
        $result=mysqli_query($konek_db,$sql) or die(mysql_error()); //row melihat dari sql 
        while($row = mysqli_fetch_array($result)){
            $nik           =$row[0];
            $nama          =$row[5];
            $xtarget       =$row[1]/$Maxtarget;
            $xsikap        =$row[2]/$Maxsikap;
            $xkecerdasan   =$row[3]/$Maxkecerdasan;
            $xmarketing    =$row[4]/$Maxmarketing;

           echo "      
                    <tr> 
                    <td>".$nik."</td>
                    <td>".$nama."</td>                    
                    <td>".$xtarget."</td>
                    <td>".$xsikap."</td>
                    <td>".$xkecerdasan."</td>
                    <td>".$xmarketing."</td>
                    </tr>   
            ";        }
        ?>
</table>
<br>

<!-- tabel perangkingan -->
<h2>Penghitungan</h2>
<table border="1">
    <thead>
        <tr>
            <th>nik</th>
            <th>nama</th>
            <th>target</th>
            <th>sikap</th>
            <th>kecerdasan</th>
            <th>marketing</th>
            <th>total</th>
            </tr>
    </thead>

<?php
        $sql="SELECT * FROM konversi, bobot";
            $result=mysqli_query($konek_db,$sql) or die(mysql_error()); //row melihat dari sql 
            $nik=$data[0];
            $nama=$data[1];
            while($data = mysqli_fetch_array($result )){
            $nik          =$data[0];
            $nama          =$data[5];
            $htarget       =round($data[6] *  ($data[1]/$Maxtarget), 3);
            $hsikap        =round($data[7] * ($data[2]/$Maxsikap), 3);
            $hkecerdasan   =round($data[8] * ($data[3]/$Maxkecerdasan), 3);
            $hmarketing    =round($data[9] * ($data[4]/$Maxmarketing), 3);
            $total         =$htarget + $hsikap + $hkecerdasan + $hmarketing;

            // mysqli_query($konek_db," INSERT into hasil values('$total')");
           echo "      
                    <tr>
                    <td>".$nik."</td>
                    <td>".$nama."</td>
                    <td>".$htarget."</td>
                    <td>".$hsikap."</td>
                    <td>".$hkecerdasan."</td>
                    <td>".$hmarketing."</td>
                    <td>".$total."</td>
                    </tr>   
            ";
                        mysqli_query($konek_db," INSERT into hasil values('$nik','$nama','$total')");
            }
        ?>
</table>


<h2>Perangkingan</h2>
<table border="1">
    <thead>
        <tr>
            <th>nik</th>
            <th>nama</th>
            <th>total</th>
            <th>rank</th>
            </tr>
    </thead>

<?php
        
        $sql="SELECT * FROM hasil order by total desc";
        $result=mysqli_query($konek_db,$sql) or die(mysql_error()); //row melihat dari sql 
        $rank=0;
        while($row = mysqli_fetch_array($result)){
            $rank++;
            $nik=$row[0];
            $nama=$row[1];
            $total=$row[2];
            echo "
            <tr>
            <td>".$nik."</td>
            <td>".$nama."</td>
            <td>".$total."</td>
            <td>".$rank."</td>
            </tr>
            ";
        }
        ?>
        </table>
    <p><a href="index.php"><input type="button2" value="Kembali" class="btn btn-success btn-block"></a></p>
</body>
</html>