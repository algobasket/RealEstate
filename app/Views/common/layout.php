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
  <?= $this->renderSection('content') ?>
<div aria-live="polite" aria-atomic="true" style="min-height: 200px;">
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="6000">
    <div class="toast-body"> 
    </div>
</div>
</div>  


  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url();?>/assets/js/script.js"></script>

    
    <script>
      $('document').ready(function(){
        $('.favourite').click(function(){
          var star = $(this).attr("data-star");
          //console.log(star); 
         if(star == 0){
            $(this).attr("data-star",1);
            $(this).attr("src","<?= base_url();?>/images/star.png");
            $('.toast').toast('show');
            $('.toast').removeClass("text-muted");
            $('.toast').addClass("text-success");
            $('.toast-body').html("<b><img src='<?= base_url();?>/images/checked.png' width='25'/> Property added to your favourites!</b>");
            
         }else{
            $(this).attr("data-star",0);
            $(this).attr("src","<?= base_url();?>/images/star-empty.png");
            $('.toast').toast('hide');
            $('.toast-body').html("<b>Property removed from your favourites!</b>");
            $('.toast').removeClass("text-success");
            $('.toast').addClass("text-muted"); 
          }
          
        });

        $('#property_type').change(function(){
           var type = $(this).val(); 
           var listing_type = $('#listing_type_hide').val();
           console.log(listing_type);
           var param = {
             'property_type' : type,
             'listing_type'  : listing_type
           }
            $.ajax({
                type:'POST',
                url: "/ajax/addPropertyPageLoad",
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: param,
                success:function(response){
                  $('#dynamicPageLoad').html(response);
                   //alert(response);
                } 
            });
        });

        $('#builtup_area_dm,#dynamicPageLoad').on('change', function() {
        //$('#builtup_area_dm').change(function(){
            var type = $('#builtup_area_dm').val(); 
            $('#unit_price_dm').html(type); 
        }); 

        $('input[name="listing_type"]').click(function() {    
        //$('#builtup_area_dm').change(function(){
            var listing_type = $(this).val();
            console.log(listing_type);
            $('#listing_type_hide').val(listing_type);
           var type = $('#property_type').val(); 
           var param = {
             'property_type' : type,
             'listing_type'  : listing_type
           }
            $.ajax({
                type:'POST',
                url: "/ajax/addPropertyPageLoad",
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: param,
                success:function(response){
                  $('#dynamicPageLoad').html(response);
                   //alert(response);
                } 
            });
            
        });

       
      });
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      });
    </script>
    <script>
$(document).ready(function() {
    $('.datePicker')
        .datepicker({
            format: 'yyyy-mm-dd'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    // $('#eventForm').formValidation({
    //     framework: 'bootstrap',
    //     icon: {
    //         valid: 'glyphicon glyphicon-ok',
    //         invalid: 'glyphicon glyphicon-remove',
    //         validating: 'glyphicon glyphicon-refresh'
    //     },
    //     fields: {
    //         name: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'The name is required'
    //                 }
    //             }
    //         },
    //         date: {
    //             validators: {
    //                 notEmpty: {
    //                     message: 'The date is required'
    //                 },
    //                 date: {
    //                     format: 'YYYY-MM-DD',
    //                     message: 'The date is not a valid'
    //                 }
    //             }
    //         }
    //     }
    // });
});
</script>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


</script>
<script>
  $('document').ready(function(){
    $('.msg_send_btn').click(function(){
            var fk_user_id  = $('#fk_user_id').val(); 
            var property_id = $('#property_id').val();
            var message = $('.write_msg').val();
            var obj = { 
              'fk_user_id'  : fk_user_id,
              'property_id' : property_id,
              'message' : message 
            };
            $.ajax({ 
              type : 'POST',  
              data : obj,
              url  : '/Message/messagePostAjax', 
              success : function(res){
                  //$('.msg_history').append(res);
                  $('.write_msg').val('');
              }
            }); 
      }); 
  });
  setTimeout(function() {
            var fk_user_id  = $('#fk_user_id').val(); 
            var property_id = $('#property_id').val();
            var obj = { 
              'fk_user_id'  : fk_user_id,
              'property_id' : property_id
            };
           $.ajax({ 
              type : 'POST',  
              data : obj,
              url  : '/Message/getMessagesAjax', 
              success : function(res){
                  $('.msg_history').html(res);
              }
            }); 
}, 5000);
</script>
  </body>
</html>  