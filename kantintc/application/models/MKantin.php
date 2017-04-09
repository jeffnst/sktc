<?php
/**
 * Created by PhpStorm.
 * User: rahmat
 * Date: 04-Mar-17
 * Time: 6:02 PM
 */

class MKantin extends CI_Model{
    function __construct(){
        $this->load->library('session', 'upload', 'form_validation');
    }

    // fungsi model untuk mendapatkan status bukatutup kantin
    function mStatusKantin(){
        return $this->db->query("select * from buka_tutup");
    }

    // fungsi model untuk mengganti status kantin
    function mBukaTutupKantin(){
        return $this->db->query("call sp_buka_tutup");

        /*
         * Isi sp_buka_tutup
         *
         * 	SET @Status = (SELECT kondisi FROM buka_tutup);
            IF(@Status = "1")
            THEN UPDATE buka_tutup SET kondisi = "0";
            ELSE
            UPDATE buka_tutup SET kondisi = "1";
            END IF;
         */
    }

    // fungsi model untuk mendapatkan stok barang
    function mDaftarBarang(){
        return $this->db->query("call sp_daftar_barang()");

        /*
         * Isi sp_daftar_barang
         *
            SELECT barang.`idbarang`, nama_barang AS Barang, harga_beli AS Beli, harga_jual AS Harga, SUM(stok) AS Jumlah
            FROM barang,stock
            WHERE barang.`idbarang`=stock.`idbarang`
            GROUP BY barang.`idbarang`
            UNION
            SELECT barang.idbarang, nama_barang, harga_beli, harga_jual, 0
            FROM barang WHERE NOT EXISTS(SELECT stock.`idbarang`FROM stock WHERE barang.`idbarang`=stock.`idbarang`);
         */
    }

    // fungsi model untuk melakukan transaksi; Mengambil id_transaksi terbaru dan daftar barang yang dibeli
    function mTransaksi(){
        $sql1 = $this->db->query("call sp_id_transaksi()");
        $sql2 = $this->db->query("call sp_daftar_barang");

        $result1 = $sql1->result();
        $result2 = $sql2->result();

        return array_merge($result1, $result2);

        /*
         * Isi sp_id_transaksi
         *
         *  SET @Max = (SELECT MAX(idtransaksi) FROM transaksi);

            IF(@Max)
            THEN
                SET @Maxbar = (SELECT MAX(idbarang) FROM transaksi_detail WHERE idtransaksi = @Max);

                IF(@Maxbar)
                THEN SELECT MAX(idtransaksi) AS id, 1 AS val FROM transaksi;
                ELSE
                SELECT MAX(idtransaksi) AS id, 0 AS val FROM transaksi;
                END IF;

            ELSE
                CALL sp_insert_id_transaksi();
                SET @Maxbar = (SELECT MAX(idbarang) FROM transaksi_detail WHERE idtransaksi = @Max);

                IF(@Maxbar)
                THEN SELECT MAX(idtransaksi) AS id, 1 AS val FROM transaksi;
                ELSE
                SELECT MAX(idtransaksi) AS id, 0 AS val FROM transaksi;
                END IF;

            END IF;
         */
    }

    // fungsi model untuk cek apakah login benar
    function mCekLogin($user, $pass){

        $this->db->select('username, password');
        $this->db->from('user');
        $this->db->where('username = ' . "'" . $user . "'");
        $this->db->where('password = ' . "'" . $pass . "'");
        $this->db->limit(1);

        $queryResult = $this->db->get();

        if ($queryResult->num_rows() == 1){
            return true;
        }
        else{
            return false;
        }
    }

    // fungsi model untuk cari notifikasi
    function mNotifikasi(){
        $data['notifikasi'] = $this->db->query("call sp_notifikasi()");
        return $data;

        /*
         * Isi sp_notifikasi
         *
         * 1. mencari barang kadaluarsa
            SELECT IF(COUNT(nama_barang) IS NOT NULL,COUNT(nama_barang), 0) AS Jumlah
            FROM barang,stock
            WHERE barang.`idbarang`=stock.`idbarang` AND tanggal_kadaluarsa<=NOW();
         *
         * 2. mencari barang yang stok nya tipis
            SELECT COUNT(tab.total) FROM (SELECT SUM(stok) AS total FROM stock GROUP BY idbarang) AS tab WHERE tab.total<10;
         */
    }

    function mAddBarang($nama, $beli, $jual){
        return $this->db->query("call sp_tambah_barang('$nama', $beli, $jual)");
    }

    function mGetBarang(){
        return $this->db->query("call sp_daftar_barang()");
    }

    function mGetBarangKadaluarsa(){
        return $this->db->query("call sp_barang_kadaluarsa()");
    }

    function mDeleteBarangKadaluarsa(){
        return $this->db->query("call sp_hapus_kadaluarsa()");
    }

    function mGetBarangTipis(){
        return $this->db->query("call sp_stok_tipis()");
    }

    function mGetBarangLaris(){
        return $this->db->query("call sp_beli_terbanyak()");
    }

    function mAddStock($nama, $jumlah, $tanggal){
        return $this->db->query("call sp_restock_barang('$nama', $jumlah, '$tanggal')");
    }

    function mShowTransaksi(){

        $query1 = $this->db->query("call sp_daftar_barang()");
        $result1 = $query1->result();
        $query1->next_result();
        $query1->free_result();

        $query2 = $this->db->query("call sp_id_transaksi()");
        $result2 = $query2->result();

        return array_merge($result1, $result2);
    }

    function mAddToChart($id, $barang, $jumlah){
        $this->db->query("call sp_beli_barang($id, $barang, $jumlah)");
        return;
    }

    function transaksiBayar(){
        return $this->db->query("call sp_harga_total()");
    }

}