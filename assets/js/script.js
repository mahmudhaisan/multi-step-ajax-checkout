// silence is golden



jQuery(document).ready(function($) {

    // form accordion
    $("#form_multi").accWizard();

    // live search with filter
    $.liveSearch({
      selectorContainer: "ul",
      selectorElementsToSearch: "li",
      attributeToSearch: false,
      selectorInputSearch: "#search-query",
      selectorToHide: false,
      selectorFixed: "li:first",
      minCharacters: 1,
      typeDelay: 200,
     });

     $("#search-query").focus(function(){
        $("#list-group-for-search").removeClass('d-none');
     }); 
    //  $("#search-query").focusout(function(){
    //     $("#list-group-for-search").addClass('d-none');
    //  });




   $(".product-add-to-cart-ajax").click(function(e){
    e.preventDefault();

    var product_id = $(this).attr('items-to-add-id');

    

    $(this).remove();

    

    // ajax on adding single product page
    $.ajax({
      url: multistep_ajax_script.ajaxurl,
      type: 'post',
      data: {
          'action': 'get_products_info',
          'product_id': product_id
 
        },
        success: function(response){

          var total_price = 0;
         
          $('.single-product-added-to-cart').append(response);
          $('.product_price_hidden').each(function(){

            total_price += parseInt($(this).val());



          });



          $('.product_total_price').empty().append(total_price);

      
        }

    });   




   
    
    
    
    

  });


  $('.product_price_hidden').each(function(){
    console.log(1222);
  });

  




  });

 


  