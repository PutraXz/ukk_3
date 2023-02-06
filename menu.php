<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <?php
         @$username = $_SESSION['username'];
         @$level = $_SESSION['level'];
         if(@$level == 'admin'){
         ?>
        <a class="nav-link" href="?data=data-siswa">Data Siswa</a>
        <a class="nav-link" href="?data=data-petugas"">Data Petugas</a>
        <a class="nav-link" href="?data=data-spp"">Data Spp</a>
        <a class="nav-link" href="#">Transaksi</a>
        <?php }?>
        <?php
        if(@$level == 'admin' || @$level == 'petugas'){
        ?>
        <a class="nav-link" href="#">History Pembayaran</a>
        <?php } ?>
    </div>
    <?php
        if(!isset($username)){
    ?>
    <div class="navbar-nav ms-auto mb-2 mb-lg-0">
        <a href="#" class="nav-link" onclick="document.getElementById('id01').style.display='block'">Login</a>
    </div>
    <?php }else {
        ?>
    <div class="navbar-nav ms-auto mb-2 mb-lg-0">
        <a href="logout.php" class="nav-link" >Logout</a>
    </div>
    <?php } ?>
</div>