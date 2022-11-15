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


    var product_stock_quantity = $('#form1').attr('stock_quantity');
   

    $('#tst-btn').click(function(){
        var form_input_val = $('#tst-btn').val();
        alert(form_input_val);
    });


$('.tstt').text = 12;



     

  });


  function get_input_field_product_id(){
    let btn_product_id = document.getElementById('#tst-btn');
    
    console.log(btn_product_id.getAttribute('product-id'));
  }

  get_input_field_product_id();

  function myFunc(){
    alert('succcess');
    }


  