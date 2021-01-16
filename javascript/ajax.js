$("#manu").load("backend/getcategory.php");
$("#login").click(function () {
    var username = $("#username").val();
    var password = $("#password").val();
    if (username.length > 0 && password.length > 0) {
        $.ajax({
            url: 'backend/loginprocess.php',
            method: 'POST',
            data: {
                username: username,
                password: password,
                login: 'login'
            },
            success: function (feedback) {
                var feedback = JSON.parse(feedback);
                if (feedback.statusCode == 200) {
                    location.reload();
                } else if (feedback.statusCode == 201) {
                    swal({
                        position: 'top-end',
                        type: 'warning',
                        title: 'Login Falied',
                        text: 'username or password is incorrect',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    } else {
        if (username.length == 0) {
            $("#username").notify(
                "Username Required", {
                    position: "top"
                }
            );
        }
        if (password.length == 0) {
            $("#password").notify(
                "Password Required", {
                    position: "top"
                }
            );
        }
    }
});

$("#signup").click(function () {
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var middlename = $("#middlename").val();
    var contact = $("#contact").val();
    var gender = $("#gender").val();
    var email = $("#email").val();
    var password = $("#givepassword").val();
    var address = $("#address").val();
    var address2 = $("#address2").val();
    var city = $("#city").val();
    var zip = $("#zip").val();
    var state = $("#state").val();

    console.log(firstname);
    console.log(lastname);
    console.log(middlename);
    console.log(contact);
    console.log(gender);
    console.log(email);
    console.log(address);
    console.log(address2);
    console.log(city);
    console.log(zip);
    console.log(password);
    console.log(state);
    if (firstname.length > 0 && lastname.length > 0 && middlename.length > 0 && contact.length > 0 && gender.length > 0 && email.length > 0 && address.length > 0 && city.length > 0 && zip.length > 0 && password.length > 0 && state.length > 0) {
        $.ajax({
            url: 'backend/signupprocess.php',
            method: 'POST',
            data: {
                firstname: firstname,
                lastname: lastname,
                middlename: middlename,
                contact: contact,
                gender: gender,
                email: email,
                password: password,
                address: address,
                address2: address2,
                city: city,
                state: state,
                zip: zip,
                signup: 'signup'
            },
            success: function (feedback) {
                var feedback = JSON.parse(feedback);

                if (feedback.statusCode == 200) {
                    swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Account Created Successfully',
                            text: 'Your Firstname will be your USERNAME',
                            showConfirmButton: false,
                            timer: 2500
                        },
                        function () {
                            location.reload();
                        });

                } else if (feedback.statusCode == 201) {
                    swal({
                            position: 'top-end',
                            type: 'warning',
                            title: 'Registration Falied',
                            text: 'Backend detect an error',
                            showConfirmButton: false,
                            timer: 1500
                        },
                        function () {
                            location.reload();
                        });
                }
            }
        });
    } else {
        if (firstname.length == 0) {
            $("#firstname").notify(
                "Firstname Required", {
                    position: "top"
                }
            );
        }
        if (lastname.length == 0) {
            $("#lastname").notify(
                "Lastname Required", {
                    position: "top"
                }
            );
        }
        if (middlename.length == 0) {
            $("#middlename").notify(
                "Middlename Required", {
                    position: "top"
                }
            );
        }
        if (contact.length == 0) {
            $("#contact").notify(
                "Contact Required", {
                    position: "top"
                }
            );
        }
        if (gender.localeCompare("Choose...") == 0) {
            $("#gender").notify(
                "Gender Required", {
                    position: "top"
                }
            );
        }
        if (email.length == 0) {
            $("#email").notify(
                "Email Required", {
                    position: "top"
                }
            );
        }
        if (address.length == 0) {
            $("#address").notify(
                "Address Required", {
                    position: "top"
                }
            );
        }
        if (city.length == 0) {
            $("#city").notify(
                "City Required", {
                    position: "top"
                }
            );
        }
        if (zip.length == 0) {
            $("#zip").notify(
                "Zip Required", {
                    position: "top"
                }
            );
        }
        if (password.length == 0) {
            $("#givepassword").notify(
                "Password Required", {
                    position: "top"
                }
            );
        }
        if (state.localeCompare("Choose...") == 0) {
            $("#state").notify(
                "State Required", {
                    position: "top"
                }
            );
        }

    }
});

$("#checkout").click(function () {
    var name = $("#name").val();
    var address = $("#c-address").val();
    var contact = $("#c-contact").val();
    var pmethod = $("#pmethod").val();


    if (name.length > 0 && address.length > 0 && contact.length > 0 && pmethod.length > 0) {
        if (pmethod == 'Cash On Delivery') {
            var trans = "COD:";
            trans += Math.floor((Math.random() * 100) + 1);

            $.ajax({
                url: 'backend/checkoutprocess.php',
                method: 'POST',
                data: {
                    name: name,
                    address: address,
                    contact: contact,
                    pmethod: pmethod,
                    trans: trans,
                    oconfirm: 'COD'
                },
                success: function (feedback) {
                    var feedback = JSON.parse(feedback);

                    if (feedback.statusCode == 200) {
                        swal({
                                position: 'top-end',
                                type: 'success',
                                title: 'Order Confirmed',
                                text: 'Your Order Successfully Confirmed',
                                showConfirmButton: false,
                                timer: 1500
                            },
                            function () {
                                location.reload();
                            });

                    } else if (feedback.statusCode == 201) {
                        swal({
                            position: 'top-end',
                            type: 'warning',
                            title: 'Order Confirmation Falied',
                            text: 'Backend detect an error',
                            showConfirmButton: true
                        });

                    }

                }
            });

        } else {
            $.ajax({
                url: 'backend/checkoutprocess.php',
                method: 'POST',
                data: {
                    name: name,
                    address: address,
                    contact: contact,
                    pmethod: pmethod,
                    oconfirm: 'DOP'
                },
                success: function (feedback) {
                    var feedback = JSON.parse(feedback);

                    if (feedback.statusCode == 200) {
                        swal({
                                position: 'top-end',
                                type: 'warning',
                                title: 'Order Locked',
                                text: 'Your Order Has Locked For Pre-delivery payment. Hold on you will be redirected to payment gateway.',
                                showConfirmButton: false,
                                timer: 4500
                            },
                            function () {
                                window.location.href = "payment.php?soft=" + pmethod + "&oid=" + feedback.oid + "&i=" + feedback.i;
                            });

                    } else if (feedback.statusCode == 201) {
                        swal({
                            position: 'top-end',
                            type: 'error',
                            title: 'Order Confirmation Falied',
                            text: 'Backend detect an error',
                            showConfirmButton: true
                        });

                    }

                }
            });
        }
    } else {
        $.notify("Login Please");
    }
});


$("#recommendation").click(function () {
    var userid = $("#userid").val();
    var age = $("#age").val();
    var occupation = $("#occupation").val();
    var marital_status = $("#marital_status").val();
    var gender = $("#gender").val();
    var color = $("#color").val();
    var occasion = $("#occasion").val();
    var sport = $("#sport").val();
    // console.log(userid);
    if (age.length > 0 && age.localeCompare("Choose...") != 0 && occupation.length > 0 && marital_status.length > 0 && gender.length > 0 && color.length > 0 && occasion.length > 0 && sport.length > 0) {
        $.ajax({
            url: 'backend/recommendationprocess.php',
            method: 'POST',
            data: {
                age: age,
                occupation: occupation,
                marital_status: marital_status,
                gender: gender,
                color: color,
                occasion: occasion,
                sport: sport,
                userid: userid
            },
            success: function (feedback) {
                var feedback = JSON.parse(feedback);
                if (feedback.statusCode == 200) {
                    swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Please keep patient',
                        text: 'Your recommendation is being ready',
                        showConfirmButton: false,
                        timer: 1500
                    }, function () {
                        window.location.href = "recommendation.php?uid=" + feedback.userid + "&t=" + feedback.time;
                    });
                } else if (feedback.statusCode == 201) {
                    swal({
                        position: 'top-end',
                        type: 'error',
                        title: 'Sorry are having problem',
                        text: 'Please try again later',
                        showConfirmButton: false,
                        timer: 1500
                    }, function () {
                        location.reload();
                    });
                }
            }
        });
    } else {
        swal({
            position: 'top-end',
            type: 'info',
            title: 'Info',
            text: 'Please select information correctly',
            showConfirmButton: false,
            timer: 1500
        }, function () {
            location.reload();
        });
    }
});

function getItem() {
    $.ajax({
        url: 'backend/getitem.php',
        method: 'POST',
        data: {
            action: 'getitem'
        },
        success: function (response) {
            $("#item").html(response);
        }
    });
}

getItem();

$(document).on("click", "#addToCart", function () {
    var id = $(this).attr("data-id");
    var price = $(this).attr("data-price");
    var qty = $(".input-quantity").attr("value");
    var cust = $("#userid").val();
    var userstat = $("#userstat").val();
    console.log("ProID: " + id + " PP: " + price + " Qtys:" + qty);

    $.ajax({
        url: 'backend/cartprocess.php',
        method: 'POST',
        data: {
            id: id,
            qty: qty,
            price: price,
            action: userstat,
            custid: cust
        },
        success: function (feedback) {
            var feedback = JSON.parse(feedback);

            if (feedback.status == 200 && feedback.action == 'insert') {
                swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Thank You!!',
                        text: 'Your selected product has been added to your cart',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    function () {
                        location.reload();
                    });
            } else if (feedback.status == 201 && feedback.action == 'insert') {
                swal({
                        position: 'top-end',
                        type: 'warning',
                        title: 'Opps!',
                        text: 'Sorry an error has been occured to adding the product!',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    function () {
                        location.reload();
                    });
            } else if (feedback.status == 200 && feedback.action == 'update') {
                swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Updated!',
                        text: 'A product has been updated!',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    function () {
                        location.reload();
                    });
            } else if (feedback.status == 201 && feedback.action == 'update') {
                swal({
                        position: 'top-end',
                        type: 'warning',
                        title: 'Opps!!',
                        text: 'Sorry an error has been occured to update the product!',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    function () {
                        location.reload();
                    });
            }
        }
    });

});

$(document).on("click", "#addToWishlist", function () {
    var id = $(this).attr("data-id");
    var price = $(this).attr("data-price");
    var cust = $("#userid").val();
    var userstat = $("#userstat").val();


    $.ajax({
        url: 'backend/wishlistprocess.php',
        method: 'POST',
        data: {
            id: id,
            price: price,
            action: userstat,
            custid: cust
        },
        success: function (feedback) {
            var feedback = JSON.parse(feedback);

            if (feedback.status == 200 && feedback.action == 'insert') {
                swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Thank You!!',
                        text: 'Your selected product has been added to your wishlist',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    function () {
                        location.reload();
                    });
            } else if (feedback.status == 201 && feedback.action == 'insert') {
                swal({
                        position: 'top-end',
                        type: 'warning',
                        title: 'Opps!',
                        text: 'Sorry an error has been occured to adding the product!',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    function () {
                        location.reload();
                    });
            } else if (feedback.status == 200 && feedback.action == 'exists') {
                swal({
                        position: 'top-end',
                        type: 'warning',
                        title: 'Exists!',
                        text: 'Selected product is already in wishlist!',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    function () {
                        location.reload();
                    });
            } else if (feedback.status == 201 && feedback.action == 'update') {
                swal({
                        position: 'top-end',
                        type: 'warning',
                        title: 'Opps!!',
                        text: 'Sorry an error has been occured to update the product!',
                        showConfirmButton: false,
                        timer: 1500
                    },
                    function () {
                        location.reload();
                    });
            }
        }
    });

});


$(document).on("click", "#delete", function () {
    userid = $(this).attr("data-userid");
    product = $(this).attr("data-product");

    if (userid.length < 14) {
        $.ajax({
            url: 'backend/cartaction.php',
            method: 'POST',
            data: {
                id: product,
                cust_id: userid,
                delete: 'ok'
            },
            success: function (feedback) {
                var feedback = JSON.parse(feedback);

                if (feedback.status == 200 && feedback.action == 'delete') {
                    swal({
                            position: 'top-end',
                            type: 'warning',
                            title: 'Success!!',
                            text: 'Your product has deleted cart',
                            showConfirmButton: false,
                            timer: 1500
                        },
                        function () {
                            location.reload();
                        });
                } else if (feedback.status == 201 && feedback.action == 'delete') {
                    swal({
                            position: 'top-end',
                            type: 'error',
                            title: 'Opps!!',
                            text: 'An unexpected error has occurred. Try again later',
                            showConfirmButton: false,
                            timer: 1500
                        },
                        function () {
                            location.reload();
                        });
                }

            }
        });
    } else {

        $.ajax({
            url: 'backend/cartaction.php',
            method: 'POST',
            data: {
                id: product,
                delete: 'ok'
            },
            success: function (feedback) {
                var feedback = JSON.parse(feedback);

                if (feedback.status == 200 && feedback.action == 'delete') {
                    swal({
                            position: 'top-end',
                            type: 'warning',
                            title: 'Success!!',
                            text: 'Your product has deleted gcart',
                            showConfirmButton: false,
                            timer: 1500
                        },
                        function () {
                            location.reload();
                        });
                } else if (feedback.status == 201 && feedback.action == 'delete') {
                    swal({
                            position: 'top-end',
                            type: 'error',
                            title: 'Opps!!',
                            text: 'An unexpected error has occurred. Try again later gcart',
                            showConfirmButton: false,
                            timer: 1500
                        },
                        function () {
                            location.reload();
                        });
                }

            }
        });
    }
});


$(document).on("click", "#update", function () {
    userid = $(this).attr("data-userid");
    product = $(this).attr("data-product");
    qty = $(".input-quantity").attr("data-qty");
    var data = $(this).serialize();
    console.log(qty);

});


$(document).on("keyup", "#qty", function () {
    qty = $(this).val();
    $(this).attr("value", qty);
    $(this).attr("data-qty", qty);

    var data = $(this).serialize();
    console.log(qty);
    console.log(data);
});




$("#pay-proceed").click(function () {
    var amount = $(this).attr("data-amount");
    var orderid = $(this).attr("data-order");
    var pmethod = $(this).attr("data-method");

    window.location.href = "payment-gateway.php?oid=" + orderid + "&amt=" + amount + "&p=" + pmethod;

});

$("#confirm-payment").click(function () {
    var account = $("#p_account").val();
    var password = $("#p_password").val();
    var orderid = $(this).attr("data-order");
    var amount = $(this).attr("data-amount");
    var method = $(this).attr("data-method");
    
    //$("#invoice embed").load("backend/confirm-payment.php");
    
    $.ajax({
        url:'backend/paymentprocess.php',
        method:'POST',
        data:{
            account:account,
            orderid:orderid,
            amount:amount,
            method:method
        },success:function(feedback){
            var feedback = JSON.parse(feedback);
            if(feedback.status==200){
                
                swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Success!!',
                            text: 'Your payment has successfully done',
                            showConfirmButton: false,
                            timer: 1500
                        },
                        function () {
                            setTimeout(function(){
                                window.location.href="index.php";
                            },3000);
                            window.location.href="backend/confirm-payment.php?oid="+orderid;
                        });
                
            }
        }
    });

});


//Preloader ajax

var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
    $("#preloader").css("display", "none");
    $("#mainpage").css("display", "block");
}

// function on() {
// 	$("#overlay").css("display","block");
// }

// function off() {
//   $("#overlay").css("display","none");
// }
