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
                                                <label for="name">Nomor Direct Selling:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $directsellinguser['no_direct_selling']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama Pembeli:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $directsellinguser['namapembeli']; ?>" readonly>
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
                                            <div class="form-group">
                                                <label for="name">Total Produk:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $directsellinguser['total_product']?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Sub Total:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($directsellinguser['sub_total'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Ongkir:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($directsellinguser['ongkir'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Diskon:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($directsellinguser['diskon'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Total :</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($directsellinguser['total'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="ijazah">Created at:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= date('d F Y (H:i)', $directsellinguser['created_at']);  ?>" readonly>
                                            </div>
                                            






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