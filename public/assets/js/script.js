$(document).ready(function() {
  $('#propertyImgModalBtn').click(function(){
     $('#propertyImgModalView').modal('show');
  });
  $('.propertyImgModalBtn2').click(function(){
     $('.propertyImgModalSrc').attr('src',$(this).attr('data-img'));
     $('#propertyImgModalView2').modal('show');
  });
});
$(document).ready(function() {
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
});