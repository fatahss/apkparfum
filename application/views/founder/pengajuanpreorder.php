<style>
tr.yellow td{
  background-color: lightblue;
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

            <?= form_open_multipart('founder/addcart'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nomor PO</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-400" id="nomorpo" name="nomorpo" value="PO<?= $user['id']; ?><?= date('Ymd' , $date); ?><?= $pobaru; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Upline</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control bg-dark text-gray-400" id="upline" name="upline" value="<?= $upline['name']; ?>" readonly>
                </div>
            </div>
            
            
               
                <div class="form-group row" id="parfum_field">
                        <label for="semester" class="col-sm-3 col-form-label">Aroma Parfum:</label>
                        <div class="col-sm-10">
                        <select class="form-control selectpicker   " data-live-search="true" name="parfum" id="parfum" style="background-color: #FEECB5
;" >
                            
                            <?php foreach ($parfum as $m) : ?>
                            <option value="<?= $m['nama_parfum']."|".$m['harga_founder']."|".$m['id'] ?>" data-harga="<?= $m['harga_founder']; ?>"><?= $m['nama_parfum'],'; Harga : Rp. ',number_format($m['harga_founder'],0,',',',') ?></option>
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

                <!--<a href="<?= base_url('reseller/addcart'); ?>" class="badge badge-warning">Tambah</a>-->

                <button id="tambahdata" name="tambahdata" type="submit" class="btn btn-warning" >Tambah</button>
                <br></br>

                



        <!--<button type="button" class="btn-warning" onclick="addData(this)">Add</button>-->

                <table class="table-responsive">
               <table class="table table-bordered" id="list" cellspacing="3" cellpadding="3" border="3">
                <thead class="thead-dark">
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
                        <td><?= $r['nama_parfum']; ?></td>
                        <td>Rp. <?= number_format($r['harga'],0,',',',')?></td>
                        <td><?= $r['jumlah']; ?></td>
                       
                        
                        
                        <td>

                          
                           
                            <a href="<?= base_url('founder/deletecart/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
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

                
                
           
                        
                    
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                     
                    </div>
                    </div>

            
            </form>
            
           
            <div class="row-sm-10">
            <h4><a href="<?= base_url('founder/ajukanpo')?> " class="badge badge-primary ">Ajukan</a></h4>
            
            <h4><a href="<?= base_url('founder/cartreset')?> " class="badge badge-danger ">Reset</a></h4>
            </div>
            
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content --> 