<?php
$kamar = getAllKamar();
if($_SERVER['REQUEST_METHOD']=='POST'){
    tambahKamar();
    header("Location:index.php?page=kamar");
}
?>
<a href="index.php?page=kamar&add" class="show">Tambah Kamar Baru</a>
<?php if(isset($_GET['add'])):?>
<form action="" method="POST" class="frkamar">
    <label for="nama">Nama Kamar</label>
    <input type="text" id="nama" name="kamar"><br>
    <label for="kapasitas">Kapasitas</label>
    <input type="text" id="kapasitas" name="kapasitas"><br>
    <button type="submit" class="btn-tambah">Tambah</button>
</form>
<?php endif?>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kamar</th>
            <th>Jumlah</th>
            <th>Kapasitas</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; 
        foreach( $kamar as $km ):?>
        <tr>
            <td><?= $no++?>.</td>
            <td><?= $km['KAMAR'] ?></td>
            <td><?= $km['jumlah'] ?></td>
            <td><?= $km['KAPASITAS'] ?></td>
            <td>
                <a href="index.php?page=kamar&id=<?= $km['ID_KAMAR'] ?>" class="acc">Lihat</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>