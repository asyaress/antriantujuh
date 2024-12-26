<?php

include '../koneksi.php';
//registrasi

function registrasi($data) {
    global $conn;

    // Ambil data dari form
    $nama_karyawan = htmlspecialchars($data["nama_karyawan"]);
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek apakah username sudah terdaftar
    $result = mysqli_query($conn, "SELECT username FROM tb_karyawan WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
        return false;
    }

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan data baru ke database
    $query = "INSERT INTO tb_karyawan (nama_karyawan, username, password) 
              VALUES ('$nama_karyawan', '$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_karyawan WHERE id_karyawan  = $id");
    return mysqli_affected_rows($conn);
    }
?>