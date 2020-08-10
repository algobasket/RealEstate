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
        <?php if(@$section == NULL) : ?>
        <h3 class="display-4">Tickets <?= anchor('/backend/tickets/create/',' + Create Ticket','class="btn btn-danger btn-sm float-right"');?></h3>
        <?= \Config\Services::session()->getFlashdata('alert');?>
        <div class="table-responsive"> 
          <table class="table">
              <caption>List of tickets </caption>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">User</th>
                  <th scope="col">Title</th>
                  <th scope="col">Subject</th>
                  <th scope="col">Description</th>
                  <th scope="col">Created By</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Updated At</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(@$tickets) : ?>
                <?php $i=1;foreach(@$tickets as $ticket) : ?>  
                <tr>
                  <th scope="row"><?= $i;?></th> 
                  <td><?= $ticket['user_id'];?></td> 
                  <td><?= $ticket['title'];?></td>
                  <td><?= $ticket['subject'];?></td>
                  <td><?= $ticket['description'];?></td>
                  <td><?= $ticket['created_at'];?></td>
                  <td><?= $ticket['updated_at'];?></td>
                  <td><label class="<?= statusLabel($ticket['status'])['status_badge'];?>"><?= statusLabel($ticket['status'])['status_name'];?></label></td>
                  <td>
                     <a href="<?= base_url();?>/backend/tickets/edit/<?= $ticket['id'];?>"><img src="<?= publicFolder();?>/images/edit.png" width="20"></a> | 
                     <a href="javascript:void(0)" data-confirmedurl="<?= base_url();?>/backend/tickets/delete/<?= $ticket['id'];?>" class="deletePop">
                      <img src="<?= publicFolder();?>/images/delete.png" width="20">
                    </a>   
                  </td>
                </tr> 
                <?php $i++;endforeach ?>
                 <?php endif ?>
              </tbody>
          </table>
        </div>
       <?php endif ?>

      
      <?php if(@$section == 'create') : ?>
        <h3 class="display-4">Create Ticket <?= anchor('/backend/tickets/index/','See All Tickets > ','class="btn btn-danger btn-sm float-right"');?></h3>
        <?= \Config\Services::session()->getFlashdata('alert');?>
        <div class="table-responsive"> 
          <?= form_open('/backend/tickets/create');?>
          <table class="table">
              <caption>Create Ticket </caption>
              <tbody>
                <tr>
                  <th>User</th> 
                  <td>
                   <input type="text" name="title" class="form-control" placeholder="Search by name, email and phone number" id="searchUser" required />
                   <div class="listUser shadow" style="position:absolute;width:500px;background-color:white"></div>
                  </td>
                </tr>
                <tr>
                  <th>Title</th> 
                  <td><input type="text" name="title" class="form-control" placeholder="Title" required/></td>
                </tr>
                <tr>
                  <th>Subject</th> 
                  <td>
                     <select class="form-control" name="subject">
                       <option value="Account Issue">Account Issue</option>
                       <option value="Login Issue">Login Issue</option>
                       <option value="Advertisement Issue">Advertisement Issue</option>
                       <option value="Payment Issue">Payment Issue</option>
                       <option value="Other Issue">Other Issue</option>
                    </select>
                  </td>
                </tr> 
                <tr>
                  <th>Description</th> 
                  <td><textarea name="description" class="form-control" placeholder="Description" required></textarea></td>
                </tr>
                <tr>
                  <th>Status</th> 
                  <td>
                    <select name="status" class="btn">
                       <?php foreach(statusList() as $s) : ?>
                          <option value="<?= $s['id'];?>"><?= $s['status_name'];?></option>
                       <?php endforeach ?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th><input type="hidden" name="searchedInputid" value="" id="searchedInputid"/></th> 
                  <td>
                    <input type="submit" name="create" value=" + Create Ticket" class="btn btn-danger btn-sm" />
                  </td>
                </tr>       
              </tbody>
          </table>
          <?= form_close() ;?>
        </div>
       <?php endif ?>






    </div>
  </div>



</div>


<?= modalPopup("Confirmation","Do you want to delete this ticket ?");?>
<?= $this->endSection() ?>