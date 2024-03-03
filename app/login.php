<?php
session_start();
include "koneksi.php";
include "boot.php";
if (isset($_POST['login'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$cari = $konek->query("select*from login where user='$user' and pass='$pass'");
	$cek = $cari->num_rows;
	if ($cek == 0) {
		echo "maaf user/pass tidak ditemukan";
	} else {
		$_SESSION['user'] = $user;
		?>
		<script>
			document.location.href = 'beranda.php';
		</script>
		<?php
	}
}
?>

<body background="../img/bijikopi.png" style="background-size:cover;">
	<br>
	<br>
	<br>
	<br>
	<div class="container col-4">
		<from class="form-control mt-3 form-control " style="background-color:#FFE7B9;">
			<form action="" method="post">
				<div class="mb-3 form-control" style="background-color:#FFE7B9;">
					<p class="text-center fs-2 fw-semibold mb-0">Login CaffeCIK</p>

					<label for="exampleInputEmail1" class="form-label mt-3">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
						name="user">
					<div id="emailHelp" class="form-text"></div>

					<div class="mb-3 mt-3">
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" class="form-control" id="inputPassword" name="pass">
					</div>
					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
						<label class="form-check-label" for="exampleCheck1">Show Password</label>
					</div>
					<button type="submit" class="btn btn-outline-dark" name="login">Login</button>
				</div>
			</form>
		</from>
	</div>
	</br>
	</br>
	</br>
	</br>
</body>
<?php
include "koneksi.php";

if (isset($_POST['login'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$cari = $konek->query("select*from login where user='$user' and pass='$pass'");
	$cek = $cari->num_rows;
	if ($cek == 0) {
		echo "maaf user/pass tidak ditemukan";
	} else {
		$_SESSION['user'] = $user;
		echo $_SESSION['user'];
		?>
		<script>
			document.location.href = 'beranda.php';
		</script>
		<?php
	}
}
?>

<script>
	function myFunction() {
		var x = document.getElementById("inputPassword");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
</script>