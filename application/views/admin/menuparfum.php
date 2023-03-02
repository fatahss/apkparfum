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
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Parfum Baru</a>
        </div>

<div class="card shadow mb-4">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            

           
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nama Parfum</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga untuk Reseller</th>
                        <th scope="col">Harga untuk Distributor</th>
                        <th scope="col">Harga untuk Supplier</th>
                        <th scope="col">Harga untuk Founder</th>
                        <th scope="col">Harga untuk Direct Selling</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                       
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($parfum as $r) : ?>
                    <tr>
                    <td><?= $r['nama_parfum']; ?></td>
                        <td><?= $r['nama_kategori']; ?></td>
                        <td><?= $r['deskripsi']; ?></td>
                        <td>Rp. <?= number_format($r['harga_reseller'],0,',','.')?></td>
                        <td>Rp. <?= number_format($r['harga_distributor'],0,',','.')?></td>
                        <td>Rp. <?= number_format($r['harga_supplier'],0,',','.')?></td>
                        <td>Rp. <?= number_format($r['harga_founder'],0,',','.')?></td>
                        <td>Rp. <?= number_format($r['harga_direct'],0,',','.')?></td>
                        
                        <td><?= $r['created_by']; ?></td>
                         <td><?= date('d F Y (H:i a)' , $r['created_at']); ?></td>
                        
                        
                        <td>

                          
                        <a data-toggle="modal" data-target="#editParfumModal<?php echo $r['id']; ?>"  href="#" class="badge badge-info">Edit</a>
                            <a href="<?= base_url('admin/menuparfumdelete/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                        </td>
                    </tr>


                    <div class="modal fade" id="editParfumModal<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Edit Parfum Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menuparfumupdate/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                  

                    <div class="form-group">
                        <label for="name" class="text-bold text-gray-900">Nama Parfum:</label>
                        <input type="text" class="form-control bg-dark text-light" id="nama_parfum" name="nama_parfum" placeholder="Nama Parfum" value="<?= $r['nama_parfum']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="semester" class="text-gray-900">Kategori</label>
                        <br/>
                        <label for="semester">Current : <?= $r['nama_kategori']; ?></label>
                        <select name="kategori" id="kategori" class="form-control  bg-dark text-light">
                            <?php foreach ($kategori as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Deskripsi:</label>
                        <input type="text" class="form-control bg-dark text-light" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="<?= $r['deskripsi']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Harga untuk Reseller:</label>
                        <input type="number" class="form-control bg-dark text-light" id="harga_reseller" name="harga_reseller" placeholder="Harga untuk Reseller" value="<?= $r['harga_reseller']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Harga untuk Distributor:</label>
                        <input type="number" class="form-control bg-dark text-light" id="harga_distributor" name="harga_distributor" placeholder="Harga untuk Distributor" value="<?= $r['harga_distributor']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Harga untuk Supplier:</label>
                        <input type="number" class="form-control bg-dark text-light" id="harga_supplier" name="harga_supplier" placeholder="Harga untuk Supplier" value="<?= $r['harga_supplier']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Harga untuk Founder:</label>
                        <input type="number" class="form-control bg-dark text-light" id="harga_founder" name="harga_founder" placeholder="Harga untuk Founder" value="<?= $r['harga_founder']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Harga untuk Direct Selling:</label>
                        <input type="number" class="form-control bg-dark text-light" id="harga_direct" name="harga_direct" placeholder="Harga untuk Direct Selling" value="<?= $r['harga_direct']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Created By:</label>
                        <input type="text" class="form-control bg-dark text-light" id="created_by" name="created_by" placeholder="Created_by" value="<?= $r['created_by']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Created At:</label>
                        <input type="text" class="form-control bg-dark text-light" id="date" name="date" placeholder="Date" value="<?= date('d F Y (H:i a)' , $r['created_at']); ?>" readonly>
                    </div>
                   
                   
                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div> 

                    <div class="modal fade" id="detailParfumModal<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="detailUserModalLabel">Detail Parfum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menuparfumupdate/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                  

                    <div class="form-group">
                        <label for="name" class="text-bold text-gray-900">Nama Parfum:</label>
                        <input type="text" class="form-control bg-dark text-light" id="nama_parfum" name="nama_parfum" placeholder="" value="<?= $r['nama_parfum']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-bold text-gray-900">Kategori:</label>
                        <input type="text" class="form-control bg-dark text-light" id="nama_parfum" name="nama_parfum" placeholder="" value="<?= $r['nama_kategori']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Deskripsi:</label>
                        <input type="text" class="form-control bg-dark text-light" id="deskripsi" name="deskripsi" placeholder="" value="<?= $r['deskripsi']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Harga untuk Reseller:</label>
                        <input type="number" class="form-control bg-dark text-light" id="harga_reseller" name="harga_reseller" placeholder="" value="<?= $r['harga_reseller']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Harga untuk Distributor:</label>
                        <input type="number" class="form-control bg-dark text-light" id="harga_distributor" name="harga_distributor" placeholder="" value="<?= $r['harga_distributor']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Harga untuk Supplier:</label>
                        <input type="number" class="form-control bg-dark text-light" id="harga_supplier" name="harga_supplier" placeholder="" value="<?= $r['harga_supplier']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Created By:</label>
                        <input type="text" class="form-control bg-dark text-light" id="created_by" name="created_by" placeholder="" value="<?= $r['created_by']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="notelpon" class="text-gray-900">Created At:</label>
                        <input type="text" class="form-control bg-dark text-light" id="date" name="date" placeholder="" value="<?= date('d F Y (H:i a)' , $r['created_at']); ?>" readonly>
                    </div>
                   
                   
                

                <div class="modal-footer">
                    
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
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Parfum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menuparfum'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namamapel">Nama Parfum:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="namaparfum" name="namaparfum" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="semester">Kategori:</label>
                        <select name="kategori" id="kategori" class="form-control  bg-dark text-gray-100">
                            <?php foreach ($kategori as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Deskripsi:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="deskripsi" name="deskripsi" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="notelpon">Harga untuk Reseller:</label>
                        <input type="number" class="form-control bg-dark text-gray-100" id="harga_reseller" name="harga_reseller" placeholder="" value="">
                    </div>

                    <div class="form-group">
                        <label for="notelpon">Harga untuk Distributor:</label>
                        <input type="number" class="form-control bg-dark text-gray-100" id="harga_distributor" name="harga_distributor" placeholder="" value="">
                    </div>

                    <div class="form-group">
                        <label for="notelpon">Harga untuk Supplier:</label>
                        <input type="number" class="form-control bg-dark text-gray-100" id="harga_supplier" name="harga_supplier" placeholder="" value="">
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