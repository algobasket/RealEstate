<?= $this->extend('backend/common/layout') ?> 
<?= $this->section('content') ?>   


<div class="container-fluid">
<br>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="https:/">Home</a></li>
      <li class="breadcrumb-item"><a href="https:/browse-course">Browse</a></li>
      </ol>
    </nav>
    <br>  

    
    <div class="row">
    <?= $this->include('backend/common/sidebar');?> 
    <div class="col-md-9">
        <h3 class="display-4"><img src="<?= base_url();?>/images/template.png" /> Templates</h3> 
        <hr>
        <div class="card-deck">
          <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-header"><img src="<?= base_url();?>/images/content.png" width="30"/> Page Content</div>
            <div class="card-body text-dark">
              <h5 class="card-title">Frontend Content</h5>
              <p class="card-text"><h3 class="float-left display-4"><img src="<?= base_url();?>/images/content.png" />| 56</h3></p>
              <a href="<?= base_url();?>/backend/templates/index/?t=frontend_content" class="stretched-link"></a>
            </div>
          </div> 
          <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-header"><img src="<?= base_url();?>/images/email.png" width="30"/> Email Templates</div>
            <div class="card-body text-dark">
              <h5 class="card-title">Email Templates</h5>
              <p class="card-text"><h3 class="float-left display-4"><img src="<?= base_url();?>/images/email.png" width="100"/>| 34</h3></p>
              <a href="<?= base_url();?>/backend/templates/index/?t=email_templates" class="stretched-link"></a>
            </div>
          </div>
          <div class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-header"><img src="<?= base_url();?>/images/sms.png" width="30"/> SMS Templates</div>
            <div class="card-body text-dark">
              <h5 class="card-title">SMS Templates</h5>
              <p class="card-text"><h3 class="float-left display-4"><img src="<?= base_url();?>/images/sms.png" width="100"/>| 34</h3></p>
              <a href="<?= base_url();?>/backend/templates/index/?t=sms_templates" class="stretched-link"></a>
            </div>
          </div>  
    </div>
  </div>




</div>



<?= $this->endSection() ?>