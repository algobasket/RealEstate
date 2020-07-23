<?= $this->extend('common/layout') ?>

<?= $this->section('content') ?>

<link href="https://getbootstrap.com/docs/4.5/examples/album/album.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" rel="stylesheet">
<link href="https://getbootstrap.com/docs/4.5/assets/css/docs.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

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
                <a class="dropdown-item" href="<?= base_url();?>/favourites">Favourites</a>
                <a class="dropdown-item" href="<?= base_url();?>/messages">Messages</a> 
                <a class="dropdown-item" href="<?= base_url();?>/notification">Notifications</a>
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
   
    <div class="container">
       <h3 class="display-4">Add Property <a href="<?= base_url();?>/add-property" class="btn btn-outline-danger float-right"> See Listings</a></h3>
       <hr>

      <div class="row"> 
        
         <div class="col-md-8 order-md-1">

            <!---- Flat Section ----->


             <?= \Config\Services::session()->getFlashdata('alert');?>
             <?= form_open('add-property','id="addPropertyForm"') ?>
             <?php //foreach ($profile as $info){} ?>
              <div class="row">
                <div class="col-md-5 mb-3">
                   <label for="country">Listing Type </label><br>
                    <div class="btn-group btn-group-toggle btn-block" data-toggle="buttons">
                      <label class="btn btn-outline-danger active" data-listingtype="sell" id="listing_type_lb">   
                        <input type="radio" name="listing_type" class="listing_type" id="listing_type" value="sell" checked> Selling
                      </label>
                      <label class="btn btn-outline-dark" data-listingtype="rent" id="listing_type_lb">  
                        <input type="radio" name="listing_type" class="listing_type" id="listing_type" value="rent"> Renting 
                      </label>
                    </div>
                </div>  
                <div class="col-md-5 mb-3">
                  <label for="country">Property Type</label> 
                  <select class="custom-select d-block w-100" name="property_type" id="property_type" required > 
                       <option value="">Select property type</option>
                      <?php foreach ($property_type as $ptype) : ?>
                        <option value="<?= $ptype['id'];?>" > 
                          <?= $ptype['type_name'];?>  
                        </option>
                      <?php endforeach ?>
                  </select>
                  <div class="invalid-feedback">
                    Please select property type.
                  </div>
                </div>
                <input type="hidden" id="listing_type_hide" name="listing_type_hide" value="sell"/> 
              </div>



            <div id="dynamicPageLoad">  

            </div>



             <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="country">Amenities</label><br>
                        <?php foreach($amenities as $am) : ?>
                        <div class="form-check form-check-inline"> 
                          <input class="form-check-input" type="checkbox" id="amenities" name="amenities[]" value="<?= $am['id'];?>">
                          <label class="form-check-label" for="amenities"><?= $am['name'];?></label>
                        </div>
                      <?php endforeach ?>
                </div>
              </div>

              <div class="row">
                <div class="col-md-8 mb-3">
                   <label for="country">Facing </label>
                    <div class="btn-group btn-block btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-outline-danger active">
                        <input type="radio" name="facing" id="facing" value="north" checked> North
                      </label>
                      <label class="btn btn-outline-danger">
                        <input type="radio" name="facing" id="facing" value="south"> South 
                      </label>
                      <label class="btn btn-outline-danger">
                        <input type="radio" name="facing" id="facing" value="east"> East 
                      </label>
                      <label class="btn btn-outline-danger">
                        <input type="radio" name="facing" id="facing" value="west"> West 
                      </label>
                    </div>
                </div>
              </div>


              <hr class="mb-4"> 

              <h4 class="mb-3">Property Detail</h4>

               <div class="row">
                <div class="col-md-10 mb-3">
                    <label for="title">Title</label>
                    <div class="input-group">
                      <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Please input" name="title">
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="title">Description</label>
                    <div class="input-group">
                      <textarea type="text" class="form-control" placeholder="Please input" name="description"></textarea>
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="title">Specification</label>
                    <div class="input-group">
                      <textarea type="text" class="form-control" placeholder="Please input" name="specification"></textarea>
                    </div>
                </div>
              </div>
             
              <hr class="mb-4"> 

              <h4 class="mb-3">Upload Photos</h4>

              <div class="d-block my-3">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupFileAddon01">Images</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                    <div class="input-group-append">
                      <button class="btn btn-outline-danger" type="button" id="inputGroupFileAddon04">+ Add More</button>
                    </div>
                  </div>
              </div>
              
              <hr class="mb-4">

              <a href="<?= base_url().'/add-property';?>" class="btn btn-outline-dark btn-lg">Cancel</a> 
              <input class="btn btn-outline-danger btn-lg " type="submit" name="add_property" value="Save and add photos"/> 

            <?= form_close();?>
      </div>
      <div class="col-md-4 order-md-2">
        <h3 class="text-left">Sponsored Ads</h3>
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277416_960_720.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text"><b>Aurabindo Kohinoor</b> <br>luxury 2 and 3 bhk homes in prime location</p>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277416_960_720.jpg" class="card-img-top" alt="...">
            <div class="card-body">
               <p class="card-text"><b>Aurabindo Kohinoor</b> <br>luxury 2 and 3 bhk homes in prime location</p>
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