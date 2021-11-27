$(document).ready(function() {
    $('.nav-link.active .sub-menu').slideDown();
    // $("p").slideUp();

    $('#sidebar-menu .arrow').click(function() {
        $(this).parents('li').children('.sub-menu').slideToggle();
        $(this).toggleClass('fa-angle-right fa-angle-down');
    });

    $("input[name='checkall']").click(function() {
        var checked = $(this).is(':checked');
        $('.table-checkall tbody tr td input:checkbox').prop('checked', checked);
    });
});

$(document).ready(function(){
    $('td#page-detail').click(function(){
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var data = {id:id};
      $.ajax(
          {
            url: url,
            method: 'GET',
            data: data,
            dataType: 'json',
            success: function (data) {
                $('.modal .modal-body .user p').html(data.fullName);
                $('.modal .modal-body .title p').html(data.title);
                $('.modal .modal-body .status p').html(data.status);
                $('.modal .modal-body .id p').html(data.id);
                $('.modal .modal-body .create p').html(data.time);
            },
          }
      )
    })
})

$(document).ready(function(){
    $('input#slug').hover(function(){
        $('.tooltip1').toggleClass('active');
    })
})

$(document).ready(function(){
    var val = $(".switch1 input[name='fea']").val();
    if (val == 1) {
        $(".switch1 .slider").toggleClass('active');
    }
    $(".switch1").click(function(){
        $(".switch1 input[name='fea']").attr('value',function(index, attr){
                return attr == 1 ? '' : 1;
            });
            $(".switch1 .slider").toggleClass('active');
    });
})
$(document).ready(function(){
    var val = $(".switch2 input[name='fea1']").val();
    if (val == 2) {
        $(".switch2 .slider").toggleClass('active');
    }
    $(".switch2").click(function(){
        $(".switch2 input[name='fea1']").attr('value',function(index, attr){
                return attr == 2 ? '' : 2;
            });
            $(".switch2 .slider").toggleClass('active');
    });
})
$(document).ready(function(){
    var val = $(".switch3 input[name='fea2']").val();
    if (val == 3) {
        $(".switch3 .slider").toggleClass('active');
    }
    $(".switch3").click(function(){
        $(".switch3 input[name='fea2']").attr('value',function(index, attr){
                return attr == 3 ? '' : 3;
            });
            $(".switch3 .slider").toggleClass('active');
    });
})
$(document).ready(function(){
    var val = $(".switch4 input[name='fea3']").val();
    if (val == 1) {
        $(".switch4 .slider").toggleClass('active');
    }
    $(".switch4").click(function(){
        $(".switch4 input[name='fea3']").attr('value',function(index, attr){
                return attr == 1 ? 0 : 1;
            });
            $(".switch4 .slider").toggleClass('active');
    });
})

$(document).ready(function(){
    $('td#post-detail').click(function(){
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var data = {id:id};
        $.ajax(
            {
              url: url,
              method: 'GET',
              data: data,
              dataType: 'json',
              success: function (data) {
                $('.modal .modal-body .img img').attr('src' ,data.img);
                $('.modal .modal-body ul li .user p').text(data.fullName);
                $('.modal .modal-body ul li .id p').text(data.id);
                $('.modal .modal-body ul li .categary p').text(data.categary);
                $('.modal .modal-body ul li .title p').text(data.title);
                $('.modal .modal-body ul li .hight p').text(data.hightlight);
                $('.modal .modal-body ul li .status p').text(data.status);
                $('.modal .modal-body ul li .create p').text(data.time);
              },
            }
        )
    })
})
$(document).ready(function(){
    $('select#selectList').change(function(){
        var  value= $(this).val();
        var url =$(this).attr('data-url');
        var data = {value:value};
        $.ajax(
            {
              url: url,
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              data: data,
              dataType: 'text',
              success: function (data) {
                $('#sort').html(data);
              },
            }
        )
    })
})
$(document).ready(function(){
    $('td#product-detail').click(function(){
        var id = $(this).attr('data-id');
        var url =$(this).attr('data-url');
        var data = {id:id}
        $.ajax({
            url: url,
            method: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            data: data,
            dataType: 'json',
            success: function (data) {
                $('img#img').attr('src' , data.img);
                $('.modal .modal-body ul li .user p').text(data.fullName),
                $('.modal .modal-body ul li .id p').text(data.id)
                $('.modal .modal-body ul li .categary p').text(data.categary)
                $('.modal .modal-body ul li .price p').text(data.price)
                $('.modal .modal-body ul li .price_new p').text(data.price_new)
                $('.modal .modal-body ul li .title p').text(data.title)
                $('.modal .modal-body ul li .hight p').text(data.lightHight)
                $('.modal .modal-body ul li .status_2 p').text(data.status2)
                $('.modal .modal-body ul li .status p').text(data.status)
                $('.modal .modal-body ul li .create p').text(data.time)
                $('.modal .modal-body ul li .quantity p').text(data.quantity+' '+'Sản phẩm')
            },
        })
    })
})

