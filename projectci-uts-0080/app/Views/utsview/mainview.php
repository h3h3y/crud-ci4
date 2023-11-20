<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="<?= site_url('/') ?>">UTS-0080</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?= site_url('/buku/databuku') ?>">Data Buku</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->

    <div class="container py-3">
        <!-- Content -->

        <div class="card">
            <div class="card-header text-center">
                <?= $this->renderSection('title'); ?>
            </div>
            <div class="card-body">
                <?= $this->renderSection('content'); ?>
            </div>
        </div>
    </div>

    <!-- End Content -->

    <!-- Footer -->
    <footer>
        <div>
            <p class="bg-success text-white text-center">Created By <span>&COPY; Iwan</span></p>
        </div>
    </footer>
    <!-- End Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>