<?php
session_start();

// Ambil data dari user_data.json
$user_file = 'user_data.json';
$user_data = json_decode(file_get_contents($user_file), true);
$stored_username = $user_data['username'];
$stored_password = $user_data['password'];

// Variabel error kosong default
$username_error = $password_error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_username = $_POST['username'] ?? '';
    $input_password = $_POST['password'] ?? '';

    if ($input_username !== $stored_username) {
        $username_error = "Username salah.";
    } elseif ($input_password !== $stored_password) {
        $password_error = "Password salah.";
    } else {
        $_SESSION['username'] = $input_username;
        header("Location: dashboardBoostrap.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - USM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-signin {
            max-width: 400px;
            padding: 2rem;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

    <main class="form-signin border border-3 border-primary rounded-4 bg-white shadow-sm">
        <form method="POST">
            <div class="text-center">
                <img class="mb-2" src="https://usm.ac.id/wp-content/uploads/2022/09/Logo-USM-Color.png" width="100">
                <h1 class="h4 mb-3 fw-bold">USM</h1>
                <h2 class="h5 mb-3 fw-normal">Please sign in</h2>
            </div>

            <!-- Menampilkan error sesuai jenis -->
            <?php if (!empty($username_error)) : ?>
                <div class="alert alert-danger text-center py-1"><?= $username_error ?></div>
            <?php elseif (!empty($password_error)) : ?>
                <div class="alert alert-danger text-center py-1"><?= $password_error ?></div>
            <?php endif; ?>

            <div class="form-floating mb-2">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
                <label>Username</label>
            </div>

            <div class="form-floating mb-2">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <label>Password</label>
            </div>

            <div class="form-check text-start my-2">
                <input class="form-check-input" type="checkbox" id="checkDefault">
                <label class="form-check-label" for="checkDefault">Remember me</label>
            </div>

            <button class="btn btn-primary w-100 py-2 mb-2" type="submit">Sign in</button>
            <a href="loginboostrap.php" class="btn btn-outline-secondary w-100">Sign up</a>
            <p class="mt-4 mb-2 text-center text-body-secondary">&copy; 2017–2025</p>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>