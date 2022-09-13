<?php
include("koneksi.php");
// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan']))
    // ambil data dari formulir
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jurusan = $_POST['jurusan'];
    $pengaduan= $_POST['pengaduan'];
   
    
    // buat query update
  $query = mysqli_query($koneksi,"UPDATE user SET pengaduan='$pengaduan' WHERE id='$id'");
   header('Location:halaman_user.php?');
    
   

?>