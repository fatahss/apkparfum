
<!-- Begin Page Content -->
<div class="container-fluid">
   

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    

    <div class="row">
        <div class="table-responsive text-nowrap">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>


             <!--<form class="d-none d-sm-inline-block form-inline  navbar-search">
           <div class="input-group">
            <div class="form-outline">
            <input id="search-focus" type="search" id="form1" class="form-control" />
            </div>
            <button type="button" class="btn btn-primary">
              <i class="fas fa-search"></i>
            </button>
            </div>
        
          </form>--> 


          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Memiliki</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalinv ?> Produk</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-wine-bottle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">

            

           
          <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Jumlah</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($inventoryuser as $r) : ?>
                    <tr>
                    <td><a data-toggle="modal" data-target="#detailProductModal<?php echo $r['product_id']; ?>"  href="#" class="btn text-info font-weight-bold "><?= $r['nama_parfum']; ?></a></td>
                        
                        <td><?= $r['nama_kategori'];  ?></td>
                        <td><?= $r['jumlah'];  ?></td>
                        
                        
                       
                    </tr>


                    <div class="modal fade" id="detailProductModal<?php echo $r['product_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Detail Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                 


                <div class="modal-body">
                    <div class="form-group" >
                        <label for="name">Aroma Parfum :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder=" " value="<?= $r['nama_parfum']; ?>" readonly>
                    </div>
                    <div class="form-group" >
                        <label for="name">Kategori :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nomorpo" name="nomorpo" placeholder=" " value="<?= $r['nama_kategori']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="name">Jumlah :</label>
                        <input type="text" class="form-control bg-dark text-gray-100" id="nama_upline" name="nama_upline" placeholder=" " value="<?= $r['jumlah']; ?>"readonly>
                    </div>
                    
                    
                </div>
                   

                   
                   
                

                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Edit</button>-->
                </div>
            </form>
        </div>
    </div>
</div> 


                   


             
                    <?php $i++; ?>
            <?php endforeach; ?>  
                </tbody>
          </table>
           

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
                     <!-- Modal -->
                     <div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">PO Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          
            
           
            
        </div>
    </div>
        </div>   