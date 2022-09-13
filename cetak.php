<?php
include("koneksi.php");
// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}
//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM user WHERE id=$id";
$query = mysqli_query($koneksi, $sql);
$siswa = mysqli_fetch_assoc($query);
// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Siswa</title>

    <style type="text/css">
    input,
    textarea {
        padding: 0;
        margin: 0;
    }

    .img {
        width: 400px;
        height: 200px;
        border-radius: 20px;

        display: block;
        margin: 0px auto 0px auto;
    }

    h2 {
        color: #50626C;
        text-align: center;
        font-family: arial;
        text-transform: uppercase;
        border: 3px solid #f1f1f1;
        padding: 5px;
        width: 490px;
        margin: auto;
        margin-bottom: 10px;
        margin-top: 20px;
    }

    form {
        border: 3px solid #f1f1f1;
        font-family: arial;
        width: 500px;
        margin: auto;
    }

    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    label {
        color: #50626C;
        text-transform: uppercase;
    }

    button {
        background-color: #049372;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f03434;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 40%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;

    }

    span {
        color: #50626C;
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .cancelbtn {
            width: 100%;
        }
    }
    </style>


</head>

<body>
    <header>
        <center>
            <h3>Data Siswa</h3>
        </center>
    </header>
    <form action="#" method="POST" enctype="multipart/form-data">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" readonly />
            <p>
                <label for="nis">NIS</label>
                <input type="text" name="nis" placeholder="NIS" value="<?php echo $siswa['nis'] ?>" readonly />
            </p>
            <p>
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" placeholder="NISN" value="<?php echo $siswa['nisn'] ?>" readonly />
            </p>
            <p>
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $siswa['nama'] ?>"
                    readonly />
            </p>
            <p>
                <label for="jk">Jenis Kelamin </label>
                <?php $jk = $siswa['jk']; ?>
            <p><label><input type="radio" name="jk" value="laki-laki"
                        <?php echo ($jk == 'laki-laki') ? "checked": "" ?>> Laki-laki</label>
                <label><input type="radio" name="jk" value="perempuan"
                        <?php echo ($jk == 'perempuan') ? "checked": "" ?>> Perempuan</label>
            </p>
            <p>
                <label for="jurusan">jurusan </label>
                <?php $jurusan = $siswa['jurusan']; ?>
            <p><select name="jurusan">
                    <option <?php echo ($jurusan == 'jurusan') ? "selected": "" ?>>Jurusan</option>
                    <option <?php echo ($jurusan == 'RPL') ? "selected": "" ?>>RPL</option>
                    <option <?php echo ($jurusan == 'TKJ') ? "selected": "" ?>>TKJ</option>
                    <option <?php echo ($jurusan == 'TR') ? "selected": "" ?>>TR</option>
                    <option <?php echo ($jurusan == 'TJA') ? "selected": "" ?>>TJA</option>
                </select>
            </p>
            <p>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username" value="<?php echo $siswa['username'] ?>"
                    readonly />
            </p>
            <p>
                <label for="password">Password</label>
                <input type="text" name="password" placeholder="Password" value="<?php echo $siswa['password'] ?>"
                    readonly />
            </p>
            <p>
                <label for="level">Level</label>
                <input type="text" name="level" placeholder="Level" value="<?php echo $siswa['level'] ?>" readonly />
            </p>
            <p>
                <label>Foto</label><br>
                <?php echo "<img src='$siswa[foto]' width='70' height='90' />";?></td>
            </p>
        </fieldset>
    </form>
    <script>
    window.print();
    </script>
</body>

</html>