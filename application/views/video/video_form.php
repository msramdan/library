<div id="content" class="app-content">
	<div class="col-xl-12 ui-sortable">
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

			<div class="panel-heading ui-sortable-handle">
				<h4 class="panel-title">KELOLA DATA VIDEO</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="panel-body">

				<form action="<?php echo $action; ?>" method="post">
					<thead>
						<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
							<tr>
								<td >Title <?php echo form_error('title') ?></td>
								<td><input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" /></td>
							</tr>

							<tr>
								<td >Deskripsi <?php echo form_error('deskripsi') ?></td>
								<td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
							</tr>
							<tr>
								<td>Kategori Video<?php echo form_error('kategori_video_id') ?></td>
								<td>
									<select name="kategori_video_id" class="form-control theSelect">
										<option value="" style="color: black;">-- Pilih -- </option>
										<?php foreach ($kategori as $key => $data) { ?>
											<?php if ($kategori_video_id == $data->kategori_video_id) { ?>
												<option style="color: black;" value="<?php echo $data->kategori_video_id ?>" selected><?php echo $data->nama_kategori_video ?></option>
											<?php } else { ?>
												<option style="color: black;" value="<?php echo $data->kategori_video_id ?>"><?php echo $data->nama_kategori_video ?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td >Link Url <?php echo form_error('link_url') ?></td>
								<td><input type="text" class="form-control" name="link_url" id="link_url" placeholder="Link Url" value="<?php echo $link_url; ?>" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="hidden" name="video_id" value="<?php echo $video_id; ?>" />
									<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
									<a href="<?php echo site_url('video') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
								</td>
							</tr>
					</thead>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>