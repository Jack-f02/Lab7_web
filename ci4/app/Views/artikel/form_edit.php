<?= $this->include('template/admin_header'); ?> 

<h2><?= $title; ?></h2>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>

<?php if (isset($validation)): ?>
    <div class="alert alert-danger">
        <?= $validation->listErrors(); ?>
    </div>
<?php endif; ?>

<form action="<?= site_url('admin/artikel/edit/' . $artikel['id']); ?>" method="post">
    <?= csrf_field(); ?>

    <p>
        <label for="judul">Judul</label><br>
        <input type="text" name="judul" id="judul" value="<?= esc($artikel['judul']); ?>" class="form-control" required>
    </p>

    <p>
        <label for="isi">Isi</label><br>
        <textarea name="isi" id="isi" cols="50" rows="10" class="form-control" required><?= esc($artikel['isi']); ?></textarea>
    </p>

    <p>
        <label for="id_kategori">Kategori</label><br>
        <select name="id_kategori" id="id_kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id_kategori']; ?>" <?= ($artikel['id_kategori'] == $k['id_kategori']) ? 'selected' : ''; ?>>
                    <?= esc($k['nama_kategori']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <input type="submit" value="Simpan Perubahan" class="btn btn-primary">
    </p>
</form>

<?= $this->include('template/admin_footer'); ?>
