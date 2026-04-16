<?php
defined('BASEPATH') or exit('No direct script access allowed');

class View_ui_cont extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Manila');
        // $this->db->query("SET time_zone = '+08:00'");

        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->dashboard();
    }

    public function dashboard()
    {
        $this->load->view('layouts/header');
        $this->load->view('dashboard');
        $this->load->view('layouts/footer');
    }
    public function masterfile()
    {
        $this->load->view('layouts/header');
        $this->load->view('masterfile');
        $this->load->view('layouts/footer');
    }

    public function product($id = null)
    {
        $data['product_id'] = $id;

        $this->load->view('layouts/header');
        $this->load->view('products', $data);
        $this->load->view('layouts/footer');
    }

    public function monitoring()
    {
        $this->load->view('layouts/header');
        $this->load->view('monitoring');
        $this->load->view('layouts/footer');
    }

    public function pull_out()
    {
        $this->load->view('layouts/header');
        $this->load->view('pull_out');
        $this->load->view('layouts/footer');
    }

    public function expenses()
    {
        $this->load->view('layouts/header');
        $this->load->view('expenses');
        $this->load->view('layouts/footer');
    }

    public function history()
    {
        $this->load->view('layouts/header');
        $this->load->view('history');
        $this->load->view('layouts/footer');
    }

}
