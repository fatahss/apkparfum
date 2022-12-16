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


          <div class="card shadow mb-4">
            
            
            <div class="card-body">
            <div class="form-group" >
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Kategori Baru</a>
        </div>
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            

           
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Kategori</th>
                        
                        <th scope="col">Created By</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                       
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kategori as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><a data-toggle="modal" data-target="#editKategoriModal<?php echo $r['id']; ?>"  href="#" class="btn text-info font-weight-bold "><?= $r['nama_kategori']; ?></a></td>
                        <td><?= $r['created_by']; ?></td>
                        <td><?= date('d F Y (H:i)' , $r['created_at']); ?></td>
                        
                        
                        <td>

                          
                           
                            <a href="<?= base_url('admin/menukategoridelete/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="editKategoriModal<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menukategoriupdate/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                    

                    <div class="form-group">
                        <label for="name">Nama Kategori:</label>
                        <input type="text" class="form-control bg-dark text-light" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="<?= $r['nama_kategori']; ?>" >
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Created by:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="created_by" name="created_by" placeholder="Created by" value="<?= $r['created_by']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Created at:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="created_at" name="created_at" placeholder="Created at" value="<?= date('d F Y (H:i a)' , $r['created_at']); ?>"readonly>
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
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->



<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menukategori'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namamapel">Nama Kategori:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="namakategori" name="namakategori" placeholder="">
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 