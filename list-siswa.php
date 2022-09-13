<?php include("koneksi.php"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* 
    these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Data Siswa</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php 
	session_start();

	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:index.php?pesan=gagal");
	}

	?>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">               
                <a class="navbar-brand" href="index.php">SMK TELKOM JAKARTA</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">SISWA<span class="sr-only"></span></a></li>
                    <li class="active"><a href="dataadmin.php">ADMIN</a></li>
                    <li class="active"><a href="logout.php">KELUAR</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
            <div class="col-sm-12 col-md-12 col-md-offset-0">
                <h3 class="page-header">Daftar Siswa</h3>
                <div class="table-responsive">
                    <?php include("koneksi.php"); ?>
                    <nav>
                        <a href="form-daftar.php">[+] Tambah Data Baru</a>
                    </nav>
                    <br>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Jurusan</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
    $sql = "SELECT * FROM user";
    $query = mysqli_query($koneksi, $sql);
    $no=1;
    while($siswa = mysqli_fetch_array($query)){
      echo "<tr>";
      echo "<td>".$siswa['id']."</td>";
      echo "<td>".$siswa['nis']."</td>";
      echo "<td>".$siswa['nisn']."</td>";
      echo "<td>".$siswa['nama']."</td>";
      echo "<td>".$siswa['jk']."</td>";
      echo "<td>".$siswa['jurusan']."</td>";
      echo "<td>".$siswa['username']."</td>";
      echo "<td>".$siswa['password']."</td>";
      echo "<td>".$siswa['level']."</td>";
      echo "<td>";
      echo "<td><a href='form-edit.php?id=".$siswa['id']."'class='btn btn-success'>Edit</button></a> | ";
      echo "<a href='hapus.php?id=".$siswa['id']."'class='btn btn-danger'>Hapus</a></td>";
      echo "</td>";
      $no++;
    }
    ?>
                        </tbody>
                        <p>Total : <?php echo mysqli_num_rows($query) ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
    window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')
    </script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>