<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Penjualan $penjualanEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Penjualan'), ['action' => 'edit', $penjualanEntity->id_penjualan], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Penjualan'), ['action' => 'delete', $penjualanEntity->id_penjualan], ['confirm' => __('Are you sure you want to delete # {0}?', $penjualanEntity->id_penjualan), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Penjualan'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Penjualan'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="penjualan view content" style="max-width: 600px; margin: auto; border: 1px solid #ddd; padding: 20px;">
            
            <h3><?= h($penjualanEntity->id_penjualan) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id Penjualan') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->id_penjualan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nama Product') ?></th>
                    <td><?php $namaProduct = [];
                    if (!empty($penjualanEntity->detailpenjualan)) {
                        foreach ($penjualanEntity->detailpenjualan as $detail) {
                            if ($detail->has('product')) {
                                $namaProduct[] = h($detail->product->nama_product) . '(' . h($detail->jumlah_product) . 'x)';
                            }
                        }
                    }
                    echo !empty($namaProduct) ? implode(',', $namaProduct) : '-';
                    ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Total Harga') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->total_harga) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Pelanggan') ?></th>
                    <td><?= $this->Number->format($penjualanEntity->id_pelanggan) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tanggal Penjualan') ?></th>
                    <td><?= h($penjualanEntity->tanggal_penjualan) ?></td>
                </tr>
            </table>

            <hr style="margin: 30px 0;">
            <div style="max-width: 550px; margin: auto; border: 1px solid #ccc; padding: 20px; border-radius: 5px;">
                 <div style="text-align: center;">
                    <h4>Nota Transaksi Kasir</h4>
                    <p>No. Nota: <strong>#<?= h($penjualanEntity->id_penjualan) ?></strong> | Tanggal: <?= h($penjualanEntity->tanggal_penjualan) ?></p>
                    <p>Pelanggan: <strong><?= h($penjualanEntity->pelanggan->nama_pelanggan ?? 'ID #' . $penjualanEntity->id_pelanggan) ?></strong></p>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $detailItems = $penjualanEntity->detailpenjualan ?? []; ?>
                    <?php if (!empty($detailItems)): ?>
                        <?php foreach ($detailItems as $detail): ?>
                            <tr>
                                <td><?= $detail->has('product') ? h($detail->product->nama_product) : 'Unknown Product' ?></td>
                                <td>Rp <?= number_format((float)($detail->product->harga ?? 0), 0, ',', '.') ?></td>
                                <td><?= h($detail->jumlah_product) ?></td>
                                <td>Rp <?= number_format((float)$detail->subtotal, 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" style="text-align: center;">No detail available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" style="text-align: right;">Total:</th>
                        <th>Rp <?= number_format((float)$penjualanEntity->total_harga, 0, ',', '.') ?></th>
                    </tr>
                </tfoot>
            </table>

            <br>
            <button onclick="window.print()" class="button">Print Nota</button>
            </div>
        </div>
    </div>
</div>