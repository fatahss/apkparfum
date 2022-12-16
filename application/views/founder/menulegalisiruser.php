<!-- Begin Page Content -->
<div class="container-fluid">
    <body oncontextmenu="return false;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="table-responsive text-nowrap">
        <div class="col-lg-6">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

             <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Nama..">

<table id="myTable" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">

                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nomor Pembayaran</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col ">Ijazah</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jumlah Legalisir</th>
                        <th scope="col">Kategori Paket</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($legalisiruser as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['id']; ?></td>
                        <td><?= $r['name']; ?></td>
                        <td><?= $r['ijazah']; ?></td>
                        <td><?= $r['notelpon']; ?></td>
                        <td><?= $r['alamat']; ?></td>
                        <td><?= $r['jumlahlegalisir']; ?></td>
                        <td><?= $r['kategoripaket']; ?></td>
                        <td><?= $r['harga']; ?></td>
                        <td><?= date('d F Y', $r['waktu']); ?></td>
                        <td><?= $r['status']; ?></td>
                      
                        <td>
                           
                            
                            <a href="<?= base_url('user/legalisirdelete/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                            
                            <!--<a href="<?= base_url('user/legalisirpembayaran/') . $r['id']; ?>"  class="badge badge-info">Upload Bukti Pembayaran</a>
                           
                            
                            <a href="<?= base_url('assets/buktipembayaran') . $r['buktipembayaran']; ?>"   class="badge badge-warning">Lihat Bukti Pembayaran</a>-->

                            <a href="<?= base_url('user/legalisirselesai/') . $r['id']; ?>" class="badge badge-success">Selesaikan</a>

                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
             </div>
    </div>
    <br></br>


             <!--<div class="row">
        <div class="col-lg-11">
                        <?= form_open_multipart('user/legalisirpembayaran/') ?>

         
            <div class="form-group row">
            <label for="buktipembayaran" class="col-sm col-form-label">Upload Bukti Pembayaran</label>
             <div class="custom-file col-sm-10"  >
                                <input type="file" class="custom-file-input" id="buktipembayaran" name="buktipembayaran"  >
                                <label class="custom-file-label" for="buktipembayaran">Pilih Foto Bukti Pembayaran</label>
                               
                            </div>
                        </div>
                        

                          <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                     <a href="<?= base_url('user/legalisirpembayaran/') . $r['id']; ?>"   class="badge badge-warning">Upload Bukti Pembayaran</a>
                   
                </div>

                 <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
                        -->

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
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
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