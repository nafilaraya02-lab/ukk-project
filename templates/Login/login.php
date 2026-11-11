<div class="subcontainer">
    <h2>Form Login</h2>
    <?= $this->Flash->render() ?>

    <form action="<?= $this->Url->build(['controller' => 'Login', 'action' => 'index']) ?>" method="post">
        <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Password:</label>
        <input type="password" name="password" required>

        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'dashboard']) ?>" class="button">
            Masuk
        </a>
    </form>

    <br>
    <a href="<?= $this->Url->build(['controller' => 'Registrasi', 'action' => 'register']) ?>">Belum punya akun? Daftar di sini</a>
</div>
