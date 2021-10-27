function actionDelete(event) {
    event.preventDefault();
    let urlRequest = $(this).data('url');
    let that = $(this);
    // alert(urlRequest);
    Swal.fire({
        title: "Bạn có chắc?",
        text: "Muốn xóa Slider này!",
        icon: "warning",
        showCancelButton: true ,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Chắc chắn, xóa Slider này!",

    }).then((result) => {
        if (result.value) {
            $.ajax({
                type:'GET',
                url:urlRequest,
                success:function(data){
                    if(data.code == 200){
                        that.parent().parent().parent().remove();
                        Swal.fire("Xóa Thành Công!", "Sản phẩm đã được xóa.", "success");
                    }
                },
                error: function(){

                }
            });
            //
        }
    });
}

$(function () {
    $(document).on("click", ".action_delete", actionDelete);
});
