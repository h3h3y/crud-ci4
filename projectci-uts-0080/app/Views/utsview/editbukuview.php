<?= $this->extend('utsview/mainview') ?>

<?= $this->section('title') ?>
    <b>Edit Data Buku</b>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<button class="btn btn-warning" type="button" onclick="window.location='/buku/databuku'">Kembali</button> 
<hr>

<!-- Alert Data Sampul Gagal Di Edit -->
<?php if (session()->getFlashdata('editsampulgagal')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('editsampulgagal') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<!-- Alert Data Gagal Di Edit -->
<?php if (session()->getFlashdata('editgagal')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('editgagal') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?=form_open_multipart('/buku/updatebuku')?>
<input type="hidden" name="_method" value="PUT">
<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Kode Buku</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="kodebuku" id="" placeholder="Kode Buku" value="<?= $editkode  ?>" readonly require>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Judul Buku</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="judulbuku" id="" placeholder="Judul Buku" value="<?= $editjudul ?>" require>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Kategori</label>
  <div class="col-sm-5">
    <select class="form-select" name="kategoribuku" require>
      <option value="" disabled selected hidden>Kategori</option>
      <option value="Novel" <?= ($editkategori == 'Novel') ? 'selected' : '';?>>Novel</option>
      <option value="Komik" <?= ($editkategori == 'Komik') ? 'selected' : '';?>>Komik</option>
      <option value="Majalah" <?= ($editkategori == 'Majalah') ? 'selected' : '';?>>Majalah</option>
      <option value="Kamus" <?= ($editkategori == 'Kamus') ? 'selected' : '';?>>Kamus</option>
      <option value="Biografi" <?= ($editkategori == 'Biografi') ? 'selected' : '';?>>Biografi</option>
    </select>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Jumlah Halaman</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="jumlahhalamanbuku" id="" placeholder="Jumlah Halaman" value="<?= $edithalaman  ?>" required>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Penerbit</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="penerbitbuku" id="" placeholder="Penerbit" value="<?= $editpenerbit  ?>" required>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">ISBN</label>
  <div class="col-sm-9">
    <input type="text" class="form-control" name="isbnbuku" id="" placeholder="ISBN" value="<?= $editisbn  ?>" required>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Harga</label>
  <div class="col-sm-9">
    <input type="number" class="form-control" name="hargabuku" id="" placeholder="Harga" value="<?= $editharga  ?>" required>
  </div>
</div>

<div class="mb-3 row">
  <label for="" class="col-sm-3 col-form-label">Sampul</label>
  <div class="col-sm-9">
  <input class="form-control" type="file" name="sampul" >
  </div>
</div>

<div class="mb-3 row">
  <div class="col-sm-3"></div>
  <div class="col-sm-9">
    <input type="submit" class="btn btn-success form-control" value="Simpan Data">
  </div>
</div>
<?=form_close(); ?>
<?= $this->endsection() ?>