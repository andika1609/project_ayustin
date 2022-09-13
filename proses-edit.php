<?php
include("koneksi.php");
// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['simpan'])) {
    // ambil data dari formulir
    $id = $_POST['id'];
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jurusan = $_POST['jurusan'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $foto = $_FILES['file']['name'];
    
    // buat query update
    if ($foto!="") {
        $ekstensi_diperbolehkan =array('png', 'jpg');
        $tipe_file = $_FILES['file']['type'];
        $ukuran    = $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];

        $ext=explode('.',$foto);

        $extention= end($ext);
        
        $dir = 'img/' . uniqid('_', true) . "." . $extention;
        echo"<br>";
        move_uploaded_file($file_tmp, $dir);
    } 
    else if($foto==""){
        $dir=$_POST['default'];
    }
    
    var_dump($dir);

    if (isset($dir)) {
        if ($ukuran < 1044070) {

            $query = mysqli_query($koneksi, "UPDATE user SET nama='$nama',username='$username',`password`='$password',level='$level',nis='$nis',nisn='$nisn',jk='$jk',jurusan='$jurusan',foto='$dir' WHERE id='$id'");

            if ($query == TRUE) {
                header('Location: halaman_admin.php?status=successEdit');
            }
        } else {
            var_dump($query);
            header('Location: halaman_admin.php?status=forbiddenSize');
        }
    } else {
        header('Location: halaman_admin.php?status=forbiddenEkstensi');
    }
}
