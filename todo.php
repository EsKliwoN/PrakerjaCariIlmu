<?php
$todos = [];

if (file_exists("todo.txt")) {
    $file = file_get_contents("todo.txt");
    $todos = unserialize($file);
}

if (isset($_POST['todo'])) {
    $data = $_POST['todo'];
    $todos[] = [
        "todo" => $data,
        "status" => 0
    ];
    $daftar_belanja = serialize($todos);
    file_put_contents("todo.txt", $daftar_belanja);
    header("location:todo.php");
}

if (isset($_GET['status'])) {
    $todos[$_GET['key']]['status'] = $_GET['status'];
    $daftar_belanja = serialize($todos);
    file_put_contents("todo.txt", $daftar_belanja);
    header("location:todo.php");
}

if (isset($_GET['id'])) {
    unset($todos[$_GET['id']]);
    $daftar_belanja = serialize($todos);
    file_put_contents("todo.txt", $daftar_belanja);
    header("location:todo.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; /* Membuat konten berada di tengah horizontal */
            align-items: center; /* Membuat konten berada di tengah vertikal */
            height: 100vh; /* Mengisi seluruh ketinggian viewport */
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr; /* Membagi tampilan menjadi dua kolom */
            gap: 20px; /* Jarak antara kolom */
            max-width: 800px; /* Lebar maksimum kontainer */
            padding: 20px;
        }

        h2 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            grid-column: span 2; /* Menyatukan header di atas kedua kolom */
        }

        .todo-form {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            grid-column: span 1; /* Kolom kiri */
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 10px 0;
            display: flex;
            align-items: center;
        }

        label {
            font-size: 18px;
            flex-grow: 1;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        a {
            color: red;
            text-decoration: none;
            margin-left: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .custom-pre {
            text-align: left;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            overflow: auto;
            grid-column: span 1; /* Kolom kanan */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>ToDo App</h2>
        <div class="todo-form">
            <form action="" method="POST">
                <label for="todo">Daftar Belanja Hari Ini:</label><br>
                <input type="text" name="todo" id="todo" size="30">
                <button type="submit">Simpan</button>
            </form>
            <ul>
                <?php foreach ($todos as $key => $value): ?>
                <li>
                    <input type="checkbox" name="todo" onclick="window.location.href='todo.php?status=<?php echo ($value['status'] == 1) ? '0' : '1'; ?>&key=<?php echo $key; ?>'"
                    <?php echo ($value['status'] == 1) ? "checked" : ""; ?>>
                    <label><?php
                    if ($value['status'] == 1) {
                        echo "<del>" . $value['todo'] . "</del>";
                    } else {
                        echo $value['todo'];
                    }
                    ?></label>
                    <a href="javascript:konfirmasiHapus('todo.php?id=<?php echo $key; ?>','<?php echo $value['todo']; ?>')">Hapus</a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="custom-pre">
            <?php 
            echo "<pre>";
            print_r($todos);
            echo "<pre>";
            ?>
        </div>
    </div>
    <script>
        function konfirmasiHapus(urlHapus, data){
            if (confirm("Apakah Anda yakin untuk menghapus data " + data + "?")) {
                window.location = urlHapus;
            }
        }
    </script>
</body>
</html>
