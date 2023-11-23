<?php
defined('BASEPATH') or exit('No direct script access allowed');

class prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('prodi_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Prodi";
        $data['prodi'] = $this->prodi_model->get();
        $this->load->view("layout/header", $data);
        $this->load->view("prodi/vw_prodi", $data);
        $this->load->view("layout/footer", $data);
    }
    public function tambah()
    {
        $data['judul'] = "Halaman Tambah Prodi";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->post('email')])->row_array();
        $data['prodi'] = $this->prodi_model->get();
        $this->form_validation->set_rules('nama', 'Nama Prodi', 'required', [
            'required' => 'Nama Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('ruangan', 'Ruangan Prodi', 'required', [
            'required' => 'Ruangan Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan Prodi', 'required', [
            'required' => 'Jurusan Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('akreditasi', 'Akreditasi Prodi', 'required', [
            'required' => 'Akreditasi Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_kaprodi', 'Nama Kaprodi Prodi', 'required', [
            'required' => 'Nama Kaprodi Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('tahun_berdiri', 'Tahun Berdiri Prodi', 'required', [
            'required' => 'Tahun Berdiri Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('output_kelulusan', 'Output Kelulusan Prodi', 'required', [
            'required' => 'Output Kelulusan Prodi Wajib di isi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view("layout/header", $data);
            $this->load->view("prodi/vw_tambah_prodi", $data);
            $this->load->view("layout/footer", $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'ruangan' => $this->input->post('ruangan'),
                'jurusan' => $this->input->post('jurusan'),
                'akreditasi' => $this->input->post('akreditasi'),
                'nama_kaprodi' => $this->input->post('nama_kaprodi'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'output_kelulusan' => $this->input->post('output_kelulusan'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/prodi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->Prodi_model->insert($data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Mahasiswa Berhasil Ditambah!</div>');
            redirect('Prodi');
        }
    }
    function upload()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'ruangan' => $this->input->post('ruangan'),
            'jurusan' => $this->input->post('jurusan'),
            'akreditasi' => $this->input->post('akreditasi'),
            'nama_kaprodi' => $this->input->post('nama_kaprodi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'output_lulusan' => $this->input->post('output_lulusan'),

        ];
        $this->prodi_model->insert($data);
        redirect('prodi');
    }
    public function edit($id)
    {
        $data['judul'] = "Halaman Edit Prodi";
        $data['prodi'] = $this->Prodi_model->getById($id);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['prodi'] = $this->Prodi_model->get();

        $this->form_validation->set_rules('nama', 'Nama Prodi', 'required', [
            'required' => 'Nama Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('ruangan', 'Ruangan Prodi', 'required', [
            'required' => 'Ruangan Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan Prodi', 'required', [
            'required' => 'Jurusan Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('akreditasi', 'Akreditasi Prodi', 'required', [
            'required' => 'Akreditasi Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('nama_kaprodi', 'Nama Kaprodi Prodi', 'required', [
            'required' => 'Nama Kaprodi Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('tahun_berdiri', 'Tahun Berdiri Prodi', 'required', [
            'required' => 'Tahun Berdiri Prodi Wajib di isi'
        ]);
        $this->form_validation->set_rules('output_kelulusan', 'Output Kelulusan Prodi', 'required', [
            'required' => 'Output Kelulusan Prodi Wajib di isi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("layout/header", $data);
            $this->load->view("prodi/vw_ubah_prodi", $data);
            $this->load->view("layout/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'ruangan' => $this->input->post('ruangan'),
                'jurusan' => $this->input->post('jurusan'),
                'akreditasi' => $this->input->post('akreditasi'),
                'nama_kaprodi' => $this->input->post('nama_kaprodi'),
                'tahun_berdiri' => $this->input->post('tahun_berdiri'),
                'output_lulusan' => $this->input->post('output_lulusan'),
            ];
            $upload_image = $_FILES['gambar']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = 2048; //kb
                $config['upload_path'] = './assets/img/foto_prodi/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['prodi']['gambar'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/prodi/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id = $this->input->post('id');
            $this->Prodi_model->update(['id' => $id], $data, $upload_image);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Dosen Berhasil Diubah!</div>');
            redirect('Prodi');
        }
    }
    function update()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'ruangan' => $this->input->post('ruangan'),
            'jurusan' => $this->input->post('jurusan'),
            'akreditasi' => $this->input->post('akreditasi'),
            'nama_kaprodi' => $this->input->post('nama_kaprodi'),
            'tahun_berdiri' => $this->input->post('tahun_berdiri'),
            'output_lulusan' => $this->input->post('output_lulusan'),

        ];
        $id = $this->input->post('id');
        $this->prodi_model->update(['id' => $id], $data);
        redirect('prodi');
    }
    public function hapus($id)
    {
        $this->prodi_model->delete($id);
        $error = $this->db->error();
        if ($error['code'] != 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><i class"icon fas fa-info-circle"></i>Data Prodi tidak dapat dihapus (sudah berelasi)!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert=success" role="alert"><i class="icon fas fa-check-circle"></i>Data Prodi BErhasil Dihapus!</div>');
        }
        redirect('prodi');
    }
}