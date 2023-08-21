<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
        $data['title'] = 'Pendaftaran Calon Siswa';
        $this->load->view('tamplates/auth_header', $data);
        $this->load->view('pendaftaran', $data);
        // $this->load->view('tamplates/auth_footer');
    }

    public function prosesDaftar()
    {
        // var_dump($_POST);
        // die;
        $this->form_validation->set_rules('nama_siswa', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_orangtua', 'Nama Orang Tua', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == false) {
            redirect('pendaftaran');
        } else {
            $data_akun['namalengkap'] = $this->input->post('nama_siswa');
            $data_akun['username'] = $this->input->post('username');
            $password = $this->input->post('password1');
            $password2 = $this->input->post('password2');
            $data_akun['akses'] = 2;
            $data_akun['isActive'] = 1;
            // var_dump($data_akun);
            // die;
            // validasi
            if ($password == $password2) {
                // echo "Password sama!";
                $options = [
                    'cost' => 5,
                ];
                // echo password_hash($password, PASSWORD_DEFAULT, $options);

                $data_akun['password'] = password_hash($password, PASSWORD_DEFAULT, $options);
                $this->M_register->insertUser($data_akun);

                // $this->session->set_flashdata('pesan', "
                // <script>
                //     swal('Berhasil!', 'Anda Berhasil Mendaftar. Silahkan Login', 'success');
                // </script>
                // ");
                // redirect('pendaftaran');
            } else {
                $this->session->set_flashdata('pesan', "
                <script>
                    swal('Gagal!', 'Password tidak sama!', 'error');
                </script>
                ");
                redirect('pendaftaran');
            }

            $data_pendaftaran = [
                'nama_siswa' => $this->input->post('nama_siswa', true),
                'nama_panggil' => $this->input->post('nama_panggil', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
                'jk' => $this->input->post('jk', true),
                'agama_siswa' => $this->input->post('agama_siswa', true),
                'alamat_siswa' => $this->input->post('alamat_siswa', true),
                // ORANG TUA
                'nama_orangtua' => $this->input->post('nama_orangtua', true),
                'pekerjaan' => $this->input->post('pekerjaan', true),
                'agama_orangtua' => $this->input->post('agama_orangtua', true),
                'telp' => $this->input->post('telp', true),
                'alamat_orangtua' => $this->input->post('alamat_orangtua', true),
                // STATUS
                'status' => 'Menunggu..'
            ];
            // var_dump($data_pendaftaran);
            // die;
            $query = $this->db->insert('pendaftaran', $data_pendaftaran);

            if ($query) {
                $this->session->set_flashdata('pesan', "
                <script>
                    swal('Berhasil!', 'Anda Berhasil Mendaftar. Silahkan Login.', 'success');
                </script>
                ");
                redirect('auth');
            } else {
                $this->session->set_flashdata('pesan', "
                <script>
                    swal('Gagal!', 'Anda Gagal Mendaftar', 'error');
                </script>
                ");
                redirect('pendaftaran');
            }
        }
    }
}
