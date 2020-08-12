<?= $this->extend('backend/common/layout') ?> 
<?= $this->section('content') ?>   


<div class="container-fluid">
<br>
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url();?>/backend/dashboard/index">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= base_url();?>">Agent</a></li>  
      <li class="breadcrumb-item"><a href="<?= base_url();?>">Edit</a></li>   
    </ol> 
    </nav>
    <br>  

    
    <div class="row">
    <?= $this->include('backend/common/sidebar');?> 
    <div class="col-md-9">
       
       <?php if($section =="profile"){ ?>
         <?php //print_r($profile);?> 
        <h3 class="display-4" style="margin-left:100px">Agent Profile</h3>
        <div class="container-fluid emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="profile-img">
                            <img src="<?= publicFolder();?>/user-images/agent-1.jpeg" class="rounded-circle"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5 class="display-4">
                                        <?= ucfirst($profile['firstname']);?> <?= ucfirst($profile['lastname']);?>
                                    </h5>
                                    <h6>
                                        PropertyRaja Premier Agent
                                    </h6>
                                    <h6>
                                      Ratings :
                                      <img src="http://localhost:8080/images/star.png" width="20">
                                      <img src="http://localhost:8080/images/star.png" width="20">
                                      <img src="http://localhost:8080/images/star.png" width="20">
                                      <img src="http://localhost:8080/images/star.png" width="20">
                                      <img src="http://localhost:8080/images/star-empty.png" width="20"> 
                                      <span>4/5</span>
                                    </h6>
                                    <h6>Reviews : <span>0</span></h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="<?= base_url();?>/backend/user/agents/edit/10" class="profile-edit-btn" name="btnAddMore">Edit Profile</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>SERVICE AREA</p>
                            <?php foreach(json_decode($profile['service_area']) as $r) : ?>
                              <a href="<?= base_url();?>/browse?q=<?= $r;?>" target="__self"><?= $r;?></a><br/>
                            <?php endforeach ?>
                            <p>WEBSITE</p> 
                            <a href="<?= $profile['website'];?>" target="__self">
                              <?php 
                              $explode = explode('//',$profile['website']);
                              echo $explode[1];
                              ?>
                              </a>
                              <br/>
          
                            <p>SOCIAL MEDIA</p>                           
                            <a href="<?= $profile['facebook'];?>" target="__self">Facebook</a><br/>
                            <a href="<?= $profile['linkedin'];?>" target="__self">LinkedIn</a><br/>
                            <a href="<?= $profile['twitter'];?>" target="__self">Twitter</a><br/> 
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>UserID</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['username'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= ucfirst($profile['firstname']);?> <?= ucfirst($profile['lastname']);?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['email'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['mobile'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Specialities</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['specialities'];?></p>  
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['experience'];?></p>
                                            </div>
                                        </div>
                                        <?php if($profile['hourly_rate']) : ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['hourly_rate'];?> INR/hr</p> 
                                            </div>
                                        </div>
                                        <?php endif ?>
                                        <?php if($profile['fixed_rate']) : ?>
                                        <div class="row"> 
                                            <div class="col-md-6">
                                                <label>Fixed Rate</label> 
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['fixed_rate'];?>INR</p>
                                            </div>
                                        </div>
                                        <?php endif ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Sales</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $total_sold;?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['english_level'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>RE License No</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $profile['re_license_no'];?></p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p><small><?= $profile['description'];?></small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

       <?php }elseif($section =="edit"){ ?>
         
         <h3 class="display-4">Edit Agent</h3>
         <div class="table-responsive">
         
        </div>

       <?php }else{ ?>
        

        <h3 class="display-4">Agents</h3>
        <div class="table-responsive">
          <table class="table small">
              <caption>List of agents</caption>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Photo</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Reviews</th>
                  <th scope="col">Sales</th>
                  <th scope="col">Rating</th>
                  <th scope="col">Joined</th>
                  <th scope="col">Updated</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               <?php if(is_array($agents)) : ?>
                <?php $i = 1;foreach($agents as$agent) : ?>
                <tr>
                  <th scope="row"><?= $i;?></th>
                  <td><img src="<?= $agent['profile_pic'] ? $agent['profile_pic'] : base_url().'/images/agent-b.png';?>" /></td>
                  <td><?= $agent['firstname'].' '.$agent['lastname'];?></td>
                  <td><?= $agent['email'];?></td>
                  <td><?= $agent['mobile'];?></td>
                  <td>Review</td>
                  <td>Sales</td>
                  <td>Rating</td>
                  <td><?= date('D, d M Y', strtotime($agent['created_at']));?></td>
                  <td><?= date('D, d M Y', strtotime($agent['updated_at']));?></td>
                  <td><label class="<?= $agent['status_badge'];?>"><?= $agent['status_name'];?></label></td>
                  <td>
                     <a href="<?= base_url();?>/backend/user/agents/profile/<?= $agent['user_id'];?>">
                      <img src="<?= publicFolder();?>/images/view.png"  width="20"/>
                     </a>  |
                     <a href="<?= base_url();?>/backend/user/agents/edit/<?= $agent['id'];?>">
                      <img src="<?= publicFolder();?>/images/edit.png"  width="20"/> 
                    </a>  |   
                    <a href="javascript:void(0)" data-confirmedUrl="<?= base_url();?>/backend/user/agents/delete/<?= $agent['id'];?>" class="deletePop" />  
                      <img src="<?= publicFolder();?>/images/delete.png" width="20"/>
                    </a> 
                  </td>
                </tr>
               <?php $i++;endforeach ?>
               <?php endif ?>
              </tbody>
          </table>
        </div>

       <?php } ?>

       

    </div>
  </div>
</div>


<?= modalPopup("Confirmation","Do you want to delete this agent ?");?> 
<?= $this->endSection() ?>