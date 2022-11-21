<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="table-responsive text-nowrap">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>



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






            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">




                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Role</th>
                        <th scope="col">Email</th>
                        <th scope="col ">Nomor Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Status</th>



                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($userreseller as $r) : ?>
                        <tr>
                        <td><a data-toggle="modal" data-target="#datailUserModal<?php echo $r['id']; ?>"  href="#" class="btn text-info font-weight-bold "><?= $r['name']; ?> </a></td>
                            <td><?= $r['role']; ?></td>
                            <td><?= $r['email']; ?></td>
                            <td><?= $r['notelpon']; ?></td>
                            <td><?= $r['alamat']; ?></td>
                            <td><?= date('d F Y (H:i)', $r['date_create']); ?></td>
                            <td>
                            <?php if($r['is_active'] == '1'){ ?>

                        Telah Aktif
                            <?php } ?>  
                            <?php if($r['is_active'] == '0'){ ?>

                        Belum Aktif
                            <?php } ?> 
                        </td>

                          
                        </tr>
                         <!-- Modal -->
<div class="modal fade" id="datailUserModal<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Detail Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                   

                    <div class="form-group">
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="name" name="name" placeholder="" value="<?= $r['name']; ?>" readonly>
                    </div>
                   
                    <div class="form-group">
                        <label for="notelpon">Nomor Telpon:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="notelpon" name="notelpon" placeholder="" value="<?= $r['notelpon']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Email:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="email" name="email" placeholder="" value="<?= $r['email']; ?>"readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="alamat" name="alamat" placeholder="" value="<?= $r['alamat']; ?>"readonly>
                    </div>
                    
                    <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $r['image']; ?>" class="img-thumbnail">
                        </div>
                        
                        
                    </div>
                </div>
            </div>

            <div class="form-group">
                        <label for="notelpon">Role:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="email" name="email" placeholder="" value="<?= $r['role']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon">Created at:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="dsdsd" name="dsdsd" placeholder="" value="<?= date('d F Y (H:i a)' , $r['date_create']); ?>"readonly>
                    </div>
                    
                    <a href="<?= base_url('supplier/inventorymember/') . $r['id']; ?> " class="badge badge-info">Lihat Inventory</a>
                    <a href="<?= base_url('supplier/directsellingmember/') . $r['id']; ?> " class="badge badge-warning">Lihat Direct Selling</a>
                    <a href="<?= base_url('supplier/pendapatanmember/') . $r['id']; ?> " class="badge badge-primary">Lihat Pendapatan</a></br>
                    <a href="<?= base_url('supplier/pengeluaranmember/') . $r['id']; ?> " class="badge badge-dark">Lihat Pengeluaran</a>
                    <a href="<?= base_url('supplier/memberuser/') . $r['id']; ?> " class="badge badge-secondary">Lihat Member</a>

                   



                   
                </div>

                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Edit</button>-->
                </div>
            </form>
        </div>
    </div>
</div> 
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->