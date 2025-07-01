<?php
session_start();

// Lokasi file JSON
$file = 'user_data.json';
if (!file_exists($file)) {
    file_put_contents($file, json_encode(['username' => 'usm', 'password' => '123']));
}

$user = json_decode(file_get_contents($file), true);
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = trim($_POST['username']);
    $new_password = trim($_POST['password']);

    if (!empty($new_username) && !empty($new_password)) {
        $user['username'] = $new_username;
        $user['password'] = $new_password;
        file_put_contents($file, json_encode($user));
        $message = "✅ Username dan password berhasil diperbarui!";
    } else {
        $message = "⚠ Username dan password tidak boleh kosong.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            Ubah Username & Password
        </div>
        <div class="card-body">
            <?php if ($message): ?>
                <div class="alert alert-info"><?= $message ?></div>
            <?php endif; ?>
            <form method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username Baru</label>
                    <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Baru</label>
                    <input type="text" class="form-control" name="password" value="<?= htmlspecialchars($user['password']) ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="dashboardBoostrap.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>