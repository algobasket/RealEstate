<?= $this->extend('common/layout') ?>
<?= $this->section('content') ?>
<?= $this->include('common/header') ?>



<main role="main"> 
  <div class="album py-5 bg-light">
    <div class="container-fluid"> 
           <h1 class="display-4" style="font-size: 30px">Welcome <?php echo ucfirst(\Config\Services::session()->get('role'));?></h1>

            <div class="card">  
              <div class="card-header"><?= $this->include('frontend/dashboard/tabs') ?></div>
              <div class="card-body">
                

                <?php if($section == "all") : ?>
                <h1 class="display-4">
                Projects 
                 <a href="<?= base_url();?>/dashboard/projects/add" class="btn btn-danger btn-sm float-right"><i class="fas fa-plus"></i> Add Project</a>
               </h1> 
                <?= \Config\Services::session()->getFlashdata('alert');?>
                <div class="table-responsive">
                 <table class="table table-hover">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">PROJECT NAME</th>
                          <th scope="col">PROPERTIES</th>
                          <th scope="col">CREATED</th>
                          <th scope="col">UPDATED</th>
                          <th scope="col">STATUS</th>
                          <th scope="col">ACTION</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($projects as $project) : ?>
                        <tr>
                          <td></td>
                          <td><?= $project['project_name'];?></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      <?php endforeach ?>
                      </tbody>
                </table>
               </div>
              <?php endif ?> 
              

              <?php if($section == "add") : ?>
                 <h1 class="display-4"> Add Project</h1> 
                 <?= \Config\Services::session()->getFlashdata('alert');?>
                <div class="table-responsive">
                  <?= form_open('/dashboard/projects/add');?>
                 <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td>PROJECT NAME</td>
                          <td><input type="text" name="project_name" class="form-control" placeholder="Project Name" required="" /></td>
                        </tr>
                        <tr>
                          <td>STATUS</td>
                          <td>
                            <select name="status" class="form-control">
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                            </select>
                          </td>
                        </tr>
                         <tr>
                          <td></td>
                          <td>
                            <input type="submit" name="addProject" class="btn btn-danger btn-sm" value="Add Project" />
                          </td>
                        </tr>
                      </tbody>
                </table>
                <?= form_close();?>
               </div>
              <?php endif ?> 

              <?php if($section == "edit") : ?>
                <h1 class="display-4"> Edit Project</h1> 
                <?= \Config\Services::session()->getFlashdata('alert');?>
                <div class="table-responsive">
                  <?= form_open('/dashboard/projects/edit/'.segment(4));?>
                  <?php foreach($projects as $project){} ?>
                   <table class="table table-hover">
                      <tbody>
                        <tr>
                          <td>PROJECT NAME</td>
                          <td><input type="text" name="project_name" class="form-control" placeholder="Project Name" value="" required="" /></td>
                        </tr>
                        <tr>
                          <td>STATUS</td>
                          <td>
                            <select name="status" class="form-control">
                              <option value="1">Active</option>
                              <option value="2">Inactive</option>
                            </select>
                          </td>
                        </tr>
                         <tr>
                          <td></td>
                          <td>
                            <input type="submit" name="addProject" class="btn btn-danger btn-sm" value="Add Project" />
                          </td>
                        </tr>
                      </tbody>
                  }
                </table>
                 <?= form_close();?>
               </div>
              <?php endif ?>



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