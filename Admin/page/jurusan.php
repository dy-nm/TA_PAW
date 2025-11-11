<?php
$jurusan = getAllJurusan();
if($_SERVER['REQUEST_METHOD']=='POST'){
    tambahKamar();
    header("Location:index.php?page=kamar");
}
?>
<h1>Daftar Jurusan</h1><br>
<a href="index.php?page=jurusan&add" class="show">Tambah Jurusan Baru</a>
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
            <th>Jurusan</th>
            <th>Detail Jurusan</th>
            <th>Jumlah Siswa</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; 
        foreach( $jurusan as $km ):?>
        <tr>
            <td><?= $no++?>.</td>
            <td><?= $km['NAMA_JURUSAN'] ?></td>
            <td><?= $km['DETAIL_JURUSAN'] ?></td>
            <td><?= $km['jumlah'] ?></td>
            <td>
                <a href="index.php?page=detail&user=" class="acc">Lihat</a>
            </td>
        </tr>
        <?php endforeach?>
        
    </tbody>
</table>