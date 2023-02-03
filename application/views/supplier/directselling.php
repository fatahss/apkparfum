<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="form-group">
        <a href="<?= base_url('supplier/directsellingbaru'); ?>" class="btn btn-primary mb-3">Tambah Direct Selling Baru</a>
    </div>

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


          <div class="row">

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Telah Menjual</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total ?> Produk</div>
          </div>
          <div class="col-auto">
            <i class="fas fa-solid fa-handshake fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Telah Menghasilkan</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($totalhasil,0,',',',')?></div>
          </div>
          <div class="col-auto">
            <i class="fas fa-duotone fa-dollar-sign fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

            <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">




                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nomor Direct Selling</th>
                        <th scope="col">Total Produk</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($directsellinguser as $r) : ?>
                        <tr>
                            <td><a data-toggle="modal" data-target="#detailPoModal<?php echo $r['no_direct_selling']; ?>" href="#" class="btn text-info font-weight-bold "><?= $r['no_direct_selling']; ?></a></td>
                            <td><?= $r['total_product']?></td>
                            <td>Rp. <?= number_format($r['total'],0,',',',')?></td>

                            <td><?= date('d F Y (H:i)', $r['created_at']);  ?></td>

                            <td>


                                <a href="<?= $r['id']; ?>" data-toggle="modal" data-target="#editUserModal" class="badge badge-info">Edit</a>

                                <a href="<?= base_url('supplier/deletedirectselling/') . $r['no_direct_selling']; ?> " class="badge badge-danger">Delete</a>
                            </td>
                        </tr>


                        <div class="modal fade" id="detailPoModal<?php echo $r['no_direct_selling']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="editUserModalLabel">Detail Direct Selling</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="<?= base_url('admin/menuparfumupdate/') . $r['id']; ?>" method="post">



                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Nomor Direct Selling:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder="" value="<?= $r['no_direct_selling']; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nama Pembeli:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['namapembeli']; ?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Total Produk:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="<?= $r['total_product']?>" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Sub Total:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($r['sub_total'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Ongkir:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($r['ongkir'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Diskon:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($r['diskon'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Total:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder="" value="Rp. <?= number_format($r['total'],0,',',',')?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="ijazah">Created at:</label>
                                                <input type="text" class="form-control bg-dark text-gray-100" id="created_at" name="created_at" placeholder="" value="<?= date('d F Y (H:i)', $r['created_at']);  ?>" readonly>
                                            </div>
                                            <a href="<?= base_url('supplier/directsellingdetail/') . $r['no_direct_selling']; ?> " class="badge badge-info">Lihat Detail</a>
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