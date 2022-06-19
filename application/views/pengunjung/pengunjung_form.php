<div id="content" class="app-content">
	<div class="col-xl-12 ui-sortable">
		<div class="panel panel-inverse" data-sortable-id="form-stuff-1" style="" data-init="true">

			<div class="panel-heading ui-sortable-handle">
				<h4 class="panel-title">KELOLA DATA PENGUNJUNG</h4>
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
								<td width='200'>Username <?php echo form_error('username') ?></td>
								<td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td>
							</tr>
							<tr>
								<td width='200'>Nama <?php echo form_error('nama') ?></td>
								<td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
							</tr>
							<tr>
								<td>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td>
								<td><select name="jenis_kelamin" class="form-control theSelect" value="<?= $jenis_kelamin ?>">
										<option style="color: black;" value="">-- Pilih --</option>
										<option style="color: black;" value="Laki Laki" <?php echo $jenis_kelamin == 'Laki Laki' ? 'selected' : 'null' ?>>Laki Laki</option>
										<option style="color: black;" value="Perempuan" <?php echo $jenis_kelamin == 'Perempuan' ? 'selected' : 'null' ?>>Perempuan</option>
									</select>
								</td>
							</tr>

							<tr>
								<td width='200'>Alamat <?php echo form_error('alamat') ?></td>
								<td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
							</tr>
							<?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
								<tr>
									<td width='200'>Password <?php echo form_error('password') ?></td>
									<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
								</tr>
							<?php } else { ?>
								<tr>
									<td width='200'>Password <?php echo form_error('password') ?></td>
									<td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="" />
										<small style="color: red">(Biarkan kosong jika tidak diganti)</small>
									</td>
								</tr>
							<?php } ?>
							<tr>
								<td></td>
								<td><input type="hidden" name="pengunjung_id" value="<?php echo $pengunjung_id; ?>" />
									<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> <?php echo $button ?></button>
									<a href="<?php echo site_url('pengunjung') ?>" class="btn btn-info"><i class="fas fa-undo"></i> Kembali</a>
								</td>
							</tr>
					</thead>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>