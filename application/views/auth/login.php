<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0 " style="background: #FEECB5;">
                    <!-- Nested Row within Card Body -->
                    <div class="row">


                                   
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="col-md">
                                        </div>
                                            <div class="text-center">

                                    
                                                <h1 class="h4 text-gray-900 mb-4 " style="font-family: 'Frunch';">Welcome Back</h1>
                                    
                                            </div>

                                                <?= $this->session->flashdata('message'); ?>

                                                <form class="user" method="post" action="<?= base_url('auth/login'); ?>">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Username Anda " value="<?= set_value('username'); ?>">
                                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        
                                            </div>
                                    
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        
                                    </div>
                                 

                    <div class="form-group row">
                    <div class="custom-control custom-checkbox small col-sm">
                        <div class="col-sm-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label text-gray-900" for="customCheck">Remember</label>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-12">
                        <a class="small text-gray-900" href="<?= base_url('auth/register'); ?>"> Forgot Password</a>
                        </div>
                        </div>
                        
                    
                         </div>


                                    
                                    <button type="submit" class="btn btn-dark btn-user btn-block">
                                        Login
                                    </button>
                                    
                                </form>

                                <hr>
                               
                                <div class="text-center">
                                <a class="small text-gray-900">Don't have an account ?</a>
                                <a class="small text-info" href="<?= base_url('auth/register'); ?>"> Sign up</a></br>
                                <a class="small text-gray-900">Back to</a>
                                <a class="small text-danger" href="<?= base_url('auth'); ?>"> Home</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="<?= base_url('assets'); ?>/img/baba.jpg" width="100%">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div> 