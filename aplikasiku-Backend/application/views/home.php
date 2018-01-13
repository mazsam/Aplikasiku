<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->helper('url');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Selamat Datang</title>
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css'); ?>" rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url('assets/dist/css/style-custom.css'); ?>" rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container ctn">
    <div class="row">
        <p></p>
        <h1>Manajemen Data Pelanggan</h1>    
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6 text-right">
                    <a href="<?php echo base_url('home/create');?>"><button type="button" class="btn btn-sm btn-primary btn-create">Tambah Data</button></a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1; 
                        foreach ($data as $pelanggan) {?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $pelanggan['code'];?></td>
                            <td><?php echo $pelanggan['nama_lengkap'];?></td>
                            <td><?php echo $pelanggan['alamat'];?></td>
                            <td><?php echo $pelanggan['email'];?></td>
                            <td><?php echo $pelanggan['no_telp'];?></td>
                            <td><?php echo $pelanggan['lat'];?></td>
                            <td><?php echo $pelanggan['lng'];?></td>
                            <td>
                                <a href="<?php echo base_url()."Home/hapus?id=".$pelanggan['id']; ?>"><button type="button" class="btn btn-secondary btn-sm">Hapus</button></a>
                                <a href="<?php echo base_url()."Home/edit?id=".$pelanggan['id']; ?>"><button type="button" class="btn btn-default btn-sm">edit</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div
></div>
</body>
</html>
