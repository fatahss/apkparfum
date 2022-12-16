<!-- Begin Page Content -->
<div class="container-fluid">
    

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
            
    </div>

    <div class="card mb-3 col-lg">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nama Lengkap : <?= $user['name']; ?></h5>
                    <p class="card-text">Username : <?= $user['username']; ?></p>
                    <p class="card-text">Role : <?= $role; ?></p>
                    <p class="card-text">Upline : <?= $upline['name']; ?></p>
                    <p class="card-text">Nomor Telepon : <?= $user['notelpon']; ?></p>
                    <p class="card-text">Email : <?= $user['email']; ?></p>
                    <p class="card-text">Alamat : <?= $user['alamat']; ?></p>
                    <p class="card-text"><small class="text-muted">Terdaftar sejak <?= date('d F Y', $user['date_create']); ?></small></p>
                </div>
                
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 