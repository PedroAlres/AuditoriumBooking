
<div class="card mb-4">
    <div class="card-header">
        <button type="button" id="btn-tambah-artikel" class="btn btn-primary"><span class="text"><i class="fas fa-car fa-sm"></i> Aumenta Artikel</span></button>
    </div>

    <div class="card-body">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Asaun</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    // include database
                    include '../config/database.php';

                    // perintah sql untuk menampilkan daftar artikel
                    $id_kategori=$_GET['user'];
                    $sql="select * from book inner join user on user.id_user=book.id_user where user.id_user='$id_kategori' order by id_event desc";
                    $hasil=mysqli_query($kon,$sql);
                    $no=0;

                    //Menampilkan data dengan perulangan while
                    while ($data = mysqli_fetch_array($hasil)):
                    $no++;
                ?>

                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($data['date'])); ?></td>
                    <td><?php echo  $data['username'];  ?></td>
                    <td><?php echo  $data['username'];  ?></td>
                    <td><?php echo  $data['description'];  ?></td>
                    <td><?php echo $data['status'] == 1 ? "<span class='text-success'>Publish</span>" : "<span class='text-warning'>Konsep</span>"; ?> </td>
                    <td>   
                        <button class="btn-edit-artikel btn btn-warning btn-circle" id_artikel="<?php echo $data['id_artikel']; ?>" kode_artikel="<?php echo $data['kode_artikel']; ?>" data-toggle="tooltip" title="Edit artikel" data-placement="top">Edit</button> 
                        <button class="btn-hapus-artikel btn btn-danger btn-circle"  id_artikel="<?php echo $data['id_artikel']; ?>"  gambar="<?php echo $data['gambar']; ?>"  data-toggle="tooltip" title="Hapus artikel" data-placement="top">Apaga</button>
                    </td>
                </tr>

                <!-- bagian akhir (penutup) while -->
                <?php endwhile; ?>
            </tbody>
        </table>
     
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

<input type="hidden" name="kategori" id="kategori" value="<?php echo $_GET['kategori'];?>" />

<script>

    $('#btn-tambah-artikel').on('click',function(){
        var kategori = $('#kategori').val();
        $.ajax({
            url: 'artikel/tambah-artikel.php',
            data: {kategori:kategori},
            method: 'post',
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Aumenta Artikel';
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });

        // fungsi edit artikel
    $('.btn-edit-artikel').on('click',function(){
    
        var id_artikel = $(this).attr("id_artikel");
        var kode_artikel = $(this).attr("kode_artikel");
     
        $.ajax({
            url: 'artikel/edit-artikel.php',
            method: 'post',
            data: {id_artikel:id_artikel,kode_artikel:kode_artikel},
            success:function(data){
                $('#tampil_data').html(data);  
                document.getElementById("judul").innerHTML='Edit Artikel #'+kode_artikel;
            }
        });
        // Membuka modal
        $('#modal').modal('show');
    });


    // fungsi hapus artikel
    $('.btn-hapus-artikel').on('click',function(){

        var id_artikel = $(this).attr("id_artikel");
        var gambar = $(this).attr("gambar");
        var kategori = $('#kategori').val();
        konfirmasi=confirm("hakarak atu apaga?")
        
        if (konfirmasi){
            $.ajax({
                url: 'artikel/hapus-artikel.php',
                method: 'post',
                data: {id_artikel:id_artikel,gambar:gambar},
                success:function(data){
                    window.location.href = 'index.php?halaman=artikel&kategori='+kategori+'&hapus=berhasil';
                }
            });
        }

     
    });

</script>