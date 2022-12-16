<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Founder extends CI_Controller
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('founder/index', $data);
        $this->load->view('templates/footer');
    }

//==================================================================================================================//


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

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
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
            
        } else {
            

           
            //$username = $this->input->post('username');
            $notelpon = $this->input->post('notelpon');
            $email = $this->input->post('email');
            //$name = $this->input->post('name');
            //$namaortu = $this->input->post('namaortu');
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

            //$config['upload_path']          = './assets/pdf/username/';
            //$config['allowed_types']        = 'pdf';
            //$config['max_size']             = 2048;
            

            //$this->load->library('upload', $config);
            //$this->upload->do_upload('pdfusername');
            ///$this->upload->data();
            //$pdf = $this->upload->data('file_name');
            //$this->db->set('pdfusername', $pdf);

           



            //$this->db->set('name', $name);
            //$this->db->set('namaortu', $namaortu);
            //$this->db->set('nis', $nis);
            //$this->db->set('nisn', $nisn);
            //$this->db->set('username', $username);
            $this->db->set('notelpon', $notelpon);
            $this->db->set('email', $email);
            $this->db->where('username', $this->session->userdata('username'));
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun anda berhasil diupdate</div>');
            redirect('user');
        }
    }

//==================================================================================================================//

   
    



    public function legalisir()
    {
        $data['title'] = 'Pengajuan Legalisir username';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        //$data['hargapaket'] = $this->db->get_where('kategori_paket',['kategoripaket'=='kategori_paket'])->row_array();

       //$data['harga'] ==  $this->input->post('kategoripaket');

          //$email = $this->input->post('email');

              if($this->input->post('kategoripaket') == 'Cepat Kab. Bekasi (1 hari) = Rp.50000,00') { $data['harga'] = 50000; 
                    $data['totalharga'] = $data['harga'] + 3000;}
          if($this->input->post('kategoripaket') == 'Cepat Luar Kab. Bekasi (1 hari) = Rp.65000,00') {$data['harga'] = 65000; 
            $data['totalharga'] = $data['harga'] + 3000;} 
           if($this->input->post('kategoripaket') == 'Biasa Kab. Bekasi (3 sampai 5 hari) = Rp.35000,00') { $data['harga'] = 35000; 
                $data['totalharga'] = $data['harga'] + 3000;} 
          if($this->input->post('kategoripaket') == 'Biasa Luar Kab. Bekasi (3 sampai 5 hari) = Rp.40000,00') { $data['harga'] = 40000; 
                $data['totalharga'] = $data['harga'] + 3000;} 
         if($this->input->post('kategoripaket') == 'Biasa Luar Jawa Barat (5 hari lebih) = Rp.50000,00') { $data['harga'] = 50000;
            $data['totalharga'] = $data['harga'] + 3000; }

           
         
         
      

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/legalisir', $data);
            $this->load->view('templates/footer');
        } else {
            



            $data = [
                'name'=>htmlspecialchars($this->input->post('name',true)),
                'username'=>htmlspecialchars($this->input->post('username',true)),   // memakai htmlspecialchars karena
                'notelpon'=>htmlspecialchars($this->input->post('notelpon',true)), 
                    'alamat'=> htmlspecialchars($this->input->post('alamat',true)),
                    'jumlahlegalisir'=> $this->input->post('jumlahlegalisir', array('legalisir' => $data)),
                    'kategoripaket'=> $this->input->post('kategoripaket', array('legalisir' => $data)),
                    'status' => 'Belum di proses',
                    'harga' => $data['totalharga'],
                    'waktu' => time() 
           
                    
                       ]; 
             
             

         

   
              
               //$this->db->set('harga',$harga);
              $this->db->insert('legalisir', $data);
              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Pengajuan Legalisir Berhasil, Silahkan lakukan pembayaran dengan metode pembayaran di bawah dan untuk konfirmasi pembayaran silahkan hubungi admin</div>');
              redirect('user/legalisir');
          

            //$this->db->set('name', $name);
           // $this->db->where('email', $email);
           // $this->db->update('user');

            
        }
    }


