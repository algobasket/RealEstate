
<?= $this->extend('common/layout') ?>

<?= $this->section('content') ?>

<link href="https://getbootstrap.com/docs/4.5/examples/album/album.css" rel="stylesheet">    
 <header> 
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About PropertyRaja</h4>
          <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Login</h4>
          <ul class="list-unstyled">
           <li><a href="<?= base_url();?>/login" class="text-white">Customer Login</a></li>
            <li><a href="<?= base_url();?>/login-agent" class="text-white">Agent Login</a></li>
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
  <form>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        I accept terms and condtions to use services of propertyraja.com
      </label>
    </div>
  </div>
  <div class="form-group">
      <div class="btn-group" role="group" aria-label="Basic example" style="width:100%">
        <button type="button" class="btn btn-primary active" onclick="$('#collapseExample').collapse('hide')">Searching for Home</button>
        <button type="button" class="btn btn-primary" data-toggle="collapse" href="#collapseExample">Selling Property</button>
      </div>
  </div>
  
  <div class="collapse" id="collapseExample">
      <div class="card card-body">
          <div class="form-group">
            <label class="badge badge-success">I'm</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                <label class="form-check-label" for="inlineRadio1">House Owner</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
              <label class="form-check-label" for="inlineRadio2">Real Estate Developer</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
              <label class="form-check-label" for="inlineRadio3">Agent</label>
            </div>
          </div>
      </div>
  </div>
 
  <div class="form-group">
    <label for="inputAddress">Display Name</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Display Name">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Mobile Number</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Mobile Number">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Choose Password</label>
      <input type="password" class="form-control" id="inputCity" placeholder="Password">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Email</label>
      <input type="email" class="form-control" id="inputAddress2" placeholder="Email">
    </div>
  </div>
  <button type="submit" class="btn btn-light">Cancel</button>
  <button type="submit" class="btn btn-primary">Sign up</button>
  <hr>
   <div class="form-group">
    <label for="inputAddress">
    	Already a member ? 
    	<a href="<?= base_url();?>/Auth/login">SignIn</a>
    </label>
  </div>
</form>
      
         
   
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