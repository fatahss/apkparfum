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
                        <th scope="col">Nomor PO</th>
                        <th scope="col">Nama Pengirim</th>
                        <th scope="col">Nama Penerima</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Total Produk</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($preorder as $r) : ?>
                    <tr>
                    <td><a data-toggle="modal" data-target="#detailPoModal<?php echo $r['nomorpo']; ?>"  href="#" class="btn text-info font-weight-bold "><?= $r['nomorpo']; ?></a></td>
                        <td><?= $r['nama_downline'];  ?></td>
                        <td><?= $r['nama_upline'];  ?></td>
                        <td>Rp. <?= number_format($r['total_harga'],0,',',',')?></td>
                        <td><?= $r['total_product'];  ?></td>
                        <td><?= $r['status'];  ?></td>
                        
                        <td><?= date('d F Y (H:i)', $r['created_at']);  ?></td>
                        
                        <td>

                         <!--<a  href="" data-toggle="modal" data-target="#editUserModal" class="badge badge-info">Edit</a>-->
                           
                            <a href="<?= base_url('admin/deletepo/') . $r['nomorpo']; ?> " class="badge badge-danger">Delete</a>

                        </td>
                    </tr>


                    <div class="modal fade" id="detailPoModal<?php echo $r['nomorpo']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Detail Preorder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/menuparfumupdate/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                    <div class="form-group" >
                        <label for="name">Nomor PO:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorpo']; ?>" readonly>
                    </div>

                    <div class="form-group">
                            <label for="name">Nomor DO:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomordo']; ?>" readonly>
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
                            <label for="name">Total Harga:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="Rp. <?= number_format($r['total_harga'],0,',',',')?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Total Produk:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['total_product']; ?>" readonly>
                        </div>

                    <div class="form-group">
                        <label for="name">Nama Pengirim:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nama_downline']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Penerima:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nama_upline']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Status:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['status']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Tanggal:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= date('d F Y (H:i)', $r['created_at']);  ?>"readonly>
                    </div>

                    <a href="<?= base_url('admin/preorderdetail/') . $r['nomorpo']; ?> " class="badge badge-info">Lihat Detail</a>

               
                </div>
                   

                   
                   
                

                <div class="modal-footer">
                    
                </div>
            </form>
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
                <form action="<?= base_url('distributor/pengajuandeliveryorder/') . $r['nomorpo']; ?>" method="post">
                <div class="modal-body">
                <div class="form-group" >
                        <label for="name">Nomor DO:</label>
                        <input type="text" class="form-control" id="nomordo" name="nomordo" placeholder="" value="DO<?=$user['id']?><?= date('Ymd' , $date); ?><?= $dobaru; ?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="name">Nomor PO:</label>
                        <input type="text" class="form-control" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorpo']; ?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="name">Total Harga:</label>
                        <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="" value="<?= $r['total_harga']; ?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="name">Total Produk:</label>
                        <input type="text" class="form-control" id="total_product" name="total_product" placeholder=" " value="<?= $r['total_product']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Jasa Paket:</label>
                        <input type="text" class="form-control" id="paket" name="paket" placeholder="*Jika COD maka tulis COD" value="">
                    </div>
                

                    <div class="form-group">
                        <label for="name">Nomor Resi:</label>
                        <input type="text" class="form-control" id="nomorresi" name="nomorresi" placeholder="*Kosongkan jika COD" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Harga Paket:</label>
                        <input type="text" class="form-control" id="hargapaket" name="hargapaket" placeholder="*Kosongkan jika COD" value="">
                    </div>
                    <div class="form-group">
                        <label for="name">Note:</label>
                        <input type="text" class="form-control" id="note" name="note" placeholder="*Kosongkan jika tidak ada catatan" value="">
                    </div>

                </div>
                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href="" type="submit" class="btn btn-primary">Ajukan</button>
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
                    
    </div>
        </div>   