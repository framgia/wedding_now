<script type="text/javascript" src="{{ asset(config('asset.users.js') . 'page.js') }}"></script> <!-- custom js -->

<script type="text/javascript" src="{{ asset(config('asset.users.js') . 'owl.carousel.js') }}"></script> <!-- owl carousel js -->
<script type="text/javascript" src="{{ asset(config('asset.users.js') . 'smooth-scroll.js') }}"></script> <!-- smooth scroll js -->

<script type="text/javascript" src="{{ asset(config('asset.users.js') . 'menumaker.js') }}"></script> <!-- menu js-->
<script type="text/javascript" src="{{ asset(config('asset.users.js') . 'jquery.share-tooltip.js') }}"></script> <!-- share tooltip js-->
<script type="text/javascript" src="{{ asset(config('asset.users.js') . 'price-slider.js') }}"></script> <!-- price slider / filter js-->
<!-- revolution js files -->
<script type="text/javascript" src="{{ asset(config('asset.users.revolution_js') . 'jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('asset.users.revolution_js') . 'jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('asset.users.extensions_js') . 'revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('asset.users.extensions_js') . 'revolution.extension.kenburn.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('asset.users.extensions_js') . 'revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('asset.users.extensions_js') . 'revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('asset.users.extensions_js') . 'revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset(config('asset.users.extensions_js') . 'revolution.extension.slideanims.min.js') }}"></script>
<!-- end revolution js files -->
<script type="text/javascript" src="{{ asset(config('asset.users.js') . 'theme.js') }}"></script> <!-- custom js -->
<script type="text/javascript">
    var tpj=jQuery;
    var revapi1066;
    tpj(document).ready(function() {
    if(tpj("#rev_slider_1066_1").revolution == undefined){
        revslider_showDoubleJqueryError("#rev_slider_1066_1");
    }
    else
    {
        revapi1066 = tpj("#rev_slider_1066_1").show().revolution({
        sliderType:"standard",
        jsFileLocation:"//server.local/revslider/wp-content/plugins/revslider/public/assets/js/",
        sliderLayout:"auto",
        delay:9000,
        navigation: {
            keyboardNavigation:"off",
            keyboard_direction: "horizontal",
            mouseScrollNavigation:"off",
            mouseScrollReverse:"default",
            onHoverStop:"off",
            touch:{
            touchenabled:"off",
            swipe_threshold: 75,
            swipe_min_touches: 1,
            swipe_direction: "horizontal",
            drag_block_vertical: false
            },
            arrows: {
            style:"",
            enable:true,
            hide_onmobile:true,
            hide_onleave:false,
            hide_delay:0,
            hide_delay_mobile:1200,
            hide_under:0,
            hide_over:9999,
            tmp:'',
            rtl:false,
            left : {
                h_align:"left",
                v_align:"center",
                h_offset:20,
                v_offset:0,
                container:"slider",
            },
            right : {
                h_align:"right",
                v_align:"center",
                h_offset:20,
                v_offset:0,
                container:"slider",
            }
            }
        },
        responsiveLevels:[1240,1024,778,480],
        visibilityLevels:[1240,1024,778,480],
        gridwidth:[1240,1024,778,480],
        gridwidth: 1000,
        gridheight:[868,768,960,720],
        lazyType:"none",
        parallax: {
            type:"mouse",
            origo:"slidercenter",
            speed:2000,
            levels:[2,3,4,5,6,7,12,16,10,50,46,47,48,49,50,55],
            type:"mouse",
            disable_onmobile:"on"
        },
        shadow:0,
        spinner:"off",
        stopLoop:"off",
        stopAfterLoops:1,
        stopAtSlide:0,
        shuffle:"off",
        autoHeight:"off",
        fullScreenAutoWidth:"off",
        fullScreenAlignForce:"off",
        fullScreenOffsetContainer: ".header",
        fullScreenOffset: "60px",
        disableProgressBar:"on",
        hideThumbsOnMobile:"off",
        hideSliderAtLimit:0,
        hideCaptionAtLimit:0,
        hideAllCaptionAtLilmit:0,
        debugMode:false,
        fallbacks: {
            simplifyAll:"off",
            nextSlideOnWindowFocus:"off",
            disableFocusListener:false,
            }
        });
    }
  });
</script>
