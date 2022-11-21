<?php
$nomorpotemp = 0;
//$podetailuser = $this->db->get_where('preorder_detail', ['nomorpo' => $nomorpotemp])->result_array();
?>
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
                    <th scope="col">Nomor DO</th>
                        <th scope="col">Nama Upline</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Total Produk</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Action</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($douser as $r) : ?>
                    <tr>
                    <td><a data-toggle="modal" data-target="#detailDoModal<?php echo $r['nomordo']; ?>"  href="#" class="btn text-info font-weight-bold "><?= $r['nomordo']; ?></a></td>
                    <td><?= $r['nama_requester'];  ?></td>
                    <td>Rp. <?= number_format($r['total_harga'],0,',',',')?></td>
                    <td><?= $r['total_product'];  ?></td>

                        <td><?= $r['status'];  ?></td>
                        
                        <td><?= date('d F Y (H:i)', $r['created_at']);  ?></td>
                        
                        <td>
                            <?php if($r['status'] == 'Sedang dalam Pengiriman'){ ?>

                        <a id="tombolselesai" nama="tombolselesai" href="<?= base_url('founder/selesaikandeliveryorder/') . $r['nomordo']; ?>"  class="badge badge-primary">Selesaikan DO</a>
                            <?php } ?>  
                        </td>
                    </tr>
                     


                    <div class="modal fade" id="detailDoModal<?php echo $r['nomordo']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title text-gray-900" id="editUserModalLabel">Detail Preorder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <form action="<?= base_url('admin/menuparfumupdate/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                <div class="form-group" >
                        <label for="name" class="text-gray-900">Nomor DO:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomordo']; ?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="name" class="text-gray-900">Nomor PO:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorpo']; ?>" readonly>
                    </div>

                    <div class="form-group">
                            <label for="name">Nomor Invoice:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorinvoice']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Nomor Pembayaran:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorpembayaran']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Sub Total:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="Rp. <?= number_format($r['total_harga'],0,',',',')?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Total Produk:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['total_product']; ?>" readonly>
                        </div>

                    <div class="form-group">
                        <label for="name" class="text-gray-900">Nama Upline:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nama_requester']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-gray-900">Jasa Paket:</label>
                        <input type="text" class="form-control bg-dark text-gray-100"  id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['paket']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-gray-900">Nomor Resi:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nomorresi']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Harga Paket:</label>
                        <input type="text" class="form-control" id="hargapaket" name="hargapaket" placeholder="" value="Rp. <?= number_format($r['hargapaket'],0,',',',')?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Note:</label>
                        <input type="text" class="form-control" id="note" name="note" placeholder="" value="<?= $r['note']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-gray-900">Status:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['status']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="ijazah" class="text-gray-900">Created at:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= date('d F Y (H:i)', $r['created_at']);  ?>"readonly>
                    </div>
                    <a href="<?= base_url('founder/deliveryorderuplinedetail/') . $r['nomordo']; ?> " class="badge badge-info">Lihat Detail</a>
        </form>
                 
                   
               
                </div>
                   

                   
                   
                

                <div class="modal-footer">
                    
                </div>
           
        </div>
    </div>
</div> 

 <!-- Modal -->
 <div class="modal fade" id="addDoModal<?php echo $r['nomorpo']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Pengajuan Delivery Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="<?= base_url('founder/pengajuandeliveryorder/') . $r['nomorpo']; ?>" method="post">
                <div class="modal-body">
                <div class="form-group" >
                        <label for="name">Nomor DO:</label>
                        <input type="text" class="form-control" id="nomorpo" name="nomordo" placeholder="Nomor DO" value="DO<?= date('Ymd' , $date); ?><?= $dobaru; ?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="name">Nomor PO:</label>
                        <input type="text" class="form-control" id="nomorpo" name="nomorpo" placeholder="Nomor PO" value="<?= $r['nomorpo']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Jasa Paket:</label>
                        <input type="text" class="form-control" id="paket" name="paket" placeholder="Jasa Paket" value="">
                    </div>
                

                    <div class="form-group">
                        <label for="name">Nomor Resi:</label>
                        <input type="text" class="form-control" id="nomorresi" name="nomorresi" placeholder="Nomor Resi" value="">
                    </div>
                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href="" type="submit" class="btn btn-primary">Ajukan</button>
                </div>
                </form>
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
                    
    </div>
        </div>   