<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
   public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

   public function index() 
    {
       $data['title'] ='Dashboard';
       $data['user'] = $this->db->get_where('user', ['username' =>
       $this->session->userdata('username')])->row_array();

        $data['jumlahuser'] = $this->db->get_where('user',['role_id' => 2])->result_array();
       $data['jumlahadmin'] = $this->db->get_where('user',['role_id' => 1])->result_array();
       
         //$this->db->where($r, row_array());

        



       $this->load->view('templates/header',$data);
       $this->load->view('templates/sidebar',$data);
       $this->load->view('templates/topbar',$data);
       $this->load->view('admin/index',$data);
       $this->load->view('templates/footer');

    }



//==================================================================================================================//
    
      public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

//==================================================================================================================//
 
    public function register()
    
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
       

        $this->form_validation->set_rules('name','Name','required|trim',[
            'required' => 'Nama tidak boleh kosong'      // untuk menampilkan pesan jika nama , email , dll kosong           
            ]);
        $this->form_validation->set_rules('namaortu','Namaortu','required|trim',[
            'required' => 'Nama orang tua tidak boleh kosong'
            ]);
        $this->form_validation->set_rules('nis','NIS','required|trim|is_unique[user.notelpon]',[
            'required' => 'Nomor NIS tidak boleh kosong',
            'is_unique' => 'Nomor NIS sudah pernah terdaftar'  // untuk menampilkan pesan jika email , nisn , atau username tidak unique yang ada di database
            ]);
      
       
        $this->form_validation->set_rules('username','username','required|trim|is_unique[user.username]',[
            'required' => 'Nomor username tidak boleh kosong',
            'is_unique' => 'Nomor username sudah pernah terdaftar'
            ]);
      

        if ($this->form_validation->run() == false) {
         $data['title'] = 'Register Akun Alumni';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/register', $data);
        $this->load->view('templates/footer');
        } else {


                $config['upload_path']          = './assets/pdf/username/';
                $config['allowed_types']        = 'pdf';
                $config['max_size']             = 2048;
                $config['min_size']             = 1;

                $this->load->library('upload', $config);
                $this->upload->do_upload('inputpdf');
                $this->upload->data();
                

                $pdf = $this->upload->data('file_name');
                $name = htmlspecialchars($this->input->post('name',true));
                $username = htmlspecialchars($this->input->post('username',true));
                $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $nis = htmlspecialchars($this->input->post('nis',true));
                $namaortu = htmlspecialchars($this->input->post('namaortu',true));
                $image = 'default.jpg';
                $role_id = 2;
                $is_active = 1;
                $date_create = time();

          

               
            $this->db->set('name', $name);
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            $this->db->set('nis', $nis);
            $this->db->set('namaortu', $namaortu);
            $this->db->set('image', $image);
            $this->db->set('role_id', $role_id);
            $this->db->set('is_active', $is_active);
            $this->db->set('date_create', $date_create);
            $this->db->set('pdfusername', $pdf);
            
            $this->db->insert('user');
              
              
              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Akun Alumni berhasil dibuat, Password default : 123456</div>');
              redirect('admin/register');
        }


    }

