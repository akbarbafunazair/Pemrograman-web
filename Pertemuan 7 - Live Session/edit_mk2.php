<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Mata Kuliah</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
</head>
<body>
    <?php   
    include_once "header.php";
    include_once "koneksi.php"; 
    $status = 2;  
    if (isset($_POST['kodemk'])) {
        
        $kodemk = $_POST['kodemk'];
        $namamk = $_POST['namamk'];
        $kategori = $_POST['kategori'];
        $sks = $_POST['sks']; 

         //buat koneksi
         $strSQL = "UPDATE matakuliah SET 
         namamk='".$namamk."', 
         kategori='".$kategori."',
         sks=".$sks." WHERE kodemk='".$kodemk."'";
        // echo $strSQL;
       // die;
         $runSQL = mysqli_query($conn,$strSQL);        
         if ($runSQL) {
             $status = 1; //sukses
         }  
         else {
             $status = 0; //tidak sukses;
         }      
         header("refresh:3; url=listmatakuliah.php"); 
    }        
    else if (isset($_GET['kodemk'])) {
        $kodemk = $_GET['kodemk'];
        $strSQL = "SELECT * FROM matakuliah WHERE kodemk='".$kodemk."'";
        $runStrSQL = mysqli_query($conn,$strSQL);
        $jmlRowData = mysqli_num_rows($runStrSQL);
        if ($jmlRowData > 0) {
            while ($row = mysqli_fetch_assoc($runStrSQL)) {
                $namamk = $row["namamk"];
                $kategori = $row["kategori"];
                $sks = $row["sks"];
            }
        }
        else {            
            $status = 3;
        }
    }  
    else {       
        $namamk = "";
        $kategori = "";
        $sks = "";
        $kodemk = "";
    }  
    $disableForm = isset($_GET['kodemk']) ? "enabled": "disabled";
    ?>
    <div class="container">
        <h2>Pendaftaran Mata Kuliah versi 2 (dg Modal)</h2>   

        <?php 
        include "modalform.php";
            if ($status == 1) {
        ?>    
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Data berhasil diinput ke dalam database. Halaman ini akan kembali ke List Mahasiswa dalam 3 detik
            </div>
        <?php 
            }
            else if ($status == 0){
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Data tidak berhasil diinput ke dalam database.
            </div>
        <?php 
            }
            else if ($status == 3) {        
        ?>
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                Data tidak terdapat di dalam database, halaman ini akan diredirect ke List Mahasiswa dalam waktu 3 detik
            </div>
        <?php 
            header("refresh:3; url=listmatakuliah.php");
            die;
            }
        ?>
        <form id="myform" method="post" action="edit_mk2.php">
            <div class="form-group">
                <label>Kode Mata Kuliah</label>
                <input id="kodemk" class="form-control" type="text" name="kodemk" value="<?php echo $kodemk ?>" readonly 
                <?php echo $disableForm ?>>
            </div>
            <div class="form-group">
                <label>Nama Mata Kuliah</label>
                <input id="namamk" class="form-control" type="text" name="namamk" value="<?php echo $namamk ?>" <?php echo $disableForm ?>>
            </div>
            <div class="form-group">
                <label>Kategori Mata Kuliah</label>
                <select id="kategori" name="kategori" class="form-control" <?php echo $disableForm ?>>
                <option value="pilih">Pilih</option>
                <option value="MKMA">Mata Kuliah Major</option>
                <option value="MKMI">Mata Kuliah Minor</option>
                <option value="MKPIL">Mata Kuliah Pilihan</option>
                </select>
            </div>
            <div class="form-group">
                <label>SKS</label>
                <input id="sks" class="form-control" type="text" name="sks" value="<?php echo $sks ?>" <?php echo $disableForm ?>>
            </div>           
                <input class="btn btn-primary" type="button" id="tombol" value="Simpan" <?php echo $disableForm ?>>   
        </form>
        
    </div>
    <?php 
    include_once "footer.php";
    ?>
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('#proses').click(function(){
            $('#myform').submit();
        });
        $('#tombol').click(function(){
            //ambil data dari form
            const kodemk = $('#kodemk').val();
            const namamk = $('#namamk').val();
            const kategori = $('#kategori').val();
            const sks = $('#sks').val();

            $('#kdmk').text(kodemk);
            $('#nmmk').text(namamk);
            $('#kat').text(kategori);
            $('#sksmk').text(sks);
         
            //buka modal
            $('#pesan').modal({
                show: true
            });
        });
    });
    
    </script>
</body>
</html>