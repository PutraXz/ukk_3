<?php
    if(isset($_POST['Search'])){
        @$search = $_POST['search'];
        $query_search = $conn->query("SELECT * FROM `pembayaran` INNER join siswa on pembayaran.nisn=siswa.nisn INNER JOIN spp on pembayaran.id_spp=spp.id_spp where pembayaran.nisn like '%$search%'");
        $data = $query_search->fetch_assoc();
        if($data){
            echo "
            <script>
            window.onload = function(){
                document.getElementById('btn-search').click();
            }
            </script>
            ";
        }else{
           echo "
           <script language = javascript>
                swal({
                    title: 'Gagal',
                    text: 'Masukkan Data Valid',
                    icon: 'danger',
                    button: true,
                });
            </script>
           ";
        }
    }
?>

<div class="container-fluid home">
    <div class="row">
        <div class="col-md-4 mt-5 ms-5">
            <div class="search-box">
                <h4 class="mb-4 text-white text-center">History Pembayaran</h4>
                <form action="" method="post">
                    <div class="input-group">
                        <input class="form-control py-2 rounded-pill  pe-5" type="search" name="search" id="example-search-input">
                        <span class="input-group-append">
                            <button class="btn rounded-pill border-0" type="submit" name="Search" style="margin-left: -45px; font-size: 24px">
                            <i class='bx bx-search'></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7 mt-5 mx-4">
            <div class="introduction ms-5">
                <h4 class="text-white">Tujuan Dan Manfaat </h4>
            </div>
        </div>
    </div>
</div>
<button class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modal-search" id="btn-search"></button>
<div class="modal" id="modal-search" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Search Data Spp</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-light table-hover p-0">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Tanggal Bayar</th>
                                <th>Bulan Dibayar</th>
                                <th>Tahun Dibayar</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?=$data['nama'] ?></td>
                                <td><?=$data['tgl_bayar'] ?></td>
                                <td><?=$data['bulan_dibayar'] ?></td>
                                <td><?=$data['tahun_dibayar'] ?></td>
                                <td><?=$data['nominal'] ?></td>
                            </tr>
                        </tbody>
                </table>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>