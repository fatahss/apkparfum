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
                        <th scope="col">Nomor Invoice</th>
                        <th scope="col">Total</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tanggal</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($invoiceuser as $r) : ?>
                        <tr>
                            <td><a data-toggle="modal" data-target="#detailPoModal<?php echo $r['nomorinvoice']; ?>" href="#" class="btn text-info font-weight-bold "><?= $r['nomorinvoice']; ?></a></td>
                            <td>Rp. <?= number_format($r['total'],0,',',',')?></td>
                            <td><?= $r['status'];  ?></td>
                            <td><?= date('d F Y (H:i)', $r['created_at']);  ?></td>

                            

                        </tr>




                        <div class="modal fade" id="detailPoModal<?php echo $r['nomorinvoice']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
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
                                            <div class="form-group">
                                                <label for="name">Nomor Invoice:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorinvoice']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nomor Preorder:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomorpo']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nomor Delivery Order:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['nomordo']; ?>" readonly>
                                            </div>
                                            <div class="form-group" >
                                            <label for="name">Nomor Pembayaran :</label>
                                            <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="Nomor Pembayaran" value="<?= $r['nomorpembayaran']; ?>" readonly>
                                        </div>
                                            

                                            <div class="form-group">
                                                <label for="name">Nama Member:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['nama_receiver']; ?>" readonly>
                                            </div>
                                            <!--<div class="form-group">
                                                <label for="name">Sub Total:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="Sub Total" value="<?= $r['sub_total']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Ongkir:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="Ongkir" value="<?= $r['ongkir']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Diskon:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="Diskon" value="<?= $r['diskon']; ?>" readonly>
                                            </div>-->
                                            <div class="form-group">
                                                <label for="name">Total:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($r['total'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="ijazah">Created at:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= date('d F Y (H:i)', $r['created_at']);  ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="ijazah">Status:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= $r['status'];  ?>" readonly>
                                            </div>
                                            
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






            <!-- /.container-fluid -->

        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->

<!-- Modal -->