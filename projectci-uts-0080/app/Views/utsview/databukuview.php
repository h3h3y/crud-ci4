<?= $this->extend('utsview/mainview') ?>

<?= $this->section('title') ?>
    <b>Data Buku</b>
<?= $this->endsection() ?>

<?= $this->section('content') ?>
<a href="<?= site_url('/buku/inputbuku') ?>" class="btn btn-primary">Tambah Data</a>
<hr>
<!-- Alert Data berhasil Di input -->
<?php if (session()->getFlashdata('inputberhasil')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('inputberhasil') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<!-- Alert Gagal berhasil Di input karena duplikat kode buku -->
<?php if (session()->getFlashdata('duplikatkodebuku')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('duplikatkodebuku') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Alert Data berhasil Di edit -->
<?php if (session()->getFlashdata('editberhasil')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('editberhasil') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<!-- Alert untuk hapus data -->
<?php if (session()->getFlashdata('hapusberhasil')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('hapusberhasil') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<table class="table table-bordered table-striped">
  <thead>
    <tr class="text-center">
      <th scope="col">No</th>
      <th scope="col">Judul Buku</th>
      <th scope="col">ISBN</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($databuku)) : ?>
      <tr>
        <td colspan="4" class="text-center">Data Kosong</td>
      </tr>
      <?php else : ?>
      <?php
      $no = 1;
      foreach ($databuku as $row) :
      ?>
        <tr>
            <td class="text-center"><?= $no++; ?></td>
            <td><?= $row['bukujudul'] ?></td>
            <td><?= $row['bukuisbn'] ?></td>
            <td class="text-center">
                <a href="<?= site_url('buku/detailbuku/' . $row['bukukode']) ?>" class="btn btn-success">Detail</a>
                <a href="<?= site_url('buku/editbuku/' . $row['bukukode']) ?>" class="btn btn-warning">Edit</a>
                <a href="<?= site_url('buku/deletebuku/' . $row['bukukode']) ?>" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
      <?php endforeach ?>
    <?php endif; ?>
  </tbody>
</table>
<?= $this->endsection() ?>