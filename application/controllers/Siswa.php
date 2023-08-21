<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_siswa');

        // MENCEGAH USER TANPA LOGIN
        if ($this->session->has_userdata('isLoggin') != true) {
            redirect('auth');
        }
    }

    public function index()
    {

        // echo $this->session->userdata('id_users');
        // die;

        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu_view'] = [
            'req' => 'active' // isi active jika sesuai dengan menu
        ];

        // AMBIL DATA YANG SUDAH MENDAFTAR
        // $data['daftar'] = $this->db->get_where('pendaftaran', ['id_users' => $_SESSION['id_users']])->result();
        $namalengkap = $_SESSION['namalengkap'];
        $data['daftar'] = $this->M_siswa->getDataPendaftar($namalengkap);
        // var_dump($data['daftar']);
        // die;

        $this->load->view('tamplates/header', $data);
        $this->load->view('tamplates/sidebar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('tamplates/footer');
    }

    // DETAIL SISWA
    public function detail($id)
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu_view'] = [
            'req' => 'active' // isi active jika sesuai dengan menu
        ];

        // MENGAMBIL DATA BY ID YANG SUDAH DIKIRIMKAN MELALUI LINK DI TAMPILAN
        $data['detail'] = $this->M_siswa->getDetailById($id)->result();

        $this->load->view('tamplates/header', $data);
        $this->load->view('tamplates/sidebar', $data);
        $this->load->view('siswa/detail', $data);
        $this->load->view('tamplates/footer');
    }

    // public function form()
    // {
    //     $data['daftar'] = $this->db->get_where('pendaftaran', ['id_users' => $_SESSION['id_users']])->result();
    //     if (count($data['daftar']) == 1) {
    //         $this->session->set_flashdata('pesan', "
    //         <script>
    //             swal('Error!', 'Anda Sudah Mendaftar. Tidak bisa lebih dari 2 pendaftaran', 'error');
    //         </script>
    //         ");
    //         redirect('Siswa');
    //     } else {
    //         $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
    //         $data['menu_view'] = [
    //             'req' => 'active' // isi active jika sesuai dengan menu
    //         ];

    //         $this->load->view('tamplates/header', $data);
    //         $this->load->view('tamplates/sidebar', $data);
    //         $this->load->view('siswa/form', $data);
    //         $this->load->view('tamplates/footer');
    //     }
    // }

    // public function prosesDaftar()
    // {
    //     // var_dump($_POST);
    //     // die;
    //     $this->form_validation->set_rules('nama_siswa', 'Nama Lengkap', 'required');
    //     $this->form_validation->set_rules('nama_orangtua', 'Nama Orang Tua', 'required');

    //     if ($this->form_validation->run() == false) {
    //         redirect('siswa/form');
    //     } else {
    //         $data = [
    //             'id_users' => $this->input->post('id_users', true),
    //             'nama_siswa' => $this->input->post('nama_siswa', true),
    //             'nama_panggil' => $this->input->post('nama_panggil', true),
    //             'tempat_lahir' => $this->input->post('tempat_lahir', true),
    //             'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
    //             'jk' => $this->input->post('jk', true),
    //             'agama_siswa' => $this->input->post('agama_siswa', true),
    //             'alamat_siswa' => $this->input->post('alamat_siswa', true),
    //             // ORANG TUA
    //             'nama_orangtua' => $this->input->post('nama_orangtua', true),
    //             'pekerjaan' => $this->input->post('pekerjaan', true),
    //             'agama_orangtua' => $this->input->post('agama_orangtua', true),
    //             'telp' => $this->input->post('telp', true),
    //             'alamat_orangtua' => $this->input->post('alamat_orangtua', true),
    //             // STATUS
    //             'status' => 'Menunggu..'
    //         ];

    //         $query = $this->db->insert('pendaftaran', $data);

    //         if ($query) {
    //             $this->session->set_flashdata('pesan', "
    //             <script>
    //                 swal('Berhasil!', 'Anda Berhasil Mendaftar', 'success');
    //             </script>
    //             ");
    //             redirect('siswa');
    //         } else {
    //             $this->session->set_flashdata('pesan', "
    //             <script>
    //                 swal('Gagal!', 'Anda Gagal Mendaftar', 'error');
    //             </script>
    //             ");
    //             redirect('siswa/form');
    //         }
    //     }
    // }
}