//==================================================================================================================//
 
    public function registersiswa()
    
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
       $data['jurusan'] = $this->db->get('jurusan')->result_array();
        $data['kelas'] = $this->db->get('kelas')->result_array();


        $this->form_validation->set_rules('name','Name','required|trim',[
            'required' => 'Nama tidak boleh kosong'      // untuk menampilkan pesan jika nama , email , dll kosong           
            ]);
       
        $this->form_validation->set_rules('nis','NIS','required|trim|is_unique[user.notelpon]',[
            'required' => 'Nomor NIS tidak boleh kosong',
            'is_unique' => 'Nomor NIS sudah pernah terdaftar'  // untuk menampilkan pesan jika email , nisn , atau username tidak unique yang ada di database
            ]);

        $this->form_validation->set_rules('namaortu','Nama Orang Tua','required|trim|is_unique[user.notelpon]',[
            'required' => 'Nama Orang Tua tidak boleh kosong'
            ]);
      
       
        $this->form_validation->set_rules('nisn','NISN','required|trim|is_unique[user.username]',[
            'required' => 'Nomor NISN tidak boleh kosong',
            'is_unique' => 'Nomor NISN sudah pernah terdaftar'
            ]);
      

        if ($this->form_validation->run() == false) {
         $data['title'] = 'Register Akun Siswa';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/registersiswa', $data);
        $this->load->view('templates/footer');
        } else {


              
                $name = htmlspecialchars($this->input->post('name',true));
                $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $nis = htmlspecialchars($this->input->post('nis',true));
                $nisn = htmlspecialchars($this->input->post('nisn',true));
                $namaortu = htmlspecialchars($this->input->post('namaortu',true));
                $jurusan = htmlspecialchars($this->input->post('jurusan',true));
                $kelas = htmlspecialchars($this->input->post('kelas',true));
                $image = 'default.jpg';
                $role_id = 4;
                $is_active = 1;
                $date_create = time();

          

               
            $this->db->set('name', $name);
            $this->db->set('password', $password);
            $this->db->set('nis', $nis);
            $this->db->set('nisn', $nisn);
            $this->db->set('namaortu', $namaortu);
            $this->db->set('jurusan', $jurusan);
            $this->db->set('kelas', $kelas);
            $this->db->set('image', $image);
            $this->db->set('role_id', $role_id);
            $this->db->set('is_active', $is_active);
            $this->db->set('date_create', $date_create);
            
            $this->db->insert('user');
              
              
              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Akun Siswa berhasil dibuat, Password default : 123456</div>');
              redirect('admin/register');
        }


    }

//==================================================================================================================//
 
    public function registerguru()
    
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
       

        $this->form_validation->set_rules('name','Name','required|trim',[
            'required' => 'Nama tidak boleh kosong'      // untuk menampilkan pesan jika nama , email , dll kosong           
            ]);
        
           
        $this->form_validation->set_rules('idlogin','ID Login','required|trim|is_unique[user.username]',[
            'required' => 'Nomor ID Login tidak boleh kosong',
            'is_unique' => 'Nomor ID Login sudah pernah terdaftar'  // untuk menampilkan pesan jika email , nisn , atau username tidak unique yang ada di database
            ]);
      
       
        $this->form_validation->set_rules('nip','NIP','required|trim|is_unique[user.nis]',[
            'required' => 'Nomor NIP tidak boleh kosong',
            'is_unique' => 'Nomor NIP sudah pernah terdaftar'
            ]);
      

        if ($this->form_validation->run() == false) {
         $data['title'] = 'Register Akun Guru';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/registerguru', $data);
        $this->load->view('templates/footer');
        } else {


                $name = htmlspecialchars($this->input->post('name',true));
                $idlogin = htmlspecialchars($this->input->post('idlogin',true));
                $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $nip = htmlspecialchars($this->input->post('nip',true));
                $image = 'default.jpg';
                $role_id = 3;
                $is_active = 1;
                $date_create = time();

          

               
            $this->db->set('name', $name);
            $this->db->set('username', $idlogin);
            $this->db->set('password', $password);
            $this->db->set('nis', $nip);
            $this->db->set('image', $image);
            $this->db->set('role_id', $role_id);
            $this->db->set('is_active', $is_active);
            $this->db->set('date_create', $date_create);
            
            $this->db->insert('user');
              
              
              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Akun Guru berhasil dibuat, Password default : 123456</div>');
              redirect('admin/registerguru');
        }


    }

