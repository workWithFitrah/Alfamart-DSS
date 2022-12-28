<html>
<?php
    include('koneksi.php');
?>
<head>
	<title></title>
</head>
<body>
	<form name="frm" id="myForm" method="post"  enctype="multipart/form-data">
     <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="nis">NIS :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='nis' class='form-control' id='nis' readonly value='".$data[0]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="nama">Nama :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='nama' class='form-control' id='nama' value='".$data[1]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="tgllahir">Tanggal Lahir :</label>
				<div class="col-sm-8">
                     <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' id='coldate1' name='tgllahir' class='form-control IP_calendar' alt='date' title='Y/m/d'  value='".$data[2]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="asalsekolah">Asal Sekolah :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='asalsekolah' class='form-control' id='asalsekolah' value='".$data[3]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="notelp">No Telp :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."' ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='notelp' class='form-control' id='notelp' value='".$data[4]."'><br>";
                    }
                ?>
				</div> 
			</div>   
				        <button type="submit" name ="submit" class="btn btn-success"  onclick="return checkInput()">Simpan</button><br><br>

            <?php		

                    if(isset($_POST['submit'])){
                    $nis                 = $_POST['nis'];
                    $nama                = $_POST['nama'];
                    $tgllahir            = $_POST['tgllahir'];
                    $asalsekolah         = $_POST['asalsekolah'];
                    $notelp              = $_POST['notelp'];
                    $query="UPDATE tb_siswa SET nama='$nama', tgllahir='$tgllahir',asalsekolah='$asalsekolah', notelp='$notelp' WHERE NIS='$nis'";
                    $result=mysqli_query($konek_db, $query);
                        if($result){
                            ?>
                            <div class="alert alert-success fade in">
                                <a href="vdatanilai.php" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Success!</strong> Data Berhasil Diinputkan.
                                </div>;
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
}
</script>
</body>
</html>