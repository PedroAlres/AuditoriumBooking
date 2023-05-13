<!DOCTYPE html>
<html lang="en">
<head>
    <title>WEB DINAMIKU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../bootstrap/css/style.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
        include '../config/database.php';
        $ambil_kategori = mysqli_query ($kon,"select * from profile limit 1");
        $row = mysqli_fetch_assoc($ambil_kategori); 
        $nama_website = $row['web_name'];
        $copy_right = $row['web_name'];
    ?>

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <h1 class="logo"><a href="../index.php"><span><?php echo $nama_website;?></span></a></h1>

            <nav id="navbar" class="navbar">
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="list-group">
                        <a href="index.php?halaman=kategoria" class="list-group-item list-group-item-action">Events</a>
                        <a href="index.php?halaman=admin" class="list-group-item list-group-item-action">Admin</a>
                        <a href="index.php?halaman=profil" class="list-group-item list-group-item-action">Title</a>
                        <a href="logout.php" class="list-group-item list-group-item-action">Logout</a>
                    </div>
                </div>
                
                <div class="col-sm-10">
                <?php 
                    if(isset($_GET['halaman'])){
                        $halaman = $_GET['halaman'];
                        switch ($halaman) {
                            case 'kategoria':
                                include "artikel/kategori.php";
                                break;
                            case 'artikel':
                                include "artikel/index.php";
                                break;
                            case 'komentariu':
                                include "komentar/index.php";
                                break;
                            case 'admin':
                                include "admin/index.php";
                                break;
                            case 'profil':
                                include "profil/index.php";
                                break;
                            default:
                            echo "<center><h3>Deskulpa. Pajina la existe !</h3></center>";
                            break;
                        }
                    }else {
                        include "dashboard.php";
                    }
                ?>
                </div>
            </div>
            <br>
        </div> 
    </section>


    <footer id="footer">
        <div class="container py-4">
        <div class="copyright">
            &copy; Copyright 2022 <strong><span>Dep. Engenharia Informatica</span></strong>.
        </div>
        
        <div class="credits">
            Dezenvolvido por <a href="#">Grupo 2 - Sistema Informacao</a>
        </div>
        </div>
    </footer>
</body>
</html>
