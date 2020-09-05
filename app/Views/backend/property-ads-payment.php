<?= $this->extend('backend/common/layout') ?> 
<?= $this->section('content') ?>   


<div class="container-fluid">
<br>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url();?>/backend/dashboard/index">Home</a></li> 
      <li class="breadcrumb-item"><a href="<?= base_url().'/backend/'.segment(2);?>/index"><?= ucfirst(segment(2));?></a></li>
      </ol>
    </nav> 
    <br>  

    
    <div class="row">
    <?= $this->include('backend/common/sidebar');?> 
    <div class="col-md-9">
        
        <?php if($section == "add") { ?>
        
        <h3 class="display-4">Add Setting </h3>
        <?= \Config\Services::session()->getFlashdata('alert');?>
        <div class="table-responsive">
          <?= form_open('/backend/settings/add') ?>
          <table class="table">
              <tbody>
                
                <tr>  
                  <td>Setting Name</td>
                  <td><input type="text" name="setting_name" class="form-control" placeholder="Setting Name" required/></td>    
                </tr>
                <tr> 
                  <td>JSON</td>
                  <td><textarea class="form-control" name="setting_json" placeholder="Setting JSON" required></textarea></td>
                </tr>
                <tr> 
                  <td></td>
                  <td><input type="submit" name="setting_submit" class="btn btn-primary btn-sm" value="Add Setting" /></td>
                </tr>

              </tbody>
          </table>
          <?= form_close() ?>
        </div>

        <?php }elseif($section == "edit"){ ?>
          
        <h3 class="display-4">Update Setting </h3>
        <?= \Config\Services::session()->getFlashdata('alert');?>
        <div class="table-responsive">
          <?= form_open('/backend/settings/edit/'.segment(4)) ?>
          <?php foreach($settings as $s){} ?>
          <table class="table">
              <tbody>
                <tr>  
                  <td>Setting Name</td>
                  <td><input type="text" name="setting_name" class="form-control" placeholder="Setting Name" value="<?= $s['setting_name'];?>" required/></td>    
                </tr>
                <tr> 
                  <td>JSON</td>
                  <td><textarea class="form-control" name="setting_json" placeholder="Setting JSON" required>
                    <?= removeSpace($s['setting_json']);?>
                    </textarea></td>
                </tr>
                 <tr> 
                  <td>Status</td>
                  <td>
                    <select name="status" class="form-control"> 
                       <?php foreach(statusList() as $status) : ?>  
                          <option value="<?= $status['id']?>" <?= ($status['id']==$s['status']) ? "active" : "";?>>
                            <?= $status['status_name']?>
                          </option>
                       <?php endforeach ?>
                    </select>
                  </td>
                </tr>
                <tr> 
                  <td></td>
                  <td><input type="submit" name="setting_submit" class="btn btn-primary btn-sm" value="Update Setting" /></td>
                </tr>
              </tbody>
          </table>
          <?= form_close() ?>
        </div>

        <?php }else{ ?>  
           

        <h3 class="display-4">Ads Payments <a href="<?= base_url();?>/backend/payment/adsPayments/add" class="btn btn-danger btn-sm float-right">Add New Payment</a></h3>
        <?= \Config\Services::session()->getFlashdata('alert');?>
        <div class="table-responsive">
          <table class="table small">
              <caption>Property Ads Payments</caption>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Property</th> 
                  <th scope="col">Ads Type</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Start Ad</th>
                  <th scope="col">End Ad</th>
                  <th scope="col">Created/Updated</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Property</th> 
                  <th scope="col">Ads Type</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Start Ad</th>
                  <th scope="col">End Ad</th>
                  <th scope="col">Created/Updated</th>
                  <th scope="col">Status</th>
                </tr>
              </tbody> 
          </table>
        </div>

        <?php } ?>
        


    </div>
  </div>



</div>


<?= modalPopup("Confirmation","Do you want to delete this setting ?");?> 
<?= $this->endSection() ?>