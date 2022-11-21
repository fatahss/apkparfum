<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
 {
    public function __construct()
    
    {
      
        parent::__construct();
        $this->load->library('form_validation');
    }

//==================================================================================================================//

    public function index()
    
    {
        
  
           $this->load->view('auth/index');
      
 
    }
//==================================================================================================================//

public function idcard($r)
    
{
     $data['title'] = 'ID Card';
     $data['user'] = $this->db->get_where('user',['id' => $r])->row_array();
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
        


        $data['member'] = $this->db->get_where('user',['upline' => $user['id']])->result_array();
  

       $this->load->view('templates/auth_header', $data);
       $this->load->view('auth/idcard');
       $this->load->view('templates/auth_footer');
   

}

//==================================================================================================================//

public function login()
    
{
     $data['title'] = 'Halaman Login';
     $this->form_validation->set_rules('username','username', 'trim|required',[
        'required' => 'Username tidak boleh kosong']);
     $this->form_validation->set_rules('password','password', 'trim|required',[
        'required' => 'Password tidak boleh kosong']);
     
     if($this->form_validation->run() == false) {

       $this->load->view('templates/auth_header', $data);
       $this->load->view('auth/login');
       $this->load->view('templates/auth_footer');
    } else {
        // validasinya success
        $this->_login();
    }

}

//==================================================================================================================//

    private function _login()
    {
        $username =$this->input->post('username');
        $password =$this->input->post('password');
        $user= $this->db->get_where('user',['username' => $username])->row_array();
        
        //user active
        if($user) {
            //jika usernya aktif
            if($user['is_active'] == 1) {
                // cek password
                if(password_verify($password, $user['password'])) {
                    $data =[
                      'username' => $user['username'],
                      'role_id' =>$user['role_id']
                    ];
                    $this->session->set_userdata($data);
                     $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Login sukses </div>');
                    if($user['role_id']== 1) {
                       redirect('admin');
                    } 
                    if($user['role_id']== 2) {
                       redirect('founder');
                    }
                    if($user['role_id']== 3) {
                       redirect('supplier');
                    }
                    if($user['role_id']== 4) {
                       redirect('distributor');
                    }
                    if($user['role_id']== 5) {
                       redirect('reseller');
                    }

                    
                } else {
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Password anda salah</div>');
              redirect('auth/login');
                }

            }else{
               $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Email belum anda belum di aktivasi</div>');
              redirect('auth/login'); 
            
            }
        } else {
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> Akun anda belum pernah terdaftar</div>');
              redirect('auth/login');
        }
    }
//==================================================================================================================//
 
    public function cariupline()
    {
    
    redirect('auth/register');
   
    

}

//==================================================================================================================//
 
    public function register()
    
    {
        $data['dataupline']  = $this->db->query("SELECT * FROM user WHERE role_id IN (2, 3, 4)")->result_array();


        $this->form_validation->set_rules('name','Name','required|trim',[
            'required' => 'Nama tidak boleh kosong'      // untuk menampilkan pesan jika nama , email , dll kosong           
            ]);
        $this->form_validation->set_rules('password','Password','required|trim',[
            'required' => 'Password tidak boleh kosong'
            ]);
        $this->form_validation->set_rules('alamat','Alamat','required|trim',[
            'required' => 'Alamat tidak boleh kosong'
            ]);
        $this->form_validation->set_rules('notelpon','Notelpon','required|trim|is_unique[user.notelpon]',[
            'required' => 'Nomor Telepon tidak boleh kosong',
            'is_unique' => 'Nomor Telepon sudah pernah terdaftar'  // untuk menampilkan pesan jika email , nisn , atau ijazah tidak unique yang ada di database
            ]);

        $this->form_validation->set_rules('email','Email','required|trim|is_unique[user.email]',[
            'required' => 'Email tidak boleh kosong',
            'is_unique' => 'Email sudah pernah terdaftar'  // untuk menampilkan pesan jika email , nisn , atau ijazah tidak unique yang ada di database
            ]);
      
       
        $this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]',[
            'required' => 'Username tidak boleh kosong',
            'is_unique' => 'Username sudah pernah terdaftar'
            ]);
      

        if ($this->form_validation->run() == false) {
           $data['title'] ='User Registration';
           $this->load->view('templates/auth_header', $data);
           $this->load->view('auth/register');
           $this->load->view('templates/auth_footer');
        } else {

            

               
                

                $name = htmlspecialchars($this->input->post('name',true));
                $username = htmlspecialchars($this->input->post('username',true));
                $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
                $notelpon = htmlspecialchars($this->input->post('notelpon',true));
                $email = htmlspecialchars($this->input->post('email',true));
                $alamat = htmlspecialchars($this->input->post('alamat',true));
               $role = htmlspecialchars($this->input->post('role',true));
                $upline = htmlspecialchars($this->input->post('upline',true));
                $dataupline = $this->db->get_where('user', ['id' => $upline])->row_array();


                $upline_name = $dataupline['name'];
                
                $image = 'default.jpg';
                $is_active = 0;
                $date_create = time()+17968;
                if($this->input->post('role') == 'Supplier'){
                $role_id = 3;
                }
                 if($this->input->post('role') == 'Distributor'){
                $role_id = 4;
                }
                if($this->input->post('role') == 'Reseller'){
                $role_id = 5;
                }

          

               
            $this->db->set('name', $name);
            $this->db->set('username', $username);
            $this->db->set('password', $password);
            $this->db->set('upline', $upline);
            $this->db->set('upline_name', $upline_name);
            $this->db->set('notelpon', $notelpon);
             $this->db->set('email', $email);
            $this->db->set('alamat', $alamat);
            $this->db->set('image', $image);
            $this->db->set('role_id', $role_id);
            $this->db->set('role', $role);
            $this->db->set('is_active', $is_active);
            $this->db->set('date_create', $date_create);
            
            $this->db->insert('user');
              
              
              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Akun berhasil dibuat, Password default : 123456</div>');
              redirect('auth/login');
        }


    }

//==================================================================================================================//


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Akun anda berhasil logout</div>');
              redirect('auth/login');
    }

//==================================================================================================================//
     
    public function blocked()
    {
        $this->load->view('auth/blocked');
    }


 }