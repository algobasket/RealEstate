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
.imgp {
  width:200px;
  height:200px;
  object-fit:cover;
}
.imgpl {
  width:400px;
  height:700px;
  object-fit:cover;
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
        <img src="<?= publicFolder();?>/images/propertyraja.png" width="200"/>
      </a>
      
      <div class="btn-group">
            <?php if(\Config\Services::session()->get('userId')){ ?> 
                <button type="button" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="All messages sent to owners">
              <img src="<?= publicFolder();?>/images/messages.png" width="22"/> <span class="badge badge-danger">7</span>
              <span class="sr-only">unread messages</span>
            </button>
            <button type="button" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="shortlisted properties">
              <img src="<?= publicFolder();?>/images/star-empty.png" width="22"/> <span class="badge badge-danger">9</span>
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
        <h3 class="display-4">Add Photos <a href="<?= base_url();?>/my-listings" class="btn btn-outline-danger float-right"> All Property</a></h3>
       <hr>
       
       <?php if (session('msg')) : ?>
          <div class="alert alert-info alert-dismissible">
            <?= session('msg') ?>
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
          </div> 
       <?php endif ?>
        <?= \Config\Services::session()->getFlashdata('alert');?> 
        <div class="bd-callout bd-callout-danger">
          <div class="row">
            <div class="col-md-9">
              <form action="<?php echo base_url('add-property-images') .'/'. segment(2);?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
       
                <div class="form-group">
                  <label for="formGroupExampleInput">Select Photos</label>
                  <input type="file" name="images[]" multiple class="class="form-control form-control-lg" />  
                </div>  
       
                <div class="form-group">
                 <input type="submit" id="send_form" class="btn btn-outline-danger" name="add-images" value="Add Photos"/>
                </div>
                <small id="emailHelp" class="form-text text-muted">Upload images less than 10MB. Accepted image extensions jpg and png only!</small>
              </form>
            </div>
          </div> 
        </div>
       
           <?php if(is_array($propertyImages)) : ?>
           
             <hr>
             
             <div class="row" id="my-list">
                 <?php $i = 1;foreach($propertyImages as $img) : ?>
            
                <div class="card shadow " style="width:200px">
                  <img class="card-img-top imgp" src="<?php echo  base_url(). '/property-images/' . $img['image_name'];?>" alt="Card image cap" />
                  <a href="#" data-img="<?php echo  base_url(). '/property-images/' . $img['image_name'];?>" class="stretched-link propertyImgModalBtn2"></a>
                </div>

          
             <?php $i++;endforeach ?>

               <div class="card shadow text-center" style="width:200px">
                  <div class="card-body">
                    <a href="#" class="stretched-link" id="propertyImgModalBtn">See All</a>
                  </div>
                </div>
             </div>
            
         <?php endif ?>
        

    </div>
  </div>

</main>


<?php if(is_array($propertyImages)) : ?>

<div class="modal fade" id="propertyImgModalView">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-body">
               <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                  <?php $k = 1;foreach($propertyImages as $img2) : ?>
                  <div class="carousel-item <?php echo ($k==1) ? 'active':'';?>">
                    <img src="<?php echo base_url(). '/property-images/' . $img2['image_name'];?>" class="d-block w-100 imgpl" alt="...">
                  </div>
                  <?php $k++;endforeach ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
      </div>
    </div>
  </div>
</div>

<?php endif ?>

<div class="modal fade" id="propertyImgModalView2">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-body">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="" class="d-block w-100 imgpl propertyImgModalSrc" alt="...">
                </div>
              </div>
            </div>    
        </div>
    </div>
  </div>
</div>



<div class="container">
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        <img class="mb-2" src="<?= publicFolder();?>/images/propertyraja.png" alt="" width="150">
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