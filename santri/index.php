<?php
   session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <title>mysantri</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">My Santri Al-Amin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" href="index.php">Santri</a>
        <a class="nav-link" href="../syahriah/index.php">Syahriah</a>
        <a class="nav-link" href="../user/logout.php">Log out</a>
      </div>
      </div>
    </div>
  </div>
</nav>
</div>

<div class="container mt-3">
<h2><center>Data Santri</center></h2>

<a href="create.php" class="btn btn-primary mb-2 mt-1">Tambah</a>

<?php

   include "koneksi.php";
   if(isset($_GET['id_santri'])){
      $id_santri=htmlspecialchars($_GET["id_santri"]);
      $sql="delete from santri where id_santri='$id_santri'";
      $hasil=mysqli_query($kon,$sql);
      if ($hasil) {
         header("Location:index.php");

     }
     else {
         echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";

     }
    }


?>


<table class="table table-striped table-hover">
   <tr>
      <th>No</th>
      <th>Nis</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Kelas</th>
      <th>Action</th>
   </tr>
   <?php
        include "koneksi.php";
        $sql="select * from santri order by id_santri desc";

        $hasil=mysqli_query($kon,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;

   ?>
   <tbody>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data["nis"]; ?></td>
                <td><?php echo $data["nama"];   ?></td>
                <td><?php echo $data["alamat"];   ?></td>
                <td><?php echo $data["jenis_kelamin"];   ?></td>
                <td><?php echo $data["id_kelas"];   ?></td>
                <td>
                    <a href="edit.php?id_santri=<?php echo htmlspecialchars($data['id_santri']); ?>" class="btn btn-warning" role="button">Update</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_santri=<?php echo $data['id_santri']; ?>" class="btn btn-danger" role="button">Delete</a>
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
 