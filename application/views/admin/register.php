

    <div class="container-fluid">

        
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Masukkan data Alumni</h1>
                            </div>

                            <?= form_open_multipart('admin/register'); ?>

                            
                               

                                <?= $this->session->flashdata('message'); ?>

                               


                                <? // membuat kolom nama, nisn, email, dll untuk pembuatan akun baru // ?>
                                <div class="form-group">
                                <label for="name">Nama Lengkap:</label>
                                <input type="text" class="form-control form-control-user" id="name" name="name" 
                                        placeholder="" , 

                                        value="<?= set_value('name'); // berfungsi untuk mengembalikan value yang sudah diisi saat login gagal // ?>" > 
                                
                                          <?= form_error('name' ,'<small class="text-danger pl-3">','</small>'); //  untuk menampilkan text saat validasi salah yang sudah dibuat // ?>
                                            
                                    
                                </div>
                               
                                <div class="form-group">
                                    <label for="name">Ijazah:</label>
                                    <input type="text" class="form-control form-control-user" id="ijazah" name="ijazah" 
                                        placeholder="" value="<?= set_value('ijazah');?>">

                                        <?= form_error('ijazah' ,'<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                 <div class="form-group">
                                    <label for="name">Password:</label>
                                    <input type="text" class="form-control form-control-user" id="password" name="password" 
                                        placeholder="Password" value="123456" readonly>

                                </div>
                             
                               
                          
                                <div class="form-group">
                                    <label for="name">Nomor NIS:</label>
                                <input type="text" class="form-control form-control-user" id="nis" name="nis" 
                                        placeholder="" value="<?= set_value('nis');?>">

                                        <?= form_error('nis' ,'<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Orang Tua:</label>
                                <input type="text" class="form-control form-control-user" id="namaortu" name="namaortu" 
                                        placeholder="" value="<?= set_value('namaortu');?>">

                                        <?= form_error('namaortu' ,'<small class="text-danger pl-3">','</small>'); ?>
                                </div>

                               <div class="form-group row">

                             <div class="col-sm">
                                <label for="name">PDF Ijazah:</label>
                        <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputpdf" name="inputpdf">
                                <label class="custom-file-label" for="inputpdf">Pilih PDF Ijazah</label>
                            </div>
                            </div>
                            </div>


               

                                <? // button submit ?>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat Akun
                                </button>
                                
                         
                            <hr>
                            

                        </div>
                    </div>
                </div>
            </div>
       

   