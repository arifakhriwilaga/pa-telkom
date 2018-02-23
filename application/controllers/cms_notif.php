<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms_notif extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }

	public function index()	{
		$page_title = "Kelola Notifikasi";
		$data = array(
			'page_title' => $page_title
		);

		$this->load->render('CMS_PA/kelola_notifikasi');
	}
}
