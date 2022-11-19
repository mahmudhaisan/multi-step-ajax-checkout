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

    var product_id = $(this).attr('items-to-add-id')

    $(this).remove();


    

    


    $.ajax({
      url: multistep_ajax_script.ajaxurl,
      type: 'post',
      data: {
          'action': 'get_products_info',
          'product_id': product_id
 
        },
        success: function(response){

          $('.single-product-added-to-cart').append(response);

        }

    });


 

    
    
  });


    
     

  });

 


  