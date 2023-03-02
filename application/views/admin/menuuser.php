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


          <div class="form-group" >
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newUserModal">Tambah User Baru</a>
        </div>

          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            

           
                <thead class="thead-dark">
                    <tr>
                        <th scope="col ">Nama Lengkap</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Upline</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Role</th>
                        <th scope="col">Pembuat Akun</th>
                        <th scope="col">Tanggal Pembuatan Akun</th>
                        <th scope="col">Action</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($datauser as $r) : ?>
                    <tr>
                        <td><a data-toggle="modal" data-target="#datailUserModal<?php echo $r['id']; ?>"  href="#" class="btn text-info font-weight-bold "><?= $r['name']; ?> </a></td>
                        <td><?= $r['username']; ?></td>
                        <td><?= $r['notelpon']; ?></td>
                        <td><?= $r['email']; ?></td>
                        <td><?= $r['upline_name']; ?></td>
                        <td><?= $r['alamat']; ?></td>
                        <td>
                        <img src="<?= base_url('assets/img/profile/') . $r['image']; ?>" class="img-thumbnail">
                    </td>
                        <td><?= $r['role']; ?></td>
                        <td><?= $r['created_by']; ?></td>
                        <td><?= date('d F Y (H:i a)' , $r['date_create']); ?></td>
                        
                        <td>

                            <a href="<?= base_url('assets/img/profile/') . $r['image']; ?>"  class="badge badge-primary">Lihat Foto</a>

                         <!--<a  href="#" data-toggle="modal" data-target="#editUserModal<?php echo $r['id']; ?>" class="badge badge-info">Edit</a>-->
                         <a  href="<?= base_url('admin/menuuseredit/') . $r['id']; ?> " class="badge badge-info">Edit</a>
                           
                            <a href="<?= base_url('admin/userdelete/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                    <!-- Modal -->
<div class="modal fade" id="datailUserModal<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Detail User</h5>
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
                        <label for="ijazah">Username:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="username" name="username" placeholder="" value="<?= $r['username']; ?>" readonly>
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
                        <label for="notelpon">Upline:</label>
                    </br>
                    <input type="text" class="form-control bg-dark text-gray-100" id="email" name="email" placeholder="" value="<?= $r['upline_name']; ?>"readonly>
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
                        <label for="notelpon">Created by:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="dsdsd" name="dsdsd" placeholder="" value="<?= $r['created_by']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon">Created at:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="dsdsd" name="dsdsd" placeholder="" value="<?= date('d F Y (H:i a)' , $r['date_create']); ?>"readonly>
                    </div>

                    <a href="<?= base_url('admin/userdetail/') . $r['id']; ?> " class="badge badge-info">Lihat Detail</a>

                   



                   
                </div>

                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Edit</button>-->
                </div>
            </form>
        </div>
    </div>
</div> 
                    <!-- Modal -->
<div class="modal fade" id="editUserModal<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/userupdate/') . $r['id']; ?>" method="post">
                <div class="modal-body">
                    

                    <div class="form-group">
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="name" name="name" placeholder="" value="<?= $r['name']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Username:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="username" name="username" placeholder="" value="<?= $r['username']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Nomor Telpon:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="notelpon" name="notelpon" placeholder="" value="<?= $r['notelpon']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Email:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="email" name="email" placeholder="" value="<?= $r['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Upline:</label>
                    </br>
                        <select class="form-control selectpicker   " data-live-search="true" id="upline" name="upline"  style="background-color: #FEECB5 
;" >
                            
                            <?php foreach ($dataupline as $m) : ?>
                            <option value="<?= $m['id']."|".$m['name']?>" ><?= $m['name'] ?> | <?= $m['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="alamat" name="alamat" placeholder="" value="<?= $r['alamat']; ?>">
                    </div>
                    
                    <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $r['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="form-group">
                        <label for="notelpon">Role:</label>
                        <select class="form-control bg-dark text-gray-100" name="role" id="role" aria-selected="<?= $r['role']; ?>">
                                    <option>Founder</option>
                                <option>Supplier</option>
                                <option>Distributor</option>
                                <option>Reseller</option>
                                

                                </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="notelpon">Created at:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="dsdsd" name="dsdsd" placeholder="" value="<?= date('d F Y (H:i a)' , $r['date_create']); ?>"readonly>
                    </div>

                   



                   
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Edit</button>
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
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="newUserModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menuuser/') . $r['id']; ?>" method="post">
                <div class="modal-body">
                    

                    <div class="form-group">
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="name" name="name" placeholder="" value="" >
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Username:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="username" name="username" placeholder="" value="" >
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Nomor Telpon:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="notelpon" name="notelpon" placeholder="" value="">
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Email:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="email" name="email" placeholder="" value="">
                    </div>

                  
                    <div class="form-group">
                        <label for="notelpon">Upline:</label>
                        <select class="form-control selectpicker   " data-live-search="true" name="upline" id="upline" style="background-color: #FEECB5 
;" >
                            
                            <?php foreach ($dataupline as $m) : ?>
                            <option value="<?= $m['id']."|".$m['name']?>" ><?= $m['name'] ?> | <?= $m['role'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="alamat" name="alamat" placeholder="" value="">
                    </div>
                    
                    

            <div class="form-group">
                        <label for="notelpon">Role:</label>
                        <select class="form-control bg-dark text-gray-100" name="role" id="role" >
                                    <option>Founder</option>
                                <option>Supplier</option>
                                <option>Distributor</option>
                                <option>Reseller</option>
                                

                                </select>
                    </div>

                   

                   



                   
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

