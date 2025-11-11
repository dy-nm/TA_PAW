<?php
$siswa = getSiswaKamar();
?>

<div class="page"><a href="">Admin</a> / <a href="">Jurusan </a>/ <a href="">Siswa</a></div>
<?php if(!$siswa):?>
    <h1>Tidak Ada Siswa Pada Jurusan Ini</h1>
    <?php else:?>
        <h1>Daftar Siswa Jurusan </h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kamar</th>
                <th>Alamat</th>
                <th>Telp</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach( $siswa as $sw ):?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $sw['NISN'] ?></td>
                    <td><?= $sw['NAMA'] ?></td>
                    <td><?= $sw['KAMAR'] ?></td>
                    <td><?= $sw['ALAMAT'] ?></td>
                    <td><?= $sw['TELP'] ?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
<?php endif?>
