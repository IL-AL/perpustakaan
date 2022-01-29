<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
    <?php
    if(isset($_POST['save'])){
        $nama           = $_POST['nama'];
        $jabatan        = $_POST['jabatan'];
        $nomor_telpon  = $_POST['nomor_telpon'];
        $alamat         = $_POST['alamat'];

        $query_insert = mysqli_query($koneksi, "INSERT INTO petugas VALUES('','$nama','$jabatan','$nomor_telpon','$alamat')");

        if ($query_insert){
            echo "Data Berhasil Disimpan...";
            header("refresh:1, url= http://localhost/11_PTSGANJIL2021_XIIRPL2_fadhilahalhadiid/admin.php?page=petugas");
        }else{
            echo "Data Gagal Disimpan...";
        }
        }else if(isset($_GET['hapus'])){
        $id = $_GET['id'];
        $query_delete = mysqli_query($koneksi, "DELETE FROM petugas WHERE id_petugas = '$id'");
        if($query_delete){
            echo "Data Berhasil Dihapus";
            header("refresh:1,url=http://localhost/11_PTSGANJIL2021_XIIRPL2_fadhilahalhadiid/admin.php?page=petugas");
        }
    }
    ?>
    <center><h4 class="mt-4 mb-3">Data Petugas</h4></center>
    <div class="container">
    <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data
</button>
    <table class="table table-striped">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Nomor_Telepon</th>
            <th>Alamat</th>
            <th>Action</th>
        </tr>
    <?php
    $no =1;
    $query =mysqli_query($koneksi , "SELECT * FROM petugas");
    foreach($query as $row){
    ?>
    
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $row ['nama'] ?></td>
            <td><?php echo $row ['jabatan'] ?></td>
            <td><?php echo $row ['no_telpon'] ?></td>
            <td><?php echo $row ['alamat'] ?></td>
            <td valign="middle">
            <a href="?page=petugas&hapus&id=<?php echo $row['id_petugas'];?>">
                <button class="btn btn-danger">Hapus</button>
            <a href="?page=petugas&edit&id=<?php echo $row['id_petugas'];?>"></a>
                <button class="btn btn-warning">Edit</button>
            </td>
        </tr>
    <?php
    $no++;       
    }
    ?>
    </table>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">

        <div class="form-group mb-2">
        <input type="text" class="form-control" name="nama" placeholder="Isi Nama" required="">
        </div>
        <div class="form-group mb-2">
        <input type="text" class="form-control" name="jabatan" placeholder="Pilih Jabatan" required="">
        </div>
        <div class="form-group mb-2">
        <input type="text" class="form-control" name="nomor_telpon" placeholder="Isi Nomor Telepon" required="">
        </div>
        <div class="form-group mb-2">
        <input type="text" class="form-control" name="alamat" placeholder="Isi Alamat" required="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="save" class="btn btn-warning">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<br>
<br>
</body>
</html>