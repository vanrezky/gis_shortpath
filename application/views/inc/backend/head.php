<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?> | <?php echo $nama_website->nama_website; ?></title>

    <link rel="shortcut icon" href="<?= base_url('assets/img/' . $nama_website->logo); ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/sb_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/sb_admin/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Data Tables -->
    <link href="<?= base_url(); ?>assets/sb_admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <!-- <link href="<?= base_url(); ?>assets/sweet_alert/sweetalert.css" rel="stylesheet"> -->

    <script src="<?= base_url(); ?>assets/sb_admin/vendor/jquery/jquery.min.js"></script>
    <!-- <script src="<?= base_url(); ?>assets/sweet_alert/sweetalert.min.js"></script> -->
    <!-- js maps -->
    <?php echo $map['js']; ?>
</head>