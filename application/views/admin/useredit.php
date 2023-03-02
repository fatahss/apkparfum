<!-- Begin Page Content -->
<div class="container-fluid">
    <body oncontextmenu="return false;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>


    <div class="row">
        <div class="col-lg-11">

            <?= form_open_multipart('admin/menuuseredit'); ?>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-400" id="id" name="id" value="<?= $user['id']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-100" id="name" name="name" value="<?= $user['name']; ?>" >
                </div>
            </div>
           
             

                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-100" id="username" name="username" value="<?= $user['username']; ?>">
                </div>
                </div>


                <div class="form-group row">
                <label for="notelpon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-100" id="notelpon" name="notelpon" value="<?= $user['notelpon']; ?>">
                    <?= form_error('notelpon', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>

                <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-100" id="email" name="email" value="<?= $user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>

                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    Current : <?= $user['role']; ?>
                <select class="form-control bg-dark text-gray-100" name="role" id="role" aria-selected="<?= $user['role']; ?>">
                                    <option>Founder</option>
                                <option>Supplier</option>
                                <option>Distributor</option>
                                <option>Reseller</option>
                                

                                </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Upline</label>
                <div class="col-sm-10">
                Current : <?= $user['upline_name']; ?>
                <select class="form-control selectpicker   " data-live-search="true" id="upline" name="upline"  style="background-color: #FEECB5 
;" >
                            
                            <?php foreach ($dataupline as $m) : ?>
                            <option value="<?= $m['id']."|".$m['name']?>" ><?= $m['name'] ?> | <?= $m['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
            </div>
                
                <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-100" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
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



                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" value="<?php echo $user['id']; ?>" class="btn btn-primary">Edit</button>
                </div>
            </div>


            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 