//==================================================================================================================//

     public function menuuser()
    {
        $data['title'] = 'Master User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


        $data['datauser']  = $this->db->query("SELECT * FROM user WHERE role_id IN (2, 3, 4, 5)")->result_array();
        $data['dataupline']  = $this->db->query("SELECT * FROM user WHERE role_id IN (2, 3, 4)")->result_array();



        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required',[
            'required' => 'Kategori tidak boleh kosong',
            ]);
        $this->form_validation->set_rules('username', 'Username', 'required',[
            'required' => 'Kategori tidak boleh kosong',
            ]);

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/menuuser', $data);
            $this->load->view('templates/footer');
           
        } else {

             $name = $this->input->post('name');
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $notelpon = $this->input->post('notelpon');
                $email = $this->input->post('email');
                $upline = $this->input->post('upline');
                $alamat = $this->input->post('alamat');
                $created_by =  $this->session->userdata('username');
                $created_at = time()+17968;
                $role = $this->input->post('role');
                if($this->input->post('role') == 'Founder'){
                    $role_id = 2;
                    }
                if($this->input->post('role') == 'Supplier'){
                $role_id = 3;
                }
                 if($this->input->post('role') == 'Distributor'){
                $role_id = 4;
                }
                if($this->input->post('role') == 'Reseller'){
                $role_id = 5;
                }

            $config['upload_path']          = './assets/img/profile/';
            $config['allowed_types']        = 'pdf|jpg|png|jpeg';
            $config['max_size']             = 5048;
            

            $this->load->library('upload', $config);
            $this->upload->do_upload('image');
            $this->upload->data();
            $namaimage = $this->upload->data('file_name');
            


           
               
             $this->db->set('image', $namaimage);    
           $this->db->set('name', $name);
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            $this->db->set('upline', $upline);
            $this->db->set('notelpon', $notelpon);
            $this->db->set('email', $email);
            $this->db->set('alamat', $alamat);
            $this->db->set('password', $password);
            $this->db->set('role', $role);
            $this->db->set('role_id', $role_id);
            $this->db->set('created_by', $created_by);
            $this->db->set('date_create', $created_at);
            $this->db->insert('user');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Baru Sukses Ditambahkan</div>');

            redirect('admin/menuuser');
        }


    }

//==================================================================================================================//

public function userupdate($r)
{
        $data['title'] = 'User Update';

         

            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $notelpon = $this->input->post('notelpon');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $upline = $this->input->post('upline');
            $role = $this->input->post('role');
            $date_create = time()+17968;

            $dataupline = $this->db->get_where('user', ['id' => $upline])->row_array();


            $upline_name = $dataupline['name'];

            if($this->input->post('role') == 'Founder'){
                $role_id = 2;
                }
            if($this->input->post('role') == 'Supplier'){
            $role_id = 3;
            }
             if($this->input->post('role') == 'Distributor'){
            $role_id = 4;
            }
            if($this->input->post('role') == 'Reseller'){
            $role_id = 5;
            }
             



                $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2048';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                echo $this->upload->dispay_errors();
            }
        }


         $this->db->set('name', $name);
        $this->db->set('username', $username);
        $this->db->set('notelpon', $notelpon);
        $this->db->set('email', $email);
        $this->db->set('alamat', $alamat);
        $this->db->set('upline', $upline);
        $this->db->set('upline_name', $upline_name);
        $this->db->set('role_id', $role_id);
        $this->db->set('role', $role);
        $this->db->set('date_create', $date_create);
        $this->db->where('id', $r);
        $this->db->update('user');

       
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data user berhasil diupdate</div>');
        redirect('admin/menuuser');

        
    }


//==================================================================================================================//

public function userdelete($r)
{
     $this->db->set('user', $r);
    
    $this->db->where('id', $r);
    $this->db->delete('user');       


$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');
redirect('admin/menuuser');


}
    



//==================================================================================================================//

     public function menuparfum()
    {
        $data['title'] = 'Master Parfum';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $data['parfum']  = $this->db->query("SELECT parfum.id , parfum.nama_parfum , kategori.nama_kategori , parfum.deskripsi , parfum.harga_reseller , parfum.harga_distributor , parfum.harga_supplier , parfum.harga_founder , parfum.created_by , parfum.created_at
        FROM parfum
        INNER JOIN kategori 
        ON parfum.kategori_id=kategori.id ")->result_array(); 
        


        $this->form_validation->set_rules('namaparfum', 'Nama Parfum', 'required',[
            'required' => 'Kategori tidak boleh kosong',
            ]);
        $this->form_validation->set_rules('kategori', 'Kategori', 'required',[
            'required' => 'Kategori tidak boleh kosong',
            ]);

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/menuparfum', $data);
            $this->load->view('templates/footer');
           
        } else {

             $nama_parfum = $this->input->post('namaparfum');
                $kategori = $this->input->post('kategori');
                $deskripsi = $this->input->post('deskripsi');
                $harga_reseller = $this->input->post('harga_reseller');
                $harga_distributor = $this->input->post('harga_distributor');
                $harga_supplier = $this->input->post('harga_supplier');
                $created_by =  $this->session->userdata('username');
                $created_at = time()+17968;

           
            

           
            


           
               
           $this->db->set('nama_parfum', $nama_parfum);
            $this->db->set('kategori', $kategori);
            $this->db->set('harga_reseller', $harga_reseller);
            $this->db->set('harga_distributor', $harga_distributor);
            $this->db->set('harga_supplier', $harga_supplier);
            $this->db->set('deskripsi', $deskripsi);
           
            $this->db->set('created_by', $created_by);
            $this->db->set('created_at', $created_at);
            $this->db->insert('parfum');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Parfum Sukses Ditambahkan</div>');

            redirect('admin/menuparfum');
        }


    }


