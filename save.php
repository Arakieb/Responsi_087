<?php
session_start();

if (!isset($_SESSION['log'])) {
    $_SESSION['log'] = [];
}
if (isset($_POST['time'])) {
    $_SESSION['log'][] = $_POST['time'];
}
if (isset($_POST['reset'])) {
    $_SESSION['log'] = []; 
}

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
    <?php foreach ($_SESSION['log'] as $waktu): ?>
      <li><?= htmlspecialchars($waktu) ?></li>
    <?php endforeach; ?>
  </ul>

  <form method="post">
      <button type="submit" name="reset" class="btn">Hapus Semua Log</button>
</form>

<a href="index.html" class="btn">Kembali</a>
</body>
</html>
