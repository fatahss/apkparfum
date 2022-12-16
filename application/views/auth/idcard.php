

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">User Profile</h1>
                            </div>


                            
                               


                               


                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                <input type="text" class="form-control form-control-user bg-dark text-light" id="name" name="name" 
                                        placeholder="" , 

                                        value="<?=$user['name']?>" readonly> 
                                
                                            
                                    
                                </div>
                               
                                <div class="form-group">
                                <label>Role</label>
                                    <input type="text" class="form-control form-control-user bg-dark text-light" id="username" name="username" 
                                        placeholder="" value="<?= $user['role']?>"readonly>

                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                <input type="text" class="form-control form-control-user bg-dark text-light" id="name" name="name" 
                                        placeholder="" , 

                                        value="<?=$user['email']?>" readonly> 
                                
                                            
                                    
                                </div>
                               
                                <div class="form-group">
                                <label>Nomor Telepon</label>
                                    <input type="text" class="form-control form-control-user bg-dark text-light" id="username" name="username" 
                                        placeholder="" value="<?= $user['notelpon']?>"readonly>

                                </div>

                                
                             
                               
                          
                                <div class="form-group">
                                <div class="col-sm-5">
                                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                                </div>
                                </div>

                                *Terdaftar sejak <?= date('d F Y', $user['date_create']); ?>
                                            <br></br>
                                <div class="text-center">
                            </div>

                            <div class="col">
                                <div class="card border-info shadow h-100 py-2">
                                    <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Member</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($member) ?> User</div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                    </br>

                                <div class="col">
                                <div class="card border-info shadow h-100 py-2">
                                    <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Berhasil Menjual</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total ?> Produk</div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
</br>

                                <div class="text-center">
                           
                                <a class="small text-gray-900">Back to</a>
                                <a class="small text-danger" href="<?= base_url('auth'); ?>"> Home</a>
                            </div>



                               

                             

                             


                               


               

                           
                                
                         
                            <hr>
                            

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   