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
        
        <?php if($section == "add"){ ?>



        <?php }elseif($section == "edit"){ ?>

              <h3 class="display-4">Lead Edit</h3>
                <?= \Config\Services::session()->getFlashdata('alert');?>
                 <div class="table-responsive">
                  <?= form_open('/backend/user/leads/edit/'.segment(5)); ?>
                  <table class="table small">
                      <caption>Edit Lead</caption>
                      <thead>
                      <tbody>
                        <?php if(is_array($lead)) : ?>
                        <tr>
                          <td>Lead</td>
                          <td><input type="text" class="form-control" name="type_name" value="<?= $lead['firstname'];?>" required/></td>
                        </tr>
                        <tr>  
                          <td>Created</td>
                          <td><?= date('F j,Y',strtotime($lead['created_at']));?></td>
                        </tr>
                        <tr>  
                          <td>Updated</td>
                          <td><?= date('F j,Y',strtotime($lead['updated_at']));?></td>
                        </tr> 
                        <tr>  
                          <td>Status</td>
                          <td>
                            <select name="status" class="form-control">
                              <?php foreach($allStatus as $status) : ?>
                                 <option value="<?= $status['id'];?>" <?php echo ($status['id'] == $lead['status']) ? "selected" : "";?>>
                                    <?= $status['status_name'];?>
                                  </option> 
                              <?php endforeach ?> 
                            </select>
                          </td>
                        </tr> 
                        <tr> 
                          <td colspan="2">  
                            <input type="submit" name="editPropertyType" value="Save Edit" class="btn btn-primary" />
                            <a href="<?= base_url();?>/backend/properties/propertyTypes/" class="btn btn-danger"/>  
                              Cancel
                            </a>
                          </td> 
                        </tr>
                      <?php endif ?>
                      </tbody>
                  </table>
                  <?= form_close();?>    
                </div>


           <?php }else{ ?>   

               <h3 class="display-4">Leads</h3>
                  <div class="table-responsive">
                    <table class="table small">
                        <caption>List of Leads</caption>
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Lead Name</th>
                            <th scope="col">Property</th>
                            <th scope="col">Source</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1;foreach($getLeads as $lead) : ?>
                          <tr>
                            <th scope="row"><?= $i;?></th>
                            <td><?= $lead['firstname'].' '.$lead['lastname'];?></td>
                            <td>
                              <a href="<?= base_url();?>/backend/properties/view/<?= $lead['property_id'];?>" class="text-decoration-none text-dark">
                                <?= word_limiter($lead['title'],10);?>.. 
                              </a>
                            </td>
                            <td><?= $lead['source_name'];?></td>
                            <td><?= date('F j,Y',strtotime($lead['created_at']));?></td>
                            <td><?= date('F j,Y',strtotime($lead['updated_at']));?></td>
                            <td><label class="<?= $lead['status_badge'];?>"><?= $lead['status_name'];?></label></td>
                            <td>
                                <a href="<?= base_url();?>/backend/user/leads/edit/<?= $lead['id'];?>">
                                   <img src="<?= publicFolder();?>/images/edit.png"  width="20"/>
                                </a> |  
                                <a href="javascript:void(0)" data-confirmedUrl="<?= base_url();?>/backend/user/leads/delete/<?= $lead['id'];?>" class="deletePop" />  
                                  <img src="<?= publicFolder();?>/images/delete.png" width="20"/> 
                                </a>
                            </td>
                          </tr>
                        <?php $i++;endforeach ?>
                        </tbody>
                    </table>
                  </div>

            <?php } ?>

       

    </div>
  </div> 




</div>



<?= $this->endSection() ?>