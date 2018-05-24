<?php
class Brand_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_user_group(){
        $this->curl->create(base_url().'Online/user_group/');
        $this->curl->get();
        $response  =$this->curl->execute();

        if ($response!==false) {
            //
        }else{
            echo "sini";
        }
        return ($response);

        /*$curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => base_url().'Online/user_group/',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request'
        ));
        $resp = curl_exec($curl);
        curl_close($curl);

        return $resp;*/
    }
}