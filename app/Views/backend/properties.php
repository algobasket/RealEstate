<?= $this->extend('backend/common/layout') ?> 
<?= $this->section('content') ?>   


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
                    <th scope="row">Title</th>
                    <td><input type="text" name="title" class="form-control" /></td>
                 </tr>
                  <tr>
                    <th scope="row">Description</th>
                    <td><textarea type="text" name="description" class="form-control" ></textarea></td>
                 </tr>
                 <tr>
                    <th scope="row">About</th>
                    <td><textarea type="text" name="about" class="form-control" ></textarea></td>
                 </tr>
                 <tr>
                    <th scope="row">Specification</th>
                    <td><textarea type="text" name="specification" class="form-control" ></textarea></td>
                 </tr>
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
              </tbody>
           </table>
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
                  <td><?= ucfirst($r['title']);?></td>
                  <td>
                       <?php  
                       foreach($r['images'] as $tg){ 
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
                    <a href="<?= base_url();?>/backend/properties/edit/<?= $r['id'];?>"><img src="<?= base_url();?>/images/edit.png"  width="20"/></a> |  
                    <a href="javascript:void(0)" data-confirmedUrl="<?= base_url();?>/backend/properties/delete/<?= $r['id'];?>" class="deletePop">
                      <img src="<?= base_url();?>/images/delete.png" width="20"/> 
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