<?php
    @$nisn = $_POST['nisn'];
    @$nis = $_POST['nis'];
    @$nama = $_POST['nama'];
    @$kelas = $_POST['kelas'];
    @$spp = $_POST['spp'];
    @$alamat = $_POST['alamat'];
    @$no_telp = $_POST['no_telp'];
    if(isset($_POST['tambah_siswa'])){
        $query = $conn->query("insert into siswa set nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$kelas', id_spp='$spp', alamat='$alamat', no_telp='$no_telp'");
        if($query){
          echo "
            <script language = javascript>
                swal({
                    title: 'Berhasil',
                    text: 'Berhasil Tambah Data',
                    icon: 'success',
                    button: true,
                });
            </script>
          ";
        }else{
            echo "
            <script language = javascript>
                swal({
                    title: 'Gagal',
                    text: 'Gagal Tambah Data',
                    icon: 'danger',
                    button: true,
                });
            </script>
          ";
        }
    };
    if(isset($_POST['edit-siswa'])){
        $query_edit = $conn->query("update siswa set nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$kelas', id_spp='$spp', alamat='$alamat', no_telp='$no_telp' where nisn='$nisn'");
        if($query_edit){
            echo "
              <script language = javascript>
                  swal({
                      title: 'Berhasil',
                      text: 'Berhasil Edit Data',
                      icon: 'success',
                      button: true,
                  });
              </script>
            ";
          }else{
              echo "
              <script language = javascript>
                  swal({
                      title: 'Gagal',
                      text: 'Gagal Edit Data',
                      icon: 'danger',
                      button: true,
                  });
              </script>
            ";
          }
    };
    if(isset($_POST['delete-siswa'])){
        $del = $_POST['delete-nisn'];
        $query_del = $conn->query("delete from siswa where nisn='$del'");
        if($query_del){
            echo "
              <script language = javascript>
                  swal({
                      title: 'Berhasil',
                      text: 'Berhasil Hapus Data',
                      icon: 'success',
                      button: true,
                  });
              </script>
            ";
          }else{
              echo "
              <script language = javascript>
                  swal({
                      title: 'Gagal',
                      text: 'Gagal Hapus Data',
                      icon: 'danger',
                      button: true,
                  });
              </script> 
            ";
          }
    }
?>
<div class="container-fluid ">
    <div class="add-siswa my-3">
        <a href="#" class="btn btn-light" onclick="document.getElementById('add-data-siswa').style.display='block'">Add Data Siswa</a>
    </div>
    <div class="modal" id="add-data-siswa">
    <form class="modal-content animate" action="" method="post">
        <div class="container-fluid">
            <label for="nisn"><b>Nisn</b></label>
                <input type="text" placeholder="Masukkan Nisn Siswa" name="nisn" required class="">
            <label for="nis"><b>Nis</b></label>
                <input type="text" placeholder="Masukkan Nis Siswa" name="nis" required>
            <label for="nama"><b>Nama</b></label>
                <input type="text" placeholder="Masukkan Nama Siswa" name="nama" required>
               
            <label for="kelas" class="mt-2"><b>Kelas</b></label>
                <br><select class="form-select" id="" name="kelas">
                <?php 
                    $q1 = $conn->query("select * from kelas");
                    while(($d1 = $q1->fetch_assoc()) ){
                ?>
                    <option value="<?= $d1['id_kelas'] ?>"><?= $d1['nama_kelas'].'-'.$d1['kompetensi_keahlian'] ?> </option>
                <?php };?>
                </select>
            <label for="spp" class="mt-2"><b>Tahun Ajaran</b></label>
                <br><select class="form-select" id="" name="spp">
                <?php
                    $q2 = $conn->query('select * from spp');
                    while(($d2 = $q2->fetch_assoc()) ){
                ?>
                    <option value="<?= $d2['id_spp'] ?>"><?= $d2['tahun'] ?></option>
                    <?php }; ?>
                </select>
                
            <br><label for="alamat" class="mt-2"><b>Alamat</b></label>
                <br><textarea type="text" placeholder="Masukkan Alamat Siswa" name="alamat" required class="form-control"> </textarea><br>
            <label for="no_telp"><b>No Telp</b></label>
                <input type="text" placeholder="Masukkan No Telp Siswa" name="no_telp"  >
            <button type="submit" style="padding:11px 20px" name="tambah_siswa">Tambah</button>
        </div>
        <div class="container-fluid" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('add-data-siswa').style.display='none'" class="cancelbtn p-2 my-2">Cancel</button>
        </div>
    </form>
    </div>
    <table class="table table-light table-hover p-0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nisn</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $q3 = $conn->query("select * from siswa inner join kelas on siswa.id_kelas=kelas.id_kelas");
                $i = 1;
                while($d3= $q3->fetch_assoc()){
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?=$d3['nisn'] ?></td>
                <td><?=$d3['nis'] ?></td>
                <td><?=$d3['nama'] ?></td>
                <td><?=$d3['nama_kelas'].'-'.$d3['kompetensi_keahlian']?></td>
                <td><?=$d3['alamat'] ?></td>
                <td><?=$d3['no_telp'] ?></td>
                <td>
                    <div class="d-flex justify-content-center" style="justify-items: center;">
                        <button href="" class="btn btn-primary btn-sm mx-2" data-bs-toggle="modal" data-bs-target="#modal<?= $d3['nisn']?>" style="width:30px"><i class='bx bxs-edit'></i></button>
                            <form action="" method="post">
                                <input type="text" name="delete-nisn" value="<?= $d3['nisn']?>" hidden>
                                <button class="btn btn-danger btn-sm" style="width:30px" type="submit" name="delete-siswa"><i class='bx bx-trash'></i></button>
                            </form>
                        </div>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
            <?php
                $q3 = $conn->query("select * from siswa inner join kelas on siswa.id_kelas=kelas.id_kelas inner join spp on siswa.id_spp=spp.id_spp");
                $i = 1;
                while($d3= $q3->fetch_assoc()){
            ?>
        <div class="modal P-0" id="modal<?= $d3['nisn']?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-backdrop="">
            <div class="modal-dialog">
                <div class="modal-content" style="width:1">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nisn</label>
                                <input type="text" class="form-control" value="<?= $d3['nisn']?>" name="nisn">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nis</label>
                                <input type="text" class="form-control" value="<?= $d3['nisn']?>" name="nis">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama</label>
                                <input type="text" class="form-control" value="<?= $d3['nama']?>" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama</label>
                                <select name="kelas" id="">
                                    <option value="<?= $d3['id_kelas'] ?>" selected><?= $d3['nama_kelas'].'-'.$d3['kompetensi_keahlian']  ?></option>
                                <?php 
                                    $q1 = $conn->query("select * from kelas");
                                    while(($d1 = $q1->fetch_assoc()) ){
                                ?>
                                    <option value="<?= $d1['id_kelas'] ?>"><?= $d1['nama_kelas'].'-'.$d1['kompetensi_keahlian'] ?> </option>
                                <?php };?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama</label>
                                <select name="spp" id="">
                                    <option value="<?= $d3['id_spp'] ?>" selected><?= $d3['tahun'] ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat</label>
                                <textarea class="form-control" rows="5" name="alamat"><?= $d3['alamat']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">No Telp</label>
                                <input type="text" class="form-control" value="<?= $d3['no_telp']?>" name="no_telp">
                            </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit-siswa">Edit Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php }?>
<script>
// Get the modal
var modal = document.getElementById('add-data-siswa');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

