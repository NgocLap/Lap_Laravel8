$(function () {
   ///// Check All////////////////////
   $(".checkbox_all").on("click", function () {
    $(this)
        .parents()
        .find(".checkbox_childrent")
        .prop("checked", $(this).prop("checked"));
});
});
