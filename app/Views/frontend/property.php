<?= $this->extend('common/layout') ?>

<?= $this->section('content') ?>

<?= $this->include('common/header') ?>

<main role="main"> 

  <div class="album py-5 bg-light">
   
    <div class="container">
        <h3 class="display-4" style="font-size: 30px"> 
          <a href="<?= base_url().'/';?>"><img src="<?= base_url();?>/images/back.png" width="50"/></a> 
          Back | Details of Property
        </h3>
       <hr>  
       <?= \Config\Services::session()->getFlashdata('alert');?>    
       <?php if(is_array($propertyDetail)) : ?>
      
       
       <div class="row">
            <?php if($propertyDetail['listing_type'] == "sell") : ?>
                
                     <div class="col-8"><h4><?= displayPrice($propertyDetail['total_price']);?> | <?= $propertyDetail['title'];?></h4></div>

               
           <?php endif ?>
           <?php if($propertyDetail['listing_type'] == "rent") : ?>
                
                     <div class="col-8"><h4><?= displayPrice($propertyDetail['rent_per_mon']);?> | <?= $propertyDetail['title'];?></h4></div>
               
           <?php endif ?>  
                     
                   <div class="col-1">
                      
                      <a href="<?= base_url();?>/property-detail/<?= segment(2);?>/favourite">
                        <?php if($isFavourited == true){ ?> 
                            <img src="<?= base_url();?>/images/star.png" width="25" class="float-right favourite">
                        <?php }else{ ?>
                            <img src="<?= base_url();?>/images/star-empty.png" width="25" class="float-right favourite">
                        <?php } ?>
                      </a>

                    </div>  
                     <div class="col-3">
                       <?php if($isInterested == true){ ?> 
                       
                       <button class="btn btn-danger btn-sm">
                              <img src="<?= base_url();?>/images/contact-phone.png" width="15"/>

                              <b><?php echo $propertyDetail['contact']['mobile'];?></b>
                            </button>
                            <button class="btn btn-outline-danger btn-sm">
                              <b><img src="<?= base_url();?>/images/correct-1.png" width="20"/> Contacted</b>
                            </button>
                        <?php }else{ ?>
                           <a href="<?= base_url();?>/property-detail/<?= segment(2);?>/interested" class="btn btn-outline-danger btn-sm">
                            I'm Interested
                          </a>
                        <?php } ?>  
                     </div>   
       </div>
       <div class="row"> 
          <div id="carouselExampleFade" class="shadow carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
            
              <?php foreach($propertyDetail['images'] as $key => $img) : ?>
                <?php $active = ($key == 1) ? "active": "" ;?> 
                <div class="carousel-item <?= $active;?>"> 
                    <img src="<?= base_url().'/property-images/'.$img['image_name'];?>" class="d-block w-100 img-lg" /> 
                </div>
                <?php endforeach ?>
           
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
        

        <hr> 

        <div class="row">
                <div class="col-md-8"><h3>Property Overview</h3></div>
                <div class="col-md-4">
                    <?php if($propertyDetail['listing_type'] == "sell") : ?>
                        <div class="col-8"><h4><?= displayPrice($propertyDetail['total_price']);?></h4></div>
                     <?php endif ?>
                     <?php if($propertyDetail['listing_type'] == "rent") : ?>
                        <div class="col-8"><h4><?= displayPrice($propertyDetail['rent_per_mon']);?> / Month</h4></div>                         
                     <?php endif ?>
                </div>
        </div>

        <br>


         <div class="row">
             <?php if($propertyDetail['listing_type'] == "sell") : ?>
                
                <div class="col-md-12">
                    <?php if($propertyDetail['bhk_type']) : ?>
                      <div class="d-inline p-2 bg-danger text-white"><?= ucfirst($propertyDetail['bhk_type']);?></div>
                  <?php endif ?>
                   <?php if($propertyDetail['status_type']) : ?>
                      <div class="d-inline p-2 bg-danger text-white"><?= str_replace('_',' ',strtoupper($propertyDetail['status_type']));?></div>
                  <?php endif ?>  
                   <?php if($propertyDetail['condition_type']) : ?>
                      <div class="d-inline p-2 bg-danger text-white"><?= strtoupper($propertyDetail['condition_type']);?></div>
                   <?php endif ?>
                   <?php if($propertyDetail['facing']) : ?>
                      <div class="d-inline p-2 bg-danger text-white"><?= strtoupper($propertyDetail['facing']);?></div>
                   <?php endif ?>
                   <?php if($propertyDetail['complex_type']) : ?>
                      <div class="d-inline p-2 bg-danger text-white"><?= strtoupper($propertyDetail['complex_type']);?></div>
                   <?php endif ?>
                </div>
               
           <?php endif ?>

           <?php if($propertyDetail['listing_type'] == "rent") : ?>
                
                <div class="col-md-12">
                
                  <?php if($propertyDetail['bhk_type']) : ?>
                      <div class="shadow d-inline p-2 bg-danger text-white"><?= strtoupper($propertyDetail['bhk_type']);?></div>
                  <?php endif ?>
                   <?php if($propertyDetail['status_type']) : ?>
                      <div class="shadow d-inline p-2 bg-danger text-white"><?= str_replace('_',' ',strtoupper($propertyDetail['status_type']));?></div>
                  <?php endif ?>  
                   <?php if($propertyDetail['condition_type']) : ?>
                      <div class="shadow d-inline p-2 bg-danger text-white"><?= strtoupper($propertyDetail['condition_type']);?></div>
                   <?php endif ?>
                   <?php if($propertyDetail['facing']) : ?>
                      <div class="shadow d-inline p-2 bg-danger text-white"><?= strtoupper($propertyDetail['facing']);?></div>
                   <?php endif ?>
                   <?php if($propertyDetail['complex_type']) : ?>
                      <div class="shadow d-inline p-2 bg-danger text-white"><?= strtoupper($propertyDetail['complex_type']);?></div>
                   <?php endif ?>
                      
                </div>
               
           <?php endif ?>
             
         </div>



         <br>

         

         <div class="row">
            <div class="col-md-12">
              <h3>Description</h3>
              <div class="text-break font-weight-normal"><?php echo $propertyDetail['description'];?></div>
            </div>
         </div>


         <div class="row">
              <div class="col-md-8">
                <h3>Amenities</h3>
                     <?php foreach($propertyDetail['amenitiesName'] as $am) : ?>
                           <div class="shadow d-inline p-2 bg-danger text-white"><?= $am['name'];?></div>
                     <?php endforeach ?> 
              </div>
               <div class="col-6 col-md-4">
                  Posted On : <?php echo $propertyDetail['created_at'];?>
               </div>
              
         </div>
        
         <br>
         <hr>

         <div class="row">
            <div class="col-md-12">
                <h3>Contact</h3>
                  <div class="shadow media position-relative">
                    <img src="http://localhost:8080/user-images/agent-1.jpeg" class="mr-3" alt="..." width="200">
                    <div class="media-body"><br>
                      <h5 class="mt-0"><?php echo ucfirst($propertyDetail['contact']['firstname']) . ' ' . ucfirst($propertyDetail['contact']['lastname']);?></h5>
                      <?php if($propertyDetail['contact']['is_verified'] == 1) : ?>
                      <b class="mt-0">Verified <?php echo ucfirst($propertyDetail['contact']['role']);?> <img src="http://localhost:8080/images/verified-blue.png" class="mr-3" alt="..." width="25"></b>
                    <?php endif ?>
                      <h5>
                        Rating <img src="http://localhost:8080/images/star.png" width="20">
                        <img src="http://localhost:8080/images/star.png" width="20" >
                        <img src="http://localhost:8080/images/star.png" width="20">
                        <img src="http://localhost:8080/images/star.png" width="20">
                        <img src="http://localhost:8080/images/star-empty.png" width="20">
                      </h5>
                      <a href="javascript:void(0)" class="btn btn-danger">
                         <img src="http://localhost:8080/images/contact-phone2.png" class="mr-3" alt="..." width="25">Contact Agent 
                      </a>
                      <br>
                      <b>3 Reviews | 6 Recent Sales</b>
                    </div>
                  </div>
              </div>
          
         </div>




     
     <?php endif ?>

    </div>
  </div>

</main> 




<?= $this->include('common/footer') ?>


<?= $this->endSection() ?>