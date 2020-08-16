 
 <ul class="nav nav-tabs card-header-tabs">
    <li class="nav-item"> 
      <a class="nav-link <?= isTabActive("index",2);?>" href="<?= base_url();?>/dashboard/index">Dashboard</a>
    </li> 
     <li class="nav-item">
        <a class="nav-link <?= isTabActive("listings",2);?>" href="<?= base_url();?>/dashboard/listings">
         My Listings <span class="badge badge-danger"><?= tabNotificationCount()['listings'];?></span>
          <span class="sr-only">unread messages</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="btn btn-outline-dark nav-link" href="<?= base_url();?>/browse" target="__blank">
          Properties <span class="badge badge-danger"><?= tabNotificationCount()['properties'];?></span>
          <span class="sr-only">unread messages</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= isTabActive("appointments",2);?>" href="<?= base_url();?>/dashboard/appointments">
         Appointments <span class="badge badge-danger"><?= tabNotificationCount()['appointments'];?></span>
          <span class="sr-only">unread messages</span> 
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?= isTabActive("leads",2);?>" href="<?= base_url();?>/dashboard/leads">
         Leads <span class="badge badge-danger"><?= tabNotificationCount()['leads'];?></span>
          <span class="sr-only">unread messages</span> 
        </a>
    </li>  
    <li class="nav-item">
       <a class="nav-link <?= isTabActive("sales",2);?>" href="<?= base_url();?>/dashboard/sales">
         Sales <span class="badge badge-danger"><?= tabNotificationCount()['sales'];?></span>
          <span class="sr-only">unread messages</span> 
        </a>
    </li>
     <li class="nav-item">
        <a class="nav-link <?= isTabActive("profit_target",2);?>" href="<?= base_url();?>/dashboard/profit_target">
         Profit/Target <span class="badge badge-danger"><?= tabNotificationCount()['profit'];?></span>
          <span class="sr-only">unread messages</span> 
        </a>
    </li>
    <li class="nav-item">
       <a class="nav-link <?= isTabActive("contacts",2);?>" href="<?= base_url();?>/dashboard/contacts">
         Contacts <span class="badge badge-danger"><?= tabNotificationCount()['contacts'];?></span>
          <span class="sr-only">unread messages</span> 
        </a> 
    </li>
    <li class="nav-item">
       <a class="nav-link <?= isTabActive("messages",2);?>" href="<?= base_url();?>/dashboard/messages">
         Messages <span class="badge badge-danger"><?= tabNotificationCount()['messages'];?></span>
          <span class="sr-only">unread messages</span> 
        </a>   
    </li>
    <li class="nav-item">
       <a class="nav-link <?= isTabActive("reviews",2);?>" href="<?= base_url();?>/dashboard/reviews">
         Reviews <span class="badge badge-danger"><?= tabNotificationCount()['reviews'];?></span>
          <span class="sr-only">unread messages</span> 
        </a>   
    </li>
    <li class="nav-item">
       <a class="nav-link <?= isTabActive("credits",2);?>" href="<?= base_url();?>/dashboard/credits">
        Credits <!-- <span class="badge badge-danger">9</span> -->
          <span class="sr-only">unread messages</span> 
        </a>   
    </li>
     <li class="nav-item">
        <a class="nav-link <?= isTabActive("notifications",2);?>" href="<?= base_url();?>/dashboard/notifications">
         Notifications <!-- <span class="badge badge-danger">9</span> -->
          <span class="sr-only">unread messages</span> 
        </a>   
    </li> 
</ul>