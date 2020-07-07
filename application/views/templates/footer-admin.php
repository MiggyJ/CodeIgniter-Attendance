
	<!-- JS, Popper.js, and jQuery -->
	<script
  src="https://code.jquery.com/jquery-3.2.0.min.js"
  integrity="sha256-JAW99MJVpJBGcbzEuXk4Az05s/XyDdBomFqNlM3ic+I="
  crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>js/app.js"></script>
	<script>
		table()

		$("#a_Date, #a_Section").on('change', table)

		function table(){
			$('#data').DataTable().destroy();
			$('#data').DataTable({
				responsive: true,
				sort: false,
				autoWidth: false,
				processing: true,
				serverSide: true,
				language:{
					loadingRecords: '&nbsp;',
					processing: 'Loading. Please Wait...'
				},
				ajax: `<?=base_url()?>admin/attendance/${$('#a_Section').val()}/${$('#a_Date').val()}`,
				columns: [
						{ data: 'studentNumber' },
						{ data: 'name' },
						{ data: 'image', render: function(data) { return '<img src="<?=base_url()?>uploads/' + data + '" height="150px">'} },
						{ data: 'isLate' }
					]
			})
		}
	</script>
</body>
</html>