<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penyalaan AC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #666;
        }
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            text-align: center;
            margin-top: 20px;
        }
        .result p {
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sistem Penyalaan AC</h2>
        <form method="post">
            <label for="suhu">Suhu (°C):</label>
            <input type="number" id="suhu" name="suhu" required>
            <label for="kelembaban">Kelembaban (%):</label>
            <input type="number" id="kelembaban" name="kelembaban" required>
            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $suhu = $_POST['suhu'];
            $kelembaban = $_POST['kelembaban'];
            $status = "AC Mati";

            if ($suhu >= 30 || ($suhu >= 25 && $kelembaban > 70)) {
                $status = "AC Menyala Berat";
            } elseif (($suhu >= 25 && $suhu < 30) || ($suhu >= 20 && $kelembaban > 70)) {
                $status = "AC Menyala Sedang";
            } elseif (($suhu >= 20 && $suhu < 25) || ($suhu >= 15 && $kelembaban > 50)) {
                $status = "AC Menyala Rendah";
            }

            echo "<div class='result'>";
            echo "<h3>Hasil:</h3>";
            echo "<p>Suhu: $suhu °C</p>";
            echo "<p>Kelembaban: $kelembaban %</p>";
            echo "<p>Status AC: $status</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
