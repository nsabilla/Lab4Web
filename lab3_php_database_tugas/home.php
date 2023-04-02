<?php
include("koneksi.php");

// query untuk menampilkan data
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<div class="content">
  <h1>DATA BARANG</h1>
  <a href="tambah">Tambah Produk</a>
  <div class="main">
    <table>
      <tr>
        <th>Gambar</th>
        <th>Nama Barang</th>
        <th>Katagori</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Stok</th>
        <th>Aksi</th>
      </tr>
      <?php if ($result) : ?>
        <?php while ($row = mysqli_fetch_array($result)) : ?>
          <tr>
            <td><img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>" style="width: 70px; height: 70px;"></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td>Rp<?= number_format($row['harga_beli']) ?></td>
            <td>Rp<?= number_format($row['harga_jual']) ?></td>
            <td><?= $row['stok']; ?></td>
            <td>
              <a href="ubah?id=<?= $row['id_barang']; ?>"><button>ubah</button></a>
              <a href="hapus?id=<?= $row['id_barang']; ?>"><button>hapus</button></a>
            </td>
          </tr>
        <?php endwhile;
      else : ?>
        <tr>
          <td colspan="7">Belum ada data</td>
        </tr>
      <?php endif; ?>
    </table>
  </div>
</div>