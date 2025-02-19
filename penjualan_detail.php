<?php
    $id  =$_GET['id'];
    $query = mysqli_query($koneksi,"SELECT*FROM penjualan LEFT JOIN pelanggan on pelanggan.id_pelanggan = penjualan.id_pelanggan WHERE id_penjualan=$id");
    $data = mysqli_fetch_array($query);
?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Struk Pembelian</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    
    <!-- Tombol Kembali -->
    <a href="?page=pembelian" class="btn btn-danger">Kembali</a>
    <hr>

    <div class="struk-container">
        <div class="struk-header">
            <h4 class="text-center">Blissful Mart</h4>
            <p class="text-center">Alamat Toko: Jalan Raya No. 123, Kota Malang</p>
            <p class="text-center">Telp: (012) 123-456-789</p>
            <hr>
            <p class="text-center">No. Transaksi: <?php echo $id; ?></p>
            <p class="text-center">Tanggal: <?php echo date("d-m-Y", strtotime($data['tanggal_penjualan'])); ?></p>
            <hr>
        </div>

        <div class="struk-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $pro = mysqli_query($koneksi,"SELECT*FROM detail_penjualan LEFT JOIN produk on produk.id_produk = detail_penjualan.id_produk where id_penjualan = $id");
                        while($produk = mysqli_fetch_array($pro)) {
                    ?>
                    <tr>
                        <td><?php echo $produk['nama_produk'];?></td>
                        <td>Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $produk['jumlah_produk'];?></td>
                        <td>Rp <?php echo number_format($produk['sub_total'], 0, ',', '.');?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
            <hr>
            <p class="text-right"><strong>Total: Rp <?php echo number_format($data['total_harga'], 0, ',', '.'); ?></strong></p>
        </div>

        <div class="struk-footer">
            <p class="text-center">Terima kasih atas pembelian Anda!</p>
            <p class="text-center">Silakan datang kembali.</p>
            <a href="cetak_laporan.php?id=<?php echo $id; ?>" target="_blank" class="btn btn-primary">Cetak Struk (PDF)</a>
        </div>
    </div>
</div>

<!-- CSS untuk struk pembelian -->
<style>
    .struk-container {
        width: 300px;
        margin: 0 auto;
        font-family: 'Courier New', Courier, monospace;
        border: 1px solid #000;
        padding: 10px;
        text-align: center;
    }

    .struk-header, .struk-footer {
        margin-bottom: 10px;
    }

    .struk-body table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    .struk-body th, .struk-body td {
        padding: 5px;
        text-align: left;
    }

    .struk-body th {
        background-color: #f2f2f2;
    }

    .struk-footer {
        margin-top: 10px;
        font-size: 12px;
    }
</style>
