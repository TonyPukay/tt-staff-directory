// $(document).ready(function () {
//     $.ajax({
//         url: '/getTree',
//         method: 'post',
//         //dataType: 'json',
//         data: {_token: token},
//         success: function (data) {
//             $('#treeview').treeview({data: data})
//             //console.log(data)
//         }
//     })
// });
//

// $(document).ready(function () {
//     $('#tree').jstree({
//         'core' : {
//             'data': $.ajax({
//                 url: '/getChiefs',
//                 method: 'post',
//                 dataType: 'json',
//                 data: {_token: token}
//             }),
//             'loaded_state': true,
//             'themes': {
//                 'icons': false
//             }
//         },
//
//         "massload" : {
//             "data" : function (nodes) {
//                 return {'ajson4' : nodes.join([{ "id" : "ajson5", "parent" : "ajson2", "text" : "Child 3" }])}
//             }
//         },
//
//
//         "state" : { "key" : "demo2" },
//
//         'plugins' : ["massload", "state" ]
//     });
// });


var tt;

qwe();

function qwe() {
    $.ajax({
        url: '/getChiefs',
        method: 'post',
        dataType: 'json',
        data: {_token: token}
    });

    console.log(tt);
}
