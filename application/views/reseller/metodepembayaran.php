<!-- Begin Page Content -->
<div class="container-fluid">
    <body oncontextmenu="return false;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>


    <div class="row">
        <div class="col-lg-11">

           

            <?= form_open_multipart('reseller/metodepembayaran'); ?>

            <div class="form-group row">
                <label for="notelpon" class="col-sm-2 col-form-label">Metode</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-100" id="metode" name="metode" value="">
                    <?= form_error('metode', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>

                <div class="form-group row">
                <label for="notelpon" class="col-sm-2 col-form-label">Atas Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-100" id="atasnama" name="atasnama" value="">
                    <?= form_error('atasnama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>

                <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nomor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-100" id="nomor" name="nomor" value="">
                    <?= form_error('nomor', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>

                <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
            </form>

            <table class="table-responsive">
                                            <table class="table table-striped" width="100%" cellspacing="0">
                                                <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">Metode</th>
                                                            <th scope="col">Atas Nama</th>
                                                            <th scope="col">Nomor</th>
                                                            <th scope="col">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($metodeuser as $r) : ?>
                                                            <tr>
                                                                <td><?= $r['metode']; ?></td>
                                                                <td><?= $r['atasnama']; ?></td>
                                                                <td><?= $r['nomor']; ?></td>
                                                                <td>
                                                                <a href="#" data-toggle="modal" data-target="#detailProductModal<?php echo $r['id']; ?>" class="badge badge-info">Edit</a>
                                                                <a href="<?= base_url('reseller/deletemetode/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                                                            </td>
                                                            </tr>
                                                            <div class="modal fade" id="detailProductModal<?php echo $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Detail Preorder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('reseller/updatemetode/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                    <div class="form-group" >
                        <label for="name">Metode Pembayaran :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="metode" name="metode" placeholder="" value="<?= $r['metode']; ?>" >
                    </div>

                    <div class="form-group">
                        <label for="name">Atas Nama :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="atasnama" name="atasnama" placeholder="" value="<?= $r['atasnama']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="name">Nomor :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomor" name="nomor" placeholder="" value="<?= $r['nomor']; ?>">
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
                                            </table>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 