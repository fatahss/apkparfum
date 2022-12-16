<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distributor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();

        if($user['role_id'] == '1'){
            $data['role'] = 'Admin';
        }
        if($user['role_id'] == '2'){
            $data['role'] = 'Founder';
        }
        if($user['role_id'] == '3'){
            $data['role'] = 'Supplier';
        }
        if($user['role_id'] == '4'){
            $data['role'] = 'Distributor';
        }
        if($user['role_id'] == '5'){
            $data['role'] = 'Reseller';
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/index', $data);
        $this->load->view('templates/footer');
    }

//==================================================================================================================//



     public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();

        if($user['role_id'] == '1'){
            $data['role'] = 'Admin';
        }
        if($user['role_id'] == '2'){
            $data['role'] = 'Founder';
        }
        if($user['role_id'] == '3'){
            $data['role'] = 'Supplier';
        }
        if($user['role_id'] == '4'){
            $data['role'] = 'Distributor';
        }
        if($user['role_id'] == '5'){
            $data['role'] = 'Reseller';
        }

        $this->form_validation->set_rules('notelpon', 'Nomor Telepon', 'required|trim|is_unique',[
            'required' => 'Mohon masukkan Nomor Telepon',
            'is_unique' => 'Nomor Telepon sudah pernah terdaftar'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique',[
            'required' => 'Mohon masukkan Email',
        'is_unique' => 'Email sudah pernah terdaftar'
        ]);

         
        


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('distributor/edit', $data);
            $this->load->view('templates/footer');
            
        } else {
            

            $notelpon = $this->input->post('notelpon');
            $email = $this->input->post('email');
            
          



            // cek jika ada gambar yang akan diupload
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


            $this->db->set('notelpon', $notelpon);
            $this->db->set('email', $email);
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda berhasil diupdate</div>');
            redirect('distributor/edit');
        }
    }

//==================================================================================================================//


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim',[
            'required' => 'Mohon masukkan Password saat ini']);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]',[
            'required' => 'Mohon masukkan Password baru',
            'min_length' => 'Password minimal 8 digit']);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]',[
            'required' => 'Mohon masukkan Password baru kembali',
            'min_length' => 'Password minimal 8 digit',
            'matches' => 'Password tidak sama']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('distributor/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah</div>');
                redirect('distributor/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini</div>');
                    redirect('distributor/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti</div>');
                    redirect('distributor/changepassword');
                }
            }
        }
    }

//==================================================================================================================//

    public function menumember()
    {
        $data['title'] = 'Menu Member';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $userreseller = $this->db->get_where('user', ['upline' => $user['id']])->row_array();
        $data['userreseller'] = $this->db->get_where('user', ['upline' => $user['id']])->result_array();


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
            $this->load->view('distributor/menumember', $data);
            $this->load->view('templates/footer');
       
    }


//==================================================================================================================//

