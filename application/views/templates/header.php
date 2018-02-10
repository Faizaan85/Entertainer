<?php header('Access-Control-Allow-Origin: *'); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $title; ?> </title>
		<meta name="description" content="<?php echo $title; ?>">
		<meta name="author" content="Faizaan VArteji">
		<?php $var_defined = get_defined_vars(); ?>
		<script src="<?php echo base_url(); ?>application/assets/js/require/jquery-3.2.0.min.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/require/jquery-ui/jquery-ui.min.js"></script>

		<script src="<?php echo base_url(); ?>application/assets/js/require/jqvalid/dist/jquery.validate.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/require/DataTables/datatables.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/shortcut.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap-select.min.js"></script>
		<script type="text/javascript">
			var $base_url = "<?php echo base_url(); ?>"
		</script>

		<?php if (isset($var_defined['jslist'])):

			foreach($jslist as $js): ?>
			<script type="text/javascript" src="<?php echo base_url();?>application/assets/js/<?php echo $js;?>"></script>
		<?php endforeach;
		endif; ?>


		<script src="<?php echo base_url(); ?>application/assets/js/require/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>application/assets/js/require/math.min.js"></script>
		<link href="<?php echo base_url(); ?>application/assets/css/require/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url(); ?>application/assets/css/require/jquery-ui.min.css" rel="stylesheet" type="text/css">

		<link href="<?php echo base_url(); ?>application/assets/css/require/datatables.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>application/assets/css/require/font-awesome.min.css" type="text/css">
		<link rel="stylesheet" href=" <?php echo base_url(); ?>application/assets/css/require/bootstrap-select.min.css" type="text/css">
		</head>
	<body>
