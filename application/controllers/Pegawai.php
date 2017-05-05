<?php
(defined('BASEPATH') or exit('No direct script access allowed'));

class Pegawai extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

        public function __construct()
        {
            parent::__construct();
            if (!$this->session->userdata('username') && $this->session->userdata('status') == 0) {
                redirect(base_url());
            }
            $this->load->model('m_pegawai');
            $this->load->model('m_pasien');
            $this->load->model('m_rekam');
        }

        //menampilkan halaman home
        public function index()
        {
            $this->load->helper('url');
            $this->load->view('pegawai/home.php');
        }

        //menampilkan halaman data pasien
        public function viewDataPasien()
        {
            $dataPasien['listPasien'] = $this->m_pasien->tampil_pasien(); //ambil data pasien yang di simpan didalam listPasien
            $this->load->helper('url');
            $this->load->view('pegawai/data-pasien.php', $dataPasien);
        }

        //menampilkan halaman tambah pasien
        public function viewTambahPasien()
        {
            $idLokasi = $this->session->userdata("lokasi_id");
            $randomNumb = rand(10, 100);
            $timeNow = substr(time(), 7);
            $generateID['genKdPasien'] = $idLokasi . $randomNumb . $timeNow;
            $this->load->view('pegawai/tambah-pasien.php', $generateID);
        }

        //action tambah pasien
        public function actionTambahPasien()
        {
            $this->load->library('upload');
            $tipePas = $this->input->post('tipe');
            $kdPasien = $this->input->post('kdPasien');
            $namaPasien = $this->input->post('namaPasien');
            $tglLahir = $this->input->post('tglLahir');
            $alamat = $this->input->post('alamat');
            $noHP = $this->input->post('noHP');
            $namaFile = $namaPasien+$noHP;
            $config['upload_path'] = './asset/foto_pasien/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; //maksimum besar file 2M
                $config['max_width']  = '1288'; //lebar maksimum 1288 px
                $config['max_height']  = '1288'; //tinggi maksimu 1288 px
                $config['file_name'] = $namaFile; //nama yang terupload nantinya

                $this->upload->initialize($config);

            if ($this->upload->do_upload('fotoPasien')) {
                $gbr = $this->upload->data();
                $data = array(
                        'kode_pasien' => $kdPasien,
                        'id_jenis_pasien' => $tipePas,
                        'nama_pasien' => $namaPasien,
                        'tanggal_lahir' => $tglLahir,
                        'no_hp' => $noHP,
                        'alamat' => $alamat,
                        'foto' => $gbr['file_name']
                    );
                $this->m_pasien->tambah_pasien($data, 'tb_pasien');
                redirect(base_url('index.php/Pegawai/viewAfterInsert'), 'refresh');
            } else {
                $error = array('error' => $this->upload->display_errors());
                echo $error['error'];
            }
        }

        //redirect ke rekam medik setelah tambah pasien
        public function viewAfterInsert()
        {
            $idMax = $this->m_pasien->max_id();
            $rekamMedik = $this->m_rekam->tampil_id_pasien($idMax);
            $medik = $this->m_rekam->tampil_rekam($idMax);
            $this->load->view('pegawai/rekam-medik.php', array(
                     'rekamMedik' => $rekamMedik,
                     'medik' => $medik
                 ));
        }

        //mendaptakan detail pegawai
        public function tampilPegawai($id)
        {
            $dataPegawai = $this->m_pegawai->tampil_data($id);
            $this->load->view('pegawai/pembayaran.php', array(
                 'dataPegawai' => $dataPegawai
             ));
        }

        //mendapatkan data satu data rekam medik pasien
        public function getDataPasien($id)
        {
            $rekamMedik = $this->m_rekam->tampil_id_pasien($id);
        }

        //menampilkan halaman rekam medik pasien tertentu
        public function viewRekamMedik($id)
        {
            $rekamMedik = $this->m_rekam->tampil_id_pasien($id);
            $medik = $this->m_rekam->tampil_rekam($id);
            $this->load->view('pegawai/rekam-medik.php', array(
                 'rekamMedik' => $rekamMedik,
                 'medik' => $medik
             ));
        }

        //menampilkan halaman update pasien
        public function viewUpdatePasien($id)
        {
            $dataPasien = $this->m_pasien->getPasien($id);
            $this->load->view('pegawai/update-pasien.php', array(
         'dataPasien' => $dataPasien
       ));
        }

        //menampilkan halaman profile pegawai
        public function viewProfilePegawai($username)
        {
            $profilePegawai = $this->m_pegawai->tampil_profile_pegawai($username);
            $lokasiAll = $this->m_pegawai->allLokasi();
            $this->load->view('pegawai/profile.php', array(
         'profilePegawai' => $profilePegawai,
                 'lokasiAll' => $lokasiAll,

       ));
        }

        //action update pasien
        public function actionUpdatePasien()
        {
            $this->load->library('upload');
            $namaPasien = $this->input->post('namaPasien');
            $noHP = $this->input->post('noHP');
            $namaFile = $namaPasien.$noHP;
            $config['upload_path'] = './asset/foto_pasien/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; //maksimum besar file 2M
                $config['max_width']  = '1288'; //lebar maksimum 1288 px
                $config['max_height']  = '1288'; //tinggi maksimu 1288 px
                $config['file_name'] = $namaFile; //nama yang terupload nantinya

                $this->upload->initialize($config);

            if ($this->upload->do_upload('fotoPasien')) {
                $gbr = $this->upload->data();
                $data = array(
                                        'kode_pasien' => $this->input->post('idPasien'),
                                        'id_jenis_pasien'  => $this->input->post('tipe'),
                                        'nama_pasien' =>$this->input->post('namaPasien'),
                                        'tanggal_lahir' => $this->input->post('tglLahir'),
                                        'no_hp' => $this->input->post('noHP'),
                                        'alamat' => $this->input->post('alamat'),
                                        'foto' => $gbr['file_name']
                                );
                $condition['kode_pasien'] = $this->input->post('idPasien');
                $this->m_pasien->updatePasien($data, $condition);
            } else {
                $data = array(
                            'kode_pasien' => $this->input->post('idPasien'),
                            'id_jenis_pasien'  => $this->input->post('tipe'),
                            'nama_pasien' =>$this->input->post('namaPasien'),
                            'tanggal_lahir' => $this->input->post('tglLahir'),
                            'no_hp' => $this->input->post('noHP'),
                            'alamat' =>  $this->input->post('alamat')
                            );
                $condition['kode_pasien'] = $this->input->post('idPasien');
                $this->m_pasien->updatePasien($data, $condition);
            }

            $message = "Data pasien pasien " . $namaPasien." berhasil diupdate";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect(base_url('index.php/Pegawai/viewDataPasien'));
        }

        //menampilkan halaman tambah keluhan pasien
        public function viewRekamMedikById()
        {
            $searchKodePasien = $this->input->post('kd_pasien');
            if ($searchKodePasien == '') {
                $idPasien = $this->session->userdata("idPasienTambahRekam");
                $rekamMedik = $this->m_rekam->tampil_id_pasien($idPasien);
                $medik = $this->m_rekam->tampil_rekam($idPasien);
                $this->load->view('pegawai/rekam-medik.php', array(
                    'rekamMedik' => $rekamMedik,
                    'medik' => $medik
                ));
            } else {
                $idPasien = $this->m_rekam->cari_id($searchKodePasien);
                if ($idPasien == '') {
                    echo "<script type='text/javascript'>alert('Tidak ada pasien yang dicari');</script>";
                    redirect(base_url('index.php/pegawai'), 'refresh');
                } else {
                    $rekamMedik = $this->m_rekam->tampil_id_pasien($idPasien);
                    $medik = $this->m_rekam->tampil_rekam($idPasien);
                    $this->load->view('pegawai/rekam-medik.php', array(
                        'rekamMedik' => $rekamMedik,
                        'medik' => $medik
                    ));
                }
            }
        }

        //menampilkan halaman tambah keluhan
        public function viewTambahKeluhan()
        {
            $id = $this->session->userdata("idPasienTambahRekam");
            $idPegawai = $this->session->userdata("id");
            $data['dataPegawai'] = $this->m_pegawai->get_nama_pegawai($idPegawai);
            $data['hasil'] = $this->m_rekam->get_nama_pasien($id);
            $this->load->view('pegawai/tambah-keluhan-tindakan.php', $data);
        }

        //action tambah keluhan
        public function actionTambahKeluhan()
        {
            $keluhan = $this->input->post('keluhan');
            $idPasien = $this->session->userdata("idPasienTambahRekam");
            $tanggal = date("Y-m-d");
            $idPegawai = $this->session->userdata("id");
            $data = array(
            'id_pasien'  => $idPasien,
            'tanggal' => $tanggal,
            'diagnosa' => $keluhan,
            'id_pegawai' => $idPegawai
        );
            $this->m_rekam->tambah_rekam($data, 'tb_rekam_medik');

            $idRekam = $this->m_rekam->get_id();
            $tindakan = $this->input->post('radios');
            $banyak_tindakan = count($tindakan);
            for ($x=0; $x<$banyak_tindakan;$x++) {
                $namaTindakan = $tindakan[$x];
                $idTindakan = $this->m_rekam->get_idTindakan($namaTindakan);
                $dataTindakan = array(
                'id_rekam_medik' => $idRekam,
                'id_tindakan' => $idTindakan
            );
                $this->m_rekam->tambah_rekam($dataTindakan, 'tb_rekam_medik_tindakan');
            }
            redirect(base_url('index.php/Pegawai/viewRekamMedikById'));
        }

        //action mencari rekam medik pasien
        public function searchRekamMedikPasien()
        {
            $searchKodePasien = $this->input->post('kd_pasien');
            $rekamMedik = $this->m_rekam->tampil_id_pasien($searchKodePasien);
            $medik = $this->m_rekam->tampil_rekam($searchKodePasien);
            $this->load->view('pegawai/rekam-medik.php', array(
                'rekamMedik' => $rekamMedik,
                'medik' => $medik
            ));
        }

    //menampilkan halaman pembayaran
    // function viewPembayaran(){
    // 	$id = $this->session->userdata("id");
    // 	$dataPegawai = $this->m_pegawai->data_pegawai($id);
    // 	$this->load->view('pegawai/pembayaran.php', array(
    // 		 'dataPegawai' => $dataPegawai
    // 	));
    // }

    //menampilkan data pasien
    public function viewPembayaran()
    {
        $id = $this->session->userdata("id");
        $dataPegawai = $this->m_pegawai->data_pegawai($id);
        $kdPasien = $this->input->post('kd_pasien');
        $dataPasien = $this->m_pasien->pembayaran_pasien($kdPasien);
        $idLokasi = $this->session->userdata("lokasi_id");
        $dataTarif = $this->m_pasien->getTarifAwal($idLokasi);
        if ($dataPasien->num_rows() > 0) {
            $this->load->view('pegawai/pembayaran.php', array(
             'dataPasien' => $dataPasien,
                    'dataPegawai' => $dataPegawai,
                    'dataTarif' => $dataTarif
               ));
        } else {
            $message = "Maaf, tidak ada data pasien dengan kode pasien " . $kdPasien;
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect('index.php/pegawai', 'refresh');
        }
    }

    //menampilkan tarif
    public function getTarif()
    {
        $idLokasi = $this->session->userdata("lokasi_id");
        $idJenisPembayaran = $this->input->post('jenis_pembayaran');
        $dataTarif = $this->m_pasien->getTarifBasedLocation($idLokasi, $idJenisPembayaran);
        //print form_input('total_bayar',$dataTarif);
        print $dataTarif;
    }

    //action tambah pembayaran
    public function actionTambahPembayaran()
    {
        $tanggal = date("Y-m-d");
        $jenisPembayaran = $this->input->post('jenis_pembayaran');
        $tujuan = $this->input->post('ket_pembayaran');
        $total = $this->input->post('total_bayar');
        $metodePembayaran = $this->input->post('metode_pembayaran');
        $idPegawai = $this->session->userdata("id");
        $kdPasien = $this->input->post('kd_pasien');
        $idPasien = $this->m_pasien->getIdPasien($kdPasien);
        $idRekam = $this->m_pasien->getRekamPasien($idPasien);
        $jmlFreePass = $this->m_pasien->getFreePassPasien($kdPasien);
        if ($jenisPembayaran == 1) {
            $jmlFreePass = $jmlFreePass + 0;
        } elseif ($jenisPembayaran == 2) {
            $jmlFreePass = $jmlFreePass + 5;
        } elseif ($jenisPembayaran == 3) {
            $jmlFreePass = $jmlFreePass + 10;
        } elseif ($jenisPembayaran == 4) {
            $jmlFreePass = $jmlFreePass - 1;
        }
        $data = array(
            'tanggal'  => $tanggal,
            'id_jenis_pembayaran' => $jenisPembayaran,
            'tujuan' => $tujuan,
            'total' => $total,
            'id_metode_pembayaran' => $metodePembayaran,
            'id_pegawai' => $idPegawai,
            'id_rekam_medik' => $idRekam
        );
        $this->m_pasien->tambahPembayaranPasien($data, 'tb_pembayaran');
        $updateData = array(
            'free_pass' => $jmlFreePass
        );
        $this->m_pasien->updateFreePassPasien($updateData, $kdPasien);
        $message = "Pembayaran Sukses";
        echo "<script type='text/javascript'>alert('$message');</script>";
        redirect(base_url('index.php/pegawai'));
    }

    //menampilkan halaman laporan
    public function viewLaporan()
    {
        $this->load->helper('url');
        $idPegawai = $this->session->userdata("id");
        $dataLaporanKeuangan = $this->m_pegawai->showLaporanKeuangan($idPegawai);
        $dataLaporanPasien = $this->m_pegawai->showLaporanPasien($idPegawai);
        $this->load->view('pegawai/laporan.php', array(
            'dataLaporanKeuangan' => $dataLaporanKeuangan,
            'dataLaporanPasien' => $dataLaporanPasien
        ));
        //$this->load->view('pegawai/laporan.php');
    }

    //action update profile Pegawai
    public function actionUpdateProfile()
    {
        $this->load->library('upload');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $confPassword = $this->input->post('confirm_password');
        $nik = $this->input->post('nik');
        $namaPegawai = $this->input->post('namaPegawai');
        $noHpPegawai = $this->input->post('noHP');
        $alamat = $this->input->post('alamat');
        $idLokasiPeg = $this->input->post('idLokasi');
        $namaFile = $namaPegawai.$noHpPegawai;
        $config['upload_path'] = './asset/foto_pegawai/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '1288'; //lebar maksimum 1288 px
        $config['max_height']  = '1288'; //tinggi maksimu 1288 px
        $config['file_name'] = $namaFile; //nama yang terupload nantinya

        if ($password == $confPassword) {
            $dataAkun = array(
                'username' => $username,
                'password' => $password
            );
            $condition['id'] = $this->session->userdata('id');
            $this->m_pegawai->updateAkunPegawai($dataAkun, $condition);

            $this->upload->initialize($config);

            if ($this->upload->do_upload('fotoPegawai')) {
                $gbr = $this->upload->data();
                $data = array(
                    'nik' => $nik,
                    'nama' => $namaPegawai,
                    'no_hp' => $noHpPegawai,
                    'alamat' => $alamat,
                    'id_lokasi' => $idLokasiPeg,
                    'foto' => $gbr['file_name']
                );
                $this->m_pegawai->update_pegawai($data, $condition);
                redirect(base_url('index.php/pegawai'), 'refresh');
            } else {
                $data = array(
                    'nik' => $nik,
                    'nama' => $namaPegawai,
                    'no_hp' => $noHpPegawai,
                    'alamat' => $alamat,
                    'id_lokasi' => $idLokasiPeg
                );
                $this->m_pegawai->update_pegawai($data, $condition);
                redirect(base_url('index.php/pegawai'), 'refresh');
            }
        } else {
            $message = "Password tidak sesuai. Check Again!!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            $user = $this->session->userdata('username');
            redirect(base_url('index.php/pegawai/viewProfilePegawai/'.$user), 'refresh');
        }
    }
}