public function memberdetail($r)
{
    $data['title'] = 'Member Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['member'] = $this->db->get_where('user', ['id' => $r])->row_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/memberdetail', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function inventorymember($r)
{
    $data['title'] = 'Inventory Member';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['inventoryuser'] = $this->db->get_where('inventory', ['user_id' => $r])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/inventorymember', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function directsellingmember($r)
{
    $data['title'] = 'Direct Selling Member';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['directsellinguser'] = $this->db->get_where('direct_selling', ['created_by' => $r])->result_array();
    
    $data['directsellingdetailuser'] = $this->db->get_where('direct_selling_detail', ['created_by' => $user['id']])->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/directsellingmember', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

    public function directsellingdetailmember($r)
    {
        $data['title'] = 'Direct Selling Detail Member';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
    
        
        $data['directsellinguser'] = $this->db->get_where('direct_selling', ['no_direct_selling' => $r])->row_array();
        $data['directsellinguserdetail'] = $this->db->get_where('direct_selling_detail', ['no_direct_selling' => $r])->result_array();
        
    
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('distributor/directsellingdetailmember', $data);
            $this->load->view('templates/footer');
       
             
             
    
            
        }

//==================================================================================================================//

   
    



public function pendapatanmember($r)
{
    $data['title'] = 'Pendapatan Member';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['pendapatanuser'] = $this->db->get_where('pendapatan', ['user_id' => $r])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/pendapatanmember', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }


//==================================================================================================================//

   
    



public function pengeluaranmember($r)
{
    $data['title'] = 'Pengeluaran Member';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['pendapatanuser'] = $this->db->get_where('pengeluaran', ['user_id' => $r])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/pengeluaranmember', $data);
        $this->load->view('templates/footer');

}

//==================================================================================================================//

    public function userdelete($r)
    {
             $this->db->set('user', $r);
            
            $this->db->where('id', $r);
            $this->db->delete('user');       
      

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');
        redirect('distributor/menumember');

    
    }

//==================================================================================================================//

    public function useraktif($r)
    {
             $this->db->set('is_active', '1');
            
            $this->db->where('id', $r);
            $this->db->update('user');       
      

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
        redirect('distributor/menumember');

    
    }

//==================================================================================================================//

   
    



public function preorder()
{
    $data['title'] = 'Preorder';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('distributor/preorder', $data);
    $this->load->view('templates/footer');
}

//==================================================================================================================//

   
    



public function preordermemberdistributor()
{
    $data['title'] = 'Preorder Member';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['podetailuser'] = $this->db->get_where('preorder_detail', ['id_receiver' => $user['id']])->result_array();
    
    $data['cartuser'] = $this->db->get_where('cart', ['username' => $this->session->userdata('username')])->result_array();
    $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    $data['pouser'] = $this->db->get_where('preorder', ['id_receiver' => $user['id']])->result_array();
    
    $data['parfum'] = $this->db->get('parfum')->result_array();
    
    $parfum = $this->db->get('parfum')->result_array();
    $parfum = $this->db->get('parfum');
    //if($user['role_id'] = 3) { $data['hargaparfum'] = $parfum['harga_supplier'];}
    //if($user['role_id'] = 4) { $data['hargaparfum'] = $parfum['harga_distributor'];}
    //if($user['role_id'] = 5) { $data['hargaparfum'] = $parfum['harga_reseller'];}

    

   

    $this->db->select_max('id', 'max');

$query = $this->db->get_where('delivery_order', ['id_requester' => $user['id']]);
if ($query->num_rows() == 0) {
  return 1;
}
$max = $query->row()->max;

$data['dobaru'] = $max + 1;

$data['date'] = time();

    
   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/preordermemberdistributor', $data);
        $this->load->view('templates/footer');
        
        
    }


//==================================================================================================================//

   
    



public function preorderuplinedistributor()
{
    $data['title'] = 'Preorder Upline';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['podetailuser'] = $this->db->get_where('preorder_detail', ['id_requester' => $user['id']])->result_array();
    
    $data['cartuser'] = $this->db->get_where('cart', ['username' => $this->session->userdata('username')])->result_array();
    $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    $data['pouser'] = $this->db->get_where('preorder', ['id_requester' => $user['id']])->result_array();
    
    $data['parfum'] = $this->db->get('parfum')->result_array();
    
    $parfum = $this->db->get('parfum')->result_array();
    $parfum = $this->db->get('parfum');
    //if($user['role_id'] = 3) { $data['hargaparfum'] = $parfum['harga_supplier'];}
    //if($user['role_id'] = 4) { $data['hargaparfum'] = $parfum['harga_distributor'];}
    //if($user['role_id'] = 5) { $data['hargaparfum'] = $parfum['harga_reseller'];}

    

   

    $this->db->select_max('id', 'max');

$query = $this->db->get_where('preorder', ['id_requester' => $user['id']]);
if ($query->num_rows() == 0) {
  return 1;
}
$max = $query->row()->max;

$data['pobaru'] = $max + 1;

$data['date'] = time();

    
   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/preorderuplinedistributor', $data);
        $this->load->view('templates/footer');
        
        
    }

//==================================================================================================================//

public function preorderuplinedetail($r)
{
    $data['title'] = 'Preorder Upline Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('preorder', ['nomorpo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('preorder_detail', ['nomorpo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/preorderuplinedetail', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

public function preordermemberdetail($r)
{
    $data['title'] = 'Preorder Member Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('preorder', ['nomorpo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('preorder_detail', ['nomorpo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/preordermemberdetail', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }



//==================================================================================================================//

   
    



public function pengajuanpreorder()
{
    $data['title'] = 'Pengajuan Preorder';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['cartuser'] = $this->db->get_where('cart', ['username' => $this->session->userdata('username')])->result_array();
    $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    $data['pouser'] = $this->db->get_where('preorder', ['id_requester' => $user['id']])->result_array();
    
    $data['parfum'] = $this->db->get('parfum')->result_array();
    $data['podetailuser'] = $this->db->get_where('preorder_detail', ['id_requester' => $user['id']])->result_array();
    $parfum = $this->db->get('parfum')->result_array();
    $parfum = $this->db->get('parfum');
    //if($user['role_id'] = 3) { $data['hargaparfum'] = $parfum['harga_supplier'];}
    //if($user['role_id'] = 4) { $data['hargaparfum'] = $parfum['harga_distributor'];}
    //if($user['role_id'] = 5) { $data['hargaparfum'] = $parfum['harga_reseller'];}

    

   

    $this->db->select_max('id', 'max');

$query = $this->db->get_where('preorder', ['id_requester' => $user['id']]);
if ($query->num_rows() == 0) {
  return 1;
}
$max = $query->row()->max;

$data['pobaru'] = $max + 1;

$data['date'] = time();

    
   

    //$data['hargapaket'] = $this->db->get_where('kategori_paket',['kategoripaket'=='kategori_paket'])->row_array();

   //$data['harga'] ==  $this->input->post('kategoripaket');

      //$email = $this->input->post('email');

         

       
     
     
  



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/pengajuanpreorder', $data);
        $this->load->view('templates/footer');
   
      

        //$this->db->set('name', $name);
       // $this->db->where('email', $email);
       // $this->db->update('user');

        
    
}

//==================================================================================================================//



public function addcart()
{
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


        
       
        $nomorpo=$this->input->post('nomorpo');
        $username=$this->session->userdata('username');
        $value=$this->input->post('parfum');
        $value_pisah=explode("|",$value);
        $product=$value_pisah[0];
        
        $jumlah=$this->input->post('jumlahparfum');
        $harga=$value_pisah[1]*$jumlah;
   
            
        $query = $this->db->get_where('cart', ['product' => $product , 'username' => $username] )->result_array();
        $jumlahrow = count($query);
        if($jumlahrow == 0){
            $this->db->set('nomorpo', $nomorpo);
            $this->db->set('username', $username);
            $this->db->set('product', $product);
            $this->db->set('harga', $harga);
            $this->db->set('jumlah', $jumlah);
            $this->db->insert('cart');

        }
        if($jumlahrow == 1){
            $this->db->set('harga', "harga + $harga" , FALSE);
            $this->db->set('jumlah', "jumlah + $jumlah" , FALSE);
            $this->db->where('product', $product);
            $this->db->where('username', $username);
            $this->db->update('cart');

        } 
        

         
  
        redirect('distributor/pengajuanpreorder');

}

//==================================================================================================================//



    public function ajukanpo()
    {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

             $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
             $uplineuser = $this->db->get_where('user', ['id' => $user['upline']])->row_array();

            $cartuser = $this->db->get_where('cart', ['username' => $this->session->userdata('username')])->result_array();

            foreach ($cartuser as $r){
            $nomorpo1 = $r['nomorpo'];
             $product = $r['product'];
              $jumlah = $r['jumlah'];
              $harga = $r['harga'];

                


            
            
        $this->db->set('nomorpo', $nomorpo1);    
           $this->db->set('id_requester', $user['id']);
           $this->db->set('id_receiver', $user['upline']);
            $this->db->set('product', $product);
            $this->db->set('qty', $jumlah);
            $this->db->set('harga', $harga);
       $this->db->insert('preorder_detail');

        }

        $direct = $this->db->get_where('preorder_detail', ['nomorpo' => $nomorpo1]);
        foreach ($direct->result_array() as $row)
        {
        $period_array[] = intval($row['harga']);
        }
        $total = array_sum($period_array);

        $direct2 = $this->db->get_where('preorder_detail', ['nomorpo' => $nomorpo1]);
        foreach ($direct2->result_array() as $row2)
        {
        $period_array2[] = intval($row2['qty']);
        }
        $total_product = array_sum($period_array2);
        

        //$nomorpo2 = 'PO124214';
        $iduser = $user['id'];
        $namaupline = $uplineuser['name'];
        $upline = $user['upline'];
        $created_at = time()+17968;
        $status = 'Belum di Proses';

        $this->db->set('nomorpo', $nomorpo1);    
           $this->db->set('id_requester', $iduser);
           $this->db->set('nama_upline', $namaupline);
           $this->db->set('total_harga', $total);
           $this->db->set('total_product', $total_product);
           $this->db->set('nama_downline', $user['name']);
           $this->db->set('id_receiver', $upline);
           $this->db->set('created_by', $iduser);
           $this->db->set('created_at', $created_at);
           $this->db->set('status', $status);


           $this->db->insert('preorder');


           $usernameuser = $user['username'];
           $this->db->where('username', $usernameuser);
           $this->db->delete('cart');
            

             
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil tersimpan</div>');

            redirect('distributor/preorderuplinedistributor');
    
    }

//==================================================================================================================//

public function deletecart($r)
{
        $this->db->where('id', $r);
        $this->db->delete('cart'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('distributor/pengajuanpreorder');

}

//==================================================================================================================//

public function cartreset()
{
$user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $this->db->where('username', $user['username']);
    $this->db->delete('cart'); 

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      

    redirect('distributor/pengajuanpreorder');

}




//==================================================================================================================//

public function deletepo($r)
{
        $this->db->where('nomorpo', $r);
        $this->db->delete('preorder'); 
        $this->db->where('nomorpo', $r);
        $this->db->delete('preorder_detail');
        

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Preorder berhasil terhapus</div>');      
  
        redirect('distributor/preordermemberdistributor');

}

//==================================================================================================================//

public function deletepoupline($r)
{
        $this->db->where('nomorpo', $r);
        $this->db->delete('preorder'); 
        $this->db->where('nomorpo', $r);
        $this->db->delete('preorder_detail');
        

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Preorder berhasil terhapus</div>');      
  
        redirect('distributor/preorderuplinedistributor');

}

//==================================================================================================================//

   
    



public function deliveryorder()
{
    $data['title'] = 'Delivery Order';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('distributor/deliveryorder', $data);
    $this->load->view('templates/footer');
}

//==================================================================================================================//

public function deliveryorderuplinedetail($r)
{
    $data['title'] = 'Delivery Order Upline Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('delivery_order', ['nomordo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('delivery_order_detail', ['nomordo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/deliveryorderuplinedetail', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

public function deliveryordermemberdetail($r)
{
    $data['title'] = 'Delivery Order Member Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('delivery_order', ['nomordo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('delivery_order_detail', ['nomordo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/deliveryordermemberdetail', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function pengajuandeliveryorder($r)
{
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $uplineuser = $this->db->get_where('user', ['id' => $user['upline']])->row_array();

   $podetailuser = $this->db->get_where('preorder_detail', ['nomorpo' => $r])->result_array();

   $nomorpo = $this->input->post('nomorpo');
     $nomordo = $this->input->post('nomordo');
     $total_harga = $this->input->post('total_harga');
     $total_product = $this->input->post('total_product');
   foreach ($podetailuser as $r){
    $nomorpo2 = $r['nomorpo'];
    $product = $r['product'];
     $jumlah = $r['qty'];
     $harga = $r['harga'];
     




   
     $this->db->set('nomordo', $nomordo);
     $this->db->set('nomorpo', $nomorpo2);
  $this->db->set('id_requester', $user['id']);
  $this->db->set('id_receiver', $user['upline']);
   $this->db->set('product', $product);
   $this->db->set('harga', $harga);
   $this->db->set('qty', $jumlah);
$this->db->insert('delivery_order_detail');

}

//$nomorpo2 = 'PO124214';
$podariuser = $this->db->get_where('preorder', ['nomorpo' => $r['nomorpo']])->row_array();
$namaupline = $uplineuser['name'];
$created_at = time()+17968;
$status = 'Sedang dalam Pengiriman';
$paket = $this->input->post('paket');
     $nomorresi = $this->input->post('nomorresi');
     $hargapaket = $this->input->post('hargapaket');
     $note = $this->input->post('note');

$this->db->set('nomordo', $nomordo);
$this->db->set('nomorpo', $nomorpo);
$this->db->set('paket', $paket); 
$this->db->set('nomorresi', $nomorresi);  
$this->db->set('hargapaket', $hargapaket); 
$this->db->set('total_harga', $total_harga);  
$this->db->set('total_product', $total_product);
$this->db->set('note', $note);    
  $this->db->set('id_requester', $user['id']);
  $this->db->set('nama_receiver', $podariuser['nama_downline']);
  $this->db->set('nama_requester', $podariuser['nama_upline']);
  $this->db->set('id_receiver',$podariuser['id_requester']);
  $this->db->set('created_by', $user['id']);
  $this->db->set('created_at', $created_at);
  $this->db->set('status', $status);

  $this->db->insert('delivery_order');

  $statuspo = 'Sedang dalam Pengiriman';
  $this->db->set('status', $statuspo);
  $this->db->set('nomordo', $nomordo);
  $this->db->where('nomorpo', $nomorpo);
  $this->db->update('preorder');

   

    
   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delivery Order berhasil tersimpan</div>');

   redirect('distributor/preordermemberdistributor');

}

//==================================================================================================================//

   
    



public function deliveryorderupline()
{
    $data['title'] = 'Delivery Order Upline';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    $data['douser'] = $this->db->get_where('delivery_order', ['id_requester' => $user['upline']])->result_array();
    
    $data['parfum'] = $this->db->get('parfum')->result_array();
    $data['dodetailuser'] = $this->db->get_where('delivery_order_detail', ['id_requester' => $user['upline']])->result_array();
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/deliveryorderupline', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function selesaikandeliveryorder($r)
{
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $upline = $this->db->get_where('user', ['id' => $user['upline']])->row_array();

   $dodetailuser = $this->db->get_where('delivery_order_detail', ['nomordo' => $r])->result_array();

 
   foreach ($dodetailuser as $r){
    $product = $r['product'];
     $jumlah = $r['qty'];
     
     $query = $this->db->get_where('inventory', ['product' => $product , 'user_id'=> $user['id']] )->result_array();
     $jumlahrow = count($query);
     if($jumlahrow == 0){
        $this->db->set('user_id', $user['id']);
        $this->db->set('product', $product);
        $this->db->set('jumlah', $jumlah);
     $this->db->insert('inventory');

     }
     if($jumlahrow == 1){
         $this->db->set('jumlah', "jumlah + $jumlah" , FALSE);
         $this->db->where('product', $product);
         $this->db->where('user_id', $user['id']);
         $this->db->update('inventory');

     } 
    
     $this->db->set('jumlah', "jumlah - $jumlah" , FALSE);
         $this->db->where('product', $product);
         $this->db->where('user_id', $r['id_requester']);
         $this->db->update('inventory');

}

//$nomorpo2 = 'PO124214';







$this->db->select_max('id', 'max');

$jumlahinvoice = $this->db->get_where('invoice', ['id_receiver' => $user['id']]);
if ($jumlahinvoice->num_rows() == 0) {
  return 1;
}
$max = $jumlahinvoice->row()->max;

$invoicebaru = $max + 1;
$date = time()+17968;

$direct = $this->db->get_where('delivery_order_detail', ['nomordo' => $r['nomordo']]);
    foreach ($direct->result_array() as $row)
    {
    $period_array[] = intval($row['harga']);
    }
    $total = array_sum($period_array);

    $direct2 = $this->db->get_where('delivery_order_detail', ['nomordo' => $r['nomordo']]);
    foreach ($direct2->result_array() as $row)
    {
    $period_array2[] = intval($row['qty']);
    }
    $total2 = array_sum($period_array2);

$this->db->set('nomorinvoice', 'INV'.$user['id'].date('Ymd' , $date).$invoicebaru);
$this->db->set('nomordo', $r['nomordo'] );
$this->db->set('nomorpo', $r['nomorpo'] );
$this->db->set('id_requester', $user['upline'] );
$this->db->set('id_receiver', $user['id'] );
$this->db->set('nama_requester', $upline['name'] );
$this->db->set('nama_receiver', $user['name'] );
$this->db->set('total', $total );
$this->db->set('total_product', $total2 );
$this->db->set('created_by', $user['id'] );
$this->db->set('created_at', $date );
$this->db->set('status', 'Belum di bayar' );
$this->db->insert('invoice');

$statusdo = 'Telah Sampai Tujuan';
$this->db->set('nomorinvoice', 'INV'.$user['id'].date('Ymd' , $date).$invoicebaru);
$this->db->set('status', $statusdo);
$this->db->where('nomordo', $r['nomordo']);
$this->db->update('delivery_order');

$statusdo = 'Telah Sampai Tujuan';
$this->db->set('nomorinvoice', 'INV'.$user['id'].date('Ymd' , $date).$invoicebaru);
$this->db->set('status', $statusdo);
$this->db->where('nomorpo', $r['nomorpo']);
$this->db->update('preorder');


  

   

    
   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delivery Order berhasil diselesaikan</div>');

   redirect('distributor/deliveryorderupline');

}

//==================================================================================================================//

   
    



public function deliveryordermember()
{
    $data['title'] = 'Delivery Order Member';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    $data['douser'] = $this->db->get_where('delivery_order', ['id_requester' => $user['id']])->result_array();
    
    $data['parfum'] = $this->db->get('parfum')->result_array();
    $data['dodetailuser'] = $this->db->get_where('delivery_order_detail', ['id_requester' => $user['id']])->result_array();
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/deliveryordermember', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }


//==================================================================================================================//

public function deletedomember($r)
{
        $this->db->where('nomordo', $r);
        $this->db->delete('delivery_order'); 
        $this->db->where('nomordo', $r);
        $this->db->delete('delivery_order_detail');
        

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delivery Order berhasil terhapus</div>');      
  
        redirect('distributor/deliveryordermember');

}


//==================================================================================================================//

   
    



public function invoice()
{
    $data['title'] = 'Invoice';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('distributor/invoice', $data);
    $this->load->view('templates/footer');
}


//==================================================================================================================//

   
    



public function invoicemember()
{
    $data['title'] = 'Invoice Member';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['invoiceuser'] = $this->db->get_where('invoice', ['id_requester' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/invoicemember', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function invoiceupline()
{
    $data['title'] = 'Invoice Upline';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['invoiceuser'] = $this->db->get_where('invoice', ['id_receiver' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/invoiceupline', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function inventory()
{
    $data['title'] = 'Inventory';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['inventoryuser'] = $this->db->get_where('inventory', ['user_id' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/inventory', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

   
    



public function directselling()
{
    $data['title'] = 'Direct Selling';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['directsellinguser'] = $this->db->get_where('direct_selling', ['created_by' => $user['id']])->result_array();
    
    $data['parfum'] = $this->db->get('parfum')->result_array();
    $data['directsellingdetailuser'] = $this->db->get_where('direct_selling_detail', ['created_by' => $user['id']])->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/directselling', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

    public function directsellingdetail($r)
    {
        $data['title'] = 'Direct Selling Detail';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    
    
        
        $data['directsellinguser'] = $this->db->get_where('direct_selling', ['no_direct_selling' => $r])->row_array();
        $data['directsellinguserdetail'] = $this->db->get_where('direct_selling_detail', ['no_direct_selling' => $r])->result_array();
        $data['parfum'] = $this->db->get('parfum')->result_array();
        
    
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('distributor/directsellingdetail', $data);
            $this->load->view('templates/footer');
       
             
             
    
            
        }


//==================================================================================================================//

   
    



public function directsellingbaru()
{
    $data['title'] = 'Direct Selling Baru';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['cartuser'] = $this->db->get_where('cart2', ['username' => $this->session->userdata('username')])->result_array();
    $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    
    $data['parfum'] = $this->db->get('parfum')->result_array();
    $data['podetailuser'] = $this->db->get_where('preorder_detail', ['id_requester' => $user['id']])->result_array();
    $parfum = $this->db->get('parfum')->result_array();
    $parfum = $this->db->get('parfum');
    //if($user['role_id'] = 3) { $data['hargaparfum'] = $parfum['harga_supplier'];}
    //if($user['role_id'] = 4) { $data['hargaparfum'] = $parfum['harga_distributor'];}
    //if($user['role_id'] = 5) { $data['hargaparfum'] = $parfum['harga_reseller'];}

    

   

    $this->db->select_max('id', 'max');

$query = $this->db->get_where('direct_selling', ['created_by' => $user['id']]);
if ($query->num_rows() == 0) {
  return 1;
}
$max = $query->row()->max;

$data['directsellingbaru'] = $max + 1;

$data['date'] = time()+17968;

    
   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/directsellingbaru', $data);
        $this->load->view('templates/footer');
   
 

        
    
}

//==================================================================================================================//



public function addcart2()
{
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


        
        $username=$this->session->userdata('username');
        $value=$this->input->post('parfum');
        $value_pisah=explode("|",$value);
        $product=$value_pisah[0];
        
        $jumlah=$this->input->post('jumlahparfum');
        $no_direct_selling=$this->input->post('nomordirectselling');
        $harga=$value_pisah[1]*$jumlah;
        $query = $this->db->get_where('cart2', ['product' => $product , 'username' => $username] )->result_array();
        $jumlahrow = count($query);
        if($jumlahrow == 0){
            $this->db->set('no_direct_selling', $no_direct_selling);
            $this->db->set('username', $username);
            $this->db->set('product', $product);
            $this->db->set('harga', $harga);
            $this->db->set('jumlah', $jumlah);
            $this->db->insert('cart2');

        }
        if($jumlahrow == 1){
            $this->db->set('harga', "harga + $harga" , FALSE);
            $this->db->set('jumlah', "jumlah + $jumlah" , FALSE);
            $this->db->where('product', $product);
            $this->db->where('username', $username);
            $this->db->update('cart2');

        } 
        
              
        

        

         
  
        redirect('distributor/directsellingbaru');

}

//==================================================================================================================//

public function deletecart2($r)
{
        $this->db->where('id', $r);
        $this->db->delete('cart2'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('distributor/directsellingbaru');

}

//==================================================================================================================//

public function cartreset2()
{
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->where('username', $user['username']);
        $this->db->delete('cart2'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('distributor/directsellingbaru');

}

//==================================================================================================================//



public function tambahdirectselling()
{
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

         $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $cartuser2 = $this->db->get_where('cart2', ['username' => $this->session->userdata('username')])->result_array();
        

        foreach ($cartuser2 as $r){
         $product = $r['product'];
          $jumlah = $r['jumlah'];
          $harga = $r['harga'];
          $no_direct_selling = $r['no_direct_selling'];

        
    $this->db->set('no_direct_selling', $no_direct_selling);    
       $this->db->set('created_by', $user['id']);
        $this->db->set('product', $product);
        $this->db->set('qty', $jumlah);
        $this->db->set('harga', $harga);
        $this->db->set('total_harga', $harga*$jumlah);
   $this->db->insert('direct_selling_detail');


   $this->db->set('jumlah', "jumlah - $jumlah" , FALSE);
   $this->db->where('product', $product);
   $this->db->where('user_id', $user['id']);
    $this->db->update('inventory');

    }

    //$nomorpo2 = 'PO124214';
    $iduser = $user['id'];
    $namauser = $user['name'];
    $created_at = time()+17968;
   

    $direct = $this->db->get_where('direct_selling_detail', ['no_direct_selling' => $no_direct_selling]);
    foreach ($direct->result_array() as $row)
    {
    $period_array[] = intval($row['harga']);
    }
    $total = array_sum($period_array);

    $ongkir=$this->input->post('ongkir');
    $diskon=$this->input->post('diskon');
    $namapembeli=$this->input->post('namapembeli');


    $this->db->set('no_direct_selling', $no_direct_selling);   
       $this->db->set('namauser', $namauser);
       $this->db->set('sub_total', $total);
       $this->db->set('ongkir', $ongkir);
       $this->db->set('namapembeli', $namapembeli);
       $this->db->set('diskon', ((($total+$ongkir)*$diskon)/100));
       $this->db->set('total', ($total+$ongkir)-(($total+$ongkir)*$diskon)/100);
       $this->db->set('created_by', $iduser);
       $this->db->set('created_at', $created_at);


       $this->db->insert('direct_selling');


        

       $jenis_pendapatan = 'Direct Selling';
       $usernameuser = $user['username'];
       $this->db->where('username', $usernameuser);
       $this->db->delete('cart2');

       $this->db->set('user_id', $user['id']);
       $this->db->set('no_referensi', $no_direct_selling);  
       $this->db->set('jenis_pendapatan', $jenis_pendapatan);
       $this->db->set('jumlah_pendapatan', ($total+$ongkir)-(($total+$ongkir)*$diskon)/100);
       $this->db->set('created_at', $created_at);
       $this->db->insert('pendapatan');

        

         
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Direct Selling berhasil tersimpan</div>');

        redirect('distributor/directselling');

}

//==================================================================================================================//

   
    



public function hasilpembayaran()
{
    $data['title'] = 'Pembayaran';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['pembayaranuser'] = $this->db->get_where('pembayaran', ['id_receiver' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/hasil_pembayaran', $data);
        $this->load->view('templates/footer');

}

//==================================================================================================================//

   
    



public function hasilpembayaranmember()
{
    $data['title'] = 'Pembayaran Member';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['pembayaranuser'] = $this->db->get_where('pembayaran', ['id_receiver' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/hasil_pembayaran_member', $data);
        $this->load->view('templates/footer');

}

//==================================================================================================================//

   
    



public function verifikasipembayaran($r)
{
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $pembayaran = $this->db->get_where('pembayaran', ['id' => $r])->row_array();

    $created_at=time();

    $status1 = 'Pemesanan Selesai';
    $status2 = 'Pembayaran Telah ter Verifikasi';
    $this->db->set('status', $status1);
    $this->db->where('nomorinvoice', $pembayaran['nomorinvoice']);
    $this->db->update('invoice');

$this->db->set('status', $status2);
$this->db->where('nomorpembayaran', $pembayaran['nomorpembayaran']);
$this->db->update('pembayaran');

$this->db->set('status', $status1);
$this->db->where('nomordo', $pembayaran['nomordo']);
$this->db->update('delivery_order');

$this->db->set('status', $status1);
$this->db->where('nomordo', $pembayaran['nomordo']);
$this->db->update('preorder');

$this->db->set('user_id', $pembayaran['id_receiver']);
       $this->db->set('no_referensi', $pembayaran['nomorpembayaran']);  
       $this->db->set('jenis_pendapatan','Pembayaran Invoice');
       $this->db->set('jumlah_pendapatan', $pembayaran['nominal']);
       $this->db->set('created_at', $created_at);
       $this->db->insert('pendapatan');

       $this->db->set('user_id', $pembayaran['created_by']);
       $this->db->set('no_referensi', $pembayaran['nomorpembayaran']);  
       $this->db->set('jenis_pengeluaran','Pembayaran Invoice');
       $this->db->set('jumlah_pengeluaran', $pembayaran['nominal']);
       $this->db->set('created_at', $created_at);
       $this->db->insert('pengeluaran');




    
   $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pembayaran berhasil ter Verifikasi</div>');

   redirect('distributor/hasilpembayaranmember');

}

//==================================================================================================================//

   
    



public function hasilpembayaranupline()
{
    $data['title'] = 'Pembayaran Upline';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['pembayaranuser'] = $this->db->get_where('pembayaran', ['created_by' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/hasil_pembayaran_upline', $data);
        $this->load->view('templates/footer');

}

//==================================================================================================================//

public function deletepembayaran($r)
{
        $this->db->where('nomorpembayaran', $r);
        $this->db->delete('pembayaran'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('distributor/hasilpembayaranupline');

}


//==================================================================================================================//



public function metodepembayaran()
{
    $data['title'] = 'Metode Pembayaran';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    $data['metodeuser'] = $this->db->get_where('metode_pembayaran', ['user_id' => $user['id']])->result_array();

   

    $this->form_validation->set_rules('metode', 'Metode', 'required|trim',[
        'required' => 'Mohon masukkan Metode Pembayaran',
    ]);

    $this->form_validation->set_rules('nomor', 'Email', 'required|trim',[
        'required' => 'Mohon masukkan Nomor',
    ]);
    $this->form_validation->set_rules('atasnama', 'Atas Nama', 'required|trim',[
        'required' => 'Mohon masukkan Atas Nama',
    ]);


     
    


    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/metodepembayaran', $data);
        $this->load->view('templates/footer');
        
    } else {
        

     
        $metode = $this->input->post('metode');
        $nomor = $this->input->post('nomor');
        $atasnama = $this->input->post('atasnama');
        
    
       


        $this->db->set('metode', $metode);
        $this->db->set('nomor', $nomor);
        $this->db->set('atasnama', $atasnama);
        $this->db->set('user_id', $user['id']);
        $this->db->insert('metode_pembayaran');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
        redirect('distributor/metodepembayaran');
    }
}

//==================================================================================================================//

public function deletemetode($r)
{
        $this->db->where('id', $r);
        $this->db->delete('metode_pembayaran'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('distributor/metodepembayaran');

}

//==================================================================================================================//

public function updatemetode($r)
{
    $metode = $this->input->post('metode');
    $nomor = $this->input->post('nomor');
    $atasnama = $this->input->post('atasnama');
    
    

   


    $this->db->set('metode', $metode);
    $this->db->set('nomor', $nomor);
    $this->db->set('atasnama', $atasnama);
        $this->db->where('id', $r);
        $this->db->update('metode_pembayaran'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ter update</div>');      
  
        redirect('distributor/metodepembayaran');

}

//==================================================================================================================//

   
    



public function pendapatan()
{
    $data['title'] = 'Pendapatan';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['pendapatanuser'] = $this->db->get_where('pendapatan', ['user_id' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/pendapatan', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }


//==================================================================================================================//

   
    



public function pengeluaran()
{
    $data['title'] = 'Pengeluaran';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['pendapatanuser'] = $this->db->get_where('pengeluaran', ['user_id' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('distributor/pengeluaran', $data);
        $this->load->view('templates/footer');

}







    
}
