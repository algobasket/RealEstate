
<?= $this->extend('common/layout') ?>

<?= $this->section('content') ?>

<link href="https://getbootstrap.com/docs/4.5/examples/album/album.css" rel="stylesheet">    
 <header> 
  <div class="collapse bg-warning" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About PropertyRaja</h4>
          <p class="text-muted">
            Launched in 2020, PropertyRaja.com, India’s No. 1 property portal, deals with every aspect of the consumers’ needs in the real estate industry. It is an online forum where buyers, sellers and brokers/agents can exchange information about real estate properties quickly, effectively and inexpensively. At PropertyRaja.com, you can advertise a property, search for a property, browse through properties, build your own property microsite, and keep yourself updated with the latest news and trends making headlines in the realty sector.
          </p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Login</h4>
          <ul class="list-unstyled">
             <li><a href="<?= base_url();?>/login" class="text-white">Customer Login</a></li>
            <li><a href="<?= base_url();?>/login-agent" class="text-white">Agent Login</a></li>
            <li><a href="<?= base_url();?>/login-developer" class="text-white">Developer Login</a></li>  
            <li><a href="<?= base_url();?>/login-staff" class="text-white">Staff Login</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-light bg-light shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="<?= base_url();?>" class="navbar-brand d-flex align-items-center">
        <img src="<?= base_url();?>/images/propertyraja.png" width="200"/>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main role="main">

  <section class="jumbotron">
    <div class="container">
     
      <h1>Sign-Up</h1>
      <p class="lead text-muted">India's No 1 Property Site</p>
       <hr>  
  
  <?= \Config\Services::session()->getFlashdata('alert');?> 

  <?= form_open('register','onsubmit="return validateForm(this)"') ?>
  <?= csrf_field() ?> 
  <div class="form-group">
    <div class="form-check"> 
      <input type="checkbox" name="agree" id="agree" class="form-check-input" value="yes" />
      <label class="form-check-label" for="agree">  
        &nbsp;I accept terms and condtions to use services of propertyraja.com &nbsp;
      </label>
    </div>
  </div>
  <div class="form-group">
      <div class="btn-group" role="group" aria-label="Basic example" style="width:100%">
        <button type="button" class="btn btn-primary active" 
        onclick="searchingForHome()">Searching for Home</button>
        <button type="button" class="btn btn-primary" onclick="sellingProperty()">Selling Property</button>
      </div>
  </div>
  <input type="hidden" name="purpose" value="buy_rent" id="purpose" /> 
  <div class="collapse" id="collapseExample">
      <div class="card card-body">
          <div class="form-group"> 
            <label class="badge badge-success">I'm</label><br> 
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="rolename" id="inlineRadio1" value="customer" checked >
                <label class="form-check-label" for="inlineRadio1">House Owner</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rolename" id="inlineRadio2" value="developer">
              <label class="form-check-label" for="inlineRadio2">Real Estate Developer</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="rolename" id="inlineRadio3" value="agent">
              <label class="form-check-label" for="inlineRadio3">Agent</label>
            </div>
          </div>
      </div>
  </div>
 
  <div class="form-group">
    <label for="inputAddress">Display Name</label>
    <input type="text" class="form-control" id="display-name" name="display-name" placeholder="Display Name" value="<?= old('display-name');?>" autocomplete="false"/>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Mobile Number</label>
    <input type="text" class="form-control" id="mobile-number" name="mobile-number" placeholder="Mobile Number" value="<?= old('mobile-number');?>">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Choose Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= old('password');?>" autocomplete="false"/>
    </div>
    <div class="form-group col-md-6"> 
      <label for="inputState">Email</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= old('email');?>">
    </div>
  </div>
  <button type="submit" class="btn btn-light">Cancel</button>  
  <input type="submit" class="btn btn-primary" name="sign-up" value="Sign up"/>  
  <hr>
   <div class="form-group">
    <label for="inputAddress"> 
    	Already a member ? 
    	<a href="<?= base_url();?>/Auth/login">SignIn</a>
    </label>
  </div>
  <?= form_close() ?> 


    </div>
  </section>
</main> 



<div class="container">
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="<?= base_url();?>/images/propertyraja.png" alt="" width="150">
        <small class="d-block mb-3 text-muted">&copy; 2017-2020 | Developed by Algobasket</small>
      <div class="col-6 col-md">
        <h5>Quick links</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Mobile Apps</a></li>
          <li><a class="text-muted" href="#">Residential Property</a></li>
          <li><a class="text-muted" href="#">Commercial Property</a></li>
          <li><a class="text-muted" href="#">New Projects</a></li>
          <li><a class="text-muted" href="#">Price Trends</a></li>
          <li><a class="text-muted" href="#">Find Agent</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>COMPANY</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">About Us</a></li>
          <li><a class="text-muted" href="#">Contact Us</a></li>
          <li><a class="text-muted" href="#">Careers with Us</a></li>
          <li><a class="text-muted" href="#">Terms & Conditions</a></li>
          <li><a class="text-muted" href="#">Testimonials</a></li>
          <li><a class="text-muted" href="#">Privacy Policy</a></li>
          <li><a class="text-muted" href="#">Report a problem</a></li>
          <li><a class="text-muted" href="#">Safety Guide</a></li>
        </ul>
      </div>
      <div class="col-6 col-md">
        <h5>Our Partners</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">EasyBHK.com</a></li>
          <li><a class="text-muted" href="#">MagicBricks.com</a></li>
          <li><a class="text-muted" href="#">99Acres.com</a></li>
          <li><a class="text-muted" href="#">Makaan.com</a></li>
        </ul>
      </div>
    </div>
  </footer>
 </div>

 <script>
   function searchingForHome(){
    $('#collapseExample').collapse('hide');
    $('#purpose').val('buy_rent');
    $('input[value="customer"]').click();
   }
   function sellingProperty(){
     $('#collapseExample').collapse('show');
     $('#purpose').val('sell');
   }
   
   function validateForm(form) 
   {
      console.log("checkbox checked is ", form.agree.checked);
      if(!form.agree.checked)
      {
          $('.form-check-label').addClass('badge-danger');
          return false;
      }
      else
      {
          $('.form-check-label').removeClass('badge-danger'); 
          return true;
      }
   } 
  

 </script>

<?= $this->endSection() ?>