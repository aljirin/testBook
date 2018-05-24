
 <?php
foreach ($books as &$a) {
	$p_name 				= $a['title'];
	$p_author 				= $a['author'];
	$p_date_published 		= $a['date_published'];
	$p_number_of_pages		= $a['number_of_pages'];
	$p_type_of_book_id		= $a['type_of_book_id'];	
}
 ?>

<div class="container-fluid" style="margin-top:25px;margin-bottom:25px;">	
	<form class="form-horizontal" id="pages-form-edit" enctype="multipart/form-data">
	<input type="hidden" name="books_id" id="books_id" value="<?php echo $uripage; ?>">
	
    <div class="col-sm-9">	
		<div class="form-group">
			<div class="col-sm-9">
				<p style="color:black;" class="modal-label">(*) must be filled.</p>
			</div>
		</div>		
		<div class="form-group">
			<div class="col-sm-9">
				<p style="color:black;" class="modal-label">Book Title*</p>
				<input type="text" class="form-control form-product" id="book_title"  name="book_title" placeholder="" value="<?= $p_name ?>">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-9">
				<p style="color:black;" class="modal-label">Author</p>
				<input type="text" class="form-control form-product" id="author" name="author" placeholder="" value="<?= $p_author ?>">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-9">
				<p style="color:black;" class="modal-label">Date Published</p>
				<input type="text" class="form-control form-product" id="date_published" name="date_published" placeholder="" value="<?= $p_date_published ?>">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-9">
				<p style="color:black;" class="modal-label">Number of Pages</p>
				<input type="text" class="form-control form-product" id="number_of_pages" name="number_of_pages" placeholder="" value="<?= $p_number_of_pages ?>">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-9">
				<p style="color:black;" class="modal-label">Type of Book</p>
				<select class="form-control form-product" name="type_of_book" id="type_of_book">
				<option value ="0">Type of Book</option>
				<?php					
				foreach ($typebook as $b) {
					if($p_type_of_book_id === $b['type_of_book_id']){
						$selected = 'selected';
					}else{
						$selected = '';
					}
				?>
				<option value="<?= $b['type_of_book_id'] ?>" <?= $selected ?>><?= $b['type_of_book'] ?></option>
				<?php
				}
				?>
				</select>
			</div>
		</div>
				
		<div class="st-actionContainer right-bottom">
			<div class="right-bottom">
				<button type="submit" id="edit_button" class="btn">Edit</button>
				<button type="submit" id="save_button" class="btn">Save Changes</button>
			</div>
		</div>
    </div>
	</form>
</div>

<script>
    $('.form-product').attr('disabled', true);
    $('#edit_button').on('click', function (e) {
        e.preventDefault();
        $('#edit_button').toggle();
        $('#save_button').toggle();
        $('.form-product').attr('disabled', false);
		document.getElementById('resetImg1').style.display = "block";
		document.getElementById('resetImg2').style.display = "block";
		document.getElementById('resetImg3').style.display = "block";
    });
</script>