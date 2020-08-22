
<?= $this->extend('common/layout') ?>

<?= $this->section('content') ?>

<?= $this->include('common/header') ?>

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
    <input type="text" name="mobile-number" class="form-control" id="mobile-number" placeholder="Mobile Number" value="<?= old('mobile-number');?>" />
  </div>
  <div class="form-group">
    <label for="inputCity">Choose Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= old('password');?>"/>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="remember_me" value="1"/>  
      <label class="form-check-label" for="gridCheck">
        Remember me
      </label> 
    </div>
  </div>
  <button type="submit" class="btn btn-light">Cancel</button>
  <input type="submit" class="btn btn-primary" name="sign-in" value="Sign In" />
  <a href="<?= base_url();?>/forgot-password" class="float-right">Forgot Login?</a>
  <hr>
   <div class="form-group">
    <label for="inputAddress">
    	Not a member?
    	<a href="<?= base_url();?>/register">Sign-up</a>
    </label> | 
     
  
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
   <input type="text" name="mobile-number" class="form-control" id="mobile-number" placeholder="Mobile Number" value="<?= old('mobile-number');?>" />
  </div>
  <div class="form-group">
    <label for="inputCity">Choose Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= old('password');?>"/>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="remember_me" value="1"/>
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
      <a href="<?= base_url();?>/register">Sign-up</a>
    </label>
  </div>
</form>
<?php endif ?>

<?php if($role == "developer") : ?>  
 
 <h1>Sign-In | RealEstate Developer</h1>
  <p class="lead text-muted">India's No 1 Property Site</p>
  <hr>    
  <?= \Config\Services::validation()->listErrors() ? "<div class='alert-danger'>".\Config\Services::validation()->listErrors()."</div>" : ""; ?>  
  <?= \Config\Services::session()->getFlashdata('alert');?>  
  <?= form_open('login-developer') ?>
  <?= csrf_field() ?> 
  <div class="form-group">
    <label for="inputAddress2">Mobile Number</label>
    <input type="text" name="mobile-number" class="form-control" id="mobile-number" placeholder="Mobile Number" value="<?= old('mobile-number');?>" />
  </div>
  <div class="form-group">
    <label for="inputCity">Choose Password</label>
     <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= old('password');?>"/>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" name="remember_me" value="1"/>
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
      <a href="<?= base_url();?>/register">Sign-up</a>
    </label>
  </div>
</form>
<?php endif ?>

 <?php if($role == "staff") : ?> 
      
  <h1>Sign-In | Staff</h1>
  <p class="lead text-muted">India's No 1 Property Site</p>
  <hr>    
  <?= \Config\Services::validation()->listErrors() ? "<div class='alert-danger'>".\Config\Services::validation()->listErrors()."</div>" : ""; ?>  
  <?= \Config\Services::session()->getFlashdata('alert');?>  
  <?= form_open('login-staff') ?>
  <?= csrf_field() ?> 
  <div class="form-group">
    <label for="inputAddress2">Username</label>
    <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= old('username');?>" /> 
  </div>
  <div class="form-group"> 
    <label for="inputCity">Choose Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password" /> 
  </div>
  <div class="form-group">
    <label for="inputCity">Staff Role</label>
    <select name="role" class="form-control"> 
      <option value="admin">Admin</option>
      <option value="sub_admin">Sub Admin</option>
      <option value="content_writer">Content Writer</option>
      <option value="marketing_manager">Marketing Manager</option>
    </select>
  </div>
  <div class="form-group">
    <label for="inputCity">Staff Access Code</label>
    <input type="text" class="form-control" id="access_code" placeholder="Access Code" name="access_code" />
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
      <a href="<?= base_url();?>/register">Sign-up</a>
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