//==================================================================================================================//

public function menuparfumdelete($r)
{
        $this->db->where('id', $r);
        $this->db->delete('parfum'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Parfum berhasil terhapus</div>');      
  
        redirect('admin/menuparfum');

}

//==================================================================================================================//

public function menuparfumupdate($r)
{
      

          $this->form_validation->set_rules('nama_parfum', 'Nama Parfum', 'required');
          $this->form_validation->set_rules('kategori', 'Kategori', 'required');
          $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
          
        


        
    
        $data = [
            'nama_parfum' => $this->input->post('nama_parfum'),
            'kategori' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga_reseller' => $this->input->post('harga_reseller'),
            'harga_distributor' => $this->input->post('harga_distributor'),
            'harga_supplier' => $this->input->post('harga_supplier'),
            'created_by' => $this->session->userdata('username'),
            'created_at' => time()+21568
        ];
        $this->db->where('id', $r);
        $this->db->update('parfum', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Parfum berhasil diganti</div>');
        redirect('admin/menuparfum');
    }

//==================================================================================================================//

     public function menukategori()
    {
        $data['title'] = 'Master Kategori';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();


        $this->form_validation->set_rules('namakategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/menukategori', $data);
            $this->load->view('templates/footer');
           
        } else {
            $data = [
                'nama_kategori' => $this->input->post('namakategori'),
                'created_by' =>  $this->session->userdata('username'),
                'created_at' => time()+17968
            ];
            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori Sukses Ditambahkan</div>');

            redirect('admin/menukategori');
        }


    }

//==================================================================================================================//

public function menukategoriupdate($r)
{
      

          $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        


        
    
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'created_by' => $this->session->userdata('username'),
            'created_at' => time()+21568
        ];
        $this->db->where('id', $r);
        $this->db->update('kategori', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Kategori berhasil diganti</div>');
        redirect('admin/menukategori');
    }


//==================================================================================================================//

    public function menukategoridelete($r)
    {
            $this->db->where('id', $r);
            $this->db->delete('kategori'); 

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil terhapus</div>');      
      
            redirect('admin/menukategori');
    
    }

//==================================================================================================================//

     public function menupembayaran()
    {
        $data['title'] = 'Master Pembayaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pembayaran'] = $this->db->get('pembayaran')->result_array();



            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/menupembayaran', $data);
            $this->load->view('templates/footer');
           
                
        

    }

//==================================================================================================================//

    public function menupembayarandelete($r)
    {
            $this->db->where('id', $r);
            $this->db->delete('pembayaran'); 

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Daftar Pembayaran berhasil terhapus</div>');      
      
            redirect('admin/menupembayaran');
    
    }


//==================================================================================================================//

public function masterpreorder()
{
    $data['title'] = 'Master Purchase Order';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $data['preorder'] = $this->db->get('preorder')->result_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/menupreorder', $data);
        $this->load->view('templates/footer');
       
   


}

//==================================================================================================================//

public function deletepo($r)
{
        $this->db->where('nomorpo', $r);
        $this->db->delete('preorder'); 
        $this->db->where('nomorpo', $r);
        $this->db->delete('preorder_detail');
        

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Preorder berhasil terhapus</div>');      
  
        redirect('admin/masterpreorder');

}

//==================================================================================================================//

