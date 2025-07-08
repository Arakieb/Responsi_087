<?php
$filename = 'data.txt';

// Tambah waktu ke file jika ada input waktu
if (isset($_POST['time'])) {
    $time = trim($_POST['time']);
    if ($time !== '') {
        file_put_contents($filename, $time . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

// Hapus semua isi file jika tombol reset ditekan
if (isset($_POST['reset'])) {
    file_put_contents($filename, ''); // Kosongkan file
}

// Baca data dari file
$log = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Log Timer</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      padding: 20px;
    }
    h2 {
      color: #333;
    }
    ul {
      padding-left: 20px;
    }
    li {
      margin: 5px 0;
    }
    .btn {
      display: inline-block;
      margin-top: 10px;
      padding: 6px 12px;
      background-color: #5f6061;
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      text-align: center;
    }
  </style>
</head>
<body>
  <h2>Log Waktu Timer</h2>
  <ul>
    <?php foreach ($log as $waktu): ?>
      <li><?= htmlspecialchars($waktu) ?></li>
    <?php endforeach; ?>
  </ul>

  <form method="post">
    <button type="submit" name="reset" class="btn">Hapus Semua Log</button>
  </form>

  <a href="index.html" class="btn">Kembali</a>
</body>
</html>
