<div id="content" class="app-content">
<div class="col-xl-12 ui-sortable">
<div class="panel panel-inverse" data-sortable-id="form-stuff-1" data-init="true">
<div class="panel-heading ui-sortable-handle">
<h4 class="panel-title">Modul_pdf Read</h4>
<div class="panel-heading-btn">
<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand" data-bs-original-title="" title="" data-tooltip-init="true"><i class="fa fa-expand"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
</div>
</div>
<div class="panel-body">
<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Author</td><td><?php echo $author; ?></td></tr>
	    <tr><td>Tahun Terbit</td><td><?php echo $tahun_terbit; ?></td></tr>
	    <tr><td>File Pdf</td><td><?php echo $file_pdf; ?></td></tr>
	    <tr><td>Kategori Modul Id</td><td><?php echo $kategori_modul_id; ?></td></tr>
	    <tr><td>View</td><td><?php echo $view; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('modul_pdf') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
			</div>
        </div>
    </div>
</div>