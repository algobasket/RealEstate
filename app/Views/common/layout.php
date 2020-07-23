<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

     <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>
    
    <script src="http://malsup.github.com/jquery.form.js"></script>


    
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

            // if(listing_type == "sell"){
            //     $('.div_unit_price').show(); 
            //     $('.div_project_total_area').show(); 
            //     $('.div_launch_date').show(); 
            //     $('.div_rera_id').show();
            //     $('.div_rentpermonth').hide();
            //     $('#listing_type_hide').val(listing_type); 
            // }

            // if(listing_type == "rent"){
            //     $('.div_unit_price').hide(); 
            //     $('.div_project_total_area').hide(); 
            //     $('.div_launch_date').hide(); 
            //     $('.div_rera_id').hide();  
            //     $('.div_rentpermonth').show();
            //     $('#listing_type_hide').val(listing_type);   
            // } 
            
        });

        $('#addPropertyForm').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
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

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'YYYY-MM-DD',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
  </body>
</html>  