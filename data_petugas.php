<?php
    @$username = $_POST['username'];
    @$password = $_POST['password'];
    @$name = $_POST['nama_petugas'];
    @$level = $_POST['level'];
    @$id = $_POST['id'];
    if(isset($_POST['tambah_petugas'])){
        $query = $conn->query("insert into petugas set username='$username', password='$password', nama_petugas='$name', level='$level'");
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
    if(isset($_POST['edit-petugas'])){
        $query_edit = $conn->query("update petugas set username='$username', nama_petugas='$name', level='$level' where id_petugas='$id'");
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
    if(isset($_POST['delete-petugas'])){

        $query_del = $conn->query("delete from petugas where id_petugas='$id'");
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
        <a href="#" class="btn btn-light" onclick="document.getElementById('add-data-siswa').style.display='block'">Add Data Petugas</a>
    </div>
    <div class="modal" id="add-data-siswa">
    <form class="modal-content animate" action="" method="post">
        <div class="container-fluid">
            <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Masukkan Username Petugas" name="username" required class="">
            <label for="password"><b>Password</b></label>
                <input type="password"  name="password" required>
            <label for="level" class="mt-2"><b>Kelas</b></label>
                <br><select class="form-select" id="" name="level">
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            <button type="submit" style="padding:11px 20px" name="tambah_petugas">Tambah</button>
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
                <th>Username</th>
                <th>Nama Petugas</th>
                <th>Level</th>
                <th style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $q3 = $conn->query("select * from petugas");
                $i = 1;
                while($d3= $q3->fetch_assoc()){
            ?>
            <tr>
                <td><?= $i++?></td>
                <td><?=$d3['username'] ?></td>
                <td><?=$d3['nama_petugas'] ?></td>
                <td><?=$d3['level'] ?></td>
                <td>
                    <div class="d-flex justify-content-center" style="justify-items: center;">
                        <button href="" class="btn btn-primary btn-sm mx-2" data-bs-toggle="modal" data-bs-target="#modal<?= $d3['username']?>" style="width:30px"><i class='bx bxs-edit'></i></button>
                            <form action="" method="post">
                                <input type="text" name="id" value="<?= $d3['id_petugas']?>" hidden>
                                <button class="btn btn-danger btn-sm" style="width:30px" type="submit" name="delete-petugas"><i class='bx bx-trash'></i></button>
                            </form>
                        </div>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
            <?php
                $q3 = $conn->query("select * from petugas");
                $i = 1;
                while($d3= $q3->fetch_assoc()){
            ?>
        <div class="modal P-0" id="modal<?= $d3['username']?>" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-backdrop="">
            <div class="modal-dialog">
                <div class="modal-content" style="width:1">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Username</label>
                                <input type="text" class="form-control" value="<?= $d3['username']?>" name="username">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Petugas</label>
                                <input type="text" class="form-control" value="<?= $d3['nama_petugas']?>" name="nama_petugas">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Level</label>
                                <select name="level" id="">
                                    <option value="<?= $d3['level'] ?>" selected><?= $d3['level'] ?></option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="text" name="id" value="<?= $d3['id_petugas']?>" hidden>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit-petugas">Edit Data</button>
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

