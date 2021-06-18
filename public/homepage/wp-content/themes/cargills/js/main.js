jQuery(document).ready(function($) {
    $(".menuBox.find span").click(function() {
        $(this).parent().toggleClass("open");
    });
    $('.parallax').parallax();
    $('#loginPopup').click(function() {
        $(".loginModel").addClass("open");
    });
    $('#loginClose').click(function() {
        $(".loginPanel").removeClass("open");
    });
    $(".openModel").click(function() {
        $('header,.midleT').hide();
        $(this).children(".openPanel").addClass("open");
    });
    $('.loginClose').click(function(e) {
        e.stopPropagation();
        $(this).parents(".openPanel").removeClass("open");
        $('header,.midleT').show();
    });
    $(".openModelBtn").click(function() {
        $(this).next(".openPanelBtn").addClass("open");
    });
    $('.loginClose').click(function(e) {
        e.stopPropagation();
        $(this).parents(".openPanelBtn").removeClass("open");
    });
    $('#mainNav').click(function() {
        $(".hasMega").removeClass('open');
        $(".logoutBtn").removeClass("open");
        $(".hambergeMenu").toggleClass("open");
    });

    if($(window).width() < 767){
        $(".hasMega").click(function() {
            $(".hambergeMenu").removeClass("open");
            $(".logoutBtn").removeClass("open");        
            if ($(this).hasClass('open')) {
                // $(this).removeClass('open');
            } else {
                $(".hasMega.open").removeClass('open');
                $(this).toggleClass('open');
            }
        });
    }
    if($(window).width() > 767){
            $(".hasMega").click(function() {
            $(".hambergeMenu").removeClass("open");
            $(".logoutBtn").removeClass("open");        
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
            } else {
                $(".hasMega.open").removeClass('open');
                $(this).toggleClass('open');
            }
        });
    }
    
    $('.proIco').click(function() {
        $(".hambergeMenu").removeClass("open");
        $(".hasMega").removeClass('open');
        $(this).parent(".logoutBtn").toggleClass("open");
    });
    $(".closeBtn").click(function(e) {
        e.stopPropagation();
        $(this).parents(".hasMega.open").first().removeClass('open');
        $(this).parents(".hambergeMenu.open").first().removeClass('open');
    });
    showHideSections();
    $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').not('a[href*="#"].notSmooth').not('.hasMega>a[href*="#"]').click(function(event) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 90
                }, 1000, function() {
                    var $target = $(target);
                    $target.focus();
                    if ($target.is(":focus")) {
                        return false;
                    } else {
                        $target.attr('tabindex', '-1');
                        $target.focus();
                    };
                });
            }
        }
    });
    $('.selectpicker').selectpicker();
    $("a.buttonnext").click(function() {
        if (form.valid()) {
            $(".openSteps>li").removeClass("active");
            $(this).parents(".openSteps>li").next().addClass("active");
            var getIndex = $(this).parents(".openSteps>li").index();
            var liIndex = getIndex + 1;
            $(".steps>li:nth(" + liIndex + ")").addClass("active");
        }
    });
    $("a.buttonprev").click(function() {
        $(".openSteps>li").removeClass("active");
        $(this).parents(".openSteps>li").prev().addClass("active");
    });
});

jQuery(window).scroll(function(event) {
    showHideSections();
});

