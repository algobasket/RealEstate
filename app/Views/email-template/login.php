<?= $this->extend('common/layout') ?>
<?= $this->section('content') ?>

<header> 
  <div class="navbar navbar-light bg-light shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="<?= base_url();?>" class="navbar-brand d-flex align-items-center">
        <img src="<?= base_url();?>/images/propertyraja.png" width="200"/>
      </a>
    </div>
  </div>
</header>  

<main role="main"> 
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row"> 
         <h3 class="display-4" style="font-size:20px;">Welcome back , John Doe<br>
          <hr>
          See latest properties you may be interested in
         </h3> 
         <hr> 
         
      </div>
      <div class="row small">
          <p>
          Operating system:  Windows <br>
          Browser:  Chrome <br>
          IP address: 103.103.52.169 <br>
          Estimated location: Dispur, ASSAM, IN <br>
          <b>If you did this,</b> you can safely disregard this email.<br>
          <b>If you didn't do this,</b> please secure your account.<br>
          Thanks,<br>
          PropertyRaja<br>
          </p>
      </div> 
    </div>
  </div>
</main> 

<?= $this->include('common/footer') ?> 
<?= $this->endSection() ?>