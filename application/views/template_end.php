


<script>
//save all data to database
$('#pages-form-create').submit(function(e){
	e.preventDefault(); 	
	datas = new FormData(this);	
	
	title 				= datas.get('book_title');
	author 				= datas.get('author');
	date_published 		= datas.get('date_published');
	number_of_pages 	= datas.get('number_of_pages');
	type_of_book 		= datas.get('type_of_book');
	
	if(title !== ''){
		var base_url = '<?php echo base_url() ?>';
		$.ajax({
			url:base_url+'Main/insertBook',
			type:"post",
			//data:datas,
			data:{book_title: title, author: author, date_published: date_published, number_of_pages: number_of_pages, type_of_book: type_of_book},
			success: function(c){
				if(c === 'success'){
					alert("Data successfully saved.");
					window.location.reload();
				}else{
					alert("No data input");
				}
			}
		});
	}else{
		alert("Please, fill the variables needed");
	}
});

function popit(url){
	window.location.href = "<?php echo base_url(); ?>index.php/main/books/books/"+url;
}

//save all data edit to database
$('#pages-form-edit').submit(function(e){
	e.preventDefault(); 
	
	datasEdit = new FormData(this);	
	
	title 				= datasEdit.get('book_title');
	author 				= datasEdit.get('author');
	date_published 		= datasEdit.get('date_published');
	number_of_pages 	= datasEdit.get('number_of_pages');
	type_of_book 		= datasEdit.get('type_of_book');
	books_id	 		= datasEdit.get('books_id');
	
	if(title !== ''){
		var base_url = '<?php echo base_url() ?>';
		$.ajax({
			url:base_url+'Main/editBook',
			type:"post",
			data:{book_title: title, author: author, date_published: date_published, number_of_pages: number_of_pages, type_of_book: type_of_book, books_id: books_id},
			success: function(c){
				if(c === 'success'){
					alert("Data successfully edited.");
					window.location.reload();
				}else{
					alert("No data edited. Please check your data.");
				}
			}
		});
	}else{
		alert("Please, fill the variables needed");
	}
});
</script>
</body>
</html>