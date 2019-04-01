$(document).ready(function () {

    $('#btnSearch').on('click',function (e) {
        e.preventDefault()
        var from = $('#from option:selected').val();
        var to = $('#to option:selected').val();
        var departure = $('#departure').val()
        var way_type = $("input[name='flight_type']:checked").val();
        var return_day = $('#return_day').val();
        var flight_class = $('#flight_class option:selected').val();
        var total_person = $('#total_person option:selected').val();

        var today = new Date().toLocaleDateString();
        var todepart = new Date(departure).toLocaleDateString();

        console.log(`${from} ${to} ${departure} ${way_type} ${return_day} ${flight_class} ${total_person} `)

        if (way_type == "one-way"){
            if (from  && to  && departure  && way_type  && flight_class  && total_person){
                if (from == to){
                    swal("Cảnh báo", "Nơi đi không được trùng nơi đến", "error");
                }else if (today > todepart){
                    swal("Cảnh báo", "Thời gian đi phải lớn hơn hôm nay", "error");
                }
                else{
                    $('#search').submit()
                }
            }
            else
            {
                swal("Thiếu thông tin", "Vui lòng nhập đủ thông tin", "error");
            }
        }else {
            if (from  && to  && departure  && way_type  && return_day  && flight_class  && total_person){
                if (from == to){
                    swal("Cảnh báo", "Nơi đi không được trùng nơi đến", "error");
                }else if (today > todepart){
                    swal("Cảnh báo", "Thời gian đi lớn hơn hôm nay", "error");
                } else if(departure > return_day){
                        swal("Cảnh báo", "Ngày đi không được sau ngày về", "error");
                    }
                    else{
                        $('#search').submit()
                    }
            }
            else
            {
                swal("Thiếu thông tin", "Vui lòng nhập đủ thông tin", "error");
            }
        }
    }),

    $('#return').on('click', function (e) {
        $('#returnHiden').css('display', 'block')
    }),

    $('#oneway').on('click', function (e) {
        $('#returnHiden').css('display', 'none')
    })

})

// $(document).ready(function () {
//
//     $('#category').change(function () {
//         var cat_id = $('#category option:selected').val();
//         $.ajax({
//             url: '/Admin/Product/AjaxChangeCategory',
//             type: 'post',
//             dataType:"json",
//             data: { cat_id: cat_id },
//             success: function (response) {
//                 $('#subcategory').empty();
//                 if (response instanceof Array)
//                     response.map((item, index) => {
//                         $('#subcategory').append(<option value=${item.Subcategory_ID}>${item.Name}</option>);
//                     });
//
//             }
//         });
//     });
// });