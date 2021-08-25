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

                    <?=$this->session->flashdata('pesan')?>


                    <div class="panel-heading">
                        <h4 class="panel-title">User info</h4>
                    </div>
                    <div class="form-group">

                        <form class="form-horizontal" method="post" action="<?=base_url('awal/editprofile')?>">
                            <?php foreach ($upd as $u): ?>
                            <label class="col-sm-2 control-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?=$u['nama']?>" name="nama"
                                    id="my-field">
                            </div>
                            <?=form_error('nama', '<small class="text-danger pl-3">', '</small>');?>

                            <input type="text" value="<?=$u['id']?>" name="id" hidden>
                            <input type="text" value="<?=$u['role_id']?>" name="role" hidden>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" value="<?=$u['username']?>" name="uname">
                                </div>
                            </div>
                            <?=form_error('uname', '<small class="text-danger pl-3">', '</small>');?>

                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Contact info</h4>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">E-mail address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?=$u['email']?>"
                                                    name="email">
                                            </div>
                                            <?=form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="alamat" class="form-control" value="<?=$u['alamat']?>"
                                                        name="alamat">
                                                </div>
                                                <?=form_error('alamat', '<small class="text-danger pl-3">', '</small>');?>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">Mobile number</label>
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control"
                                                        value="<?=$u['phone_number']?>" name="nohp">
                                                </div>
                                                <?=form_error('nohp', '<small class="text-danger pl-3">', '</small>');?>
                                            </div>
                                            <?php endforeach;?>




                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <button type="reset" class="btn btn-default">Cancel</button>
                        </form>







                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
function testInput(event) {
    var value = String.fromCharCode(event.which);
    var pattern = new RegExp(/[a-zåäö ]/i);
    return pattern.test(value);
}

$('#my-field').bind('keypress', testInput);
</script>
