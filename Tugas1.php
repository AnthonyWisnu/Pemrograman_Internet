<?php
$data_mahasiswa = array();

function hitungNilaiHuruf($nilai) {
    if ($nilai >= 85) {
        return "A";
    } elseif ($nilai >= 80) {
        return "B+";
    } elseif ($nilai >= 70) {
        return "B";
    } elseif ($nilai >= 65) {
        return "C+";
    } elseif ($nilai >= 60) {
        return "C";
    } elseif ($nilai >= 50) {
        return "D";
    } else {
        return "E";
    }
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $nilai_angka = $_POST['nilai'];

    $nilai_huruf = hitungNilaiHuruf($nilai_angka);

    $data_mahasiswa[] = array(
        'nama' => $nama,
        'nim' => $nim,
        'nilai_angka' => $nilai_angka,
        'nilai_huruf' => $nilai_huruf
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Nilai Mahasiswa</title>
</head>
<body>
    <h2>Input Nilai Pemrograman Internet</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required><br><br>

        <label for="nilai">Nilai (0-100):</label><br>
        <input type="number" id="nilai" name="nilai" min="0" max="100" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php if (isset($_POST['submit'])): ?>
        <h3>Hasil Input:</h3>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
            </tr>
            <?php foreach ($data_mahasiswa as $mahasiswa): ?>
            <tr>
                <td><?php echo $mahasiswa['nama']; ?></td>
                <td><?php echo $mahasiswa['nim']; ?></td>
                <td><?php echo $mahasiswa['nilai_angka']; ?></td>
                <td><?php echo $mahasiswa['nilai_huruf']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>
</html>
