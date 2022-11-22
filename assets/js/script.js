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




    $(document).on('click', '.product-add-to-cart-ajax', function(e){
 
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
          // console.log(JSON.parse(response));

          // console.log(response.find('.response'));

          var total_price = 0;
         
          $('.single-product-added-to-cart').append(response);
          $('.product_price_hidden').each(function(){

            total_price += parseInt($(this).val());
          });

          $('.product_total_price').empty().append(total_price);

          var product_price = $('.single-product-added-to-cart > div:last').attr('cart-total-amount');
          $('.total-price-of-cart-items').empty().append(product_price);
          
          
          // alert(product_price );

          $('.product_in_cart_info_name_price').remove();
          
          $('.product-added-single-page').each(function(){
            var cart_product_name = $(this).attr('cart-product-name');
            var cart_product_price = $(this).attr('cart-product-price');
            $('.shopping_cart_products_body').prepend('<tr class="product_in_cart_info_name_price"><td>'+ cart_product_name +' </td> <td> '+ cart_product_price +'</td></tr>');
            
          });
          

          
        }

    });   
 

  });




  $(document).on('click', '.remove-single-item-btn', function(e){

    e.preventDefault();



      var product_item_id = $(this).attr('item-id-to-remove');
      var product_item_name= $(this).attr('item-product-name');

      // $(".woocommerce-checkout-review-order-table").append('<h1>hello</h1>'); 
      


    
      $(this).closest('.product-added-single-page').remove();


      var total_price = 0;

      $('.product_price_hidden').each(function(){

        total_price += parseInt($(this).val());
      });
    
    
     // ajax on adding single product page
     $.ajax({
      url: multistep_ajax_script.ajaxurl,
      type: 'post',
      data: {
          'action': 'removed_items_add_to_main_items',
          'removed_product_id': product_item_id,
          'total_product_price': total_price,
        },
        success: function(response){
          $('.product-main-items').append(response);
          // console.log(response);

         

          $('.product_total_price').empty().append(total_price);

          var product_price = $('.single-product-added-to-cart > div:last').attr('cart-total-amount');
          $('.total-price-of-cart-items').empty().append(product_price);

          // alert(product_price);


          $('.product_in_cart_info_name_price').remove();
          
          $('.product-added-single-page').each(function(){
            var cart_product_name = $(this).attr('cart-product-name');
            var cart_product_price = $(this).attr('cart-product-price');
            $('.shopping_cart_products_body').prepend('<tr class="product_in_cart_info_name_price"><td>'+ cart_product_name +' </td> <td> '+ cart_product_price +'</td></tr>');
            
          });



         
          // alert(product_item_ids);

          // $('.product-name').empty().append(product_item_name);


      

          
           
        }

    });   





    
  })


  // $('#first-accordion-item-next').click(function(e){
  // e.preventDefault();

  // $('#second-accordion-btn').prop('disabled', false);
  
  // })


  // $('#second-accordion-item-next').click(function(e){

  //   e.preventDefault();
  //   $('#third-accordion-btn').prop('disabled', false);

  // })

  // $('#third-accordion-item-next').click(function(e){

  //     e.preventDefault();
  //     $('#fourth-accordion-btn').prop('disabled', false);

  // })

  // $('#fourth-accordion-item-next').click(function(e){
  //   e.preventDefault();
  
  //   $('#fifth-accordion-btn').prop('disabled', false);
  // })

  });

 

