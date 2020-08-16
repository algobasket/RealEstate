<?= $this->extend('common/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('common/header') ?>

<style type="text/css">
  .card-title{
    font-size: 20px;
    font-weight: bold;
  }
</style>
<main role="main"> 
  <div class="album py-5 bg-light">
    <div class="container-fluid"> 
      <h1 class="display-4" style="font-size: 30px">Welcome Agent</h1>
     
            <div class="card">
              <div class="card-header"> 
               <?= $this->include('frontend/dashboard/tabs') ?>
              </div>
              <div class="card-body">
                <h1 class="display-4">Dashboard</h1>
                <div class="card-deck text-center">
                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">#Listings</div>
                    <div class="card-body">
                      <h5 class="display-4 card-title"><?= tabNotificationCount()['listings'];?></h5>
                    </div>
                  </div>

                   <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">#Sales</div> 
                    <div class="card-body">
                      <h5 class="display-4 card-title"><?= tabNotificationCount()['sales'];?></h5>
                    </div>
                  </div>

                   <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Σ(Sales Amount)</div>
                    <div class="card-body">
                      <h5 class="display-4 card-title"><?= number_to_currency($totalSalesAmount, 'INR');?></h5>  
                    </div>
                  </div>

                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Σ(Target Amount)</div> 
                    <div class="card-body">
                      <h5 class="display-4 card-title"><?= number_to_currency($totalTarget, 'INR');?></h5>
                    </div>
                  </div>

                  <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"> Σ(Target Vs Actual)%</div>
                    <div class="card-body">
                      <h5 class="display-4 card-title"><?= ($totalActual/$totalTarget)*100;?>%</h5> 
                    </div>
                  </div>
                </div> 

                <h3 class="display-4" style="font-size: 24px">Calculation</h3>
                <div class="shadow d-flex p-2 bd-highlight">
                   <b>&nbsp;&nbsp;Actual Amount</b> = Σ (Total Price Of All Sales) |
                   <b>&nbsp;&nbsp;Target Amount</b> = Σ (Total Price Of All Listings)
                </div>
                <br>
                <h3 class="display-4" style="font-size: 24px">Stats</h3>


              </div>
            </div>
            <hr>
            
    </div>
  </div> 
</main> 



<?= $this->include('common/footer') ?>
<?= $this->endSection() ?>