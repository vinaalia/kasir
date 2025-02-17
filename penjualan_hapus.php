<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM penjualan WHERE id_penjualan=$id");
$query = mysqli_query($koneksi, "DELETE FROM detail_penjualan WHERE id_penjualan=$id");
if($query) {
    echo '<script>alert("Hapus data berhasil"); location.href = "index.php?page=pembelian";;</script>';
}else{

    echo '<script>alert("Hapus data gagal")</script>';
}
?>