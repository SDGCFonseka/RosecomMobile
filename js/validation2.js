/*=====================================================================================================
                            Show File name in the input type file field
=====================================================================================================*/

/*======================================================================================================
                                    Userform START
=======================================================================================================*/

$('#profileImg').change(function () {
    var files = [];
    for (var i = 0; i < $(this)[0].files.length; i++) {
        files.push($(this)[0].files[i].name);
    }

    if (files != "") {
        $(this).next('#proImgInput').html(files);
    } else {
        $('#proImgInput').html("Choose file");
    }
});

/*======================================================================================================
                                    Userform END
=======================================================================================================*/

/*======================================================================================================
                                    brandform START
=======================================================================================================*/

$('#brandImg').change(function () {
    var files = [];
    for (var i = 0; i < $(this)[0].files.length; i++) {
        files.push($(this)[0].files[i].name);
    }

    if (files != "") {
        $(this).next('#brandImgInput').html(files);
    } else {
        $('#brandImgInput').html("Choose file");
    }
});

/*======================================================================================================
                                   brandform END
=======================================================================================================*/

/*======================================================================================================
                                    categoryform START
=======================================================================================================*/

$('#catImg').change(function () {
    var files = [];
    for (var i = 0; i < $(this)[0].files.length; i++) {
        files.push($(this)[0].files[i].name);
    }

    if (files != "") {
        $(this).next('#catImgInput').html(files);
    } else {
        $('#catImgInput').html("Choose file");
    }
});

/*======================================================================================================
                                   categoryform END
=======================================================================================================*/

/*======================================================================================================
                                    customerform START
=======================================================================================================*/

$('#cProfileImg').change(function () {
    var files = [];
    for (var i = 0; i < $(this)[0].files.length; i++) {
        files.push($(this)[0].files[i].name);
    }

    if (files != "") {
        $(this).next('#proImgInput').html(files);
    } else {
        $('#proImgInput').html("Choose file");
    }
});

/*======================================================================================================
                                   customerform END
=======================================================================================================*/
/*======================================================================================================
                                   StockColor Image START
=======================================================================================================*/
$('#colorImg').change(function () {
    var files = [];
    for (var i = 0; i < $(this)[0].files.length; i++) {
        files.push($(this)[0].files[i].name);
    }

    if (files != "") {
        $(this).next('#colImgInput').html(files);
    } else {
        $('#colImgInput').html("Choose file");
    }
});
/*======================================================================================================
                                   StockColor Image END
=======================================================================================================*/
/*======================================================================================================
                                Remove Product Image
======================================================================================================*/

$(".delImgBtn2").on("click", function (e) {
    let imgId = $(this).attr("data-imgId");
    let imgName = $(this).attr("data-imgName");
    let url = "../controller/productController.php?status=removeProdImage";
    let productId = $('#editProdId').val(); // productId Value  from edit form

   swal({
       title: "Are You Sure?",
       text: "This Image will be removed",
       icon: "error",
       buttons: [
           'Cancel',
           'Delete'
       ],
       dangerMode: true,
   }).then((isOkay) => {

       if (isOkay) {
     
       $.ajax({
         url: url,
         method: "POST",
         data: { prodImgId:imgId , 
                 prodImgNm: imgName,
                 productId: productId
                },
        dataType: "json",
         success: function (result) {

            //  console.log(atob(result[1]));
            if (result[0] == 1) {
            $('#prodImgPrevImg').html(atob(result[1])).show();
        //    $("#productTbReload").load("tables/productTable.php");
            }else{
                swal({
                    title: "ERROR",
                    text: atob(result[1]),
                    icon: "error",
                })
            }
            
         },
       });
     }
   });
 });




/*======================================================================================================
                                Input file Path Read and Preview START
======================================================================================================*/

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            imgId = '#prev_' + $(input).attr('id');
            $(imgId).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        imgId = '#prev_' + $(input).attr('id');
        $(imgId).attr('src', "../../img/interface_images/formDefaultImg.jpg");
    }
}


$('.file-upload-input').on('change', function(e) {

    if($(this).val() != ""){
    $('.file-upload-content').empty(); 
   
    let file_array = $(this).get(0).files;

    let output="";

    for (let i = 0; i < file_array.length; i++){
        let src = URL.createObjectURL(file_array[i]);
        output += `<div class="col-md-4 text-center"><img src="${src}" class="file-upload-image" /><div class="alert alert-info p-1">`+file_array[i].name+`</div></div>`;
        
    }
    $('.image-upload-wrap').hide();
    $('.file-upload-content').show();
    $('.file-upload-content').html(output);
    
    $('.file-upload-content').append('<div class="col-md-12 text-center"><button type="button" onclick="removeUpload()" class="remove-image">Remove Upload Images</button><div>');
}else{
    removeUpload();
}

});


  function removeUpload() {

    // $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
    $(".file-upload-input").val(null);
  }
  $('.image-upload-wrap').bind('dragover', function () {
      $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
      $('.image-upload-wrap').removeClass('image-dropping');
  });


/*======================================================================================================
                                Input file Path Read and Preview END
======================================================================================================*/

// ==================================== text Area Toggle =============================================

