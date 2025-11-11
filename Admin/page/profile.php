<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
    updateProfileAdmin($_POST);
}
?>
<div class="alert-msg-prof">
    <div class="danger-alert">ACC</div>
    <div class="danger-alert">ACC</div>
</div>
<div class="profile-card">
    <div class="avatar">A</div>
    <h2><?= $_SESSION['nama'] ?></h2>
    <p style="color: rgb(93, 199, 187);"><?= $_SESSION['username'] ?></p>
    <form action="" method="POST">
        <div class="profile-info">
            <div>
                <strong>Username</strong>
                <input type="text" name="username" class="profile-form" value="<?= $_SESSION['username'] ?>">
            </div>
            <div>
                <strong>Nama</strong>
                <input type="text" name="nama" class="profile-form" value="<?= $_SESSION['nama'] ?>">
            </div>
            <div>
                <strong>Password Baru</strong>
                <input type="password" name="pass" class="profile-form">
            </div>
            <div>
                <span></span>
                <button class="btn-tambah">Update!</button>
            </div>
        </div>
    </form>
</div>
