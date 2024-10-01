<?php
$siswa = [
    ["nama" => "Andi", "matematika" => 85, "bahasa_inggris" => 70, "ipa" => 80],
    ["nama" => "Budi", "matematika" => 60, "bahasa_inggris" => 50, "ipa" => 65],
    ["nama" => "Cici", "matematika" => 75, "bahasa_inggris" => 80, "ipa" => 70],
    ["nama" => "Dodi", "matematika" => 95, "bahasa_inggris" => 85, "ipa" => 90],
    ["nama" => "Eka", "matematika" => 50, "bahasa_inggris" => 60, "ipa" => 55],
];

$lulus = 0;
$tidak_lulus = 0;

echo "<h3>Daftar Siswa:</h3>";
echo "<table border='1'>";
echo "<tr><th>Nama</th><th>Rata-rata</th><th>Status</th><th>Mata Pelajaran yang Harus Diperbaiki</th></tr>";

foreach ($siswa as $data) {
    $rata_rata = ($data["matematika"] + $data["bahasa_inggris"] + $data["ipa"]) / 3;

    $status = $rata_rata >= 75 ? "Lulus" : "Tidak Lulus";
    
    $pelajaran_perlu_diperbaiki = "";
    if ($status == "Tidak Lulus") {
        $tidak_lulus++;
        $nilai_terendah = min($data["matematika"], $data["bahasa_inggris"], $data["ipa"]);
        if ($nilai_terendah == $data["matematika"]) {
            $pelajaran_perlu_diperbaiki = "Matematika";
        } elseif ($nilai_terendah == $data["bahasa_inggris"]) {
            $pelajaran_perlu_diperbaiki = "Bahasa Inggris";
        } else {
            $pelajaran_perlu_diperbaiki = "IPA";
        }
    } else {
        $lulus++;
    }

    echo "<tr>";
    echo "<td>" . $data["nama"] . "</td>";
    echo "<td>" . round($rata_rata, 2) . "</td>";
    echo "<td>" . $status . "</td>";
    echo "<td>" . $pelajaran_perlu_diperbaiki . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<p>Total Siswa yang Lulus: $lulus</p>";
echo "<p>Total Siswa yang Tidak Lulus: $tidak_lulus</p>";
?>
