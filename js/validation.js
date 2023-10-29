  /*============================================================================================================================================================================================
                                                                           !=====LoginForm start=====
   ============================================================================================================================================================================================*/
  /*============================================================================================================================================================================================
                                                                           LoginForm SUBMIT start
   ============================================================================================================================================================================================*/

  $("#loginForm").on('submit', function (event) {
      if (!usernameValidForm() | !passwordValidForm()) {
          event.preventDefault();
      } else {
          return true;
      }
  });

  /*============================================================================================================================================================================================
                                                                          LoginForm SUBMIT end
  ============================================================================================================================================================================================*/

  /*===================================================================================================
                             Login Form Validation start
   ===================================================================================================*/

  /*===============================================================================
                            Username Validation start
  ===============================================================================*/
  function usernameValidForm() {
      let username = document.getElementById("usernme");
      let username_pattern = "^[a-zA-Z0-9]([._](?![._])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$";

      if (username.value == "") {
          $("#usernmeErr").html(
              "User Name is required !"
          );
          return false;
      } else if (username.value.match(username_pattern)) {
          $("#usernmeErr").html(
              ""
          );
          return true;
      } else {
          $("#usernmeErr").html(
              "User Name is invalid !"
          );
          return false;
      }
  }
  /*===============================================================================
                                Username Validation end
  ===============================================================================*/

  /*===============================================================================
                                Password Validation start
  ===============================================================================*/
  function passwordValidForm() {
      let password = document.getElementById("password");
      let psw_pattern = "^(.{0,7}|[^0-9]*|[^A-Z]*|[^a-z]*|[a-zA-Z0-9]*)$";

      if (password.value == "") {
          $("#passWordErr").html(
              "Password is required !"
          );
          return false;
      } else if (password.value.match(psw_pattern)) {
          $("#passWordErr").html(
              ""
          );
          return true;
      } else {
          $("#passWordErr").html(
              "Password is invalid !"
          );
          return false;
      }
  }
  /*===============================================================================
                                Password Validation end
  ===============================================================================*/

  /*=====================================================================================================
                            Login Form Validation end
  =======================================================================================================*/

  /*============================================================================================================================================================================================
                                                                           !=====LoginForm end======
   ============================================================================================================================================================================================*/


  /*============================================================================================================================================================================================
                                                                            !====UserForm start=====
   ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                            UserForm SUBMIT start
   ============================================================================================================================================================================================*/
  $("#user-form-submit").on('click', function (event) {

      if (!firstNameValidate() | !lastNameValidate() | !dobValidate() | !dobNicValidate() | !genderValidate() | !nicValidate() | !contactValidate() | !mobileValidate() | !landlineValidate() |
          !addressValidate() | !emailValidate() | !cityValidate() | !proImgValidate() | !usernameValidate() | !passwordValidate() | !confirmPswdValid() | !userRoleValidate()) {
          event.preventDefault();
      } else {

          swal({
                  title: "Are you sure?",
                  text: "This form will be submitted",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {
                      //  $('#userForm').submit();


                      let form = $('#userForm')[0];
                      let formData = new FormData(form);
                      let userResposeMsg = document.getElementById("userFormResponse");
                      let firstName = document.getElementById("firstName");
                      let lastName = document.getElementById("lastName");
                      let dob = document.getElementById("dob");
                      let nic = document.getElementById("nic");
                      let mobileNo = document.getElementById("mobileNo");
                      let landlineNo = document.getElementById("landlineNo");
                      let address1 = document.getElementById("address1");
                      let address2 = document.getElementById("address2");
                      let emailAddress = document.getElementById("emailAddress");
                      let city = document.getElementById("city");
                      let userName = document.getElementById("username");
                      let imgInputBorder = document.getElementById("proImgInput");
                      let password1 = document.getElementById("password");
                      let password2 = document.getElementById("re_password");
                      let pswdErrMsg = document.getElementById("passwordEr2");
                      let roleId = document.getElementById("uRoleId");



                      $.ajax({

                          url: "../controller/userController.php?status=addUser", // request url
                          data: formData,
                          processData: false,
                          dataType: "json",
                          cache: false,
                          contentType: false,
                          type: "POST",
                          success: function (res) {

                              // console.log(res);
                              $('#proImgInput').html("Choose file"); // change file input label path to another label
                              $("#passwordEr2").html(""); // hide the validated success message in password confirmation field
                              $("#prev_profileImg").attr("src", "../../img/interface_images/formDefaultImg.jpg"); // remove the displayed input image
                              $("#progressBar").css({
                                  width: "0%"
                              }); // reset the progress bar
                              $("#showFunc").html(""); // remove the loaded user privilages function page


                              /* remove the font awesome icons in the input fields
                               by keeping class name empty*/
                              document.getElementById("firstNameIcon").className = "";
                              document.getElementById("lastNameIcon").className = "";
                              document.getElementById("genderIcon").className = "";
                              document.getElementById("nicIcon").className = "";
                              document.getElementById("mobileIcon").className = "";
                              document.getElementById("landlineIcon").className = "";
                              document.getElementById("addressIcon").className = "";
                              document.getElementById("addressIcon2").className = "";
                              document.getElementById("emailIcon").className = "";
                              document.getElementById("cityIcon").className = "";
                              document.getElementById("userNmIcon").className = "";
                              document.getElementById("profileIcon").className = "";
                              document.getElementById("passIcon").className = "";
                              document.getElementById("passIcon2").className = "";
                              document.getElementById("roleIcon").className = "";


                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/
                              firstName.className = "form-control";
                              lastName.className = "form-control";
                              dob.className = "form-control";
                              nic.className = "form-control";
                              mobileNo.className = "form-control";
                              landlineNo.className = "form-control";
                              address1.className = "form-control address-field";
                              address2.className = "form-control";
                              emailAddress.className = "form-control";
                              city.className = "form-control";
                              userName.className = "form-control";
                              imgInputBorder.className = "custom-file-label";
                              password1.className = "form-control";
                              password2.className = "form-control";
                              roleId.className = "form-control";
                              pswdErrMsg.className = "text-danger error-msg";



                              if (res[0] == 1) {

                                  $("#userFormResponse").html("Successfully User ( " + firstName.value + " " + lastName.value + " ) Added !");
                                  form.reset(); // erase the form values after submission of the form
                                  setTimeout(function () {
                                      $("#userFormResponse").html(null);
                                  }, 5000);

                                  userResposeMsg.className = "modal-title modal-form-msg text-success pt-2";
                                  $('#userTbReload').html(atob(res[1])).show();
                              } else {
                                  $("#userFormResponse").html("Failed to Submitted !");
                                  userResposeMsg.className = "modal-title modal-form-msg text-danger pt-2";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });
                  }
              });
          return false;
      }
  });

  /*============================================================================================================================================================================================
                                                                          UserForm SUBMIT end
  ============================================================================================================================================================================================*/



  /*============================================================================================================================================================================================
                                                                            UserForm RESET start
    ============================================================================================================================================================================================*/

  // User Form reset button to erase values and errors
  $("#user-form-reset").on('click', function () {

      let form = $('#userForm')[0];
      let firstName = document.getElementById("firstName");
      let lastName = document.getElementById("lastName");
      let dob = document.getElementById("dob");
      let nic = document.getElementById("nic");
      let mobileNo = document.getElementById("mobileNo");
      let landlineNo = document.getElementById("landlineNo");
      let address1 = document.getElementById("address1");
      let address2 = document.getElementById("address2");
      let emailAddress = document.getElementById("emailAddress");
      let city = document.getElementById("city");
      let userName = document.getElementById("username");
      let imgInputBorder = document.getElementById("proImgInput");
      let password1 = document.getElementById("password");
      let password2 = document.getElementById("re_password");
      let pswdErrMsg = document.getElementById("passwordEr2");
      let roleId = document.getElementById("uRoleId");


      $('#proImgInput').html("Choose file"); // change file input label path to another label

      $("#prev_profileImg").attr("src", "../../img/interface_images/formDefaultImg.jpg"); // remove the displayed input image
      $("#progressBar").css({
          width: "0%"
      }); // reset the progress bar
      $("#showFunc").html(""); // remove the loaded user privilages function page

      document.getElementById("firstNameIcon").className = "";
      document.getElementById("lastNameIcon").className = "";
      document.getElementById("genderIcon").className = "";
      document.getElementById("nicIcon").className = "";
      document.getElementById("mobileIcon").className = "";
      document.getElementById("landlineIcon").className = "";
      document.getElementById("addressIcon").className = "";
      document.getElementById("addressIcon2").className = "";
      document.getElementById("emailIcon").className = "";
      document.getElementById("cityIcon").className = "";
      document.getElementById("userNmIcon").className = "";
      document.getElementById("profileIcon").className = "";
      document.getElementById("passIcon").className = "";
      document.getElementById("passIcon2").className = "";
      document.getElementById("roleIcon").className = "";
      /* remove the field valid class in the input fields
      by keeping class name empty to remove the validated border*/
      firstName.className = "form-control";
      lastName.className = "form-control";
      dob.className = "form-control";
      nic.className = "form-control";
      mobileNo.className = "form-control";
      landlineNo.className = "form-control";
      address1.className = "form-control address-field";
      address2.className = "form-control";
      emailAddress.className = "form-control";
      city.className = "form-control";
      userName.className = "form-control";
      imgInputBorder.className = "custom-file-label";
      password1.className = "form-control";
      password2.className = "form-control";
      roleId.className = "form-control";
      pswdErrMsg.className = "text-danger error-msg";

      // clear the form values and error message dislayed below the text fields
      form.reset();
      $("#firstNamErr").html("");
      $("#lastNamErr").html("");
      $("#dobErr").html("");
      $("#dobErr2").html("");
      $("#genderErr").html("");
      $("#nicErr").html("");
      $("#nicErr2").html("");
      $("#contactErr1").html("");
      $("#contactErr2").html("");
      $("#contactErr3").html("");
      $("#contactErr4").html("");
      $("#emailAddErr").html("");
      $("#profileImgErr").html("");
      $("#addressErr").html("");
      $("#cityErr").html("");
      $("#usernameErr").html("");
      $("#usernameErr2").html("");
      $("#passwordEr").html("");
      $("#passwordEr2").html(""); // hide the validated success message in password confirmation field
      $("#roleEr").html("");
  });

  /*============================================================================================================================================================================================
                                                                           UserForm RESET end
   ============================================================================================================================================================================================*/
  /*============================================================================================================================================================================================
                                                                             UserForm EDIT start
     ============================================================================================================================================================================================*/

  $("#user-form-edit").on('click', function (event) {
      if (!firstNameValidate() | !lastNameValidate() | !dobValidate() | !dobNicValidate() | !genderValidate() | !nicValidate() | !contactValidate() | !mobileValidate() | !landlineValidate() |
          !addressValidate() | !emailValidate() | !proImgValidate() | !cityValidate() | !userRoleValidate()) {
          event.preventDefault();
      } else {
          //   $("#editUserForm").submit();
          let form = $('#editUserForm')[0];
          let formData = new FormData(form);
          let userResposeMsg = document.getElementById("eUserFormResponse");
          let firstName = document.getElementById("firstName");
          let lastName = document.getElementById("lastName");
          let dob = document.getElementById("dob");
          let nic = document.getElementById("nic");
          let mobileNo = document.getElementById("mobileNo");
          let landlineNo = document.getElementById("landlineNo");
          let address1 = document.getElementById("address1");
          let address2 = document.getElementById("address2");
          let emailAddress = document.getElementById("emailAddress");
          let city = document.getElementById("city");
          let imgInputBorder = document.getElementById("proImgInput");
          let roleId = document.getElementById("uRoleId");



          $.ajax({

              url: "../controller/userController.php?status=editUser", // request url
              data: formData,
              dataType: "json",
              processData: false,
              cache: false,
              contentType: false,
              type: "POST",
              success: function (res) {

                  //  console.log(res);
                  /* remove the font awesome icons in the input fields
                    by keeping class name empty*/
                  document.getElementById("firstNameIcon").className = "";
                  document.getElementById("lastNameIcon").className = "";
                  document.getElementById("genderIcon").className = "";
                  document.getElementById("nicIcon").className = "";
                  document.getElementById("mobileIcon").className = "";
                  document.getElementById("landlineIcon").className = "";
                  document.getElementById("addressIcon").className = "";
                  document.getElementById("addressIcon2").className = "";
                  document.getElementById("emailIcon").className = "";
                  document.getElementById("cityIcon").className = "";
                  document.getElementById("profileIcon").className = "";
                  document.getElementById("roleIcon").className = "";


                  /* remove the field valid class in the input fields
                   by keeping class name empty to remove the validated border*/
                  firstName.className = "form-control";
                  lastName.className = "form-control";
                  dob.className = "form-control";
                  nic.className = "form-control";
                  mobileNo.className = "form-control";
                  landlineNo.className = "form-control";
                  address1.className = "form-control address-field";
                  address2.className = "form-control";
                  emailAddress.className = "form-control";
                  city.className = "form-control";
                  imgInputBorder.className = "custom-file-label";
                  roleId.className = "form-control";



                  if (res[0] == 1) {

                      $("#eUserFormResponse").html("Successfully Edited " + "( " + nic.value + " )");
                      setTimeout(function () {
                          $("#eUserFormResponse").html(null);
                      }, 5000);

                      userResposeMsg.className = "modal-title modal-form-msg text-success pt-2";
                      $('#userTbReload').html(atob(res[1])).show();
                  } else {
                      $("#eUserFormResponse").html("Failed to Submitted !");
                      userResposeMsg.className = "modal-title modal-form-msg text-danger pt-2";
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });
      }
  });

  /*============================================================================================================================================================================================
                                                                          UserForm EDIT end
  ============================================================================================================================================================================================*/


  /*=====================================================================================================================================================================================
                                                                     User Form Validation start
    ======================================================================================================================================================================================*/

  /*===============================================================================
                                Validate First Name
  ===============================================================================*/
  function firstNameValidate() {
      let firstName = document.getElementById("firstName");
      let letter_pattern = /^[A-Za-z]+$/;

      if (firstName.value == "") {
          firstName.className = "form-control field-invalid";
          document.getElementById("firstNameIcon").className = "fas fa-exclamation-circle field-icon";

          $("#firstNamErr").html(
              "First Name is required !"
          );
          return false;

      } else if (firstName.value.match(letter_pattern)) {
          firstName.className = "form-control field-valid";
          document.getElementById("firstNameIcon").className = "fas fa-check-circle field-icon";
          $("#firstNamErr").html(
              ""
          );

          return true;

      } else {
          firstName.className = "form-control field-invalid";
          document.getElementById("firstNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#firstNamErr").html(
              "First Name should not have 0-9,@,/,$,%,etc. !"
          );

          return false;

      }

  }
  /*===============================================================================
                                Validate last Name
  ===============================================================================*/
  function lastNameValidate() {
      let lastName = document.getElementById("lastName");

      let letter_pattern = /^[A-Za-z]+$/;
      if (lastName.value == "") {
          lastName.className = "form-control field-invalid";
          document.getElementById("lastNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#lastNamErr").html(
              "Last Name is required !"
          );
          return false;
      } else if (lastName.value.match(letter_pattern)) {
          lastName.className = "form-control field-valid";
          document.getElementById("lastNameIcon").className = "fas fa-check-circle field-icon";
          $("#lastNamErr").html(
              ""
          );
          return true;

      } else {
          lastName.className = "form-control field-invalid";
          document.getElementById("lastNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#lastNamErr").html(
              "Last Name should not have 0-9,@,/,$,%,etc. !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate Date of Birth
  ===============================================================================*/
  function dobValidate() {

      let dob = document.getElementById("dob");

      if (dob.value == "") {
          dob.className = "form-control field-invalid";

          $("#dobErr").html(
              "Date of Birth is required !"
          );
          return false;

      } else {
          let current = new Date();
          let cyear = current.getFullYear();
          let cmonth = current.getMonth();
          let cdate = current.getDate();
          //Birth Date
          let birth = new Date(dob.value);
          let byear = birth.getFullYear();
          let bmonth = birth.getMonth();
          let bdate = birth.getDate();

          let age = cyear - byear;
          let m = cmonth - bmonth;
          let d = cdate - bdate;

          if (m < 0 || (m == 0 && d < 0)) {
              age--;
          }

          if (age < 18) {
              dob.className = "form-control field-invalid";
              $("#dobErr").html(
                  "Under Age !"
              );
              return false;

          } else if (age > 60) {
              dob.className = "form-control field-invalid";
              $("#dobErr").html(
                  "Over Age !"
              );
              return false;

          } else {

              dob.className = "form-control field-valid";
              $("#dobErr").html("");
              return true;
          }
      }
  }

  /*===============================================================================
                                 Validate Date of Birth And NIC TO Match
   ===============================================================================*/
  function dobNicValidate() {

      let dob = document.getElementById("dob");
      let nic = document.getElementById("nic");

      if (dob.value != "" && nic.value != "") {
          let doby = dob.value.substring(0, 4);
          let nicy = nic.value.substring(0, 4);
          if (doby != nicy && nicy != doby) {
              dob.className = "form-control field-invalid";
              $("#dobErr2").html(
                  "DOB AND NIC are not matching !"
              );

              return false;
          } else {
              dob.className = "form-control field-valid";
              $("#dobErr2").html("");
              return true;
          }
      }

  }
  /*===============================================================================
                                  Validate Gender 
  ===============================================================================*/
  function genderValidate() {
      let gender = document.getElementById("gender");

      if (this.gender[0].checked == "" && this.gender[1].checked == "") {
          gender.className = "form-check-input";
          document.getElementById("genderIcon").className = "fas fa-exclamation-circle field-icon";
          $("#genderErr").html(
              "Please select a gender !"
          );
          return false;
      } else {
          gender.className = "form-check-input";
          document.getElementById("genderIcon").className = "fas fa-check-circle field-icon";
          $("#genderErr").html(
              ""
          );
          return true;
      }
  }

  /*===============================================================================
                                Validate National Identity
  ===============================================================================*/
  function nicValidate() {
      let nic = document.getElementById("nic");
      let nic_pattern = "^([0-9]{9}[x|X|v|V]|[0-9]{12})$";

      if (nic.value == "") {
          nic.className = "form-control field-invalid";
          document.getElementById("nicIcon").className = "fas fa-exclamation-circle field-icon";
          $("#nicErr").html(
              "NIC number is required !"
          );
          $("#nicErr2").html("");
          return false;
      } else if (nic.value.match(nic_pattern)) {
          nic.className = "form-control field-valid";
          document.getElementById("nicIcon").className = "fas fa-check-circle field-icon";
          $("#nicErr").html(
              ""
          );
          return true;
      } else {
          nic.className = "form-control field-invalid";
          document.getElementById("nicIcon").className = "fas fa-exclamation-circle field-icon";
          $("#nicErr").html(
              "NIC is invalid !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate Contact Numbers
  ===============================================================================*/
  function contactValidate() {
      let mobileNo = document.getElementById("mobileNo");
      let landlineNo = document.getElementById("landlineNo");

      if (mobileNo.value == "" && landlineNo.value == "") {
          mobileNo.className = "form-control field-invalid";
          landlineNo.className = "form-control field-invalid";
          $("#contactErr1").html(
              "Atleast one contact number is needed !"
          );
          $("#contactErr4").html(
              "Atleast one contact number is needed !"
          );
          return false;
      } else {
          mobileNo.className = "form-control field-valid";
          landlineNo.className = "form-control field-valid";
          $("#contactErr4").html(
              ""
          );
          $("#contactErr1").html(
              ""
          );
          return true;
      }
  }

  /*===============================================================================
                           Validate Contact Numbers:Mobile no.
  ===============================================================================*/
  function mobileValidate() {
      let mobileNo = document.getElementById("mobileNo");
      let number_pattern1 = /^(?:0|94|\+94)?(?:7(0|1|2|4|5|6|7|8)\d)\d{6}$/;
      if (mobileNo.value != "") {
          if (mobileNo.value.match(number_pattern1)) {
              mobileNo.className = "form-control field-valid";
              document.getElementById("mobileIcon").className = "fas fa-check-circle field-icon";
              $("#contactErr2").html(
                  ""
              );
              return true;
          } else {
              mobileNo.className = "form-control field-invalid";
              document.getElementById("mobileIcon").className = "fas fa-exclamation-circle field-icon";
              $("#contactErr2").html(
                  "Mobile number is invalid !"
              );
              return false;
          }
      } else {
          // mobileNo.className = "form-control field-valid";
          // document.getElementById("mobileIcon").className = "";
          $("#contactErr2").html(
              ""
          );
          return true;
      }
  }
  //-----------------------------------------------------
  /*===============================================================================
                        Validate Contact Numbers:Landline no.
  ===============================================================================*/
  function landlineValidate() {
      let landlineNo = document.getElementById("landlineNo");
      let number_pattern2 = /^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)\d)\d{6}$/;
      if (landlineNo.value != "") {
          if (landlineNo.value.match(number_pattern2)) {
              landlineNo.className = "form-control field-valid";
              document.getElementById("landlineIcon").className = "fas fa-check-circle field-icon";
              $("#contactErr3").html(
                  ""
              );
              return true;

          } else {
              landlineNo.className = "form-control field-invalid";
              document.getElementById("landlineIcon").className = "fas fa-exclamation-circle field-icon";
              $("#contactErr3").html(
                  "Telephone number is invalid !"
              );
              return false;
          }
      } else {
          // landlineNo.className = "form-control field-valid";
          // document.getElementById("landlineIcon").className = "";
          $("#contactErr3").html(
              ""
          );
          return true;
      }
  }

  /*===============================================================================
                                Validate Address
  ===============================================================================*/
  function addressValidate() {
      let address1 = document.getElementById("address1");
      let address2 = document.getElementById("address2");

      if (address1.value == "" || address2.value == "") {
          address1.className = "form-control address-field field-invalid";
          document.getElementById("addressIcon").className = "fas fa-exclamation-circle field-icon4";
          address2.className = "form-control field-invalid";
          document.getElementById("addressIcon2").className = "fas fa-exclamation-circle field-icon2";
          $("#addressErr").html(
              "Address with route cannot be empty !"
          );
          return false;
      } else {
          address1.className = "form-control address-field field-valid";
          document.getElementById("addressIcon").className = "fas fa-check-circle field-icon4";
          address2.className = "form-control field-valid";
          document.getElementById("addressIcon2").className = "fas fa-check-circle field-icon2";
          $("#addressErr").html(
              ""
          );
          return true;
      }
  }

  /*===============================================================================
                                Validate E-Mail Address
  ===============================================================================*/
  function emailValidate() {
      let emailAddress = document.getElementById("emailAddress");
      let email_pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$";

      if (emailAddress.value == "") {
          emailAddress.className = "form-control field-invalid";
          document.getElementById("emailIcon").className = "fas fa-exclamation-circle field-icon";
          $("#emailAddErr").html(
              "E-mail Address is required !"
          );
          return false;
      } else if (emailAddress.value.match(email_pattern)) {
          emailAddress.className = "form-control field-valid";
          document.getElementById("emailIcon").className = "fas fa-check-circle field-icon";
          $("#emailAddErr").html(
              ""
          );
          return true;
      } else {
          emailAddress.className = "form-control field-invalid";
          document.getElementById("emailIcon").className = "fas fa-exclamation-circle field-icon";
          $("#emailAddErr").html(
              "E-mail Address is not valid !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate City
  ===============================================================================*/
  function cityValidate() {
      let city = document.getElementById("city");
      let letter_pattern = /^[A-Za-z]+$/;
      if (city.value == "") {
          city.className = "form-control field-invalid";
          document.getElementById("cityIcon").className = "fas fa-exclamation-circle field-icon";
          $("#cityErr").html(
              "City is required !"
          );
          return false;
      } else if (city.value.match(letter_pattern)) {
          city.className = "form-control field-valid";
          document.getElementById("cityIcon").className = "fas fa-check-circle field-icon";
          $("#cityErr").html(
              ""
          );
          return true;
      } else {
          city.className = "form-control field-invalid";
          document.getElementById("cityIcon").className = "fas fa-exclamation-circle field-icon";
          $("#cityErr").html(
              "should not contain any numerical values or symbols !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate Profile Image
  ===============================================================================*/
  function proImgValidate() {
      let imgInputBorder = document.getElementById("proImgInput");
      let fuData = document.getElementById("profileImg");
      let FileUploadPath = fuData.value;


      if (FileUploadPath != "") {


          let Extension = FileUploadPath.substring(
              FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

          // validating the file uploaded is an image or not

          if (Extension == "gif" || Extension == "png" || Extension == "bmp" ||
              Extension == "jpeg" || Extension == "jpg") {
              imgInputBorder.className = "custom-file-label field-valid";
              document.getElementById("profileIcon").className = "fas fa-check-circle field-icon3";
              $("#profileImgErr").html(
                  ""
              );
              return true;
          } else {
              imgInputBorder.className = "custom-file-label field-invalid";
              document.getElementById("profileIcon").className = "fas fa-exclamation-circle field-icon3";
              $("#profileImgErr").html(
                  "Only allow files of GIF, PNG, JPG, JPEG, BMP ! "
              );
              $(".custom-file-input").val(null);
              return false;
          }
      } else {
          imgInputBorder.className = "custom-file-label";
          document.getElementById("profileIcon").className = "";
          $("#profileImgErr").html("");
          return true;
      }
  }

  /*===============================================================================
                                Validate UserName
  ===============================================================================*/
  function usernameValidate() {
      let userName = document.getElementById("username");
      let userName_pattern = "^[a-zA-Z0-9]([._](?![._])|[a-zA-Z0-9]){3,18}[a-zA-Z0-9]$";

      if (username.value == "") {
          userName.className = "form-control field-invalid";
          document.getElementById("userNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#usernameErr2").html(
              "User Name is required !"
          );
          $("#usernameErr").html("");
          return false;
      } else if (userName.value.match(userName_pattern)) {
          userName.className = "form-control field-valid";
          document.getElementById("userNmIcon").className = "fas fa-check-circle field-icon";
          $("#usernameErr2").html(
              ""
          );
          return true;
      } else {
          userName.className = "form-control field-invalid";
          document.getElementById("userNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#usernameErr2").html(
              "User Name is invalid !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate Password Confirmation
  ===============================================================================*/

  function passwordValidate() {
      let password1 = document.getElementById("password");
      let password2 = document.getElementById("re_password");

      if (password1.value == "") {
          password1.className = "form-control field-invalid";
          document.getElementById("passIcon").className = "fas fa-exclamation-circle field-icon5";
          $("#passwordEr").html("Please enter password !");
          return false;

      } else if (password2.value != "") {
          password1.className = "form-control field-valid";
          password2.className = "form-control field-valid";
          document.getElementById("passIcon").className = "fas fa-check-circle field-icon5";
          $("#passwordEr2").html("");
          $("#passwordEr").html("");
          return true;
      } else {
          password1.className = "form-control field-invalid";
          password2.className = "form-control field-invalid";
          document.getElementById("passIcon").className = "fas fa-exclamation-circle field-icon5";
          document.getElementById("passIcon2").className = "fas fa-exclamation-circle field-icon5";
          $("#passwordEr").html("");
          $("#passwordEr2").html("Please confirm your password !");
          return false;
      }

  }

  /*===============================================================================
                                Validate Password Matching
  ===============================================================================*/

  function confirmPswdValid() {

      let password1 = document.getElementById("password");
      let password2 = document.getElementById("re_password");
      let pswdErrMsg = document.getElementById("passwordEr2");

      if (password1.value != "" & password2.value != "") {
          if (password1.value != password2.value) {
              document.getElementById("passIcon2").className = "fas fa-exclamation-circle field-icon5";
              document.getElementById("passIcon").className = "fas fa-exclamation-circle field-icon5";
              password2.className = "form-control field-invalid";
              password1.className = "form-control field-invalid";
              pswdErrMsg.className = "text-danger error-msg";
              $("#passwordEr2").html("Password is not matched !");
              return false;

          } else {
              document.getElementById("passIcon2").className = "fas fa-check-circle field-icon5";
              password2.className = "form-control field-valid";
              $("#passwordEr2").html("Password is matched !");
              pswdErrMsg.className = "text-success error-msg";
              return true;

          }
      }
  }


  /*=====================================================================================================================================
                                                       Show / Hide Password
  =====================================================================================================================================*/

  $("#pw_append").on("click", function () {

      if ($("#password").prop("type") == "password") {
          $("#password").prop("type", "text");
      } else {
          $("#password").prop("type", "password");
      }
      $("#pw_icon").toggleClass("fa fa-eye-slash");
  });

  $("#cpw_append").on("click", function () {

      if ($("#re_password").prop("type") == "password") {
          $("#re_password").prop("type", "text");
      } else {
          $("#re_password").prop("type", "password");
      }
      $("#cpw_icon").toggleClass("fa fa-eye-slash");
  });

  /*=====================================================================================================================================
                                                   Progress Bar for Password Weakness
  =====================================================================================================================================*/
  $("#re_password").on("input", function () {
      let passwd2 = $(this).val();
      let corr_psw = passwd2.replace(/\s/g, ""); // avoid spaces in  confirm password
      $(this).val(corr_psw);
  });

  $("#password").on("input", function () {
      let passwd = $(this).val();
      let corr_psw = passwd.replace(/\s/g, ""); // avoid spaces in password
      $(this).val(corr_psw);

      //-------------------Regex Patterns start-------------------
      const psw_weak_1 = /^[a-zA-Z]{5,}$/;
      const psw_weak_2 = /^[0-9]{5,}$/;
      const psw_medium = /(?=.*[a-zA-Z])(?=.*[0-9])(?=.{5,})(^((?![\W\_]).)*$)/;
      const psw_strong = /(?=.*[\W\_])(?=.{5,})/;
      //-------------------Regex Patterns end-------------------

      if (passwd.match(psw_weak_1) != null || passwd.match(psw_weak_2) != null) {
          $("#progressBar").css({
              width: "33.333%",
              backgroundColor: "red",
          });
          $("#progressBar").html("Weak");
      } else if (passwd.match(psw_medium) != null) {
          $("#progressBar").css({
              width: "66.666%",
              backgroundColor: "orange",
          });
          $("#progressBar").html("Medium");
      } else if (passwd.match(psw_strong) != null) {
          $("#progressBar").css({
              width: "100%",
              backgroundColor: "green",
          });
          $("#progressBar").html("Strong");
      } else {
          $("#progressBar").css({
              width: "0%"
          });
      }
  });
  /*======================================================================================
                                    User Role Validation
  ======================================================================================*/

  function userRoleValidate() {

      let roleId = document.getElementById("uRoleId");

      if (roleId.value == "") {
          roleId.className = "form-control field-invalid";
          document.getElementById("roleIcon").className = "fas fa-exclamation-circle field-icon7";
          $("#roleEr").html(
              "User role is required !"
          );
          return false;
      } else {
          roleId.className = "form-control field-valid";
          document.getElementById("roleIcon").className = "fas fa-check-circle field-icon7";
          $("#roleEr").html("");
          return true;
      }

  }



  /*======================================================================================
                                  User Nic Existance start
  ======================================================================================*/

  $("#nic").on("input", function () {
      let nic = $(this).val();

      if (nic != "") {

          $.ajax({
              url: "../controller/userController.php?status=checkUserNicExistance",
              type: "post",
              cache: false,
              data: {
                  nic: nic
              },
              success: function (res) {
                  //    console.log(res);
                  let nic = document.getElementById("nic");
                  if (res == "yes") {
                      nic.className = "form-control field-invalid";
                      document.getElementById("nicIcon").className = "fas fa-exclamation-circle field-icon";

                      $("#nicErr2").html("This user already exist !");
                      $("#user-form-submit").prop("disabled", true);
                  } else {
                      $("#nicErr2").html("");
                      $("#user-form-submit").prop("disabled", false);
                  }

              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });

  /*======================================================================================
                                  User Nic Existance end
  ======================================================================================*/
  /*====================================================================================
                                  UserName Existance start
  ====================================================================================*/

  $("#username").on("input", function () {
      let username = $(this).val();

      if (username != "") {

          $.ajax({
              url: "../controller/userController.php?status=checkUsernameExistance",
              type: "post",
              cache: false,
              data: {
                  uname: username
              },
              success: function (res) {
                  //    console.log(res);
                  let userName = document.getElementById("username");

                  if (res == "yes") {
                      userName.className = "form-control field-invalid";
                      document.getElementById("userNmIcon").className = "fas fa-exclamation-circle field-icon";
                      $("#usernameErr").html("This username is already taken !");
                      $("#user-form-submit").prop("disabled", true); // button area disabled if reponse return yes
                  } else {
                      $("#usernameErr").html("");
                      $("#user-form-submit").prop("disabled", false);
                  }
              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });

  /*=================================================================================
                                  UserName Existance end
  =================================================================================*/

  /*====================================================================================
                                Email Existance of DRIVER & USER start
  ====================================================================================*/

  $("#emailAddress").on("input", function () {
      let emailAddress = $(this).val();

      if (emailAddress != "") {

          $.ajax({
              url: "../controller/userController.php?status=checkUserEmailExistance",
              type: "post",
              cache: false,
              data: {
                  email: emailAddress
              },
              success: function (res) {
                  //    console.log(res);
                  let emailAddr = document.getElementById("emailAddress");

                  if (res == "yes") {
                      emailAddr.className = "form-control field-invalid";
                      document.getElementById("emailIcon").className = "fas fa-exclamation-circle field-icon";
                      $("#emailAddErr2").html("This Email is already taken !");
                      $("#user-form-submit").prop("disabled", true); // button area disabled if reponse return yes
                  } else {
                      $("#emailAddErr2").html("");
                      $("#user-form-submit").prop("disabled", false);
                  }
              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });

  /*=================================================================================
                              Email Existance of DRIVER & USER end
  =================================================================================*/

  /*==================================================================================================================================================================================
                                                                   User Form Validation end
  ===================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                           !====UserForm end====
  ============================================================================================================================================================================================*/




  /*============================================================================================================================================================================================
                                                                           !======BrandForm start======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                           BrandForm submit start
  ============================================================================================================================================================================================*/

  $("#brand-form-submit").on('click', function (event) {

      if (!brandNameValidate() | !brandDesValidate() | !brandImgValidate()) {
          event.preventDefault();
      } else {
          swal({
                  title: "Are you sure?",
                  text: "This form will be submitted",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {
                      //   $("#brandForm").submit();

                      let form = $('#brandForm')[0];
                      let formData = new FormData(form);
                      let brandResposeMsg = document.getElementById("brandFormResponse");
                      let brandName = document.getElementById("brandName");
                      let brandDes = document.getElementById("brandDes");

                      let imgInputBorder = document.getElementById("brandImgInput");



                      $.ajax({

                          url: "../controller/productController.php?status=addBrand", // request url
                          data: formData,
                          processData: false,
                          dataType: "json",
                          cache: false,
                          contentType: false,
                          type: "POST",
                          success: function (res) {

                              // console.log(res);
                              $('#brandImgInput').html("Choose file"); // change file input label path to another label
                              $("#prev_brandImg").attr("src", "../../img/interface_images/formDefaultImg.jpg"); // remove the displayed input image

                              /* remove the font awesome icons in the input fields
                               by keeping class name empty*/
                              document.getElementById("brandNmIcon").className = "";
                              document.getElementById("brandDesIcon").className = "";
                              document.getElementById("brandImgIcon").className = "";


                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/
                              brandName.className = "form-control";
                              brandDes.className = "form-control";
                              imgInputBorder.className = "custom-file-label";



                              if (res[0] == 1) {
                                  // console.log(res);
                                  $("#brandFormResponse").html("Successfully Brand ( " + brandName.value + " ) Added !");
                                  // erase the form values after submission of the form
                                  form.reset();
                                  setTimeout(function () {
                                      $("#brandFormResponse").html(null);
                                  }, 5000);

                                  brandResposeMsg.className = "modal-title modal-form-msg mt-2 text-success";
                                  $("#brandTbReload").html(atob(res[1])).show();
                              } else {
                                  $("#brandFormResponse").html("Failed to Submitted !");
                                  brandResposeMsg.className = "modal-title modal-form-msg mt-2 text-danger";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });

                  }
              });
      }

  });

  /*============================================================================================================================================================================================
                                                                              BrandForm submit end
     ============================================================================================================================================================================================*/


  /*============================================================================================================================================================================================
                                                                           BrandForm reset start
  ============================================================================================================================================================================================*/

  $("#brand-form-reset").on('click', function () {

      let form = $('#brandForm')[0];
      let brandName = document.getElementById("brandName");
      let brandDes = document.getElementById("brandDes");

      let imgInputBorder = document.getElementById("brandImgInput");

      $('#brandImgInput').html("Choose file"); // change file input label path to another label
      $("#prev_brandImg").attr("src", "../../img/interface_images/formDefaultImg.jpg");

      document.getElementById("brandNmIcon").className = "";
      document.getElementById("brandDesIcon").className = "";
      document.getElementById("brandImgIcon").className = "";

      brandName.className = "form-control";
      brandDes.className = "form-control";
      imgInputBorder.className = "custom-file-label";

      // clear form values and error messages
      form.reset();
      $("#brandNamErr").html("");
      $("#brandNamErr3").html("");
      $("#brandDesErr").html("");
      $("#brandImgErr").html("");

  });

  /*============================================================================================================================================================================================
                                                                           BrandForm reset end
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                           BrandForm edit start
  ============================================================================================================================================================================================*/

  $("#brand-form-edit").on('click', function (event) {

      if (!brandNameValidate() | !brandDesValidate() | !brandImgValidate()) {
          event.preventDefault();
      } else {

          //   $("#editBrandForm").submit();

          let form = $('#editBrandForm')[0];
          let formData = new FormData(form);
          let brandResposeMsg = document.getElementById("eBrandFormResponse");
          let brandName = document.getElementById("brandName");
          let brandDes = document.getElementById("brandDes");

          let imgInputBorder = document.getElementById("brandImgInput");



          $.ajax({

              url: "../controller/productController.php?status=editBrand", // request url
              data: formData,
              processData: false,
              dataType: "json",
              cache: false,
              contentType: false,
              type: "POST",
              success: function (res) {

                  // console.log(res);


                  /* remove the font awesome icons in the input fields
                   by keeping class name empty*/
                  document.getElementById("brandNmIcon").className = "";
                  document.getElementById("brandDesIcon").className = "";
                  document.getElementById("brandImgIcon").className = "";


                  /* remove the field valid class in the input fields
                   by keeping class name empty to remove the validated border*/
                  brandName.className = "form-control";
                  brandDes.className = "form-control";
                  imgInputBorder.className = "custom-file-label";



                  if (res[0] == 1) {
                      // console.log(res);
                      $("#eBrandFormResponse").html("Successfully Brand ( " + brandName.value + " ) Edited !");
                      setTimeout(function () {
                          $("#eBrandFormResponse").html(null);
                      }, 5000);

                      brandResposeMsg.className = "modal-title modal-form-msg mt-2 text-success";
                      $("#brandTbReload").html(atob(res[1])).show();
                  } else {
                      $("#eBrandFormResponse").html("Failed to Submitted !");
                      brandResposeMsg.className = "modal-title modal-form-msg mt-2 text-danger";
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });
      }

  });

  /*============================================================================================================================================================================================
                                                                           BrandForm edit end
  ============================================================================================================================================================================================*/
  /*============================================================================================================================================================================================
                                                                           BrandForm validation start
  ============================================================================================================================================================================================*/
  /*=================================================================================
                                      brandId validation start
      =================================================================================*/



  /*=================================================================================
                                  brandId validation end
  =================================================================================*/
  /*=================================================================================
                                    brandName validation start
    =================================================================================*/

  function brandNameValidate() {

      let brandName = document.getElementById("brandName");
      let letter_pattern = /^[A-Za-z]+$/;

      if (brandName.value == "") {
          brandName.className = "form-control field-invalid";
          document.getElementById("brandNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#brandNamErr").html(
              "Brand Name is required !"
          );
          $("#brandNamErr3").html("");

          return false;

      } else if (brandName.value.match(letter_pattern)) {
          brandName.className = "form-control field-valid";
          document.getElementById("brandNmIcon").className = "fas fa-check-circle field-icon";
          $("#brandNamErr").html(
              ""
          );

          return true;

      } else {
          brandName.className = "form-control field-invalid";
          document.getElementById("brandNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#brandNamErr").html(
              "Brand Name should not have 0-9,@,/,$,%,etc. !"
          );

          return false;

      }

  }


  /*=================================================================================
                                    brandName validation end
    =================================================================================*/


  /*=================================================================================
                                    brand description validation start
    =================================================================================*/

  function brandDesValidate() {

      let brandDes = document.getElementById("brandDes");

      if (brandDes.value == "") {
          brandDes.className = "form-control field-invalid";
          document.getElementById("brandDesIcon").className = "fas fa-exclamation-circle field-icon6";
          $("#brandDesErr").html(
              "Brand Description is required !"
          );

          return false;

      } else {
          brandDes.className = "form-control field-valid";
          document.getElementById("brandDesIcon").className = "fas fa-check-circle field-icon6";
          $("#brandDesErr").html(
              ""
          );

          return true;
      }

  }

  /*=================================================================================
                                    brand description validation end
    =================================================================================*/


  /*=================================================================================
                                    brand Image validation start
    =================================================================================*/

  function brandImgValidate() {
      let imgInputBorder = document.getElementById("brandImgInput");
      let fuData = document.getElementById("brandImg");
      let FileUploadPath = fuData.value;


      if (FileUploadPath != "") {


          let Extension = FileUploadPath.substring(
              FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

          // validating the file uploaded is an image or not

          if (Extension == "gif" || Extension == "png" || Extension == "bmp" ||
              Extension == "jpeg" || Extension == "jpg") {
              imgInputBorder.className = "custom-file-label field-valid";
              document.getElementById("brandImgIcon").className = "fas fa-check-circle field-icon3";
              $("#brandImgErr").html(
                  ""
              );
              return true;
          } else {
              imgInputBorder.className = "custom-file-label field-invalid";
              document.getElementById("brandImgIcon").className = "fas fa-exclamation-circle field-icon3";
              $("#brandImgErr").html(
                  "Only allow files of GIF, PNG, JPG, JPEG, BMP ! "
              );
              $(".custom-file-input").val(null);
              return false;
          }
      } else {
          imgInputBorder.className = "custom-file-label";
          document.getElementById("brandImgIcon").className = "";
          $("#brandImgErr").html("");
          return true;
      }
  }

  /*=================================================================================
                                    brand Image validation end
    =================================================================================*/

  /*=================================================================================
                                  brand name Existance start
  =================================================================================*/

  $("#brandName").on("input", function () {
      let brandName = $(this).val();

      if (brandName != "") {

          $.ajax({
              url: "../controller/productController.php?status=checkBrandExistance",
              type: "post",
              cache: false,
              data: {
                  brandName: brandName
              },
              success: function (res) {
                  //    console.log(res);
                  let brandName = document.getElementById("brandName");
                  if (res == "yes") {
                      brandName.className = "form-control field-invalid";
                      document.getElementById("brandNmIcon").className = "fas fa-exclamation-circle field-icon";

                      $("#brandNamErr3").html("This Brand already available !");
                      $("#brand-form-submit").prop("disabled", true);
                      $("#brand-form-edit").prop("disabled", true);
                  } else {
                      $("#brandNamErr3").html("");
                      $("#brand-form-submit").prop("disabled", false);
                      $("#brand-form-edit").prop("disabled", false);
                  }

              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });

  /*=================================================================================
                                  brand name Existance end
  =================================================================================*/

  /*============================================================================================================================================================================================
                                                                           BrandForm validation end
  ============================================================================================================================================================================================*/


  /*============================================================================================================================================================================================
                                                                           !======BrandForm end======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                           !======CategoryForm start======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                           CategoryForm submit start
  ============================================================================================================================================================================================*/

  $("#cat-form-submit").on('click', function (event) {

      if (!catNameValidate() | !catImgValidate()) {
          event.preventDefault();
      } else {
          swal({
                  title: "Are you sure?",
                  text: "This form will be submitted",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {
                      //   $("#categoryForm").submit();

                      let form = $('#categoryForm')[0];
                      let formData = new FormData(form);
                      let catResposeMsg = document.getElementById("catFormResponse");
                      let catName = document.getElementById("catName");

                      let imgInputBorder = document.getElementById("catImgInput");



                      $.ajax({

                          url: "../controller/productController.php?status=addCategory", // request url
                          data: formData,
                          processData: false,
                          dataType: "json",
                          cache: false,
                          contentType: false,
                          type: "POST",
                          success: function (res) {

                              // console.log(res);
                              $('#catImgInput').html("Choose file"); // change file input label path to another label
                              $("#prev_catImg").attr("src", "../../img/interface_images/formDefaultImg.jpg"); // remove the displayed input image

                              /* remove the font awesome icons in the input fields
                               by keeping class name empty*/
                              document.getElementById("catNmIcon").className = "";
                              document.getElementById("catImgIcon").className = "";


                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/
                              catName.className = "form-control";
                              imgInputBorder.className = "custom-file-label";

                              if (res[0] == 1) {
                                  // console.log(res);
                                  $("#catFormResponse").html("Successfully Category ( " + catName.value + " ) Added!");
                                  // erase the form values after submission of the form
                                  form.reset();
                                  setTimeout(function () {
                                      $("#catFormResponse").html(null);
                                  }, 5000);

                                  catResposeMsg.className = "modal-title modal-form-msg mt-2 text-success";
                                  $("#categoryTbReload").html(atob(res[1])).show();
                              } else {
                                  $("#catFormResponse").html("Failed to Submitted !");
                                  catResposeMsg.className = "modal-title modal-form-msg mt-2 text-danger";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });

                  }
              });
      }

  });

  /*============================================================================================================================================================================================
                                                                              CategoryForm submit end
     ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              CategoryForm reset start
     ============================================================================================================================================================================================*/

  $("#cat-form-reset").on('click', function () {

      let form = $('#categoryForm')[0];
      let catName = document.getElementById("catName");

      let imgInputBorder = document.getElementById("catImgInput");

      $('#catImgInput').html("Choose file"); // change file input label path to another label
      $("#prev_catImg").attr("src", "../../img/interface_images/formDefaultImg.jpg");

      document.getElementById("catNmIcon").className = "";
      document.getElementById("catImgIcon").className = "";

      catName.className = "form-control";
      imgInputBorder.className = "custom-file-label";

      // clear form values and error messages
      form.reset();
      $("#catNamErr").html("");
      $("#catNamErr3").html("");
      $("#catImgErr").html("");

  });

  /*============================================================================================================================================================================================
                                                                            CategoryForm reset end
   ============================================================================================================================================================================================*/

  $("#cat-form-edit").on('click', function (event) {

      if (!catNameValidate() | !catImgValidate()) {
          event.preventDefault();
      } else {
          //   $("#editCategoryForm").submit();
          let form = $('#editCategoryForm')[0];
          let formData = new FormData(form);
          let catResposeMsg = document.getElementById("eCatFormResponse");
          let catName = document.getElementById("catName");

          let imgInputBorder = document.getElementById("catImgInput");



          $.ajax({

              url: "../controller/productController.php?status=editCategory", // request url
              data: formData,
              processData: false,
              dataType: "json",
              cache: false,
              contentType: false,
              type: "POST",
              success: function (res) {

                  // console.log(res);

                  /* remove the font awesome icons in the input fields
                    by keeping class name empty*/
                  document.getElementById("catNmIcon").className = "";
                  document.getElementById("catImgIcon").className = "";


                  /* remove the field valid class in the input fields
                   by keeping class name empty to remove the validated border*/
                  catName.className = "form-control";
                  imgInputBorder.className = "custom-file-label";
                  //  console.log(res);
                  if (res[0] == 1) {

                      $("#eCatFormResponse").html("Successfully Category ( " + catName.value + " ) Edited!");
                      setTimeout(function () {
                          $("#eCatFormResponse").html(null);
                      }, 5000);

                      catResposeMsg.className = "modal-title modal-form-msg mt-2 text-success";
                      $("#categoryTbReload").html(atob(res[1])).show();
                  } else {
                      $("#eCatFormResponse").html("Failed to Submitted !");
                      catResposeMsg.className = "modal-title modal-form-msg mt-2 text-danger";
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });
      }

  });


  /*============================================================================================================================================================================================
                                                                           CategoryForm  validation start
  ============================================================================================================================================================================================*/

  /*=================================================================================
                                      categoryName validation start
      =================================================================================*/

  function catNameValidate() {

      let catName = document.getElementById("catName");
      let letter_pattern = /[A-Za-z]+$/;

      if (catName.value == "") {
          catName.className = "form-control field-invalid";
          document.getElementById("catNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#catNamErr").html(
              "Category Name is required !"
          );
          $("#catNamErr3").html("");

          return false;

      } else if (catName.value.match(letter_pattern)) {
          catName.className = "form-control field-valid";
          document.getElementById("catNmIcon").className = "fas fa-check-circle field-icon";
          $("#catNamErr").html(
              ""
          );

          return true;

      } else {
          catName.className = "form-control field-invalid";
          document.getElementById("catNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#catNamErr").html(
              "Category Name should not have 0-9,@,/,$,%,etc. !"
          );

          return false;

      }

  }


  /*=================================================================================
                                    categoryName validation end
    =================================================================================*/


  /*=================================================================================
                                    categoryImage validation start
    =================================================================================*/

  function catImgValidate() {

      let imgInputBorder = document.getElementById("catImgInput");
      let fuData = document.getElementById("catImg");
      let FileUploadPath = fuData.value;


      if (FileUploadPath != "") {


          let Extension = FileUploadPath.substring(
              FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

          // validating the file uploaded is an image or not

          if (Extension == "gif" || Extension == "png" || Extension == "bmp" ||
              Extension == "jpeg" || Extension == "jpg") {
              imgInputBorder.className = "custom-file-label field-valid";
              document.getElementById("catImgIcon").className = "fas fa-check-circle field-icon3";
              $("#catImgErr").html(
                  ""
              );
              return true;
          } else {
              imgInputBorder.className = "custom-file-label field-invalid";
              document.getElementById("catImgIcon").className = "fas fa-exclamation-circle field-icon3";
              $("#catImgErr").html(
                  "Only allow files of GIF, PNG, JPG, JPEG, BMP ! "
              );
              $(".custom-file-input").val(null);

              return false;
          }
      } else {
          imgInputBorder.className = "custom-file-label";
          document.getElementById("catImgIcon").className = "";
          $("#catImgErr").html("");
          return true;
      }

  }

  /*=================================================================================
                                    categoryImage validation end
    =================================================================================*/

  /*=================================================================================
                                   Category name Existance start
  =================================================================================*/

  $("#catName").on("input", function () {
      let catName = $(this).val();

      if (catName != "") {

          $.ajax({
              url: "../controller/productController.php?status=checkCategoryExistance",
              type: "post",
              cache: false,
              data: {
                  catName: catName
              },
              success: function (res) {
                  //    console.log(res);
                  let catName = document.getElementById("catName");
                  if (res == "yes") {
                      catName.className = "form-control field-invalid";
                      document.getElementById("catNmIcon").className = "fas fa-exclamation-circle field-icon";

                      $("#catNamErr3").html("This Category already available !");
                      $("#cat-form-submit").prop("disabled", true);
                      $("#cat-form-edit").prop("disabled", true);
                  } else {
                      $("#catNamErr3").html("");
                      $("#cat-form-submit").prop("disabled", false);
                      $("#cat-form-edit").prop("disabled", false);
                  }

              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });

  /*=================================================================================
                                  Category name Existance end
  =================================================================================*/

  /*============================================================================================================================================================================================
                                                                           CategoryForm  validation end
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                           !======CategoryForm end======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                           !======ProductForm start======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                             ProductForm submit start
  ============================================================================================================================================================================================*/


  $("#product-form-submit").on('click', function (event) {

      if (!prodNameValidate() | !prodCategoryValidate() | !prodBrandValidate()) {
          event.preventDefault();
      } else {
          swal({
                  title: "Are you sure?",
                  text: "This form will be submitted",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {
                      //   $("#productForm").submit();
                      CKEDITOR.instances['prodDescription'].updateElement(); //CKEditor  data retrieve before submission
                      let form = $('#productForm')[0];
                      let formData = new FormData(form);

                      let prodResposeMsg = document.getElementById("productFormResponse");
                      let prodName = document.getElementById("prodName");

                      $.ajax({

                          url: "../controller/productController.php?status=addProduct", // request url
                          data: formData,
                          dataType: "json",
                          processData: false,
                          cache: false,
                          contentType: false,
                          type: "POST",
                          success: function (res) {

                              //    console.log(res);

                              // remove the values in selectators select fields
                              $('#prodBrand').selectator('removeSelection');
                              $('#prodCategory').selectator('removeSelection');

                              // /* remove the font awesome icons in the input fields
                              //  by keeping class name empty*/
                              document.getElementById("prodNameIcon").className = "";

                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/
                              prodName.className = "form-control";


                              $("#prodCatErr").html("");
                              $("#prodBrandErr").html("");



                              if (res[0] == 1) {
                                  // console.log(res);
                                  $("#productFormResponse").html("Product ( " + prodName.value + " ) Added Successfully !");

                                  // erase the form values after submission of the form
                                  form.reset();
                                  CKEDITOR.instances['prodDescription'].setData(""); // Erase the ck editor data

                                  setTimeout(function () {
                                      $("#productFormResponse").html(null);
                                  }, 5000);

                                  $("#productTbReload").html(atob(res[1])).show();

                                  prodResposeMsg.className = "modal-title modal-form-msg mt-2 text-success";

                                  // Reset the File Input dropzone to default
                                  $('.file-upload-content').hide();
                                  $('.image-upload-wrap').show();
                                  $(".file-upload-input").val(null);

                              } else {
                                  $("#productFormResponse").html("Failed to Add the Product !");
                                  prodResposeMsg.className = "modal-title modal-form-msg mt-2 text-danger";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });

                  }
              });
      }

  });



  /*============================================================================================================================================================================================
                                                                             ProductForm edit start
  ============================================================================================================================================================================================*/



  $("#product-form-edit").on('click', function (event) {

      if (!prodNameValidate() | !prodCategoryValidate() | !prodBrandValidate()) {
          event.preventDefault();
      } else {

          CKEDITOR.instances['prodDescription'].updateElement(); //CKEditor  data retrieve before submission
          let form = $('#editProdForm')[0];
          let formData = new FormData(form);
          // let productId = $('#editProdId').val(); // productId Value

          let prodResposeMsg = document.getElementById("eProdFormResponse");
          let prodName = document.getElementById("prodName");

          $.ajax({

              url: "../controller/productController.php?status=editProduct", // request url
              data: formData,
              dataType: "json",
              processData: false,
              cache: false,
              contentType: false,
              type: "POST",
              success: function (res) {

                  // console.log(res);

                  /* remove the font awesome icons in the input fields
                    by keeping class name empty*/
                  document.getElementById("prodNameIcon").className = "";

                  /* remove the field valid class in the input fields
                   by keeping class name empty to remove the validated border*/

                  prodName.className = "form-control";

                  $("#prodCatErr").html("");
                  $("#prodBrandErr").html("");

                  if (res[0] == 1) {
                      // console.log(res);
                      $("#eProdFormResponse").html("Product ( " + prodName.value + " ) Modified Successfully !");
                      setTimeout(function () {
                          $("#eProdFormResponse").html(null);
                      }, 7000);
                      $('#prodImgPrevImg').html(atob(res[1])).show(); // load existing images section
                      $("#productTbReload").html(atob(res[2])).show(); // load table
                      prodResposeMsg.className = "modal-form-msg text-success";

                      // Reset the File Input dropzone to default
                      $('.file-upload-content').hide();
                      $('.image-upload-wrap').show();
                      $(".file-upload-input").val(null);

                  } else {
                      $("#eProdFormResponse").html("Failed to Modify the Phone Model !");
                      prodResposeMsg.className = "modal-form-msg text-danger";
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });


      }

  });




  /*============================================================================================================================================================================================
                                                                             ProductForm reset start
  ============================================================================================================================================================================================*/


  $("#product-form-reset").on('click', function () {

      let form = $('#productForm')[0];
      let prodName = document.getElementById("prodName");

      CKEDITOR.instances['prodDescription'].setData('');
      // remove the values in selectators select fields
      $('#prodBrand').selectator('removeSelection');
      $('#prodCategory').selectator('removeSelection');




      document.getElementById("prodNameIcon").className = "";

      // enable the product form submit
      $("#product-form-submit").prop("disabled", false);


      /* remove the field valid class in the input fields
    by keeping class name empty to remove the validated border*/
      prodName.className = "form-control";



      // clear form values and error messages
      form.reset();
      $("#prodNamErr").html("");
      $("#prodNamErr2").html("");
      $("#prodCatErr").html("");
      $("#prodBrandErr").html("");
      $("#productImgErr").html("");


  });

  //--------------------------reset for edit form---------------------------------------------

  $("#product-form-reset2").on('click', function () {



      let form = $('#editProdForm')[0];
      let prodName = document.getElementById("prodName");

      // remove the values in selectators select fields

      $('#prodBrand').selectator('destroy');
      $('#prodBrand').selectator();

      $('#prodCategory').selectator('destroy');
      $('#prodCategory').selectator();


      CKEDITOR.instances['prodDescription'].setData();
      document.getElementById("prodNameIcon").className = "";

      // enable the product form submit
      $("#product-form-edit").prop("disabled", false);


      /* remove the field valid class in the input fields
  by keeping class name empty to remove the validated border*/
      prodName.className = "form-control";

      $('.file-upload-content').hide();
      $('.image-upload-wrap').show();



      // clear form values and error messages
      form.reset();
      $("#prodNamErr").html("");
      $("#prodNamErr2").html("");
      $("#prodCatErr").html("");
      $("#prodBrandErr").html("");
      $("#productImgErr").html("");


  });


  /*============================================================================================================================================================================================
                                                                             ProductForm reset end
  ============================================================================================================================================================================================*/
  /*============================================================================================================================================================================================
                                                                               ProductForm  validation start
  ============================================================================================================================================================================================*/

  //====================================Product NAME Validate==========================================

  function prodNameValidate() {

      let prodName = document.getElementById("prodName");

      if (prodName.value == "") {
          prodName.className = "form-control field-invalid";
          document.getElementById("prodNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#prodNamErr").html(
              "Product Name is required !"
          );
          return false;

      } else {
          prodName.className = "form-control field-valid";
          document.getElementById("prodNameIcon").className = "fas fa-check-circle field-icon";
          $("#prodNamErr").html("");
          return true;

      }

  }

  //====================================Product Category Validate==========================================

  function prodCategoryValidate() {

      let prodCategory = document.getElementById("prodCategory");


      if (prodCategory.value == "") {

          $("#prodCatErr").html(
              "Product Category is required !"
          );
          return false;
      } else {
          $("#prodCatErr").html("");
          return true;
      }

  }

  //====================================Product Category Validate for Edit==========================================





  //====================================Product Brand Validate==========================================

  function prodBrandValidate() {

      let prodBrand = document.getElementById("prodBrand");

      if (prodBrand.value == "") {
          // prodCategory.className = "form-control field-invalid";
          $("#prodBrandErr").html(
              "Product Brand is required !"
          );
          return false;
      } else {
          // prodCategory.className = "form-control field-valid";
          $("#prodBrandErr").html("");
          return true;
      }

  }


  //---------------------------validate Product Image-----------------------------------
  function productImgValidate() {

      let files = document.getElementById('prodImg');
      for (let i = 0; i < files.files.length; ++i) {
          let fname = files.files.item(i).name;
          if (!isPicture(fname)) {
              $('#productImgErr').html("Only allow file types of PNG, JPEG, JPG AND BMP !");

              $('#prodImg').val(null);
              return false;
          }
      }

  }

  function isPicture(film) {
      const ext = ['.png', '.bmp', '.jpeg', '.jpg'];
      return ext.some(el => film.endsWith(el));
  }




  $("#prodName").on("input", function () {
      let prodName = $(this).val();

      if (prodName != "") {

          $.ajax({
              url: "../controller/productController.php?status=checkProductExistance",
              type: "post",
              cache: false,
              data: {
                  prodName: prodName
              },
              success: function (res) {
                  //    console.log(res);
                  let prodName = document.getElementById("prodName");
                  if (res == "yes") {
                      prodName.className = "form-control field-invalid";
                      document.getElementById("prodNameIcon").className = "fas fa-exclamation-circle field-icon";

                      $("#prodNamErr2").html("This Product Name already available !");
                      $("#product-form-submit").prop("disabled", true);
                      $("#product-form-edit").prop("disabled", true);
                  } else {
                      $("#prodNamErr2").html("");
                      $("#product-form-submit").prop("disabled", false);
                      $("#product-form-edit").prop("disabled", false);
                  }

              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });



  /*============================================================================================================================================================================================
                                                                               ProductForm  validation end
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                                 Filter ProductTable START 
    ============================================================================================================================================================================================*/
  //-------------------------------filter button---------------------------------------------------------
  $('#filter-button').on('click', function () {
      var table = $('#productTable').DataTable();
      //build a regex filter string with an or(|) condition
      var state = $('input:radio[name="pState"]:checked').map(function () {
          if (state != "") {
              return this.value;
          } else {
              return false;
          }

      }).get().join('|');

      //filter in column 1, with an regex, no smart filtering, not case sensitive
      table.column(6).search(state, true, false, false).draw(false);

      //build a filter string with an or(|) condition
      var category = $('input:checkbox[name="pCategory"]:checked').map(function () {
          return this.value;
      }).get().join('|');

      //now filter in column 2, with no regex, no smart filtering, not case sensitive
      table.column(3).search(category, true, false, false).draw(false);

  });

  // -----------------------------------------reset button ------------------------------------------------

  $('#filter-reset').on('click', function () {
      // var table = $('#productTable').DataTable();
      // table.draw(true);

      $('#column_name').selectpicker('refresh');
      $("#productTbReload").load("tables/productTable.php");


  });

  //----------------------------------------------COLUMN VISIBLE------------------------------------------

  $('#column_name').on('change', function () {
      let dataTable2 = $("#productTable").DataTable();
      let all_column = ["0", "1", "2", "3", "4", "5", "6"];

      let remove_column = $('#column_name').val();

      let remain_column = all_column.filter(function (obj) {

          return remove_column.indexOf(obj) < 0;

      });

      dataTable2.columns(remove_column).visible(false);
      dataTable2.columns(remain_column).visible(true);

  });



  /*============================================================================================================================================================================================
                                                                                 Filter ProductTable 
    ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              !======ProductForm end======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              !======Product_FeatureForm start======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                               Product_featureForm submit start
    ============================================================================================================================================================================================*/


  $("#feature-form-submit").on('click', function (event) {

      if (!fProductCatValid() | !featureCatValidate() | !featureTypeValidate() | !featureNameValidate()) {
          event.preventDefault();
      } else {
          swal({
                  title: "Are you sure?",
                  text: "This form will be submitted",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {
                      //   $("#featureForm").submit();

                      let form = $('#featureForm')[0];
                      let formData = new FormData(form);
                      let featureResposeMsg = document.getElementById("featureFormResponse");


                      let featureName = document.getElementById("featureName");

                      $.ajax({

                          url: "../controller/productController.php?status=addProductFeature", // request url
                          data: formData,
                          processData: false,
                          dataType: "json",
                          cache: false,
                          contentType: false,
                          type: 'POST',
                          success: function (result) {

                              // console.log(res);

                              /* remove the font awesome icons in the input fields
                                by keeping class name empty*/

                              document.getElementById("featureNameIcon").className = "";
                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/

                              featureName.className = "form-control";

                              // erase the form values after submission of the form
                              featureName.value = null;

                              if (result[0] == 1) {
                                  // console.log(res);
                                  $("#featureFormResponse").html("Feature Added Successfully !");

                                  setTimeout(function () {
                                      $("#featureFormResponse").html(null);
                                  }, 5000);

                                  featureResposeMsg.className = "modal-form-msg text-success";
                                  $('#featureTbReload').html(atob(result[1])).show();
                              } else {
                                  $("#featureFormResponse").html("Failed to Add the Feature !");
                                  featureResposeMsg.className = "modal-form-msg text-danger";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });

                  }
              });
      }

  });
  /*============================================================================================================================================================================================
                                                                                Product_featureForm submit end
     ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                             Product_featureForm reset start
  ============================================================================================================================================================================================*/



  /*============================================================================================================================================================================================
                                                                             Product_featureForm reset end
  ============================================================================================================================================================================================*/


  $("#feature-form-reset").on('click', function () {

      let form = $('#featureForm')[0];
      let featureCat = document.getElementById("featureCat");
      let featureType = document.getElementById("featureType");
      let featureName = document.getElementById("featureName");


      /* remove the font awesome icons in the input fields
       by keeping class name empty*/
      document.getElementById("featureCatIcon").className = "";
      document.getElementById("featureTypeIcon").className = "";
      document.getElementById("featureNameIcon").className = "";

      // remove the values in selectators select fields
      $('#productCat').selectator('removeSelection');

      /* remove the field valid class in the input fields
      by keeping class name empty to remove the validated border*/
      featureCat.className = "form-control";
      featureType.className = "form-control";
      featureName.className = "form-control";

      //disable the radio and text field
      document.getElementById("stateF1").disabled = true; // disabled radio
      document.getElementById("stateF1").checked = false; // radio unchecked
      document.getElementById("stateF2").disabled = true; // disabled radio
      document.getElementById("stateF3").disabled = true; // disabled radio
      document.getElementById("searchFeature").disabled = true; // disabled text field
      featureCat.disabled = true; // disabled feature category selection
      featureType.disabled = true; // disabled feature type selection
      featureName.disabled = true; // disabled feature name selection

      $("#featureTbReload").html("");


      // clear form values and error messages
      form.reset();
      $("#featureCatErr").html("");
      $("#featureTypeErr").html("");
      $("#featureNamErr").html("");
      $("#featureNamErr2").html("");

  });


  /*============================================================================================================================================================================================
                                                                                 Product_FeatureForm  validation start
    ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                               Validate Product_Feature Category
  ============================================================================================================================================================================================*/
  function fProductCatValid() {

      let fProdCat = document.getElementById("fProductCat");

      if (fProdCat.value == "") {

          $("#fProdCatErr").html(
              "Product Category is required !"
          );
          $("#featureTbReload").html("");
          return false;
      } else {

          $("#fProdCatErr").html("");
          return true;
      }

  }

  function featureCatValidate() {

      let featureCat = document.getElementById("featureCat");

      if (featureCat.value == "") {
          featureCat.className = "form-control field-invalid";
          document.getElementById("featureCatIcon").className = "fas fa-exclamation-circle field-icon";
          document.getElementById("featureTbReload").innerHTML = "";
          document.getElementById("stateF1").disabled = true; // disabled radio1
          document.getElementById("stateF1").checked = false; // unchecked radio1
          document.getElementById("stateF2").disabled = true; // disabled radio2
          document.getElementById("stateF2").checked = false; // unchecked radio2
          document.getElementById("stateF3").disabled = true; // disabled radio3
          document.getElementById("stateF3").checked = false; // unchecked radio3
          document.getElementById("searchFeature").disabled = true; // disabled text field
          document.getElementById("featureName").disabled = true; // disabled feature name field
          $("#featureCatErr").html(
              "Feature Category is required !"
          );
          return false;

      } else {
          featureCat.className = "form-control field-valid";
          document.getElementById("featureCatIcon").className = "fas fa-check-circle field-icon";
          $("#featureCatErr").html("");
          document.getElementById("featureName").disabled = false; // disabled feature name field
          return true;

      }

  }

  /*============================================================================================================================================================================================
                                                                                 Validate Product_Feature Type
    ============================================================================================================================================================================================*/

  function featureTypeValidate() {

      let featureType = document.getElementById("featureType");

      if (featureType.value == "") {
          featureType.className = "form-control field-invalid";
          document.getElementById("featureTypeIcon").className = "fas fa-exclamation-circle field-icon8";
          $("#featureTypeErr").html(
              "Feature Type is required !"
          );
          return false;

      } else {
          featureType.className = "form-control field-valid";
          document.getElementById("featureTypeIcon").className = "fas fa-check-circle field-icon8";
          $("#featureTypeErr").html("");
          return true;

      }

  }


  /*============================================================================================================================================================================================
                                                                                 Validate Product_Feature Name
    ============================================================================================================================================================================================*/

  function featureNameValidate() {

      let featureName = document.getElementById("featureName");

      if (featureName.value == "") {
          featureName.className = "form-control field-invalid";
          document.getElementById("featureNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#featureNamErr").html(
              "Feature Name is required !"
          );
          return false;

      } else {
          featureName.className = "form-control field-valid";
          document.getElementById("featureNameIcon").className = "fas fa-check-circle field-icon";
          $("#featureNamErr").html("");
          return true;

      }

  }

  /*=================================================================================
                                    Feature Existance start
    =================================================================================*/
  $("#featureName").on("input", function () {

      let featureName = $(this).val();
      let featureTypeId = document.getElementById("featureType").value;

      if (featureName != "") {


          $.ajax({
              method: "POST",
              url: "../controller/productController.php?status=checkFeatureExistance",
              data: {
                  featureName: featureName,
                  featureTypeId: featureTypeId
              },

              success: function (res) {

                  //   console.log(res);
                  let featureName = document.getElementById("featureName");
                  if (res == "yes") {
                      featureName.className = "form-control field-invalid";
                      document.getElementById("featureNameIcon").className = "fas fa-exclamation-circle field-icon";

                      $("#featureNamErr2").html("This Feature already available in Feature type !");
                      $("#feature-form-submit").prop("disabled", true);
                  } else {
                      $("#featureNamErr2").html("");
                      $("#feature-form-submit").prop("disabled", false);
                  }

              },
              error: function () {
                  alert('Ajax Error');
              }
          });
      }
  });



  /*============================================================================================================================================================================================
                                                                                 Product_FeatureForm  validation end
    ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              !======Product_FeatureForm end======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              !======Product_ModelForm start======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                                      Phone_ModelForm submit start
    ============================================================================================================================================================================================*/

  $("#phone-model-form-submit").on('click', function (event) {

      if (!validatePhoneModelName() | !validatePhoneModPrice()) {
          event.preventDefault();
      } else {
          swal({
                  title: "Are you sure?",
                  text: "This form will be submitted",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {
                      //   $("#prodModelForm").submit();

                      let form = $('#phoneModelForm')[0];
                      let formData = new FormData(form);
                      //   let productId = $('#productId').val(); // productId Value
                      let modelResposeMsg = document.getElementById("prodModelFormResponse");
                      let phoneModelName = document.getElementById("phoneModelName");

                      $.ajax({

                          url: "../controller/productController.php?status=addPhoneModel", // request url
                          data: formData,
                          processData: false,
                          dataType: "json",
                          cache: false,
                          contentType: false,
                          type: "POST",
                          success: function (res) {

                              // console.log(res);

                              /* remove the font awesome icons in the input fields
                                by keeping class name empty*/

                              document.getElementById("phModelNmIcon").className = "";
                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/

                              phoneModelName.className = "form-control";



                              if (res[0] == 1) {
                                  // console.log(res);
                                  $("#prodModelFormResponse").html("Phone Model Added Successfully !");
                                  // erase the form values after submission of the form
                                  form.reset();
                                  setTimeout(function () {
                                      $("#prodModelFormResponse").html(null);
                                  }, 5000);

                                  modelResposeMsg.className = "modal-form-msg text-success";
                                  $('#productModelTbReload').html(atob(res[1])).show();

                                  // Reset the File Input dropzone to default
                                  $('.file-upload-content').hide();
                                  $('.image-upload-wrap').show();
                                  $(".file-upload-input").val(null);
                              } else {
                                  $("#prodModelFormResponse").html("Failed to Add the Phone Model !");
                                  modelResposeMsg.className = "modal-form-msg text-danger";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });

                  }
              });
      }

  });

  /*============================================================================================================================================================================================
                                                                                      Phone_ModelForm submit end
   ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                                        Phone_ModelForm Edit START
     ============================================================================================================================================================================================*/

  $("#phone-model-form-edit").on('click', function (event) {

      if (!validatePhoneModelName() | !validatePhoneModPrice()) {
          event.preventDefault();
      } else {


          let form = $('#editPhoneModelForm')[0];
          let formData = new FormData(form);
          let modelResposeMsg = document.getElementById("prodModelEditResponse");
          let phoneModelName = document.getElementById("phoneModelName");

          $.ajax({

              url: "../controller/productController.php?status=editPhoneModel", // request url
              data: formData,
              dataType: "json",
              processData: false,
              cache: false,
              contentType: false,
              type: 'POST',
              success: function (res) {

                  // console.log(res);

                  /* remove the font awesome icons in the input fields
                    by keeping class name empty*/

                  document.getElementById("phModelNmIcon").className = "";
                  /* remove the field valid class in the input fields
                   by keeping class name empty to remove the validated border*/

                  phoneModelName.className = "form-control";


                  if (res[0] == 1) {
                      // console.log(res);
                      $("#prodModelEditResponse").html("Phone Model Modified Successfully !");
                      setTimeout(function () {
                          $("#prodModelEditResponse").html(null);
                      }, 8000);

                      $('#phImgPrevImg').html(atob(res[1])).show();
                      $('#productModelTbReload').html(atob(res[2])).show();
                      modelResposeMsg.className = "modal-form-msg text-success";

                      // Reset the File Input dropzone to default
                      $('.file-upload-content').hide();
                      $('.image-upload-wrap').show();
                      $(".file-upload-input").val(null);

                  } else {
                      $("#prodModelEditResponse").html("Failed to Modify the Phone Model !");
                      modelResposeMsg.className = "modal-form-msg text-danger";
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });


      }

  });

  /*============================================================================================================================================================================================
                                                                                        Phone_ModelForm Edit END
     ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                                     Phone_ModelForm Reset START
  ============================================================================================================================================================================================*/

  $("#phone-model-form-reset").on('click', function () {

      let form = $('#phoneModelForm')[0];
      let phoneModelName = document.getElementById("phoneModelName");
      let price = document.getElementById("phoneModPrice");



      // Remove the icon on field
      document.getElementById("phModelNmIcon").className = "";
      document.getElementById("phModelPricIcon").className = "";
      /* remove the field valid class in the input fields
      by keeping class name empty to remove the validated border*/
      phoneModelName.className = "form-control";
      price.className = "form-control";

      // Reset the File Input dropzone to default
      $('.file-upload-content').hide();
      $('.image-upload-wrap').show();
      $(".file-upload-input").val(null);

      // clear form values and error messages
      form.reset();
      $("#phModelNmErr").html("");
      $("#phModelNmErr2").html("");
      $("#phModelPricErr").html("");


  });

  $("#phone-model-form-reset2").on('click', function () {

      let form = $('#editPhoneModelForm')[0];
      let phoneModelName = document.getElementById("phoneModelName");
      let price = document.getElementById("phoneModPrice");

      // Remove the icon on field
      document.getElementById("phModelNmIcon").className = "";
      document.getElementById("phModelPricIcon").className = "";
      /* remove the field valid class in the input fields
      by keeping class name empty to remove the validated border*/
      phoneModelName.className = "form-control";
      price.className = "form-control";

      // Reset the File Input dropzone to default
      $('.file-upload-content').hide();
      $('.image-upload-wrap').show();


      // clear form values and error messages
      form.reset();
      $("#phModelNmErr").html("");
      $("#phModelNmErr2").html("");
      $("#phModelPricErr").html("");


  });

  /*============================================================================================================================================================================================
                                                                                     Phone_ModelForm Reset END
  ============================================================================================================================================================================================*/



  /*============================================================================================================================================================================================
                                                                                Product_ModelForm  validation start
   ============================================================================================================================================================================================*/

  //==================================validate Product Model Name=======================================


  function validatePhoneModelName() {
      let phoneModelName = document.getElementById("phoneModelName");

      if (phoneModelName.value == "") {
          phoneModelName.className = "form-control field-invalid";
          document.getElementById("phModelNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#phModelNmErr").html(
              "Product Model Name is required !"
          );
          return false;

      } else {
          phoneModelName.className = "form-control field-valid";
          document.getElementById("phModelNmIcon").className = "fas fa-check-circle field-icon";
          $("#phModelNmErr").html("");
          return true;

      }
  }


  //==================================validate phone prices=======================================


  //////////////////leading zeros//////
  $('#phoneModPrice').on('blur', function () {
      $(this).val(parseFloat($(this).val(), 20).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1').toString());
  });



  $('#phoneModPrice').on('focus', function () {
      if (this.value == "NaN") {
          this.value = '';
      }
  });

  function validatePhoneModPrice() {

      let price = document.getElementById("phoneModPrice");


      if (price.value == "" | price.value == "NaN") {
          price.className = "form-control field-invalid";
          document.getElementById("phModelPricIcon").className = "fas fa-exclamation-circle field-icon7";
          $("#phModelPricErr").html(
              "Product Model Price is required !"
          );
          return false;

      } else {
          price.className = "form-control field-valid";
          document.getElementById("phModelPricIcon").className = "fas fa-check-circle field-icon7";
          $("#phModelPricErr").html("");
          return true;

      }

  }




  //==================================validate Product Model Images=======================================

  function phoneModImgValidate() {

      let files = document.getElementById('phModImg');
      for (let i = 0; i < files.files.length; ++i) {
          let fname = files.files.item(i).name;
          if (!isPicture(fname)) {
              $('#phModImgErr').html("Only allow file types of PNG, JPEG, JPG AND BMP !");

              $('#phModImg').val(null);
              return false;
          }
      }

  }

  // ========================================validate phone model name existance according to product Id================================


  $("#phoneModelName").on("input", function () {
      let phModName = $(this).val();

      if (phModName != "") {

          $.ajax({
              url: "../controller/productController.php?status=checkPhoneModelExistance",
              type: "post",
              cache: false,
              data: {
                  phModName: phModName
              },
              success: function (res) {
                  //    console.log(res);
                  let phModName = document.getElementById("phoneModelName");
                  if (res == "yes") {
                      phModName.className = "form-control field-invalid";
                      document.getElementById("prodNameIcon").className = "fas fa-exclamation-circle field-icon";

                      $("#phModelNmErr2").html("This Product Name already available !");
                      $("#product-form-submit").prop("disabled", true);
                  } else {
                      $("#phModelNmErr2").html("");
                      $("#product-form-submit").prop("disabled", false);
                  }

              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });



  /*============================================================================================================================================================================================
                                                                                 Product_ModelForm  validation end
    ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              !======Product_ModelForm start======
  ============================================================================================================================================================================================*/
  /*============================================================================================================================================================================================
                                                                                 Filter ProductModel Table START 
    ============================================================================================================================================================================================*/

  //-------------------------------filter button---------------------------------------------------------
  $('#filter-button2').on('click', function () {
      var table = $('#phoneModelTable').DataTable();
      //build a regex filter string with an or(|) condition
      var state = $('input:radio[name="pModstate"]:checked').map(function () {
          if (state != "") {
              return this.value;
          } else {
              return false;
          }

      }).get();

      //filter in column 1, with an regex, no smart filtering, not case sensitive
      table.column(4).search(state, true, false, false).draw(false);

      //    alert('hello');
  });

  // -----------------------------------------reset button ------------------------------------------------

  $('#filter-reset2').on('click', function () {
      // var table = $('#productTable').DataTable();
      // table.draw(true);
      let productId = $('#tbProductId').val(); // get product Id from product model table page
      $('#column_name2').selectpicker('refresh');
      $("#productModelTbReload").load("../view/tables/productModelTable.php?id=" + productId);




  });

  //----------------------------------------------COLUMN VISIBLE------------------------------------------

  $('#column_name2').on('change', function () {

      let all_column = ["0", "1", "2", "3", "4"];

      let remove_column = $('#column_name2').val();

      let remain_column = all_column.filter(function (obj) {

          return remove_column.indexOf(obj) < 0;

      });

      dataTable3.columns(remove_column).visible(false);
      dataTable3.columns(remain_column).visible(true);

  });

  /*============================================================================================================================================================================================
                                                                               Filter ProductModel Table END 
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              !======Headphone_ModelForm start======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              Headphone_ModelForm Submit Start
  ============================================================================================================================================================================================*/
  $("#hpModel-form-submit").on('click', function (event) {

      if (!validateHdModelName() | !validateHdPhoneModPrice()) {
          event.preventDefault();
      } else {

          swal({
                  title: "Are you sure?",
                  text: "This form will be submitted",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {
                      //   $("#productForm").submit();

                      CKEDITOR.instances['hdModDescrip'].updateElement(); //CKEditor  data retrieve before submission
                      let form = $('#hdPhoneModelForm')[0];
                      let formData = new FormData(form);

                      let prodResposeMsg = document.getElementById("prodModelFormResponse");
                      let hdModelNm = document.getElementById("hdModelName");
                      let price = document.getElementById("hdModPrice");


                      $.ajax({

                          url: "../controller/productController.php?status=addHeadphoneModel", // request url
                          data: formData,
                          processData: false,
                          dataType: "json",
                          cache: false,
                          contentType: false,
                          type: 'POST',
                          success: function (result) {

                              // console.log(res);

                              /* remove the font awesome icons in the input fields
                                by keeping class name empty*/
                              document.getElementById("hdModelNmIcon").className = "";
                              document.getElementById("hdModelPricIcon").className = "";

                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/

                              hdModelNm.className = "form-control";
                              price.className = "form-control";

                              form.reset();
                              CKEDITOR.instances['hdModDescrip'].setData("");

                              if (result[0] == 1) {
                                  // console.log(res);
                                  $("#prodModelFormResponse").html("Headphone Model Added Successfully !");
                                  setTimeout(function () {
                                      $("#prodModelFormResponse").html(null);
                                  }, 8000);

                                  prodResposeMsg.className = "modal-form-msg text-success";

                                  $('#productModelTbReload').html(atob(result[1])).show();

                                  // Reset the File Input dropzone to default
                                  $('.file-upload-content').hide();
                                  $('.image-upload-wrap').show();
                                  $(".file-upload-input").val(null);

                              } else {
                                  $("#prodModelFormResponse").html("Failed to add the Headphone Model !");
                                  prodResposeMsg.className = "modal-form-msg text-danger";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });

                  }
              });
      }

  });

  /*============================================================================================================================================================================================
                                                                                Headphone_ModelForm Submit End
    ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              Headphone_ModelForm Edit Start
  ============================================================================================================================================================================================*/


  $("#hpModel-form-edit").on('click', function (event) {

      if (!validateHdModelName() | !validateHdPhoneModPrice()) {
          event.preventDefault();
      } else {

          CKEDITOR.instances['hdModDescrip'].updateElement(); //CKEditor  data retrieve before submission
          let form = $('#editHdPhoneModelForm')[0];
          let formData = new FormData(form);

          let prodResposeMsg = document.getElementById("prodModelEditResponse");
          let hdModelNm = document.getElementById("hdModelName");
          let price = document.getElementById("hdModPrice");


          $.ajax({

              url: "../controller/productController.php?status=editHeadphoneModel", // request url
              data: formData,
              processData: false,
              dataType: "json",
              cache: false,
              contentType: false,
              type: 'POST',
              success: function (result) {

                  // console.log(result);

                  /* remove the font awesome icons in the input fields
                    by keeping class name empty*/
                  document.getElementById("hdModelNmIcon").className = "";
                  document.getElementById("hdModelPricIcon").className = "";

                  /* remove the field valid class in the input fields
                   by keeping class name empty to remove the validated border*/

                  hdModelNm.className = "form-control";
                  price.className = "form-control";

                  if (result[0] == 1) {
                      // console.log(res);
                      $("#prodModelEditResponse").html("HeadPhone Model Modified Successfully !");
                      setTimeout(function () {
                          $("#prodModelEditResponse").html(null);
                      }, 8000);

                      prodResposeMsg.className = "modal-form-msg text-success";

                      $('#hdpImgPrevImg').html(atob(result[1])).show();
                      $('#productModelTbReload').html(atob(result[2])).show();

                      // Reset the File Input dropzone to default
                      $('.file-upload-content').hide();
                      $('.image-upload-wrap').show();
                      $(".file-upload-input").val(null);

                  } else {
                      $("#prodModelEditResponse").html("Failed to edit the Headphone Model !");
                      prodResposeMsg.className = "modal-form-msg text-danger";
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });


      }

  });


  /*============================================================================================================================================================================================
                                                                              Headphone_ModelForm Edit End
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              Headphone_ModelForm Reset Start
  ============================================================================================================================================================================================*/


  $("#hpModel-form-reset").on('click', function (event) {
      let form = $('#phoneModelForm')[0];
      let hdModelNm = document.getElementById("hdModelName");
      let price = document.getElementById("hdModPrice");


      CKEDITOR.instances['hdModDescrip'].setData(''); //clear ckeditor field value
      // Remove the icon on field
      document.getElementById("hdModelNmIcon").className = "";
      document.getElementById("hdModelPricIcon").className = "";
      /* remove the field valid class in the input fields
      by keeping class name empty to remove the validated border*/
      hdModelNm.className = "form-control";
      price.className = "form-control";


      // Reset the File Input dropzone to default
      $('.file-upload-content').hide();
      $('.image-upload-wrap').show();


      // clear form values and error messages
      form.reset();
      $("#hdModelNmErr").html("");
      $("#hdModelNmErr2").html("");
      $("#hdModelPricErr").html("");


  });

  $("#hpModel-form-reset2").on('click', function (event) {
      let form = $('#phoneModelForm')[0];
      let hdModelNm = document.getElementById("hdModelName");
      let price = document.getElementById("hdModPrice");


      CKEDITOR.instances['hdModDescrip'].setData(); //clear ckeditor field value
      // Remove the icon on field
      document.getElementById("hdModelNmIcon").className = "";
      document.getElementById("hdModelPricIcon").className = "";
      /* remove the field valid class in the input fields
      by keeping class name empty to remove the validated border*/
      hdModelNm.className = "form-control";
      price.className = "form-control";


      // Reset the File Input dropzone to default
      $('.file-upload-content').hide();
      $('.image-upload-wrap').show();


      // clear form values and error messages
      form.reset();
      $("#hdModelNmErr").html("");
      $("#hdModelNmErr2").html("");
      $("#hdModelPricErr").html("");


  });




  /*============================================================================================================================================================================================
                                                                              Headphone_ModelForm Validation Start
  ============================================================================================================================================================================================*/
  //--------------------------------------------validate model name--------------------------------------------
  function validateHdModelName() {
      let hdModelNm = document.getElementById("hdModelName");

      if (hdModelNm.value == "") {
          hdModelNm.className = "form-control field-invalid";
          document.getElementById("hdModelNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#hdModelNmErr").html(
              "Headphone Model Name is required !"
          );
          return false;

      } else {
          hdModelNm.className = "form-control field-valid";
          document.getElementById("hdModelNmIcon").className = "fas fa-check-circle field-icon";
          $("#hdModelNmErr").html("");
          return true;

      }
  }

  //------------------------------------------validate model price-------------------------------


  $('#hdModPrice').on('blur', function () {
      $(this).val(parseFloat($(this).val(), 20).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1').toString());
  });



  $('#hdModPrice').on('focus', function () {
      if (this.value == "NaN") {
          this.value = '';
      }
  });

  function validateHdPhoneModPrice() {

      let price = document.getElementById("hdModPrice");


      if (price.value == "" | price.value == "NaN") {
          price.className = "form-control field-invalid";
          document.getElementById("hdModelPricIcon").className = "fas fa-exclamation-circle field-icon7";
          $("#hdModelPricErr").html(
              "Product Model Price is required !"
          );
          return false;

      } else {
          price.className = "form-control field-valid";
          document.getElementById("hdModelPricIcon").className = "fas fa-check-circle field-icon7";
          $("#hdModelPricErr").html("");
          return true;

      }

  }
  /*============================================================================================================================================================================================
                                                                              Headphone_ModelForm Validation End
  ============================================================================================================================================================================================*/

  //----------------------------------------------COLUMN VISIBLE------------------------------------------

  $('#column_name2').on('change', function () {

      let all_column = ["0", "1", "2", "3", "4"];

      let remove_column = $('#column_name2').val();

      let remain_column = all_column.filter(function (obj) {

          return remove_column.indexOf(obj) < 0;

      });

      dataTable4.columns(remove_column).visible(false);
      dataTable4.columns(remain_column).visible(true);

  });

  //----------------------------------------Filter Table--------------------------------------------------------------

  $('#filter-button2').on('click', function () {
      var table = $('#hdModelTable').DataTable();
      //build a regex filter string with an or(|) condition
      var state = $('input:radio[name="pModstate"]:checked').map(function () {
          if (state != "") {
              return this.value;
          } else {
              return false;
          }

      }).get();

      //filter in column 1, with an regex, no smart filtering, not case sensitive
      table.column(4).search(state, true, false, false).draw(false);

      //    alert('hello');
  });
  /*============================================================================================================================================================================================
                                                                              !======Headphone_ModelForm end======
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              CUSTOMER MANAGEMENT START
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                                Customer Form Submit
    ============================================================================================================================================================================================*/

  $("#customer-form-submit").on('click', function (event) {

      if (!firstNameValidateC() | !lastNameValidateC() | !dobValidateC() | !dobNicValidateC() | !genderValidateC() | !nicValidateC() | !contactValidateC() | !mobileValidateC() | !landlineValidateC() | !addressValidateC() | !emailValidateC() | !cityValidateC() | !postalCodeC()) {
          event.preventDefault();
      } else {
          swal({
                  title: "Are you sure?",
                  text: "This form will be submitted",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {

                      //  $('#customerForm').submit();


                      let form = $('#customerForm')[0];
                      let formData = new FormData(form);
                      let custResposeMsg = document.getElementById("custFormResponse");
                      let firstName = document.getElementById("firstName");
                      let lastName = document.getElementById("lastName");
                      let dob = document.getElementById("dob");
                      let nic = document.getElementById("cNic");
                      let mobileNo = document.getElementById("mobileNo");
                      let landlineNo = document.getElementById("landlineNo");
                      let address1 = document.getElementById("address1");
                      let address2 = document.getElementById("address2");
                      let emailAddress = document.getElementById("cEmailAddress");
                      let city = document.getElementById("city");
                      let postCode = document.getElementById("postCode");
                      let imgInputBorder = document.getElementById("proImgInput");



                      $.ajax({

                          url: "../controller/customerController.php?status=addCustomer", // request url
                          data: formData,
                          processData: false,
                          dataType: "json",
                          cache: false,
                          contentType: false,
                          type: "POST",
                          success: function (res) {

                              // console.log(res);
                              $('#proImgInput').html("Choose file"); // change file input label path to another label

                              $("#prev_cProfileImg").attr("src", "../../img/interface_images/formDefaultImg.jpg"); // remove the displayed input image



                              /* remove the font awesome icons in the input fields
                               by keeping class name empty*/
                              document.getElementById("firstNameIcon").className = "";
                              document.getElementById("lastNameIcon").className = "";
                              document.getElementById("genderIcon").className = "";
                              document.getElementById("nicIcon").className = "";
                              document.getElementById("mobileIcon").className = "";
                              document.getElementById("landlineIcon").className = "";
                              document.getElementById("addressIcon").className = "";
                              document.getElementById("addressIcon2").className = "";
                              document.getElementById("emailIcon").className = "";
                              document.getElementById("cityIcon").className = "";
                              document.getElementById("profileIcon").className = "";
                              document.getElementById("pCodeIcon").className = "";



                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/
                              firstName.className = "form-control";
                              lastName.className = "form-control";
                              dob.className = "form-control";
                              nic.className = "form-control";
                              mobileNo.className = "form-control";
                              landlineNo.className = "form-control";
                              address1.className = "form-control address-field";
                              address2.className = "form-control";
                              emailAddress.className = "form-control";
                              city.className = "form-control";
                              postCode.className = "form-control";
                              imgInputBorder.className = "custom-file-label";



                              if (res[0] == 1) {

                                  $("#custFormResponse").html("Successfully Customer ( " + firstName.value + " " + lastName.value + " ) Added !");
                                  // erase the form values after submission of the form
                                  form.reset();
                                  setTimeout(function () {
                                      $("#custFormResponse").html(null);
                                  }, 5000);
                                  custResposeMsg.className = "modal-title modal-form-msg text-success pt-2";
                                  $('#customerTbReload').html(atob(res[1])).show();
                              } else {
                                  $("#custFormResponse").html("Failed to add the customer !");
                                  custResposeMsg.className = "modal-title modal-form-msg text-danger pt-2";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });
                  }
              });
          return false;
      }

  });

  /*============================================================================================================================================================================================
                                                                                Customer Form Edit
    ============================================================================================================================================================================================*/


  $("#customer-form-edit").on('click', function (event) {
      if (!firstNameValidateC() | !lastNameValidateC() | !dobValidateC() | !dobNicValidateC() | !genderValidateC() | !nicValidateC() | !contactValidateC() | !mobileValidateC() | !landlineValidateC() | !addressValidateC() | !emailValidateC() | !cityValidateC() | !postalCodeC()) {
          event.preventDefault();
      } else {
          // $("#editCustomerForm").submit();
          let form = $('#editCustomerForm')[0];
          let formData = new FormData(form);
          let custResposeMsg = document.getElementById("eCustFormResponse");
          let firstName = document.getElementById("firstName");
          let lastName = document.getElementById("lastName");
          let dob = document.getElementById("dob");
          let nic = document.getElementById("cNic");
          let mobileNo = document.getElementById("mobileNo");
          let landlineNo = document.getElementById("landlineNo");
          let address1 = document.getElementById("address1");
          let address2 = document.getElementById("address2");
          let emailAddress = document.getElementById("cEmailAddress");
          let city = document.getElementById("city");
          let postCode = document.getElementById("postCode");
          let imgInputBorder = document.getElementById("proImgInput");



          $.ajax({

              url: "../controller/customerController.php?status=editCustomer", // request url
              data: formData,
              processData: false,
              dataType: "json",
              cache: false,
              contentType: false,
              type: "POST",
              success: function (res) {

                  // console.log(res);

                  /* remove the font awesome icons in the input fields
                                     by keeping class name empty*/
                  document.getElementById("firstNameIcon").className = "";
                  document.getElementById("lastNameIcon").className = "";
                  document.getElementById("genderIcon").className = "";
                  document.getElementById("nicIcon").className = "";
                  document.getElementById("mobileIcon").className = "";
                  document.getElementById("landlineIcon").className = "";
                  document.getElementById("addressIcon").className = "";
                  document.getElementById("addressIcon2").className = "";
                  document.getElementById("emailIcon").className = "";
                  document.getElementById("cityIcon").className = "";
                  document.getElementById("profileIcon").className = "";
                  document.getElementById("pCodeIcon").className = "";



                  /* remove the field valid class in the input fields
                   by keeping class name empty to remove the validated border*/
                  firstName.className = "form-control";
                  lastName.className = "form-control";
                  dob.className = "form-control";
                  nic.className = "form-control";
                  mobileNo.className = "form-control";
                  landlineNo.className = "form-control";
                  address1.className = "form-control address-field";
                  address2.className = "form-control";
                  emailAddress.className = "form-control";
                  city.className = "form-control";
                  postCode.className = "form-control";
                  imgInputBorder.className = "custom-file-label";



                  if (res[0] == 1) {

                      $("#eCustFormResponse").html("Successfully Customer ( " + nic.value + " ) Edited !");
                      setTimeout(function () {
                          $("#eCustFormResponse").html(null);
                      }, 5000);
                      custResposeMsg.className = "modal-title modal-form-msg text-success pt-2";
                      $('#customerTbReload').html(atob(res[1])).show();
                  } else {
                      $("#eCustFormResponse").html("Failed to add the customer !");
                      custResposeMsg.className = "modal-title modal-form-msg text-danger pt-2";
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });
      }
  });

  /*============================================================================================================================================================================================
                                                                              Customer Form Reset
  ============================================================================================================================================================================================*/
  $("#customer-form-reset").on('click', function (event) {
      let form = $('#customerForm')[0];
      let firstName = document.getElementById("firstName");
      let lastName = document.getElementById("lastName");
      let dob = document.getElementById("dob");
      let nic = document.getElementById("cNic");
      let mobileNo = document.getElementById("mobileNo");
      let landlineNo = document.getElementById("landlineNo");
      let address1 = document.getElementById("address1");
      let address2 = document.getElementById("address2");
      let emailAddress = document.getElementById("cEmailAddress");
      let city = document.getElementById("city");
      let postCode = document.getElementById("postCode");
      let imgInputBorder = document.getElementById("proImgInput");

      $('#proImgInput').html("Choose file"); // change file input label path to another label

      $("#prev_cProfileImg").attr("src", "../../img/interface_images/formDefaultImg.jpg"); // remove the displayed input image

      /* remove the font awesome icons in the input fields
                              by keeping class name empty*/
      document.getElementById("firstNameIcon").className = "";
      document.getElementById("lastNameIcon").className = "";
      document.getElementById("genderIcon").className = "";
      document.getElementById("nicIcon").className = "";
      document.getElementById("mobileIcon").className = "";
      document.getElementById("landlineIcon").className = "";
      document.getElementById("addressIcon").className = "";
      document.getElementById("addressIcon2").className = "";
      document.getElementById("emailIcon").className = "";
      document.getElementById("cityIcon").className = "";
      document.getElementById("profileIcon").className = "";
      document.getElementById("pCodeIcon").className = "";

      /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/
      firstName.className = "form-control";
      lastName.className = "form-control";
      dob.className = "form-control";
      nic.className = "form-control";
      mobileNo.className = "form-control";
      landlineNo.className = "form-control";
      address1.className = "form-control address-field";
      address2.className = "form-control";
      emailAddress.className = "form-control";
      city.className = "form-control";
      postCode.className = "form-control";
      imgInputBorder.className = "custom-file-label";

      // erase the form values after submission of the form
      form.reset();
      $("#firstNamErr").html("");
      $("#lastNamErr").html("");
      $("#dobErr").html("");
      $("#dobErr2").html("");
      $("#genderErr").html("");
      $("#nicErr").html("");
      $("#nicErr2").html("");
      $("#contactErr1").html("");
      $("#contactErr2").html("");
      $("#contactErr3").html("");
      $("#contactErr4").html("");
      $("#emailAddErr").html("");
      $("#profileImgErr").html("");
      $("#addressErr").html("");
      $("#cityErr").html("");
      $("#pCodeErr").html("");

  });


  /*============================================================================================================================================================================================
                                                                              Validation
  ============================================================================================================================================================================================*/
  /*===============================================================================
                                  Validate First Name
    ===============================================================================*/
  function firstNameValidateC() {
      let firstName = document.getElementById("firstName");
      let letter_pattern = /^[A-Za-z]+$/;

      if (firstName.value == "") {
          firstName.className = "form-control field-invalid";
          document.getElementById("firstNameIcon").className = "fas fa-exclamation-circle field-icon";

          $("#firstNamErr").html(
              "First Name is required !"
          );
          return false;

      } else if (firstName.value.match(letter_pattern)) {
          firstName.className = "form-control field-valid";
          document.getElementById("firstNameIcon").className = "fas fa-check-circle field-icon";
          $("#firstNamErr").html(
              ""
          );

          return true;

      } else {
          firstName.className = "form-control field-invalid";
          document.getElementById("firstNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#firstNamErr").html(
              "First Name should not have 0-9,@,/,$,%,etc. !"
          );

          return false;

      }

  }

  /*===============================================================================
                                  Validate last Name
    ===============================================================================*/

  function lastNameValidateC() {
      let lastName = document.getElementById("lastName");

      let letter_pattern = /^[A-Za-z]+$/;
      if (lastName.value == "") {
          lastName.className = "form-control field-invalid";
          document.getElementById("lastNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#lastNamErr").html(
              "Last Name is required !"
          );
          return false;
      } else if (lastName.value.match(letter_pattern)) {
          lastName.className = "form-control field-valid";
          document.getElementById("lastNameIcon").className = "fas fa-check-circle field-icon";
          $("#lastNamErr").html(
              ""
          );
          return true;

      } else {
          lastName.className = "form-control field-invalid";
          document.getElementById("lastNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#lastNamErr").html(
              "Last Name should not have 0-9,@,/,$,%,etc. !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate Date of Birth
  ===============================================================================*/
  function dobValidateC() {

      let dob = document.getElementById("dob");

      if (dob.value == "") {
          dob.className = "form-control field-invalid";

          $("#dobErr").html(
              "Date of Birth is required !"
          );
          return false;

      } else {
          let current = new Date();
          let cyear = current.getFullYear();
          let cmonth = current.getMonth();
          let cdate = current.getDate();
          //Birth Date
          let birth = new Date(dob.value);
          let byear = birth.getFullYear();
          let bmonth = birth.getMonth();
          let bdate = birth.getDate();

          let age = cyear - byear;
          let m = cmonth - bmonth;
          let d = cdate - bdate;

          if (m < 0 || (m == 0 && d < 0)) {
              age--;
          }

          if (age < 18) {
              dob.className = "form-control field-invalid";
              $("#dobErr").html(
                  "Under Age !"
              );
              return false;

          } else if (age > 60) {
              dob.className = "form-control field-invalid";
              $("#dobErr").html(
                  "Over Age !"
              );
              return false;

          } else {

              dob.className = "form-control field-valid";
              $("#dobErr").html("");
              return true;
          }
      }
  }

  /*===============================================================================
                                 Validate Date of Birth And NIC TO Match
   ===============================================================================*/
  function dobNicValidateC() {

      let dob = document.getElementById("dob");
      let nic = document.getElementById("cNic");

      if (dob.value != "" && nic.value != "") {
          let doby = dob.value.substring(0, 4);
          let nicy = nic.value.substring(0, 4);
          if (doby != nicy && nicy != doby) {
              dob.className = "form-control field-invalid";
              $("#dobErr2").html(
                  "DOB AND NIC are not matching !"
              );

              return false;
          } else {
              dob.className = "form-control field-valid";
              $("#dobErr2").html("");
              return true;
          }
      }

  }


  /*===============================================================================
                                    Validate Gender 
    ===============================================================================*/
  function genderValidateC() {
      let gender = document.getElementById("gender");

      if (this.gender[0].checked == "" && this.gender[1].checked == "") {
          gender.className = "form-check-input";
          document.getElementById("genderIcon").className = "fas fa-exclamation-circle field-icon";
          $("#genderErr").html(
              "Please select a gender !"
          );
          return false;
      } else {
          gender.className = "form-check-input";
          document.getElementById("genderIcon").className = "fas fa-check-circle field-icon";
          $("#genderErr").html(
              ""
          );
          return true;
      }
  }

  /*===============================================================================
                                Validate National Identity
  ===============================================================================*/
  function nicValidateC() {
      let nic = document.getElementById("cNic");
      let nic_pattern = "^([0-9]{9}[x|X|v|V]|[0-9]{12})$";

      if (nic.value == "") {
          nic.className = "form-control field-invalid";
          document.getElementById("nicIcon").className = "fas fa-exclamation-circle field-icon";
          $("#nicErr").html(
              "NIC number is required !"
          );
          $("#nicErr2").html("");
          return false;
      } else if (nic.value.match(nic_pattern)) {
          nic.className = "form-control field-valid";
          document.getElementById("nicIcon").className = "fas fa-check-circle field-icon";
          $("#nicErr").html(
              ""
          );
          return true;
      } else {
          nic.className = "form-control field-invalid";
          document.getElementById("nicIcon").className = "fas fa-exclamation-circle field-icon";
          $("#nicErr").html(
              "NIC is invalid !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate Contact Numbers
  ===============================================================================*/
  function contactValidateC() {
      let mobileNo = document.getElementById("mobileNo");
      let landlineNo = document.getElementById("landlineNo");

      if (mobileNo.value == "" && landlineNo.value == "") {
          document.getElementById("mobileIcon").className = "fas fa-exclamation-circle field-icon";
          document.getElementById("landlineIcon").className = "fas fa-exclamation-circle field-icon";
          mobileNo.className = "form-control field-invalid";
          landlineNo.className = "form-control field-invalid";
          $("#contactErr1").html(
              "Atleast one contact number is needed !"
          );
          $("#contactErr4").html(
              "Atleast one contact number is needed !"
          );
          return false;
      } else {
          mobileNo.className = "form-control field-valid";
          landlineNo.className = "form-control field-valid";
          $("#contactErr4").html(
              ""
          );
          $("#contactErr1").html(
              ""
          );
          return true;
      }
  }

  /*===============================================================================
                           Validate Contact Numbers:Mobile no.
  ===============================================================================*/
  function mobileValidateC() {
      let mobileNo = document.getElementById("mobileNo");
      let number_pattern1 = /^(?:0|94|\+94)?(?:7(0|1|2|4|5|6|7|8)\d)\d{6}$/;
      if (mobileNo.value != "") {
          if (mobileNo.value.match(number_pattern1)) {
              mobileNo.className = "form-control field-valid";
              document.getElementById("mobileIcon").className = "fas fa-check-circle field-icon";
              $("#contactErr2").html(
                  ""
              );
              return true;
          } else {
              mobileNo.className = "form-control field-invalid";
              document.getElementById("mobileIcon").className = "fas fa-exclamation-circle field-icon";
              $("#contactErr2").html(
                  "Mobile number is invalid !"
              );
              return false;
          }
      } else {
          // mobileNo.className = "form-control field-valid";
          // document.getElementById("mobileIcon").className = "";
          $("#contactErr2").html(
              ""
          );
          return true;
      }
  }
  //-----------------------------------------------------
  /*===============================================================================
                        Validate Contact Numbers:Landline no.
  ===============================================================================*/
  function landlineValidateC() {
      let landlineNo = document.getElementById("landlineNo");
      let number_pattern2 = /^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)\d)\d{6}$/;
      if (landlineNo.value != "") {
          if (landlineNo.value.match(number_pattern2)) {
              landlineNo.className = "form-control field-valid";
              document.getElementById("landlineIcon").className = "fas fa-check-circle field-icon";
              $("#contactErr3").html(
                  ""
              );
              return true;

          } else {
              landlineNo.className = "form-control field-invalid";
              document.getElementById("landlineIcon").className = "fas fa-exclamation-circle field-icon";
              $("#contactErr3").html(
                  "Telephone number is invalid !"
              );
              return false;
          }
      } else {
          // landlineNo.className = "form-control field-valid";
          // document.getElementById("landlineIcon").className = "";
          $("#contactErr3").html(
              ""
          );
          return true;
      }
  }

  /*===============================================================================
                                Validate Address
  ===============================================================================*/
  function addressValidateC() {
      let address1 = document.getElementById("address1");
      let address2 = document.getElementById("address2");

      if (address1.value == "" || address2.value == "") {
          address1.className = "form-control address-field field-invalid";
          document.getElementById("addressIcon").className = "fas fa-exclamation-circle field-icon4";
          address2.className = "form-control field-invalid";
          document.getElementById("addressIcon2").className = "fas fa-exclamation-circle field-icon2";
          $("#addressErr").html(
              "Address with route cannot be empty !"
          );
          return false;
      } else {
          address1.className = "form-control address-field field-valid";
          document.getElementById("addressIcon").className = "fas fa-check-circle field-icon4";
          address2.className = "form-control field-valid";
          document.getElementById("addressIcon2").className = "fas fa-check-circle field-icon2";
          $("#addressErr").html(
              ""
          );
          return true;
      }
  }

  /*===============================================================================
                                Validate E-Mail Address
  ===============================================================================*/
  function emailValidateC() {
      let emailAddress = document.getElementById("cEmailAddress");
      let email_pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$";

      if (emailAddress.value == "") {
          emailAddress.className = "form-control field-invalid";
          document.getElementById("emailIcon").className = "fas fa-exclamation-circle field-icon";
          $("#emailAddErr").html(
              "E-mail Address is required !"
          );
          return false;
      } else if (emailAddress.value.match(email_pattern)) {
          emailAddress.className = "form-control field-valid";
          document.getElementById("emailIcon").className = "fas fa-check-circle field-icon";
          $("#emailAddErr").html(
              ""
          );
          return true;
      } else {
          emailAddress.className = "form-control field-invalid";
          document.getElementById("emailIcon").className = "fas fa-exclamation-circle field-icon";
          $("#emailAddErr").html(
              "E-mail Address is not valid !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate City
  ===============================================================================*/
  function cityValidateC() {
      let city = document.getElementById("city");
      let letter_pattern = /^[A-Za-z]+$/;
      if (city.value == "") {
          city.className = "form-control field-invalid";
          document.getElementById("cityIcon").className = "fas fa-exclamation-circle field-icon";
          $("#cityErr").html(
              "City is required !"
          );
          return false;
      } else if (city.value.match(letter_pattern)) {
          city.className = "form-control field-valid";
          document.getElementById("cityIcon").className = "fas fa-check-circle field-icon";
          $("#cityErr").html(
              ""
          );
          return true;
      } else {
          city.className = "form-control field-invalid";
          document.getElementById("cityIcon").className = "fas fa-exclamation-circle field-icon";
          $("#cityErr").html(
              "should not contain any numerical / symbols !"
          );
          return false;
      }
  }

  /*===============================================================================
                                Validate Postal Code
  ===============================================================================*/

  function postalCodeC() {
      let postCode = document.getElementById("postCode");

      if (postCode.value == "") {
          postCode.className = "form-control field-invalid";
          document.getElementById("pCodeIcon").className = "fas fa-exclamation-circle field-icon";
          $("#pCodeErr").html(
              "Postal Code is required !"
          );
          return false;
      } else {
          postCode.className = "form-control field-valid";
          document.getElementById("pCodeIcon").className = "fas fa-check-circle field-icon";
          $("#pCodeErr").html(
              ""
          );
          return true;
      }
  }


  /*===============================================================================
                                Validate Profile Image
  ===============================================================================*/
  function proImgValidateC() {
      let imgInputBorder = document.getElementById("proImgInput");
      let fuData = document.getElementById("cProfileImg");
      let FileUploadPath = fuData.value;


      if (FileUploadPath != "") {


          let Extension = FileUploadPath.substring(
              FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

          // validating the file uploaded is an image or not

          if (Extension == "gif" || Extension == "png" || Extension == "bmp" ||
              Extension == "jpeg" || Extension == "jpg") {
              imgInputBorder.className = "custom-file-label field-valid";
              document.getElementById("profileIcon").className = "fas fa-check-circle field-icon3";
              $("#profileImgErr").html(
                  ""
              );
              return true;
          } else {
              imgInputBorder.className = "custom-file-label field-invalid";
              document.getElementById("profileIcon").className = "fas fa-exclamation-circle field-icon3";
              $("#profileImgErr").html(
                  "Only allow files of GIF, PNG, JPG, JPEG, BMP ! "
              );
              $(".custom-file-input").val(null);
              return false;
          }
      } else {
          imgInputBorder.className = "custom-file-label";
          document.getElementById("profileIcon").className = "";
          $("#profileImgErr").html("");
          return true;
      }
  }

  /*======================================================================================
                                    Customer Nic Existance start
    ======================================================================================*/

  $("#cNic").on("input", function () {
      let nic = $(this).val();

      if (nic != "") {

          $.ajax({
              url: "../controller/customerController.php?status=cNicExistance",
              type: "post",
              cache: false,
              data: {
                  cNic: nic
              },
              success: function (res) {
                  //    console.log(res);
                  let nic = document.getElementById("cNic");
                  if (res == "yes") {
                      nic.className = "form-control field-invalid";
                      document.getElementById("nicIcon").className = "fas fa-exclamation-circle field-icon";

                      $("#nicErr2").html("This Customer already exist !");
                      $("#customer-form-submit").prop("disabled", true);
                      $("#customer-form-edit").prop("disabled", true);
                  } else {
                      $("#nicErr2").html("");
                      $("#customer-form-submit").prop("disabled", false);
                      $("#customer-form-edit").prop("disabled", false);
                  }

              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });

  /*====================================================================================
                                  Email Existance of CUSTOMER
    ====================================================================================*/

  $("#cEmailAddress").on("input", function () {
      let emailAddress = $(this).val();

      if (emailAddress != "") {

          $.ajax({
              url: "../controller/customerController.php?status=cEmailExistance",
              type: "post",
              cache: false,
              data: {
                  cEmail: emailAddress
              },
              success: function (res) {
                  //    console.log(res);
                  let emailAddr = document.getElementById("cEmailAddress");

                  if (res == "yes") {
                      emailAddr.className = "form-control field-invalid";
                      document.getElementById("emailIcon").className = "fas fa-exclamation-circle field-icon";
                      $("#emailAddErr2").html("This Email is already taken !");
                      $("#customer-form-submit").prop("disabled", true);
                      $("#customer-form-edit").prop("disabled", true); // button area disabled if reponse return yes
                  } else {
                      $("#emailAddErr2").html("");
                      $("#customer-form-submit").prop("disabled", false);
                      $("#customer-form-edit").prop("disabled", false);
                  }
              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });

  /*============================================================================================================================================================================================
                                                                              CUSTOMER MANAGEMENT END
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              SUPPLIER MANAGEMENT START
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                                Supplier Form submit
    ============================================================================================================================================================================================*/

  $("#supp-form-submit").on('click', function (event) {

      if (!validateCompName() | !validateCompEmail() | !validateCompAddress() | !validateCompContact() | !validateContact1() | !validateContact2() | !validateSuppName() | !validateSuppAge() | !validateSuppEmail() | !validateSuppContact()) {
          event.preventDefault();
      } else {

          swal({
                  title: "Are you sure?",
                  text: "This Supplier will be Added",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((isOkay) => {

                  if (isOkay) {

                      //  $('#supplierForm').submit();


                      let form = $('#supplierForm')[0];
                      let formData = new FormData(form);
                      let suppResposeMsg = document.getElementById("suppFormResponse");
                      let compName = document.getElementById("compName");
                      let compEmail = document.getElementById("compEmail");
                      let address1 = document.getElementById("compAddr1");
                      let address2 = document.getElementById("compAddr2");
                      let address3 = document.getElementById("compAddr3");
                      let contact1 = document.getElementById("compContact1");
                      let contact2 = document.getElementById("compContact2");
                      let sName = document.getElementById("suppName");
                      let suppAge = document.getElementById("suppAge");
                      let suppEmail = document.getElementById("suppEmail");
                      let suppContact = document.getElementById("suppContact");

                      $.ajax({

                          url: "../controller/supplierController.php?status=addSupplier", // request url
                          data: formData,
                          dataType: "json",
                          processData: false,
                          cache: false,
                          contentType: false,
                          type: "POST",
                          success: function (res) {

                              /* remove the font awesome icons in the input fields
                                 by keeping class name empty*/
                              document.getElementById("compNmIcon").className = "";
                              document.getElementById("compEmIcon").className = "";
                              document.getElementById("compAddrIcon1").className = "";
                              document.getElementById("compAddrIcon2").className = "";
                              document.getElementById("compAddrIcon3").className = "";
                              document.getElementById("contactIcon1").className = "";
                              document.getElementById("contactIcon2").className = "";
                              document.getElementById("sNameIcon").className = "";
                              document.getElementById("suppEmIcon").className = "";
                              document.getElementById("suppContIcon").className = "";


                              /* remove the field valid class in the input fields
                               by keeping class name empty to remove the validated border*/
                              compName.className = "form-control";
                              compEmail.className = "form-control";
                              address1.className = "form-control";
                              address2.className = "form-control";
                              address3.className = "form-control";
                              contact1.className = "form-control";
                              contact2.className = "form-control";
                              sName.className = "form-control";
                              suppAge.className = "form-control";
                              suppEmail.className = "form-control";
                              suppContact.className = "form-control";




                              if (res[0] == 1) {

                                  $("#suppFormResponse").html("Successfully Supplier ( " + sName.value + " ) Added !");
                                  // erase the form values after submission of the form
                                  form.reset();
                                  setTimeout(function () {
                                      $("#suppFormResponse").html(null);
                                  }, 6000);

                                  suppResposeMsg.className = "modal-title modal-form-msg text-success pt-2";
                                  $("#suppTbReload").html(atob(res[1])).show();;
                              } else {
                                  $("#suppFormResponse").html("Failed to add the Supplier !");
                                  suppResposeMsg.className = "modal-title modal-form-msg text-danger pt-2";
                              }
                          },

                          error: function () {
                              alert('AJAX error !');
                          }
                      });
                  }
              });
          return false;
      }



  });



  /*============================================================================================================================================================================================
                                                                              Supplier Form edit
  ============================================================================================================================================================================================*/
  $("#supp-form-edit").on('click', function (event) {


      if (!validateCompName() | !validateCompEmail() | !validateCompAddress() | !validateCompContact() | !validateContact1() | !validateContact2() | !validateSuppName() | !validateSuppAge() | !validateSuppEmail() | !validateSuppContact()) {
          event.preventDefault();
      } else {
          //   $('#editSuppForm').submit();
          let form = $('#editSuppForm')[0];
          let formData = new FormData(form);
          let suppResposeMsg = document.getElementById("eSuppFormResponse");
          let compName = document.getElementById("compName");
          let compEmail = document.getElementById("compEmail");
          let address1 = document.getElementById("compAddr1");
          let address2 = document.getElementById("compAddr2");
          let address3 = document.getElementById("compAddr3");
          let contact1 = document.getElementById("compContact1");
          let contact2 = document.getElementById("compContact2");
          let sName = document.getElementById("suppName");
          let suppAge = document.getElementById("suppAge");
          let suppEmail = document.getElementById("suppEmail");
          let suppContact = document.getElementById("suppContact");

          $.ajax({

              url: "../controller/supplierController.php?status=editSupplier", // request url
              data: formData,
              dataType: "json",
              processData: false,
              cache: false,
              contentType: false,
              type: "POST",
              success: function (res) {

                  /* remove the font awesome icons in the input fields
                     by keeping class name empty*/
                  document.getElementById("compNmIcon").className = "";
                  document.getElementById("compEmIcon").className = "";
                  document.getElementById("compAddrIcon1").className = "";
                  document.getElementById("compAddrIcon2").className = "";
                  document.getElementById("compAddrIcon3").className = "";
                  document.getElementById("contactIcon1").className = "";
                  document.getElementById("contactIcon2").className = "";
                  document.getElementById("sNameIcon").className = "";
                  document.getElementById("suppEmIcon").className = "";
                  document.getElementById("suppContIcon").className = "";


                  /* remove the field valid class in the input fields
                   by keeping class name empty to remove the validated border*/
                  compName.className = "form-control";
                  compEmail.className = "form-control";
                  address1.className = "form-control";
                  address2.className = "form-control";
                  address3.className = "form-control";
                  contact1.className = "form-control";
                  contact2.className = "form-control";
                  sName.className = "form-control";
                  suppAge.className = "form-control";
                  suppEmail.className = "form-control";
                  suppContact.className = "form-control";




                  if (res[0] == 1) {

                      $("#eSuppFormResponse").html("Successfully Supplier ( " + sName.value + " ) Edited !");
                      // erase the form values after submission of the form
                      form.reset();
                      setTimeout(function () {
                          $("#eSuppFormResponse").html(null);
                      }, 6000);

                      suppResposeMsg.className = "modal-title modal-form-msg text-success pt-2";
                      $("#suppTbReload").html(atob(res[1])).show();;
                  } else {
                      $("#eSuppFormResponse").html("Failed to add the Supplier !");
                      suppResposeMsg.className = "modal-title modal-form-msg text-danger pt-2";
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });
      }

  });



  /*============================================================================================================================================================================================
                                                                              Supplier Form reset
  ============================================================================================================================================================================================*/

  $("#supp-form-reset").on('click', function (event) {

      let form = $('#supplierForm')[0];
      let compName = document.getElementById("compName");
      let compEmail = document.getElementById("compEmail");
      let address1 = document.getElementById("compAddr1");
      let address2 = document.getElementById("compAddr2");
      let address3 = document.getElementById("compAddr3");
      let contact1 = document.getElementById("compContact1");
      let contact2 = document.getElementById("compContact2");
      let sName = document.getElementById("suppName");
      let suppAge = document.getElementById("suppAge");
      let suppEmail = document.getElementById("suppEmail");
      let suppContact = document.getElementById("suppContact");

      /* remove the font awesome icons in the input fields
                                   by keeping class name empty*/
      document.getElementById("compNmIcon").className = "";
      document.getElementById("compEmIcon").className = "";
      document.getElementById("compAddrIcon1").className = "";
      document.getElementById("compAddrIcon2").className = "";
      document.getElementById("compAddrIcon3").className = "";
      document.getElementById("contactIcon1").className = "";
      document.getElementById("contactIcon2").className = "";
      document.getElementById("sNameIcon").className = "";
      document.getElementById("suppEmIcon").className = "";
      document.getElementById("suppContIcon").className = "";


      /* remove the field valid class in the input fields
       by keeping class name empty to remove the validated border*/
      compName.className = "form-control";
      compEmail.className = "form-control";
      address1.className = "form-control";
      address2.className = "form-control";
      address3.className = "form-control";
      contact1.className = "form-control";
      contact2.className = "form-control";
      sName.className = "form-control";
      suppAge.className = "form-control";
      suppEmail.className = "form-control";
      suppContact.className = "form-control";


      // erase the form values after submission of the form
      form.reset();

      // erase error messages
      $("#compNmError").html("");
      $("#compEmErr").html("");
      $("#compAddrErr").html("");
      $("#contactErr").html("");
      $("#contactErr1").html("");
      $("#contactErr2").html("");
      $("#sNameErr").html("");
      $("#suppAgeErr").html("");
      $("#suppEmErr").html("");
      $("#suppContErr").html("");
      $("#compNmError2").html("");
  });


  $("#supp-form-reset2").on('click', function (event) {

      let form = $('#editSuppForm')[0];
      let compName = document.getElementById("compName");
      let compEmail = document.getElementById("compEmail");
      let address1 = document.getElementById("compAddr1");
      let address2 = document.getElementById("compAddr2");
      let address3 = document.getElementById("compAddr3");
      let contact1 = document.getElementById("compContact1");
      let contact2 = document.getElementById("compContact2");
      let sName = document.getElementById("suppName");
      let suppAge = document.getElementById("suppAge");
      let suppEmail = document.getElementById("suppEmail");
      let suppContact = document.getElementById("suppContact");

      /* remove the font awesome icons in the input fields
                                   by keeping class name empty*/
      document.getElementById("compNmIcon").className = "";
      document.getElementById("compEmIcon").className = "";
      document.getElementById("compAddrIcon1").className = "";
      document.getElementById("compAddrIcon2").className = "";
      document.getElementById("compAddrIcon3").className = "";
      document.getElementById("contactIcon1").className = "";
      document.getElementById("contactIcon2").className = "";
      document.getElementById("sNameIcon").className = "";
      document.getElementById("suppEmIcon").className = "";
      document.getElementById("suppContIcon").className = "";


      /* remove the field valid class in the input fields
       by keeping class name empty to remove the validated border*/
      compName.className = "form-control";
      compEmail.className = "form-control";
      address1.className = "form-control";
      address2.className = "form-control";
      address3.className = "form-control";
      contact1.className = "form-control";
      contact2.className = "form-control";
      sName.className = "form-control";
      suppAge.className = "form-control";
      suppEmail.className = "form-control";
      suppContact.className = "form-control";


      // erase the form values after submission of the form
      form.reset();

      // erase error messages
      $("#compNmError").html("");
      $("#compEmErr").html("");
      $("#compAddrErr").html("");
      $("#contactErr").html("");
      $("#contactErr1").html("");
      $("#contactErr2").html("");
      $("#sNameErr").html("");
      $("#suppAgeErr").html("");
      $("#suppEmErr").html("");
      $("#suppContErr").html("");
      $("#compNmError2").html("");
  });

  /*============================================================================================================================================================================================
                                                                                    VALIDATION
  ============================================================================================================================================================================================*/
  //-------------------------validate company name------------------------------

  function validateCompName() {
      let compName = document.getElementById("compName");

      if (compName.value == "") {
          compName.className = "form-control field-invalid";
          document.getElementById("compNmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#compNmError").html(
              "Company name is required !"
          );
          return false;
      } else {
          compName.className = "form-control field-valid";
          document.getElementById("compNmIcon").className = "fas fa-check-circle field-icon";
          $("#compNmError").html(
              ""
          );
          return true;
      }
  }

  //-------------------------validate company E-mail------------------------------

  function validateCompEmail() {
      let compEmail = document.getElementById("compEmail");
      let email_pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$";

      if (compEmail.value == "") {
          compEmail.className = "form-control field-invalid";
          document.getElementById("compEmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#compEmErr").html(
              "Company E-mail Address is required !"
          );
          return false;
      } else if (compEmail.value.match(email_pattern)) {
          compEmail.className = "form-control field-valid";
          document.getElementById("compEmIcon").className = "fas fa-check-circle field-icon";
          $("#compEmErr").html(
              ""
          );
          return true;
      } else {
          compEmail.className = "form-control field-invalid";
          document.getElementById("compEmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#compEmErr").html(
              "E-mail Address is not valid !"
          );
          return false;
      }
  }

  //-------------------------validate company Address------------------------------

  function validateCompAddress() {
      let address1 = document.getElementById("compAddr1");
      let address2 = document.getElementById("compAddr2");
      let address3 = document.getElementById("compAddr3");

      if (address1.value == "" || address2.value == "" || address3.value == "") {
          address1.className = "form-control address-field field-invalid";
          document.getElementById("compAddrIcon1").className = "fas fa-exclamation-circle field-icon4";
          address2.className = "form-control field-invalid";
          document.getElementById("compAddrIcon2").className = "fas fa-exclamation-circle field-icon2";
          address3.className = "form-control field-invalid";
          document.getElementById("compAddrIcon3").className = "fas fa-exclamation-circle field-icon2";
          $("#compAddrErr").html(
              "Company Address routes cannot be empty !"
          );
          return false;
      } else {
          address1.className = "form-control address-field field-valid";
          document.getElementById("compAddrIcon1").className = "fas fa-check-circle field-icon4";
          address2.className = "form-control field-valid";
          document.getElementById("compAddrIcon2").className = "fas fa-check-circle field-icon2";
          address3.className = "form-control field-valid";
          document.getElementById("compAddrIcon3").className = "fas fa-check-circle field-icon2";
          $("#compAddrErr").html(
              ""
          );
          return true;
      }
  }

  //-------------------------validate company Contact------------------------------

  function validateCompContact() {
      let contact1 = document.getElementById("compContact1");
      let contact2 = document.getElementById("compContact2");
      //   let number_pattern1 = /^(?:0|94|\+94)?(?:7(0|1|2|4|5|6|7|8)\d)\d{6}$/;
      //   let number_pattern2 = /^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)\d)\d{6}$/;
      if (contact1.value == "" && contact2.value == "") {
          document.getElementById("contactIcon1").className = "fas fa-exclamation-circle field-icon4";
          document.getElementById("contactIcon2").className = "fas fa-exclamation-circle field-icon2";
          contact1.className = "form-control field-invalid";
          contact2.className = "form-control field-invalid";
          $("#contactErr").html(
              "Atleast one contact number is needed !"
          );
          return false;
      } else {
          document.getElementById("contactIcon1").className = "fas fa-check-circle field-icon4";
          document.getElementById("contactIcon2").className = "fas fa-check-circle field-icon2";
          contact1.className = "form-control field-valid";
          contact2.className = "form-control field-valid";
          $("#contactErr").html(
              ""
          );
          return true;
      }
  }

  function validateContact1() {
      let contact1 = document.getElementById("compContact1");
      let number_pattern1 = /^(?:0|94|\+94)?(?:7(0|1|2|4|5|6|7|8)\d)\d{6}$/;
      let number_pattern2 = /^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)\d)\d{6}$/;

      if (contact1.value != "") {
          if (contact1.value.match(number_pattern1) || contact1.value.match(number_pattern2)) {
              contact1.className = "form-control field-valid";
              document.getElementById("contactIcon1").className = "fas fa-check-circle field-icon4";
              $("#contactErr1").html(
                  ""
              );
              return true;

          } else {
              contact1.className = "form-control field-invalid";
              document.getElementById("contactIcon1").className = "fas fa-exclamation-circle field-icon4";
              $("#contactErr1").html(
                  "Contact line 1 is invalid !"
              );
              return false;
          }
      } else {
          $("#contactErr1").html(
              ""
          );
          return true;
      }

  }


  function validateContact2() {
      let contact2 = document.getElementById("compContact2");
      let number_pattern1 = /^(?:0|94|\+94)?(?:7(0|1|2|4|5|6|7|8)\d)\d{6}$/;
      let number_pattern2 = /^(?:0|94|\+94)?(?:(11|21|23|24|25|26|27|31|32|33|34|35|36|37|38|41|45|47|51|52|54|55|57|63|65|66|67|81|912)\d)\d{6}$/;

      if (contact2.value != "") {
          if (contact2.value.match(number_pattern1) || contact2.value.match(number_pattern2)) {
              contact2.className = "form-control field-valid";
              document.getElementById("contactIcon2").className = "fas fa-check-circle field-icon2";
              $("#contactErr2").html(
                  ""
              );
              return true;

          } else {
              contact2.className = "form-control field-invalid";
              document.getElementById("contactIcon2").className = "fas fa-exclamation-circle field-icon2";
              $("#contactErr2").html(
                  "Contact line 2 is invalid !"
              );
              return false;
          }
      } else {
          $("#contactErr2").html(
              ""
          );
          return true;
      }

  }

  //-------------------------validate Supplier Name------------------------------

  function validateSuppName() {
      let sName = document.getElementById("suppName");
      let letter_pattern = /^[A-Za-z ]*$/;

      if (sName.value == "") {
          sName.className = "form-control field-invalid";
          document.getElementById("sNameIcon").className = "fas fa-exclamation-circle field-icon";

          $("#sNameErr").html(
              "First Name is required !"
          );
          return false;

      } else if (sName.value.match(letter_pattern)) {
          sName.className = "form-control field-valid";
          document.getElementById("sNameIcon").className = "fas fa-check-circle field-icon";
          $("#sNameErr").html(
              ""
          );

          return true;

      } else {
          sName.className = "form-control field-invalid";
          document.getElementById("sNameIcon").className = "fas fa-exclamation-circle field-icon";
          $("#sNameErr").html(
              "First Name should not have 0-9,@,/,$,%,etc. !"
          );

          return false;

      }

  }

  //-------------------------validate Supplier Age------------------------------

  function validateSuppAge() {

      let suppAge = document.getElementById("suppAge");

      if (suppAge.value == "") {
          suppAge.className = "form-control field-invalid";

          $("#suppAgeErr").html(
              "Date of Birth is required !"
          );
          return false;

      } else {
          let current = new Date();
          let cyear = current.getFullYear();
          let cmonth = current.getMonth();
          let cdate = current.getDate();
          //Birth Date
          let birth = new Date(suppAge.value);
          let byear = birth.getFullYear();
          let bmonth = birth.getMonth();
          let bdate = birth.getDate();

          let age = cyear - byear;
          let m = cmonth - bmonth;
          let d = cdate - bdate;

          if (m < 0 || (m == 0 && d < 0)) {
              age--;
          }

          if (age < 18) {
              suppAge.className = "form-control field-invalid";
              $("#suppAgeErr").html(
                  "Under Age !"
              );
              return false;

          } else if (age > 60) {
              suppAge.className = "form-control field-invalid";
              $("#suppAgeErr").html(
                  "Over Age !"
              );
              return false;

          } else {

              suppAge.className = "form-control field-valid";
              $("#suppAgeErr").html("");
              return true;
          }
      }
  }


  //-------------------------validate Supplier Email------------------------------

  function validateSuppEmail() {
      let suppEmail = document.getElementById("suppEmail");
      let email_pattern = /^[a-z0-9][a-z0-9-_\.]+@([a-z]|[a-z0-9]?[a-z0-9-]+[a-z0-9])\.[a-z0-9]{2,4}(?:\.[a-z]{2,4})?$/;

      if (suppEmail.value == "") {
          suppEmail.className = "form-control field-invalid";
          document.getElementById("suppEmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#suppEmErr").html(
              "Company E-mail Address is required !"
          );
          return false;
      } else if (suppEmail.value.match(email_pattern)) {
          suppEmail.className = "form-control field-valid";
          document.getElementById("suppEmIcon").className = "fas fa-check-circle field-icon";
          $("#suppEmErr").html(
              ""
          );
          return true;
      } else {
          suppEmail.className = "form-control field-invalid";
          document.getElementById("suppEmIcon").className = "fas fa-exclamation-circle field-icon";
          $("#suppEmErr").html(
              "E-mail Address is not valid !"
          );
          return false;
      }
  }

  //-------------------------validate Supplier Contact------------------------------

  function validateSuppContact() {
      let suppContact = document.getElementById("suppContact");
      let number_pattern1 = /^(?:0|94|\+94)?(?:7(0|1|2|4|5|6|7|8)\d)\d{6}$/;
      if (suppContact.value != "") {
          if (suppContact.value.match(number_pattern1)) {
              suppContact.className = "form-control field-valid";
              document.getElementById("suppContIcon").className = "fas fa-check-circle field-icon";
              $("#suppContErr").html(
                  ""
              );
              return true;
          } else {
              suppContact.className = "form-control field-invalid";
              document.getElementById("suppContIcon").className = "fas fa-exclamation-circle field-icon";
              $("#suppContErr").html(
                  "Contact number is invalid !"
              );
              return false;
          }
      } else {
          suppContact.className = "form-control field-invalid";
          document.getElementById("suppContIcon").className = "fas fa-exclamation-circle field-icon";
          $("#suppContErr").html(
              "Contact Number is required"
          );
          return true;
      }
  }

  //-------------------------Company Name Existance------------------------------


  $("#compName").on("input", function () {
      let compName = $(this).val();

      if (compName != "") {

          $.ajax({
              url: "../controller/supplierController.php?status=compNameExistance",
              type: "post",
              cache: false,
              data: {
                  compName: compName
              },
              success: function (res) {
                  //    console.log(res);
                  let compName = document.getElementById("compName");

                  if (res == "yes") {
                      compName.className = "form-control field-invalid";
                      document.getElementById("compNmIcon").className = "fas fa-exclamation-circle field-icon";
                      $("#compNmError2").html("This Email is already taken !");
                      $("#supp-form-submit").prop("disabled", true);
                      $("#supp-form-edit").prop("disabled", true); // button area disabled if reponse return yes
                  } else {
                      $("#compNmError2").html("");
                      $("#supp-form-submit").prop("disabled", false);
                      $("#supp-form-edit").prop("disabled", false);
                  }
              },
              error: function () {
                  alert("Ajax Error");
              }
          });

      }
  });


  /*============================================================================================================================================================================================
                                                                              SUPPLIER MANAGEMENT END
  ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              Stock Form Submit
  ============================================================================================================================================================================================*/



  /*============================================================================================================================================================================================
                                                                              Stock Form Edit
  ============================================================================================================================================================================================*/



  /*============================================================================================================================================================================================
                                                                              Stock Form Reset
  ============================================================================================================================================================================================*/



  //---------------------------------------Fetch data to a table when i submit the stock(grn) form-------------------------------------------------

  $("#stock-form-addTb").on('click', function (event) {

      if (!grnReferenceId() | !stockRecDate() | !supplierSt() | !categoryValid() | !brandValid() | !productValid() | !modelValid() | !colorPickImgVal() | !stockQtyValidate() | !sCostPunitValidate() | !regPriceValidate()) {
          event.preventDefault();
      } else {
          let form = $('#stockForm')[0];
          let formData = new FormData(form);
          let refId = document.getElementById("refId");
          let resDate = document.getElementById("resDate");
          $.ajax({

              url: "../controller/stockController.php?status=addStockGrn_Checkin", // request url
              data: formData,
              dataType: "json",
              processData: false,
              cache: false,
              contentType: false,
              type: "POST",
              success: function (res) {
                  //   console.log(res);
                  // /* remove the font awesome icons in the input fields
                  //    by keeping class name empty*/
                  document.getElementById("stockRfIcon").className = "";

                  // /* remove the field valid class in the input fields
                  //  by keeping class name empty to remove the validated border*/
                  refId.className = "form-control";
                  resDate.className = "form-control";

                  if (res[0] == 1) {

                      Command: toastr["success"]("Stock model successfully added !")

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

                      $("#stBodyload").html(atob(res[1]));
                      $("#stockCrtBtn").html(atob(res[2]));
                      $("#sTotalPrice").val(atob(res[3]));
                  }
                  else {
                      swal({
                          title: "ERROR",
                          text: atob(res[1]),

                          icon: "error",
                      });
                  }
              },

              error: function () {
                  alert('AJAX error !');
              }
          });

      }
  });

  //========================================Stock Form Reset=====================================================================

  $("#stock-form-reset  ").on('click', function (event) {

  });

  function submitScart() {
      $("#stockCart").submit();
  }



  /*============================================================================================================================================================================================
                                                                              VALIDATION
  ============================================================================================================================================================================================*/
  //-------------------------validate grn reference Id---------------------------------
  function grnReferenceId() {
      let refId = document.getElementById("refId");

      if (refId.value == "") {
          refId.className = "form-control field-invalid";
          document.getElementById("stockRfIcon").className = "fas fa-exclamation-circle field-icon9";
          $("#stockRfErr").html(
              "Reference Id is required !"
          );
          return false;
      } else {
          refId.className = "form-control field-valid";
          document.getElementById("stockRfIcon").className = "fas fa-check-circle field-icon9";
          $("#stockRfErr").html(
              ""
          );
          return true;
      }
  }

  //-------------------------validate Stock received date---------------------------------

  function stockRecDate() {
      let resDate = document.getElementById("resDate");

      if (resDate.value == "") {
          resDate.className = "form-control field-invalid";
          $("#resDateErr").html(
              "Stock received date is required !"
          );
          return false;
      } else {
          resDate.className = "form-control field-valid";
          $("#resDateErr").html(
              ""
          );
          return true;
      }
  }
  //-----------------------------validate supplier ---------------------------------
  function supplierSt() {
      let supplier = document.getElementById("supplierId");

      if (supplier.value == "") {

          $("#supplierStErr").html(
              "Stock Supplier is required !"
          );
          return false;
      } else {

          $("#supplierStErr").html(
              ""
          );
          return true;
      }
  }

  function categoryValid() {
      let category = document.getElementById("stockCat2");

      if (category.value == "") {

          $("#categoryErr").html(
              "Stock category is required !"
          );
          return false;
      } else {

          $("#categoryErr").html(
              ""
          );
          return true;
      }
  }

  function brandValid() {
      let brand = document.getElementById("stockBrand2");

      if (brand.value == "") {

          $("#brandErr").html(
              "Stock brand is required !"
          );
          return false;
      } else {

          $("#brandErr").html(
              ""
          );
          return true;
      }
  }

  function productValid() {
      let stockNm = document.getElementById("stockNm2");

      if (stockNm.value == "") {

          $("#stockNmErr").html(
              "Stock Product Name is required !"
          );
          return false;
      } else {

          $("#stockNmErr").html(
              ""
          );
          return true;
      }
  }

  function modelValid() {
      let stockMod = document.getElementById("stockModel2");

      if (stockMod.value == "") {

          $("#stockModErr").html(
              "Stock Product Model is required !"
          );
          return false;
      } else {

          $("#stockModErr").html(
              ""
          );
          return true;
      }
  }

  function colorPicValid() {
      let imgInputBorder = document.getElementById("colImgInput");
      let fuData = document.getElementById("colorImg");
      let FileUploadPath = fuData.value;


      if (FileUploadPath != "") {


          let Extension = FileUploadPath.substring(
              FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

          // validating the file uploaded is an image or not

          if (Extension == "gif" || Extension == "png" || Extension == "bmp" ||
              Extension == "jpeg" || Extension == "jpg") {
              imgInputBorder.className = "custom-file-label field-valid";
              document.getElementById("colImgIcon").className = "fas fa-check-circle cPic-icon";
              $("#colorImgErr").html(
                  ""
              );
              return true;
          } else {
              imgInputBorder.className = "custom-file-label field-invalid";
              document.getElementById("colImgIcon").className = "fas fa-exclamation-circle cPic-icon";
              $("#colorImgErr").html(
                  "Only allow files of GIF, PNG, JPG, JPEG, BMP ! "
              );
              $(".custom-file-input").val(null);
              return false;
          }
      } else {
          imgInputBorder.className = "custom-file-label";
          document.getElementById("colImgIcon").className = "";
          $("#colorImgErr").html("");
          return true;
      }
  }

  function colorPickImgVal() {

      let colorImg = document.getElementById("colorImg");
      let imgInputBorder = document.getElementById("colImgInput");
      let colorPick = document.getElementById("colorPick");

      if (colorImg.value == "" && colorPick.value == "#ffffff") {
          imgInputBorder.className = "custom-file-label field-invalid";
          colorPick.className = "form-control field-invalid";
          document.getElementById("colImgIcon").className = "fas fa-exclamation-circle cPic-icon";
          $("#colorImgPickErr").html("Please upload a color image or pick a color !");
          return false;
      } else {
          imgInputBorder.className = "custom-file-label";
          colorPick.className = "form-control field-valid";
          document.getElementById("colImgIcon").className = "";
          $("#colorImgPickErr").html("");
          return true;
      }

  }

  function stockQtyValidate() {
      let stQty = document.getElementById("stockQty");

      if (stQty.value == "") {
          stQty.className = "form-control field-invalid";
          document.getElementById("stockQtyIcon").className = "fas fa-exclamation-circle field-icon10";
          $("#stockQtyErr").html(
              "stock quantity is required !"
          );
          return false;
      } else {
          stQty.className = "form-control field-valid";
          document.getElementById("stockQtyIcon").className = "fas fa-check-circle field-icon10";
          $("#stockQtyErr").html(
              ""
          );
          return true;
      }
  }

  function sCostPunitValidate() {
      let stCostp = document.getElementById("costPerUnit");

      if (stCostp.value == "") {
          stCostp.className = "form-control field-invalid";
          document.getElementById("costPunitIcon").className = "fas fa-exclamation-circle field-icon11";
          $("#costPunitErr").html(
              "Cost per unit is required !"
          );
          return false;
      } else {
          stCostp.className = "form-control field-valid";
          document.getElementById("costPunitIcon").className = "fas fa-check-circle field-icon11";
          $("#costPunitErr").html(
              ""
          );
          return true;
      }
  }

  function regPriceValidate() {
      let regPrice = document.getElementById("regPrice");

      if (regPrice.value == "") {
          regPrice.className = "form-control field-invalid";
          document.getElementById("regPriceIcon").className = "fas fa-exclamation-circle field-icon11";
          $("#regPriceErr").html(
              "amount paid is required !"
          );
          return false;
      } else {
          regPrice.className = "form-control field-valid";
          document.getElementById("regPriceIcon").className = "fas fa-check-circle field-icon11";
          $("#regPriceErr").html(
              ""
          );
          return true;
      }
  }



  $("#colorPick").on('input', function () {

      if (this.value != "#FFFFFF") {
          $('#colorImg').prop('disabled', true);
      } else {
          $('#colorImg').prop('disabled', false);
      }
  });

  $("#colorImg").on('input', function () {

      if (this.value != "") {
          $('#colorPick').prop('disabled', true);
          $("#defCol").prop('disabled', true);
      } else {
          $('#colorPick').prop('disabled', false);
          $("#defCol").prop('disabled', false);
      }
  });

  $("#defCol").on('click', function () {
      $('#colorImg').prop('disabled', false);
      $('#colorPick').val("#FFFFFF");
  });

  $('#costPerUnit').on('blur', function () {
      $(this).val(parseFloat($(this).val(), 20).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1').toString());
  });

  $('#amountPaid').on('blur', function () {
      $(this).val(parseFloat($(this).val(), 20).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1').toString());
  });

  $('#regPrice').on('blur', function () {
      $(this).val(parseFloat($(this).val(), 20).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1').toString());
  });

  $("#stockQty, #costPerUnit").on("input", calc);

  function calc() {
      var n1 = $("#stockQty").val();
      var n2 = $("#costPerUnit").val();
      var total = parseFloat(total);
      total = n1 * n2;
      $('#amountPaid').val(parseFloat(total, 20).toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1').toString());;
  }

//--------------------------------------------GRN Exist-------------------------------------------

  $("#refId").on("input", function () {
    
    let gRefId = $(this).val();

    if (gRefId != "") {

        $.ajax({
            url: "../controller/stockController.php?status=checkGrnRefExist",
            type: "post",
            cache: false,
            data: {
                gRefId : gRefId
            },
            success: function (res) {
                //    console.log(res);
                let refId = document.getElementById("refId");
                if (res == "yes") {
                    refId.className = "form-control field-invalid";
                    document.getElementById("stockRfIcon").className = "fas fa-exclamation-circle field-icon9";

                    $("#stockRfErr").html("This Grn is already available !");
                    $("#stock-form-addTb").prop("disabled", true);
                    
                } else {
                    $("#stockRfErr").html("");
                    $("#stock-form-addTb").prop("disabled", false);
                    
                }

            },
            error: function () {
                alert("Ajax Error");
            }
        });

    }
});


  /*============================================================================================================================================================================================
                                                                                STOCK MANAGEMENT START
    ============================================================================================================================================================================================*/

  /*============================================================================================================================================================================================
                                                                              STOCK MANAGEMENT END
  ============================================================================================================================================================================================*/