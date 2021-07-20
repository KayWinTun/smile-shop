// Custom Js
$(document).ready(function(){

        cartNoti();
        // getData();   
                $('.add-to-cart').on('click', function(){
                      var id=$(this).data('id');
                      var photo=$(this).data('photo');
                      var item_name=$(this).data('name');
                      var codeno=$(this).data('codeno');
                      var price=$(this).data('price');
                      var discount=$(this).data('discount');

                      var item ={
                          id:id,
                          name:item_name,
                          codeno:codeno,
                          price:price,
                          discount:discount,
                          photo:photo,
                          qty:1
                      };

                      var mycartjson=localStorage.getItem('mycart');

                      if(!mycartjson){
                          mycartArray= new Array();
                      }else{
                          mycartArray=JSON.parse(mycartjson);
                      }

                    //   var status=false;
                    //   $.each(mycartArray, function(i, v){
                    //       if (id == v.id) {
                    //           v.qty++;
                    //           status=true;
                    //       }
                    //   });

                    //   if (status==false) {
                    //       mycartArray.push(item);
                    //   }
                        mycartArray.push(item);
                      
                      var cartData=JSON.stringify(mycartArray);
                      localStorage.setItem('mycart', cartData)
                      cartNoti();
                  });

});

                  // CartNOti
                cartNoti();
                function cartNoti(){
                    var mycartjson = localStorage.getItem('mycart');
                    if(mycartjson) {
                        var mycartArray = JSON.parse(mycartjson);
                        var count = 0;
                        $.each(mycartArray, function(i,v){

                            count += v.qty;
                        })

                        $('.cartNoti').text(count);
                        // $('.cartTotal').html(total+' Ks');
                    }else{
                        $('.cartNoti').html(0);
                        // $('.cartTotal').html(0+' Ks');
                    }
                }
                
                // retrieve for cart page
                getData();

                function getData(argument){
                    var mycartjson = localStorage.getItem('mycart');
                    var html = "";
                    var total = 0;
                    if (mycartjson) {
                        mycartArray = JSON.parse(mycartjson);

                        for(item of mycartArray){
                            var unitprice = item.price;
                            var discount = item.discount;
                            total += (item.price*item.qty);
                            html += `<tr>
                            <td>
                                <button class="btn btn-danger btn-small rmbtn" data-id="${item.id}">X</button>
                            </td>
                            <td>
                            <img src="${item.photo}" alt="" width="100" height="100">
                            </td>
                            <td>
                            <p>${item.name}</p>
                            <p>${item.codeno}</p>
                            </td>
                            <td>    
                                <button class="btn btn-danger plus_btn" data-id="${item.id}">+</button>
                            </td>
                            <td>
                            <p> ${item.qty} </p>
                            </td>
                            <td>
                                <button class="btn btn-danger minus_btn" data-id="${item.id}">-</button>
                            </td>`;
                            
                            if(discount){
                                html += `<td><p class="text-danger">
                                ${discount} Ks
                            </p>
                            <p class="font-weight-lighter">
                                <del>${unitprice} Ks</del>
                            </p>`;
                            }else{
                                html += `<td><p class="text-danger">
                                        ${unitprice} Ks
                                        </p>`;
                            }
                                
                            
                           html +=`</td>
                           <td>
                                ${item.price*item.qty}
                            </td>
                        </tr>`;
                        }

                    html += `<tr>
                                <td colspan="7">Total: </td>
                                <td>${total}</td>
                            </tr>`;

                    $('#tbody').html(html);
                    
                }else{
                    
                    $('.checkout-btn').addClass('disabled');
                    
                }
                cartNoti();

                }
                // plus
                $('#tbody').on('click','.plus_btn', function(){
                    var id = $(this).data('id');
                    var mycartjson = localStorage.getItem('mycart');
                    var mycartArray = JSON.parse(mycartjson);

                    for(item of mycartArray){
                            if(id==item.id){
                                item.qty ++;
                            }
                    };

                    var cartData = JSON.stringify(mycartArray);
                    localStorage.setItem('mycart', cartData);

                    getData();
                    cartNoti();

                });

                    // minus
                $('#tbody').on('click','.minus_btn', function(){
                    var id = $(this).data('id');
                    var mycartjson = localStorage.getItem('mycart');
                    var mycartArray = JSON.parse(mycartjson);

                    for(item of mycartArray){
                            if(id==item.id){
                                item.qty --;
                                if(item.qty == 0){
                                        mycartArray.splice(id, 1);
                                }
                            }
                    };

                    var cartData = JSON.stringify(mycartArray);
                    localStorage.setItem('mycart', cartData );

                    getData();
                    cartNoti();

                });

                

            // remove button
            $('#tbody').on('click','.rmbtn', function(){
                var id = $(this).data('id');
                var mycartjson = localStorage.getItem('mycart');
                if(mycartjson){
                    var mycartArray = JSON.parse(mycartjson);

                    for(item of mycartArray){
                        if (id==i){
                            mycartArray.splice(id,1);
                        }

                        var cartData=JSON.stringify(mycartArray);
                        localStorage.setItem('mycart', cartData);
                        
                        cartNoti();
                        getData();

                    };
                }
            });


                


              

 