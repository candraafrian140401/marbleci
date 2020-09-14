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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/kecamatan/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/kecamatan/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $kecamatan->id_kecamatan?>" />

							<div class="form-group">
								<label for="name">Nama_Kecamatan</label>
								<input class="form-control <?php echo form_error('nama_kecamatan') ? 'is-invalid':'' ?>"
								 type="text" name="nama_kecamatan" placeholder="Product name" value="<?php echo $kecamatan->nama_kecamatan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_kecamatan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Jumlah_Kelurahan</label>
								<input class="form-control <?php echo form_error('jumlah_kelurahan') ? 'is-invalid':'' ?>"
								 type="text" name="jumlah_kelurahan" placeholder="Product name" value="<?php echo $kecamatan->jumlah_kelurahan ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('jumlah_kelurahan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Nama_Camat</label>
								<input class="form-control <?php echo form_error('nama_camat') ? 'is-invalid':'' ?>"
								 type="text" name="nama_camat" placeholder="Product name" value="<?php echo $kecamatan->nama_camat ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_camat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Link</label>
								<input class="form-control <?php echo form_error('link') ? 'is-invalid':'' ?>"
								 type="text" name="link" placeholder="Product name" value="<?php echo $kecamatan->link ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('link') ?>
								</div>
							</div>



							<div class="form-group">
								<label for="name">Photo</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $kecamatan->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Description*</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="description" placeholder="Product description..."><?php echo $kecamatan->description ?></textarea>
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