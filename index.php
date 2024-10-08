<?php
// Encapsulation
class Produk {
    private $nama;
    private $harga;

    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getHarga() {
        return $this->harga;
    }
}

// Inheritance
class Cemilan extends Produk {
    private $jenis;

    public function __construct($nama, $harga, $jenis) {
        parent::__construct($nama, $harga);
        $this->jenis = $jenis;
    }

    public function getDetail() {
        return "Nama: " . $this->getNama() . ", Harga: Rp." . $this->getHarga() . ", Jenis: " . $this->jenis;
    }
}

// Polymorphism
class MakananPoli {
    public function deskripsi() {
        return "Ini adalah makanan.";
    }
}

class MinumanPoli {
    public function deskripsi() {
        return "Ini adalah minuman.";
    }
}

function tampilkanDeskripsi($item) {
    return $item->deskripsi() . "<br>";
}

// Abstraction (Abstract Class)
abstract class Hidangan {
    abstract public function caraMakan();
}

class Nasi extends Hidangan {
    public function caraMakan() {
        return "Nasi dimakan dengan sendok atau tangan.";
    }
}

class Jus extends Hidangan {
    public function caraMakan() {
        return "Jus diminum dengan gelas.";
    }
}

// Membuat objek untuk demonstrasi
$makananPoli = new MakananPoli();
$minumanPoli = new MinumanPoli();

$cemilan = new Cemilan("Keripik", 10000, "Snack");

$nasi = new Nasi();
$jus = new Jus();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Pemrograman Internet</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 80%;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 18px; 
        }
        th, td {
            border: 1px solid black;
            padding: 15px; 
            text-align: center; 
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Tugas Pemrograman Internet</h1> 
    <table>
        <tr>
            <th>Menggunakan Objek</th>
            <td>
                Makanan: Ini adalah objek makanan.<br>
                Minuman: Ini adalah objek minuman.
            </td>
        </tr>
        <tr>
            <th>Menggunakan Encapsulation</th>
            <td>
                Nama Produk: <?php echo $cemilan->getNama(); ?><br>
                Harga Produk: Rp.<?php echo $cemilan->getHarga(); ?>
            </td>
        </tr>
        <tr>
            <th>Menggunakan Inheritance</th>
            <td><?php echo $cemilan->getDetail(); ?></td>
        </tr>
        <tr>
            <th>Menggunakan Polimorfisme</th>
            <td>
                <?php echo tampilkanDeskripsi($makananPoli); ?>
                <?php echo tampilkanDeskripsi($minumanPoli); ?>
            </td>
        </tr>
        <tr>
            <th>Menggunakan Abstraction</th>
            <td>
                Cara makan Nasi: <?php echo $nasi->caraMakan(); ?><br>
                Cara minum Jus: <?php echo $jus->caraMakan(); ?>
            </td>
        </tr>
        <tr>
            <th>Menggunakan Access Modifier</th>
            <td>
                Nama Produk (Private): <?php echo $cemilan->getNama(); ?><br>
                Harga Produk (Private): Rp.<?php echo $cemilan->getHarga(); ?>
            </td>
        </tr>
        <tr>
            <th>Menggunakan Include</th>
            <td>
                <?php
                // Include the external files
                include 'Makanan.php';
                include 'Minuman.php';

                // Membuat objek dari file yang di-include
                $makananInclude = new Makanan();
                $minumanInclude = new Minuman();
                ?>
                Makanan: <?php echo $makananInclude->deskripsi(); ?><br>
                Minuman: <?php echo $minumanInclude->deskripsi(); ?>
            </td>
        </tr>
    </table>
</body>
</html>
