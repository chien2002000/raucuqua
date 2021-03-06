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
