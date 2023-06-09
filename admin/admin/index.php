
<div class="card mb-4">
    <div class="card-header">
        <button type="button" id="btn-tambah-admin" class="btn btn-primary"><span class="text"><i class="fas fa-car fa-sm"></i> Aumenta Admin</span></button>
    </div>
    <div class="card-body">
    <?php
    if (isset($_GET['tambah'])) {
        //Mengecek nilai variabel tambah 
        if ($_GET['tambah']=='berhasil'){
            echo"<div class='alert alert-success'><strong>Susessu!</strong> admin aumenta ona!</div>";
        }else if ($_GET['tambah']=='gagal'){
            echo"<div class='alert alert-danger'><strong>Falla!</strong> admin falla aumenta!</div>";
        }    
    }
    if (isset($_GET['edit'])) {
        //Mengecek nilai variabel edit 
        if ($_GET['edit']=='berhasil'){
            echo"<div class='alert alert-success'><strong>Susessu!</strong> admin edit ona!</div>";
        }else if ($_GET['edit']=='gagal'){
            echo"<div class='alert alert-danger'><strong>Falla!</strong> admin falla edit!</div>";
        }    
      }
    if (isset($_GET['hapus'])) {
        //Mengecek nilai variabel hapus 
        if ($_GET['hapus']=='berhasil'){
            echo"<div class='alert alert-success'><strong>Susessu!</strong> admin susessu apaga!</div>";
        }else if ($_GET['hapus']=='gagal'){
            echo"<div class='alert alert-danger'><strong>Falla!</strong> admin falla apaga!</div>";
        }    
    }
    ?>
       <!-- Tabel daftar admin -->
       <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Asaun</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        // include database
                        include '../config/database.php';
                        // perintah sql untuk menampilkan daftar pengguna yang berelasi dengan tabel kategori pengguna
                        $sql="select * from administrator";
                        $hasil=mysqli_query($kon,$sql);
                        $no=0;
                        //Menampilkan data dengan perulangan while
                        while ($data = mysqli_fetch_array($hasil)):
                        $no++;
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['status'] == 1 ? 'Aktif' : 'Tidak Aktif'; ?></td>
                        <td>
                            <button class="btn-edit btn btn-warning btn-circle" id_pengguna="<?php echo $data['id_pengguna']; ?>" kode_pengguna="<?php echo $data['kode_pengguna']; ?>" >Edit</button>
                            <button class="btn-hapus btn btn-danger btn-circle"  id_pengguna="<?php echo $data['id_pengguna']; ?>" kode_pengguna="<?php echo $data['kode_pengguna']; ?>" level="<?php echo $data['level']; ?>" >Apaga</button>
                        </td>
                    </tr>
                    <!-- bagian akhir (penutup) while -->
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <!-- Bagian header -->
        <div class="modal-header">
            <h4 class="modal-title" id="judul"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Bagian body -->
        <div class="modal-body">
            <div id="tampil_data">

            </div>  
        </div>
        <!-- Bagian footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
</div>
<script>

    $('#btn-tambah-admin').on('click',function(){
        
        $.ajax({
            url: 'admin/tambah.php',
            method: 'post',
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Aumenta Admin';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });

       
    // fungsi edit pengguna
    $('.btn-edit').on('click',function(){

        var id_pengguna = $(this).attr("id_pengguna");
        var kode_pengguna = $(this).attr("kode_pengguna");
        $.ajax({
            url: 'admin/edit.php',
            method: 'post',
            data: {id_pengguna:id_pengguna},
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Edit Admin #'+kode_pengguna;
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });




    // fungsi hapus artikel
    $('.btn-hapus').on('click',function(){

        var id_pengguna = $(this).attr("id_pengguna");
        var gambar = $(this).attr("gambar");

        konfirmasi=confirm("Hakarak atu apaga?")

        if (konfirmasi){
            $.ajax({
                url: 'admin/hapus.php',
                method: 'post',
                data: {id_pengguna:id_pengguna,gambar:gambar},
                success:function(data){
                    window.location.href = 'index.php?halaman=admin';
                }
            });
        }
});

</script>