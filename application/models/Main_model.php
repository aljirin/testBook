<?php
class Main_model extends CI_Model{
    function __construct()
    {
        parent:: __construct();
    }

    //books
    public function get_books($param = null)
    {      
		//print_r($param);
        $this->db->select('a.books_id,'
            .             'a.title,'
            .             'a.author,'
			.             'a.date_published,'
			.             'a.number_of_pages,'
            .             'b.type_of_book_id,'
			.             'b.type_of_book');
        $this->db->from('listbooks as a');
        $this->db->join('type_of_book as b', 'a.type_of_book_id = b.type_of_book_id');
		
		if(!empty($param['books_id'])){
			$this->db->where('a.books_id', $param['books_id']);
		}
		
        $query = $this->db->get();
        //echo $this->db->last_query();
		
        if($query->num_rows() > 0) { 
            $res = $query->result_array();
            return $res;
        }else{
            return false;
        }
    }

    public function insert_book($data)
    {      
        $this->db->insert('listbooks', $data);
        $t_product_id= $this->db->insert_id();
        $n_row_affected = $this->db->affected_rows();
        //echo $this->db->last_query();
		
        if($n_row_affected > 0){			
            return "Success";
        }else{
            return "Fail";
        }
    }	
	
	public function edit_book($data, $books_id)
    {      
		$this->db->where('books_id',$books_id);
		$this->db->update('listbooks',$data);
        $n_row_affected = $this->db->affected_rows();
        //echo $this->db->last_query();
		
        if($n_row_affected > 0){
            return "Success";
        }else{
            return "Fail";
        }
    }	

    public function get_typebook()
    {      
        $this->db->select('*');
        $this->db->from('type_of_book');

        $query = $this->db->get();
        //echo $this->db->last_query();

        if($query->num_rows() > 0) { 
            $res = $query->result_array();
            return $res;
        }else{
            return false;
        }
    }

}
    