<!-- Begin Page Content -->
<div class="container-fluid" >
 
<?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <h1 class="text-center h3 mb-4 text-gray-800">Dashboard</h1>
    <!-- Content Row -->
          <div class="row">
            

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Preorder</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($purchaseorder); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-cart-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Delivery Order</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($delivery_order); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-truck fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Invoice</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($invoice); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-file-invoice-dollar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Pembayaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($pembayaran); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-money-bill fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>





          </div>

            <!-- Content Row -->
          <div class="row">
            

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($jumlahuser); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Admin</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($jumlahadmin); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Pending Requests Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Produk Yang Terpesan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($jumlahadmin); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-wine-bottle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Pending Requests Card Example -->
             <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">Jumlah Produk Yang Terjual</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($jumlahadmin); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-solid fa-wine-bottle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            
            

          </div>
</div>
</div>


<!-- End of Main Content --> 