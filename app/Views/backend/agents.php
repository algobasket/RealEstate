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
         <?php print_r($profile);?> 
        <h3 class="display-4">Agent Profile</h3>
        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4"> 
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        Kshiti Ghelani
                                    </h5>
                                    <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p>
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
                        <a href="<?= base_url();?>backend/user/agents/edit/10" class="profile-edit-btn" name="btnAddMore">Edit Profile</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti123</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti Ghelani</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>kshitighelani@gmail.com</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>123 456 7890</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
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
                     <a href="<?= base_url();?>/backend/user/agents/profile/<?= $agent['id'];?>">
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