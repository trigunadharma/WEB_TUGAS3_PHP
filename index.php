<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grade Mahasiswa</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #333;
        color: #fff;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    tfoot {
        font-weight: bold;
    }
</style>
</head>
<body>
<h2 style="text-align: center;">Daftar Nilai Mahasiswa</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Nilai</th>
            <th>Keterangan</th>
            <th>Grade</th>
            <th>Predikat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Data mahasiswa
        $mahasiswa = array(
            array("101", "Muhammad Hafis Gunawan", 75),
            array("102", "Ilham", 85),
            array("103", "Fauzi Sakti", 60),
            array("104", "Gali", 95),
            array("105", "Habibah", 40),
            array("106", "Dea", 78),
            array("107", "Sarah", 68),
            array("108", "David ", 55),
            array("109", "Taylor", 90),
            array("110", "William Iskandar", 72)
        );

        // Fungsi untuk mendapatkan grade
        function getGrade($nilai) {
            return ($nilai >= 65) ? 'A' : 'E';
        }

        // Fungsi untuk mendapatkan predikat
        function getPredikat($grade) {
            switch ($grade) {
                case 'A':
                    return 'Memuaskan';
                    break;
                case 'B':
                    return 'Bagus';
                    break;
                case 'C':
                    return 'Cukup';
                    break;
                case 'D':
                    return 'Kurang';
                    break;
                default:
                    return 'Buruk';
            }
        }

        // Variabel untuk menyimpan nilai tertinggi, terendah, dan jumlah keseluruhan nilai
        $nilaiTertinggi = $mahasiswa[0][2];
        $nilaiTerendah = $mahasiswa[0][2];
        $jumlahNilai = 0;

        // Menampilkan data mahasiswa
        foreach ($mahasiswa as $key => $data) {
            echo "<tr>";
            echo "<td>".($key+1)."</td>";
            echo "<td>".$data[1]."</td>";
            echo "<td>".$data[0]."</td>";
            echo "<td>".$data[2]."</td>";
            $grade = getGrade($data[2]);
            echo "<td>".(($grade == 'A') ? 'Lulus' : 'Tidak Lulus')."</td>";
            echo "<td>".$grade."</td>";
            echo "<td>".getPredikat($grade)."</td>";
            echo "</tr>";

            // Update nilai tertinggi dan terendah
            $nilaiTertinggi = max($nilaiTertinggi, $data[2]);
            $nilaiTerendah = min($nilaiTerendah, $data[2]);
            $jumlahNilai += $data[2];
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total Mahasiswa</td>
            <td colspan="4"><?php echo count($mahasiswa); ?></td>
        </tr>
        <tr>
            <td colspan="3">Nilai Tertinggi</td>
            <td colspan="4"><?php echo $nilaiTertinggi; ?></td>
        </tr>
        <tr>
            <td colspan="3">Nilai Terendah</td>
            <td colspan="4"><?php echo $nilaiTerendah; ?></td>
        </tr>
        <tr>
            <td colspan="3">Nilai Rata-rata</td>
            <td colspan="4"><?php echo round($jumlahNilai / count($mahasiswa), 1); ?></td>
        </tr>
        <tr>
            <td colspan="3">Jumlah Keseluruhan Nilai</td>
            <td colspan="4"><?php echo $jumlahNilai; ?></td>
        </tr>
    </tfoot>
</table>

</body>
</html>
