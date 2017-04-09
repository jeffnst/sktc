<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 04-Mar-17
 * Time: 5:59 PM
 */

class Main extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('MKantin');
    }

    public function home(){
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('halaman_umum/home');
        $this->load->view('templates/footer');
    }

    // fungsi pengguna umum
    public function jadwal(){

        // ambil informasi buka tutup kantin
        $data['status_kantin'] = $this->MKantin->mStatusKantin();

        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('halaman_umum/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function barang(){

        // ambil daftar barang
        $data['daftar_barang'] = $this->MKantin->mDaftarBarang();

        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('halaman_umum/barang', $data);
        $this->load->view('templates/footer');

    }

    public function login(){
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('halaman_umum/login');
        $this->load->view('templates/footer');

    }

    public function logout(){
        if (!isset($_SESSION)){
            session_start();
        }

        setcookie("user", "", time()-3600);
        session_destroy();
        echo "<script>window.location.replace(\"home\");</script>";
    }

    public function cekLogin(){

        if (isset($_POST['user']) and isset($_POST['pass'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];

            $queryResult = $this->MKantin->mCekLogin($user, $pass);

            if ($queryResult){

                $_SESSION['user'] = session_id();
                setcookie("user", $user, time() + 60*60*24, "/");

                echo "<script>window.location.replace(\"homeAdmin\");</script>";
            }
            else{
                $this->login();
            }
        }
        else{
            echo "<script>window.location.replace(\"homeAdmin\");</script>";
        }
    }

    public function homeAdmin(){

        // jika sesi blm dimulai, segera mulai
        if (!isset($_SESSION)){
            session_save_path();
            session_start();
        }

        // jika kukis tidak valid, lgsg lempar ke halaman login
        if (!isset($_COOKIE['user'])
            || !isset($_SESSION['user'])
            || $_SESSION['user'] != session_id()
            || $_SESSION['user'] == NULL ){

            echo "<script>window.location.replace(\"login\");</script>";
        }

        // jika sampai sini, maka asumsi login berhasil. Load keperluan halaman Home Admin
        // pertama, ambil data notifikasi barang2
        $notifikasi= $this->MKantin->mNotifikasi();

        // kedua, panggil halaman homeAdmin dengan memberikan data notifikasi
        $this->load->helper('url');
        $this->load->view('templates/header');
        $this->load->view('halaman_admin/home', $notifikasi);
        $this->load->view('templates/footer');

    }

    // membuka halaman administrasi (Laporan dan tambah barang)
    public function administrasi(){
        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/administrasi');
        $this->load->view('templates/footer');

    }

    public function laporanKeuangan(){

        if(isset($_POST['bulan'])){
            $this->load->helper('url');
            $this->load->view('templates/headerAdmin');
            $this->load->view('halaman_admin/laporanKeuanganBulanan');
            $this->load->view('templates/footer');
        }
        else{
            $this->load->helper(array('form', 'url'));
            //$this->load->library('form_validation');
            $this->load->view('templates/headerAdmin');
            $this->load->view('halaman_admin/laporanKeuangan');
            $this->load->view('templates/footer');
        }
    }

    public function tambahBarang(){
        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/tambahBarang');
        $this->load->view('templates/footer');
    }

    public function addBarang(){
        $nama=$_POST['nama'];
        $beli=$_POST['beli'];
        $jual=$_POST['jual'];
        $this->MKantin->mAddBarang($nama, $beli, $jual);
        echo "<script>window.location.replace(\"tambahBarang\");</script>";
    }

    // melihat stok barang
    public function barangAdmin(){
        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/barangAdmin');
        $this->load->view('templates/footer');
    }

    public function listBarang(){
        $data['listBarang'] = $this->MKantin->mGetBarang();
        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/listBarang', $data);
        $this->load->view('templates/footer');
    }

    public function barangKadaluarsa(){
        $data['listBarangKadaluarsa'] = $this->MKantin->mGetBarangKadaluarsa();

        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/listBarangKadaluarsa', $data);
        $this->load->view('templates/footer');
    }

    public function hapusBarangKadaluarsa(){
        $this->MKantin->mDeleteBarangKadaluarsa();
        echo "<script>window.location.replace(\"barangKadaluarsa\");</script>";

    }

    public function barangTipis(){
        $data['listBarangTipis'] = $this->MKantin->mGetBarangTipis();

        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/listBarangTipis', $data);
        $this->load->view('templates/footer');
    }

    public function barangLaris(){
        $data['listBarangLaris'] = $this->MKantin->mGetBarangLaris();

        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/listBarangLaris', $data);
        $this->load->view('templates/footer');
    }


    public function tambahStokBarang(){
        $data['listBarang'] = $this->MKantin->mGetBarang();
        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/tambahStokBarang', $data);
        $this->load->view('templates/footer');
    }

    public function addStock(){
        $nama=$_POST['barang'];
        $jumlah=$_POST['jumlah'];
        $tanggal=$_POST['tanggal'];

        $this->MKantin->mAddStock($nama, $jumlah, $tanggal);

        echo "<script>window.location.replace(\"tambahStokBarang\");</script>";
    }



    public function jadwalAdmin(){
        $data['statusKantin'] = $this->MKantin->mStatusKantin();

        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/jadwalAdmin', $data);
        $this->load->view('templates/footer');

    }

    public function bukaTutupKantin(){
        $this->MKantin->mBukaTutupKantin();
        echo "<script>window.location.replace(\"jadwalAdmin\");</script>";
    }

    public function transaksi(){

        $this->load->helper('url');
        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/transaksi');
        $this->load->view('templates/footer');
    }

    public function transaksiAddToChart(){

        $barang=$_POST['barang'];
        $jumlah=$_POST['jumlah'];
        $id=$_POST['id'];

        $this->MKantin->mAddToChart($id, $barang, $jumlah);

        echo "<script>window.location.replace(\"transaksi\");</script>";
    }

    public function transaksiBayar(){

        $data['totalBayar'] = $this->MKantin->transaksiBayar();
        $this->load->helper('url');

        $this->load->view('templates/headerAdmin');
        $this->load->view('halaman_admin/transaksiBayar', $data);
        $this->load->view('templates/footer');
    }



}