function showHideSections() {
    jQuery(".animate").each(function(i, el) {
        if (jQuery(el).is(':in-viewport')) {
            if (!jQuery(el).hasClass('animated')) jQuery(el).addClass("animated");
        }
    });
}
jQuery(window).scroll(function() {
    if (jQuery('.firehead').is(':in-viewport')) {
        if (jQuery('header').hasClass('fix')) jQuery('header').removeClass('fix');
        jQuery(".redButonPanel").removeClass("fix");
    } else {
        if (!jQuery('header').hasClass('fix')) jQuery('header').addClass('fix');
        jQuery(".redButonPanel").addClass("fix");
    }
    if (jQuery('.fireNav').is(':in-viewport')) {
        jQuery('.logo, .outMenuBox').removeClass('fix');
    } else {
        jQuery('.logo, .outMenuBox').addClass('fix');
    }
});
jQuery(window).on("load", function() {
    var inPosition = jQuery(window).scrollTop()
    jQuery(window).scrollTop(inPosition - 1);
});
jQuery(document).ready(function($) {
    $('#remittancePopup').click(function () {
        $(".remittanceModel").addClass("open");
    });
    $('#remittanceClose').click(function () {
        $(".loginPanel.remittanceModel").removeClass("open");
    });

    $('#emailPopup').click(function () {
        $(".emailModel").addClass("open");
    });
    $('#emailClose').click(function () {
        $(".loginPanel.emailModel").removeClass("open");
    });

    $('.downloadsPopup').click(function () {
        $(".modal").addClass("open");
    });
    $('#loginClose').click(function () {
        $(".modal").removeClass("open");
    });
});

jQuery(document).ready(function($) {
    $(function () {
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());

        $("#datepicker-popup input").datepicker({
            autoclose: true,
            todayHighlight: true
        }).datepicker('update', new Date());
    });
});



jQuery(document).ready(function($) {
    $(".menuBox.find span").on("click", function() {
        $("#s").focus();
    });
});


jQuery(document).ready(function($) {
    $(".picker4").birthdaypicker({
        minAge: 18,
        fieldName: 'dob',
        fieldId: 'dob',
        dateFormat: 'littleEndian'
    });

    // mob menu add style
    if($(window).width() < 767){
        $('.hasMega').click(function() {
          // $(".navbar-collapse").css( "height", "100vh" );  
          $(".navbar-collapse").css({'height' : '100vh', 'top' : '-65px'});
        });
        $('.closeBtn').click(function() {
            // $(".navbar-collapse").css( "height", "auto" );
            $(".navbar-collapse").css({'height' : 'auto', 'top' : '0px'});
        });
        $('.megaMenu').click(function() {
            // $(".navbar-collapse").css( "height", "auto" );
            $(".navbar-collapse").css({'height' : 'auto', 'top' : '0px'});
        });

        

        $('.cls_mob_btn').click(function() {
            $(".navbar-collapse").css( "height", "auto" );
        });

        // $('.megaMenu .open').css({'height' : 'auto', 'top' : '0px'});


    }    
    // IE only for pop up message,  
    var browser = {
            isIe: function () {
                return navigator.appVersion.indexOf("MSIE") != -1;
            },
            navigator: navigator.appVersion,
            getVersion: function() {
                var version = 999; // we assume a sane browser
                if (navigator.appVersion.indexOf("MSIE") != -1)
                    // bah, IE again, lets downgrade version number
                    version = parseFloat(navigator.appVersion.split("MSIE")[1]);
                return version;
            }
        };

    if (browser.isIe() && browser.getVersion() <= 10) {
        //alert("You are currently using Internet Explorer " + browser.getVersion() + " or are viewing the site in Compatibility View, please upgrade for a better user experience.")
        $('body').append('<div class="ie_only"><p>You are currently using Internet Explorer 9 Version or are viewing the site in Compatibility View, please upgrade for a better user experience.</p></div>');
    }


    $( ".mobMenu .navbar-toggle" ).click(function() {
      $( this ).toggleClass( "cls_mob_btn" );
    }); 

    //search box append to XS device 




    if($(window).width() < 767){
        $( "#searchform" ).appendTo( "body");

        $('#searchform').attr('id','searchform_mob');
        $('#searchsubmit').attr('id','searchsubmit_mobile');
        $('#s').attr('id','s_mobile');

        $('.searchform').addClass('searchform_mobile');
        $('.searchform').removeClass('searchform');
    }

    $( ".menuBox.find span" ).click(function() {
      $( "#searchform_mob" ).toggleClass( "diplay_search" );
    }); 


    // about us 3box 
    if($(window).width() < 480){
        $(".threeGreaphyBox .twoInBox").css( "padding", "30px" );
        $(".threeGreaphyBox .oneInBox").css( "padding", "0 30px" ); 
    }
});