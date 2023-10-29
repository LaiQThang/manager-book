$('#change_password').change(function(){
    let status = !$(this).is(":checked");
    $("#password").attr("readonly", status);
    $("#password_confirm").attr("readonly", status);
});

$('.delete_user').click(function(){
    return confirm('Do you want to delete?');
})

$('#over-review-btn').click(function(){
    $('#data-category').hide();
    $('#data-design').hide();
    $(this).addClass('btn-primary');
    $('#over-review').show();
    $('#data-category-btn').removeClass('btn-primary');
    $('#data-design-btn').removeClass('btn-primary');

})

$('#data-category-btn').click(function(){
    $('#over-review').hide();
    $('#data-design').hide();
    $('#data-category').removeClass('d-none');
    $('#data-category').show();
    $(this).addClass('btn-primary');

    $('#data-design-btn').removeClass('btn-primary');
    $('#over-review-btn').removeClass('btn-primary');
})

$('#data-design-btn').click(function(){
    $('#over-review').hide();
    $('#data-category').hide();

    $('#data-design').removeClass('d-none');
    $('#data-design').show();


    $(this).addClass('btn-primary');

    $('#over-review-btn').removeClass('btn-primary');
    $('#data-category-btn').removeClass('btn-primary');
})

// $('#data-category').ready(function(){
//     $('.addSize').click(function(){
//         var text = $('.handleCategory')[0].outerHTML;
//         $('#data-category').append(text);
//     })

//     console.log($('.handleCategory')[0].outerHTML);
// })

// function addSize(){
//     var text = $('.handleCategory')[0].outerHTML;
//     $('#data-category').append(text);
// }

// const tabs = $('.removeSize');

// $.each( tabs, function( key, value ) {
//     console.log(123);
//   });

$('#change-img').change(function(){
    let status = !$(this).is(":checked");
    $(".upload_file").attr("disabled", status);
});

$(document).ready(function(){
    $('.spinner-box').hide();
});

$('#permission_submit').on('submit', function(e){
    e.preventDefault();

    $('.spinner-box').show();


    let id = $("#permission_id").val().trim();

    let name = $("#permission_name").val().trim();

    let csrfToken = $(this).find('input[name="_token"]').val();

    let actionUrl = $(this).attr('action');

    $.ajax({
        url: actionUrl,
        type: 'POST',
        data:{
            permission_id: id,
            permission_name: name,
            _token: csrfToken
        },
        
        dataType: 'json',
        success: function(respon){
            alert(respon.status);
            $('.spinner-box').hide();

            $("#permission_id").val("");
            
            $("#permission_name").val("");
        },
        error: function(err){
            $('.spinner-box').hide();

            let responJson = err.responseJSON.errors;
                    if(Object.keys(responJson).length > 0){
                        for(let key in responJson){
                            $('.'+key+'--err').text(responJson[key][0]);
                            console.log(responJson[key][0]);
                            console.log(key);
                        }
                    }
        }
    });
});