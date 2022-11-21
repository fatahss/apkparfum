<!-- Begin Page Content -->
<div class="container-fluid">
    

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
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
                    <p class="card-text">Username : <?= $user['username']; ?></p>
                    <p class="card-text">Role : <?= $role; ?></p>
                    <p class="card-text">Upline : <?= $upline['name']; ?></p>
                    <p class="card-text">Nomor Telepon : <?= $user['notelpon']; ?></p>
                    <p class="card-text">Email : <?= $user['email']; ?></p>
                    <p class="card-text">Alamat : <?= $user['alamat']; ?></p>
                    <p class="card-text"><small class="text-muted">Terdaftar sejak <?= date('d F Y', $user['date_create']); ?></small></p>
                </div>

                <div class="row">
            

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Member</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($member) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Produk Terjual</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-wine-bottle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 