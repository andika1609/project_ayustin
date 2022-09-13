<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<style>
    .tulisan_login{
        color:#361500;
        font-weight:bold;
    }

    .tombol_login{
        background-color:#361500;
    }
</style>

<body style="background-color:#E3CAA5">
    <br>
    <br>
    <br>
    <br>

    <?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>

    <div class="kotak_login" style="background-color:#AD8B73">
        <p class="tulisan_login" width="25">Login</p>

        <form action="cek_login.php" method="post" style="background-color:#AD8B73">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username" required="required">

            <label>Password</label>
            <input type="password" name="password" class="form_login" placeholder="Password" required="required">

            <input type="submit" class="tombol_login" value="LOGIN">

            <br />
            <br />
            <center>
                <a class="link" href="registrasiuser.php">Registrasi</a>
            </center>
        </form>

    </div>


</body>

</html>