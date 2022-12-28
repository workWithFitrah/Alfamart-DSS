<!DOCTYPE html>
<html>
<?php
include ("conect.php");
?>
<head>
  <title>Tambah Data</title>
</head>

<link rel="stylesheet" type="text/css" href="style.css">

<body>


<hr>
<h2>Tambah data</h2>

<div class="container">
<form name="frm" id="myForm" method="post"  enctype="multipart/form-data">


<div class="row">
    <div class="col-25">
      <label for="nik">No. Induk Karyawan</label>
    </div>
    <div class="col-75">
      <input type="number" name="nik">
    </div>
</div>


<div class="row">
    <div class="col-25">
      <label for="nama_kry">Nama</label>
    </div>
    <div class="col-75">
      <input type="text" name="nama_kry">
    </div>
</div>


<div class="row">
    <div class="col-25">
      <label for="target_toko">Target Toko</label>
    </div>
    <div class="col-75">
      <input type="number" name="target_toko">
    </div>
</div>

<div class="row">
    <div class="col-25">
      <label for="sikap">Sikap</label>
    </div>
    <div class="col-75">
      <select id="sikap" name="sikap">
          <option>sangat kurang</option>
          <option>kurang</option>
          <option>cukup</option>
          <option>baik</option>
          <option>sangat baik</option>
      </select>
    </div>
</div>

<div class="row">
    <div class="col-25">
      <label for="kecerdasan">Kecerdasan</label>
    </div>
    <div class="col-75">
      <select id="kecerdasan" name="kecerdasan">
          <option>sangat kurang</option>
          <option>kurang</option>
          <option>cukup</option>
          <option>baik</option>
          <option>sangat baik</option>
      </select>
    </div>
</div>

<div class="row">
    <div class="col-25">
      <label for="marketing">Marketing</label>
    </div>
    <div class="col-75">
      <select id="marketing" name="marketing">
          <option>sangat kurang</option>
          <option>kurang</option>
          <option>cukup</option>
          <option>baik</option>
          <option>sangat baik</option>
      </select>
    </div>
</div>


                <div class="row">
                <input type="submit" name ="submit" value="Simpan" class="btn btn-success"  onclick="return checkInput()">

                <a href="index.php"><input type="button" value="Kembali" class="btn btn-success btn-block"></a>
                </div>

            <?php   

                    if(isset($_POST['submit'])){
                    $NIK            = $_POST['nik'];
                    $nama_kry       = $_POST['nama_kry'];
                    $target         = $_POST['target_toko'];
                    $sikap          = $_POST['sikap'];
                    $kecerdasan     = $_POST['kecerdasan'];
                    $marketing      = $_POST['marketing'];
                    
                    $query="INSERT INTO alternatif SET nik='$NIK', nama_kry='$nama_kry', target_toko='$target',sikap='$sikap', kecerdasan='$kecerdasan', marketing='$marketing'";
                    $result=mysqli_query($konek_db, $query);
                        if($result){
                            ?>
                            <div class="alert alert-success fade in">
                                
                                <strong>Success!</strong> Data Berhasil Diinputkan.
                                <a href="index.php" class="close" data-dismiss="alert" aria-label="close">Lihat data</a>
                                </div>
                            <?php
                                }
 }

                ?>
                </form></div>
  </div>
</div>
    <script language="JavaScript" type="text/javascript">
            function checkInput(){
            return confirm('Data sudah benar ?');
            }
   </script>

</body>
</html>