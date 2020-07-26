<?= $this->extend('common/layout') ?>

<?= $this->section('content') ?>

<link href="https://getbootstrap.com/docs/4.5/examples/album/album.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/4.5/assets/css/docs.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  .star {
  position: relative;
  
  display: inline-block;
  width: 0;
  height: 0;
  
  margin-left: .9em;
  margin-right: .9em;
  margin-bottom: 1.2em;
  
  border-right:  .3em solid transparent;
  border-bottom: .7em  solid #FC0;
  border-left:   .3em solid transparent;

  /* Controlls the size of the stars. */
  font-size: 24px;
  
  &:before, &:after {
    content: '';
    
    display: block;
    width: 0;
    height: 0;
    
    position: absolute;
    top: .6em;
    left: -1em;
  
    border-right:  1em solid transparent;
    border-bottom: .7em  solid #FC0;
    border-left:   1em solid transparent;
  
    transform: rotate(-35deg);
  }
  
  &:after {  
    transform: rotate(35deg);
  }
}
.toast {
    position: absolute; 
    top: 0; 
    right: 0;
    margin: 6em;
    z-index: 99;
}

.toast .logo {
    height: 2em;
}
</style>
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
          

            <?php if(\Config\Services::session()->get('userId')){ ?>
               <h4 class="text-white">Welcome</h4>
               <ul class="list-unstyled">
                  <li><a href="<?= base_url();?>/login" class="text-white"><?php echo strtoupper(\Config\Services::session()->get('display'));?></a></li>
                  <li><a href="<?= base_url();?>/profile" class="text-white">My Profile</a></li>
                  <li><a href="<?= base_url();?>/messages" class="text-white">Messages</a></li>
                  <li><a href="<?= base_url();?>/notification" class="text-white">Notifications</a></li>
                  <li><a href="<?= base_url();?>/logout" class="text-white">Logout</a></li>
               </ul>     
            <?php }else{ ?>
              <h4 class="text-white">Login</h4>
              <ul class="list-unstyled">
                <li><a href="<?= base_url();?>/login" class="text-white">Customer Login</a></li>
                <li><a href="<?= base_url();?>/login-agent" class="text-white">Agent Login</a></li>
                <li><a href="<?= base_url();?>/login-developer" class="text-white">Developer Login</a></li>  
                <li><a href="<?= base_url();?>/login-staff" class="text-white">Staff Login</a></li>
              </ul>
            <?php } ?>


         
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-light bg-light shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="<?= base_url();?>" class="navbar-brand d-flex align-items-center">
        <img src="<?= base_url();?>/images/propertyraja.png" width="200"/>
      </a>
      
      <div class="btn-group">
            <?php if(\Config\Services::session()->get('userId')){ ?> 
                <button type="button" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="All messages sent to owners">
              <img src="<?= base_url();?>/images/messages.png" width="22"/> <span class="badge badge-danger">7</span>
              <span class="sr-only">unread messages</span>
            </button>
            <button type="button" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="shortlisted properties">
              <img src="<?= base_url();?>/images/star-empty.png" width="22"/> <span class="badge badge-danger">9</span>
              <span class="sr-only">unread messages</span>
            </button>
            <button class="btn btn-outline-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <?php echo strtoupper(\Config\Services::session()->get('display'));?>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="<?= base_url();?>/profile">My Profile</a>
                <a class="dropdown-item" href="<?= base_url();?>/favourites">My Listings</a> 
                <a class="dropdown-item" href="<?= base_url();?>/favourites">Favourites</a>
                <a class="dropdown-item" href="<?= base_url();?>/messages">Messages</a> 
                <a class="dropdown-item" href="<?= base_url();?>/notifications">Notifications</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= base_url();?>/logout">Logout</a>
            </div>
            <?php }else{ ?> 
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <?php } ?>

            

      </div>

    </div>
  </div>
</header>

