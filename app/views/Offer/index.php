<?php
if (!hasLogin()) {
    header("Location:" . APP_URL);
}
?>
<div class="container">
    <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-10 offset-lg-1 col-xl-10 offset-xl-1">
        <h1>Opening Offers</h1>
        <br>
        <table id="table_id" class="table table-responive table-striped table-bordered display">
		    <thead>
		        <tr>
		            <th>Column 1</th>
		            <th>Column 2</th>
		        </tr>
		    </thead>
		    <tbody>
		        <tr>
		            <td>Row 1 Data 1</td>
		            <td>Row 1 Data 2</td>
		        </tr>
		        <tr>
		            <td>Row 2 Data 1</td>
		            <td>Row 2 Data 2</td>
		        </tr>
		    </tbody>
		</table>
		<script type="text/javascript">
			$(document).ready(function () {
    			$('#table_id').DataTable();
			});
		</script>
    </div>
</div>
