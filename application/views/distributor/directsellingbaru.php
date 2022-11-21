<style>
tr.yellow td{
  background-color: lightblue;
}
</style>
<style>
.bootstrap-select > .dropdown-toggle.bs-placeholder:active {
  background: #000;
  color: #000;
  border-color: #999;
}
    </style>
<!-- Begin Page Content -->

  
<!-- Begin Page Content -->
<div class="container-fluid">
    <body oncontextmenu="return false;">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('distributor/addcart2'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Nomor Direct Selling</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-400" id="nomordirectselling" name="nomordirectselling" value="DS<?= $user['id']; ?><?= date('Ymd' , $date); ?><?= $directsellingbaru; ?>" readonly>
                </div>
            </div>

            

            
            
            
               
                <div class="form-group row" id="parfum_field">
                        <label for="semester" class="col-sm-3 col-form-label">Aroma Parfum:</label>
                        <div class="col-sm-10">
                        <select class="form-control selectpicker  " data-live-search="true" name="parfum" id="parfum" style="background-color: #FEECB5
;" >
                            
                            <?php foreach ($parfum as $m) : ?>
                            <option value="<?= $m['nama_parfum']."|".$m['harga_reseller']."|".$m['id'] ?>" data-harga="<?= $m['harga_reseller']; ?>"><?= $m['nama_parfum'],'; Harga : Rp. ',number_format($m['harga_reseller'],0,',',',')?></option>
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

                



        <!--<button type="button" class="btn-warning" onclick="addData(this)">Add</button>-->

                <table class="table-responsive">
               <table class="table table-bordered table-striped " id="list" cellspacing="3" cellpadding="3" border="3">
                <thead class="bg-dark text-gray-100">
                    <tr>
                        <th scope="col">Parfum</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        
                        <th scope="col">Action</th>
                       
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($cartuser as $r) : ?>
                    <tr>
                        <td><?= $r['product']; ?></td>
                        <td>Rp. <?= number_format($r['harga'],0,',',',')?></td>
                        <td><?= $r['jumlah']; ?></td>
                       
                        
                        
                        <td>

                          
                           
                            <a href="<?= base_url('distributor/deletecart2/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <tr class="yellow">
                        <td>Total :   </td>
                        <td><?php 
                            $sum = 0;
                            foreach($cartuser as $r){
                              if(isset($r))
                                 $sum += $r['harga'];
                            }
                            echo 'Rp. ' .number_format($sum,0,',',',');
                        ?></td>
                    </tr>
                </tbody>

                

            </table>
        </table>

        </form>



        <h4><a href="<?= base_url('distributor/cartreset2')?> " class="badge badge-danger ">Reset</a></h4>

        <?= form_open_multipart('distributor/tambahdirectselling'); ?>

        <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Ongkir</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control bg-dark text-gray-100" id="ongkir" name="ongkir" value="0">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Diskon</label>
                <div class="col-sm-10">
                    <select class="form-control bg-dark text-light " name="diskon" id="diskon">
                    <option value="0">0 %</option>
                     <option value="5">5 %</option>
                     <option value="10">10 %</option>
                     <option value="15">15 %</option>
                     <option value="20">20 %</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">  
                <label for="jumlahparfum" class="col-sm-3 col-form-label">Nama Pembeli :</label>
                <div class="col-sm-10">
                
                    <input type="text" class="form-control bg-dark text-gray-100" id="namapembeli" name="namapembeli"  min="0" >
                </div>
                </div>

            <button id="tambahdata" name="tambahdata" type="submit" class="btn btn-primary" >Submit</button>

                    </form>

                
                
           
                        
                    
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                     
                    </div>
                    </div>

            
            
            
           
            <div class="row-sm-10">
            <!--<h4><a href="<?= base_url('distributor/tambahdirectselling')?> " class="badge badge-primary ">Ajukan</a></h4>
                    -->
            
            </div>
            
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 