public function preorderdetail($r)
{
    $data['title'] = 'Purchase Order Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('preorder', ['nomorpo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('preorder_detail', ['nomorpo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/preorderdetail', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

public function menudo()
{
    $data['title'] = 'Master Delivery Order';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $data['do'] = $this->db->get('delivery_order')->result_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/menudo', $data);
        $this->load->view('templates/footer');
       
   


}

//==================================================================================================================//

public function deliveryorderdetailuser($r)
{
    $data['title'] = 'Delivery Order Member Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('delivery_order', ['nomordo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('delivery_order_detail', ['nomordo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/deliveryorderdetailuser', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

public function userdetail($r)
{
    $data['title'] = 'User Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['member'] = $this->db->get_where('user', ['id' => $r])->row_array();

    $user = $this->db->get_where('user',['id' => $r])->row_array();



    $direct = $this->db->get_where('direct_selling_detail', ['created_by' => $user['id']] )->result_array();
    $jumlahrow = count($direct);
    if($jumlahrow == 0){
      
       $data['total'] = 0;
    }
    else{
       foreach ($direct as $row)
       {
       $period_array[] = intval($row['qty']);
       }
       $data['total'] = array_sum($period_array);

    }

    $direct2 = $this->db->get_where('inventory', ['user_id' => $user['id']] )->result_array();
    $jumlahrow2 = count($direct2);
    if($jumlahrow2 == 0){
      
       $data['totalinv'] = 0;
    }
    else{
       foreach ($direct2 as $row2)
       {
       $period_array2[] = intval($row2['jumlah']);
       }
       $data['totalinv'] = array_sum($period_array2);

    }

    $direct3 = $this->db->get_where('preorder_detail', ['id_requester' => $user['id']] )->result_array();
    $jumlahrow3 = count($direct3);
    if($jumlahrow3 == 0){
      
       $data['totalpo'] = 0;
    }
    else{
       foreach ($direct3 as $row3)
       {
       $period_array3[] = intval($row3['qty']);
       }
       $data['totalpo'] = array_sum($period_array3);

    }
       


       $data['jumlahmember'] = $this->db->get_where('user',['upline' => $user['id']])->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/userdetail', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function inventoryuser($r)
{
    $data['title'] = 'Inventory User';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user',['id' => $r])->row_array();

    $direct2 = $this->db->get_where('inventory', ['user_id' => $user['id']] )->result_array();
    $jumlahrow2 = count($direct2);
    if($jumlahrow2 == 0){
      
       $data['totalinv'] = 0;
    }
    else{
       foreach ($direct2 as $row2)
       {
       $period_array2[] = intval($row2['jumlah']);
       }
       $data['totalinv'] = array_sum($period_array2);

    }
    
    $userid = $r;
    
    $data['inventoryuser']  = $this->db->query("SELECT inventory.product_id , parfum.nama_parfum , kategori.nama_kategori , inventory.jumlah
    FROM inventory
    INNER JOIN parfum 
    INNER JOIN kategori 
    ON inventory.product_id=parfum.id
    AND parfum.kategori_id=kategori.id
    WHERE user_id = $userid")->result_array();       
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/inventoryuser', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function directsellinguser($r)
{
    $data['title'] = 'Direct Selling User';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user',['id' => $r])->row_array();
    $direct = $this->db->get_where('direct_selling_detail', ['created_by' => $user['id']] )->result_array();
    $jumlahrow = count($direct);
    if($jumlahrow == 0){
      
       $data['total'] = 0;
    }
    else{
       foreach ($direct as $row)
       {
       $period_array[] = intval($row['qty']);
       }
       $data['total'] = array_sum($period_array);

    }

    $direct = $this->db->get_where('direct_selling_detail', ['created_by' => $user['id']] )->result_array();
    $jumlahrow = count($direct);
    if($jumlahrow == 0){
      
       $data['totalhasil'] = 0;
    }
    else{
       foreach ($direct as $row)
       {
       $period_array[] = intval($row['harga']);
       }
       $data['totalhasil'] = array_sum($period_array);

    }
    
    $data['directsellinguser'] = $this->db->get_where('direct_selling', ['created_by' => $r])->result_array();
    
    $data['directsellingdetailuser'] = $this->db->get_where('direct_selling_detail', ['created_by' => $user['id']])->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/directsellinguser', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

    public function directsellingdetailuser($r)
    {
        $data['title'] = 'Direct Selling Detail Member';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
    
        
        $data['directsellinguser'] = $this->db->get_where('direct_selling', ['no_direct_selling' => $r])->row_array();
        $data['directsellinguserdetail'] = $this->db->get_where('direct_selling_detail', ['no_direct_selling' => $r])->result_array();
        
    
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/directsellingdetailuser', $data);
            $this->load->view('templates/footer');
       
             
             
    
            
        }

//==================================================================================================================//

   
    



public function pendapatanuser($r)
{
    $data['title'] = 'Pendapatan User';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user',['id' => $r])->row_array();
    $direct2 = $this->db->get_where('pengeluaran', ['user_id' => $user['id']] )->result_array();
    $jumlahrow2 = count($direct2);
    if($jumlahrow2 == 0){
      
       $data['totalpengeluaran'] = 0;
    }
    else{
       foreach ($direct2 as $row2)
       {
       $period_array2[] = intval($row2['jumlah_pengeluaran']);
       }
       $data['totalpengeluaran'] = array_sum($period_array2);

    }
    
    $data['pendapatanuser'] = $this->db->get_where('pendapatan', ['user_id' => $r])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pendapatanuser', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }


//==================================================================================================================//

   
    



public function pengeluaranuser($r)
{
    $data['title'] = 'Pengeluaran User';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user',['id' => $r])->row_array();
    $direct2 = $this->db->get_where('pengeluaran', ['user_id' => $user['id']] )->result_array();
    $jumlahrow2 = count($direct2);
    if($jumlahrow2 == 0){
      
       $data['totalpengeluaran'] = 0;
    }
    else{
       foreach ($direct2 as $row2)
       {
       $period_array2[] = intval($row2['jumlah_pengeluaran']);
       }
       $data['totalpengeluaran'] = array_sum($period_array2);

    }
    
    $data['pendapatanuser'] = $this->db->get_where('pengeluaran', ['user_id' => $r])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pengeluaranuser', $data);
        $this->load->view('templates/footer');

}

//==================================================================================================================//

public function menuinvoice()
{
    $data['title'] = 'Master Invoice';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $data['invoiceuser'] = $this->db->get('invoice')->result_array();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/menuinvoice', $data);
        $this->load->view('templates/footer');
       
   


}

//==================================================================================================================//

public function deleteinvoice($r)
{
        $this->db->where('nomorinvoice', $r);
        $this->db->delete('invoice'); 
    
        

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Invoice berhasil terhapus</div>');      
  
        redirect('admin/menuinvoice');

}

//==================================================================================================================//

public function memberuser($r)
{
    $data['title'] = 'Member User';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $userreseller = $this->db->get_where('user', ['upline' => $user['id']])->row_array();
    $data['userreseller'] = $this->db->get_where('user', ['upline' => $r])->result_array();


    if($userreseller['is_active'] == '0'){
        $data['statususer'] = 'Belum Aktif';
    }
    if($userreseller['is_active'] == '1'){
        $data['statususer'] = 'Sudah Aktif';
    }

    if($userreseller['role_id'] == '1'){
        $data['role'] = 'Admin';
    }
    if($userreseller['role_id'] == '2'){
        $data['role'] = 'Founder';
    }
    if($userreseller['role_id'] == '3'){
        $data['role'] = 'Supplier';
    }
    if($userreseller['role_id'] == '4'){
        $data['role'] = 'Distributor';
    }
    if($userreseller['role_id'] == '5'){
        $data['role'] = 'Reseller';
    }

   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/menumember', $data);
        $this->load->view('templates/footer');
   
}

//==================================================================================================================//

   
    



public function menupendapatan()
{
    $data['title'] = 'Master Pendapatan';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    

    $data['pendapatanuser']  = $this->db->query("SELECT pendapatan.id , user.name , pendapatan.no_referensi , pendapatan.jenis_pendapatan , pendapatan.jumlah_pendapatan , pendapatan.created_at
    FROM pendapatan
    INNER JOIN user 
    ON pendapatan.user_id=user.id ")->result_array();

    $pendapatanuser = $this->db->get('pendapatan')->result_array();
    $user = $this->db->get('user')->result_array();

    $namauser = 
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/menupendapatan', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }


//==================================================================================================================//

   
    



public function menupengeluaran()
{
    $data['title'] = 'Master Pengeluaran';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    
    $data['pendapatanuser']  = $this->db->query("SELECT pengeluaran.id , user.name , pengeluaran.no_referensi , pengeluaran.jenis_pengeluaran , pengeluaran.jumlah_pengeluaran , pengeluaran.created_at
    FROM pengeluaran
    INNER JOIN user 
    ON pengeluaran.user_id=user.id ")->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/menupengeluaran', $data);
        $this->load->view('templates/footer');

}









  








    


//==================================================================================================================//


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

//==================================================================================================================//

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_acces_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_acces_menu', $data);
        } else {
            $this->db->delete('user_acces_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');

    }
    
     public function delete()
    
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_acces_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_acces_menu', $data);
        } else {
            $this->db->delete('user_acces_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
}
