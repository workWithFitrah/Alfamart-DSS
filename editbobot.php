<html>
<?php
    include('conect.php');
?>
<head>
	<title> Edit bobot</title>
</head>


<link rel="stylesheet" type="text/css" href="style.css">


<body>

<hr>
<h2>Edit Bobot</h2>
<h3>*bobot target toko + sikap + kecerdasan + marketing tidak boleh lebih dari 1 </h3>

<div class="container">
<form name="frm" id="myForm" method="post"  enctype="multipart/form-data">



     <div class="col-25">
         <label for="target">Bobot target toko :</label>
				<div class="col-75">
					 <?php
                       $tampil = "SELECT * FROM bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='target' class='form-control' id='bobottarget' value='".$data[0]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="col-25">
         <label for="sikap">Bobot sikap :</label>
				<div class="col-75">
					<?php
                       $tampil = "SELECT * FROM bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='sikap' class='form-control' id='bobotuts' value='".$data[1]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="col-25">
         <label for="kecerdasan">Bobot kecerdasan :</label>
				<div class="col-75">
					<?php
                       $tampil = "SELECT * FROM bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='kecerdasan' class='form-control' id='bobotrapot' value='".$data[2]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="col-25">
         <label for="marketing">Bobot marketing :</label>
				<div class="col-75">
					<?php
                       $tampil = "SELECT * FROM bobot ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='marketing' class='form-control' id='bobottes' value='".$data[3]."'><br>";
                    }
                ?>
				</div> 
			</div>

            
            <div class="row">
                <input type="submit" name ="submit" value="simpan" class="btn btn-success"  onclick="return checkInput()">

                <a href="index.php"><input type="button" value="kembali" class="btn btn-success btn-block"></a>
            </div>

            <?php		

                if(isset($_POST['submit'])){
                    $target           = $_POST['target'];
                    $sikap            = $_POST['sikap'];
                    $kecerdasan       = $_POST['kecerdasan'];
                    $marketing        = $_POST['marketing'];
                    $bobot            = $target+$sikap+$kecerdasan+$marketing;
                    if($bobot>1){
                         ?>
                        <div class="alert alert-warning fade in">
                                <a href="editbobot.php" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>SALAH!</strong> Bobot Berlebih.
                                </div>
                            <?php
                    }
                        else{
                    $query="UPDATE bobot SET b_target_toko='$target', b_sikap='$sikap', b_kecerdasan='$kecerdasan', b_marketing='$marketing'";
                    $result=mysqli_query($konek_db, $query);
                        if($result){
                            ?>
                            <div class="alert alert-success">
                                <a href="editbobot.php" class="close" data-dismiss="alert" aria-label="close">X</a>
                                <strong>Success!</strong> Data Berhasil Diupdate.
                                </div>
                            <?php
                                }
                            }
 }

                ?>		
        </form>

    </div>
  </div>
</div>
<script language="JavaScript" type="text/javascript">
            function checkInput(){
            return confirm('Data sudah benar ?');
            }
   </script>
</body>
</html>