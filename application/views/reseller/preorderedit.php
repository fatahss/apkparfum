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


                
                   
                                    <?= form_open_multipart('reseller/addpreorderitem'); ?>



                                        
                                    <div class="form-group">
                            <label for="name">Nomor PO:</label>
                            <input type="text" class="form-control bg-dark text-gray-400" id="nomorpo" name="nomorpo" placeholder="Nomor PO" value="<?= $directsellinguser['nomorpo']; ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="name">Upline:</label>
                            <input type="text" class="form-control bg-dark text-gray-400" id="nama_upline" name="nama_upline" placeholder="Nama Upline" value="<?= $directsellinguser['nama_upline']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ijazah">Created at:</label>
                            <input type="text" class="form-control bg-dark text-gray-400" id="created_at" name="created_at" placeholder="Created at" value="<?= date('d F Y (H:i)', $directsellinguser['created_at']);  ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="ijazah">Status:</label>
                            <input type="text" class="form-control bg-dark text-gray-400" id="created_at" name="created_at" placeholder="Status" value="<?= $directsellinguser['status'];  ?>" readonly>
                        </div>

                        

                        <div class="form-group row" id="parfum_field">
                        <label for="semester" class="col-sm-3 col-form-label">Aroma Parfum:</label>
                        <div class="col-sm-10">
                        <select class="form-control selectpicker  " data-live-search="true" name="parfum" id="parfum" style="background-color: #FEECB5
;" >
                            
                            <?php foreach ($parfum as $m) : ?>
                            <option value="<?= $m['nama_parfum']."|".$m['harga_reseller'] ?>" data-harga="<?= $m['harga_reseller']; ?>"><?= $m['nama_parfum'],'; Harga : ',$m['harga_reseller']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                    </div>
                   

                 <div class="form-group row">  
                <label for="jumlahparfum" class="col-sm-3 col-form-label">Jumlah Parfum :</label>
                <div class="col-sm-10">
                
                    <input type="Number" class="form-control bg-dark text-gray-100" id="jumlahparfum" name="jumlahparfum" value="0" min="0" >
                </div>
                </div>

                <!--<a href="<?= base_url('reseller/addcart2'); ?>" class="badge badge-warning">Tambah</a>-->

                <button id="tambahdata" name="tambahdata" type="submit" class="btn btn-warning" >Tambah</button>
                <br></br>

                                    </form>
                        
                                            <table class="table-responsive">
                                            <table class="table table-striped" width="100%" cellspacing="0">
                                                <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col">Parfum</th>
                                                            <th scope="col">Harga</th>
                                                            <th scope="col">Jumlah</th>
                                                            <th scope="col">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($directsellinguserdetail as $r) : ?>
                                                            <tr>
                                                                <td><?= $r['product']; ?></td>
                                                                <td><?= $r['harga']; ?></td>
                                                                <td><?= $r['qty']; ?></td>
                                                                <td>

                          
                           
                                                                <a href="<?= base_url('reseller/deletepreorderitem/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                                                                </td>

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