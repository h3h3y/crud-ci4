<?= $this->extend('utsview/mainview') ?>

<?= $this->section('title') ?>
    <b>Detail Data Buku</b>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<div class="container">
    <a href="<?= site_url('/buku/databuku') ?>" class="btn btn-warning">Kembali</a>
<hr>
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center justify-content-center">
                <img src="<?= base_url($databuku['bukusampul']); ?>" alt="Sampul Buku" alt="Foto Mobil" class="img-fluid rounded-start" style="margin: 20px;margin-top:40px; width: 150px; height: auto;">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li>
                            <strong>Kode Buku</strong> <span>: <?= $databuku['bukukode'] ?></span>
                        </li>
                        <li>
                            <strong>Judul Buku</strong> <span>: <?= $databuku['bukujudul'] ?></span>
                        </li>
                        <li>
                            <strong>ISBN</strong> <span>: <?= $databuku['bukuisbn'] ?></span>
                        </li>
                        <li>
                            <strong>Penerbit</strong> <span>: <?= $databuku['bukupenerbit'] ?></span>
                        </li>
                        <li>
                            <strong>Kategori</strong> <span>: <?= $databuku['bukukategori'] ?></span>
                        </li>
                        <li>
                            <strong>Jumlah Halaman</strong> <span>: <?= $databuku['bukuhalaman'] ?></span>
                        </li>
                        <li>
                            <strong>Harga</strong> <span>: Rp.<?= number_format($databuku['bukuharga'], 0, ',', '.') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    ul.list-unstyled {
        padding: 0;
        margin: 20px;
        margin-left: 100px;
    }

    ul.list-unstyled li {
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    ul.list-unstyled strong {
        width: 150px;
        display: inline-block;
    }

    ul.list-unstyled span {
        margin-left: 10px;
    }
</style>
<?= $this->endsection() ?>