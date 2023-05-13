


<div class="card mb-4">
    <div class="card-header">
        <!-- <button type="button" id="btn-tambah-kategori" class="btn btn-primary"><span class="text"><i class="fas fa-car fa-sm"></i>Add Events</span></button> -->
    </div>

    <div class="card-body">
        <div class="card-columns">
            <?php         
                // include database
                include '../config/database.php';
                
                // perintah sql untuk menampilkan daftar pengguna yang berelasi dengan tabel kategori pengguna
                $sql="select * from user";
                $hasil=mysqli_query($kon,$sql);
                $no=0;

                //Menampilkan data dengan perulangan while
                while ($data = mysqli_fetch_array($hasil)):
                $no++;
            ?>

            <div class="card bg-basic" style="width: 12rem;">
                <a href="index.php?halaman=artikel&kategori=<?php echo $data['id_user'];?>"></a>
                
                <div class="card-body text-center">
                    <a href="index.php?halaman=artikel&kategori=<?php echo $data['id_user'];?>"> <h5 class="card-title"><?php echo $data['username'];?></h5> </a>
                    <a href="#" class="hapus_kategori" id_kategori="<?php echo $data['id_user']; ?>"> <h6 class="text-danger">Apaga</h6> </a>
                </div>
            </div>

            <?php endwhile; ?>
        </div>
    </div>
    
</div>

<script>

    $('#btn-tambah-kategori').on('click',function(){
        
        $.ajax({
            url: 'artikel/tambah-kategori.php',
            method: 'post',
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Aumenta Kategoria';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });

        // fungsi hapus artikel
        $('.hapus_kategori').on('click',function(){

        var id_kategori = $(this).attr("id_kategori");
        var gambar = $(this).attr("gambar");
    
        konfirmasi=confirm("Hakarak atu apaga?")

        if (konfirmasi){
            $.ajax({
                url: 'artikel/hapus-kategori.php',
                method: 'post',
                data: {id_kategori:id_kategori,gambar:gambar},
                success:function(data){
                    window.location.href = 'index.php?halaman=kategoria';
                }
            });
        }


        });
</script>