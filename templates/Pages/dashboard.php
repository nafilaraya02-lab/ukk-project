<div class="dashboard content">
    <h2>Dashboard Aplikasi Kasir</h2>
    <p>Silakan pilih menu di bawah ini</p>

    <div style="display: flex; gap: 10px; flex-wrap: wrap; margin-top: 20px;">
        <a href="<?= $this->Url->build(['controller' => 'Penjualan', 'action' => 'index']) ?>" class="button">
            Data Penjualan
        </a>

        <a href="<?= $this->Url->build(['controller' => 'Detailpenjualan', 'action' => 'index']) ?>" class="button">
            Detail Penjualan
        </a>

        <a href="<?= $this->Url->build(['controller' => 'Pelanggan', 'action' => 'index']) ?>" class="button">
            Data Pelanggan
        </a>

        <a href="<?= $this->Url->build(['controller' => 'Product', 'action' => 'index']) ?>" class="button">
            Data Product
        </a>

        <a href="<?= $this->Url->build(['controller' => 'Login', 'action' => 'logout']) ?>" class="button button-outline">
            Keluar (Logout)
        </a>
    </div>
</div>
