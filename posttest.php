<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Test 1</title>
</head>
<body>

<?php
    // Fungsi untuk melakukan koneksi ke database
    function connectDB() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "practice";

        $conn = new mysqli($servername, $username, $password);

        // Cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        echo "Koneksi sukses.<br>";

        // Pilih database
        $conn->select_db($dbname);

        return $conn;
    }

    // Fungsi untuk membuat database
    function createDatabase($conn) {
        $dbname = "practice";

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($sql) === TRUE) {
            echo "Database berhasil dibuat atau sudah ada.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Fungsi untuk membuat tabel
    function createTable($conn) {
        $sql = "CREATE TABLE IF NOT EXISTS mahasiswa (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nama VARCHAR(50) NOT NULL,
            nim VARCHAR(9) NOT NULL
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Tabel mahasiswa berhasil dibuat atau sudah ada.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Fungsi untuk menyisipkan data ke tabel
    function insertData($conn) {
        $sql = "INSERT INTO mahasiswa (nama, nim) VALUES
            ('Berliani Risqi', '22090124'),
            ('Nurzilah Hidayati', '22090155')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan ke tabel.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Fungsi untuk memperbarui data di tabel
    function updateData($conn) {
        $sql = "UPDATE mahasiswa SET nama='Updated Berliani Risqi' WHERE nim='22090124'";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil diperbarui.<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Hubungkan ke database
    $connection = connectDB();

    // Buat tabel
    createTable($connection);

    // Sisipkan data ke tabel
    insertData($connection);

    // Perbarui data di tabel
    updateData($connection);

    // Tutup koneksi database
    $connection->close();
?>

</body>
</html>
