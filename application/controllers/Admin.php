<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');
        $this->load->model('M_siswa');
        if ($this->session->has_userdata('isLoggin') != true) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu_view_admin'] = [
            'pengguna'  => 'active', // isi active jika sesuai dengan menu
            'daftar'    => ''
        ];

        // AMBIL DATA
        $data['pengguna'] = $this->db->get('users')->result();

        $this->load->view('tamplates/header', $data);
        $this->load->view('tamplates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('tamplates/footer');
    }

    // DETAIL PENGGUNA
    public function detail($id)
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu_view_admin'] = [
            'pengguna'  => 'active', // isi active jika sesuai dengan menu
            'daftar'    => ''
        ];

        // MENGAMBIL DATA BY ID YANG SUDAH DIKIRIMKAN MELALUI LINK DI TAMPILAN
        $data['detail'] = $this->M_admin->getDetailById($id)->result();

        $this->load->view('tamplates/header', $data);
        $this->load->view('tamplates/sidebar', $data);
        $this->load->view('admin/detail', $data);
        $this->load->view('tamplates/footer');
    }

    // EDIT
    public function edit($id)
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        // var_dump($data['users']);
        // die;
        $data['menu_view_admin'] = [
            'pengguna'  => 'active', // isi active jika sesuai dengan menu
            'daftar'    => ''
        ];

        // MENGAMBIL DATA BY ID YANG SUDAH DIKIRIMKAN MELALUI LINK DI TAMPILAN
        $data['edit'] = $this->M_admin->getDetailById($id)->result();
        // var_dump($data['edit']);
        // die;
        $this->load->view('tamplates/header', $data);
        $this->load->view('tamplates/sidebar', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('tamplates/footer');
    }

    public function data()
    {
        $id_users = $this->input->post('id_users');
        $username = $this->input->post('username');
        $namalengkap = $this->input->post('namalengkap');
        $akses = $this->input->post('akses');

        $data = array(
            'username' => $username,
            'namalengkap' => $namalengkap,
            'akses' => $akses
        );

        $where = array(
            'id_users' => $id_users
        );

        $query = $this->M_admin->update_data($where, $data, 'users');

        if ($query) {
            $this->session->set_flashdata('pesan', "
            <script>
                swal('Gagal!', 'Anda Gagal Ubah Data', 'error');
            </script>
            ");
            redirect('Admin/edit/' . $this->input->post('id_users'));
        } else {
            $this->session->set_flashdata('pesan', "
            <script>
                swal('Berhasil!', 'Anda Berhasil Ubah Data', 'success');
            </script>
            ");
            redirect('Admin');
        }
    }

    public function changepassword()
    {
        $current_password = $this->input->post('currentpassword');
        $new_password = $this->input->post('newpassword');

        if ($current_password) {
            // USER
            $user = $this->db->get_where('users', ['id_users' => $this->input->post('id_users')])->row_array();

            if (!password_verify($current_password, $user['password'])) {
                $this->session->set_flashdata('pesan', "
                <script>
                    swal('Password Salah!', 'Password tidak sama!', 'error');
                </script>
                ");
                redirect('Admin/edit/' . $this->input->post('id_users'));
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan', "
                    <script>
                        swal('Password Salah!', 'Password tidak boleh sama dengan sebelumnya!', 'error');
                    </script>
                    ");
                    redirect('Admin/edit/' . $this->input->post('id_users'));
                } else {

                    // PASSWORD YANG BENAR
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('id_users',  $this->input->post('id_users'));
                    $this->db->update('users');
                    $this->session->set_flashdata('pesan', "
                    <script>
                        swal('Berhasil!', 'Anda Berhasil Ubah Password', 'success');
                    </script>
                    ");
                    redirect('Admin');
                }
            }
        }
    }
    // END EDIT


    // PENDAFTARAN SISWA
    public function pendaftaran()
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu_view_admin'] = [
            'pengguna'  => '', // isi active jika sesuai dengan menu
            'daftar'    => 'active'
        ];

        // AMBIL DATA YANG SUDAH MENDAFTAR
        $data['daftar'] = $this->db->get('pendaftaran')->result();

        $this->load->view('tamplates/header', $data);
        $this->load->view('tamplates/sidebar', $data);
        $this->load->view('admin/pendaftaran', $data);
        $this->load->view('tamplates/footer');
    }

    // DETAIL SISWA
    public function detaildaftar($id)
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu_view_admin'] = [
            'pengguna'  => '', // isi active jika sesuai dengan menu
            'daftar'    => 'active'
        ];

        // MENGAMBIL DATA BY ID YANG SUDAH DIKIRIMKAN MELALUI LINK DI TAMPILAN
        $data['detail'] = $this->M_siswa->getDetailById($id)->result();

        $this->load->view('tamplates/header', $data);
        $this->load->view('tamplates/sidebar', $data);
        $this->load->view('admin/detail_pendaftar', $data);
        $this->load->view('tamplates/footer');
    }

    // UPDATE STATUS PENDAFTARAN
    public function acc($id)
    {
        $data = array(
            'status' => 'Diterima'
        );

        $this->db->where('id_pendaftaran', $id);
        $this->db->update('pendaftaran', $data);
        $this->session->set_flashdata('pesan', "
            <script>
                swal('Berhasil!', 'Siswa DiTerima!', 'success');
            </script>
        ");
        redirect('Admin/pendaftaran');
    }

    public function cad($id)
    {
        $data = array(
            'status' => 'Cadangan'
        );

        $this->db->where('id_pendaftaran', $id);
        $this->db->update('pendaftaran', $data);
        $this->session->set_flashdata('pesan', "
            <script>
                swal('Berhasil!', 'Siswa Di Cadangkan!', 'success');
            </script>
        ");
        redirect('Admin/pendaftaran');
    }

    public function rej($id)
    {
        $data = array(
            'status' => 'Tidak Diterima'
        );

        $this->db->where('id_pendaftaran', $id);
        $this->db->update('pendaftaran', $data);
        $this->session->set_flashdata('pesan', "
            <script>
                swal('Berhasil!', 'Siswa Di Tolak!', 'success');
            </script>
        ");
        redirect('Admin/pendaftaran');
    }

    // EDIT PENDAFTAR
    public function editPendaftar($id)
    {
        $data['users'] = $this->db->get_where('users', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu_view_admin'] = [
            'pengguna'  => '', // isi active jika sesuai dengan menu
            'daftar'    => 'active'
        ];

        // MENGAMBIL DATA BY ID YANG SUDAH DIKIRIMKAN MELALUI LINK DI TAMPILAN
        $data['edit'] = $this->M_siswa->getDetailById($id)->result();

        $this->load->view('tamplates/header', $data);
        $this->load->view('tamplates/sidebar', $data);
        $this->load->view('admin/edit_pendaftar', $data);
        $this->load->view('tamplates/footer');
    }

    public function editProses()
    {
        $id_pendaftaran = $this->input->post('id_pendaftaran');
        $nama_siswa = $this->input->post('nama_siswa');
        $nama_panggil = $this->input->post('nama_panggil');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jk = $this->input->post('jk');
        $agama_siswa = $this->input->post('agama_siswa');
        $alamat_siswa = $this->input->post('alamat_siswa');
        $nama_orangtua = $this->input->post('nama_orangtua');
        $pekerjaan = $this->input->post('pekerjaan');
        $agama_orangtua = $this->input->post('agama_orangtua');
        $telp = $this->input->post('telp');
        $alamat_orangtua = $this->input->post('alamat_orangtua');

        $data = array(
            'nama_siswa' => $nama_siswa,
            'nama_panggil' => $nama_panggil,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'jk' => $jk,
            'agama_siswa' => $agama_siswa,
            'alamat_siswa' => $alamat_siswa,
            // ORANG TUA
            'nama_orangtua' => $nama_orangtua,
            'pekerjaan' => $pekerjaan,
            'agama_orangtua' => $agama_orangtua,
            'telp' => $telp,
            'alamat_orangtua' => $alamat_orangtua
        );

        $where = array(
            'id_pendaftaran' => $id_pendaftaran
        );

        $query = $this->M_admin->update_data_pendaftar($where, $data, 'pendaftaran');

        if ($query) {
            $this->session->set_flashdata('pesan', "
            <script>
                swal('Gagal!', 'Anda Gagal Ubah Data', 'error');
            </script>
            ");
            redirect('Admin/editPendaftar/' . $this->input->post('id_pendaftaran'));
        } else {
            $this->session->set_flashdata('pesan', "
            <script>
                swal('Berhasil!', 'Anda Berhasil Ubah Data', 'success');
            </script>
            ");
            redirect('Admin/pendaftaran');
        }
    }

    public function delete_pendaftar($id)
    {
        $delete = $this->M_admin->ddaftar($id);

        if ($delete) {
            $this->session->set_flashdata('pesan', "
            <script>
                swal('Berhasil!', 'Anda Berhasil Dihapus Data', 'success');
            </script>
            ");
            redirect('Admin/pendaftaran');
        } else {
            $this->session->set_flashdata('pesan', "
            <script>
                swal('Gagal!', 'Anda Gagal Dihapus Data', 'error');
            </script>
            ");
            redirect('Admin/pendaftaran');
        }
    }

    public function delete_admin($id)
    {
        $delete = $this->M_admin->dadmin($id);

        if ($delete) {
            $this->session->set_flashdata('pesan', "
            <script>
                swal('Berhasil!', 'Anda Berhasil Dihapus Data', 'success');
            </script>
            ");
            redirect('Admin');
        } else {
            $this->session->set_flashdata('pesan', "
            <script>
                swal('Gagal!', 'Anda Gagal Dihapus Data', 'error');
            </script>
            ");
            redirect('Admin');
        }
    }
}
