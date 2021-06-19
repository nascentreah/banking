var recaptchRes = null;
var recaptcId = null;
jQuery(window).load(function(){
    recaptcId = grecaptcha.render('g-recaptcha-account', {
        sitekey: "6Lfb4CgUAAAAAAtoFKuTiut3tzdGjYMLND9D0YAd",
        callback: function(response) {
            recaptchRes = response;
        }
    });
});

jQuery(document).ready(function($) {
    $("#page-open-account-submit-btn").on("click",function(e) {
        e.preventDefault();
        var l = Ladda.create( document.querySelector('#page-open-account-submit-btn'));
        var gRecaptchaVal = recaptchRes;
        var formDataObj = {};
        var formData = $("#open-account").serializeArray();
        $.each(formData,function (value) {
            formDataObj[formData[value].name] = formData[value].value;
        });
        $.ajax({
            url: page_open_account_ajax.ajax_url,
            type: 'POST',
            data: {
                'action': 'page_open_account_ajax_request',
                'recaptcha': gRecaptchaVal,
                'security':formDataObj['security'],
                "branch": formDataObj['branch'],
                "customer_type": formDataObj['customer_type'],
                "title": formDataObj['title'],
                "initial": formDataObj['initial'],
                "lastname": formDataObj['lastname'],
                "nic": formDataObj['nic'],
                "city": formDataObj['city'],
                "dob": formDataObj['dob'],
                "emp_status": formDataObj['emp_status'],
                "annual_income": formDataObj['annual_income'],
                "address": formDataObj['address'],
                "country": formDataObj['country'],
                "tel": formDataObj['tel'],
                "email": formDataObj['email'],
                "phone": formDataObj['phone']
            },
            beforeSend: function () {
                // Set the loading
                $("#open-account #page-open-account-submit-btn").attr("disabled","disabled");
                $("#open-account #page-open-account-submit-btn").addClass("disabled");
                $("#open-account #messages").children().remove();
                l.start();
                isLoading = true;
            },
            success: function (data) {
                var response = JSON.parse(data);
                if(response.status){
                    if(gRecaptchaVal) {
                        recaptchRes = null;
                        grecaptcha.reset(recaptcId);
                    }
                    if(response.message){
					
					$("#open-account #messages").append("<h4 class='reference'> Alright! You are almost done. To complete the account opening process please visit your nearest Cargills Bank branch with the following: </h4><span class='success'><ul><li>Reference number received on your registered Mobile Number/Email ID</li><li>Valid NIC/DL/PP</li><li>A Copy of a recent utility bill (within last 3 months)</li></ul></span><span class='success'>See you at the branch soon!</span>");
					
                    }
                }else{
                    if(gRecaptchaVal) {
                        recaptchRes = null;
                        grecaptcha.reset(recaptcId);
                    }
                    $("#open-account #messages").children().remove();
                    var errors = response.errors;
                    if(response.message){
                        $("#open-account #messages").append("<span class='error'>"+response.message+"</span>");
                    }
                    if(errors){
                        $.each(errors,function (key, value) {
                            $("#open-account #messages").append("<span class='error'><b class='title'>"+key+"</b> "+value+"</span>");
                        });
                    }
                }
                $("#open-account #page-open-account-submit-btn").removeAttr("disabled");
                $("#open-account #page-open-account-submit-btn").removeClass("disabled");
                l.stop();
                isLoading = false;
            },
            error: function (error) {
                if(gRecaptchaVal) {
                    recaptchRes = null;
                    grecaptcha.reset(recaptcId);
                }
                $("#open-account #messages").children().remove();
                $("#open-account #page-open-account-submit-btn").removeAttr("disabled");
                $("#open-account #page-open-account-submit-btn").removeClass("disabled");
                l.stop();
                isLoading = false;
                console.log(error);
            }
        });
    });
});