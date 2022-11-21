<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reseller extends CI_Controller
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
        $this->load->library('formatAngka');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reseller/index', $data);
        $this->load->view('templates/footer');
    }

//==================================================================================================================//



     public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
        $data['metodeuser'] = $this->db->get_where('metode_pembayaran', ['user_id' => $user['id']])->result_array();
    
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
            $this->load->view('reseller/edit', $data);
            $this->load->view('templates/footer');
            
        } else {
            

           //$name = $this->input->post('name');
            //$username = $this->input->post('username');
            $notelpon = $this->input->post('notelpon');
            $email = $this->input->post('email');
            
            //$alamat = $this->input->post('alamat');
            //$nis = $this->input->post('nis');
            //$nisn = $this->input->post('nisn');
           



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
            redirect('reseller/edit');
        }
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
        $this->load->view('reseller/metodepembayaran', $data);
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

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Date berhasil ditambah</div>');
        redirect('reseller/metodepembayaran');
    }
}

//==================================================================================================================//

public function deletemetode($r)
{
        $this->db->where('id', $r);
        $this->db->delete('metode_pembayaran'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('reseller/metodepembayaran');

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
  
        redirect('reseller/metodepembayaran');

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
            $this->load->view('reseller/changepassword', $data);
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

   
    



    public function preorder()
    {
        $data['title'] = 'Preorder';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        
        $data['cartuser'] = $this->db->get_where('cart', ['username' => $this->session->userdata('username')])->result_array();
        $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
        $data['pouser'] = $this->db->get_where('preorder', ['id_requester' => $user['id']])->result_array();
        
        $data['parfum'] = $this->db->get('parfum')->result_array();
        $data['podetailuser'] = $this->db->get_where('preorder_detail', ['id_requester' => $user['id'] ])->result_array();
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
            $this->load->view('reseller/preorder', $data);
            $this->load->view('templates/footer');
       
             
             

            
        }

//==================================================================================================================//

public function preorderdetail($r)
{
    $data['title'] = 'Preorder Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('preorder', ['nomorpo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('preorder_detail', ['nomorpo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reseller/preorderdetail', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

public function preorderedit($r)
{
    $data['title'] = 'Preorder Edit';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('preorder', ['nomorpo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('preorder_detail', ['nomorpo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reseller/preorderedit', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//


    public function deletepreorderitem($r)
    {
            $this->db->where('id', $r);
            $this->db->delete('preorder_detail'); 
    
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
      
            redirect('reseller/preorderedit');
    
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

    
   

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reseller/pengajuanpreorder', $data);
        $this->load->view('templates/footer');
   
 

        
    
}

//==================================================================================================================//

public function cekpodetail($r)
{
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['podetailuser'] = $this->db->get_where('preorder_detail', ['nomorpo' => $r])->result_array();

}

//==================================================================================================================//

    public function deletecart($r)
    {
            $this->db->where('id', $r);
            $this->db->delete('cart'); 

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
      
            redirect('reseller/pengajuanpreorder');
    
    }

//==================================================================================================================//

public function cartreset()
{
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->where('username', $user['username']);
        $this->db->delete('cart'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('reseller/pengajuanpreorder');

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
            $product_id=$value_pisah[2];
            
            $jumlah=$this->input->post('jumlahparfum');
            $harga=$value_pisah[1]*$jumlah;
       
                
        $query = $this->db->get_where('cart', ['product_id' => $product_id , 'username' => $username] )->result_array();
        $jumlahrow = count($query);
        if($jumlahrow == 0){
            $this->db->set('nomorpo', $nomorpo);
            $this->db->set('username', $username);
            $this->db->set('product', $product);
            $this->db->set('product_id', $product_id);
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
            

            

             
      
            redirect('reseller/pengajuanpreorder');
    
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
             $product_id = $r['product_id'];
              $jumlah = $r['jumlah'];
              $harga = $r['harga'];

                


            
            
        $this->db->set('nomorpo', $nomorpo1);    
           $this->db->set('id_requester', $user['id']);
           $this->db->set('id_receiver', $user['upline']);
            $this->db->set('product', $product);
            $this->db->set('product_id', $product_id);
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

            redirect('reseller/preorder');
    
    }

//==================================================================================================================//

public function deletepo($r)
{
        $this->db->where('nomorpo', $r);
        $this->db->delete('preorder'); 
        $this->db->where('nomorpo', $r);
        $this->db->delete('preorder_detail');
        

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Preorder berhasil terhapus</div>');      
  
        redirect('reseller/preorder');

}

//==================================================================================================================//

   
    



public function deliveryorder()
{
    $data['title'] = 'Delivery Order';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['upline'] = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    $data['douser'] = $this->db->get_where('delivery_order', ['id_requester' => $user['upline']])->result_array();
    
    $data['parfum'] = $this->db->get('parfum')->result_array();
    $data['dodetailuser'] = $this->db->get_where('delivery_order_detail', ['id_requester' => $user['upline']])->result_array();
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reseller/deliveryorder', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }

//==================================================================================================================//

public function deliveryorderdetail($r)
{
    $data['title'] = 'Delivery Order Detail';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


    
    $data['directsellinguser'] = $this->db->get_where('delivery_order', ['nomordo' => $r])->row_array();
    $data['directsellinguserdetail'] = $this->db->get_where('delivery_order_detail', ['nomordo' => $r])->result_array();
    $data['parfum'] = $this->db->get('parfum')->result_array();
    


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reseller/deliveryorderdetail', $data);
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
    $product_id = $r['product_id'];
    $product = $r['product'];
     $jumlah = $r['qty'];
     
     $query = $this->db->get_where('inventory', ['product' => $product , 'user_id'=> $user['id']] )->result_array();
     $jumlahrow = count($query);
     if($jumlahrow == 0){
        $this->db->set('user_id', $user['id']);
        $this->db->set('product', $product);
        $this->db->set('product_id', $product_id);
        $this->db->set('jumlah', $jumlah);
     $this->db->insert('inventory');

     }
     if($jumlahrow == 1){
         $this->db->set('jumlah', "jumlah + $jumlah" , FALSE);
         $this->db->where('product_id', $product_id);
         $this->db->where('user_id', $user['id']);
         $this->db->update('inventory');

     } 
    
     $this->db->set('jumlah', "jumlah - $jumlah" , FALSE);
         $this->db->where('product_id', $product_id);
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

   redirect('reseller/deliveryorder');

}


//==================================================================================================================//

   
    



public function inventory()
{
    $data['title'] = 'Inventory';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $userid = $user['id'];
    
    //$data['inventoryuser'] = $this->db->get_where('inventory', ['user_id' => $user['id']])->result_array();

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
        $this->load->view('reseller/inventory', $data);
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
        $this->load->view('reseller/directselling', $data);
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
            $this->load->view('reseller/directsellingdetail', $data);
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
        $this->load->view('reseller/directsellingbaru', $data);
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
        $product_id=$value_pisah[2];
        
        $jumlah=$this->input->post('jumlahparfum');
        $no_direct_selling=$this->input->post('nomordirectselling');
        $harga=$value_pisah[1]*$jumlah;
        $query = $this->db->get_where('cart2', ['product_id' => $product_id , 'username' => $username] )->result_array();
        $jumlahrow = count($query);
        if($jumlahrow == 0){
            $this->db->set('no_direct_selling', $no_direct_selling);
            $this->db->set('username', $username);
            $this->db->set('product', $product);
            $this->db->set('product_id', $product_id);
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
        
              
        

        

         
  
        redirect('reseller/directsellingbaru');

}

//==================================================================================================================//

public function deletecart2($r)
{
        $this->db->where('id', $r);
        $this->db->delete('cart2'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('reseller/directsellingbaru');

}

//==================================================================================================================//

public function cartreset2()
{
    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->db->where('username', $user['username']);
        $this->db->delete('cart2'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('reseller/directsellingbaru');

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

    $direct2 = $this->db->get_where('direct_selling_detail', ['no_direct_selling' => $no_direct_selling]);
    foreach ($direct2->result_array() as $row2)
    {
    $period_array2[] = intval($row2['qty']);
    }
    $total_product = array_sum($period_array2);

    $ongkir=$this->input->post('ongkir');
    $diskon=$this->input->post('diskon');
    $namapembeli=$this->input->post('namapembeli');



    $this->db->set('no_direct_selling', $no_direct_selling);   
       $this->db->set('namauser', $namauser);
       $this->db->set('sub_total', $total);
       $this->db->set('namapembeli', $namapembeli);
       $this->db->set('ongkir', $ongkir);
       $this->db->set('total_product', $total_product);
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

        redirect('reseller/directselling');

}

//==================================================================================================================//

public function deletedirectselling($r)
{
        $this->db->where('no_direct_selling', $r);
        $this->db->delete('direct_selling'); 
        $this->db->where('no_direct_selling', $r);
        $this->db->delete('direct_selling_detail');
        

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Direct Selling berhasil terhapus</div>');      
  
        redirect('reseller/directselling');

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
        $this->load->view('reseller/pendapatan', $data);
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
        $this->load->view('reseller/pengeluaran', $data);
        $this->load->view('templates/footer');

}
   

//==================================================================================================================//

   
    



public function invoice()
{
    $data['title'] = 'Invoice';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['invoiceuser'] = $this->db->get_where('invoice', ['id_receiver' => $user['id']])->result_array();
    
   


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reseller/invoice', $data);
        $this->load->view('templates/footer');
   
         
         

        
    }


//==================================================================================================================//

   
    



public function pembayaran($r)
{
    $data['title'] = 'Pembayaran';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $data['metodepembayaran'] = $this->db->get_where('metode_pembayaran', ['user_id' => $user['upline']])->result_array();
    
    $data['invoice'] = $this->db->get_where('invoice', ['nomorinvoice' => $r])->row_array();
    
   

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
   

    $this->db->select_max('id', 'max');

$query = $this->db->get_where('pembayaran', ['created_by' => $user['id']]);
if ($query->num_rows() == 0) {
  return 1;
}
$max = $query->row()->max;

$data['pembayaranbaru'] = $max + 1;

$data['date'] = time()+17968;
    
  
     $this->load->view('templates/header', $data);
     $this->load->view('templates/sidebar', $data);
     $this->load->view('templates/topbar', $data);
     $this->load->view('reseller/pembayaran', $data);
     $this->load->view('templates/footer');
 


     

        
    }

//==================================================================================================================//

   
    



public function ajukanpembayaran()
{
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $upline = $this->db->get_where('user', ['id' => $user['upline']])->row_array();
    

    
    
   

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    $nomorpembayaran = $this->input->post('nomorpembayaran');
    $nomorinvoice = $this->input->post('nomorinvoice');
    $nomorpo = $this->input->post('nomorpo');
    $nomordo = $this->input->post('nomordo');
    $total_harga = $this->input->post('total_harga');
    $total_product = $this->input->post('total_product');

    $atasnama = $this->input->post('atasnama');
    $nominal = $this->input->post('nominal');
    $date = time()+17968;

 
    
  

    $this->form_validation->set_rules('atasnama', 'Nama Pengirim', 'required',[
     'required' => 'Nama Pengirim tidak boleh kosong',
     ]);
    $this->form_validation->set_rules('nominal', 'Nominal Pembayaran', 'required',[
     'required' => 'Nominal tidak boleh kosong',
     ]);


 if ($this->form_validation->run() == false) {
     $this->load->view('templates/header', $data);
     $this->load->view('templates/sidebar', $data);
     $this->load->view('templates/topbar', $data);
     $this->load->view('reseller/pembayaran', $data);
     $this->load->view('templates/footer');
 } else {
     

      $config['upload_path']          = './assets/buktipembayaran/';
     $config['allowed_types']        = 'pdf|jpg|png|jpeg';
     $config['max_size']             = 2048;
     

     $this->load->library('upload', $config);
     $this->upload->do_upload('buktipembayaran');
     $this->upload->data();
     $buktibayar = $this->upload->data('file_name');
     $this->db->set('buktipembayaran', $buktibayar);
     $this->db->set('atasnama', $atasnama);
     $this->db->set('nama_requester', $user['name']);
     $this->db->set('nama_receiver', $upline['name']);
     $this->db->set('id_receiver', $user['upline']);
     $this->db->set('created_by', $user['id']);
     $this->db->set('created_at', $date);
     $this->db->set('nominal', $nominal);
     $this->db->set('total', $total_harga);
     $this->db->set('total_product', $total_product);
     $this->db->set('nomorpembayaran', $nomorpembayaran);
     $this->db->set('nomorinvoice', $nomorinvoice);
     $this->db->set('nomorpo', $nomorpo);
     $this->db->set('nomordo', $nomordo);
     $this->db->set('status', 'Pembayaran belum ter Verifikasi');
     $this->db->insert('pembayaran');

     $status = 'Pembayaran belum ter Verifikasi';
     $this->db->set('nomorpembayaran', $nomorpembayaran);
     $this->db->set('status', $status);
     $this->db->where('nomorinvoice', $nomorinvoice);
     $this->db->update('invoice');

     $this->db->set('nomorpembayaran', $nomorpembayaran);
     $this->db->set('status', $status);
     $this->db->where('nomordo', $nomordo);
     $this->db->update('delivery_order');

     $this->db->set('nomorpembayaran', $nomorpembayaran);
     $this->db->set('status', $status);
     $this->db->where('nomorpo', $nomorpo);
     $this->db->update('preorder');

   

       

     $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Pembayaran Berhasil, Silahkan hubungi ke Nomor Upline untuk Proses Verifikasi</div>');
     redirect('reseller/invoice');


     
      
      
     
 }
         
        
    }

//==================================================================================================================//

   
    



public function hasilpembayaran()
{
    $data['title'] = 'Pembayaran';
    $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

    
    $data['pembayaranuser'] = $this->db->get_where('pembayaran', ['created_by' => $user['id']])->result_array();
    
   
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reseller/hasil_pembayaran', $data);
        $this->load->view('templates/footer');


    

}

//==================================================================================================================//

public function deletepembayaran($r)
{
        $this->db->where('nomorpembayaran', $r);
        $this->db->delete('pembayaran'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
  
        redirect('reseller/hasilpembayaran');

}











    
}
