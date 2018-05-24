<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UriResource
{	
    protected $_CI;    

    public function __construct()
    {
        $this->_CI =& get_instance();
        $this->_CI->load->library('curl', 'session');
        $this->_CI->load->helper(array('url', 'cookie'));
        $this->_CI->load->model(array('Main_model'));
    }

    public function index()
    {
        //
    }

    public function getUriPage($index)
    {
        return $this->_CI->uri->segment($index);
    }

    public function getDirectory()
    {
        if ($this->getUriPage(2) == '') {
            return "Bouwheer &#8226; Dashboard";
        } else if ($this->getUriPage(2) == 'NewTenderForm') {
            return "Bouwheer &#8226; Tambah Tender";
        } else if ($this->getUriPage(2) == 'VendorList') {
            return "Bouwheer &#8226; Daftar Vendor";
        } else if ($this->getUriPage(2) == 'VendorDetail') {
            return "Bouwheer &#8226; Vendor Detail";
        } else if ($this->getUriPage(2) == 'bouwheer_new_tender') {
            return "Bouwheer &#8226; Tambah Tender";
        } else if ($this->getUriPage(2) == 'VendorDashboard') {
            return "Vendor &#8226; Dashboard";
        } else if ($this->getUriPage(2) == 'JaminanPenawaran') {
            return "Vendor &#8226; Tambah Jaminan Penawaran";
        } else if ($this->getUriPage(2) == 'InsuranceDashboard') {
            return "Insurance &#8226; Dashboard";
        } else if ($this->getUriPage(2) == 'BankDashboard') {
            return "Bank &#8226; Dashboard";
        } else if ($this->getUriPage(2) == 'TenderDetail') {
            return "Bouwheer &#8226; Tender Detail";
        } else {
            return "Dashboard &#8226; Profil";
        }
    }	
}
