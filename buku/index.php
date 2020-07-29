<?php
include '../konfigurasi/config.php';
include '../fragment/header.php';
include '../konfigurasi/function.php';
?>
<?php include '../fragment/menu.php' ?>
<main>
    <h3>Daftar Buku</h3>
    <h3><a href="tambah.php">tambah</a></h3>
    <table>
        <tr>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        $con = connect_db();
        $query = "SELECT buku.*, pengarang.nama FROM buku INNER JOIN "
                    . "pengarang ON pengarang.id=buku.idpengarang";
        $result = execute_query($con, $query);
        while ($data = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?= $data['isbn'] ?></td>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['stok'] ?></td>
                <td><img src="../image<?$data['gambar']?>" width="100" height="100 "alt=""></td>
                <td><a href="detail.php?id=<?= $data['id'] ?>">
                        Detail</a>
                    <a href="edit.php?id=<?= $data['id'] ?>">
                        Edit</a>
                    <a onclick="return confirm('akan menghapus data?')" 
                       href="hapus.php?id=<?= $data['id'] ?>">
                        Hapus</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</main>
<?php include '../fragment/footer.php'; ?>