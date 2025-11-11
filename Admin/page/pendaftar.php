<?php
$pendaftar = getAllPendaftar();
?>
<h1>Pendaftar Online</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1; 
        foreach( $pendaftar as $user ):?>
        <tr>
            <td><?= $no++?>.</td>
            <td><?= $user['NISN'] ?></td>
            <td><?= $user['NAMA'] ?></td>
            <td>
                <a href="index.php?page=detail&user=<?= $user['USERNAME'] ?>" class="acc">Info</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>