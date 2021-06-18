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
    $("#page-remittance-tracker-submit-btn").on("click",function(e) {
        e.preventDefault();
        var l = Ladda.create( document.querySelector('#page-remittance-tracker-submit-btn'));
        var gRecaptchaVal = recaptchRes;
        var formDataObj = {};
        var formData = $("#remittance-tracker").serializeArray();
        $.each(formData,function (value) {
            formDataObj[formData[value].name] = formData[value].value;
        });
        $.ajax({
            url: page_remittance_tracker_ajax.ajax_url,
            type: 'POST',
            data: {
                'action': 'page_remittance_tracker_ajax_request',
                'recaptcha': gRecaptchaVal,
                'security':formDataObj['security'],
                "reference_no": formDataObj['reference_no']
            },
            beforeSend: function () {
                // Set the loading
                $("#remittance-tracker #page-remittance-tracker-submit-btn").attr("disabled","disabled");
                $("#remittance-tracker #page-remittance-tracker-submit-btn").addClass("disabled");
                $("#remittance-tracker #messages").children().remove();
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
                        $("#remittance-tracker #messages").append("<span class='success-remittance'>"+response.message+"</span>");
                    }
                }else{
                    if(gRecaptchaVal) {
                        recaptchRes = null;
                        grecaptcha.reset(recaptcId);
                    }
                    $("#remittance-tracker #messages").children().remove();
                    var errors = response.errors;
                    if(response.message){
                        $("#remittance-tracker #messages").append("<span class='error'>"+response.message+"</span>");
                    }
                    if(errors){
                        $.each(errors,function (key, value) {
                            $("#remittance-tracker #messages").append("<span class='error'><b class='title'>"+key+"</b> "+value+"</span>");
                        });
                    }
                }
                $("#remittance-tracker #page-remittance-tracker-submit-btn").removeAttr("disabled");
                $("#remittance-tracker #page-remittance-tracker-submit-btn").removeClass("disabled");
                l.stop();
                isLoading = false;
            },
            error: function (error) {
                if(gRecaptchaVal) {
                    recaptchRes = null;
                    grecaptcha.reset(recaptcId);
                }
                $("#remittance-tracker #messages").children().remove();
                $("#remittance-tracker #page-remittance-tracker-submit-btn").removeAttr("disabled");
                $("#remittance-tracker #page-remittance-tracker-submit-btn").removeClass("disabled");
                l.stop();
                isLoading = false;
                console.log(error);
            }
        });
    });
});