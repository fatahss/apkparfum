<!-- Begin Page Content -->
<div class="container-fluid">
    <body oncontextmenu="return false;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>


    <div class="row">
        <div class="col-lg-11">

            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                </div>
            </div>
           
                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nomor Ijazah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ijazah" name="ijazah" value="<?= $user['ijazah']; ?>"readonly>
                </div>
                </div>

                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nis" name="nis" value="<?= $user['nis']; ?>"readonly>
                </div>
                </div>

                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $user['nisn']; ?>"readonly>
                </div>
                </div>

                <div class="form-group row">
                <label for="notelpon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="notelpon" name="notelpon" value="<?= $user['notelpon']; ?>">
                    <?= form_error('notelpon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>

                <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>
                
                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="namaortu" name="namaortu" value="<?= $user['namaortu']; ?>"readonly>
                </div>
            </div>


             

                            

            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                        </div>
                        </div>
                         </div>



                           <div class="form-group row">
                            <div class="col-sm-2">PDF Ijazah</div>
                             <div class="col-sm">
                       
                                
                                <input type="text" class="form-control" id="" name="" value="<?= $user['pdfijazah']; ?>"readonly>
                           
                               </div>

                  
                       

                           

                        
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>


            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 