<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Luas Bangun Datar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            background-color: #3498db;
            color: #ffffff;
            padding: 20px;
        }

        form {
            margin: 20px;
        }

        label {
            font-weight: bold;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 3px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        button {
            padding: 10px 20px;
            font-size: 18px;
            background-color: #3498db;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #2980b9;
        }

        .result {
            font-size: 18px;
            margin: 20px;
        }
    </style>
</head>
<body>
    <h1>Kalkulator Luas Bangun Datar</h1>
    <form method="post" action="">

        <table>
            <tr>
                <th>Pilih Jenis Bangun Datar</th>
                <th>Keterangan Rumus Luas</th>
                <th>Input Nilai 1</th>
                <th>Input Nilai 2</th>
                <th>Input Nilai 3</th>
            </tr>
            <tr>
                <td><input type="radio" name="jenis_bangun" value="persegi" required> Persegi</td>
                <td>Luas = sisi x sisi</td>
                <td style="text-align: center;">sisi</td>
                <td style="text-align: center;">-</td>
                <td style="text-align: center;">-</td>
            </tr>
            <tr>
                <td><input type="radio" name="jenis_bangun" value="persegi_panjang"> Persegi Panjang</td>
                <td>Luas = panjang x lebar</td>
                <td style="text-align: center;">panjang</td>
                <td style="text-align: center;">lebar</td>
                <td style="text-align: center;">-</td>
            </tr>
            <tr>
                <td><input type="radio" name="jenis_bangun" value="lingkaran"> Lingkaran</td>
                <td>Luas = π x r x r</td>
                <td style="text-align: center;">r</td>
                <td style="text-align: center;">-</td>
                <td style="text-align: center;">-</td>
            </tr>
            <tr>
                <td><input type="radio" name="jenis_bangun" value="segitiga"> Segitiga</td>
                <td>Luas = 0.5 x alas x tinggi</td>
                <td style="text-align: center;">alas</td>
                <td style="text-align: center;">tinggi</td>
                <td style="text-align: center;">-</td>
            </tr>
            <tr>
                <td><input type="radio" name="jenis_bangun" value="jajar_genjang"> Jajar Genjang</td>
                <td>Luas = alas x tinggi</td>
                <td style="text-align: center;">alas</td>
                <td style="text-align: center;">tinggi</td>
                <td style="text-align: center;">-</td>
            </tr>
            <tr>
                <td><input type="radio" name="jenis_bangun" value="belah_ketupat"> Belah Ketupat</td>
                <td>Luas = 0.5 x d1 x d2</td>
                <td style="text-align: center;">d1</td>
                <td style="text-align: center;">d2</td>
                <td style="text-align: center;">-</td>
            </tr>
            <tr>
                <td><input type="radio" name="jenis_bangun" value="trapesium"> Trapesium</td>
                <td>Luas = 0.5 x (a + b) x tinggi</td>
                <td style="text-align: center;">a</td>
                <td style="text-align: center;">b</td>
                <td style="text-align: center;">tinggi</td>
            </tr>
        </table>

        <label>Masukkan Nilai 1:</label>
        <input type="number" name="nilai1" required min="1"><br><br>

        <label>Masukkan Nilai 2:</label>
        <input type="number" name="nilai2" min="1"><br><br>

        <label>Masukkan Nilai 3:</label>
        <input type="number" name="nilai3" min="1"><br><br>
        
        <button type="submit" name="hitung">Hitung</button>
    </form>
    
    <div class="result">
        <?php
        if (isset($_POST['hitung'])) {
            $jenis_bangun = $_POST['jenis_bangun'];
            $nilai1 = $_POST['nilai1'];
            $nilai2 = $_POST['nilai2'];
            $nilai3 = $_POST['nilai3'];
            $luas = 0;

            switch ($jenis_bangun) {
                case 'persegi':
                    $luas = $nilai1 * $nilai1;
                    echo "Luas Persegi: " . $luas;
                    break;
                case 'persegi_panjang':
                    $luas = $nilai1 * $nilai2;
                    echo "Luas Persegi Panjang: " . $luas;
                    break;
                case 'lingkaran':
                    $luas = 3.14 * ($nilai1 * $nilai1);
                    echo "Luas Lingkaran: " . $luas;
                    break;
                case 'segitiga':
                    $luas = 0.5 * $nilai1 * $nilai2;
                    echo "Luas Segitiga: " . $luas;
                    break;
                case 'jajar_genjang':
                    $luas = $nilai1 * $nilai2;
                    echo "Luas Jajar Genjang: " . $luas;
                    break;
                case 'belah_ketupat':
                    $luas = 0.5 * ($nilai1 * $nilai2);
                    echo "Luas Belah Ketupat: " . $luas;
                    break;
                case 'trapesium':
                    $luas = 0.5 * ($nilai1 + $nilai2) * $nilai3;
                    echo "Luas Trapesium: " . $luas;
                    break;
                default:
                    echo "Pilih jenis bangun datar yang valid.";
                    break;
            }
        }
        ?>
    </div>
    <script>
    // Fungsi ini akan dipanggil setiap kali ada perubahan pada radio button
    function enableInputs() {
        const jenisBangun = document.querySelector('input[name="jenis_bangun"]:checked');
        const nilai2Input = document.getElementsByName('nilai2')[0]; // Dapatkan elemen input nilai2
        const nilai3Input = document.getElementsByName('nilai3')[0]; // Dapatkan elemen input nilai3

        // Cek jika jenis bangun yang dipilih bukan persegi atau lingkaran
        if (jenisBangun && jenisBangun.value !== 'persegi' && jenisBangun.value !== 'lingkaran') {
            nilai2Input.required = true; // Buat input nilai2 wajib diisi
        } else {
            nilai2Input.required = false; // Nonaktifkan kewajiban input nilai2 jika memilih persegi atau lingkaran
        }

        // Cek jika jenis bangun yang dipilih adalah trapesium
        if (jenisBangun && jenisBangun.value === 'trapesium') {
            nilai3Input.required = true; // Buat input nilai3 wajib diisi jika memilih trapesium
        } else {
            nilai3Input.required = false; // Nonaktifkan kewajiban input nilai3 jika tidak memilih trapesium
        }
    }

    // Panggil fungsi enableInputs() ketika ada perubahan pada radio button
    const radioButtons = document.querySelectorAll('input[name="jenis_bangun"]');
    radioButtons.forEach(function(radioButton) {
        radioButton.addEventListener('change', enableInputs);
    });

    // Panggil fungsi enableInputs() saat halaman dimuat
    enableInputs();
</script>
</body>
</html>
