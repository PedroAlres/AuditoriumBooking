<!DOCTYPE html>
<html lang="en">
    <head>
        <title>WEB DINAMIKU</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap/css/style.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
            include 'config/database.php';
            $ambil_kategori = mysqli_query ($kon,"select * from profile limit 1");
            $row = mysqli_fetch_assoc($ambil_kategori);
            $nama_website = $row['web_name'];
            $copy_right = $row['web_name'];
        ?>

        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <h1 class="logo"><a href="index.php?halaman=home"><span><?php echo $nama_website;?></span></a></h1>

                <nav id="navbar" class="navbar">
                    <ul class="navbar-nav ml-auto">
                        <?php 
                            session_start();
                            if (isset($_SESSION["id"])) {
                                    echo " <li><a class='nav-link' href='admin/index.php?halaman=kategoria'>Pajina Admin</a></li>";
                            }else {
                                echo " <li><a class='nav-link' href='index.php?halaman=login'><span class='fas fa-log-in'></span> Login</a></li>";
                            }
                        ?>
                    </ul>

                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            </div>
        </header>

        <section id="hero" class="d-flex align-items-center">
            <div class="container">
                <?php
                $judul="BEMVINDO";   
                include 'config/database.php';
                ?>

                <h1><?php echo $judul;?></h1>
            </div>
        </section>

        <section>
            <div class="container">      
                <div class="card mb-4">
                    <div class="card-header">Pajina Login</div>
                        <div class="card-body">
                            <div class="row">
                        
                                <div class="col-sm-5">
                                    <form action="login.php" method="POST">
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input id="username" type="text" class="form-control" name="username" placeholder="Hatama Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input id="password" type="password" name="password" class="form-control" placeholder="Hatama Password">
                                        </div>
                                        <button type="submit" name="btnlogin" class="btn btn-primary">Login</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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