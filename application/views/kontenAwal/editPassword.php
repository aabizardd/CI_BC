<section class="timer_area">

</section>
<section>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container bootstrap snippets">
        <div class="row">
            <div class="col-xs-12 col-sm-9">

                <div class="panel panel-default">

                    <div class="panel-body text-center">
                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png"
                            class="img-circle profile-avatar mt-3" alt="User avatar">
                    </div>
                </div>
                <div class="panel panel-default">


                    <div class="form-group">


                        <?=$this->session->flashdata('pw');?>

                        <form method="POST" action="<?=base_url('awal/updpw')?>">

                            <input type="text" value="<?=$this->session->userdata('id')?>" name="id" hidden>

                            <div class="panel-heading">
                                <h4 class="panel-title">Edit Password</h4>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password Lama</label>
                                <input type="password" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="pwlama">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password Baru</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="pwbaru">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="pwbaru1">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>




                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</section>
