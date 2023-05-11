<?php
  include 'config/database.php';
  if (isset($_POST["btnlogin"])) {
    $txtusername = $_POST['username'];
    $txtpassword = md5($_POST['password']);
    $cek = mysqli_query($konek, "SELECT * FROM administ where username='" . $_POST['username'] . "' AND password='" . md5($_POST['password']) . "'");
    $hasil = mysqli_fetch_array($cek);
    $count = mysqli_num_rows($cek);

    $nama1 = $hasil['nama'];
    if ($count > 0) {
      session_start();
      $_SESSION['nama'] = $nama1;
      header("location:admin/index.php?halaman=kategoria");
    } else {
      // echo "";
    }
}

?>

    <!-- <div class="pages_agile_info_w3l page_error">
    <div class="over_lay_agile_pages_w3ls error">
        <div class="registration error">
      <br><br><br>
      <h1 align="center">Oops! Login Lalos</h1>
      <br><br><br><br><br><br><br><br><br>
      <h1 align="center"><a href="index.php">Koko fali!</a>
        <h1>
    </div> -->

    //Redirect ke halaman admin
    // header("Location:admin/index.php?halaman=kategoria");


  </div>
</div>