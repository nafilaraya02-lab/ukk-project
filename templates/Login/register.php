<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi</title>
</head>
<body>
    <div class="subcontainer">
        <h2>Form Register</h2>

        <?= $this->Flash->render() ?>

        <form>
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <label>Email</label>
            <input type="text" name="email" required>

            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'dashboard']) ?>" class="button">
                Daftar
            </a>
        </form>

        <br>
        <a href="<?= $this->Url->build(['controller' => 'Login', 'action' => 'index']) ?>">Sudah punya akun? Masuk di sini</a>
    </div>
</body>
</html>
