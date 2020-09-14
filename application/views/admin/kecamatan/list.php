<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/kecamatan/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nama Kecamatan</th>
									    <th>Jumlah Kelurahan</th>
									    <th>Nama Camat</th>
									    <th>Link</th>
										<th>Photo</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($kecamatan as $kecamatan): ?>
									<tr>
										<td width="150">
											<?php echo $kecamatan->nama_kecamatan ?>
										</td>
										<td>
											<?php echo $kecamatan->jumlah_kelurahan ?>
										</td>
										<td>
											<?php echo $kecamatan->nama_camat ?>
										</td>
										<td>
											<?php echo $kecamatan->link ?>
										</td>	
			
										<td>
										<img src="<?php echo base_url('../../marbleci/assets/kecamatan/'.$kecamatan->image) ?>" width="64" />
										</td>
										<td class="small">
											<?php echo substr($kecamatan->description, 0, 120) ?>...</td>
										<td width="250">
											<a href="<?php echo site_url('admin/kecamatan/edit/'.$kecamatan->id_kecamatan) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/kecamatan/delete/'.$kecamatan->id_kecamatan) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
