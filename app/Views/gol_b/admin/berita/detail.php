<?= $this->extend('layout/dashboard_layout') ?> 
<?= $this->section('content') ?>

<style>
.isi-berita{
    width:100%;
    text-align:justify;
    line-height:1.9;
    font-size:16px;
}

/* 🔥 INI KUNCI UTAMA */
.isi-berita *{
    max-width:100% !important;
    width:auto !important;
}

/* biar rapi */
.isi-berita p{
    margin-bottom:14px;
}
</style>

<?php 
$berita = $berita ?? [];

// 🔥 FIX: paksa jadi string biar ga error Intelephense
$url = is_array($berita['url_berita'] ?? null) ? '' : ($berita['url_berita'] ?? '');
$isi = is_array($berita['isi_berita'] ?? null) ? '' : ($berita['isi_berita'] ?? '');
$ringkasan = is_array($berita['deskripsi_berita'] ?? null) ? '' : ($berita['deskripsi_berita'] ?? '');
?>

<div class="card border-0 shadow-sm p-4 rounded-4" style="width:100%;max-width:100%;">

<!-- ATAS: GAMBAR + JUDUL -->
<div class="row align-items-center mb-4">

<div class="col-md-5">
<img src="<?= base_url('uploads/berita/' . (!empty($berita['gambar_berita']) ? $berita['gambar_berita'] : 'default.jpg')) ?>"
style="width:100%;height:240px;object-fit:cover;border-radius:16px;">
</div>

<div class="col-md-7">
<h2 class="fw-bold mb-2" style="line-height:1.4;">
<?= esc((string)($berita['judul_berita'] ?? '')) ?>
</h2>

<p class="text-muted mb-0">
<?= !empty($berita['tanggal_berita']) ? date('d F Y', strtotime($berita['tanggal_berita'])) : '-' ?> • Admin
</p>
</div>

</div>

<!-- BAWAH: ISI -->
<div class="isi-berita mt-3">

<?php if (!empty($url) && filter_var($url, FILTER_VALIDATE_URL)): ?>

<div style="
background:#f5f9fa;
padding:18px;
border-radius:12px;
border:1px solid #dbeaea;
">

<p style="margin-bottom:8px;font-weight:600;">
🔗 Sumber Berita Eksternal
</p>

<a href="<?= esc((string)$url) ?>" target="_blank"
style="
display:inline-block;
background:#11c5d8;
color:#fff;
padding:10px 16px;
border-radius:8px;
text-decoration:none;
font-weight:600;
">
Buka Berita
</a>

<p style="margin-top:10px;font-size:13px;color:#888;">
<?= esc((string)$url) ?>
</p>

</div>

<?php else: ?>

<div class="w-100">
    <?= !empty($isi) ? $isi : $ringkasan ?>
</div>
<?php endif; ?>
</div>

<a href="<?= base_url('tbc/berita') ?>"
class="btn text-white mt-4"
style="
background:#11c5d8;
width:100%;
padding:12px;
border-radius:10px;
font-weight:600;
">
← Kembali
</a>

</div>

<?= $this->endSection() ?>