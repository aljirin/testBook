<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation'));
        $this->load->model('Main_model'); 
    }

    function index()
    {
		redirect('Main/dashboard', 'refresh');
    }
	
    public function getUriPage($dashboard){
        return $this->uri->segment($dashboard);
    }
	
    public function getTitleBar(){
        if($this->getUriPage(2) == 'books' || $this->getUriPage(2) == 'view_addBook') {
            return "Books Management";
        }else{
            return "Welcome";
        }
    }

    public function getDirectory(){
        if($this->getUriPage(2) == 'books' && $this->getUriPage(3) == 'books' && $this->getUriPage(4) != "")  {
            return "Book Detail";
        }elseif($this->getUriPage(2) == 'books'){
            return "List of Books";
        }elseif($this->getUriPage(2) == 'view_addBook'){
            return "Add Book";
        }else{
            return $this->getTitleBar();
        }
    }

    public function dashboard()
    {
		$title = $this->getTitleBar();  
		$data = array(
			'title' => $title,
			'top_title' => 'List of Books | CRUD',
			'page' => $this->getUriPage(2),
			'page_sub' => $this->getUriPage(3),
			'direktori' => $this->getDirectory(),
			'header_title' => 'Books'
		);
		
		//Jirin
		if(($this->getUriPage(2) === 'books' || $this->getUriPage(3) === '' || $this->getUriPage(4) !== "") || $this->getUriPage(2) === 'view_addBook'){
			$data['books']        = $this->get_books(); 
			$data['typebook']     = $this->get_typebook(); 			
		}
		
		//this is for displaying product detail
		if($this->getUriPage(2) === 'books' && $this->getUriPage(3) === 'books' && $this->getUriPage(4) !== ""){
			$param =
			[
			'books_id' => $this->getUriPage(4)
			];
			$data['uripage']        = $this->getUriPage(4); 
			$data['books']          = $this->get_books($param); 
			$data['typebook']       = $this->get_typebook();
		}
		//end of Jirin

		$this->load->view('template_start', $data);
		$this->load->view('phoenix_header', $data);
		$this->load->view('menu_sidebar');
		$this->load->view('title_bar', $data);
		$this->load->view('content_container', $data);
		$this->load->view('template_end');
    }
    
    //Jirin
    public function get_books($param = null){
        $books = $this->Main_model->get_books($param);
        return $books;
    }
	
    public function insertBook(){
		$book_title     	= $this->input->post('book_title');
		$author  			= $this->input->post('author');
		$date_published  	= $this->input->post('date_published');
		$number_of_pages    = $this->input->post('number_of_pages');
		$type_of_book	  	= $this->input->post('type_of_book');
		
		//insert all data to database
		$d = 
        [
        'title'               	=> $book_title,
		'author'             	=> $author,
		'date_published'        => $date_published,
        'number_of_pages'       => $number_of_pages,
        'type_of_book_id'       => $type_of_book
        ];	
			
		$insert = $this->Main_model->insert_book($d);
				
		if($insert === 'Success'){
			echo 'success';	
		}else{
			echo 'fail';
		}
    }
	
	public function editBook(){
		$book_title     	= $this->input->post('book_title');
		$author  			= $this->input->post('author');
		$date_published  	= $this->input->post('date_published');
		$number_of_pages    = $this->input->post('number_of_pages');
		$type_of_book	  	= $this->input->post('type_of_book');
		$books_id       	= $this->input->post('books_id');
					
		//insert all data to database
		$d = 
        [
        'title'               	=> $book_title,
		'author'             	=> $author,
		'date_published'        => $date_published,
        'number_of_pages'       => $number_of_pages,
        'type_of_book_id'       => $type_of_book
        ];
		
		$edit = $this->Main_model->edit_book($d, $books_id);
				
		if($edit === 'Success'){
			echo 'success';	
		}else{
			echo 'fail';
		}
    }

    public function view_addBook(){
        $this->dashboard();
    }

    //type of book
    public function get_typebook(){
        $typebook = $this->Main_model->get_typebook();
        return $typebook;
    }
		
	public function books()
    {
        $this->dashboard();
    }
}
?>
