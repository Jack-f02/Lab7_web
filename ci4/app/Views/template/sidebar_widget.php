<div class="widget-box"> 
    <h3 class="title">Artikel Terkini</h3> 
    <ul> 
        <?php foreach ($artikel_terkini as $item): ?>
            <li>
                <a href="<?= base_url('artikel/' . $item['slug']) ?>">
                    <?= esc($item['judul']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul> 
</div> 

<div class="widget-box"> 
    <h3 class="title">Kategori</h3> 
    <ul> 
        <?php foreach ($kategori as $kat): ?>
            <li>
                <a href="<?= base_url('kategori/' . $kat['id_kategori']) ?>">
                    <?= esc($kat['nama_kategori']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul> 
</div>
