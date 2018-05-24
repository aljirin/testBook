
<div class="container-fluid" style="margin-top:15px;margin-bottom:25px;">
    <div class="c000001-added-container">
        <button class="btn green-btn margin-left" onclick="location.href='<?php echo base_url();?>index.php/main/view_addBook'">+ Add
            Book
        </button>
        <hr>
    </div>
    <div class="added-container-unabsolute">
    </div>

    <div class="table-responsive">
        <table id="product_table" class="stripe display table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Book Title</th>
				<th>Author</th>
				<th>Date Published</th>
                <th>Number of Pages</th>
                <th>Type of Book</th>
            </tr>
            </thead>
            <tbody>
            <?php
			if($books !== false){
				foreach ($books as &$a){
				?>
					<tr>
						<td><?= $a['books_id'] ?></td>
						<td onclick="popit(<?= $a['books_id'] ?>)" style="cursor: pointer;"><?= $a['title'] ?></td>
						<td onclick="popit(<?= $a['books_id'] ?>)" style="cursor: pointer;"><?= $a['author'] ?></td>
						<td onclick="popit(<?= $a['books_id'] ?>)" style="cursor: pointer;"><?= $a['date_published'] ?></td>
						<td onclick="popit(<?= $a['books_id'] ?>)" style="cursor: pointer;"><?= $a['number_of_pages'] ?></td>
						<td onclick="popit(<?= $a['books_id'] ?>)" style="cursor: pointer;"><?= $a['type_of_book'] ?></td>
					</tr>
				<?php
				}
			}
            ?>
            </tbody>
        </table>
        <a href="#">
            <img src="<?= base_url() ?>/assets/images/phoenix/export-table.png" style="margin-top:10px;">
        </a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#product_table').dataTable({
            "language": {
				"lengthMenu": "Display _MENU_ records per page",
				"zeroRecords": "Nothing found - sorry",
				"info": "Showing _PAGE_ of _PAGES_ pages",
				"infoEmpty": "No records available",
				"infoFiltered": "(filtered from _MAX_ total records)"
			},
			columnDefs: [ {
				targets: [ 0 ],
				orderData: [ 0, 1 ]
			}, {
				targets: [ 1 ],
				orderData: [ 0, 1 ]
			}, {
				targets: [ 2 ],
				orderData: [ 0, 1 ]
			}, {
				targets: [ 3 ],
				orderData: [ 0, 1 ]
			}  
			],
			"info":true,
			"stateSave": true,
			"pagingType": "full_numbers",
			//"scrollX": true
        });
    });
</script>
