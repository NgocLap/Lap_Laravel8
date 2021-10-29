$(function () {
    /////// tinymce /////////
    var editor_config = {
        path_absolute: "/",
        selector: "textarea.tinymce_editor",
        relative_urls: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern ",
        ],

        toolbar:
            "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback: function (callback, value, meta) {
            var x =
                window.innerWidth ||
                document.documentElement.clientWidth ||
                document.getElementsByTagName("body")[0].clientWidth;
            var y =
                window.innerHeight ||
                document.documentElement.clientHeight ||
                document.getElementsByTagName("body")[0].clientHeight;

            var cmsURL =
                editor_config.path_absolute +
                "filemanager?editor=" +
                meta.fieldname;
            if (meta.filetype == "image") {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: "Filemanager",
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                },
            });
        },
    };
    tinymce.init(editor_config);

    ///// Check box permission////////////////////
    $(document).ready(function () {
        // Lấy tất cả thẻ card
        let permissionCards = $('[data-type^="permission-card"]');

        $(permissionCards).each((index, permissionCard) => {
            // lấy btn chackAll
            let checkAllBtn = $(permissionCard).find(
                'div.card-header input[type="checkbox"]'
            )[0];
            // lấy danh sách các btn quyền trong card body
            let checkListBtn = $(permissionCard).find(
                'div.card-body input[type="checkbox"]'
            );

            $(checkListBtn).each(function (index, item) {
                /** khi ấn vào 1 trong số các btn trong card body sẽ kiểm tra xem
                 * tất cả btn có checked hay ko
                 * nếu tất cả btn dều checked thì cho btn chọn tất cả checked = true ngược lại thì set false
                 */
                function isAllBtnChecked() {
                    let checkAll = true;

                    $(checkListBtn).each(function (index, item) {
                        if (!item.checked) checkAll = false;
                    });

                    checkAllBtn.checked = checkAll;
                }

                // gọi hàm lần đầu khi code mới load để kiểm tra
                isAllBtnChecked();

                // gọi hàm mỗi khi click vào btn
                $(item).click(isAllBtnChecked);
            });

            // Khi ấn btn chọn tất cả thì set tất cả btn trong card body checked = giá trị của btn chọn tất cả
            $(checkAllBtn).click(function () {
                $(checkListBtn).each(function (index, item) {
                    item.checked = checkAllBtn.checked;
                });
            });
            //
        });
    });

    ///// Check All////////////////////
    $(".check_all").on("click", function () {
        $(this)
            .parents()
            .find(".checkbox_childrent")
            .prop("checked", $(this).prop("checked"));
        $(this)
            .parents()
            .find(".checkbox_wrapper")
            .prop("checked", $(this).prop("checked"));
    });
});
