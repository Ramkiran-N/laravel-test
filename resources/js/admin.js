import $ from 'jquery';
import { isNumber } from 'lodash';
$( ".admin #addProduct" ).submit(function( event ) {
    event.preventDefault();
    var name = $(".admin #addProduct [name='name']").val()
    var price = $(".admin #addProduct [name='price']").val()
    var stock = $(".admin #addProduct [name='stock']").val()
    if (name.match(/[^a-zA-Z]/g) != null || name.length == 0) {
        alert('Product name should be a string and not empty');
        return
    }
    if(isNaN(price)){
        alert('Price should be Numbers or decimals and not empty')
        return
    }
    if(!Number.isInteger(Number(stock)))
    {
        alert('Stock should be a valid number and not empty')
        return
    }
    $.ajax({
      type: "POST",
      url: '/admin/store',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(response){
        alert(response.msg)
      }
    });
    
  });