<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h2>Welcome, <?= htmlspecialchars($data['username']) ?></h2>
    <p>Ini halaman dashboard setelah login berhasil.</p>

    <a href="<?= BASE_URL ?>/login/logout">Logout</a>
</body>

</html>