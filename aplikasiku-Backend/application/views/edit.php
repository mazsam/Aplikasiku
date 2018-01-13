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
        <h2>Form Pelanggan</h2>
        <form class="well form-horizontal" action="<?php echo base_url('home/update');?>" method="post"  id="contact_form">
            <fieldset>                
                <!-- Text input-->
                <?php foreach($data as $pelanggan){ ?>
                <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-12 control-label">Kode</label>  
                        <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="id" placeholder="Kode" class="form-control"  type="hidden"  value="<?php echo $pelanggan->id ?>" require>
                            <input  name="kode" placeholder="" class="form-control"  type="text"  value="<?php echo $pelanggan->code ?>" require>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" >Nama Lengkap</label> 
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="nama" placeholder="nama" class="form-control"  value="<?php echo $pelanggan->nama_lengkap ?>" type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label">Alamat</label>  
                        <div class="col-md-12 inputGroupContainer">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input  name="alamat" placeholder="Alamat" class="form-control"  value="<?php echo $pelanggan->alamat ?>" type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label" >Email</label> 
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input name="email" placeholder="Email" class="form-control"  value="<?php echo $pelanggan->email ?>" type="text" require>
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
                            <input name="phone" placeholder="No. Telp" class="form-control" value="<?php echo $pelanggan->no_telp ?>" type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-12 control-label">Latitude</label>  
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="latitude" placeholder="Latitude" class="form-control" value="<?php echo $pelanggan->lat ?>" type="text" require>
                            </div>
                        </div>
                    </div>


                    <!-- Text input--> 
                    <div class="form-group">
                        <label class="col-md-12 control-label">Longitude</label>  
                            <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                <input name="longitude" placeholder="Longitude" class="form-control" value="<?php echo $pelanggan->lng ?>" type="text" require>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-12 control-label"></label>
                        <div class="col col-xs-6 text-right">
                            <button type="submit" class="btn btn-sm btn-primary btn-create">Edit Data</button>
                        </div>
                    </div>
                <?php } ?>
                </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
