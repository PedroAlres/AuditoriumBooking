<?php
include 'config/database.php';
if (isset($_POST["btnlogin"])) {
  $txtusername = $_POST['username'];
  $txtpassword = md5($_POST['password']);
  $cek = mysqli_query($kon, "SELECT * FROM administ WHERE username = '$txtusername' AND password = '$txtpassword'");
  if (!$cek) {
    die("Query failed: " . mysqli_error($kon));
  }
  $hasil = mysqli_fetch_array($cek);
  if (!empty($hasil)) {
    $count = mysqli_num_rows($cek);
    $nama1 = $hasil['nama'];

    if ($count > 0) {
      session_start();
      $_SESSION['nama'] = $nama1;
      header("location:admin/index.php?halaman=kategoria");
      exit;
    }
  }

  // Handle invalid login here
  // For example, display an error message
  echo "Invalid username or password";
  
}
?>
