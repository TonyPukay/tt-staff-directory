//EDIT
$('.col-sm-10').on('click', function (evt) {
    e = evt || window.event;
    e = evt.target || evt.srcElement;
    if(evt.ctrlKey){
        $('#'+e.id).prop('disabled', false); //аквація рядка
        $('#save').prop('disabled', false); //аквація кнопки збереження
        $('#cancel').prop('disabled', false); //аквація кнопки відміни
    }
});
$('.col-sm-10').keydown(function (evt) {
    $('#label_'+evt.target.id).css('color', '#87CEFA');
});

//SAVE
$('#save').on('click', function () {
    var id       = $('#id').val();
    var name     = $('#name').val();
    var position = $('#working_position').val();
    var image    = $('#image').val();
    var salary   = $('#salary').val();
    var id_chief = $('#id_chief').val();
    var chief    = $('#chief').val();


    if (image == '')
        image = 'person_0.png';

    $.ajax({
        url: '/updatePerson',
        method: 'post',
        dataType: 'json',
        data: {
            _token:   token,
            id:       id,
            name:     name,
            image:    image,
            salary:   salary,
            id_chief: id_chief,
            name_chief:    chief,
            working_position: position
        },
        success: function (data) {
            console.log(data);
            updatePage(data);

        }
    });
});

//DELETE
$('#delete').on('click', function () {
    var id = $('#id').val();
    if (confirm('Are you sure you want to remove an employee?\n' +
            'If agreed, you will be redirected in /list')){
        $.ajax({
            url: '/deletePerson',
            method: 'post',
            dataType: 'json',
            data: {
                _token:   token,
                id:       id
            },
            success: function (e) {
                alert(e);
            }
        });
        window.location.replace('/list');
    }
});

//Cancel
$('#cancel').on('click', function () {
    var id = $('#id').val();
    $.ajax({
        url: '/cancelUpdatePerson',
        method: 'post',
        dataType: 'json',
        data: {
            _token:   token,
            id:       id
        },
        success: function (data) {
            updatePage(data)
        }
    });
});

//SearchBoss
$(document).ready(function(){

    $('#chief').typeahead({
        source: function(query, result)
        {
            $.ajax({
                url:"/searchBoss",
                method:"POST",
                data:{query:query,_token:   token},
                dataType:"json",
                success:function(data)
                {
                    result($.map(data, function(item){
                        return item;
                    }));
                }
            })
        }
    });

});

function updatePage(data) {
    $(".alert").alert('show');
    $('#id').val(data.id).prop('disabled', true);
    $('#name').val(data.name).prop('disabled', true);
    $('#working_position').val(data.working_position).prop('disabled', true);

    if (data.image == null){
        $('#image').attr('src','/img/person_0.png');
    } else {
        $('#image').attr('src','/img/'+data.image);
    }

    $('#salary').val(data.salary).prop('disabled', true);

    if (data.parent_name == null) {
        $('#chief').val('I`m a boss, bitch!').prop('disabled', true);
    }else {
        $('#chief').val(data.parent_name).prop('disabled', true);
    }

    $('#created_at').val(data.created_at).prop('disabled', true);
    $('#updated_at').val(data.updated_at).prop('disabled', true);
    $('#id_chief').val(data.parent_id);

    $('#save').prop('disabled', true);
    $('#cancel').prop('disabled', true);
}

$(document).on('change', '#image_upload_file', function () {
    var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');
    $('#image_upload_form').ajaxForm({
        beforeSend: function() {
            progressBar.fadeIn();
            var percentVal = '0%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
            percent.html(percentVal);
        },
        success: function(html, statusText, xhr, $form) {
            obj = $.parseJSON(html);
            if(obj.status){
                var percentVal = '100%';
                bar.width(percentVal);
                percent.html(percentVal);
                $("#imgArea>img").prop('src', '/img/' + obj.image);
                $('#updateImage').val(obj.image);
            }else{
                alert(obj.error);
            }
        },
        complete: function(xhr) {
            progressBar.fadeOut();
        }
    }).submit();
});

$('#saveImage').on('click', function () {
    $('#image').val($('#updateImage').val());
    $('#avatar').prop('src', '/img/' + obj.image);
    $('#exampleModalCenter').modal('hide');
    $('#save').prop('disabled', false); //аквація кнопки збереження
    $('#cancel').prop('disabled', false); //аквація кнопки відміни
});