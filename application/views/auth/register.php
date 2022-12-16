

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Masukkan data diri</h1>
                            </div>

                            <?= form_open_multipart('auth/register'); ?>

                            
                               

                                <?= $this->session->flashdata('message'); ?>

                               


                                <? // membuat kolom nama, nisn, email, dll untuk pembuatan akun baru // ?>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" 
                                        placeholder="Nama Lengkap" , 

                                        value="<?= set_value('name'); // berfungsi untuk mengembalikan value yang sudah diisi saat login gagal // ?>" > 
                                
                                          <?= form_error('name' ,'<small class="text-danger pl-3">','</small>'); //  untuk menampilkan text saat validasi salah yang sudah dibuat // ?>
                                            
                                    
                                </div>
                               
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" 
                                        placeholder="Username" value="<?= set_value('username');?>">

                                        <?= form_error('username' ,'<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                 <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" 
                                        placeholder="Password" value="<?= set_value('password');?>">

                                        <?= form_error('password' ,'<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                             
                               
                          
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="notelpon" name="notelpon" 
                                        placeholder="Nomor Telepon" value="<?= set_value('notelpon');?>">

                                        <?= form_error('notelpon' ,'<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" 
                                        placeholder="Email" value="<?= set_value('email');?>">

                                        <?= form_error('email' ,'<small class="text-danger pl-3">','</small>'); ?>
                                </div>

                                <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" 
                                        placeholder="Alamat Lengkap" value="<?= set_value('alamat');?>">

                                        <?= form_error('alamat' ,'<small class="text-danger pl-3">','</small>'); ?>
                                </div>

                                <div class="form-group">
                                <label for="role">Role:</label>
                                <select class="form-control" name="role" id="role">
                                <option>Supplier</option>
                                <option>Distributor</option>
                                <option>Reseller</option>

                                </select>
                                 
                                </div>

                                <!--<div class="form-group">
                                <label for="role">Role Upline:</label>
                                <select class="form-control" name="roleupline" id="roleupline">
                                    <option>Founder</option>
                                <option>Supplier</option>
                                <option>Distributor</option>
                                

                                </select>

                                 <a href="<?= base_url('auth/cariupline')?>" class="badge badge-info">Cari Upline</a>
                                </div>-->


                                <div class="form-group">
                        <label for="semester">Upline:</label>
                        <select name="upline" id="upline" class="form-control selectpicker   " data-live-search="true">
                            <?php foreach ($dataupline as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['name']; ?> | <?= $m['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>


               

                                <? // button submit ?>
                                <button type="submit" class="btn btn-info btn-user btn-block">
                                    Daftar Akun
                                </button>
                                
                         
                            <hr>
                            

                           <? //   menuju ke halaman registrasi // ?>
                            <div class="text-center">
                            <a class="small text-gray-900">Have an account already ?</a>
                                <a class="small" href="<?= base_url(); ?>auth/login">Login Now</a></br>
                                <a class="small text-gray-900">Back to</a>
                                <a class="small text-danger" href="<?= base_url('auth'); ?>"> Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   