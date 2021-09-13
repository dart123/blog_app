require('./bootstrap');

window.increment_meta = function increment_meta(url, success) {
    var post_id = $('#post_id').val();
    $.ajax({
        type: 'POST',
        url: url,
        data: {post_id: post_id},
        success: function(data) {
            success(data);
        },
        error: function (jqXHR, exception) {
            var msg = '';
            if (jqXHR.status === 0) {
                msg = 'Not connect.\n Verify Network.';
            } else if (jqXHR.status == 404) {
                msg = 'Requested page not found. [404]';
            } else if (jqXHR.status == 500) {
                msg = 'Internal Server Error [500].';
            } else if (exception === 'parsererror') {
                msg = 'Requested JSON parse failed.';
            } else if (exception === 'timeout') {
                msg = 'Time out error.';
            } else if (exception === 'abort') {
                msg = 'Ajax request aborted.';
            } else {
                msg = 'Uncaught Error.\n' + jqXHR.responseText;
            }
            console.log(msg);
        }
    });
}

$(document).ready(function() {
    $('.like_btn').click(function() {
        increment_meta('/api/add_like', function(data){
            console.log(data);
            var response = JSON.parse(data);
            if (typeof response === 'number')
                $('.like_btn span').text(data);
        });
    });

    $('#comment_form').submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                var response = JSON.parse(data);
                if (typeof response === 'number')
                {
                    $('#comment_form')
                        .parent()
                        .empty()
                        .prepend('<div style="color: green">Ваше сообщение успешно отправлено</div>');
                }
               else
                {
                    $('#comment_form')
                        .parent()
                        .prepend('<div class="error" style="color: red">'+ response.error + '</div>');
                    window.setTimeout(function () {
                        $('.error').remove();
                    }, 2000)
                }

                console.log(data); // show response from the php script.
            },
            error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                $('#comment_form')
                    .parent()
                    .prepend('<div class="error" style="color: red">'+ msg + '</div>');
                window.setTimeout(function () {
                    $('.error').remove();
                }, 2000)
                console.log(msg);
            }
        });


    });
});
