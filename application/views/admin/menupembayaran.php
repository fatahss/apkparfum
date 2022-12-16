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


          <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            

           
                <thead class="thead-dark">
                    <tr>
                        <th scope="col ">Nomor Pembayaran</th>
                        <th scope="col">Nama Pengirim</th>
                        <th scope="col">Nama Penerima</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Action</th>
                       
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pembayaran as $r) : ?>
                    <tr>
                        <td><a data-toggle="modal" data-target="#detailProductModal<?php echo $r['nomorpembayaran']; ?>"  href="#" class="btn text-info font-weight-bold "><?= $r['nomorpembayaran']; ?></a></td>
                        <td><?= $r['nama_requester']; ?></td>
                        <td><?= $r['nama_receiver']; ?></td>
                        <td>Rp. <?= number_format($r['nominal'],2,',','.')?></td>
                        
                        
                        <td>

                          <a href="<?= base_url('assets/buktipembayaran/') . $r['buktipembayaran']; ?>" class="badge badge-info">Lihat Bukti Pembayaran</a>
                           
                            <a href="<?= base_url('admin/menupembayarandelete/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="detailProductModal<?php echo $r['nomorpembayaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Detail Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menuparfumupdate/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                    <div class="form-group" >
                        <label for="name">Nomor Pembayaran :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorpembayaran']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="ijazah">Nomor Invoice :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= $r['nomorinvoice']; ?>"readonly>
                    </div>

                    <div class="form-group">
                           <label for="name">Nomor Preorder:</label>
                                <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorpo']; ?>" readonly>
                        </div>
                             <div class="form-group">
                                 <label for="name">Nomor Delivery Order:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomordo']; ?>" readonly>
                        </div>

                    <div class="form-group">
                        <label for="name">Nama Pengirim :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nama_requester']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Penerima :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nama_receiver']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Atas Nama :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['atasnama']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Nominal :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nominal']; ?>"readonly>
                    </div>
                    <div class="form-group">
                            <label for="ijazah">Status:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= $r['status'];  ?>" readonly>
                        </div>

                    <div class="form-group">
                        <label for="name">Tanggal :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= date('d F Y (H:i)', $r['created_at']);  ?>"readonly>
                    </div>
                    <a href="<?= base_url('assets/buktipembayaran/') . $r['buktipembayaran']; ?>" class="badge badge-info">Lihat Bukti Pembayaran</a>
                    
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



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal 
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Edit User Ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/userupdate/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                    <div class="form-group" >
                        <label for="name">Id:</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Nama Lengkap" value="<?= $r['id']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Mata Pelajaran:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= $r['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Jurusan:</label>
                        <input type="text" class="form-control" id="ijazah" name="ijazah" placeholder="Ijazah" value="<?= $r['ijazah']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Semester:</label>
                        <input type="text" class="form-control" id="notelpon" name="notelpon" placeholder="Nomor Telepon" value="<?= $r['notelpon']; ?>">
                    </div>
                   
                   
                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div> 

<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/daftarmapel'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namamapel">Nama Mata Pelajaran:</label>
                        <input type="text" class="form-control" id="namamapel" name="namamapel" placeholder="Nama Mata Pelajaran">
                    </div>
                    <div class="form-group">
                        <label for="semester">Jurusan:</label>
                        <select name="jurusan" id="jurusan" class="form-control">
                            <?php foreach ($jurusan as $m) : ?>
                            <option value="<?= $m['namajurusan']; ?>"><?= $m['namajurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                   
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> -->