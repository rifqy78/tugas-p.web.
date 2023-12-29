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
<h2><center>Edit Data Santri</center></h2>

<?php

   include "koneksi.php";
   function input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nis=input($_POST["nis"]);
      $nama=input($_POST["nama"]);
      $alamat=input($_POST["alamat"]);
      $jenis_kelamin=input($_POST["jenis_kelamin"]);
      $id_kelas=input($_POST["id_kelas"]);

      $sql = "INSERT INTO santri (nis, nama, alamat, jenis_kelamin,id_kelas) VALUES ('$nis', '$nama', '$alamat', '$jenis_kelamin', '$id_kelas')";

      $hasil=mysqli_query($kon,$sql);
     
      if ($hasil) {
        header("Location:index.php");
    }
    else {
        echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

    }

}
 ?>
 <h2>Input Data</h2>

 <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
     <div class="form-group">
         <label>Nis:</label>
         <input type="text" name="nis" class="form-control" placeholder="Masukan nis" required />
     </div>
     <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
     <div class="form-group">
         <label>Alamat:</label>
         <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat" required/>
     </div>
     <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" class="form-control">
                <option selected disabled>-- Pilih --</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
      </div>
      <div class="form-group">
            <label for="id_kelas">Kelas:</label>
            <select name="id_kelas" class="form-control">
                <option selected disabled>-- Pilih --</option>
                <option value="I Awwaliyyah">I Awwaliyyah</option>
                <option value="II Awwaliyyah">II Awwaliyyah</option>
                <option value="III Awwaliyyah">III Awwaliyyah</option>
                <option value="IV Awwaliyyah">IV Awwaliyyah</option>
                <option value="V Awwaliyyah">V Awwaliyyah</option>
                <option value="VI Awwaliyyah">VI Awwaliyyah</option>
                <option value="I Wustha">I Wustha</option>
                <option value="II Wustha">II Wustha</option>
                <option value="III Wustha">III Wustha</option>
            </select>
      </div>
     <button type="submit" name="submit" class="btn btn-primary">Submit</button>
     <a href="index.php" class="btn btn-danger ">Kembali</a>
 </form>
</div>
</body>
</html>