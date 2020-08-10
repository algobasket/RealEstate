
 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/style.css" />
    
    <link href="https://getbootstrap.com/docs/4.5/examples/album/album.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.5/assets/css/docs.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

    <title><?= $title ? $title : "Site" ?></title> 
  </head>
  <body> 

 <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container-fluid d-flex justify-content-between">
            <a href="https:/" class="navbar-brand d-flex align-items-center">
              <strong><img src="http://localhost:8080/images/propertyraja.png" width="200"></strong>
            </a>

            <button class="navbar-toggler dropdown-toggle small" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Welcome <?php echo ucfirst(\Config\Services::session()->get('display'));?> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right animate slideIn">
                <span class="dropdown-menu-arrow"></span> 

                <?php if(\Config\Services::session()->get('role') == "admin"){ ?>
                <a class="dropdown-item" href="<?= base_url();?>/backend/dashboard/index">Go To Dashboard</a>
                <a class="dropdown-item" href="<?= base_url();?>/logout">Logout</a>
                <?php } ?> 
        </div>
      </div>
  </header>   

    
  <?= $this->renderSection('content') ?>  

        
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <p >
        Made With <i class="fa fa-heart" style="font-size:20px;color:#af4456;"></i> - Algobasket Production
         <a href="" style="text-decoration:none;color:#aaa;margin-left:10px" class="float-right"><i class="fa fa-facebook-square fa-2x"></i></a>
         <a href="" style="text-decoration:none;color:#aaa;margin-left:10px" class="float-right"><i class="fa fa-twitter-square fa-2x"></i></a>
         <a href="" style="text-decoration:none;color:#aaa" class="float-right"><i class="fa fa-youtube fa-2x"></i></a>
      </p>
    </p>
    <p>PropertyRaja is &copy; Algobasket's product, all right reserved to the owner!</p>
    <p>
     <center>

         <a href="https:/license" style="text-decoration:none;color:#aaa">Licence</a> |
         <a href="https:/subscription" style="text-decoration:none;color:#aaa">Subscription</a> |
         <a href="https:/legal-notice" style="text-decoration:none;color:#aaa">Legal Notice</a> |
         <a href="https:/privacy-policy" style="text-decoration:none;color:#aaa">Privacy Policy</a> |
         <a href="https:/about" style="text-decoration:none;color:#aaa">About</a> |
         <a href="https:/contact" style="text-decoration:none;color:#aaa">Contact</a> |
         <a href="https:/faq" style="text-decoration:none;color:#aaa">FAQ</a>


     </center>
    </p>
  </div>
</footer> 

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= publicFolder();?>/assets/js/script.js"></script>
<script type="text/javascript">
  $('document').ready(function(){
       
      $('.openMenu').click(function(){
          window.location.href=  $(this).attr('data-href'); 
      });
      $('.imagesS').click(function(){
        var json = $(this).attr('data-images');
        json = JSON.parse(json);
        var html = "";
        for(var i = 0;i < json.length;i++)
          {  
             var isActive  = (i == 0) ? "active" : "";

             html += '<div class="carousel-item '+isActive+'">';
             html += '<img src="<?= publicFolder();?>/property-images/'+json[i]+'" class="d-block w-100" alt="..."/>';
             html += '</div>';
          }
          $('.propertyImagesShow').html(html);
          $('.propertyImagesModal').modal('show'); 
      });

      $('.deletePop').click(function(){ 
          var link = $(this).attr('data-confirmedUrl'); 
          $('.confirmedUrl').attr('href',link);   
          $('.showModalPopup').modal('show'); 
      });
      $('#searchUser').keyup(function(){
         var txt = $(this).val();
         var data = {
           txt : txt
         }
         $('.listUser').html('');
         if(txt)
         {
             $.ajax({
                type : 'POST',
                data : data,
                url : '/backend/user/userDropdownList',
                success:function(html){  
                  $('.listUser').html(html); 
                 }
              });
         } 
      });
    
       
  });
  function searchedUser(i){
    $('#searchedInputid').val(i);
    $('.listUser').hide();
  }
</script> 

</body>
</html>