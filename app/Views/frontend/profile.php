<?= $this->extend('common/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('common/header') ?>

<main role="main"> 

  <div class="album py-5 bg-light">
   
    <div class="container">
       <h3 class="display-4">Profile Summary <a href="<?= base_url();?>/add-property" class="btn btn-outline-danger float-right"> + Add Property</a></h3>
       <hr>

      <div class="row"> 
        
         <div class="col-md-8 order-md-1">
             <?= \Config\Services::session()->getFlashdata('alert');?>
             <?= form_open('profile') ?>
             <?php //foreach ($profile as $info){} ?>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">First name</label>
                  <input type="text" class="form-control" id="firstName" name="firstname" placeholder="First Name" value="<?= $profile['firstname'] ? $profile['firstname'] : "" ;?>" required=""> 
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Last Name" value="<?= $profile['lastname'] ? $profile['lastname'] : "" ;?>" required="">
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="username">Display Name</label>
                <div class="input-group">
                  <input type="text" class="form-control" id="display_name" name="display_name" placeholder="Display Name" value="<?= $profile['display_name'] ? $profile['display_name'] : "" ;?>" required="">
                  <div class="invalid-feedback" style="width: 100%;">
                    Your username is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="username">Username <span class="text-muted">(Optional)</span></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><?= base_url();?>/@</span>
                  </div>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $profile['username'] ? $profile['username'] : "" ;?>" >
                  <div class="input-group-append">
                    <span class="input-group-text">Check Availability</span>
                  </div>
                  <div class="invalid-feedback" style="width: 100%;">
                    Your username is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="username">Mobile</label>
                <div class="input-group">
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile Number" value="<?= $profile['mobile'] ? $profile['mobile'] : "" ;?>" required="">
                  <div class="invalid-feedback" style="width: 100%;">
                    Your username is required.
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label for="email">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $profile['email'] ? $profile['email'] : "" ;?>" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="mb-3">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address1" value="<?= $profile['address1'] ? $profile['address1'] : "" ;?>" placeholder="1234 Main St" required="">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="mb-3">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" name="address2" value="<?= $profile['address2'] ? $profile['address2'] : "" ;?>" id="address2" placeholder="Apartment or suite">
              </div>

              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="country">Country</label>
                  <select class="custom-select d-block w-100" name="country" id="country" required="">
                      <option value="">Choose...</option>
                    <?php foreach($countries as $c) : ?>
                      <option value="<?= $c['id'];?>" <?= ($c['id']==$profile['country']) ? "selected" : "" ;?> ><?= $c['country_name'];?></option>
                    <?php endforeach ?>  
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid country.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="state">State</label>
                  <select class="custom-select d-block w-100" name="state" id="state" required="">
                    <option value="">Choose...</option>
                    <?php foreach($states as $s) : ?>
                      <option value="<?= $s['id'];?>" <?= ($s['id']==$profile['state']) ? "selected" : "" ;?>><?= $s['state_name'];?></option>
                    <?php endforeach ?> 
                  </select>
                  <div class="invalid-feedback"> 
                    Country name required.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="zip">City</label>
                  <select class="custom-select d-block w-100" name="city" id="city" required="">
                    <option value="">Choose...</option>
                    <?php foreach($cities as $cy) : ?>
                      <option value="<?= $cy['id'];?>" <?= ($cy['id']==$profile['city']) ? "selected" : "" ;?>><?= $cy['city_name'];?></option>
                    <?php endforeach ?> 
                  </select>
                  <div class="invalid-feedback">
                    Country name required.
                  </div>
                </div>
              </div>
             
              <hr class="mb-4">

              <h4 class="mb-3">My Activity</h4>

              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="myActivity" type="radio" class="custom-control-input" <?= ($profile['activity']=="buy_rent") ? "checked" : "";?> required value="buy_rent" />
                  <label class="custom-control-label" for="credit">Searching for Home</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="debit" name="myActivity" type="radio" class="custom-control-input" <?= ($profile['activity']=="sell") ? "checked" : "";?> required value="sell">
                  <label class="custom-control-label" for="debit">Selling Property</label>
                </div>
              </div>
              
              <hr class="mb-4">
                <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="update_profile" value="Update Profile"/> 
            <?= form_close();?>
      </div>
      <div class="col-md-4 order-md-2">
        <h3 class="text-left">Sponsored Ads</h3>  
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277416_960_720.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
          <div class="card" style="width: 18rem;">
            <img src="https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277416_960_720.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
      </div>



  </div>

    </div>
  </div>

</main>




<?= $this->include('common/footer') ?>
<?= $this->endSection() ?>