<style type="text/css">
body#LoginForm{ background-color:#dedede;padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 8% auto 30px;
  max-width: 42%;
  padding: 40px 70px 40px 70px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ 
  text-align:center;
}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #2782d2 none repeat scroll 0 0;
  border-color: #1772c2;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;}
@media(max-width: 768px){
  .main-div{
    max-width: 100% !important; 
    padding: 32px 38px 32px 38px;
    margin:8% auto 20%;
  }
}
</style>
<body id="LoginForm">  
  <div class="container">
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <img src="<?php echo base_url('assets/images/login.png'); ?>" width="80" style="margin-bottom: 20px;">
          <h2>CV. Hanna Jasa</h2>
          <p>Biro Jasa - STNK - SIM - Perizinan</p>
       </div>
       <form id="Login" method="post" action="<?php echo site_url('welcome/act_log') ?>">
        <div class="form-group">
          <input type="text" name="username" class="form-control" id="inputEmail" placeholder="Username">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <div class="forgot">
          <a href="#">Lupa kata sandi?</a>
        </div>
        <button type="submit" class="btn btn-primary">Masuk</button>
        <!-- <h5 style="margin-top: 20px;">&copy 2019 CV. Hanna Jasa</h5> -->
      </form>
    </div>
  </div>
</div>
</div>