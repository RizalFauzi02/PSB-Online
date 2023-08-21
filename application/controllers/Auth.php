<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_login');
        $this->load->model('M_register');
        // if (count($this->db->get_where('users', ['akses' => 1])->result()) == 0) {
        //     redirect('install');
        // }

        // if($this->session->has_userdata('isLoggin') != true){
        //     redirect('auth');
        // }

    }

    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('tamplates/auth_header', $data);
        $this->load->view('auth/login', $data);
        $this->load->view('tamplates/auth_footer');
        // echo "TEST";
    }

    // PROSES
    public function prosessLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $getUser = $this->M_login->getUser($username);
        // var_dump($getUser); die;

        // PROSES PENGECEKAN
        if (count($getUser) == 1) {
            if (password_verify($password, $getUser[0]->password)) {

                $dataSession = array(
                    "id_users"    => $getUser[0]->id_users,
                    "namalengkap" => $getUser[0]->namalengkap,
                    "username"    => $getUser[0]->username,
                    "isActive"    => $getUser[0]->isActive,
                    "akses"       => $getUser[0]->akses,
                    "isLoggin" => true
                );
                $this->session->set_userdata($dataSession);

                if ($getUser[0]->isActive == 1) {
                    if ($getUser[0]->akses == 1) {
                        redirect('Admin');
                        // echo "berhasil masuk AKUN ADMIN!";
                    } elseif ($getUser[0]->akses == 2) {
                        redirect('Siswa');
                        // echo "berhasil masuk! AKUN SISWA";
                    }
                }
            } else {
                $this->session->set_flashdata('pesan', "
                <script>
                    swal('Password Salah!', 'Silahkan diperiksa kembali!', 'error');
                </script>
                ");
                redirect('auth');
            }
        } elseif (count($getUser) == 0) {
            $this->session->set_flashdata('pesan', "
                <script>
                    swal('Akun tidak ditemukan!', 'Silahkan hubungi admin!', 'warning');
                </script>
                ");
            redirect('auth');
        } else {
            echo "<script>
                    alert('Username tidak ditemukan!');    
                    window.location.href='" . base_url() . "auth';
                </script>";
        }
    }

    // REGISTRASI USER
    public function reg()
    {
        $data['title'] = 'Registrasi Akun';
        $this->load->view('tamplates/auth_header', $data);
        $this->load->view('auth/reg', $data);
        $this->load->view('tamplates/auth_footer');
    }

    // PROSES REGIS
    public function prosesReg()
    {
        // var_dump($_POST); die;
        // Rules
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == false) {
            redirect('auth/reg');
        } else {
            $data['namalengkap'] = $this->input->post('namalengkap');
            $data['username'] = $this->input->post('username');
            $password = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            $data['akses'] = 2;
            $data['isActive'] = 1;

            // validasi
            if ($password == $password2) {
                // echo "Password sama!";
                $options = [
                    'cost' => 5,
                ];
                // echo password_hash($password, PASSWORD_DEFAULT, $options);

                $data['password'] = password_hash($password, PASSWORD_DEFAULT, $options);
                $this->M_register->insertUser($data);

                $this->session->set_flashdata('pesan', "
                <script>
                    swal('Berhasil!', 'Anda Berhasil Mendaftar. Silahkan Login', 'success');
                </script>
                ");
                redirect('auth');
            } else {
                $this->session->set_flashdata('pesan', "
                <script>
                    swal('Gagal!', 'Password tidak sama!', 'error');
                </script>
                ");
                redirect('auth/reg');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('akses');
        redirect('auth');
    }
}
