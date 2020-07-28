<?= $this->extend('common/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('common/header') ?>


<main role="main"> 
  <div class="album py-5 bg-light">
    <div class="container-fluid"> 
      <h1 class="display-4">Welcome Agent</h1>
     
            <div class="card">
              <div class="card-header"> 
               <?= $this->include('frontend/dashboard/tabs') ?>
              </div>
              <div class="card-body">
                <h1 class="display-4">Dashboard</h1>
                <div class="card-deck">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">#Listings</div>
                    <div class="card-body">
                      <h5 class="display-4 card-title">456</h5>
                    </div>
                  </div>

                   <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">#Sales</div>
                    <div class="card-body">
                      <h5 class="display-4 card-title">456</h5>
                    </div>
                  </div>

                   <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">$ Sales</div>
                    <div class="card-body">
                      <h5 class="display-4 card-title">456</h5>
                    </div>
                  </div>

                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">$ Target</div>
                    <div class="card-body">
                      <h5 class="display-4 card-title">456</h5>
                    </div>
                  </div>

                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">$ (Target Vs Actual)</div>
                    <div class="card-body">
                      <h5 class="display-4 card-title">456</h5>
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