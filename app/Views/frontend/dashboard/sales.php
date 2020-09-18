<?= $this->extend('common/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('common/header') ?>



<main role="main"> 
  <div class="album py-5 bg-light">
     <div class="container<?= \Config\Services::session()->get('fluid') ? '-fluid' : '';?>"> 
          
            <h1 class="display-4" style="font-size: 30px"> 
            Welcome <?php echo ucfirst(\Config\Services::session()->get('role'));?>
            <?php if(\Config\Services::session()->get('fluid')){ ?>
                <a href="<?= base_url();?>/dashboard/removeFluid" class="text-decoration-none text-dark float-right">
                  <i class="fas fa-compress-arrows-alt" style="font-size: 15px"></i>
                </a>
            <?php }else{ ?>
                <a href="<?= base_url();?>/dashboard/applyFluid" class="text-decoration-none text-dark float-right">
                  <i class="fas fa-expand-arrows-alt" style="font-size: 15px"></i>
                </a> 
            <?php } ?>  
            </h1>

            <div class="card">  
              <div class="card-header"><?= $this->include('frontend/dashboard/tabs') ?></div>
              <div class="card-body">
                
                 <h3 class="display-4">Sales</h3>
                  <div class="table-responsive">
                    <table class="table table-hover small">
                        <caption>List of Sales</caption>
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th> 
                            <th scope="col">Property</th>
                            <th scope="col">Buyer</th> 
                            <th scope="col">Sale Date</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead> 
                        <tbody>
                          <?php $i = 1;foreach($sales as $sale) : ?>
                          <tr>
                            <th scope="row"><?= $i;?></th>
                            <td><?= $sale['propertyDetail']['title'];?></td>
                            <td>
                              <?= $sale['firstname'] ? $sale['firstname'] : "No Name";?> <?= $sale['lastname'];?>
                            </td>
                            <td><?= date('F j,Y',strtotime($sale['created_at']));?></td>
                            <td><?= date('F j,Y',strtotime($sale['updated_at']));?></td>
                            <td><label class="<?= $sale['status_badge'];?>"><?= $sale['status_name'];?></label></td>
                            <td>
                                <a href="<?= base_url();?>/backend/user/leads/edit/<?= $sale['id'];?>">
                                   <img src="<?= publicFolder();?>/images/edit.png"  width="20"/>
                                </a> |  
                                <a href="javascript:void(0)" data-confirmedUrl="<?= base_url();?>/backend/user/leads/delete/<?= $sale['id'];?>" class="deletePop" />  
                                  <img src="<?= publicFolder();?>/images/delete.png" width="20"/> 
                                </a>
                            </td>
                          </tr>
                        <?php $i++;endforeach ?>
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