<main role="main">

  <div class="album py-5 bg-light">
    <div class="container bd-callout bd-callout-danger" >
        <div class="row">
            <h5 class="custom-select-lg mb-4" style="font-size: 24px">&nbsp;&nbsp;Search By</h5>
            <select class="custom-select custom-select-lg mb-3" style="width:120px;margin-left:15px">
              <option selected>Buy</option>
              <option value="sell">Buy</option>
              <option value="rent">Rent</option> 
            </select>
            <select class="custom-select custom-select-lg mb-4" style="width:120px">
              <option selected>Flat</option>
              <option value="1">Villa</option>
              <option value="2">Plot</option> 
            </select>
            <select class="custom-select custom-select-lg mb-4" style="width:120px">
              <option selected>Any</option>
              <option value="1">50 Lakh</option>
              <option value="2">90 Lakh</option>
              <option value="2">1 Cr</option>
              <option value="2">2 Cr</option>
              <option value="2">4 Cr</option>
            </select>
            <select class="custom-select custom-select-lg mb-4" style="width:120px">
              <option selected>Facing</option>
              <option value="1">East</option>
              <option value="2">West</option>
              <option value="2">North</option>
              <option value="2">South</option>
            </select>
            <select class="custom-select custom-select-lg mb-4" style="width:120px">
              <option selected>1 BHK</option>
              <option value="0">Studio</option>
              <option value="1">2 BHK</option>
              <option value="2">3 BHK</option>
              <option value="2">4 BHK</option>
              <option value="2">5 BHK</option>
              <option value="2">5+ BHK</option> 
            </select>
            
            <select class="custom-select custom-select-lg mb-4" style="width:120px">
              <option selected>Options</option>
              <option value="0">Studio</option>
              <option value="1">2 BHK</option>
              <option value="2">3 BHK</option>
              <option value="2">4 BHK</option>
              <option value="2">5 BHK</option>
              <option value="2">5+ BHK</option>
            </select>
        </div> 
        <div class="row">
          
            <div class="custom-control custom-radio custom-control-inline">
              <h4>Posted By </h4>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="checkbox" id="customRadioInline" name="customRadioInline1" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline2">All</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="checkbox" id="customRadioInline" name="customRadioInline1" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline1">House Owner</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="checkbox" id="customRadioInline" name="customRadioInline1" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline2">RealEstate Developer</label>
            </div>
             <div class="custom-control custom-radio custom-control-inline">
              <input type="checkbox" id="customRadioInline" name="customRadioInline1" class="custom-control-input">
              <label class="custom-control-label" for="customRadioInline2">Agent</label>
            </div>
        </div>
    </div>
    <div class="container">
       <h3>Rishikesh Real Estate & Homes For Sale</h3>
       <h5>36,874 results</h5>
       <hr>



      <div class="row"> 
        
         <div class="card mb-3" style="width:100%;" >
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277416_960_720.jpg" class="card-img" width="150">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h3 class="card-title">
                  <span>50,00,000 INR</span> 
                  <img src="<?= base_url();?>/images/star-empty.png" width="25" class="float-right favourite" data-star="0"/>
                </h3>
                <p class="card-text">18277 Peru Creek Ave, Parker, CO 80134</p>
                <p class="card-text">Open plot for sale at bolligudem boduppal.Located in a newly developing society with all proposed facilities....</p>
                <p class="card-text">
                    <h6>House for sale <span class="badge badge-success">New</span>   | 1170 sft | 2Bhk | East | Ready to Occupy</h6> 
                    <a href="" class="btn btn-primary btn-sm float-right">I'm Interested</a>   
                </p>
                <p class="card-text">
                   Posted By : Vaishnav (Developer)  | Posted At : 12 Days ago | <a href="<?= base_url();?>/property-detail/" class="text-success">Full Detail</a>
                </p>
              </div>
            </div>
          </div>
        </div> 

       <div class="card mb-3" style="width:100%;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277416_960_720.jpg" class="card-img" width="150">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title">
                  <span>50,00,000 INR</span>    
                   <img src="<?= base_url();?>/images/star-empty.png" width="25" class="float-right favourite" data-star="0"/>
              </h3>
              <p class="card-text"></p>
              <p class="card-text">18277 Peru Creek Ave, Parker, CO 80134</p>
              <p class="card-text">Open plot for sale at bolligudem boduppal.Located in a newly developing society with all proposed facilities....</p>
              <p class="card-text">
                 <h6>New construction <span class="badge badge-success">New</span> | 1170 sft | 2Bhk | East | Ready to Occupy</h6>
                <a href="" class="btn btn-primary btn-sm float-right">I'm Interested</a>
              </p>
               <p class="card-text">
                Posted By : Vaishnav (Developer)  | Posted At : 12 Days ago | <a href="<?= base_url();?>/property-detail/" class="text-success">Full Detail</a>
              </p>
            </div>
          </div>
        </div>
      </div>  


      </div>







    </div>
  </div>

</main>

<div class="container">
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="<?= base_url();?>/images/propertyraja.png" alt="" width="150">
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