<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
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
        $this->load->view('supplier/index', $data);
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
            $this->load->view('supplier/edit', $data);
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
            $this->load->view('supplier/changepassword', $data);
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

//==================================================================================================================//

    public function menumember()
    {
        $data['title'] = 'Menu Member Supplier';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['datasiswa'] = $this->db->get_where('user',['role_id' => 4])->result_array();
        $data['daftarnilai'] = $this->db->get('daftarnilai')->result_array();
        $data['menumapel'] = $this->db->get('daftarmapel')->result_array();
        $data['menukelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('nilaipengetahuan', 'Nilai Pengetahuan', 'required');
        $this->form_validation->set_rules('nilaiketerampilan', 'Nilai Keterampilan', 'required');
        $this->form_validation->set_rules('nilaiakhir', 'Nilai Akhir', 'required');
        $this->form_validation->set_rules('predikat', 'Predikat', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('supplier/menumember', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [

            'name' => $this->input->post('name', array('daftarnilai' => $data)),
            'kelas' => $this->input->post('kelas', array('daftarnilai' => $data)),
            'namamapel' => $this->input->post('namamapel', array('daftarnilai' => $data)),
            'nilaipengetahuan' => $this->input->post('nilaipengetahuan'),
            'nilaiketerampilan' => $this->input->post('nilaiketerampilan'),
            'nilaiakhir' => $this->input->post('nilaiakhir'),
            'predikat' => $this->input->post('predikat'),
            ];


            $this->db->insert('daftarnilai', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai Berhasil Ditambahkan</div>');
            redirect('guru');
        }
    }

//==================================================================================================================//


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }





    
}
