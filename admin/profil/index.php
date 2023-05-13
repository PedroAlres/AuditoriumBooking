
<div class="card mb-4">
    <div class="card-header">
    
    </div>
    <div class="card-body">
    <?php


    if (isset($_GET['ubah'])) {
        //Mengecek nilai variabel ubah
        if ($_GET['ubah']=='berhasil'){
            echo"<div class='alert alert-success'>Naran website muda ona</div>";
        }else if ($_GET['ubah']=='gagal'){
            echo"<div class='alert alert-danger'>>Naran website falla muda</div>";
        }    
    }

    include '../config/database.php';
    $ambil_kategori = mysqli_query ($kon,"select * from profile limit 1");
    $row = mysqli_fetch_assoc($ambil_kategori); 
    $nama_website = $row['web_name'];
    ?>
            <div class="form-group">
                <label for="usr">Naran Website:</label>
                <input type="text" id="nama_website" class="form-control" value="<?php echo $nama_website; ?>">
            </div>
            <div class="form-group">
                <button type="button" id="tombol_ubah" class="btn btn-primary"><span class="text"><i class="fas fa-car fa-sm"></i> Renova</span></button>
            </div>
    </div>
</div>


<script>
    $('#tombol_ubah').on('click',function(){

        var nama_website = $('#nama_website').val();
        konfirmasi=confirm("Ita hakarak muda profil website?")
        if (konfirmasi){
            $.ajax({
                url: 'profil/ubah.php',
                method: 'post',
                data: {nama_website:nama_website},
                success:function(data){
                    window.location.href = 'index.php?halaman=profil&ubah=berhasil';
                }
            });
        }
});

</script>