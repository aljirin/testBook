<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OnlineResource {
    protected $_CI;     

    function __construct()
    {
        $this->_CI =& get_instance();
        $this->_CI->load->library('curl', 'session');
        $this->_CI->load->helper(array('url', 'cookie'));
        $this->_CI->load->model(array('Main_model'));
    }
        
    //logic functions
    //login
    public function login($email, $pswd)
    {
        $session_data = $this->_CI->session->userdata('logged_in');
        if(!$session_data){
            $result = $this->_CI->Main_model->login($email,$pswd);
            return $result;
        }else{
            echo "You have been logging";
            //redirect('auth/auth', 'refresh');
        }
    }

    //company and user
    public function regComp($data_array)
    {   
        $data = 
        [             
        'company_name'           => $data_array['comp_name'],
        'company_email'          => $data_array['comp_email'],
        'company_dppm'           => $data_array['comp_dppm'],
        'company_npwp'           => $data_array['comp_npwp'],
        'company_address'        => $data_array['comp_address'],
        //'city_id'                => $data_array['comp_city'];
        //'province_id'            => $data_array['comp_province'],
        'company_phone'          => $data_array['comp_phone'],
        'company_fax'            => $data_array['comp_fax'],
        'company_date'           => $data_array['comp_date'],
        'company_status'         => $data_array['comp_status']
        ];
        
        $result = $this->_CI->Main_model->regComp($data);
        return $result;
    }

    public function regUser($data_array)
    {   
        $data = 
        [             
        'user_group_id'           => $data_array['register_as'],
        'company_id'              => $data_array['comp_id'],
        'user_name'               => $data_array['pic_name'],
        'user_email'              => $data_array['pic_email'],
        'user_password'           => $data_array['pic_pswd'],
        'user_phone'              => $data_array['pic_phone'],
        'user_date'               => $data_array['user_date'],
        'user_status'             => $data_array['status']
        ];
        
        $result = $this->_CI->Main_model->regUser($data);
        return $result;
    }

    public function verifyUser($data_array)
    {   
        $data = 
        [       
        'user_status'           => '0'
        ];
        
        $result = $this->_CI->Main_model->verify_user($data_array['id'],$data);
        return $result;
    }

    public function verifyCompany($data_array)
    {   
        $data = 
        [       
        'company_status'           => '0'
        ];
        
        $result = $this->_CI->Main_model->verify_company($data_array['id'],$data);
        return $result;
    }

    public function blockUser($data_array)
    {   
        $data = 
        [       
        'user_status'           => '2'
        ];
        
        $result = $this->_CI->Main_model->block_user($data_array['id'],$data);
        return $result;
    }

    public function blockCompany($data_array)
    {   
        $data = 
        [       
        'company_status'           => '2'
        ];
        
        $result = $this->_CI->Main_model->block_company($data_array['id'],$data);
        return $result;
    }
    
    //project
    public function regProject($data_array)
    {   
        $data = 
        [             
        'project_name'                  => $data_array['nama_proyek'],
        'project_value'                 => $data_array['project_value'],
        'project_start'                 => $data_array['project_start'],
        'project_end'                   => $data_array['project_end'],
        'project_date'                  => $data_array['project_date'],
        'project_currency'              => $data_array['project_currency'],
        'project_status'                => $data_array['project_status']
        ];
        
        $result = $this->_CI->Main_model->regProject($data);
        return $result;
    }

    public function regTender($data_array)
    {   
        $data = 
        [             
        'project_id'                  => $data_array['project_id'],
        'tender_type'                 => $data_array['jenis_tender'],
        //'company_id'                  => $data_array['comp_id'],
        'tender_qualification_no'     => $data_array['nomor_kualifikasi'],
        'tender_invitation_no'        => $data_array['nomor_undangan'],
        'tender_created'              => $data_array['tender_date'],
        'tender_deadline'             => $data_array['tender_deadline'],
        'tender_process'              => $data_array['tender_process'],
        'tender_status'               => $data_array['tender_status']
        ];
        
        $result = $this->_CI->Main_model->regTender($data);
        return $result;
    }

    public function regTenderCompany($data_array)
    {   
        $result = $this->_CI->Main_model->regTenderCompany($data_array); 
        return $result;
    }

    public function vendor()
    {           
        $result = $this->_CI->Main_model->get_vendor();
        return $result;
    }
    
    public function vendorDetail($id)
    {           
        $result = $this->_CI->Main_model->vendor_detail($id);
        return $result;
    }

    public function tender()
    {           
        $result = $this->_CI->Main_model->get_tender();
        return $result;
    }

    public function tenderDetail($id)
    {           
        $result = $this->_CI->Main_model->tender_detail($id);
        return $result;
    }

    public function test(){
        return "masuk sini";
    }    
}
/* Location: ./application/libraries/OnlineResource.php */
