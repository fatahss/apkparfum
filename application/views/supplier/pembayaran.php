<!-- Begin Page Content -->
<div class="container-fluid">
    <body oncontextmenu="return false;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('supplier/ajukanpembayaran'); ?>
          
          
            <div class="form-group">
                        <label for="namamapel">Nomor Pembayaran:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="nomorpembayaran" name="nomorpembayaran" placeholder="" value="PYM<?= $user['id']; ?><?= date('Ymd' , $date); ?><?= $pembayaranbaru; ?>" readonly>
                    </div>     
            <div class="form-group">
                        <label for="namamapel">Nomor Invoice:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="nomorinvoice" name="nomorinvoice" placeholder="" value="<?= $invoice['nomorinvoice']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nomor DO:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="nomordo" name="nomordo" placeholder="" value="<?= $invoice['nomordo']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nomor PO:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="nomorpo" name="nomorpo" placeholder="" value="<?= $invoice['nomorpo']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nama Upline:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="namaupline" name="namaupline" placeholder="" value="<?= $invoice['nama_requester']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Total Harga:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="dsssss" name="dsssss" placeholder="" value="Rp. <?= number_format($invoice['total'],0,',',',')?>" readonly>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control bg-dark text-gray-400" id="total_harga" name="total_harga" placeholder="" value="<?= $invoice['total']?>" readonly hidden>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Total Produk:</label>
                        <input type="text" class="form-control bg-dark text-gray-400" id="total_product" name="total_product" placeholder="" value="<?= $invoice['total_product']; ?>" readonly>
                    </div>
                    Metode Pembayaran : 
                    <?php
                    
                    foreach($metodepembayaran as $r) : ?>
                            
                    </br>  
                    <?= $r['metode'];?> a/n <?= $r['atasnama'];?> - <?= $r['nomor'];?>
                            
                            <?php endforeach; ?>  
                    <br></br>
                    <div class="form-group">
                        <label for="namamapel">Nama Pengirim (Pada Bukti Pembayaran):</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="atasnama" name="atasnama" placeholder="">
                        <?= form_error('atasnama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nominal Pembayaran (Pada Bukti Pembayaran):</label>
                        <input type="number" class="form-control bg-dark text-gray-100" id="nominal" name="nominal" placeholder="" value="<?= $invoice['total']; ?>">
                        <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>


                    <div class="form-group row">
            <label for="buktipembayaran" class="col-sm col-form-label">Upload Bukti Pembayaran</label>
             <div class="custom-file"  >
                                <input type="file" class="custom-file-input" id="buktipembayaran" name="buktipembayaran"  >
                                <label class="custom-file-label" for="buktipembayaran">Choose File</label>
                               
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