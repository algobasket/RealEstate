<?= $this->extend('common/layout') ?>

<?= $this->section('content') ?>

 <?= $this->include('common/header') ?>

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



<?= $this->include('common/footer') ?> 



<?= $this->endSection() ?>