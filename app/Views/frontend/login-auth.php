
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
     
  <?php if($role == "customer") : ?> 
  <h1>Sign-In</h1>
  <p class="lead text-muted">India's No 1 Property Site</p>
  <hr>  
  <?= \Config\Services::validation()->listErrors() ? "<div class='alert-danger'>".\Config\Services::validation()->listErrors()."</div>" : ""; ?>  
  <?= \Config\Services::session()->getFlashdata('alert');?>  
  <?= form_open('login') ?>
  <?= csrf_field() ?>
  <div class="form-group">
    <label for="inputAddress2">Mobile Number</label>
    <input type="text" name="mobile-number" class="form-control" id="inputAddress2" placeholder="Mobile Number">
  </div>
  <div class="form-group">
    <label for="inputCity">Choose Password</label>
    <input type="password" name="password" class="form-control" id="inputCity" placeholder="Password">
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Remember me
      </label> 
    </div>
  </div>
  <button type="submit" class="btn btn-light">Cancel</button>
  <input type="submit" class="btn btn-primary" name="sign-in" value="Sign In" />
  <hr>
   <div class="form-group">
    <label for="inputAddress">
    	Not a member?
    	<a href="<?= base_url();?>/Auth/register">Sign-up</a>
    </label>
  </div>
<?= form_close() ?>

<?php endif ?>
 
 <?php if($role == "agent") : ?> 
 
 <h1>Sign-In | Agent</h1>
  <p class="lead text-muted">India's No 1 Property Site</p>
  <hr>    
 <?= \Config\Services::validation()->listErrors() ? "<div class='alert-danger'>".\Config\Services::validation()->listErrors()."</div>" : ""; ?>  
  <?= \Config\Services::session()->getFlashdata('alert');?>  
  <?= form_open('login-agent') ?>
  <?= csrf_field() ?> 
  <div class="form-group">
    <label for="inputAddress2">Mobile Number</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Mobile Number"name="mobile-number" >
  </div>
  <div class="form-group">
    <label for="inputCity">Choose Password</label>
    <input type="password" class="form-control" id="inputCity" placeholder="Password" name="password">
  </div>
  <div class="form-group">
    <label for="inputCity">Agent Access Code</label>
    <input type="text" class="form-control" id="inputCity" placeholder="Password" name="access_code">
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Remember me
      </label> 
    </div>
  </div>
  <button type="submit" class="btn btn-light">Cancel</button>
  <input type="submit" class="btn btn-primary" name="sign-in" value="Sign In" />
  <hr>
   <div class="form-group">
    <label for="inputAddress">
      Not a member?
      <a href="<?= base_url();?>/Auth/register">Sign-up</a>
    </label>
  </div>
</form>
<?php endif ?>

<?php if($role == "developer") : ?>  
 
 <h1>Sign-In | RealEstate Developer</h1>
  <p class="lead text-muted">India's No 1 Property Site</p>
  <hr>    
  <form>
  <div class="form-group">
    <label for="inputAddress2">Mobile Number</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Mobile Number">
  </div>
  <div class="form-group">
    <label for="inputCity">Choose Password</label>
    <input type="password" class="form-control" id="inputCity" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="inputCity">Developer Access Code</label>
    <input type="password" class="form-control" id="inputCity" placeholder="Password">
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Remember me
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-light">Cancel</button>
  <input type="submit" class="btn btn-primary" name="sign-in" value="Sign In" />
  <hr>
   <div class="form-group">
    <label for="inputAddress">
      Not a member?
      <a href="<?= base_url();?>/Auth/register">Sign-up</a>
    </label>
  </div>
</form>
<?php endif ?>

 <?php if($role == "staff") : ?> 
      
  <h1>Sign-In | Staff</h1>
  <p class="lead text-muted">India's No 1 Property Site</p>
  <hr>    
  <form>
  <div class="form-group">
    <label for="inputAddress2">Mobile Number</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Mobile Number">
  </div>
  <div class="form-group">
    <label for="inputCity">Choose Password</label>
    <input type="password" class="form-control" id="inputCity" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="inputCity">Staff Access Code</label>
    <input type="password" class="form-control" id="inputCity" placeholder="Password">
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Remember me
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-light">Cancel</button>
  <button type="submit" class="btn btn-primary">Sign In</button>
  <hr>
   <div class="form-group">
    <label for="inputAddress">
      Not a member?
      <a href="<?= base_url();?>/Auth/register">Sign-up</a>
    </label>
  </div>
</form>
<?php endif ?>

  </div>
  </section>

</main>

<div class="container">
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="/docs/4.5/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
        <small class="d-block mb-3 text-muted">&copy; 2017-2020 | Developed by Algobasket</small>
      </div>
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


<?= $this->endSection() ?>