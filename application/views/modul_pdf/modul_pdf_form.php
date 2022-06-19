<div id="content" class="app-content">
	<div class="col-xl-12 ui-sortable">
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

			<div class="panel-heading ui-sortable-handle">
				<h4 class="panel-title">KELOLA DATA MODUL_PDF</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="panel-body">

				<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
					<thead>
						<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
							<tr>
								<td>Title <?php echo form_error('title') ?></td>
								<td><input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" /></td>
							</tr>

							<tr>
								<td>Deskripsi <?php echo form_error('deskripsi') ?></td>
								<td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
							</tr>
							<tr>
								<td>Author <?php echo form_error('author') ?></td>
								<td><input type="text" class="form-control" name="author" id="author" placeholder="Author" value="<?php echo $author; ?>" /></td>
							</tr>
							<tr>
								<td>Tahun Terbit <?php echo form_error('tahun_terbit') ?></td>
								<td><input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" placeholder="Tahun Terbit" value="<?php echo $tahun_terbit; ?>" /></td>
							</tr>
							<?php if ($this->uri->segment(2) == 'create' || $this->uri->segment(2) == 'create_action') { ?>
								<tr>
									<td>File Pdf <?php echo form_error('file_pdf') ?></td>
									<td><input type="file" class="form-control" name="file_pdf" id="file_pdf" placeholder="file_pdf" required="" value="" onchange="return validasiEkstensi()" />
										<div id="preview"></div>
									</td>
								</tr>
							<?php } else { ?>
								<div class="form-group">
									<tr>
										<td>File Pdf <?php echo form_error('file_pdf') ?></td>
										<td>
											<a href="#modal-dialog" data-bs-toggle="modal"><iframe src="<?php echo base_url(); ?>assets/template/assets/pdf/<?= $file_pdf ?>" style="width: 100%;height: 450px"></iframe></a>
											<input type="hidden" name="file_pdf_lama" value="<?= $file_pdf ?>">
											<p style="color: red">Note :Pilih file_pdf Jika Ingin Merubah file_pdf</p>
											<input type="file" class="form-control" name="file_pdf" id="file_pdf" placeholder="file_pdf" value="" onchange="return validasiEkstensi()" />
											<div id="preview"></div>
										</td>

									</tr>
								</div>
							<?php } ?>

							<tr>
								<td>Kategori Modul<?php echo form_error('kategori_modul_id') ?></td>
								<td>
									<select name="kategori_modul_id" class="form-control theSelect">
										<option value="" style="color: black;">-- Pilih -- </option>
										<?php foreach ($kategori as $key => $data) { ?>
											<?php if ($kategori_modul_id == $data->kategori_modul_id) { ?>
												<option style="color: black;" value="<?php echo $data->kategori_modul_id ?>" selected><?php echo $data->nama_kategori_modul ?></option>
											<?php } else { ?>
												<option style="color: black;" value="<?php echo $data->kategori_modul_id ?>"><?php echo $data->nama_kategori_modul ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="hidden" name="modul_pdf_id" value="<?php echo $modul_pdf_id; ?>" />
									<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
									<a href="<?php echo site_url('modul_pdf') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
								</td>
							</tr>
					</thead>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function validasiEkstensi() {
		var inputFile = document.getElementById('file_pdf');
		var pathFile = inputFile.value;
		var ekstensiOk = /(\.pdf)$/i;
		if (!ekstensiOk.exec(pathFile)) {
			alert('Silakan upload file yang memiliki ekstensi .pdf');
			inputFile.value = '';
			return false;
		} else {
			// Preview file_pdf
			if (inputFile.files && inputFile.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					document.getElementById('preview').innerHTML = '<iframe src="' + e.target.result + '" style="height:450px; width:100%"/>';
				};
				reader.readAsDataURL(inputFile.files[0]);
			}
		}
	}
</script>