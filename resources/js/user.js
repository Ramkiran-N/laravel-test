import $ from 'jquery';

$('#productSelectBox').change(function(){
    var selected = $(this).find(":selected")
    var itemPrice = selected.attr('data-price')
    $('#price').text(itemPrice)
})
$( ".user #addToCartForm" ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
      type: "POST",
      url: '/user/add-to-cart',
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function(response){
        location.reload()
        // var res = response.msg
        // var cartTable = $( ".user .cart-items" )
        // res.forEach(element => {
        //    cartTable.append(`<div class="row">
        //                     <div class="col-md-3">${element.product.name}</div>
        //                     <div class="col-md-2">${element.product.price}</div>
        //                     <div class="col-md-2">${element.qty}</div>
        //                     <div class="col-md-3">${element.product.price * element.qty}  </div>
        //                     <div class="col-md-2 delet-btn" data-id=${element}>Delete</div>
        //                 </div>`);
        // });
      }
    });
    
  });
  $('.user #cartItems').ready(function() {
    $.ajax({
        type: "get",
        url: '/user/get-cart',
        success: function(response){
          var res = response.msg
          var cartTable = $( ".user .cart-items" )
          var total = 0;
          var grandTotal = 0;
          res.forEach(element => {
            total = Number(element.product.price)*Number(element.qty)
            grandTotal = Number(grandTotal)+Number(total)
             cartTable.append(`<div class="row">
                              <div class="col-md-3">${element.product.name}</div>
                              <div class="col-md-2">${element.product.price}</div>
                              <div class="col-md-2">${element.qty}</div>
                              <div class="col-md-3">${total}  </div>
                              <div class="col-md-2 delet-btn" data-id=${element.id}>Delete</div>
                          </div>`);
          });
          cartTable.append(`<div class="row mt-5">Grand Total : ${grandTotal}</div>`);
          $('.user .delet-btn').click(function(){
            console.log($(this).attr('data-id'))
            $.ajax({
                type: "get",
                url: '/user/delete-cart',
                data:{id:$(this).attr('data-id')},
                success: function(response){
                  location.reload()
                }
            });
        })
        }
        
      });
});