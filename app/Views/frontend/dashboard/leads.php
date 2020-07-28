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
                <h1 class="display-4">Leads <b class="text-muted float-right" style="font-size: 20px;margin-top:20px">Showing 06 Result . Active</b> </h1> 
                
                
                <div class="table-responsive">
                 <table class="table table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">NAME</th>
                          <th scope="col"></th>
                          <th scope="col">PROPERTY</th>
                          <th scope="col">APPOINTMENT TYPE</th>
                          <th scope="col">APPOINTMENT DATE</th>
                          <th scope="col">INTERESTED ON</th>
                          <th scope="col">STATUS</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                     
                    
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