<?= $this->extend('backend/common/layout') ?> 
<?= $this->section('content') ?>   
<style type="text/css">
  .cancelBadge{
    margin: 5px 5px 0 -30px;
    position: absolute;
  } 
</style>

<div class="container-fluid">
<br>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url();?>/backend/dashboard/index">Home</a></li> 
        <li class="breadcrumb-item"><a href="<?= base_url().'/backend/'.segment(2);?>/index"><?= ucfirst(segment(2));?></a></li> 
      </ol>
    </nav>
    <br>  

   <div class="row"> 
    <?= $this->include('backend/common/sidebar');?> 
    <div class="col-md-9">


        <?php if(@$section == "editProperty") { ?>
           <h3>Edit Property</h3>
           <div class="table-responsive">
           <table class="table small">
              <tbody>
                <tr>
                    <th scope="row">Pictures</th>
                    <td> 
                      <?php foreach($propertyDetail['images'] as $img) : ?> 
                        <a href="javascript:void(0)" class="text-decoration-none" data-image-id="<?= $img['id'];?>" data-image-file="<?= $img['image_name'];?>">  
                          <img src="<?= publicFolder() .'/property-images/'.$img['image_name'];?>" class="rounded" style="width:200px;height:150px"/> 
                          <img src="<?= publicFolder() .'/images/cancel-1.png';?>" class="cancelBadge" style="width:25px;" data-toggle="tooltip" data-placement="bottom" title="Delete this image"/>
                        </a> 
                      <?php endforeach ?>  
                    </td>
                 </tr> 
               <?php if(in_array('title',$propertyTypeMap)) : ?> 
                 <tr>
                    <th scope="row">Title</th>
                    <td><input type="text" name="title" class="form-control" /></td>
                 </tr>
               <?php endif ?> 

                <?php if(in_array('description',$propertyTypeMap)) : ?> 
                  <tr>
                    <th scope="row">Description</th>
                    <td><textarea type="text" name="description" class="form-control" ></textarea></td>
                 </tr>
                 <?php endif ?> 
                 
                 <?php if(in_array('about',$propertyTypeMap)) : ?> 
                 <tr>
                    <th scope="row">About</th>
                    <td><textarea type="text" name="about" class="form-control" ></textarea></td>
                 </tr>
                 <?php endif ?>

                 <?php if(in_array('specification',$propertyTypeMap)) : ?> 
                 <tr>
                    <th scope="row">Specification</th>
                    <td><textarea type="text" name="specification" class="form-control" ></textarea></td>
                 </tr>
                 <?php endif ?>
                 

                 <?php if(in_array('listing_type',$propertyTypeMap)) : ?>
                 <tr>
                    <th scope="row">Types</th>
                    <td>
                      <label>Listing Type</label>
                       <select>
                         <option value="sell">Sell</option>
                         <option value="rent">Rent</option>
                       </select> | 
                       <label>Property Type</label>
                       <select name="property_type" id="property_type" required > 
                              <option selected="true" disabled="disabled" value="">Select property type</option>
                             <?php foreach ($property_type as $ptype) : ?>
                              <option value="<?= $ptype['id'];?>" > 
                                    <?= $ptype['type_name'];?>    
                              </option>
                            <?php endforeach ?>
                        </select> | 
                       <label>Complex Type</label>
                       <select>
                         <option value="gated">Gated</option>
                         <option value="standalone">Standalone</option>
                       </select> | 
                        <label>BHK Type</label>
                       <select name="bhk_type" id="bhk_type" required >
                            <option selected="true" disabled="disabled" value="">Select BHK</option>
                            <option value="studio">Studio</option>
                            <option value="1bhk">1 BHK</option>   
                            <option value="2bhk">2 BHK</option>  
                            <option value="3bhk">3 BHK</option>  
                            <option value="4bhk">4 BHK</option>  
                            <option value="+5bhk">5+ BHK</option>     
                      </select>
                    </td>
                 </tr>
                 <?php endif ?>


                 <?php if(in_array('city',$propertyTypeMap)) : ?> 
                 <tr>
                    <th scope="row">Location</th>
                    <td>
                        <select name="city" id="city" required="">
                           <?php foreach($cities as $cy) : ?> 
                           <option value="<?= $cy['id'];?>" <?= ($cy['id']==$profile['city']) ? "selected" : "" ;?>><?= $cy['city_name'];?></option>
                         <?php endforeach ?> 
                       </select> 
                    </td>
                 </tr>
                 <?php endif ?>

              </tbody>
           </table>
           </div>

        <?php }elseif(@$section == "viewProperty"){ ?>  



          <div class="container">
        <h3 class="display-4" style="font-size: 30px"> 
          <a href="<?= base_url().'/';?>"><img src="<?= publicFolder();?>/images/back.png" width="50"/></a> 
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
                      <b class="mt-0">Verified <?php echo ucfirst($propertyDetail['contact']['role']);?>
                         <img src="<?= publicFolder();?>/images/verified-blue.png" class="mr-3" alt="..." width="25">
                      </b>
                    <?php endif ?>
                    
                    <?php if($propertyDetail['contact']['role'] != "customer") : ?>
                      <h5>
                        Rating <img src="<?= publicFolder();?>/images/star.png" width="20">
                        <img src="<?= publicFolder();?>/images/star.png" width="20" >
                        <img src="<?= publicFolder();?>/images/star.png" width="20">
                        <img src="<?= publicFolder();?>/images/star.png" width="20">
                        <img src="<?= publicFolder();?>/images/star-empty.png" width="20">
                      </h5>
                    <?php endif ?>
                    
                    <?php if($propertyDetail['contact']['user_id'] != cUserId()) : ?>
                      <a href="javascript:void(0)" class="btn btn-danger">
                         <img src="<?= publicFolder();?>/images/contact-phone2.png" class="mr-3" alt="..." width="25">
                         Contact <?php echo ucfirst($propertyDetail['contact']['role']);?> 
                      </a>
                  

                   <?php endif ?>

                      <br>
                      <?php if($propertyDetail['contact']['role'] != "customer") : ?>
                        <b>3 Reviews | 6 Recent Sales</b>
                      <?php endif ?>
                    </div>
                  </div>
              </div>
          
         </div>
     <?php endif ?>
    </div>
          


        
      


        <?php }else{ ?>

        <h3 class="display-4">Properties</h3>
        <div class="table-responsive">
          <table class="table small">
              <caption>List of properties</caption>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Images</th>
                  <th scope="col">Property Type</th>
                  <th scope="col">Listing Type</th>
                  <th scope="col">User</th>
                  <th scope="col">Created</th>
                  <th scope="col">Updated</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(is_array($properties)) : ?>
                <?php $i=1;foreach($properties as $r) : ?>
                <tr>
                  <th scope="row"><?= $i;?></th>
                  <td>
                     <a href="<?= base_url();?>/backend/properties/view/<?= $r['id'];?>" class="text-decoration-none text-dark">
                         <?= ucfirst($r['title']);?> 
                     </a>
                  </td>
                  <td>
                       <?php  
                        foreach($r['images'] as $tg)
                        { 
                           $tgd[] = $tg['image_name'];
                        }  
                         $implode =  json_encode($tgd,true);
                       ?>     
                       <a href="javascript:void(0)" class="imagesS" data-images='<?= $implode;?>'>  
                          <?php foreach($r['images'] as $key => $img) : ?>
                             <?php if($key < 3) : ?>
                             <img src="<?= base_url().'/property-images/'.$img['image_name'];?>" alt="..." class="rounded-circle" width="50" height="50" style="margin-left:-30px;border:2px solid #fff" />
                             <?php endif ?>
                          <?php endforeach ?>  
                       </a>
                       <?= (count($r['images']) > 0) ? "<label class='badge badge-success' style='margin-left:-30px'>".count($r['images'])." images</label>" : "<label class='badge badge-success' style='margin-left:-30px'>".count($r['images'])." image</label>";?>
                  </td>
                  <td><?= ucfirst($r['propertyType']['type_name']);?></td>
                  <td><?= ucfirst($r['listing_type']);?></td>
                  <td><?= ucfirst($r['contact']['firstname']." ".$r['contact']['lastname']);?></td>
                  <td><?= date('F j, Y',strtotime($r['created_at']));?></td>
                  <td><?= date('F j, Y',strtotime($r['updated_at']));?></td>
                  <td>
                      <label class="badge badge-<?= $r['statusName']['status_badge'];?>">
                        <?= ucfirst($r['statusName']['status_name']);?>
                      </label> 
                  </td>  
                  <td>
                    <a href="<?= base_url();?>/backend/properties/edit/<?= $r['id'];?>"><img src="<?= publicFolder();?>/images/edit.png"  width="20"/></a> |  
                    <a href="javascript:void(0)" data-confirmedUrl="<?= base_url();?>/backend/properties/delete/<?= $r['id'];?>" class="deletePop">
                      <img src="<?= publicFolder();?>/images/delete.png" width="20"/> 
                    </a> 
                  </td> 
                </tr>
               <?php $i++;unset($tgd);endforeach ?>
               <?php endif ?>
              </tbody>
          </table>
        </div>

        <?php } ?>   
        

    </div>
  </div> 





</div>

<div class="modal propertyImagesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-body">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner propertyImagesShow"></div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
          </div>
      </div>
    </div>
  </div>
</div>


<?= modalPopup("Confirmation","Do you want to delete this property ?");?> 

<?= $this->endSection() ?>