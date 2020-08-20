$(document).ready(function(){
  $('#propertyImgModalBtn').click(function(){
     $('#propertyImgModalView').modal('show');
  });
  $('.propertyImgModalBtn2').click(function(){
     $('.propertyImgModalSrc').attr('src',$(this).attr('data-img'));
     $('#propertyImgModalView2').modal('show');
  });
});



$(document).ready(function(){



  $('.searchByListingType').change(function(){
     var listingType  = $('.searchByListingType').val();
     var propertyType = $('.searchByPropertyType').val();
     var priceType    = $('.searchByPriceType').val(); 
     var cityType     = $('.searchByCity').val(); 
     var searchArea   = $('.searchArea').val();  
     var param = { 
     	'listingType' : listingType,
     	'propertyType' : propertyType,
     	'priceType' : priceType,
     	'cityType' : cityType,
     	'searchArea' : searchArea 
     };
      $.ajax({
                type:'POST',
                url: "/ajax/searchPropertyCount_Ajax",
                data: param,
                success:function(response){
                  $('#searchResult').html(response); 
                } 
            });
  });




  $('.searchByPropertyType').change(function(){
         var listingType  = $('.searchByListingType').val();
	     var propertyType = $('.searchByPropertyType').val();
	     var priceType    = $('.searchByPriceType').val(); 
	     var cityType     = $('.searchByCity').val(); 
	     var searchArea   = $('.searchArea').val();  
	     var param = { 
	     	'listingType' : listingType,
	     	'propertyType' : propertyType,
	     	'priceType' : priceType,
	     	'cityType' : cityType,
	     	'searchArea' : searchArea 
	     };
	      $.ajax({
	                type:'POST',
	                url: "/ajax/searchPropertyCount_Ajax",     
	                data: param,
	                success:function(response){
	                	console.log(response);
	                  $('#searchResult').html(response); 
	                } 
	            });
  });
  $('.searchByPriceType').change(function(){
         var listingType  = $('.searchByListingType').val();
	     var propertyType = $('.searchByPropertyType').val();
	     var priceType    = $('.searchByPriceType').val(); 
	     var cityType     = $('.searchByCity').val(); 
	     var searchArea   = $('.searchArea').val();  
	     var param = { 
	     	'listingType' : listingType,
	     	'propertyType' : propertyType,  
	     	'priceType' : priceType,
	     	'cityType' : cityType,
	     	'searchArea' : searchArea 
	     };
	      $.ajax({
	                type:'POST',
	                url: "/ajax/searchPropertyCount_Ajax",   
	                data: param,
	                success:function(response){
	                	console.log(response);
	                   $('#searchResult').html(response); 
	                } 
	            });  
  });




  $('.searchByCity').change(function(){

         var listingType  = $('.searchByListingType').val();
	     var propertyType = $('.searchByPropertyType').val();
	     var priceType    = $('.searchByPriceType').val();
	     var cityType     = $('.searchByCity').val(); 
	     var searchArea   = $('.searchArea').val();  
	     var param = { 
	     	'listingType' : listingType,
	     	'propertyType' : propertyType,
	     	'priceType' : priceType,
	     	'cityType' : cityType,
	     	'searchArea' : searchArea 
	     };
	      $.ajax({
	                type:'POST',
	                url: "/ajax/searchPropertyCount_Ajax",
	                data: param,
	                success:function(response){
	                	console.log(response);
	                   $('#searchResult').html(response); 
	                } 
	            });  
  });



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


    $('.searchDrop').change(function(){  
          var listing_type  = $('.listing_type').val();
          if(listing_type == "rent")
          {
            $('.rental_price').show();
            $('.total_price').hide();
          }else{
            $('.rental_price').hide(); 
            $('.total_price').show();
          } 
          var property_type = $('.property_type').val(); 
          var price         = (listing_type == "rent") ? $('.rental_price').val() : $('.total_price').val(); 
          var facing        = $('.facing').val(); 
          var bhk_type       = $('.bhktype').val();   
          var availability  = $('.availability').val(); 
          var houseOwner    = $('#houseOwner:checked').val();  
          var realEstateDeveloper  = $('#realEstateDeveloper:checked').val(); 
          var agent  = $('#agent:checked').val(); 
          var data = {
             listing_type : listing_type,
             property_type : property_type,
             price : price,
             facing : facing ? facing : 'any',
             bhk_type : bhk_type,
             availability : availability ? availability : 'any',
             houseOwner : houseOwner ? houseOwner : 'any',
             realEstateDeveloper : realEstateDeveloper ? realEstateDeveloper : 'any',
             agent : agent ? agent : 'any' 
          }
          //alert("ok");  
             $.ajax({
                type : 'POST',
                data : data,
                url : '/Ajax/searchPropertyAjax', 
                success:function(html){  
                   $('.ajaxSearchResult').html(html);
                 }
              });
        });




         $('.searchDrop').click(function(){  
          var listing_type  = $('.listing_type').val();
          if(listing_type == "rent")
          {
            $('.rental_price').show();
            $('.total_price').hide();
          }else{
            $('.rental_price').hide(); 
            $('.total_price').show();
          } 
          var property_type = $('.property_type').val(); 
          var price         = (listing_type == "rent") ? $('.rental_price').val() : $('.total_price').val(); 
          var facing        = $('.facing').val(); 
          var bhk_type       = $('.bhktype').val();   
          var availability  = $('.availability').val(); 
          var houseOwner    = $('#houseOwner:checked').val();  
          var realEstateDeveloper  = $('#realEstateDeveloper:checked').val(); 
          var agent  = $('#agent:checked').val(); 
          var data = {
             listing_type : listing_type,
             property_type : property_type,
             price : price,
             facing : facing ? facing : 'any',
             bhk_type : bhk_type,
             availability : availability ? availability : 'any',
             houseOwner : houseOwner ? houseOwner : 'any',
             realEstateDeveloper : realEstateDeveloper ? realEstateDeveloper : 'any',
             agent : agent ? agent : 'any' 
          }
          //alert("ok");  
             $.ajax({
                type : 'POST',
                data : data,
                url : '/Ajax/searchPropertyAjax', 
                success:function(html){  
                   $('.ajaxSearchResult').html(html);
                   //console.log(html); 
                 }
              });
        }); 


        $('#checkUsernameAvailability').click(function(){
          var username = $('#username').val();
          var data = {
            username : username
          }
          $.ajax({
            type : 'POST',
            data : data,  
            url : '/Ajax/checkUsernameAvailabilityAjax',  
            success:function(html){   
               $('#isUsernameAvailable').html(html);
               //console.log(html); 
             }
          });   
        });
      var i = 2;
      $('.addServiceAreaBtn').click(function(){
      	var max = 6;
      	if(i > max )
      	{
          alert('Sorry you can add only 6 service area');
      	}else{
      		var html = '<div class="col-md-5 mb-3">'+
                     '<label for="service_area">Service Area - '+i+'</label>'+
                     '<input type="text" class="form-control" id="service_area" name="service_area[]" value="" placeholder="Eg : West Pitampura">'+
                     '<div class="invalid-feedback">'+
                        'Please select your service area.'+
                     '</div>'+
                   '</div>';
      	    $('.addServiceAreaDiv').append(html);
      	}
      	 i++; 
      });

        
  });
//   setTimeout(function() {
//             var fk_user_id  = $('#fk_user_id').val(); 
//             var property_id = $('#property_id').val();
//             var obj = { 
//               'fk_user_id'  : fk_user_id,
//               'property_id' : property_id
//             };
//            $.ajax({ 
//               type : 'POST',  
//               data : obj,
//               url  : '/Message/getMessagesAjax', 
//               success : function(res){
//                   $('.msg_history').html(res);
//               }
//             }); 
// }, 5000);