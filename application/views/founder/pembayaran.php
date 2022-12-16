<!-- Begin Page Content -->
<div class="container-fluid">
    <body oncontextmenu="return false;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="form-group row ">
                <div class="col-md">
                    <h4class class="text-left h4 mb-4 text-gray-800">Metode Pembayaran E-Money</h4>
                    <h4>Gopay :</h4>
                    <h4>Ovo :</h4>
                    <h4>Dana :</h4>
                    <br>
                    <h4>Metode Pembayaran Bank</h4>
                    <h4>Mandiri :</h4>
                    <h4>BCA :</h4>
                    <h4>BRI :</h4>
                    </br>
                </div>
            </div>


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/pembayaran'); ?>
          
          
                    <div class="form-group">
                        <label for="semester">Nomor Pemesanan:</label>
                        <select name="nomorpemesanan" id="nomorpemesanan" class="form-control">
                            <?php foreach ($legalisiruser as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['id']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nama Pengirim (Pada Bukti Pembayaran):</label>
                        <input type="text" class="form-control" id="atasnama" name="atasnama" placeholder="">
                        <?= form_error('atasnama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nominal Pembayaran (Pada Bukti Pembayaran):</label>
                        <input type="text" class="form-control" id="nominal" name="nominal" placeholder="">
                        <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>


                    <div class="form-group row">
            <label for="buktipembayaran" class="col-sm col-form-label">Upload Bukti Pembayaran</label>
             <div class="custom-file col-sm-10"  >
                                <input type="file" class="custom-file-input" id="buktipembayaran" name="buktipembayaran"  >
                                <label class="custom-file-label" for="buktipembayaran">Pilih Foto Bukti Pembayaran</label>
                               
                            </div>
                        </div>
                
           
                        
                    
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-info">Kirim</button>
                    

                    
                    <button type="button" class="btn btn-success" value="Input Button" onclick=" tombolwa()">Hubungi Admin</button>
                    </div>
                    </div>
                    
                



            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 