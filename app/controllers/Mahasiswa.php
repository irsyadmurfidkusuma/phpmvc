<?php

class Mahasiswa extends Controller{
    // fungsi default
    public function index() {
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $data['judul'] = 'Daftar Mahasiswa';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }

    // fungsi detail
    public function detail($id) {
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $data['judul'] = 'Detail Mahasiswa';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('templates/footer');
    }

    // insert data
    public function tambah() {
        // var_dump($_POST);
        $r = $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST);
        if( $r > 0 ) {
            Flasher::setFlash('Berhasil','Ditambahkan','success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal','Ditambahkan','danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    // hapus data
    public function hapus($id) {
        // var_dump($_POST);
        $r = $this->model('Mahasiswa_model')->hapusDataMahasiswa($id);
        if( $r > 0 ) {
            Flasher::setFlash('Berhasil','Dihapus','warning');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal','Dihapus','danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    // ubah data 
    public function getubah() {
        echo json_encode( $this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']) );
    }

    public function ubah() {
        // var_dump($_POST);
        $r = $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST);
        if( $r > 0 ) {
            Flasher::setFlash('Berhasil','Diubah','success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('Gagal','Diubah','danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }

    // searching
    public function cari() {
        $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
        $data['judul'] = 'Daftar Mahasiswa';
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('templates/footer');
    }
}