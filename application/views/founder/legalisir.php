<!-- Begin Page Content -->
<div class="container-fluid">
    <body oncontextmenu="return false;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/legalisir'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="ijazah" class="col-sm-3 col-form-label">Nomor Ijazah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="ijazah" name="ijazah" value="<?= $user['ijazah']; ?>" readonly>
                </div>
            </div>
            
               
                <div class="form-group">
                <label for="jumlahlegalisir">Jumlah Legalisir:</label>
                    <select class="form-control" name="jumlahlegalisir" id="jumlahlegalisir">
                     <option>5 Lembar</option>
                     <option>10 Lembar</option>
                     <option>15 Lembar</option>
                     <option>20 Lembar</option>

                    </select>
                    </div>
                
                <div class="form-group">
                <label for="kategoripaket">Kategori Paket:</label>
                    <select class="form-control" name="kategoripaket" id="kategoripaket">
                     <option  onclick="$data['harga'] = 50000">Cepat Kab. Bekasi (1 hari) = Rp.50000,00</option>
                     <option  onclick="$data['harga'] = 65000">Cepat Luar Kab. Bekasi (1 hari) = Rp.65000,00</option>
                     <option onclick="$data['harga'] = 35000">Biasa Kab. Bekasi (3 sampai 5 hari) = Rp.35000,00</option>
                     <option onclick="$data['harga'] = 40000">Biasa Luar Kab. Bekasi (3 sampai 5 hari) =  Rp.40000,00</option>
                     <option onclick="$data['harga'] = 50000">Biasa Luar Jawa Barat (5 hari lebih) =  Rp.50000,00</option>

                    </select>
                    </div>

                      <div class="form-group row">
                <label for="admin" class="col-sm-3 col-form-label">Biaya Admin</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="admin" name="admin" value="Rp.3000,00" readonly>
                </div>
                </div>

               

                <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-10 mb">
                    <input type="text" class="form-control" id="alamat" name="alamat" >
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                </div>
                <div class="form-group row">
                <label for="notelpon" class="col-sm-3 col-form-label">Nomor Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="notelpon" name="notelpon" value="<?= $user['notelpon']; ?>" readonly>
                </div>
            </div>
                
                
           
                        
                    
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ajukan</button>
                    </div>
                    </div>

                    
                



            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 