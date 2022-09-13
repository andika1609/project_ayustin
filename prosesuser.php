<?php
include("koneksi.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
    // ambil data dari formulir
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $jurusan = $_POST['jurusan'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];


    $ekstensi_diperbolehkan	= array('png','jpg');
	$foto = $_FILES['file']['name'];
	$tipe_file = $_FILES['file']['type'];
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
    $path = "img/"."_".time().$foto;
	if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){
		if($ukuran < 1044070){			
			move_uploaded_file($file_tmp, $path);
            $sql = mysqli_query($koneksi,"INSERT INTO user VALUES('','$nama','$username','$password','$level','$nis','$nisn','$jk','$jurusan','$foto')");
			if($sql){
                var_dump($sql);
                header("location: index.php");
			}else{
                header("location: index.php?status=gagal");
                var_dump($sql);
			}
		    }else{
				header('location:  halaman_admin.php?pesan=ukuran');
		    }
			}else{
			header('location: halaman_admin.php?pesan=ektensi');

	       }
    
}



?>