$(document).ready(function(){
    $('#show_search').fadeOut();
    $('#search').keyup(function(){
        var keywork = $(this).val();
        var url =$(this).attr('data-url');
        if(keywork !== ''){
            $.ajax(
                {
                  url: url,
                  method: 'POST',
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                  data:  {keywork:keywork},
                  dataType: 'text',
                  success: function (data) {
                    $('#show_search').fadeIn();
                    $('#show_search').html(data);
                  },
                }
            )
        }else{
            $('#show_search').fadeOut();
        }
    })

})

$(document).ready(function(){
    $('#sort_product').change(function(){
       var value = $(this).val();
       var url = $(this).attr('data-url');
       var data = {value:value}
       $.ajax(
        {
          url: url,
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          data:data,
          dataType: 'text',
          success: function (data) {
                $('table#sort_pro').html(data);
          },
        }
    )
    })
})

$(document).ready(function(){
    $('a#delete_edit').click(function(event){
        event.preventDefault();
        var id = $(this).attr('data-id');
        var url =$(this).attr('data-url');
        var id_pro = $(this).attr('data');
        var data = {id:id,id_pro:id_pro}
        $.ajax(
            {
              url: url,
              method: 'GET',
              data: data,
              dataType: 'text',
              success: function (data) {
                $.get(url+"?id="+id+"&id_pro="+id_pro , function(loadAjaxHTML){
                    $('#detail_img2').html(loadAjaxHTML)
                });
              },
            }
        )
    })
})

//   End  #client

$(document).ready(function(){
    $('form#filter').change(function(){
        var  price_filter = $('[name="r-price"]:radio:checked').val();
        var  brand_filter = $('[name="r-brand"]:radio:checked').val();
        var url = $(this).attr('data-url');
        var data = {price_filter:price_filter ,brand_filter:brand_filter}
        $.ajax(
            {
              url: url,
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              data: data,
              dataType: 'text',
              success: function (data) {
                 $('#ajax_sort').html(data);
              },
            }
        )
    })
})

$(document).ready(function(){
    $('form#filter1').change(function(){
        var  price_filter = $('[name="r-price"]:radio:checked').val();
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var data = {price_filter:price_filter ,id:id}
        $.ajax(
            {
              url: url,
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              data: data,
              dataType: 'text',
              success: function (data) {
                $('#ajax_sort').html(data);
              },
            }
        )
    })
})

//  Cart
$(document).ready(function(){
    $('#addCat').click(function(e){
        var qty = $('input#qty').val();
        var url = $(this).attr('data-url');
        var url1 = $(this).attr('data-url1');
        event.preventDefault();
        var data = {qty:qty};
        $.ajax(
            {
              url: url,
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              data: data,
              dataType: 'text',
              success: function (data) {
                window.location.href = url1;
              },
            }
        )
    })
})

//  Update
$(document).ready(function(){
    $('input#update_ajax').change(function(){
        var qty = $(this).val();
        var id  = $(this).attr('data-id');
        var url = $(this).attr('data-url');
        var data = {qty:qty , id:id};
        $.ajax(
            {
              url: url,
              method: 'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              data: data,
              dataType: 'json',
              success: function (data) {
                   $('span.price_sum#subtotal-'+id).text(data.total);
                   $('#total-price span').text(data.subtotal+'đ');
                   $('span#count_cart').html(data.count+'Sản phẩm');
                // console.log(data.total);
              },
            }
        )
    })
})

//  Mua hangf trang chu

$(document).ready(function(){
    $('button#buy_now').click(function(){
    var id = $(this).attr('data-id');
    var url = $(this).attr('data-url');
    var data = {id:id};
    $.ajax(
        {
          url: url,
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          data: data,
          dataType: 'json',
          success: function (data) {
              console.log(data);
              if(data.message !== 'Sản phẩm đã hết hàng'){
                $('span#count_cart').text(data.count+'Sản phẩm'),
                Swal.fire(
                    'Good job!',
                    'Đã thêm vào rỏ hàng',
                    'success'
                  )
              }else{
                Swal.fire(
                    'Good job!',
                    'Sản phẩm đã hết hàng',
                    'error'
                  )
              }
          },
        }
    )
    })
})

