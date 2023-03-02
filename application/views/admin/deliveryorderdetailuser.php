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



                                        
                                    <div class="form-group" >
                        <label for="name" class="text-gray-900">Nomor DO:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $directsellinguser['nomordo']; ?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="name" class="text-gray-900">Nomor PO:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $directsellinguser['nomorpo']; ?>" readonly>
                    </div>

                    <div class="form-group">
                            <label for="name">Nomor Invoice:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $directsellinguser['nomorinvoice']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Nomor Pembayaran:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $directsellinguser['nomorpembayaran']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Sub Total:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="Rp. <?= number_format($directsellinguser['total_harga'],0,',',',')?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Total Produk:</label>
                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $directsellinguser['total_product']; ?>" readonly>
                        </div>
                        <div class="form-group">
                        <label for="name" class="text-gray-900">Nama Pengirim:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $directsellinguser['nama_requester']; ?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name" class="text-gray-900">Nama Penerima:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $directsellinguser['nama_receiver']; ?>"readonly>
                    </div>
                   
                    <div class="form-group">
                        <label for="name" class="text-gray-900">Jasa Paket:</label>
                        <input type="text" class="form-control bg-dark text-gray-100"  id="nama_upline" name="nama_upline" placeholder="" value="<?= $directsellinguser['paket']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-gray-900">Nomor Resi:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $directsellinguser['nomorresi']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Harga Paket:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="hargapaket" name="hargapaket" placeholder="" value="Rp. <?= number_format($directsellinguser['hargapaket'],0,',',',')?>"readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Note:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="note" name="note" placeholder="" value="<?= $directsellinguser['note']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-gray-900">Status:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $directsellinguser['status']; ?>"readonly>
                    </div>
                    <div class="form-group">
                        <label for="ijazah" class="text-gray-900">Created at:</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= date('d F Y (H:i)', $directsellinguser['created_at']);  ?>"readonly>
                    </div>
                        
                                            <table class="table-responsive">
                                            <table class="table table-striped" width="100%" cellspacing="0">
                                                <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">Parfum</th>
                                                            <th scope="col">Harga</th>
                                                            <th scope="col">Jumlah</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($directsellinguserdetail as $r) : ?>
                                                            <tr>
                                                                <td><?= $r['nama_parfum']; ?></td>
                                                                <td>Rp. <?= number_format($r['harga'],0,',',',')?></td>
                                                                <td><?= $r['qty']; ?></td>

                                                            </tr>
                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </table>






                                        <div class="modal-footer">
                                            <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Edit</button>-->
                                        </div>
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