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
    $pengaduan = null;


    $ekstensi_diperbolehkan	= array('png','jpg');
	$foto = $_FILES['file']['name'];
	$tipe_file = $_FILES['file']['type'];
	$ukuran	= $_FILES['file']['size'];
	$file_tmp = $_FILES['file']['tmp_name'];
    $ext=explode(".",$foto);

    $extention=end($ext);
    $new_file_name=uniqid("_",true).".".$extention;
    $path="img/".$new_file_name;
    move_uploaded_file($file_tmp, $path);
    
	if($path!=null){
		if($ukuran < 1044070){			
            $sql = mysqli_query($koneksi,"INSERT INTO `user` VALUES (DEFAULT,'$nama','$username','$password','$level','$nis','$nisn','$jk','$jurusan','$path','$pengaduan')");
            print_r($sql);
            var_dump($sql);
			if($sql){
                header("location: halaman_admin.php");
			}

            else{
                header("location: halaman_admin.php?status=gagal");
                var_dump($sql);
			}
		    }else{
				header('location:  halaman_admin.php?pesan=ukuran');
		    }
		}
        else{
			header('location: halaman_admin.php?pesan=ektensi');
        }
    }
?>
