
<?= $this->extend('common/layout') ?>

<?= $this->section('content') ?>

<?= $this->include('common/header') ?> 

<main role="main">
    <div class="container">
        <h4 class="display-4" style="margin-top: 100px">Find Your Agent</h4>
        <hr> 
        <h4>
          Location Detected - <img src="<?= publicFolder();?>/images/location5.png" width="35"  /> 
          <?php currentLocation()['city'];?>,<?php currentLocation()['state'];?>,<?php currentLocation()['country'];?>.
        </h4>
        <div class="row">
          
          <?php if(is_array($agents)){ ?> 
              
              <?php foreach($agents as $agent){ ?>
                  <div class="card mb-3" style="width: 540px;margin: 10px">
                    <div class="row no-gutters">
                      <div class="col-md-4">
                        <img src="<?= publicFolder();?>/user-images/thumbnails/<?= $agent['profile_pic'];?>" class="card-img" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <b class="card-title" style="font-size:x-large"><?= $agent['firstname'];?> <?= $agent['lastname'];?></b>
                          <p class="card-text"> 
                                <img src="<?= publicFolder();?>/images/star.png" width="20">
                                <img src="<?= publicFolder();?>/images/star.png" width="20" >
                                <img src="<?= publicFolder();?>/images/star.png" width="20">
                                <img src="<?= publicFolder();?>/images/star.png" width="20">
                                <img src="<?= publicFolder();?>/images/star-empty.png" width="20">
                                (123)                            
                          </p> 
                          <p class="card-text">
                            <img src="<?= publicFolder();?>/images/contact-phone.png" width="17"/> <?= $agent['mobile'];?>
                          </p> 
                          <p class="card-text"><small class="text-muted">Last Seen - 4 Days Ago</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
              <?php  } ?>

          <?php }else{ ?>
               
          <?php } ?>

         
        
        
        </div>




        <p class="font-weight-light" style="font-size: 20px;">
          Loading Agents ..
          <div class="spinner-border text-danger" role="status">
            <span class="sr-only">Loading ...</span>
          </div>
       </p>
        
        
   </div>
</main>


<?= $this->include('common/footer') ?>
<?= $this->endSection() ?>