
<div class="container-fluid" style="margin-top:25px;margin-bottom:25px;">    
    <div class="col-sm-9">       
		<form class="form-horizontal" id="pages-form-create">
			<div class="form-group">
                <div class="col-sm-9">
                    <p style="color:black;" class="modal-label">(*) must be filled.</p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9">
                    <p style="color:black;" class="modal-label">Book Title*</p>
                    <input type="text" class="form-control" name="book_title">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-9">
                    <p style="color:black;" class="modal-label">Author</p>
                    <input type="text" class="form-control" name="author">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-9">
                    <p style="color:black;" class="modal-label">Date Published</p>
                    <input type="text" class="form-control" name="date_published">
                </div>
            </div>
			
			<div class="form-group">
                <div class="col-sm-9">
                    <p style="color:black;" class="modal-label">Number of Pages</p>
                    <input type="text" class="form-control" name="number_of_pages">
                </div>
            </div>			

            <div class="form-group">
                <div class="col-sm-9">
                    <p style="color:black;" class="modal-label">Type of Book</p>
                    <select class="form-control" name="type_of_book" id="type_of_book">
					<option value ="0">Select Type of Book</option>
                    <?php
                    foreach ($typebook as $b) {
                    ?>
                    <option value="<?= $b['type_of_book_id'] ?>"><?= $b['type_of_book'] ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
            </div>
			
            <div class="row" style="margin-top: 20px; text-align: right;">
				<div class="col-sm-9">
					<button type="submit" class="btn green-btn" id="sub">Add</button>
				</div>
            </div>
        </form>
    </div>

</div>
