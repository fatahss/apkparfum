<!-- Begin Page Content -->
<div class="container-fluid">
   

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="table-responsive text-nowrap">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

            <?= $this->session->flashdata('message'); ?>

            

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


          <div class="form-group" >
           <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Nama..">
       </div>

         <div class="form-group" >
        <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Input Nilai Baru</a>
        </div>

<table id="myTable" class="table table-striped table-bordered table-sm " cellspacing="0"
  width="100%">
            

           
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nama Mata Pelajaran</th>
                        <th scope="col ">Nilai Pengetahuan</th>
                        <th scope="col">Nilai Keterampilan</th>
                        <th scope="col">Nilai Akhir</th>
                        <th scope="col">Predikat</th>
                        <th scope="col">Action</th>
                       
                        

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($daftarnilai as $r) : ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $r['name']; ?></td>
                        <td><?= $r['kelas']; ?></td>
                        <td><?= $r['namamapel']; ?></td>
                        <td><?= $r['nilaipengetahuan']; ?></td>
                        <td><?= $r['nilaiketerampilan']; ?></td>
                        <td><?= $r['nilaiakhir']; ?></td>
                        <td><?= $r['predikat']; ?></td>
                        
                        <td>

                          
                           
                            <a href="<?= base_url('admin/menukelasdelete/') . $r['id']; ?> " class="badge badge-danger">Delete</a>
                        </td>
                    </tr>
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
<!--
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                <h5 class="modal-title" id="editUserModalLabel">Masukkan Data Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/userupdate/') . $r['id']; ?>" method="post">
                 


                <div class="modal-body">
                    <div class="form-group" >
                        <label for="name">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="id" name="id" placeholder="Nama Lengkap" value="<?= $r['id']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama Mata Pelajaran:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= $r['name']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="ijazah">Jurusan:</label>
                        <input type="text" class="form-control" id="ijazah" name="ijazah" placeholder="Ijazah" value="<?= $r['ijazah']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="notelpon">Semester:</label>
                        <input type="text" class="form-control" id="notelpon" name="notelpon" placeholder="Nomor Telepon" value="<?= $r['notelpon']; ?>">
                    </div>
                   
                   
                

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button href=" "type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div> 
-->

<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Input Data Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('guru'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namamapel">Nama Lengkap:</label>
                        <select name="name" id="name" class="form-control">
                            <?php foreach ($datasiswa as $m) : ?>
                            <option value="<?= $m['name']; ?>"><?= $m['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Kelas:</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <?php foreach ($menukelas as $n) : ?>
                            <option value="<?= $n['kelas']; ?>"><?= $n['kelas']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="semester">Nama Mata Pelajaran:</label>
                        <select name="namamapel" id="namamapel" class="form-control">
                            <?php foreach ($menumapel as $k) : ?>
                            <option value="<?= $k['namamapel']; ?>"><?= $k['namamapel']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nilai Pengetahuan:</label>
                        <input type="text" class="form-control" id="nilaipengetahuan" name="nilaipengetahuan" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nilai Keterampilan:</label>
                        <input type="text" class="form-control" id="nilaiketerampilan" name="nilaiketerampilan" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Nilai Akhir:</label>
                        <input type="text" class="form-control" id="nilaiakhir" name="nilaiakhir" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="namamapel">Predikat:</label>
                        <input type="text" class="form-control" id="predikat" name="predikat" placeholder="">
                    </div>

                    
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div> 