$('#textEdit').hide();
$('#hdTAreaSwitch').on('click', function(e) {
    
    if ($(this).is(':checked')) {
         $('#textEdit').show();
        $('#hdTextFields').hide();
        $("select option").prop("selected", false);
      } else {
        CKEDITOR.instances['hdModDescrip'].setData('');
         $('#textEdit').hide();
        $('#hdTextFields').show();
      }
});

//---------------------FOR EDIT FORM-------------------------------------------

$('#hdTAreaSwitch2').on('click', function(e) {
    
    
    if ($(this).is(':checked')) {
         $('#textEdit2').show();
        $('#hdTextFields2').hide();
        $("select option").prop("selected", false);
      } else {
        CKEDITOR.instances['hdModDescrip'].setData('');
        $('#textEdit2').hide();
        $('#hdTextFields2').show();
      }
});
    






/*======================================================================================================
                                Remove Product Model Image "PHONE"
======================================================================================================*/

$(".delImgBtn1").on("click", function (e) {
     let imgId = $(this).attr("data-imgId");
     let imgName = $(this).attr("data-imgName");
     let url = "../controller/productController.php?status=removePhoneModImage";
     let mid = $('#phoneModAid').val();
     let productId = $('#productId').val(); // productId Value

    swal({
        title: "Are You Sure?",
        text: "This Image will be removed",
        icon: "error",
        buttons: [
            'Cancel',
            'Delete'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {
      
        $.ajax({
          url: url,
          method: "POST",
          data: { phoneMid:imgId, 
                  phoneMname: imgName, 
                  phoneModAid:mid
                },
          dataType: "json",
          success: function (result) {

            // console.log(atob(result[1]));
           if (result[0] == 1) {
           $('#phImgPrevImg').html(atob(result[1])).show();
           $("#productModelTbReload").load("../view/tables/productModelTable.php?id=" + productId);
           }else{
               swal({
                   title: "ERROR",
                   text: atob(result[1]),
                   icon: "error",
               })
           }
            
          },
        });
      }
    });
  });


  /*======================================================================================================
                                Remove Product Model Image "HEADPHONE"
======================================================================================================*/

$(".delImgBtn3").on("click", function (e) {
    let imgId = $(this).attr("data-imgId");
    let imgName = $(this).attr("data-imgName");
    let url = "../controller/productController.php?status=removeHphoneModImage";
    let mid = $('#hPhoneModId').val();
    let productId = $('#hdProdId').val(); // productId Value

   swal({
       title: "Are You Sure?",
       text: "This Image will be removed",
       icon: "error",
       buttons: [
           'Cancel',
           'Delete'
       ],
       dangerMode: true,
   }).then((isOkay) => {

       if (isOkay) {
     
       $.ajax({
         url: url,
         method: "POST",
         data: { hdPhoneMid:imgId, 
                 hdphoneMname: imgName, 
                 hphoneModId: mid
                },
         dataType: "json",
         success: function (result) {         
            if (result[0] == 1) {
            $('#hdpImgPrevImg').html(atob(result[1])).show();
           $("#productModelTbReload").load("../view/tables/productModelTable.php?id=" + productId);
            }else{
                swal({
                    title: "ERROR",
                    text: atob(result[1]),
                    icon: "error",
                })  
            }
         },
       });
     }
   });
 });

/*======================================================================================================
                                    PREVIEW IMAGE CHANGE START
======================================================================================================*/

/*-----------------------------------------------------------------------------------------------------
                                    !!!!!!!INSERT FORMS!!!!!!!!!
-----------------------------------------------------------------------------------------------------*/

//---------------------------------------USERFORM--------------------------------------

$("form#userForm input[type='file']").change(function () {
    readURL(this);
});

//---------------------------------------CUSTOMERFORM------------------------------------

$("form#customerForm input[type='file']").change(function () {
    readURL(this);
});

//---------------------------------------BRANDFORM--------------------------------------

$("form#brandForm input[type='file']").change(function () {
    readURL(this);
});

//---------------------------------------CATEGORYFORM------------------------------------

$("form#categoryForm input[type='file']").change(function () {
    readURL(this);
});

//---------------------------------------STOCKFORM------------------------------------
$("form#stockForm input[type='file']").change(function () {
    readURL(this);
});
/*-----------------------------------------------------------------------------------------------------
                                    !!!!!!!!!!!EDIT FORMS!!!!!!!!!!!
-----------------------------------------------------------------------------------------------------*/

$("form#editUserForm input[type='file']").change(function () {
    readURL(this);
});

//---------------------------------------CUSTOMERFORM------------------------------------

$("form#editCustomerForm input[type='file']").change(function () {
    readURL(this);
});

//---------------------------------------BRANDFORM--------------------------------------

$("form#editBrandForm input[type='file']").change(function () {
    readURL(this);
});

//---------------------------------------CATEGORYFORM------------------------------------

$("form#editCategoryForm input[type='file']").change(function () {
    readURL(this);
});




/*======================================================================================================
                                    PREVIEW IMAGE CHANGE END
======================================================================================================*/

/*=============================================================================================================
                                    button actions START
=============================================================================================================*/

/*======================================================================================================
                                    Active Inactive Users START
======================================================================================================*/

function activeInactiveUser(x, s) {

    var message = ((s == 0 ? " Deactivated " : " Activated "));
    swal({
        title: "Are you sure ?",
        text: "This User will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/userController.php?status=activeDeactiveUser",
                dataType: "json",
                data: {
                    id: x,
                    userLog_status: s
                },


                success: function (result) {

                    if (result[0] == 1) {



                        swal({
                            title: "User" + message,
                            text: "This User is successfully" + message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        // setInterval(function () {
                        //     location.reload();
                        // }, 700);

                        $('#userTbReload').html(atob(result[1])).show();
                       
                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                    //console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            })
        }

    });

}

/*======================================================================================================
                                    Active Inactive Users END
======================================================================================================*/

/*======================================================================================================
                                    Active Inactive Customer START
======================================================================================================*/
function activeInactiveCustomer(x, s){

    var message = ((s == 0 ? " Deactivated " : " Activated "));
    swal({
        title: "Are you sure ?",
        text: "This Customer will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/customerController.php?status=activeDeactiveCustomer",
                dataType: "json",
                data: {
                    id: x,
                    customerLog_status: s
                },


                success: function (result) {

                    if (result[0] == 1) {



                        swal({
                            title: "Customer" + message,
                            text: "This Customer is successfully" + message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        // setInterval(function () {
                        //     location.reload();
                        // }, 700);

                        $('#customerTbReload').html(atob(result[1])).show();
                        
                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                   // console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            })
        }

    });

}
/*======================================================================================================
                                    Active Inactive Customer END
======================================================================================================*/

/*======================================================================================================
                                    Active Inactive Supplier START
======================================================================================================*/

function activeInactiveSupplier(x,s){
    var message = ((s == 0 ? " Deactivated " : " Activated "));
    

    swal({
        title: "Are you sure ?",
        text: "This Supplier will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {
            
            $.ajax({
                method: "POST",
                url: "../controller/supplierController.php?status=activeDeactiveSupplier",
                dataType: "json",
                data: {
                    id: x,
                    suppLog_status: s
                },


                success: function (result) {

                    if (result[0] == 1) {



                        swal({
                            title: "Supplier" + message,
                            text: "This Supplier is successfully" + message, 
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        // setInterval(function () {
                        //     location.reload();
                        // }, 700);

                        $("#suppTbReload").html(atob(result[1])).show();
                        
                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                   // console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            })
        }

    });
}

/*======================================================================================================
                                    Active Inactive Supplier END
======================================================================================================*/

/*======================================================================================================
                                    Active Inactive brand START
======================================================================================================*/
function activeInactiveBrand(x, s) {

    var message = ((s == 0 ? " Deactivated " : " Activated "));
    swal({
        title: "Are you sure ?",
        text: "This Brand will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/productController.php?status=activeDeactiveBrand",
                dataType: "json",
                data: {
                    id: x,
                    brandLog_status: s
                },

                success: function (result) {

                    if (result[0] == 1) {

                        swal({
                            title: "Brand" + message,
                            text: "This Brand is successfully" + message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        // setInterval(function () {
                        //     location.reload();
                        // }, 700);
                        $("#brandTbReload").html(atob(result[1])).show();

                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                    //console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            })
        }

    });

}

/*======================================================================================================
                                    Active Inactive brand END
======================================================================================================*/

/*======================================================================================================
                                    Active Inactive Category START
======================================================================================================*/

function activeInactiveCategory(x, s) {

    var message = ((s == 0 ? " Deactivated " : " Activated "));
    swal({
        title: "Are you sure ?",
        text: "This Category will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/productController.php?status=activeDeactiveCategory",
                dataType: "json",
                data: {
                    id: x,
                    categoryLog_status: s
                },

                success: function (result) {

                    if (result[0] == 1) {

                        swal({
                            title: "Category" + message,
                            text: "This Category is successfully" + message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        // setInterval(function () {
                        //     location.reload();
                        // }, 700);
                        $("#categoryTbReload").html(atob(result[1])).show();

                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                    //console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            })
        }

    });

}



/*======================================================================================================
                                    Active Inactive Category END
======================================================================================================*/

/*======================================================================================================
                                    Active Inactive Product START
======================================================================================================*/

function activeInactiveProduct(x, s) {

    var message = ((s == 0 ? " Deactivated " : " Activated "));
    swal({
        title: "Are you sure ?",
        text: "This Product will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/productController.php?status=activeDeactiveProduct",
                dataType: "json",
                data: {
                    id: x,
                    productLog_status: s
                },

                success: function (result) {

                    if (result[0] == 1) {

                        swal({
                            title: "Product" + message,
                            text: "This Product is successfully" + message,
                            icon: "success",
                            timer: 1400,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        // setInterval(function () {
                        //     location.reload();
                        // }, 700);
                        $("#productTbReload").html(atob(result[1])).show(); 

                    } else {
                        swal({
                            title: "ERROR",
                            text: "Failed to load the table !",
                            icon: "error",
                        })

                    }
                    //console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            })
        }

    });


}

/*======================================================================================================
                                    Active Inactive Product END
======================================================================================================*/


/////////////////////////////////////////// Phone MODEL START /////////////////////////////////////////////


function activeInactivePhoneMod(x,s,p){

    var message = ((s == 0 ? " Deactivated " : " Activated "));
    
    //  alert(p);
    swal({
        title: "Are you sure ?",
        text: "This Phone Model will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/productController.php?status=activeDeactivePhoneMod",
                dataType: "json",
                data: {
                    id: x,
                    phoneMod_status: s,
                    productId : p
                },

                success: function (result) {

                    if (result[0] == 1) {

                        swal({
                            title: "Phone Model" + message,
                            text: "This Phone Model is successfully" + message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        // setInterval(function () {
                        //     location.reload();
                        // }, 700);
                        $('#productModelTbReload').html(atob(result[1])).show();

                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                    //console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            })
        }

    });

}


/////////////////////////////////////////// Phone MODEL END /////////////////////////////////////////////



/////////////////////////////////////////// Headphone MODEL START /////////////////////////////////////////////


function activeInactiveHphoneMod(x,s,p){

    var message = ((s == 0 ? " Deactivated " : " Activated "));
    
    swal({
        title: "Are you sure ?",
        text: "This Headphone Model will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/productController.php?status=activeDeactiveHphoneMod",
                dataType: "json",
                data: {
                    id: x,
                    hPhoneMod_status: s,
                    productId: p
                },

                success: function (result) {

                    if (result[0] == 1) {

                        swal({
                            title: "Headphone Model" + message,
                            text: "This Headphone Model is successfully" + message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        // setInterval(function () {
                        //     location.reload();
                        // }, 700);
                        $('#productModelTbReload').html(atob(result[1])).show();

                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                    //console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            })
        }

    });

}


/////////////////////////////////////////// Headphone MODEL END /////////////////////////////////////////////


/*///////////////////////////////////////// FEATURE ACTIVATION START//////////////////////////////////////// */

/*======================================================================================================
                        Active Inactive Feature START(------------FEATURE TYPE-------------)
======================================================================================================*/

function activeInactiveFeature(x, s, p) {

    var message = ((s == 0 ? " Hidden " : " Visible "));
    swal({
        title: "Are you sure ?",
        text: "This Feature will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/productController.php?status=activeDeactiveProductFeature",
                dataType: "json",
                data: {
                    id: x,
                    featureLog_status: s,
                    featureTypeId : p
                },

                success: function (result) {

                    if (result[0] == 1) {

                        swal({
                            title: "Feature" + message,
                            text: "This Feature is successfully" + message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        //  setInterval(function () {
                        //  location.reload();
                        //  }, 700);
                        $('#featureTbReload').html(atob(result[1])).show();  

                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                   // console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

    });


}

/*======================================================================================================
                    Active Inactive Feature END(------------FEATURE TYPE-------------)
======================================================================================================*/

/*======================================================================================================
                        Active Inactive Feature START(------------FEATURE SEARCH-------------)
======================================================================================================*/

// function activeInactiveFeature2(x, s, p) {

//     var message = ((s == 0 ? " Hidden " : " Visible "));
//     swal({
//         title: "Are you sure ?",
//         text: "This Feature will be" + message,
//         icon: "warning",
//         buttons: [
//             'No',
//             'Yes'
//         ],
//         dangerMode: true,
//     }).then((isOkay) => {

//         if (isOkay) {

//             $.ajax({
//                 method: "POST",
//                 url: "../controller/productController.php?status=activeDeactiveProductFeature",
//                 dataType: "json",
//                 data: {
//                     id: x,
//                     featureLog_status: s
//                 },

//                 success: function (result) {

//                     if (result[0] == 1) {

//                         swal({
//                             title: "Feature" + message,
//                             text: "This Feature is successfully" + message,
//                             icon: "success",
//                             timer: 1000,
//                             buttons: false,
//                             closeOnEsc: false,
//                             closeOnClickOutside: false,
//                             allowEscKey: false,
//                             allowOutsideClick: false
//                         })

//                         //  setInterval(function () {
//                         //  location.reload();
//                         //  }, 700);
//                         $("#featureTbReload").load("../view/tables/getFeatureInfo.php?f=" + atob(p));

//                     } else {
//                         swal({
//                             title: "ERROR",
//                             text: atob(result[1]),
//                             icon: "error",
//                         })

//                     }
//                     //console.log(result);

//                 },
//                 error: function (data) {
//                     console.log(data);
//                 }
//             })
//         }

//     });


// }

/*======================================================================================================
                    Active Inactive Feature END(------------FEATURE TYPE-------------)
======================================================================================================*/


/*======================================================================================================
                        Active Inactive Feature START(------------FEATURE STATE-------------)
======================================================================================================*/

function activeInactiveFeature2(a, b, c) {

    var message = ((b == 0 ? " Hidden " : " Visible "));
    swal({
        title: "Are you sure ?",
        text: "This Feature will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {

            $.ajax({
                method: "POST",
                url: "../controller/productController.php?status=activeDeactiveFeatureByState",
                dataType: "json",
                data: {
                    id: a,
                    featureLog_status: b,
                    featureTypeId : c
                },

                success: function (result) {

                    if (result[0] == 1) {

                        swal({
                            title: "Feature" + message,
                            text: "This Feature is successfully" + message,
                            icon: "success",
                            timer: 1000,
                            buttons: false,
                            closeOnEsc: false,
                            closeOnClickOutside: false,
                            allowEscKey: false,
                            allowOutsideClick: false
                        })

                        //  setInterval(function () {
                        //  location.reload();
                        //  }, 700);
                        $('#featureTbReload').html(atob(result[1])).show();  

                    } else {
                        swal({
                            title: "ERROR",
                            text: atob(result[1]),
                            icon: "error",
                        })

                    }
                    // console.log(result);

                },
                error: function (data) {
                    console.log(data);
                }
            });
        }

    });


}

/*======================================================================================================
                    Active Inactive Feature END(------------FEATURE STATE-------------)
======================================================================================================*/

/*///////////////////////////////////////// FEATURE ACTIVATION END//////////////////////////////////////// */

/*///////////////////////////////////////// STOCK ACTIVATION START//////////////////////////////////////// */

//------------------------------------------update the grn payment status-----------------------------------------

function setGrnPaySel(x,y){
    var message = ((y == 0 ? " unpaid " : " paid "));
    
    $.ajax({
        method: "POST",
        url: "../controller/stockController.php?status=setGrnPayStatus",
        dataType: "json",
        data: {
            grnId: x,
            grnPayStatus: y
        },

        success: function (result) {

            if (result[0] == 1) {

                swal({
                    title: "Payment State is" + message,
                    text: "This grn payment is successfully" + message,
                    icon: "success",
                    timer: 1300,
                    buttons: false,
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                    allowEscKey: false,
                    allowOutsideClick: false
                })

                //  setInterval(function () {
                //  location.reload();
                //  }, 700);
                $('#grnTbReload').html(atob(result[1])).show();  

            } else {
                swal({
                    title: "ERROR",
                    text: atob(result[1]),
                    icon: "error",
                })

            }
            // console.log(result);

        },
        error: function (data) {
            console.log(data);
        }
    });

}

//------------------------------------------update the grn status-----------------------------------------

function activeInactiveGrn(x,y){

    var message = ((y == 0 ? " Hidden " : " Visible "));
    swal({
        title: "Are you sure ?",
        text: "This GRN will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {
    $.ajax({
        method: "POST",
        url: "../controller/stockController.php?status=setGrnStatus",
        dataType: "json",
        data: {
            grnId: x,
            grnStatus: y
        },

        success: function (result) {

            if (result[0] == 1) {

                swal({
                    title: "Grn is" + message,
                    text: "This grn is successfully" + message,
                    icon: "success",
                    timer: 1000,
                    buttons: false,
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                    allowEscKey: false,
                    allowOutsideClick: false
                })

                //  setInterval(function () {
                //  location.reload();
                //  }, 700);
                $('#grnTbReload').html(atob(result[1])).show();  

            } else {
                swal({
                    title: "ERROR",
                    text: atob(result[1]),
                    icon: "error",
                })

            }
            // console.log(result);

        },
        error: function (data) {
            console.log(data);
        }
    });
}

});

}

//------------------------------------------update stock status-----------------------------------------

function activeInactiveStock(x,y){

    var message = ((y == 0 ? " Hidden " : " Visible "));
    swal({
        title: "Are you sure ?",
        text: "This Stock will be" + message,
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {
    $.ajax({
        method: "POST",
        url: "../controller/stockController.php?status=setStockStatus",
        dataType: "json",
        data: {
            stockId: x,
            stockStatus: y
        },

        success: function (result) {

            if (result[0] == 1) {

                swal({
                    title: "Stock is" + message,
                    text: "This stock is successfully" + message,
                    icon: "success",
                    timer: 1000,
                    buttons: false,
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                    allowEscKey: false,
                    allowOutsideClick: false
                })

                //  setInterval(function () {
                //  location.reload();
                //  }, 700);
                $('#stockTbReload').html(atob(result[1])).show();  

            } else {
                swal({
                    title: "ERROR",
                    text: atob(result[1]),
                    icon: "error",
                })

            }
            // console.log(result);

        },
        error: function (data) {
            console.log(data);
        }
    });
}

});

}

function deleteStock(x){
    swal({
        title: "Are you sure ?",
        text: "This Stock will be Deleted !",
        icon: "warning",
        buttons: [
            'No',
            'Yes'
        ],
        dangerMode: true,
    }).then((isOkay) => {

        if (isOkay) {
    $.ajax({
        method: "POST",
        url: "../controller/stockController.php?status=deleteStockNull",
        dataType: "json",
        data: {
            stockId: x,
        },

        success: function (result) {

            if (result[0] == 1) {

                swal({
                    title: "Deleted",
                    text: "This stock is successfully deleted !",
                    icon: "success",
                    timer: 1000,
                    buttons: false,
                    closeOnEsc: false,
                    closeOnClickOutside: false,
                    allowEscKey: false,
                    allowOutsideClick: false
                })

                //  setInterval(function () {
                //  location.reload();
                //  }, 700);
                $('#stockTbNReload').html(atob(result[1])).show();  

            } else {
                swal({
                    title: "ERROR",
                    text: atob(result[1]),
                    icon: "error",
                })

            }
             console.log(result);

        },
        error: function (data) {
            console.log(data);
        }
    });
}

});
}
/*///////////////////////////////////////// STOCK ACTIVATION END//////////////////////////////////////// */
/*=============================================================================================================
                                    button actions END
=============================================================================================================*/

/*=============================================================================================================
                                    Select actions START in add user
=============================================================================================================*/

/*=============================================================================================================
                        ------------Show functions in User Form START--------------
=============================================================================================================*/

function showFunction(pri) {
    
    $.ajax({
        method: "POST",
        url: "../controller/userController.php?status=getFunctionSel",
        dataType: "json",
        data: {
            roleId: pri
        },
        beforeSend: function() {
            
            $('#showFunc').html('<div class="text-center"><img src="../../img/gifs/1495.gif" width="80px" height="80px" alt="Please Wait !" /></div>'); 
        },
        success: function (result) {
            //   console.log(result);
            if(result[0] == 1){
               
                $('#showFunc').html(atob(result[1])).show();    
                }else{
                $('#showFunc').html(null);
                }
        },
        error: function(data){
            console.log(data);
        }
    });   
}

/*=============================================================================================================
                        ------------Show functions in User Form END--------------
=============================================================================================================*/

//============================================================================ FEATURES-START ========================================================================================

/*=============================================================================================================
                        ------------Load Feature Category Selection Tab START--------------
=============================================================================================================*/

function showSelection(sel) {

    $.ajax({
        method: "POST",
        url: "../controller/productController.php?status=getFcategorySel",
        dataType: "json",
        data: {
            pCategory: sel
        },
        success: function (result) {
            // console.log(result);
            if(result[0] == 1){
                $('#loadSelection').html(atob(result[1])).show();    
                }else{
                    document.getElementById("featureCat").disabled = true;  
                    document.getElementById("featureType").disabled = true;
                    document.getElementById("featureName").disabled = true;

                    $('#featureCat').val(null);
                    $('#featureType').val(null);
                    $('#featureName').val(null);

                    document.getElementById("featureCatIcon").className = "";
                    document.getElementById("featureTypeIcon").className = "";
                    document.getElementById("featureNameIcon").className = "";

                    document.getElementById("featureCat").className = "form-control";
                    document.getElementById("featureType").className = "form-control";
                    document.getElementById("featureName").className = "form-control";
                }
        },
        error:function(data){
            console.log(data);
        }
    });   
}

/*=============================================================================================================
                        ------------Load Feature Category Selection Tab END--------------
=============================================================================================================*/

/*=============================================================================================================
                        ------------Load Feature Specified Selection Tab START--------------
=============================================================================================================*/



function showSelection2(sel2) {

    $.ajax({
        method: "POST",
        url: "../controller/productController.php?status=getFspecific",
        dataType: "json",
        data: {
            fSpecified: sel2
        },
        success: function (result) {
            // console.log(result);
            if(result[0] == 1){
                $('#loadSelection2').html(atob(result[1])).show(); 
                document.getElementById("featureName").disabled = true; // disable Feature text field
                
                }else{
                    document.getElementById("featureType").disabled = true; 
                    $('#featureType').val(null);
                    document.getElementById("featureTypeIcon").className = "";
                    document.getElementById("featureType").className = "form-control";
                }
        },
        error:function(data){
            console.log(data);
        }
    });

}

/*=============================================================================================================
                        ------------Load Feature Specified Selection Tab END--------------
=============================================================================================================*/



/*=============================================================================================================
                        ------------Load Feature Table by Feature_type START--------------
=============================================================================================================*/
function showFeatures(ftype) {

    $.ajax({
        method: "POST",
        url: "../controller/productController.php?status=showFeaturesTb",
        dataType: "json",
        data: {
            featureTypeId: ftype
        },
        success: function (result) {
            // console.log(result);
            if(result[0] == 1){
                $('#featureTbReload').html(atob(result[1])).show(); 
                 document.getElementById("featureName").disabled = false; // disable Feature text field
                 document.getElementById("stateF1").checked = true; // enabled radio
                 document.getElementById("stateF1").disabled = false;
                 document.getElementById("stateF2").disabled = false;
                 document.getElementById("stateF3").disabled = false;
                 document.getElementById("searchFeature").disabled = false; // enabled search text field
                document.getElementById("featureName").disabled = false; // // disable Feature text field

                }else{
                 document.getElementById("featureName").disabled = true; 
                 document.getElementById("featureNameIcon").className = "";
                 document.getElementById("featureName").className = "form-control";
                 $('#featureName').val(null);
                 document.getElementById("featureTbReload").innerHTML = "";
                 document.getElementById("stateF1").disabled = true; // disabled radio
                 document.getElementById("stateF1").checked = false; // unchecked radio
                 document.getElementById("stateF2").disabled = true; // disabled radio
                 document.getElementById("stateF2").checked = false; // unchecked radio
                 document.getElementById("stateF3").disabled = true; // disabled radio
                 document.getElementById("stateF3").checked = false; // unchecked radio
                 document.getElementById("searchFeature").disabled = true; // disabled search text field 
                }
        },
        error:function(data){
            console.log(data);
        }
    });

}




/*=============================================================================================================
                        ------------Load Feature Table by Feature_type END--------------
=============================================================================================================*/

/*=============================================================================================================
                                    Select actions END in add user
=============================================================================================================*/

/*=============================================================================================================
                                    Text Search actions START in Feature [TEXT]
=============================================================================================================*/

function showFsearch(fsearch,ftype) {

    $.ajax({
        method: "POST",
        url: "../controller/productController.php?status=showFsearch",
        dataType: "json",
        data: {
            featureInfo: fsearch,
            featureTypeId: ftype
            
        },
        success: function (result) {
            //  console.log(result);
            if(result[0] == 1){
                $('#featureTbReload').html(atob(result[1])).show();  
                // disable Feature text field
                }else{
                    $('#featureTbReload').html(null);
                    swal({
                        title: "ERROR",
                        text: atob(result[1]),
                        icon: "error",
                    })  
                }
        },
        error:function(data){
            console.log(data);
        }
    });


    // if (fsearch.length == 0 | ftype.length == 0) {
   
    //     };
        // xmlhttp.open("GET", "tables/getFeatureInfo.php?f=" + fsearch + "&g=" + ftype, true);
        // xmlhttp.send();
    
}

/*=============================================================================================================
                                    Text Search actions END in Feature [TEXT]
=============================================================================================================*/

/*=============================================================================================================
                                    State Info actions START in Feature [RADIO]
=============================================================================================================*/

function stateFsearch(fstate, ftypeId) {

    $.ajax({
        method: "POST",
        url: "../controller/productController.php?status=getFcatStatus",
        dataType: "json",
        data: {
            featureTypeId: ftypeId,
            featureStatus: fstate
        },
        success: function (result) {
            // console.log(result);
            if(result[0] == 1){
                $('#featureTbReload').html(atob(result[1])).show();  
              
                }else{
                    $('#featureTbReload').html(null);
                    swal({
                        title: "ERROR",
                        text: atob(result[1]),
                        icon: "error",
                    })  
                }
        },
        error:function(data){
            console.log(data);
        }
    });
    
}

/*=============================================================================================================
                                   State Info actions END in Feature [RADIO]
=============================================================================================================*/


function stateFsearchAll(ftype){

    $.ajax({
        method: "POST",
        url: "../controller/productController.php?status=getAllStatus",
        dataType: "json",
        data: {
            featureTypeId: ftype
        },
        success: function (result) {
            // console.log(result);
            if(result[0] == 1){
                $('#featureTbReload').html(atob(result[1])).show();  
                // disable Feature text field
                }else{
                    $('#featureTbReload').html(null);
                    swal({
                        title: "ERROR",
                        text: atob(result[1]),
                        icon: "error",
                    })  
                }
        },
        error:function(data){
            console.log(data);
        }
    });

 }


//============================================================================ FEATURES-END ========================================================================================
    
//=========================================================================== STOCK-START ========================================================================================
    

  function showSelection3(sel3){

    $.ajax({
        method: "POST",
        url: "../controller/stockController.php?status=allBrandsSel",
        dataType: "json",
        data: {
            productCatId: sel3
        },
        success: function (result) {
            //  console.log(result);
            if(result[0] == 1){
                $('#loadSelection3').html(atob(result[1])).show();  
                 document.getElementById("loadSelection4").innerHTML = '<select class="form-control" name="productNm" id="productNm" disabled><option value="">Please Select a Product </option></select><span id="productNmIcon"></span><span class="text-danger error-msg" id="productCatErr"></span>';
                }else{
                    document.getElementById("loadSelection3").innerHTML = '<select class="form-control" name="productBrand3" id="productBrand3" disabled><option value="">Please Select a Product Brand</option></select><span id="productBrIcon"></span><span class="text-danger error-msg" id="productCatErr"></span>';
                    document.getElementById("loadSelection4").innerHTML = '<select class="form-control" name="productNm" id="productNm" disabled><option value="">Please Select a Product </option></select><span id="productNmIcon"></span><span class="text-danger error-msg" id="productCatErr"></span>';
                    document.getElementById("loadSelection5").innerHTML = '<select class="form-control" name="stockModel" id="stockModel" disabled><option value="">Please Select a Product Model</option></select><span id="productNmIcon"></span><span class="text-danger error-msg" id="productCatErr"></span>';
                    $("#prodModelTbReload2").html("");
                }
        },
        error:function(data){
            console.log(data);
        }
    });
    
  }

  function showSelection4(sel3,sel4){

    $.ajax({
        method: "POST",
        url: "../controller/stockController.php?status=allProductSel",
        dataType: "json",
        data: {
            productCatId: sel3,
            productBrandId: sel4
        },
        success: function (result) {
            //   console.log(result);
            if(result[0] == 1){
                $('#loadSelection4').html(atob(result[1])).show();  
                
                }else{
                    document.getElementById("loadSelection4").innerHTML = '<select class="form-control" name="productNm" id="productNm" disabled><option value="">Please Select a Product </option></select><span id="productNmIcon"></span><span class="text-danger error-msg" id="productCatErr"></span>';
                    document.getElementById("loadSelection5").innerHTML = '<select class="form-control" name="stockModel" id="stockModel" disabled><option value="">Please Select a Product Model</option></select><span id="productNmIcon"></span><span class="text-danger error-msg" id="productCatErr"></span>';
                    $("#prodModelTbReload2").html("");
                }
        },
        error:function(data){
            console.log(data);
        }
    });
    
  }

  function showSelection5(catId,sel5){
    $.ajax({
        method: "POST",
        url: "../controller/stockController.php?status=allModelSel",
        dataType: "json",
        data: {
            productId: sel5,
            categoryId:catId
        },
        success: function (result) {
            //   console.log(result);
            if(result[0] == 1){
                $('#loadSelection5').html(atob(result[1])).show();  
                
                }else{
                    document.getElementById("loadSelection5").innerHTML = '<select class="form-control" name="stockModel" id="stockModel" disabled><option value="">Please Select a Product Model</option></select><span id="productNmIcon"></span><span class="text-danger error-msg" id="productCatErr"></span>';
                  
                }
        },
        error:function(data){
            console.log(data);
        }
    });
  }


    //---------------------Remove item from stock cart-------------------------------------

   
function removeScrtItem(modelId){
        $.ajax({
            method: "POST",
            url: "../controller/stockController.php?status=removeCheckin", // request url
            dataType: "json",
            data: {
                modelId : modelId
            },
            success: function (res) {
                console.log(res);
                if(res[0] == 1){
                
                Command: toastr["success"]("Stock model successfully removed !")

                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "6000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                $("#stBodyload").html(atob(res[1])).show();
                $("#stockCrtBtn").html(atob(res[2])).show();
                $("#sTotalPrice").val(atob(res[3]));

            }else{
                Command: toastr["error"](atob(res[1]))

                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "6000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
            }
            },
            error:function(data){
                console.log(data);
            }
        });
    }

     //---------------------Remove all items from stock cart-------------------------------------

    function removeAllScrtItem(){
        $.ajax({
            method: "POST",
            url: "../controller/stockController.php?status=removeAllStock", // request url
            dataType: "json",
            data:{},
            success: function (res) {
                if(res[0] == 1){
                     
                Command: toastr["success"]("All Stock models successfully removed !")

                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "6000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }

                $("#stBodyload").html(atob(res[1])).show();
                $("#stockCrtBtn").html(atob(res[2])).show();
                $("#sTotalPrice").val(atob(res[3]));

                }else{
                    Command: toastr["error"](atob(res[1]))

                    toastr.options = {
                      "closeButton": false,
                      "debug": false,
                      "newestOnTop": false,
                      "progressBar": false,
                      "positionClass": "toast-top-right",
                      "preventDuplicates": false,
                      "onclick": null,
                      "showDuration": "300",
                      "hideDuration": "1000",
                      "timeOut": "6000",
                      "extendedTimeOut": "1000",
                      "showEasing": "swing",
                      "hideEasing": "linear",
                      "showMethod": "fadeIn",
                      "hideMethod": "fadeOut"
                    }
                }


            },
            error: function(data){
                console.log(data);
            }
        });
            
    }

//=============================================HIDE STOCK TABLE ELEMENTS========================================================
$(function(){
let stockCalTb = $("#stockCalTb tr");

stockCalTb.find('th:eq(1),th:eq(2),th:eq(6),th:eq(7),th:eq(8),th:eq(9),th:eq(10)').hide();
stockCalTb.find('td:eq(1),td:eq(2),td:eq(6),td:eq(7),td:eq(8),td:eq(9),td:eq(10)').hide();
});


//============================================================================ STOCK-END ========================================================================================

/*=============================================================================================================
                                            Selectator START
=============================================================================================================*/

$(".prodCategory").selectator(); // add & edit product forms
$("#prodBrand").selectator();
/*=============================================================================================================
                        ------------------ add Product Model form START--------------------
=============================================================================================================*/

//---------------------------------------------phone model----------------------------------------
$('#phoneModelBrand').selectator();
$('#phoneModelCat').selectator();

//---------------------------------------------headphone model----------------------------------------
$('#hdModelBrand').selectator();
$('#hdModelCat').selectator();
/*=============================================================================================================
                        ------------------ add Product Model form End--------------------
=============================================================================================================*/

/*=============================================================================================================
                        ------------------ add Feature form start--------------------
=============================================================================================================*/

$('#fProductCat').selectator();
$('#productBrand').selectator();
$('#productNm').selectator();
/*=============================================================================================================
                        ------------------ add Feature form end--------------------
=============================================================================================================*/

/*=============================================================================================================
                        ------------------ Stock start--------------------
=============================================================================================================*/

$('#stockCat2').selectator();
$('.stockBrand2').selectator();
$('.stockNm2').selectator();
$('.stockModel2').selectator();
$('#supplierId').selectator();
/*=============================================================================================================
                        ------------------ Stock end--------------------
=============================================================================================================*/

/*=============================================================================================================
                                            Selectator END
=============================================================================================================*/
$('#grnSel*').selectpicker();
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

