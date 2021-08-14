c<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class mycalendar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // begin:: load model
        $this->load->model("kalender_model");
        
        // end:: load model
    }
}