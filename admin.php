<!-- panggil header -->
<?php include "header.php"; ?>

<?php

//uji jika tombol di klik//

if(isset($_POST['bsimpan'])){
    $tgl = date('y-m-d');

    $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES);
    $alamat = htmlspecialchars($_POST['alamat'], ENT_QUOTES);
    $tujuan = htmlspecialchars($_POST['tujuan'], ENT_QUOTES);
    $nope = htmlspecialchars($_POST['nope'], ENT_QUOTES);
//persiapan query data
    $simpan = mysqli_query($koneksi, "INSERT INTO ttamu VALUES ('','$tgl', '$nama','$alamat', '$tujuan', '$nope')");
//uji jika simpan sukses
    if($simpan){
        echo "<script>alert('Simpan data Sukses, Terima kasih!!!');
        document.location='?'</script>";
    }else {
        echo "<script>alert('Simpan data Gagal..!');
        document.location='?'</script>";
    

    }
}

?>
    <!-- head -->

    <div class="head text-center">
        <img src="assets/img/logo1.jpg"width="150"  >
        <h2 class="text-black">Sistem Informasi Buku Tamu <br> Muhammad Ilpan</h2>
    </div>

    <!-- end head -->

    <!-- awal row-->
    <div class="row mt-2">

    <!-- col-lg-7 -->
        <div class="col-lg-7 mb-3">
            <div class="card shadow bg-gradient-light">
                <div class="card-body">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Identitas Pengunjung</h1>
                            </div>
                            <form class="user" method="POST" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="nama" placeholder="Nama Pengunjung" require>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="alamat" placeholder="Alamat Pengunjung"require>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="tujuan" placeholder="Tujuan Pengunjung"require>
                                </div> 
                                
                                <div class="form-group">
                                    <input type="text" class="form-control
                                    form-control-user" name="nope" placeholder="No.hp Pengunjung"require>
                                </div>









<button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Simpan Data</button>
                               
                               
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="#">By. Muhammad Ilpan | 2022 - <?=date('y') ?></a>
                            </div>
                            
                </div>
            </div>
        </div>
        <!-- end-col-lg-5 -->
        <div class="col-lg-5 mb-3">
            <div class="card shadow bg-gradient-light">
                <div class="card-body">
                <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Statistik Pengunjung</h1>
                            
                </div>
<?php 

//deklarasi tanggal //

// menampilkan tgl sekarang// 

$tgl_sekarang = date('y-m-d');

//menampilkan tgl kemarin//

$kemarin = date('y-m-d',strtotime('-1 day', strtotime(date('y-m-d'))));

//mendapatkan 6 hari sebelum sekarang//

$seminggu  =date('y-m-d h:i:s', strtotime('-1 week +1 day', strtotime($tgl_sekarang)));

$sekarang =  date('y-m-d h:i:s');

//persiapan query tampilan jumlah data pengunjung//


?>






                            <table class="table table-border">
                                <tr>
                                    <td>Hari ini</td>
                                    <td>: 0 </td>
                                </tr>
                                <tr>
                                    <td>Kemarin</td>
                                    <td>: 0</td>
                                </tr>
                                <tr>
                                    <td>Bulan ini</td>
                                    <td>: 0</td>
                                </tr>
                                <tr>
                                    <td>keseluruhan</td>
                                    <td>: 0</td>
                                </tr>
                            </table>
                </div>
            </div>
        </div>
          <!-- end-col-lg-5 -->
    </div>
    
    <!-- end row -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung Hari ini [<?=date('d-m-y') ?>]</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>No.hp</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Alamat</th>
                                            <th>Tujuan</th>
                                            <th>No.hp</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $tgl =date('y-m-d');
                                        $tampil = mysqli_query($koneksi,"SELECT * FROM ttamu where
                                        tanggal like '%$tgl%' order by id desc"); 
                                        $no = 1;
                                        while($data = mysqli_fetch_array($tampil)){
                                            ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['tanggal']?></td>
                                            <td><?= $data['nama']?></td>
                                            <td><?= $data['alamat']?></td>
                                            <td><?= $data['tujuan']?></td>
                                            <td><?= $data['nope']?></td>
                                          
                                        </tr>
                        
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
       
<!-- panggil footer -->
<?php include "header.php"; ?>

   