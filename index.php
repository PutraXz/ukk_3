<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!-- sweet alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- box icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- style -->
    <link rel="stylesheet" href="style.css">
    <!-- end style -->
</head>
<body>
    <?php include 'login.php';?>
    <nav class="navbar navbar-expand-lg bg-light" style="box-shadow: 0px 5px 20px -17px rgb(0 0 0 / 94%);">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <?php include 'menu.php'; ?>
        </div>
    </nav>
    <?php
    @$level = $_SESSION['level'];
        if($level == 'admin'){
            if(isset($_GET['data'])){
                $data = $_GET['data'];
                switch($data){
                    case 'data-siswa':
                        include 'data_siswa.php';
                    break;
                    case 'data-petugas';
                        include 'data_petugas.php';
                    break;
                };
            }else{
                include 'admin.php';
            }
        }elseif($level == 'petugas'){
            include 'petugas.php';
        }else{
            include 'home.php';
        }
    ?>
</body>
</html>