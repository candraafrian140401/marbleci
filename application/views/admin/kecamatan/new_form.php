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

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/kecamatan/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/kecamatan/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="name">Nama Kecamatan</label>
								<input class="form-control <?php echo form_error('nama kecamatan') ? 'is-invalid':'' ?>"
								 type="text" name="nama kecamatan" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('nama kecamatan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jumlah Kelurahan</label>
								<input class="form-control <?php echo form_error('jumlah kelurahan') ? 'is-invalid':'' ?>"
								 type="number" name="jumlah kelurahan" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah kelurahan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Nama Camat</label>
								<input class="form-control <?php echo form_error('nama camat') ? 'is-invalid':'' ?>"
								 type="text" name="nama camat" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('nama camat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Link</label>
								<input class="form-control <?php echo form_error('link') ? 'is-invalid':'' ?>"
								 type="text" name="link" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('link') ?>
								</div>
							</div>

							

							<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Description*</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="description..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
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

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>