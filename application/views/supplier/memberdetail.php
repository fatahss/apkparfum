<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    

    <div class="row">
        <div class="table-responsive text-nowrap">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            

            <!--<form class="d-none d-sm-inline-block form-inline  navbar-search">
           <div class="input-group">
            <div class="form-outline">
            <input id="search-focus" type="search" id="form1" class="form-control" />
            </div>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
            </div>
        
          </form>-->


                
                   
                                    <form action="<?= base_url('admin/menuparfumupdate/') ?>" method="post">



                                        
                                    <div class="form-group">
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="name" name="name" placeholder="" value="<?= $member['name']; ?>" readonly>
                    </div>
                   
                    <div class="form-group">
                        <label for="notelpon">Nomor Telpon:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="notelpon" name="notelpon" placeholder="" value="<?= $member['notelpon']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Email:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="email" name="email" placeholder="" value="<?= $member['email']; ?>"readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="alamat" name="alamat" placeholder="" value="<?= $member['alamat']; ?>"readonly>
                    </div>
                    
                    <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $member['image']; ?>" class="img-thumbnail">
                        </div>
                        
                        
                    </div>
                </div>
            </div>

            <div class="form-group">
                        <label for="notelpon">Role:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="email" name="email" placeholder="" value="<?= $member['role']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon">Created at:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="dsdsd" name="dsdsd" placeholder="" value="<?= date('d F Y (H:i a)' , $member['date_create']); ?>"readonly>
                    </div>

                    <a href="<?= base_url('supplier/inventorymember/') . $member['id']; ?> " class="badge badge-info">Lihat Inventory</a>
                    <a href="<?= base_url('supplier/directsellingmember/') . $member['id']; ?> " class="badge badge-warning">Lihat Direct Selling</a>
                    <a href="<?= base_url('supplier/pendapatanmember/') . $member['id']; ?> " class="badge badge-primary">Lihat Pendapatan</a></br>
                    <a href="<?= base_url('supplier/pengeluaranmember/') . $member['id']; ?> " class="badge badge-danger">Lihat Pengeluaran</a>
                    <a href="<?= base_url('supplier/memberuser/') . $member['id']; ?> " class="badge badge-secondary">Lihat Member</a>






                                       
                                    </form>
                                </div>
                            </div>
                        </div>






                   


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->