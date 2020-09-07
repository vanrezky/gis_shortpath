<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sb_admin/css/tabel.css">
    <!-- <meta name="author" content="Willy" /> -->
    <style>
        body,
        p,
        h3,
        h4,
        h1 h2 {
            font-family: "Times New Roman", serif;
        }

        .garis {
            height: 2px;
            background-color: #000;
            margin-bottom: 0px;
            margin-top: 10px;
        }

        hr {
            height: 0.5px;
            background-color: #000;
            margin-top: 5px;
        }

        p {
            margin: 0 0 0 0;
            padding: 0 0 0 0;
        }

        .left {
            text-align: left
        }

        .right {
            text-align: right
        }

        .center {
            text-align: center
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            grid-gap: 10px;
            padding: 10px;
            text-align: center;
        }

        .grid-container>div {
            text-align: center;
            padding: 20px 0;
        }

        .item1 {
            grid-row: 1 / span 2;
        }

        /* .container {
            padding-left: 30px;
            padding-right: 30px;
        } */
    </style>

</head>
<!-- <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script> -->

<body style="font-family: 'Times New Roman',serif; ">
    <div class="left" style="margin-top: 20px;">
        <p></p>
        <p align="center"><b><u>DATA PELANGGAN TERDAFTAR</u></b></p>
        <p align="center"><b><?php echo (tgl_jam_indo(date('Y-m-d H:m:s'))); ?></b></p>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Kode Pelanggan</th>
                <th scope="col">Nama Pelanggan</th>
                <th scope="col">Jenis Berlangganan</th>
                <th scope="col">Telepon</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        foreach ($cetak_laporan as $data) {
        ?>
            <tr>
                <td><?= $data->id_costumer ?></td>
                <td> <?= $data->nama_costumer ?></td>
                <td><?= $data->jenis ?></td>
                <td><?= $data->no_telp ?></td>
                <td><?= $data->alamat ?></td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </table>
</body>
</html>