//==================================================================================================================//

   
    



    public function pembayaran()
    {
        $data['title'] = 'Konfirmasi Pembayaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['legalisiruser'] = $this->db->get_where('legalisir',['username' => $this->session->userdata('username')])->result_array();
        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();




        //$data['hargapaket'] = $this->db->get_where('kategori_paket',['kategoripaket'=='kategori_paket'])->row_array();

       //$data['harga'] ==  $this->input->post('kategoripaket');

          //$email = $this->input->post('email');

        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
           $nomorpemesanan = $this->input->post('nomorpemesanan');
           $atasnama = $this->input->post('atasnama');
           $nominal = $this->input->post('nominal');
           $namaalumni = $user['name'];
           $nis = $user['nis'];
         
      
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
            $this->load->view('user/pembayaran', $data);
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
            $this->db->set('namaalumni', $namaalumni);
            $this->db->set('nis', $nis);
            $this->db->set('nominal', $nominal);
            $this->db->set('nomorpemesanan', $nomorpemesanan);
            $this->db->insert('pembayaran');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Konfirmasi Pembayaran Legalisir username Berhasil, Silahkan Konfirmasi ke Nomor Admin dibawah untuk proses pengiriman</div>');
            redirect('user/pembayaran');
            
             
             
            
        }
    }

//==================================================================================================================//

    public function legalisirdelete($r)
    {
            $data['title'] = 'Legalisir Delete';
             $this->db->set('legalisir', $r);
            $this->db->where('id', $r);
            $this->db->delete('legalisir'); 

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil terhapus</div>');      
      
            redirect('user/menulegalisiruser');
    
    }


//==================================================================================================================//

    public function legalisirselesai($r)
    {
            $data['title'] = 'Legalisir Process';
            $data = [
                               
                    'status' => 'Sudah di terima'
                     ];
              $this->db->where('id', $r);
              $this->db->update('legalisir', $data);
             

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Penerimaan legalisir username berhasil</div>');      
      
            redirect('user/menulegalisiruser');
    
    }

//==================================================================================================================//

    public function menulegalisiruser()
    {
        $data['title'] = 'Menu Legalisir';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['legalisiruser'] = $this->db->get_where('legalisir',['username' => $this->session->userdata('username')])->result_array();

        //$data['hargapaket'] = $this->db->get('kategori_paket')->result_array();




          //$this->load->model('Hargapaket_model', 'harga');
        //$data['hargapaket'] = $this->harga->getHargaPaket();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/menulegalisiruser', $data);
        $this->load->view('templates/footer');

       


    }


//==================================================================================================================//

    public function daftarnilai()
    {
        $data['title'] = 'Daftar Nilai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $user = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['daftarnilai'] = $this->db->get_where('daftarnilai',['name' => $user['name']])->result_array();
        //$data['daftarnilai'] = $this->db->get('daftarnilai')->result_array();

        //$data['hargapaket'] = $this->db->get('kategori_paket')->result_array();




          //$this->load->model('Hargapaket_model', 'harga');
        //$data['hargapaket'] = $this->harga->getHargaPaket();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/daftarnilai', $data);
        $this->load->view('templates/footer');

       


    }

//==================================================================================================================//

    public function legalisirpembayaran($r)
    {
       


            $data['legalisiruser'] = $this->db->get_where('legalisir',['username' => $this->session->userdata('username')])->result_array();

            $config['upload_path']          = './assets/buktipembayaran/';
            $config['allowed_types']        = 'pdf|jpg|png|jpeg';
            $config['max_size']             = 2048;
            

            $this->load->library('upload', $config);
            $this->upload->do_upload('buktipembayaran');
            $this->upload->data();
            $buktibayar = $this->upload->data('file_name');
            $this->db->set('buktipembayaran', $buktibayar);
            $this->db->where('id', $r);
            $this->db->update('legalisir');
             

             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Upload Bukti pembayaran berhasil</div>');

             redirect('user/menulegalisiruser'); 

    }

//==================================================================================================================//


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim',[
            'required' => 'Mohon masukkan Password saat ini']);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]',[
            'required' => 'Mohon masukkan Password baru',
            'min_length' => 'Password minimal 6 digit']);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]',[
            'required' => 'Mohon masukkan Password baru ulang',
            'min_length' => 'Password minimal 6 digit',
            'matches' => 'Password tidak sama']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password saat ini salah</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diganti</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    
}

