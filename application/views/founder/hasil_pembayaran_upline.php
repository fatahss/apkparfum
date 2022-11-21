
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




          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">

            

           
          <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nomor Pembayaran</th>
                        <th scope="col">Nama Upline</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Total Produk</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pembayaranuser as $r) : ?>
                    <tr>
                    <td><a data-toggle="modal" data-target="#detailProductModal<?php echo $r['nomorpembayaran']; ?>"  href="#" class="btn text-info font-weight-bold "><?= $r['nomorpembayaran']; ?></a></td>
                    <td><?= $r['nama_receiver'];  ?></td>
                    
                    <td>Rp. <?= number_format($r['total'],0,',',',')?></td> 
                    <td><?= $r['total_product'];  ?></td>  
                        <td>Rp. <?= number_format($r['nominal'],0,',','.')?></td>
                        <td><?= $r['status'];  ?></td>
                        <td><?= date('d F Y (H:i)', $r['created_at']);  ?></td>
                        <td>
                        <?php if($r['status'] == 'Pembayaran belum ter Verifikasi'){ ?>



                        <a href="<?= base_url('founder/deletepembayaran/') . $r['nomorpembayaran']; ?> " class="badge badge-danger">Delete</a>
                        <?php } ?>  
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
                        <label for="name">Nama Upline :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nama_receiver']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Total Harga :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($r['total'],0,',',',')?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Total Produk :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['total_product']?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Atas Nama :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['atasnama']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Nominal :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($r['nominal'],0,',','.')?>"readonly>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
                     <!-- Modal -->
                     <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">PO Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          
            
           
            
        </div>
    </div>
        </div>   