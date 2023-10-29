/*===================================================================
                                        modal load start
    ===================================================================*/

$("#myModal").on("show.bs.modal", function (e) {

    var link = $(e.relatedTarget);
    var content = $(this).find(".modal-content");

    if (content.html()) {

        content.load(link.attr("href"));

    }

});


$("#myModal").on("hidden.bs.modal", function (e) {  // remove modal data when exited
    
    var content = $(this).find(".modal-content");
    content.removeData();
    
});

////////////////////// Product Img Modal START ///////////////////////////////////////

$("#myModal2").on("show.bs.modal", function (f) {

    var link = $(f.relatedTarget);
    var content = $(this).find(".prod-mod-content");

    if (content.html()) {

        content.load(link.attr("href"));

    }

});

$("#myModal2").on("hidden.bs.modal", function (f) {  // remove modal data when exited
    
    var content = $(this).find(".prod-mod-content");
    content.removeData();
    
});

////////////////////// Product Img Modal END ///////////////////////////////////////

/*===================================================================
                          modal load end
===================================================================*/