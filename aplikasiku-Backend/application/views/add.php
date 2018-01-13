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
    <div class="container">
        <form class="" action="<?php echo base_url('home/insert');?>" method="post"  id="contact_form">
                <!-- Form Name -->
                <h2>Form Pelanggan</h2>
                <!-- Text input-->

                <!--  message -->
                <!-- <div class="form-group"> 
                    <div class="col-md-12 inputGroupContainer">
                        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>
                    </div>
                </div> -->

                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-12 control-label">Kode</label>  
                        <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="kode" placeholder="Kode" class="form-control"  type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" >Nama Lengkap</label> 
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="nama" placeholder="nama" class="form-control"  type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label">Alamat</label>  
                        <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="alamat" placeholder="Alamat" class="form-control"  type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" >Email</label> 
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="email" placeholder="Email" class="form-control"  type="text" require>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" >No. Telp</label> 
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="phone" placeholder="No. Telp" class="form-control"  type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label">Latitude</label>  
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="latitude" placeholder="Latitude" class="form-control"  type="text" require>
                            </div>
                        </div>
                    </div>


                    <!-- Text input--> 
                    <div class="form-group">
                        <label class="col-md-12 control-label">Longitude</label>  
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="longitude" placeholder="Longitude" class="form-control" type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-12 control-label"></label>
                        <div class="col col-xs-6 text-right">
                            <button type="submit" class="btn btn-sm btn-primary btn-create">Tambah Data</button>
                        </div>
                    </div>
                </div>
                </div>
        </form>
    </div>
</div>
</body>
</html>
