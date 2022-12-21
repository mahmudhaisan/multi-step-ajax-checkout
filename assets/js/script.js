// silence is golden



jQuery(document).ready(function($) {

  var currency_symbol = multistep_ajax_script.currency_symbol;

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

    //  $("#search-query").blur(function(e){
       
    //     $("#list-group-for-search").addClass('d-none');
    //  });






  // main items grid
  $(document).on('click', '.product-add-to-cart-ajax', function(e){
 
    e.preventDefault();

    

    // alert(currency_symbol);

    var product_id = $(this).attr('items-to-add-id');    
    $(this).remove();
    $('.no-products-text').addClass('d-none');

    

    // ajax on adding single product page
    $.ajax({
      url: multistep_ajax_script.ajaxurl,
      type: 'post',
      data: {
          'action': 'get_products_info',
          'product_id': product_id,
 
        },
        success: function(response){

          

          // $('.total-cart-price-count').remove();
          // // console.log(JSON.parse(response));

          // // console.log(response.find('.response'));

          // var total_price = 0;
         
          $('.single-product-added-to-cart').append(response);
          // $('.product_price_hidden').each(function(){

          //   total_price += parseInt($(this).val());
          // });

          // // var cart_total_price = $(this).attr('cart-item-total-price');

          // $('.product_total_price').empty().append(currency_symbol + total_price);

          // var product_price = $('.single-product-added-to-cart > div:last').attr('cart-total-amount');
          // $('.total-price-of-cart-items').empty().append(currency_symbol + product_price);
          
          
          // alert(product_price );

          $('.product_in_cart_info_name_price').remove();
          
          $('.product-added-single-page').each(function(){
            var cart_product_name = $(this).attr('cart-product-name');
            var cart_product_price = $(this).attr('cart-product-price');
            $('.shopping_cart_products_body').prepend('<tr class="product_in_cart_info_name_price"><td>'+ cart_product_name +' </td> <td> '+ currency_symbol +  cart_product_price +'</td></tr>');
            
          });
          
          

          
        }

    });   
 

  });

  // search items grid
  $(document).on('click', '.search-result-item', function(e){

 
    e.preventDefault();

    var product_id = $(this).attr('list-product-id');    
    $(this).remove();
    $('.no-products-text').addClass('d-none');

    

    // ajax on adding single product page
    $.ajax({
      url: multistep_ajax_script.ajaxurl,
      type: 'post',
      data: {
          'action': 'search_result_products_action',
          'product_id': product_id
 
        },
        success: function(response){

          $('.total-cart-price-count').remove();



          // alert(product_id);
          // alert(response);


          // console.log(JSON.parse(response));

          // console.log(response.find('.response'));

          // var total_price = 0;
         
          $('.single-product-added-to-cart').append(response);
          
          // $('.product_price_hidden').each(function(){

          //   total_price += parseInt($(this).val());
          // });

          // // var cart_total_price = $(this).attr('cart-item-total-price');

          // $('.product_total_price').empty().append( currency_symbol + total_price);

          // var product_price = $('.single-product-added-to-cart > div:last').attr('cart-total-amount');
          // $('.total-price-of-cart-items').empty().append(currency_symbol + total_price);
          
          
          // // alert(product_price );

          $('.product_in_cart_info_name_price').remove();
          
          $('.product-added-single-page').each(function(){
            var cart_product_name = $(this).attr('cart-product-name');
            var cart_product_price = $(this).attr('cart-product-price');
            $('.shopping_cart_products_body').prepend('<tr class="product_in_cart_info_name_price"><td>'+ cart_product_name +' </td> <td> '+ currency_symbol +  cart_product_price +'</td></tr>');
            
          });
          

          
        }

    });   
 

  });



  // added single items 
  $(document).on('click', '.remove-single-item-btn', function(e){

    e.preventDefault();
      var product_item_id = parseInt($(this).attr('item-id-to-remove'));
      var product_item_name= $(this).attr('item-product-name');
      var latest_products_arr = $('#latest_products_id_arr').attr('data-latest-products-id');
      var latest_products_id_obj = JSON.parse(latest_products_arr);
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
          'latest_products_arr': latest_products_arr
        },
        success: function(response){

          if(total_price == 0){
            $('.no-products-text').removeClass('d-none');
          }
          
        $('.total-cart-price-count').remove();
         var product_id_check_in_latest_ids =  Object.values(latest_products_id_obj).includes(product_item_id);
          if(product_id_check_in_latest_ids){
            $('.product-main-items').append(response);
          }else{
            $('#list-group-for-search').append(response);
          }

          // console.log(response);

          // $('.product_total_price').empty().append(currency_symbol + total_price);

          // var product_price = $('.single-product-added-to-cart > div:last').attr('cart-total-amount');
          // $('.total-price-of-cart-items').empty().append(currency_symbol + total_price);

          // alert(product_price);



          $('.product_in_cart_info_name_price').remove();
          
          $('.product-added-single-page').each(function(){
            var cart_product_name = $(this).attr('cart-product-name');
            var cart_product_price = $(this).attr('cart-product-price');
            $('.shopping_cart_products_body').prepend('<tr class="product_in_cart_info_name_price"><td>'+ cart_product_name +' </td> <td> ' + currency_symbol +  cart_product_price +'</td></tr>');
            
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




  $("#datepicker-input").on("change",function(){
    var selected = $(this).val();
    $('.loadup-billing-details').attr('loadup-pickup-date', selected);
});



  $("select.form-select-pickup-time").change(function(){
    var selected_time = $(this).children("option:selected").val();
    $('.loadup-billing-details').attr('loadup-pickup-time', selected_time);
  });


  $('.shipping-pick-up-cards').click(function(e){
    $('.shipping-pick-up-cards').removeClass('shipping-select-class');
    $(this).addClass('shipping-select-class');

    var shipping_cost =  $(this).attr('shipping-cost');
      // alert(shipping_cost);

       // ajax on adding single product page
     $.ajax({
      url: multistep_ajax_script.ajaxurl,
      type: 'post',
      data: {
          'action': 'shipping_pick_up_costs',
          'shipping_cost' : shipping_cost,

        },
        success: function(response){
          $(document.body).trigger('update_checkout');
        //  alert(response);
        $('.product_total_price').empty().append(response);
        }

    });   
    
  })

 

 $(document).on('change', '.product-quantity-val', function(e){

  var product_quantity_id = $(this).attr('product-id-val');
  var product_quantity_value = $(this).val();

  $.ajax({
    url: multistep_ajax_script.ajaxurl,
    type: 'post',
    data: {
        'action': 'add_to_cart_product_quantity_update',
        'product_quantity_id': product_quantity_id,
        'product_quantity_value': product_quantity_value,

      },
      success: function(response){
        
        $('.product_total_price').empty().append(response);
        $(document.body).trigger('update_checkout');
      
      }
  })
  

 });



 $('.single-product-added-to-cart').on('DOMSubtreeModified', function(){
  
  $.ajax({
    url: multistep_ajax_script.ajaxurl,
    type: 'post',
    data: {
        'action': 'single_added_cart_modified',
        

      },
      success: function(response){
        $('.product_total_price').empty().append(response);
        // $(document.body).trigger('update_checkout');
      }
  })
});


$('.cart-single-page-item-added-from-main').on('DOMSubtreeModified', function(e){
  
 var single_product_exists_cart =  $('.product-added-single-page').length;

  if(single_product_exists_cart < 1){
    $('#first-accordion-item-next').prop('disabled', true);
  }else{
    
    $('#first-accordion-item-next').prop('disabled', false);
  }
    console.log(single_product_exists_cart);
  
})


$('.loadup-billing-fields .validate-required input').keyup(function() {

  var empty = false;
  $('.loadup-billing-fields .validate-required input').each(function() {
      if ($(this).val().length == 0) {
          empty = true;
      }
  });

  if (empty) {
    $('#loadup-fourth-step-next-btn').prop('disabled', true);
  } else {
    $('#loadup-fourth-step-next-btn').prop('disabled', false);
  }
});




$('.checkout-woo-process-options .validate-required input').keyup(function() {

  var empty = false;
  $('.checkout-woo-process-options .validate-required input').each(function() {
      if ($(this).val().length == 0) {
          empty = true;
      }
  });

  if (empty) {
    $('#fourth-accordion-item-next').prop('disabled', true);
  } else {
    $('#fourth-accordion-item-next').prop('disabled', false);
  }
});



$('.input-field-date-time').change(function() {

  var empty = false;
  $('.input-field-date-time').each(function() {

    let time_date_value = $(this).val();
    // alert(time_date_value);

    if(time_date_value == 'default'){
      empty = true;
      // alert(empty);
    }else if(time_date_value == 0){
      empty = true;
    }
  
    
  });

  if (empty) {
    $('#second-accordion-item-next').prop('disabled', true);
  } else {
    $('#second-accordion-item-next').prop('disabled', false);
  }

 
  
});


$('.loadup-input-field-date-time').change(function() {

  var empty = false;

 

  // alert($(this).val());

  $('.loadup-input-field-date-time').each(function() {

    let time_date_value = $(this).val();
    // alert(time_date_value);

    if(time_date_value == 'default'){
      empty = true;
      // alert(empty);
    }else if(time_date_value == 0){
      empty = true;
    }
  
    
  });


  if (empty) {
    $('#loadup-third-step-next-btn').prop('disabled', true);
  } else {
    $('#loadup-third-step-next-btn').prop('disabled', false);
  }

 
  
});




$('#first-accordion-item-next').click(function(e){
    e.preventDefault();
    $('#second-accordion-btn').prop('disabled', false).removeClass('collapsed');
    $('.accordion-btn-collapse-expand').addClass('collapsed');
    $('.accordion-collapse').removeClass('show');
    $('#second-accordion-item').addClass('show');                        

});

$('#second-accordion-item-next').click(function(e){
    e.preventDefault();
    $('#third-accordion-btn').prop('disabled', false).removeClass('collapsed');
    $('.accordion-btn-collapse-expand').addClass('collapsed');
    $('.accordion-collapse').removeClass('show');
    $('#third-accordion-item').addClass('show');

});

$('#third-accordion-item-next').click(function(e){
    e.preventDefault();
    $('#fourth-accordion-btn').prop('disabled', false).removeClass('collapsed');
    $('.accordion-btn-collapse-expand').addClass('collapsed');
    $('.accordion-collapse').removeClass('show');
    $('#collapseOnes').addClass('show');

}); 


$('#fourth-accordion-item-next').click(function(e){
    e.preventDefault();
    $('#fifth-accordion-btn').prop('disabled', false).removeClass('collapsed');
    $('.accordion-btn-collapse-expand').addClass('collapsed');
    $('.accordion-collapse').removeClass('show');
    $('#collapseTwo').addClass('show');

}); 



//loadup form
$('.radio-fixed-details-card').click(function (e) {
  e.preventDefault();
  let junk_removal_text = $(this).attr('junk-removal-text');
  $('#form-select-junk-type-text').attr('value', junk_removal_text);

  $('.radio-fixed-details-card').removeClass('selected');
  $(this).addClass('selected');  
});



$('.radio-add-to-cart-item-ajax').click(function(e){
e.preventDefault();

var loadup_add_item_id = $(this).attr('items-to-add-id');
var loadup_add_item_price = $(this).attr('items-to-add-price');

var card_selected_product_name =  $(this).find('.card-product-item-name').data('product');

$('#load-size-type-value').empty().append(card_selected_product_name);

$('#loadup-second-step-next-btn').prop('disabled', false);
$('.radio-add-to-cart-item-ajax').removeClass('selected');
$(this).addClass('selected'); 

$.ajax({
url: multistep_ajax_script.ajaxurl,
type: 'post',
data: {
    'action': 'loadup_product_add_to_cart',
    // 'shipping_cost' : shipping_cost,
    'loadup_add_item_id': loadup_add_item_id

  },
  success: function(response){
    $('.loadup-total-price').empty().append('<h3>'+ 'Price: '+ '$'+ response + '</h3>');
  }

});  



// alert(loadup_add_item_id);
// alert(loadup_add_item_price);

})

$("#billing-accordion-btn").click(function() {

var billing_first_name = $('#billing_first_name').val();
var billing_last_name = $('#billing_last_name').val();
var billing_email = $('#billing_email').val();
var billing_phone = $('#billing_phone').val();
var billing_address_1 = $('#billing_address_1').val();
var billing_address_2 = $('#billing_address_2').val();

var pickup_date = $('#datepicker-input-date-val').val();

var pickup_time = $('#datepicker-input-time-val option:selected').val();

$('.loadup-customer-billing-contact').empty();
$('.loadup-customer-pickup-date').empty();
$('.loadup-customer-pickup-address').empty();

$('.loadup-customer-billing-contact').append( '<div class="user_provided_vals">' + billing_first_name + ' ' + billing_last_name + '</div>');
$('.loadup-customer-billing-contact').append('<div class="user_provided_vals">' + billing_phone + '</div>');
$('.loadup-customer-billing-contact').append('<div class="user_provided_vals">' + billing_email + '</div>');

$('.loadup-customer-pickup-date').append('<div class="user_provided_vals">' + pickup_date  + '</div>');
$('.loadup-customer-pickup-date').append( '<div class="user_provided_vals">' + pickup_time + '</div>');



$('.loadup-customer-pickup-address').append('<div class="user_provided_vals">' + billing_address_1 + '</div>' );
$('.loadup-customer-pickup-address').append('<div class="user_provided_vals">' + billing_address_2 + '</div>');


// alert($(this).val()); 


});

$('.radio-fixed-details-card').click(function(e){

  $('.radio-fixed-details-card').removeClass('radio-card-active');
  $(this).addClass('radio-card-active');
  $('#loadup-first-step-next-btn').prop('disabled', false);
  var card_loadup_info_text = $(this).children('.card-loadup-info-text').data('value');


});



$('.cart-product-select-item').click(function(e){
  $('.cart-product-select-item').removeClass('card-product-active');
  $(this).addClass('card-product-active');
})


$('#loadup-first-step-next-btn').click(function(e){
    e.preventDefault();
    $('#second-accordion-btn-loadup').prop('disabled', false).removeClass('collapsed');
    $('.accordion-btn-collapse-expand').addClass('collapsed');
    $('.accordion-collapse').removeClass('show');
    $('#second-loadup-accordion-item').addClass('show');                        

});

$('#loadup-second-step-next-btn').click(function(e){
  e.preventDefault();
  $('#third-accordion-btn-loadup').prop('disabled', false).removeClass('collapsed');
  $('.accordion-btn-collapse-expand').addClass('collapsed');
  $('.accordion-collapse').removeClass('show');
  $('#third-loadup-accordion-item').addClass('show');

});

$('#loadup-third-step-next-btn').click(function(e){
  e.preventDefault();
  $('#fourth-accordion-btn-loadup').prop('disabled', false).removeClass('collapsed');
  $('.accordion-btn-collapse-expand').addClass('collapsed');
  $('.accordion-collapse').removeClass('show');
  $('#fourth-loadup-accordion-item').addClass('show');

}); 

$('#loadup-fourth-step-next-btn').click(function(e){
  e.preventDefault();
  $('#billing-accordion-btn').prop('disabled', false).removeClass('collapsed');
  $('.accordion-btn-collapse-expand').addClass('collapsed');
  $('.accordion-collapse').removeClass('show');
  $('#fifth-loadup-accordion-item').addClass('show');


  var billing_first_name = $('#billing_first_name').val();
  var billing_last_name = $('#billing_last_name').val();
  var billing_email = $('#billing_email').val();
  var billing_phone = $('#billing_phone').val();
  var billing_address_1 = $('#billing_address_1').val();
  var billing_address_2 = $('#billing_address_2').val();

  var pickup_date = $('#datepicker-input-date-val').val();
  var pickup_time = $('#datepicker-input-time-val option:selected').val();


  $('.loadup-customer-billing-contact').empty();
  $('.loadup-customer-pickup-date').empty();
  $('.loadup-customer-pickup-address').empty();

  $('.loadup-customer-billing-contact').append( '<div class="user_provided_vals">' + billing_first_name + ' ' + billing_last_name + '</div>');
  $('.loadup-customer-billing-contact').append('<div class="user_provided_vals">' + billing_phone + '</div>');
  $('.loadup-customer-billing-contact').append('<div class="user_provided_vals">' + billing_email + '</div>');
  
  $('.loadup-customer-pickup-date').append('<div class="user_provided_vals">' + pickup_date  + '</div>');
  $('.loadup-customer-pickup-date').append( '<div class="user_provided_vals">' + pickup_time + '</div>');
  
  
  
  $('.loadup-customer-pickup-address').append('<div class="user_provided_vals">' + billing_address_1 + '</div>' );
  $('.loadup-customer-pickup-address').append('<div class="user_provided_vals">' + billing_address_2 + '</div>');
  
  
});

// $('.accordion-btn-collapse-expand ').click(function(e){
//   $('.accordion-btn-collapse-expand ').removeClass('collapsed');
//   $(this).addClass('collapsed');
// })


$('.accordion-btn-collapse-expand').click(function(e){
// $('.accordion-btn-collapse-expand').addClass('collapsed');
  $('.accordion-btn-collapse-expand').siblings('.accordion-collapse').removeClass('show');
});


});

 
  // jQuery(document).ready(function($) {
  //   $('.pafe-form-builder-button').click(function(e){

  //    var form_field_username =  $("#form-field-username").val();

  //    alert(form_field_username);

  //   })

  // })

  

