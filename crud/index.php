<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
    
        body {
            background-color: #ffffcc; /* Warna latar belakang kuning (#ffffcc) */
            font-family: 'Arial', sans-serif; 
        }

        .navbar {
            background-color: #ffee58; /* Warna latar belakang kuning untuk navbar (#ffee58) */
        }

        h4 {
            color: #65432 ; /* Warna font biru tua (#3f51b5) */
            font-family: 'Times New Roman', serif; 
        }

        table {
            background-color: #fff; /* Warna latar belakang putih untuk tabel (#fff) */
            font-family: 'Times New Roman', sans-serif; 
        }

        th, td {
            border: 1px solid #ddd; /* Garis tepi 1px solid abu-abu muda (#ddd) */
            padding: 8px;
            text-align: left;
        }

        .btn {
            background-color: #ffeb3b; /* Warna latar belakang kuning (#ffeb3b) */
            color: #333; /* Warna font hitam (#333) */
        }

    </style>
    <title>PDDikti</title>
</head>
<body>
</head>
<title>
PDDikti</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
            <span class="navbar-brand mb-0 h1">PDDikti</span>
        </div>
    </nav>
<div class="container">
    <br>
    <h4><center>Input Data Siswa</center></h4>
<?php

    include "koneksi.php";

    //Cek apakah ada kiriman form dari method post
    if (isset($_GET['id_peserta'])) {
        $id_peserta=htmlspecialchars($_GET["id_peserta"]);

        $sql="delete from peserta where id_peserta='$id_peserta' ";
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");

            }
            else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

            }
        }
?>


     <tr class="table-danger"> <!-- Membuat sebuah tabel dengan menggunakan kelas Bootstrap -->
            <br>
        <thead>
        <tr>
       <table class="my-3 table table-bordered"> <!-- Baris tabel yang berfungsi sebagai header tabel dengan latar belakang warna biru muda-->
            <tr class="table-primary">           
            <th>No</th> 
            <!-- Kolom-kolom header tabel yang menyajikan informasi, seperti Nomor, Nama, Sekolah, Jurusan, No Hp, Alamat, dan dua kolom untuk aksi (Update dan Delete).-->
            <th>Nama</th>
            <th>Sekolah</th>
            <th>Jurusan</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th colspan='2'>Aksi</th>

        </tr>
        </thead>

        <?php
        include "koneksi.php";
        $sql="select * from peserta order by id_peserta desc"; 
        // Membuat query SQL untuk mengambil semua data peserta dari tabel "peserta" dan mengurutkannya berdasarkan kolom "id_peserta" secara descending.

        $hasil=mysqli_query($kon,$sql); // Mengeksekusi query SQL menggunakan fungsi mysqli_query untuk mendapatkan hasil data
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) { // Melakukan loop selama masih ada data yang diambil dari hasil query
            $no++;

            ?>
            <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["sekolah"];   ?></td>
                <td><?php echo $data["jurusan"];   ?></td>
                <td><?php echo $data["no_hp"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>
            </tbody>
            <?php
        }
        ?>
    </table>
    <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
</div>
</body>
</html>
