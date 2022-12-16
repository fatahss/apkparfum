<!-- Begin Page Content -->
<div class="container-fluid">
    

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="card mb-3 col-lg">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nama Lengkap : <?= $user['name']; ?></h5>
                    <p class="card-text">Nomor NIS : <?= $user['nis']; ?></p>
                    <p class="card-text">Nomor NISN : <?= $user['nisn']; ?></p>
                    <p class="card-text">Nomor Ijazah : <?= $user['ijazah']; ?></p>
                    <p class="card-text">Jurusan : <?= $user['jurusan']; ?></p>
                    <p class="card-text">Kelas : <?= $user['kelas']; ?></p>
                    <p class="card-text">Nomor Telepon : <?= $user['notelpon']; ?></p>
                    <p class="card-text">Email : <?= $user['email']; ?></p>
                    <p class="card-text">Nama Orang Tua : <?= $user['namaortu']; ?></p>
                    <p class="card-text"><small class="text-muted">Terdaftar sejak <?= date('d F Y', $user['date_create']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 