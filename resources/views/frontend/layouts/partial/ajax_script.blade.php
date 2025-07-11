<script>
    function filterProducts() {
        var filterType = jQuery(".current").html();
        var catid = jQuery(".catid").val();
        var dataString = "method=filterProducts&filter=" + filterType + "&catid=" + catid;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/filterProducts",
            data: dataString,
            cache: true,
            success: function (response) {
                jQuery("#shop-products").html("");
                jQuery("#shop-products").html(response);
            }
        });
    }

    function openMessage(e) {
        var out = "<div class=dangermsg>" + e + "</div>";
        jQuery("#applyCouponcodesMsg").html(out);
        setTimeout(function () {
            jQuery("#applyCouponcodesMsg").html("");
        }, 5000);
    }

    function applyCouponcodes() {
        var e = $("#applyCouponcodes").val();
        var dataString = "method=applyCouponcode&cc=" + e;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/applyCouponcode",
            data: dataString,
            cache: true,
            success: function (response) {
                if (response == 0) {
                    var out = "<div class=dangermsg>Please enter valid Coupon code...</div>";
                    jQuery("#applyCouponcodesMsg").html(out);
                    setTimeout(function () {
                        jQuery("#applyCouponcodesMsg").html("");
                    }, 3000);
                }
                else {
                    jQuery("#shopcart1").load(location.href + " #shopcart1");
                    jQuery("#shopcart2").load(location.href + " #shopcart2");
                    jQuery("#total").load(location.href + " #total");
                    jQuery("#finalPay").load(location.href + " #finalPay");
                    jQuery("#discount").load(location.href + " #discount");
                    jQuery("#mydiv").load(location.href + " #mydiv");
                    jQuery("#mydiv1").load(location.href + " #mydiv1");
                    jQuery("#" + e).load(location.href + " #" + e);
                    var out = "<div class=successmsg>Coupon Applied successfully...</div>";
                    jQuery("#applyCouponcodesMsg").html(out);
                    setTimeout(function () {
                        jQuery("#applyCouponcodesMsg").html("");
                    }, 3000);
                }
            }
        });
    }

    function removeCouponcode(e) {
        var dataString = "method=removeCouponcode&cc=" + e;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/removeCouponcode",
            data: dataString,
            cache: true,
            success: function (response) {

                jQuery("#shopcart1").load(location.href + " #shopcart1");
                jQuery("#shopcart2").load(location.href + " #shopcart2");
                jQuery("#total").load(location.href + " #total");
                jQuery("#finalPay").load(location.href + " #finalPay");
                jQuery("#discount").load(location.href + " #discount");
                jQuery("#mydiv").load(location.href + " #mydiv");
                jQuery("#mydiv1").load(location.href + " #mydiv1");
                jQuery("#" + e).load(location.href + " #" + e);
                var out = "<div class=dangermsg>Coupon Removed successfully...</div>";
                jQuery("#applyCouponcodesMsg").html(out);
                setTimeout(function () {
                    jQuery("#applyCouponcodesMsg").html("");
                }, 3000);

            }
        });
    }

    function applyCouponcode(e) {
        var dataString = "method=applyCouponcode&cc=" + e;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/applyCouponcode",
            data: dataString,
            cache: true,
            success: function (response) {
                if (response == 0) {
                    var out = "<div class=dangermsg>Please enter valid Coupon code...</div>";
                    jQuery("#applyCouponcodesMsg").html(out);
                    setTimeout(function () {
                        jQuery("#applyCouponcodesMsg").html("");
                    }, 3000);
                }
                else {
                    jQuery("#shopcart1").load(location.href + " #shopcart1");
                    jQuery("#shopcart2").load(location.href + " #shopcart2");
                    jQuery("#total").load(location.href + " #total");
                    jQuery("#finalPay").load(location.href + " #finalPay");
                    jQuery("#discount").load(location.href + " #discount");
                    jQuery("#mydiv").load(location.href + " #mydiv");
                    jQuery("#mydiv1").load(location.href + " #mydiv1");
                    jQuery("#" + e).load(location.href + " #" + e);
                    var out = "<div class=successmsg>Coupon Applied successfully...</div>";
                    jQuery("#applyCouponcodesMsg").html(out);
                    setTimeout(function () {
                        jQuery("#applyCouponcodesMsg").html("");
                    }, 3000);

                }
            }
        });
    }

    function getProduct(e) {
        var dataString = "method=getProduct&pid=" + e;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/productDetailsById",
            data: dataString,
            cache: true,
            beforeSend: function () {
                $("#otput").html("<center><span style='color:red'>Please wait data is loading...</span><center>");
            },
            success: function (response) {
                jQuery("#otput").html(response);
            }
        });
    }

    function addtocart(e, f) {
        var qty = $("#product-" + f).find(".qty").val();
        var dataString = "method=addtocart&ppid=" + e + "&qty=" + qty;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/addToCart",
            data: dataString,
            cache: true,
            success: function (response) {
                if (response != "No") {
                    jQuery("#mydiv").load(location.href + " #mydiv");
                    jQuery("#myShop").load(location.href + " #myShop");
                    jQuery("#mydiv1").load(location.href + " #mydiv1");
                    var out = "<div class=successmsg>Product Added To Cart Successfully...</div>";
                    jQuery("#addToCartMsgs").html(out);
                    setTimeout(function () {
                        jQuery("#addToCartMsgs").html("");
                    }, 5000);
                }
                else {
                    var out = "<div class=dangermsg>Not Added ! Sorry You cannot add more than 12 Qty of any product...</div>";
                    jQuery("#addToCartMsgs").html(out);
                    setTimeout(function () {
                        jQuery("#addToCartMsgs").html("");
                    }, 5000);
                }

            }
        });
    }




    function addtocartfromWishlist(e, f) {
        var qty = $("#product-" + e).find(".qty").val();
        var dataString = "method=addtocart&ppid=" + e + "&qty=" + qty;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/addToCart",
            data: dataString,
            cache: true,
            success: function (response) {
                jQuery("#mydiv").load(location.href + " #mydiv");
                jQuery("#myShop").load(location.href + " #myShop");
                jQuery("#mydiv1").load(location.href + " #mydiv1");
                swal({
                    icon: "success",
                    title: 'Added...',
                    text: 'Product was added to cart successfully',
                    timer: 1500
                });

            }
        });
    }




    function addtocartOne(e) {
        var qty = jQuery("#addtocartQty").val();
        var dataString = "method=addtocart&ppid=" + e + "&qty=" + qty;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/addtocartOne",
            data: dataString,
            cache: true,
            success: function (response) {
                jQuery("#mydiv").load(location.href + " #mydiv");
                jQuery("#myShop").load(location.href + " #myShop");
                jQuery("#mydiv1").load(location.href + " #mydiv1");
                swal({
                    icon: "success",
                    title: 'Added...',
                    text: 'Product was added to cart successfully',
                    timer: 1500
                });

            }
        });
    }

    function updateBasicDetails() {
        var emailExp = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
        var firstname = jQuery("#firstname").val();
        var lastname = jQuery("#lastname").val();
        var email = jQuery("#email").val();

        if (!emailExp.test(email)) {
            jQuery("#email").addClass("error snake");
        }
        else {
            jQuery("#email").removeClass("error snake");
        }

        if (firstname.length == 0) {
            jQuery("#firstname").addClass("error snake");
        }
        else {
            jQuery("#firstname").removeClass("error snake");
        }

        if (emailExp.test(email) && firstname.length != 0) {
            var dataString = "method=login&email=" + email + "&firstname=" + firstname + "&lastname=" + lastname;
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/updateBasicDetails",
                data: dataString,
                cache: true,
                success: function (response) {
                    if (response == 1) {
                        swal({
                            icon: "success",
                            title: 'Success...',
                            text: 'Basic Details Updated Successfully...',
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location.href = "http://localhost/mangatram-bkp/userdashboard";
                        }, 1500);
                    }
                }
            });
        }
    }

    function addNewAddress() {
        var phoneExp = /^\d{10}$/;
        var pincodeExp = /^\d{6}$/;
        var phone = jQuery("#nphone").val();
        var address = jQuery("#naddress").val();
        var country = jQuery("#ncountry").val();
        var state = jQuery("#nstate").val();
        var city = jQuery("#ncity").val();
        var pincode = jQuery("#npincode").val();
        var name = jQuery("#nname").val();

        if (name.length == 0) {
            jQuery("#nname").addClass("error snake");
        }
        else {
            jQuery("#nname").addClass("error snake");
        }


        if (!phoneExp.test(phone)) {
            jQuery("#nphone").addClass("error snake");
        }
        else {
            jQuery("#nphone").removeClass("error snake");
        }

        if (address.length == 0) {
            jQuery("#naddress").addClass("error snake");
        }
        else {
            jQuery("#naddress").removeClass("error snake");
        }

        if (state == 0) {
            jQuery("#nstate").addClass("error snake");
        }
        else {
            jQuery("#nstate").removeClass("error snake");
        }


        if (city.length == 0) {
            jQuery("#ncity").addClass("error snake");
        }
        else {
            jQuery("#ncity").removeClass("error snake");
        }


        if (!pincodeExp.test(pincode)) {
            jQuery("#npincode").addClass("error snake");
        }
        else {
            jQuery("#npincode").removeClass("error snake");
        }


        if ($('#CartDrawer-Form_agree').is(":checked") == true) {
            var md = 1;
        }
        else {
            var md = 0;
        }
        if (phoneExp.test(phone) && address.length != 0 && country != 0 && state != 0 && city.length != 0 && pincodeExp.test(pincode) && name.length != 0) {
            var dataString = "method=addNewAddress&phone=" + phone + "&address=" + address + "&country=" + country + "&state=" + state + "&city=" + city + "&pincode=" + pincode + "&md=" + md + "&name=" + name;
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/addNewAddress",
                data: dataString,
                cache: true,
                success: function (response) {
                    if (response == 1) {
                        swal({
                            icon: "success",
                            title: 'Success...',
                            text: 'Basic Details Updated Successfully...',
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location.href = "http://localhost/mangatram-bkp/userdashboard";
                        }, 1500);
                    }
                }
            });
        }
    }

    function updateMyAddress(e) {
        var phoneExp = /^\d{10}$/;
        var pincodeExp = /^\d{6}$/;
        var phone = jQuery("#address-" + e).find('input[name="editPhone"]').val();
        var address = jQuery("#address-" + e).find('input[name="editaddress"]').val();
        var country = jQuery("#address-" + e).find('select[name="editcountry"]').val();
        var state = jQuery("#address-" + e).find('select[name="editstate"]').val();
        var city = jQuery("#address-" + e).find('input[name="editcity"]').val();
        var pincode = jQuery("#address-" + e).find('input[name="editpincode"]').val();
        var addressid = jQuery("#address-" + e).find('input[name="editAddressid"]').val();
        var name = jQuery("#address-" + e).find('input[name="editorname"]').val();

        if (name.length == 0) {
            jQuery("#address-" + e).find('input[name="editorname"]').addClass("error snake");
        }
        else {
            jQuery("#address-" + e).find('input[name="editorname"]').removeClass("error snake");
        }


        if (!phoneExp.test(phone)) {
            jQuery("#address-" + e).find('input[name="editPhone"]').addClass("error snake");
        }
        else {
            jQuery("#address-" + e).find('input[name="editPhone"]').removeClass("error snake");
        }

        if (address.length == 0) {
            jQuery("#address-" + e).find('input[name="editaddress"]').addClass("error snake");
        }
        else {
            jQuery("#address-" + e).find('input[name="editaddress"]').removeClass("error snake");
        }

        if (state == 0) {
            jQuery("#address-" + e).find('select[name="editstate"]').addClass("error snake");
        }
        else {
            jQuery("#address-" + e).find('select[name="editstate"]').removeClass("error snake");
        }

        if (city.length == 0) {
            jQuery("#address-" + e).find('input[name="editcity"]').addClass("error snake");
        }
        else {
            jQuery("#address-" + e).find('input[name="editcity"]').removeClass("error snake");
        }




        if (!pincodeExp.test(pincode)) {
            jQuery("#address-" + e).find('input[name="editpincode"]').addClass("error snake");
        }
        else {
            jQuery("#address-" + e).find('input[name="editpincode"]').removeClass("error snake");
        }


        if (jQuery("#address-" + e).find('input[name="agree_checkbox"]').is(":checked") == true) {
            var md = 1;
        }
        else {
            var md = 0;
        }
        if (phoneExp.test(phone) && address.length != 0 && country != 0 && state != 0 && city.length != 0 && pincodeExp.test(pincode) && name.length != 0) {
            var dataString = "method=addNewAddress&phone=" + phone + "&address=" + address + "&country=" + country + "&state=" + state + "&city=" + city + "&pincode=" + pincode + "&md=" + md + "&addressid=" + addressid + "&name=" + name;
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/editMyAddress",
                data: dataString,
                cache: true,
                success: function (response) {
                    if (response == 1) {
                        swal({
                            icon: "success",
                            title: 'Success...',
                            text: 'Basic Details Updated Successfully...',
                            timer: 1500
                        });
                        window.setTimeout(function () {
                            window.location.href = "http://localhost/mangatram-bkp/my-address";
                        }, 1500);
                    }
                }
            });
        }
    }

    function updatePassword() {
        var passExp = /^.{8,1000}$/;
        var a = $("#myaccount_old_password").val();
        var b = $("#myaccount_new_password").val();
        var c = $("#myaccount_confirm_new_password").val();

        if (!passExp.test(a)) {
            $("#myaccount_old_password").addClass('error shake');
        }
        else {
            $("#myaccount_old_password").removeClass('error shake');
        }

        if (!passExp.test(b)) {
            $("#myaccount_new_password").addClass('error shake');
            $("#div2").html("*Password must contain at least 8 characters.");
            $("#div2").css("color", "red");
        }
        else {
            $("#myaccount_new_password").removeClass('error shake');
            $("#div2").html("");
            $("#div2").css("color", "red");
        }

        if (!passExp.test(c)) {
            $("#myaccount_confirm_new_password").addClass('error shake');
        }
        else {
            $("#myaccount_confirm_new_password").removeClass('error shake');
        }

        if (passExp.test(a) && passExp.test(b) && passExp.test(c)) {
            var dataString = 'method=updatepassword&cp=' + a + '&np=' + b + '&cnp=' + c;
            $.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/updatePassword",
                data: dataString,
                cache: true,
                success: function (response) {
                    if (response == 1) {
                        swal({
                            icon: "error",
                            title: 'Oops...',
                            text: 'The old password you have entered is incorrect...',
                        });
                    }
                    else if (response == 2) {
                        swal({
                            icon: "error",
                            title: 'Oops...',
                            text: 'New password & confirm password not match... Try Again',
                        });
                    }
                    else if (response == 3) {
                        swal({
                            title: "You have successfully updated your password...",
                            icon: "success",
                            button: "Ok",
                            timer: 1000
                        });
                        $("#myaccount_old_password").val("");
                        $("#myaccount_new_password").val("");
                        $("#myaccount_confirm_new_password").val("");
                    }
                }
            });
        }
    }

    function searchResults() {
        var serchkey = jQuery("#searchitem").val();
        var dataString = "method=searchResults&serchkey=" + serchkey;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/searchResults",
            data: dataString,
            cache: true,
            success: function (response) {
                jQuery(".innercontent").html(response);
            }
        });
    }

    function login() {
        var emailExp = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
        var useremail = jQuery("#loginemail").val();
        var userpassword = jQuery("#loginpass").val();
        var userpassword = jQuery("#loginpass").val();

        if (!emailExp.test(useremail)) {
            jQuery("#loginemail").addClass("error snake");
        }
        else {
            jQuery("#loginemail").removeClass("error snake");
        }

        if (userpassword.length == 0) {
            jQuery("#loginpass").addClass("error snake");
        }
        else {
            jQuery("#loginpass").removeClass("error snake");
        }

        if (emailExp.test(useremail) && userpassword.length != 0) {
            var dataString = "method=login&email=" + useremail + "&password=" + userpassword;
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/signin",
                data: dataString,
                cache: true,
                success: function (response) {
                    if (response == 0) {
                        jQuery("#loginMsg").html("<div class=dangermsg>Username Or Password May be Incorrect...</div>");
                        setTimeout(function () {
                            jQuery("#loginMsg").html("");
                        }, 5000);
                    }
                    else {
                        jQuery("#loginMsg").html("<div class=successmsg>Login successful...</div>");
                        setTimeout(function () {
                            jQuery("#loginMsg").html("");
                            window.location.href = "http://localhost/mangatram-bkp/userdashboard";
                        }, 5000);

                    }
                }
            });
        }
    }

    function registerNow() {
        var emailExp = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
        var phoneExp = /^\d{10}$/;
        var pincodeExp = /^\d{6}$/;

        var regisname = jQuery("#regisname").val();
        var regisemail = jQuery("#regisemail").val();
        var regispass = jQuery("#regispass").val();
        var regiscpass = jQuery("#regiscpass").val();
        var phone = jQuery("#nphone").val();
        var address = jQuery("#naddress").val();
        var country = jQuery("#ncountry").val();
        var state = jQuery("#nstate").val();
        var city = jQuery("#ncity").val();
        var pincode = jQuery("#npincode").val();


        if (jQuery('#login-form_agree').is(':checked')) {
            var oks = 1;
        }
        else {
            var oks = 0;
            $("#tacchek").html("Please read the terms & conditions and checked the checkbox.");
        }


        if (regisname.length == 0) {
            jQuery("#regisname").addClass("error snake");
        }
        else {
            jQuery("#regisname").removeClass("error snake");
        }

        if (!emailExp.test(regisemail)) {
            jQuery("#regisemail").addClass("error snake");
        }
        else {
            jQuery("#regisemail").removeClass("error snake");
        }


        if (regispass.length == 0) {
            jQuery("#regispass").addClass("error snake");
        }
        else {
            jQuery("#regispass").removeClass("error snake");
        }


        if (regiscpass.length == 0) {
            jQuery("#regiscpass").addClass("error snake");
        }
        else {
            jQuery("#regiscpass").removeClass("error snake");
        }


        if (!phoneExp.test(phone)) {
            jQuery("#nphone").addClass("error snake");
        }
        else {
            jQuery("#nphone").removeClass("error snake");
        }

        if (address.length == 0) {
            jQuery("#naddress").addClass("error snake");
        }
        else {
            jQuery("#naddress").removeClass("error snake");
        }

        if (state == 0) {
            jQuery("#nstate").addClass("error snake");
        }
        else {
            jQuery("#nstate").removeClass("error snake");
        }


        if (city.length == 0) {
            jQuery("#ncity").addClass("error snake");
        }
        else {
            jQuery("#ncity").removeClass("error snake");
        }


        if (!pincodeExp.test(pincode)) {
            jQuery("#npincode").addClass("error snake");
        }
        else {
            jQuery("#npincode").removeClass("error snake");
        }


        var md = 1;




        if (
            regisname.length != 0 &&
            emailExp.test(regisemail) &&
            regispass.length != 0 &&
            oks == 1 &&
            phoneExp.test(phone) &&
            address.length != 0 &&
            country != 0 &&
            state != 0 &&
            city.length != 0 &&
            pincodeExp.test(pincode)
        ) {
            if (regispass != regiscpass) {
                swal({
                    icon: "error",
                    title: 'warning...',
                    text: 'Password & Confirm Password Mismatch...',
                    timer: 1500
                });
            }
            else {

                var dataString = "method=signup&name=" + regisname + "&email=" + regisemail + "&password=" + regispass + "&phone=" + phone + "&address=" + address + "&country=" + country + "&state=" + state + "&city=" + city + "&pincode=" + pincode + "&md=" + md;

                jQuery.ajax({
                    type: "POST",
                    url: "http://localhost/mangatram-bkp/registerNow",
                    data: dataString,
                    cache: true,
                    beforeSend: function () {
                        $(".RegisterBtn").css("display", "none");
                        $(".RegisterBtnMessage").html("<span style='color:red'>Please wait...</span>");
                    },
                    success: function (response) {
                        $(".RegisterBtn").css("display", "block");
                        $(".RegisterBtnMessage").html("");

                        if (response == "0") {
                            swal({
                                icon: "error",
                                title: 'warning...',
                                text: 'You have already registered Please login...',
                                timer: 1500
                            });
                        }
                        else if (response == "NO") {
                            swal({
                                icon: "error",
                                title: 'warning...',
                                text: 'Something went worng...',
                                timer: 1500
                            });
                        }
                        else {
                            swal({
                                icon: "success",
                                title: 'Success...',
                                text: 'Thank you for registerd with us...',
                                timer: 1500
                            });
                            setTimeout(function () {
                                window.location.href = 'http://localhost/mangatram-bkp/userdashboard';
                            }, 2000);
                        }

                    }
                });
            }
        }
    }

    function forgotPassword() {
        var emailExp = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
        var useremail = jQuery("#forgotemail").val();

        if (!emailExp.test(useremail)) {
            jQuery("#forgotemail").addClass("error snake");
        }
        else {
            jQuery("#forgotemail").removeClass("error snake");
        }


        if (emailExp.test(useremail)) {
            var dataString = "method=forgotPassword&email=" + useremail;
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/forgotPassword",
                data: dataString,
                cache: true,
                success: function (response) {
                    if (response == 0) {
                        swal({
                            icon: "error",
                            title: 'warning...',
                            text: 'You are not registered user...',
                            timer: 1500
                        });
                    }
                    else if (response == 1) {
                        swal({
                            icon: "success",
                            title: 'success...',
                            text: 'Reset Password link has been send to your email...',
                            timer: 1500
                        });
                    }
                    else if (response == 2) {
                        swal({
                            icon: "error",
                            title: 'warning...',
                            text: 'You have not verified your account...',
                            timer: 1500
                        });
                    }
                    else if (response == 3) {
                        swal({
                            icon: "error",
                            title: 'warning...',
                            text: 'Your account has been deactived...',
                            timer: 1500
                        });
                    }
                    else {
                        swal({
                            icon: "error",
                            title: 'warning...',
                            text: 'Something went worng try after some time...',
                            timer: 1500
                        });
                    }
                }
            });
        }
    }

    function resetPassword() {
        var passExp = /^.{8,1000}$/;
        var username = $("#reset_username").val();
        var newpassword = $("#reset_password").val();
        var newcpassword = $("#reset_confirm_password").val();

        if (!passExp.test(newpassword)) {
            $('#reset_password').addClass('error shake');
        }
        else {
            $('#reset_password').removeClass('error shake');
        }

        if (!passExp.test(newcpassword)) {
            $('#reset_confirm_password').addClass('error shake');
        }
        else {
            $('#reset_confirm_password').removeClass('error shake');
        }


        if (passExp.test(newpassword) && passExp.test(newcpassword)) {

            if (newpassword != newcpassword) {
                swal({
                    title: "Password & Confirm Password Mismatch..",
                    icon: "warning",
                    button: "Ok",
                    timer: 1500
                });
            }
            else {
                $('#reset_password').removeClass('error shake');
                $('#reset_confirm_password').removeClass('error shake');
                var dataString = "method=resetpassword&username=" + username + "&password=" + newpassword;
                $.ajax({
                    type: "POST",
                    url: "http://localhost/mangatram-bkp/updateresetPassword",
                    data: dataString,
                    cache: true,
                    success: function (response) {
                        if (response == 1) {
                            swal({
                                title: "Password Reset Successfully !..",
                                icon: "success",
                                button: "Ok",
                                timer: 1500
                            });
                            window.setTimeout(function () {
                                window.location.href = "http://localhost/mangatram-bkp/login";
                            }, 1500);
                        }
                    }
                });
            }
        }
        return false;
    }

    function removeCart(e) {
        var dataString = "method=removeCart&lineid=" + e;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/removeCart",
            data: dataString,
            cache: true,
            success: function (response) {
                jQuery("#mydiv").load(location.href + " #mydiv");
                jQuery("#myShop").load(location.href + " #myShop");
                jQuery("#shopcart1").load(location.href + " #shopcart1");
                jQuery("#shopcart2").load(location.href + " #shopcart2");

                jQuery("#mydiv2").load(location.href + " #mydiv2");
                swal({
                    icon: "success",
                    title: 'Deleted...',
                    text: 'Product removed from cart successfully',
                    timer: 1500
                });

            }
        });
    }

    function removeWishlist(e) {
        var dataString = "method=removeWishlist&lineid=" + e;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/removeWishlist",
            data: dataString,
            cache: true,
            success: function (response) {
                jQuery("#wishlistdiv1").load(location.href + " #wishlistdiv1");
                jQuery("#wishlistblock").load(location.href + " #wishlistblock");
                swal({
                    icon: "success",
                    title: 'deleted...',
                    text: 'Product removed from wishlist successfully',
                    timer: 1500
                });

            }
        });
    }

    function addtowishlist(e) {
        var dataString = "method=addtowishlist&lineid=" + e;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/addtowishlist",
            data: dataString,
            cache: true,
            success: function (response) {
                jQuery("#wishlistdiv1").load(location.href + " #wishlistdiv1");
                jQuery("#wishlistblock").load(location.href + " #wishlistblock");

                if (response == 1) {
                    swal({
                        icon: "success",
                        title: 'Added...',
                        text: 'Product added successfully in wishlist',
                        timer: 1500
                    });
                }
                else {
                    swal({
                        icon: "warning",
                        title: 'Warning...',
                        text: 'Please Login First',
                        timer: 1500
                    });

                    window.setTimeout(function () {
                        window.location.href = "http://localhost/mangatram-bkp/login";
                    }, 1500);

                }
            }
        });
    }

    function updateCart(e, f) {
        if (f == 'plus') {
            var qty = parseInt(jQuery(".quant" + e).val());
            var applied_qty = qty + 1;
        }
        else if (f == 'minus') {
            var qty = parseInt(jQuery(".quant" + e).val());
            if (qty > 1) {
                var applied_qty = qty - 1;
            }
            else {
                var applied_qty = 0;
            }
        }

        var dataString = "method=updatecart&id=" + e + "&qty=" + applied_qty;

        // alert(dataString);
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/updatecart",
            data: dataString,
            cache: true,
            success: function (response) {


                jQuery("#shopcart1").load(location.href + " #shopcart1");
                jQuery("#shopcart2").load(location.href + " #shopcart2");
                jQuery("#total").load(location.href + " #total");
                jQuery("#finalPay").load(location.href + " #finalPay");
                jQuery("#discount").load(location.href + " #discount");



                jQuery("#mydiv").load(location.href + " #mydiv");
                jQuery("#mydiv1").load(location.href + " #mydiv1");
                jQuery("#mydiv2").load(location.href + " #mydiv2");
                swal({
                    icon: "success",
                    title: 'updated...',
                    text: 'Cart Updated successfully',
                    timer: 1500
                });

            }
        });
    }

    function popup_mails() {
        var emailExp = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
        var phoneExp = /^\d{10}$/;
        var name = jQuery("#pop_name").val();
        var email = jQuery("#pop_email").val();
        var phone = jQuery("#pop_phone").val();
        var message = jQuery("#pop_message").val();
        var subject = jQuery("#pop_subject").val();
        var pname = jQuery("#pop_pname").val();

        if (name.length == 0) {
            jQuery("#pop_name").addClass("error snake");
        }
        else {
            jQuery("#pop_name").removeClass("error snake");
        }

        if (!emailExp.test(email)) {
            jQuery("#pop_email").addClass("error snake");
        }
        else {
            jQuery("#pop_email").removeClass("error snake");
        }

        if (!phoneExp.test(phone)) {
            jQuery("#pop_phone").addClass("error snake");
        }
        else {
            jQuery("#pop_phone").removeClass("error snake");
        }

        if (subject.length == 0) {
            jQuery("#pop_subject").addClass("error snake");
        }
        else {
            jQuery("#pop_subject").removeClass("error snake");
        }

        if (message.length == 0) {
            jQuery("#pop_message").addClass("error snake");
        }
        else {
            jQuery("#pop_message").removeClass("error snake");
        }

        if (name.length != 0 && phoneExp.test(phone) && emailExp.test(email) && message.length != 0 && subject.length != 0) {
            var dataString = "method=product_mails&name=" + name + "&phone=" + phone + "&email=" + email + "&message=" + message + "&pname=" + pname + "&subject=" + subject;
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/productEnquiryMail",
                data: dataString,
                cache: true,
                success: function (response) {
                    if (response != 1) {
                        var a = '<div class="alert alert-danger alert-dismissible">';
                        a += 'Some thing went wrong, please contact us at given number.';
                        a += '<a href=" " class="close" data-dismiss="alert" aria-label="close">&times;</a>';

                        a += '</div>';
                        jQuery("#pop_error_message").html(a);
                    }
                    else {
                        var a = '<div class="alert alert-success alert-dismissible">';
                        a += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        a += 'Your form is successfully submitted.';
                        a += '</div>';
                        jQuery("#pop_error_message").html(a);
                        jQuery("#pop_name").val("");
                        jQuery("#pop_email").val("");
                        jQuery("#pop_phone").val("");
                        jQuery("#pop_message").val("");
                        jQuery("#pop_subject").val("");
                    }
                }
            });
        }
    }

    function getAQuote() {
        var emailExp = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
        var phoneExp = /^\d{10}$/;
        var name = $("#index_name").val();
        var mobile = $("#index_mobile").val();
        var email = $("#index_email").val();
        var message = $("#index_message").val();
        if (name.length == 0) {
            $("#index_name").addClass("error snake");
        }
        else {
            $("#index_name").removeClass("error snake");
        }

        if (!emailExp.test(email)) {
            $("#index_email").addClass("error snake");
        }
        else {
            $("#index_email").removeClass("error snake");
        }

        if (!phoneExp.test(mobile)) {
            $("#index_mobile").addClass("error snake");
        }
        else {
            $("#index_mobile").removeClass("error snake");
        }

        if (message.length == 0) {
            $("#index_message").addClass("error snake");
        }
        else {
            $("#index_message").removeClass("error snake");
        }

        if (name.length != 0 && emailExp.test(email) && phoneExp.test(mobile) && message.length != 0) {
            var dataString = "method=getAQuote&name=" + name + "&email=" + email + "&message=" + message + "&mobile=" + mobile;
            $.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/mail.php",
                data: dataString,
                cache: true,
                success: function (response) {
                    // if(response!=1)
                    // {
                    // var a='<div class="alert alert-danger alert-dismissible">';
                    // a+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    // a+='Some thing went wrong, please contact us at given number.';
                    // a+='</div>';
                    // $("#error_message").html(a);
                    // }
                    // else
                    // {
                    var a = '<div class="alert alert-success alert-dismissible">';
                    a += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                    a += 'Your form is successfully submitted.';
                    a += '</div>';
                    $("#error_message").html(a);
                    $("#index_name").val("");
                    $("#index_mobile").val("");
                    $("#index_email").val("");
                    $("#index_message").val("");
                    //}
                }
            });
        }
    }

    function contactUs() {
        var emailExp = /^([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)/;
        var phoneExp = /^\d{10}$/;
        var name = jQuery("#index_names").val();
        var mobile = jQuery("#index_mobiles").val();
        var email = jQuery("#index_emails").val();
        var subject = jQuery("#index_subjects").val();
        var message = jQuery("#index_messages").val();
        if (name.length == 0) {
            jQuery("#index_names").addClass("error snake");
        }
        else {
            jQuery("#index_names").removeClass("error snake");
        }

        if (!emailExp.test(email)) {
            jQuery("#index_emails").addClass("error snake");
        }
        else {
            jQuery("#index_emails").removeClass("error snake");
        }

        if (!phoneExp.test(mobile)) {
            jQuery("#index_mobiles").addClass("error snake");
        }
        else {
            jQuery("#index_mobiles").removeClass("error snake");
        }

        if (subject.length == 0) {
            jQuery("#index_subjects").addClass("error snake");
        }
        else {
            jQuery("#index_subjects").removeClass("error snake");
        }

        if (message.length == 0) {
            jQuery("#index_messages").addClass("error snake");
        }
        else {
            jQuery("#index_messages").removeClass("error snake");
        }

        if (name.length != 0 && emailExp.test(email) && phoneExp.test(mobile) && message.length != 0 && subject.length != 0) {
            var dataString = "method=contactus&name=" + name + "&email=" + email + "&message=" + message + "&mobile=" + mobile + "&subject=" + subject;
            jQuery.ajax({
                type: "POST",
                url: "http://localhost/mangatram-bkp/contactUsMail",
                data: dataString,
                cache: true,
                beforeSend: function () {
                    jQuery(".form-messege").html("<span style='color:red'>Please Wait.....</span>");
                },
                success: function (response) {
                    jQuery(".form-messege").html("");
                    if (response != 1) {

                        var a = '<div class="alert alert-danger alert-dismissible">';
                        a += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        a += 'Some thing went wrong, please contact us at given number.';
                        a += '</div>';
                        jQuery("#error_messages").html(a);
                    }
                    else {
                        var a = '<div class="alert alert-success alert-dismissible">';
                        a += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        a += 'Your form is successfully submitted.';
                        a += '</div>';
                        jQuery("#error_messages").html(a);
                        jQuery("#index_names").val("");
                        jQuery("#index_mobiles").val("");
                        jQuery("#index_emails").val("");
                        jQuery("#index_messages").val("");
                    }
                }
            });
        }
    }




    function removeVoucher() {

        var dataString = "method=removeVoucher";
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/removeVoucher",
            data: dataString,
            cache: true,
            beforeSend: function () {
                // jQuery(".form-messege").html("<span style='color:red'>Please Wait.....</span>"); 
            },
            success: function (response) {
                jQuery("#shopcart1").load(location.href + " #shopcart1");
                jQuery("#shopcart2").load(location.href + " #shopcart2");
                jQuery("#total").load(location.href + " #total");
                jQuery("#finalPay").load(location.href + " #finalPay");
                jQuery("#discount").load(location.href + " #discount");
                jQuery("#mydiv").load(location.href + " #mydiv");
                jQuery("#mydiv1").load(location.href + " #mydiv1");

            }
        });

    }

    function applyVoucher() {
        var voucher = jQuery("#applyVoucherValue").val();
        var phone = jQuery("#g_phone").val();
        var dataString = "method=applyVoucher&voucher=" + voucher + "&phone=" + phone;
        jQuery.ajax({
            type: "POST",
            url: "http://localhost/mangatram-bkp/applyVoucher",
            data: dataString,
            cache: true,
            beforeSend: function () {
                jQuery(".form-messege").html("<span style='color:red'>Please Wait.....</span>");
            },
            success: function (response) {
                if (response == 0) {
                    swal({
                        icon: "warning",
                        text: 'Please enter valid Coupon code',
                        timer: 1500
                    });
                }
                else {
                    jQuery("#shopcart1").load(location.href + " #shopcart1");
                    jQuery("#shopcart2").load(location.href + " #shopcart2");
                    jQuery("#total").load(location.href + " #total");
                    jQuery("#finalPay").load(location.href + " #finalPay");
                    jQuery("#discount").load(location.href + " #discount");
                    jQuery("#mydiv").load(location.href + " #mydiv");
                    jQuery("#mydiv1").load(location.href + " #mydiv1");
                    jQuery("#applyVoucherValue").val("");
                }
            }
        });
    }

    function changeProduct(e, f) {
        var weight = $('#' + f + ' option:selected').text();
        var fsplit = f.split("varriants-");
        var pid = fsplit[1];
        var esplit = e.split("|");
        var priceid = esplit[0];
        var mrp = esplit[1];
        var mrps = parseFloat(mrp).toFixed(2);
        var selling = esplit[2];
        var sellings = parseFloat(selling).toFixed(2);
        var discount = esplit[3];
        var splitweight = weight.split(" ");
        var tweight = parseFloat(splitweight[0]);
        var tweightt = splitweight[1];

        //unit kg rate
        if (tweightt == "Grm" || tweightt == "Gm") {
            var unitkgrate = (selling * 1000) / tweight;
        }
        else if (tweightt == "Kg" || tweightt == "kg") {
            var unitkgrate = selling / tweight;
        }


        //discount
        if (discount > 0) {
            $("#product-" + pid).find(".on-sale-item").html(discount + "%");
        }
        else {
            $("#product-" + pid).find(".on-sale-item").html("");
        }

        //selling Price
        $("#product-" + pid).find(".price_block").html("");
        var display = "₹" + sellings;
        if (mrp != selling) {
            display += '<span class="price-mt"><del class="old-price">₹' + mrps + '</del></span>';
        }
        $("#product-" + pid).find(".price_block").html(display);

        //product description
        var displays = '<h5 class="price-on-sale font-2">₹ ' + sellings + ' <span class="font-1">(₹' + unitkgrate + '/Kg) </span></h5>';
        if (mrp != selling) {
            displays += '<div class="compare-at-price font-2">₹' + mrps + '</div>';
        }
        if (discount > 0) {
            displays += '<div class="badges-on-sale text-btn-uppercase">-' + discount + '%</div>';
        }
        $("#product-" + pid).find(".tf-product-info-price").html(displays);



        //cart button
        $("#product-" + pid).find(".addcart").attr("onclick", "addtocart(" + priceid + "," + pid + ")");
        $("#product-" + pid).find(".addcarts").attr("onclick", "addtocart(" + priceid + "," + pid + ")");
    }


</script>