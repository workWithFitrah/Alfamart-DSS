<html>
<?php
    include('conect.php');
?>
<head>
  <title>Edit Data</title>
</head>


<link rel="stylesheet" type="text/css" href="style.css">

<body> 

<hr>
<h2>Edit data</h2>

<div class="container">
<form name="frm" id="myForm" method="post"  enctype="multipart/form-data">

<div class="row">
    <div class="col-25">
      <label for="nik">No. Induk Karyawan</label>
    </div>
    <div class="col-75">
                     <?php
                       $tampil = "SELECT * FROM alternatif where nik='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='number' name='nik' class='form-control' id='nik' readonly value='".$data[0]."'><br>";
                    }
                ?>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="nama_kry">Nama</label>
    </div>
    <div class="col-75">
                    <?php
                       $tampil = "SELECT * FROM alternatif where nik='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='nama_kry' class='form-control' id='nama_kry' value='".$data[1]."'><br>";
                    }
                ?>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="target_toko">Target Toko</label>
    </div>
    <div class="col-75">
        <?php
                       $tampil = "SELECT * FROM alternatif where nik='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='number' name='target_toko' class='form-control' id='target_toko' value='".$data[2]."'><br>";
                    }
                ?>
    </div>
</div>
<div class="row">
    <div class="col-25">
      <label for="sikap">Sikap</label>
    </div>
    <div class="col-75">
      <select id="sikap" name="sikap">
      <option>
          <?php
                    $tampil = "SELECT * FROM alternatif where nik='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "$data[3]";
                    }
          ?>
    </option>        
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
      <option>
          <?php
                    $tampil = "SELECT * FROM alternatif where nik='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "$data[4]";
                    }
          ?>
    </option>        
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
      <option>
          <?php
                    $tampil = "SELECT * FROM alternatif where nik='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "$data[5]";
                    }
          ?>
    </option>        
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
                    $nama           = $_POST['nama_kry'];
                    $target         = $_POST['target_toko'];
                    $sikap          = $_POST['sikap'];
                    $kecerdasan     = $_POST['kecerdasan'];
                    $marketing      = $_POST['marketing'];
                    $query="UPDATE alternatif SET nama_kry='$nama', target_toko='$target',sikap='$sikap', kecerdasan='$kecerdasan', marketing='$marketing' WHERE nik='$NIK'";
                    $result=mysqli_query($konek_db, $query);
                        if($result){
                            ?>
                            <div class="alert alert-success fade in">
                                <strong>Success!</strong> Data Berhasil Diinputkan.
                                
                            </div>
                            <?php
                                }
 }

                ?>    
        </form></div>
  </div>
</div>
    
<script type="text/javascript"> 
    $(function() { 
        $("#datepicker").datepicker();
    }); 
    function checkInput(){
    return confirm('Data sudah benar ?');
    window.location.href = "index.php";
    
}
</script>

</body>
</html>