<?= $this->extend('utsview/mainview') ?>

<?= $this->section('title') ?>
    <b>Tambah Data Buku</b>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<button class="btn btn-warning" type="button" onclick="window.location='/buku/databuku'">Kembali</button> 
<hr>

<!-- Alert Data Sampul Gagal Di Input -->
<?php if (session()->getFlashdata('inputsampulgagal')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('inputsampulgagal') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?=form_open_multipart('/buku/simpandatabuku')?>
<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Kode Buku</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="kodebuku" id="" placeholder="Kode Buku"  require>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Judul Buku</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="judulbuku" id="" placeholder="Judul Buku" require>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Kategori</label>
  <div class="col-sm-5">
    <select class="form-select" name="kategoribuku" required>
      <option value="" disabled selected hidden>Kategori</option>
        <option value="Novel">Novel</option>
        <option value="Komik">Komik</option>
        <option value="Majalah">Majalah</option>
        <option value="Kamus">Kamus</option>
        <option value="Biografi">Biografi</option>
    </select>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Jumlah Halaman</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="jumlahhalamanbuku" id="" placeholder="Jumlah Halaman" required>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Penerbit</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="penerbitbuku" id="" placeholder="Penerbit" required>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">ISBN</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="isbnbuku" id="" placeholder="ISBN" required>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Harga</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="hargabuku" id="" placeholder="Harga" required>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Sampul</label>
  <div class="col-sm-9">
  <input class="form-control" type="file" name="sampul" size="20" required>
  </div>
</div>

<div class="mb-3 row">
  <div class="col-sm-3"></div>
  <div class="col-sm-9">
    <input type="submit" class="btn btn-success form-control" value="Simpan Data">
  </div>
</div>

<?= $this->endsection() ?>