<?php
(defined('BASEPATH')OR exit("No direct script access allowed"));

class LaporanMan extends CI_Controller {

    function index()
    {
		$this->load->view('manager/laporan');
    }
}
?>