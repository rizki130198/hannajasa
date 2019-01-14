<style type="text/css">
.lingkaran {
  width:8px;
  height:8px;
  background-color:#5cb85c;
  border-radius:50%;
  overflow:hidden;
}
</style>
<div class="content">
    <div class="container-fluid">
        <?php 
        foreach ($account as $rowAccount) { 
          ?>
          <div class="row">
              <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Edit Profile</h4>
                        <p class="category">Complete your profile</p>
                    </div>
                    <div class="card-content">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nama</label>
                                                <input type="text" class="form-control" value="<?php echo $rowAccount['nama']; ?>">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Username</label>
                                                <input type="text" class="form-control" value="<?php echo $rowAccount['username']; ?>">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Email address</label>
                                        <input type="email" class="form-control" value="<?php echo $rowAccount['email']; ?>">
                                        <span class="material-input"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Password</label>
                                                <input type="password" value="<?php echo $rowAccount['ulang_password']; ?>" class="form-control">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Ulang Password</label>
                                                <input type="password" value="<?php echo $rowAccount['ulang_password']; ?>" class="form-control">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="<?php echo base_url('public/icon/icon.jpg'); ?>">
                        </a>
                    </div>
                    <div class="content">
                        <h6 class="category text-gray"><?php echo $rowAccount['hak_akses']; ?></h6>
                        <h4 class="card-title"><label class="lingkaran"></label> <?php echo $rowAccount['nama']; ?></h4>
                        <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
</div>