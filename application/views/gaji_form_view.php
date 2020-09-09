<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Gaji <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nip <?php echo form_error('nip') ?></label>
            <input type="text" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Gaji Pokok <?php echo form_error('gaji_pokok') ?></label>
            <input type="text" class="form-control" name="gaji_pokok" id="gaji_pokok" placeholder="Gaji Pokok" value="<?php echo $gaji_pokok; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tunjangan <?php echo form_error('tunjangan') ?></label>
            <input type="text" class="form-control" name="tunjangan" id="tunjangan" placeholder="Tunjangan" value="<?php echo $tunjangan; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('gaji') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>