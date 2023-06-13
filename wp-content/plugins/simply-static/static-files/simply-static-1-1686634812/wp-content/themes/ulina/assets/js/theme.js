/*
 Theme Name: Ulina
 Theme URI: https://uiuxom.com/ulina/wp/
 Author: uiuxom
 Author URI: https://themeforest.net/user/uiuxom
 Description: Ulina - Fashion Ecommerce Responsive WordPress Theme
 Version: 1.0
 License:
 License URI: 
*/

/*==================================
    [Table of contents]
===================================
    01. Variables
    02. Nice Selects
    03. All Sliders
    04. Masonry Grid
    05. Count Down
    06. All Popups
    07. Back To Top
    08. Pointer Image
    09. Sidebar Toggle
    10. Price Slider
    11. Skill Bar
    12. Counter
    13. Sticky Header
    14. Popup Search
    15. Preloader
    16. Google Maps
    17. Social Toggle Menu
    18. Mobile Menu
    19. Circle Progress
    20. Ajax Variations
    21. Ajax Paginations
    22. Product Tab Hotspot
    23. Qty
    24. Ajax Coupon
    25. Show Login Toggle
    26. Quick view Modal On hidden
*/

(function ($) {
    'use strict';
    /*------------------------------------------------------
    /  01. Variables
    /------------------------------------------------------*/
    var $anSelect = $('.anSelect select'), 
        $sortNavSelect = $('.sortNav select'), 
        $singleVariationSelect = $('.singleVariation select'), 
        $relatedProductCarousel = $('.relatedProductCarousel'),
        $masonryGrid = $('#masonryGrid'),
        $masonryGrid2 = $('#masonryGrid2'),
        $categoryCarousel = $('.categoryCarousel'),
        $testimonialCarousel = $('.testimonialCarousel'),
        $testimonialCarousel2 = $('.testimonialCarousel2'),
        $instagramSlider = $('.instagramSlider'),
        $imgPopup = $('.imgPopup'),
        $clientLogoSlider = $('.clientLogoSlider'),
        $categoryCarousel2 = $('.categoryCarousel2'),
        $sliderRange = $('#sliderRange'),
        $pointerImage = $('.pointerImage'),
        $productGallery = $('.productGallery'),
        $productGalleryThumb = $('.productGalleryThumb'),
        $productGallery2 = $('.productGallery2'),
        $productGalleryThumb2 = $('.productGalleryThumb2'),
        $shippingFormElementsSelect = $('.shippingFormElements select'),
        $teamCarousel = $('.teamCarousel'),
        $variationSelect = $('.woocommerce div.product.uiuxomProductWrapper form.cart .variations td > select'),
        $variationSelect2 = $('.variationItem .value > select');
    
    /*------------------------------------------------------
    /  02. Nice Selects
    /------------------------------------------------------*/
    if($anSelect.length > 0){
        $anSelect.niceSelect();
    };
    if($sortNavSelect.length > 0){
        $sortNavSelect.niceSelect();
    };
    if($singleVariationSelect.length > 0){
        $singleVariationSelect.niceSelect();
    };
    if($shippingFormElementsSelect.length > 0){
        $shippingFormElementsSelect.niceSelect();
    };
    if($variationSelect.length > 0){
        $variationSelect.niceSelect();
    };
    if($variationSelect2.length > 0){
        $variationSelect2.niceSelect();
    };
    
    /*------------------------------------------------------
    /  03. All Sliders
    /------------------------------------------------------*/
    // Owl Carousel For teamCarousel
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-team.default', function($scope, $){
            var $wrap = $scope.find('.teamSliderWrap');
            var $teamCarousel = $scope.find('.teamCarousel');
            
            var autoplay = ($wrap.attr('data-autoplay') == 1 ) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1 ) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1 ) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1 ) ? true : false;
            var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 4;
            var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
            var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 3;
            var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 2;
            var gapping = ($wrap.attr('data-gapping') != '') ? $wrap.attr('data-gapping') * 1 : 24;
            
            if($teamCarousel.length > 0){
                var $teamCarousel_obj = $teamCarousel.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
                    dots: dots,
                    items: itemxl,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        },
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        }
                    }
                });
            };
            
        });
    });

    // Owl Carousel For Related Product Carousel
    if($relatedProductCarousel.length > 0){
        var $relatedProductCarousel_obj = $relatedProductCarousel.owlCarousel({
            autoplay: false,
            margin: 24,
            loop: false,
            nav: true,
            navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
            dots: false,
            items: 4,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    };
    
    // Owl Carousel For productCarousel
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-product-slider.default', function($scope, $){
            var $wrap = $scope.find('.productCarouselWrap');
            var $productCarousel = $scope.find('.productCarousel');
            
            var autoplay = ($wrap.attr('data-autoplay') == 1 ) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1 ) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1 ) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1 ) ? true : false;
            var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 4;
            var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
            var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 3;
            var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 2;
            var gapping = ($wrap.attr('data-gapping') != '') ? $wrap.attr('data-gapping') * 1 : 24;
            
            if($productCarousel.length > 0){
                var $productCarousel_obj = $productCarousel.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
                    dots: dots,
                    items: itemxl,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        },
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        }
                    }
                });
            };
        });
    });

    // Owl Carousel For categoryCarousel
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-product-categories.default', function($scope, $){
            var $wrap = $scope.find('.categoryCarouselWrap');
            var $categoryCarousel = $scope.find('.categoryCarousel');
            
            var autoplay = ($wrap.attr('data-autoplay') == 1 ) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1 ) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1 ) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1 ) ? true : false;
            var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 4;
            var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
            var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 3;
            var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 2;
            var gapping = ($wrap.attr('data-gapping') != '') ? $wrap.attr('data-gapping') * 1 : 24;
            
            if($categoryCarousel.length > 0){
                var $categoryCarousel_obj = $categoryCarousel.owlCarousel({
                    autoplay: autoplay,
                    margin: 24,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
                    dots: dots,
                    items: itemxl,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        },
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        }
                    }
                });
            };
            
        });
    });
    
    // Owl Carousel For testimonialCarousel
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-testimonial.default', function($scope, $){
            var $wrap = $scope.find('.testimonialSliderWrap');
            var $testimonialCarousel = $scope.find('.testimonialCarousel');
            
            var autoplay = ($wrap.attr('data-autoplay') == 1 ) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1 ) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1 ) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1 ) ? true : false;
            
            if ($testimonialCarousel.length > 0) {
                var $testimonialCarousel_obj = $testimonialCarousel.owlCarousel({
                    autoplay: autoplay,
                    margin: 24,
                    loop: loop,
                    nav: nav,
                    navText: [],
                    dots: dots,
                    items: 2,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 1
                        },
                        1200: {
                            items: 2
                        }
                    }
                });
                $('.tnext').on('click', function() {
                    $testimonialCarousel_obj.trigger('next.owl.carousel');
                });
                $('.tprev').on('click', function() {
                    $testimonialCarousel_obj.trigger('prev.owl.carousel');
                });
            }
            
            var $wrap2 = $scope.find('.testimonialSliderWrap2');
            var $testimonialCarousel2 = $scope.find('.testimonialCarousel2');
            if($testimonialCarousel2.length > 0){
                var autoplay = ($wrap2.attr('data-autoplay') == 1 ) ? true : false;
                var loop = ($wrap2.attr('data-loop') == 1 ) ? true : false;
                var nav = ($wrap2.attr('data-nav') == 1 ) ? true : false;
                var dots = ($wrap2.attr('data-dots') == 1 ) ? true : false;
                
                var $testimonialCarousel2_obj = $testimonialCarousel2.owlCarousel({
                    autoplay: autoplay,
                    margin: 24,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
                    dots: dots,
                    items: 3,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        576: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        992: {
                            items: 3
                        },
                        1200: {
                            items: 3
                        }
                    }
                });
            };
            
        });
    });
    
    // Owl Carousel For BlogPost
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-latest-blog.default', function($scope, $){
            var $wrap = $scope.find('.blogSLiderWrap');
            var $blogCarousel = $scope.find('.blogCarousel');
            var $masonryGrid = $scope.find('.masonryGrid');
            
            var autoplay = ($wrap.attr('data-autoplay') == 1 ) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1 ) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1 ) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1 ) ? true : false;
            var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 3;
            var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 3;
            var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 2;
            var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 1;
            var gapping = ($wrap.attr('data-gapping') != '') ? $wrap.attr('data-gapping') * 1 : 24;
            
            if($blogCarousel.length > 0){
                
                var $blogCarousel_obj = $blogCarousel.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
                    dots: dots,
                    items: itemxl,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        },
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        }
                    }
                });
            };
            
            if ($masonryGrid.length > 0) {
                var $masonryGrid = $('#masonryGrid');

                var Shuffle = window.Shuffle;
                var element = document.querySelector('#masonryGrid');
                var sizer = element.querySelector('.shafSizer');

                var shaff_inst = new Shuffle(element, {
                    itemSelector: '.shafItem',
                    sizer: sizer
                });
            }
            
        });
    });

    // Owl Carousel For instagramSlider
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-insta-gallery.default', function($scope, $){
            var $wrap = $scope.find('.instagramSliderWrap');
            var $instagramSlider = $scope.find('.instagramSlider');
            
            var autoplay = ($wrap.attr('data-autoplay') == 1 ) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1 ) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1 ) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1 ) ? true : false;
            
            if($instagramSlider.length > 0){
                var $instagramSlider_obj = $instagramSlider.owlCarousel({
                    autoplay: autoplay,
                    margin: 0,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
                    dots: dots,
                    items: 5,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        992: {
                            items: 4
                        },
                        1200: {
                            items: 5
                        }
                    }
                });
            };
            
        });
    });
    // Client Slider
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-clients-slider.default', function($scope, $){
            var $wrap = $scope.find('.clientLogoSliderWrap');
            var $clientLogoSlider = $scope.find('.clientLogoSlider');
            
            var autoplay = ($wrap.attr('data-autoplay') == 1 ) ? true : false;
            var loop = ($wrap.attr('data-loop') == 1 ) ? true : false;
            var nav = ($wrap.attr('data-nav') == 1 ) ? true : false;
            var dots = ($wrap.attr('data-dots') == 1 ) ? true : false;
            var itemxl = ($wrap.attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 5;
            var itemlg = ($wrap.attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 4;
            var itemmd = ($wrap.attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 3;
            var itemsm = ($wrap.attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 2;
            var gapping = ($wrap.attr('data-gapping') != '') ? $wrap.attr('data-gapping') * 1 : 0;
            
            if($clientLogoSlider.length > 0){
                var $clientLogoSlider_obj = $clientLogoSlider.owlCarousel({
                    autoplay: autoplay,
                    margin: gapping,
                    loop: loop,
                    nav: nav,
                    navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
                    dots: dots,
                    items: itemxl,
                    responsiveClass: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: itemsm
                        },
                        768: {
                            items: itemmd
                        },
                        992: {
                            items: itemlg
                        },
                        1200: {
                            items: itemxl
                        }
                    }
                });
            };
        });
    });
    
    // Slick For productGallery
    $productGallery.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.productGalleryThumb'
    });

    // Slick For productGalleryThumb
    $productGalleryThumb.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.productGallery',
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="ulina-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="ulina-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 3
                }
            }
        ]
    });
    
    // Slick For productGallery2
    $productGallery2.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.productGalleryThumb2'
    });

    // Slick For productGalleryThumb2
    $productGalleryThumb2.slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.productGallery2',
        dots: false,
        arrows: false,
        vertical: true,
        focusOnSelect: true,
        verticalSwiping:true,
        responsive: [
            {
                breakpoint: 575,
                settings: {
                    vertical: false,
                    slidesToShow: 3
                }
            }
        ]
    });

    //Product Tab Slider
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-product-tab.default', function($scope, $){
            var $wrap = $scope.find('.productTabCarousleWrap');

            $wrap.each(function(){
                var $slideProductTabSlider = $(this).find('.productTabCarousle');

                var autoplay = ($(this).attr('data-autoplay') == 1 ) ? true : false;
                var loop = ($(this).attr('data-loop') == 1 ) ? true : false;
                var nav = ($(this).attr('data-nav') == 1 ) ? true : false;
                var dots = ($(this).attr('data-dots') == 1 ) ? true : false;
                var itemxl = ($(this).attr('data-itemxl') * 1 > 0 ) ? $wrap.attr('data-itemxl') * 1 : 4;
                var itemlg = ($(this).attr('data-itemlg') * 1 > 0 ) ? $wrap.attr('data-itemlg') * 1 : 4;
                var itemmd = ($(this).attr('data-itemmd') * 1 > 0 ) ? $wrap.attr('data-itemmd') * 1 : 3;
                var itemsm = ($(this).attr('data-itemsm') * 1 > 0 ) ? $wrap.attr('data-itemsm') * 1 : 2;
                var gapping = ($(this).attr('data-gapping') != '') ? $wrap.attr('data-gapping') * 1 : 24;
                
                if ($slideProductTabSlider.length > 0){
                    var $slideProductTabSlider_obj = $slideProductTabSlider.owlCarousel({
                        autoplay: autoplay,
                        margin: gapping,
                        loop: loop,
                        nav: nav,
                        navText: ['<i class="ulina-angle-left"></i>', '<i class="ulina-angle-right"></i>'],
                        dots: dots,
                        responsiveClass: true,
                        items: itemxl,
                        responsive: {
                            0: {
                                items: 1
                            },
                            576: {
                                items: itemsm
                            },
                            768: {
                                items: itemmd
                            },
                            992: {
                                items: itemlg
                            },
                            1200: {
                                items: itemxl
                            }
                        }
                    });
                }
            })
        });
    });
    
    /*--------------------------------------------------------
    / 04. Masonry Grid
    /---------------------------------------------------------*/
    if ($masonryGrid2.length > 0) {
        var $masonryGrid2 = $('#masonryGrid2');

        var Shuffle = window.Shuffle;
        var element = document.querySelector('#masonryGrid2');
        var sizer = element.querySelector('.shafSizer');

        var shaff_inst = new Shuffle(element, {
            itemSelector: '.shafItem',
            sizer: sizer
        });
    }
    
    /*--------------------------------------------------------
    / 05. Count Down
    /----------------------------------------------------------*/
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-deal-product.default', function($scope, $){
            var $ulinaCountDownWrap = $scope.find('.ulinaCountDownWrap');
            var $fromDate = $scope.find('.fromDate');
            var $fromAutoInc = $scope.find('.fromAutoInc');
            var $ulinaCountDown = $scope.find('.ulinaCountDown');
            
            if($fromDate.length > 0){
                var d = $ulinaCountDownWrap.attr('data-d');
                var m = $ulinaCountDownWrap.attr('data-m');
                var y = $ulinaCountDownWrap.attr('data-y');
                $ulinaCountDown.countdown({
                    until: new Date(y, m - 1, d),
                    //until: '+2d',
                    format: 'DHMS',
                    labels: ['Yrs', 'Mths', 'Weks', 'Days', 'Hrs', 'Mins', 'Secs']
                });
            }
            
            if($fromAutoInc.length > 0){
                var da = $ulinaCountDownWrap.attr('data-days');
                $ulinaCountDown.countdown({
                    until: '+'+da+'d',
                    format: 'DHMS',
                    labels: ['Yrs', 'Mths', 'Weks', 'Days', 'Hrs', 'Mins', 'Secs']
                });
            }
            
        });
    });
    
    /*--------------------------------------------------------
    / 06. All Popups
    /----------------------------------------------------------*/
    if ($imgPopup.length > 0) {
        $imgPopup.lightcase({
            transition: 'elastic',
            showSequenceInfo: false,
            slideshow: true,
            maxHeight: 650,
            swipe: true,
            showTitle: false,
            showCaption: false,
            controls: true
        });
    }
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-button.default', function($scope, $){
            var $btnPopup = $scope.find('.btnPopup');
            var $scrollTo = $scope.find('.scrollTo');
            if($btnPopup.length > 0){
                $btnPopup.lightcase({
                    transition: 'elastic',
                    showSequenceInfo: false,
                    slideshow: true,
                    maxHeight: 650,
                    swipe: true,
                    showTitle: false,
                    showCaption: false,
                    controls: true
                });
            }
            if($scrollTo.length > 0){
                $scrollTo.on('click', function(e){
                    e.preventDefault();
                    $('html, body').animate({scrollTop: $(this.hash).offset().top}, 600);
                    return false;
                });
            }
        });
    });
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-link.default', function($scope, $){
            var $linkPopup = $scope.find('.linkPopup');
            var $linkScrollTo = $scope.find('.linkScrollTo');
            if($linkPopup.length > 0){
                $linkPopup.lightcase({
                    transition: 'elastic',
                    showSequenceInfo: false,
                    slideshow: true,
                    maxHeight: 650,
                    swipe: true,
                    showTitle: false,
                    showCaption: false,
                    controls: true
                });
            }
            if($linkScrollTo.length > 0){
                $linkScrollTo.on('click', function(e){
                    e.preventDefault();
                    $('html, body').animate({scrollTop: $(this.hash).offset().top}, 600);
                    return false;
                });
            }
        });
    });
    //Product Zoom
    if ($('.pdImageZoom').length > 0) {
        $('.pdImageZoom').lightcase({
            transition: 'elastic',
            showSequenceInfo: false,
            slideshow: true,
            maxHeight: 650,
            swipe: true,
            showTitle: false,
            showCaption: false,
            controls: true
        });
    }
    
   /*--------------------------------------------------------
    /   07. Back To Top
    /--------------------------------------------------------*/
    var back = $("#backtotop"),
        body = $("body, html");
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > $(window).height()) {
            back.css({ bottom: '30px', opacity: '1', visibility: 'visible' });
        } else {
            back.css({ bottom: '-30px', opacity: '0', visibility: 'hidden' });
        }
    });
    body.on("click", "#backtotop", function (e) {
        e.preventDefault();
        body.animate({ scrollTop: 0 });
        return false;
    });
    
   /*--------------------------------------------------------
    /   08. Pointer Image
    /--------------------------------------------------------*/
    $pointerImage.each(function(){
        let $pointerWrap = $(this);
        $('.cpAchor', $pointerWrap).on('click', function(e){
            e.preventDefault();
            let $cpAchor = $(this);
            if($cpAchor.parent('.clickPoint').hasClass('active')){
                $('.clickPoint', $pointerWrap).removeClass('active');
            }else{
                $('.clickPoint', $pointerWrap).removeClass('active');
                $cpAchor.parent('.clickPoint').addClass('active');
            }
        });
    });
    
    /*--------------------------------------------------------
    /  09. Sidebar Toggle
    /--------------------------------------------------------*/
    $('.shopSidebar ul li.cat-parent > a').on('click', function(e){
        e.preventDefault();
        $(this).siblings('ul').slideToggle();
        $(this).parent('li.cat-parent').toggleClass('active');
    });

    /*--------------------------------------------------------
    / 10. Price Slider
    /----------------------------------------------------------*/
    $( document.body ).on( 'price_slider_create', function( e, min, max ) {
        window.priceFilterRange = [ min, max ];
    });
    $( document.body ).on( 'price_slider_change', function( e, min, max ) {
        if ( window.priceFilterRange[0] != min || window.priceFilterRange[1] != max ) {
            $( '.widget.woocommerce.widget_price_filter .button[type="submit"]' ).click();
        }
    });
    
    /*--------------------------------------------------------
    / 11. Skill Bar
    /----------------------------------------------------------*/
    if ($(".singleSkill").length > 0) {
        $('.singleSkill').appear();
        $('.singleSkill').on('appear', loadSkills);
    }
    var coun = true;
    function loadSkills() {
        $(".singleSkill").each(function () {
            var datacount = $(this).attr("data-skill");
            $(".skill", this).animate({ 'width': datacount + '%' }, 2000);
            if (coun) {
                $(this).find('span').each(function () {
                    var $this = $(this);
                    $({ Counter: 0 }).animate({ Counter: datacount }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function () {
                            $this.text(Math.ceil(this.Counter) + '%');
                        }
                    });
                });
            }
        });
        coun = false;
    }
    /*--------------------------------------------------------
    / 12. Counter
    /---------------------------------------------------------*/
    $('.timer').appear();
    $(document.body).on('appear', '.timer', function(e, $affected) {
        $affected.each(function() {
            var $this = $(this);
            if(!$this.hasClass('appeared')){
                jQuery({Counter: 0}).animate({Counter: $this.attr('data-count')}, {
                    duration: 3000,
                    easing: 'swing',
                    step: function () {
                        var num = Math.ceil(this.Counter).toString();
                        $this.html(num);
                    }
                });
                $this.addClass('appeared');
            }
        });
    });
    
    /*--------------------------------------------------------
    /  13. Sticky Header
    /---------------------------------------------------------*/
    $(window).on('scroll', function () {
        var heights = $(window).height();
        var header_height = $(".isSticky").height();
        if ($(window).scrollTop() > heights) {
            if($(".isSticky").hasClass('h01Mode2')){
                $('.blanks').css('height', header_height);
            }
            $(".isSticky").addClass('fixedHeader animated slideInDown');
        } else {
            if($(".isSticky").hasClass('h01Mode2')){
                $('.blanks').css('height', '0');
            }
            $(".isSticky").removeClass('fixedHeader animated slideInDown');
        }
    });
    
    /*--------------------------------------------------------
    / 14. Popup Search
    /----------------------------------------------------------*/
    $('.anSearch > a').on('click', function (e) {
        e.preventDefault();
        $('.popup_search_sec').toggleClass('active');
    });
    $('.popup_search_overlay, #search_Closer').on('click', function () {
        $('.popup_search_sec').removeClass('active');
    });
    
    /*--------------------------------------------------------
    /  15. Preloader
    /---------------------------------------------------------*/
    $(window).on('load', function () {
        var preload = $('.preloader');
        if (preload.length > 0) {
            preload.delay(500).fadeOut('slow');
        }
    });

    /*--------------------------------------------------------
    / 16. Google Maps
    /----------------------------------------------------------*/
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-google-map.default', function ($scope, $) {
            var $gmap = $scope.find('.googleMap');
            if (!$gmap.length) {
                return;
            }
            $gmap.each(function () {
                var $this = $(this);
                var gmapid = $this.attr('id');
                var $g_map_this = $('#' + gmapid);

                var marker = $g_map_this.attr('data-marker');
                var zoom = parseInt($g_map_this.attr('data-zoom'), 8);
                var style = parseInt($g_map_this.attr('data-map-style'), 10);

                var coordinates = $g_map_this.attr('data-coordinates');
                var coordinates = $.parseJSON(coordinates);
                var primary_lat = '';
                var primary_lon = '';
                var i = 1;
                for (let value of Object.values(coordinates)) {
                    if (i == 1) {
                        primary_lat = value.lati;
                        primary_lon = value.long;
                    }
                    i++;
                }
                
                var map;
                map = new GMaps({
                    el: '#' + gmapid,
                    lat: primary_lat,
                    lng: primary_lon,
                    scrollwheel: false,
                    zoom: zoom,
                    zoomControl: true,
                    panControl: false,
                    streetViewControl: true,
                    mapTypeControl: true,
                    overviewMapControl: false,
                    clickable: false
                });
                var image = "";
                var i = 1;
                for (let value of Object.values(coordinates)) {
                    if (i == 1) {
                        map.addMarker({
                            lat: value.lati,
                            lng: value.long,
                            icon: marker,
                            animation: google.maps.Animation.DROP,
                            verticalAlign: "bottom",
                            horizontalAlign: "center",
                            backgroundColor: "#d3cfcf"
                        });
                    } else {
                        map.addMarker({
                            lat: value.lati,
                            lng: value.long,
                            icon: marker,
                            animation: google.maps.Animation.DROP,
                            backgroundColor: "#d3cfcf"
                        });
                    }
                    i++;
                }
                if (style != 1) {
                    var styles = [
                        {
                            "featureType": "road",
                            "stylers": [
                                {"color": "#898989"}
                            ]
                        }, {
                            "featureType": "water",
                            "stylers": [
                                {"color": "#cad9be"}
                            ]
                        }, {
                            "featureType": "landscape",
                            "stylers": [
                                {"color": "#edeae2"}
                            ]
                        }, {
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {"color": "#121212"}
                            ]
                        }, {
                            "featureType": "poi",
                            "stylers": [
                                {"color": "#99b3cc"}
                            ]
                        }, {
                            "elementType": "labels.text",
                            "stylers": [
                                {"saturation": 1},
                                {"weight": 0.1},
                                {"color": "#121212"}
                            ]
                        }
            
                    ];
                    map.addStyle({
                        styledMapName: "Styled Map",
                        styles: styles,
                        mapTypeId: "map_style"
                    });
                    map.setStyle("map_style");
                }
            });
        });
    });

    /*--------------------------------------------------------
    /  17. Social Toggle Menu
    /---------------------------------------------------------*/
    $('.anSocial a.tog').on('click', function(){
        $(this).parent('.anSocial').toggleClass('active');
    });

    /*--------------------------------------------------------
    /  18. Mobile Menu
    /---------------------------------------------------------*/
    $(window).on('load resize', function(){
        $('.mainMenu ul li.menu-item-has-children > a').on('click', function(e){
            e.preventDefault();
            if($(window).width() < 1366){
                $(this).siblings('ul, .megaMenu').slideToggle();
            }
        });
    });
    $('.menuToggler').on('click', function(e){
        e.preventDefault();
        $('.mainMenu').slideToggle();
        $(this).toggleClass('active');
    });

    /*--------------------------------------------------------
    /  19. Circle Progress
    /---------------------------------------------------------*/
    $('.circleProgress').appear();
    $(document.body).on('appear', '.circleProgress', function(e, $affected) {
        $affected.each(function() {
            var $this = $(this);
            if(!$this.hasClass('appeared')){
                var pint = $this.attr('data-skills');
                var decs = pint * 100;
                var efill = $this.attr('data-emptyfill');
                var fill = $this.attr('data-fills');
                var caps = $this.attr('data-caps');
                var borders = $this.attr('data-borders');
                var size = $this.attr('data-size');
                
                $this.circleProgress({
                    value: pint,
                    startAngle: -Math.PI / 2 * 1,
                    fill: { color: fill },
                    lineCap: caps,
                    thickness: borders,
                    animation: {duration: 1800},
                    size: size,
                    emptyFill: efill
                }).on('circle-animation-progress', function (event, progress) {
                    $(this).find('h3').html(parseInt(decs * progress) + '%');
                });
                $this.addClass('appeared');
            }
        });
    });
    
    /*--------------------------------------------------------
    /  20. Ajax Variations
    /---------------------------------------------------------*/
    $(document.body).on('change', '.uiuxomProductWrapper input[name="variation_id"]', function(e){
        var $this = $(this);
        setTimeout(function(){
            var $uiuxomProductWrapper = $this.closest('.uiuxomProductWrapper.product-type-variable');
            var priceOrgHTML = $('.pi01Price', $uiuxomProductWrapper).html();
            var variation_id = $this.val();

            var product_id = $this.siblings('input[name="product_id"]').val();
            if(variation_id != '' && variation_id != 'undefined' && variation_id > 0){
                $.ajax({
                    type: 'POST',
                    url: ulina_object.ajaxurl,
                    data: {'action': 'ulina_variation_price', 'product_id': product_id, variation_id: variation_id, 'ulina_security': ulina_object.ajax_nonce},
                    success: function (response) {
                        if (response.data) {
                            if(response.data[0].stock_status === 'outofstock'){
                                $('.variableAddToCart', $uiuxomProductWrapper).addClass('disabled');
                                $('.pi01Price', $uiuxomProductWrapper).html(response.data[0].price_variation).append('<span class="variationStockNote">Out Of Stock</span>');
                            }else{
                                $('.variableAddToCart', $uiuxomProductWrapper).removeClass('disabled');
                                $('.pi01Price', $uiuxomProductWrapper).html(response.data[0].price_variation);
                            }
                        }else{
                            $('.variableAddToCart', $uiuxomProductWrapper).addClass('disabled');
                            $('.pi01Price', $uiuxomProductWrapper).html(priceOrgHTML);
                        }
                    }
                });
            }else{
                $.ajax({
                    type: 'POST',
                    url: ulina_object.ajaxurl,
                    data: {'action': 'ulina_product_price', 'product_id': product_id, 'ulina_security': ulina_object.ajax_nonce},
                    success: function (response) {
                        if (response.data) {
                            $('.pi01Price', $uiuxomProductWrapper).html(response.data[0].product_price);
                        }else{
                            $('.pi01Price', $uiuxomProductWrapper).html(priceOrgHTML);
                        }
                    }
                });
                $('.variableAddToCart', $uiuxomProductWrapper).addClass('disabled');
            }
        }, 200);
    });
    
    $(document.body).on('click', '.uiuxomProductWrapper.product-type-variable .variableAddToCart', function(e){ 
        e.preventDefault();
        if(!$(this).hasClass('disabled')){
            var $thisbutton = $(this),
                $wrap = $thisbutton.closest('.uiuxomProductWrapper.product-type-variable'),
                $form = $('form.cart', $wrap),
                id = $thisbutton.attr('data-product'),
                product_qty = 1,
                product_id = $form.find('input[name=product_id]').val() || id,
                variation_id = $form.find('input[name=variation_id]').val() || 0;
            var data = {
                    action: 'ulina_loop_variation_addtocart',
                    product_id: product_id,
                    product_sku: '',
                    quantity: product_qty,
                    variation_id: variation_id,
                    ulina_security: ulina_object.ajax_nonce
                };
            $.ajax({
                type: 'post',
                url: ulina_object.ajaxurl,
                data: data,
                beforeSend: function (response) {
                    $thisbutton.removeClass('added').addClass('loading');
                },
                complete: function (response) {
                    $thisbutton.addClass('added').removeClass('loading');
                }, 
                success: function (response) { 
                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    } else { 
                        $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $thisbutton]);
                    } 
                }, 
            }); 
        }
    }); 
    
    /*--------------------------------------------------------
    /  21. Ajax Paginations
    /---------------------------------------------------------*/
    $(document.body).on('click', '.shopAjaxLoader01', function(e){
        e.preventDefault();
        var $thisBTN = $(this);
        if(!$thisBTN.hasClass('disabled')){
            var query = $thisBTN.attr('data-query');
            var view = $thisBTN.attr('data-view');
            var page = parseInt($thisBTN.attr('data-page'), 10);
            $.ajax({
                type: 'POST',
                url: ulina_object.ajaxurl,
                data: {'action': 'ulina_ajax_product', query: query, page: page, view: view, ulina_security: ulina_object.ajax_nonce},
                beforeSend: function (response) {
                    $thisBTN.addClass('loading');
                },
                complete: function (response) {
                    $thisBTN.removeClass('loading');
                }, 
                success: function (response) {
                    if(response.suc === 1){
                        $thisBTN.closest('.shopPaginationRow').siblings('.productGridRow').append(response.html);
                        $thisBTN.attr('data-page', response.page);
                    }else{
                        $thisBTN.addClass('disabled');
                    }
                }
            });
        }
    });
    $(document.body).on('ajax_products_loaded', function (e, $content) {

        var $variations = $content.find('.variations_form');

        if (typeof $.fn.wc_variation_form !== 'undefined') {
            $variations.each(function () {
                $(this).wc_variation_form();
            });
        }

        if (typeof $.fn.tawcvs_variation_swatches_form !== 'undefined') {
            $variations.tawcvs_variation_swatches_form();
        }

        if (typeof $.fn.wcboost_variation_swatches !== 'undefined') {
            $variations.wcboost_variation_swatches();
        }
    });
    $(document.body).on('click', '.shopAjaxPagination > a', function(e){
        e.preventDefault();
        var $thisBTN = $(this);
        var $btnParent = $thisBTN.parent('.shopAjaxPagination');
        var $tabGridContainer = $('#grid-tab-pane .shopProductRow');
        var $tabListContainer = $('#list-tab-pane .shopProductRow');
        var $plainGridContainer = $('.shopPlainGridRow');
        var viewMode = $btnParent.attr('data-toggle');
        var maxPage = $btnParent.attr('data-maxpage');
        var currentPage = $btnParent.attr('data-currentpage');
        
        if($btnParent.hasClass('reqRunning') || $btnParent.hasClass('noMorePost')){
            return false;
        }
        if(currentPage >= maxPage){
            return false;
        }
        
        var href = $thisBTN.attr('href');
        $btnParent.addClass('reqRunning');
        $thisBTN.addClass('loading');
        $.get(
            href,
            function (response) {
                if(viewMode == 1){
                    var gridContent = $(response).find('#grid-tab-pane').find('.shopProductRow').children('div.ulinaProductCols');
                    var listContent = $(response).find('#list-tab-pane').find('.shopProductRow').children('div.ulinaProductListCols');
                    $tabGridContainer.append(gridContent);
                    $(document.body).trigger('ajax_products_loaded', [gridContent, true]);
                    $tabListContainer.append(listContent);
                    $(document.body).trigger('ajax_products_loaded', [listContent, true]);
                }else{
                    var plainGridContent = $(response).find('.shopPlainGridRow').children('div.ulinaProductCols');
                    $plainGridContainer.append(plainGridContent);
                    $(document.body).trigger('ajax_products_loaded', [plainGridContent, true]);
                }
                var currentPage = $(response).find('.shopAjaxPagination').attr('data-currentpage');
                var nextPageURL = $(response).find('.shopAjaxPagination').children('a').attr('href');
                $thisBTN.removeClass('loading').attr('href', nextPageURL);
                $btnParent.removeClass('reqRunning').attr('data-currentpage', currentPage);
                if(currentPage >= maxPage){
                    $btnParent.addClass('noMorePost');
                }
            }
        );
    });
    
    /*--------------------------------------------------------
    / 22. Product Tab Hotspot
    /---------------------------------------------------------*/
    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uiuxom-image-hotspot.default', function($scope, $){
            var $wrap = $scope.find('.ctaImageWrap');
            var $pointerImage = $scope.find('.pointerImage');
            var cords = $.parseJSON($wrap.attr('data-cords'));
            
            if($pointerImage.length > 0){
                $pointerImage.hotspot({
                    data: cords,
                    tag: 'img',
                    interactivity: "click",
                    schema: [
                        {
                          'property': 'Image',
                          'default': ''
                        },
                        {
                          'property': 'Title',
                          'default': ''
                        },
                        {
                          'property': 'Price',
                          'default': ''
                        }
                    ]
                });
            }
        });
    });
    
    /*--------------------------------------------------------
    / 23. Qty
    /----------------------------------------------------------*/
    $("body").on('click', '.btnMinus, .btnPlus', function (e) {
        e.preventDefault();
        let cart_qty = $(this).closest('.quantity').find('.carqty'),
            vals = parseInt(cart_qty.val(), 10),
            step = parseInt(cart_qty.attr('step'), 10);
        var min_qty = cart_qty.attr('min');
        let min;
        if (typeof min_qty !== 'undefined' && min_qty !== false && min_qty != ''){
            min = min_qty;
        }else{
            min = 1;
        }
        if (!vals || vals === '' || vals === undefined || isNaN(vals)) vals = 0;
        if (!step || step === '' || step === undefined || isNaN(step)) step = 1;
        if ($(this).is('.btnMinus')) {
            if (vals > 1) {
                vals -= step;
                cart_qty.val(vals).trigger('change');
            } else {
                cart_qty.val(min).trigger('change');
            }
        } else {
            vals += step;
            cart_qty.val(vals).trigger('change');
        }
    });
    
    
    
    /*--------------------------------------------------------
    / 24. Ajax Coupon
    /----------------------------------------------------------*/
    $(document.body).on('submit', '#cartCouponForm', function(e){
        e.preventDefault();
        var $this = $(this);
        var $thisBTN = $('button[name="apply_coupon"]', $this);
        var $form = $(document.body).find('.woocommerce-cart-form');
        
        var $text_field = $( '#coupon_code' );
        var coupon_code = $text_field.val();
        
        $.ajax({
            type: 'POST',
            url: ulina_object.ajaxurl,
            data: {'action': 'ulina_apply_coupon', coupon_code: coupon_code, ulina_security: ulina_object.ajax_nonce},
            beforeSend: function (response) {
                $thisBTN.attr('disabled', 'disabled');
            },
            success: function (response) {
                $( '.woocommerce-error, .woocommerce-message, .woocommerce-info' ).remove();
                var $target = $( '.woocommerce-notices-wrapper' );
                $target.prepend( response );
                $thisBTN.removeAttr('disabled');
            },
            complete: function (response) {
                $text_field.val( '' );
                $('button[name="update_cart"]', $form).removeAttr('disabled').trigger('click');
            }
        });
    });
    
    /*--------------------------------------------------------
    / 25. Show Login Toggle
    /----------------------------------------------------------*/
    $(document.body).on('click', '.showloginForm', function(e){
        e.preventDefault();
        $(this).parent('p').parent('.loginLinks').siblings('form.woocommerce-form-login').slideToggle();
        $(document.body).toggleClass('loginActivate');
    });
    
    /*--------------------------------------------------------
    / 26. Quick view Modal On hidden
    /----------------------------------------------------------*/
    $(window).on('load', function(){
        const productQuickViewHide = document.getElementById('productQuickView'); 
        productQuickViewHide.addEventListener('hidden.bs.modal', event => {
            $('.ulinaModalContent').fadeOut(function(){
                $(this).html('');
                $('.ulinaModalLoader').fadeIn();
            });
        });
    });
    $('#productQuickView').on('click', '.reset_variations', function () {
        $('.ulinaModalContent select').niceSelect('update');
        $('.ulinaModalContent select').parent().addClass('select-area');
    });
    
    $(document.body).on('click', '.pi01AQView', function(e){
        e.preventDefault();
        var $thisBTN = $(this);
        var productID = $thisBTN.attr('data-id');
        
        const myModal = new bootstrap.Modal('#productQuickView', {
            keyboard: false
        });
        const productQuickView = document.getElementById('productQuickView'); 
        myModal.show(productQuickView);
        
        jQuery.ajax({
            type: 'POST',
            url: ulina_object.ajaxurl,
            data: {'action': 'ulina_product_quick_view', 'productID': productID, 'ulina_security': ulina_object.ajax_nonce},
            success: function (response) {
                var obj = jQuery.parseJSON(response);
                jQuery('.ulinaModalLoader').fadeOut('fast', function () {
                    var htmls = obj.html;
                    jQuery('.ulinaModalContent').fadeIn('fast').html(obj.html);
                    
                    if(jQuery('.ulinaModalContent .variations_form').length > 0){
                        jQuery('.ulinaModalContent .variationItem .value > select').niceSelect();
                        jQuery('.ulinaModalContent .variationItem .value > select').parent().addClass('select-area');

                        var $variations;
                        jQuery('.ulinaModalContent .variations_form').each(function () {
                            $variations = jQuery(this).wc_variation_form();
                        });
                        if (typeof $.fn.tawcvs_variation_swatches_form !== 'undefined') {
                            $variations.tawcvs_variation_swatches_form();
                        }

                        if (typeof $.fn.wcboost_variation_swatches !== 'undefined') {
                            $variations.wcboost_variation_swatches();
                        }
                    }
                    jQuery(document).trigger('ajaxComplete');

                    jQuery('#productQuickView .productGalleryPopup').not('.slick-initialized').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        arrows: false,
                        fade: true,
                        asNavFor: '.productGalleryThumbPopup'
                    });

                    // Slick For productGalleryThumb
                    jQuery('#productQuickView .productGalleryThumbPopup').not('.slick-initialized').slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        asNavFor: '.productGalleryPopup',
                        dots: false,
                        centerMode: false,
                        focusOnSelect: true,
                        arrows: true,
                        prevArrow: '<button type="button" class="slick-prev"><i class="ulina-angle-left"></i></button>',
                        nextArrow: '<button type="button" class="slick-next"><i class="ulina-angle-right"></i></button>'
                    });

                });
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log("Error: " + errorThrown);
            }
        });
    });
    
})(jQuery);