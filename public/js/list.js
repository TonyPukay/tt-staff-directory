

$(document).ready(function(){
    $.ajax({
        url:"/getList",
        method:"POST",
        data:{_token: token},
        success:function(data)
        {
            $('#employee_data').html(data);
        }
    });

    $('#search').on('click', function () {
        query = $('#employee_search').val();
        $.ajax({
            url: "/searchInList",
            method: "POST",
            data: {query: query, _token: token},
            success: function (data) {
                $('#employee_data').html(data);
            }
        });
    });
});

$('#saveStaff').on('click', function () {
    var name = $('#create_name').val();
    var chief = $('#create_chief').val();
    var salary = $('#create_salary').val();
    var work_position = $('#create_working_position').val();

    if (name == '' || chief == '' || salary == '' || work_position == ''){
        alert('there are empty fields')
    } else {
        $.ajax({
            url: "/insertStaff",
            method: "POST",
            data: {_token: token,
                name: name,
                chief: chief,
                salary:salary,
                work_position:work_position
            },
            success: function (data) {
                console.log(data);
            }
        });
    }

});