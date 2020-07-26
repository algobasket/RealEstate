<?= $this->extend('common/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('common/header') ?>



<main role="main"> 
  <div class="album py-5 bg-light">
    <div class="container-fluid"> 
           <h1 class="display-4">Welcome Agent</h1>

            <div class="card"> 
              <div class="card-header"><?= $this->include('frontend/dashboard/tabs') ?></div>
              <div class="card-body">
                <h1 class="display-4">My Listings <b class="text-muted float-right" style="font-size: 20px;margin-top:20px">Showing 06 Result . Active</b> </h1> 
                
                
                <div class="table-responsive">
                 <table class="table table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">PROPERTY</th>
                          <th scope="col">LEADS</th>
                          <th scope="col">STATS</th>
                          <th scope="col">POSTED ON</th>
                          <th scope="col">STATUS</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>

                        <tr>
                          <th scope="row">1</th>
                          <td>
                              <div class="card" style="max-width: 540px;">
                                <div class="row no-gutters">
                                  <div class="col-md-4">
                                    <img src="<?= base_url();?>/images/default.jpg" class="card-img" alt="...">
                                  </div>
                                  <div class="col-md-8">
                                    <div class="card-body">
                                      <h5 class="card-title">5 BHK Luxury Villa</h5>
                                      <p class="card-text text-monospace small">This is a wider card with supporting</p>
                                      <p class="card-text small"><small class="text-muted">Last updated 3 mins ago</small></p>
                                      <a href="" class="stretched-link"></a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        
                          </td>
                          <td>
                            <p>45 till now . 5 hot</p>
                            <img src="<?= base_url();?>/images/default.jpg" alt="..." class="rounded-circle " width="53" height="53" style="margin-left: -25px;border:3px solid #fff">
                            <img src="<?= base_url();?>/images/default.jpg" alt="..." class="rounded-circle " width="53" height="53" style="margin-left: -25px;border:3px solid #fff">
                            <img src="<?= base_url();?>/images/default.jpg" alt="..." class="rounded-circle" width="53" height="53" style="margin-left: -25px;border:3px solid #fff">
                            <img src="<?= base_url();?>/images/default.jpg" alt="..." class="rounded-circle" width="53" height="53" style="margin-left: -25px;border:3px solid #fff">
                            <svg style="margin-left: -25px;border:3px solid #fff" class="bd-placeholder-img rounded-circle text-sm" width="53" height="53" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Completely round image: 75x75"><title>Completely round image</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">56+</text></svg>
                          </td>
                          <td><b>345+06</b><br>Total Views</td>
                          <td>15th March 13:44PM<br>6 days ago</td>
                          <td><h5><span class="badge badge-success">Active</span></h5>Till 14th June</td>
                          <td>
                            <img src="<?= base_url();?>/images/edit.png" data-toggle="tooltip" data-placement="bottom" title="Edit this property"><br> <br>
                            <img src="<?= base_url();?>/images/delete.png" data-toggle="tooltip" data-placement="bottom" title="Delete this property" width="28px">
                          </td>
                        </tr>

                    
                      </tbody>
                </table>
               </div>

              </div>
              <div class="card-footer">
                  <nav aria-label="Page navigation text-center">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
              </div>
            </div>
     
    </div>
  </div>   
</main> 



<?= $this->include('common/footer') ?>
<?= $this->endSection() ?>