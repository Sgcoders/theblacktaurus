!function(e){var t={Android:function(){return navigator.userAgent.match(/Android/i)},BlackBerry:function(){return navigator.userAgent.match(/BlackBerry/i)},iOS:function(){return navigator.userAgent.match(/iPhone|iPad|iPod/i)},Opera:function(){return navigator.userAgent.match(/Opera Mini/i)},Windows:function(){return navigator.userAgent.match(/IEMobile/i)},any:function(){return t.Android()||t.BlackBerry()||t.iOS()||t.Opera()||t.Windows()}};e((function(){var a,s,i,o,n,l,r,c,d,u;e("[data-background]").each((function(){if(e(this).attr("data-background")){var t=e(this).attr("data-background");e(this).css({"background-image":"url("+t+")","background-color":"#fff"})}})),(a=e(".owl-slider")).length>0&&a.each((function(){var t=e(this),s=t.data("owl-auto"),i=t.data("owl-loop"),o=t.data("owl-speed"),n=t.data("owl-gap"),l=t.data("owl-nav"),r=t.data("owl-dots"),c=t.data("owl-animate-in")?t.data("owl-animate-in"):"",d=t.data("owl-animate-out")?t.data("owl-animate-out"):"",u=t.data("owl-item"),p=t.data("owl-item-xs"),f=t.data("owl-item-sm"),m=t.data("owl-item-md"),h=t.data("owl-item-lg"),g=t.data("owl-item-xl"),v=t.data("owl-duration"),b="on"==t.data("owl-mousedrag");console.log(l),a.children("div, span, a, img, h1, h2, h3, h4, h5, h5").length>=2&&t.addClass("owl-carousel").owlCarousel({rtl:"rtl"===e("body").prop("dir"),animateIn:c,animateOut:d,margin:n,autoplay:s,autoplayTimeout:o,autoplayHoverPause:!0,loop:i,nav:l,mouseDrag:b,touchDrag:!0,autoplaySpeed:v,navSpeed:v,dotsSpeed:v,dragEndSpeed:v,navText:['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],dots:r,items:u,responsive:{0:{items:p},480:{items:f},768:{items:m},992:{items:h},1200:{items:g},1680:{items:u}}})})),s=e(".navigation--sidebar"),i=e(".ps-filter--sidebar"),e(".menu-toggle-open").on("click",(function(t){t.preventDefault(),e(this).toggleClass("active"),s.toggleClass("active"),e(".ps-site-overlay").toggleClass("active")})),e(".ps-toggle--sidebar").on("click",(function(t){t.preventDefault();var a=e(this).attr("href");e(this).toggleClass("active"),e(this).siblings("a").removeClass("active"),e(a).toggleClass("active"),e(a).siblings(".ps-panel--sidebar").removeClass("active"),e(this).hasClass("active")?e(".ps-site-overlay").addClass("active"):e(".ps-site-overlay").removeClass("active")})),e("#filter-sidebar").on("click",(function(t){t.preventDefault(),i.addClass("active"),e(".ps-site-overlay").addClass("active")})),e(".ps-filter--sidebar .ps-filter__header .ps-btn--close").on("click",(function(t){t.preventDefault(),i.removeClass("active"),e(".ps-site-overlay").removeClass("active")})),e("body").on("click",(function(t){e(t.target).siblings(".ps-panel--sidebar").hasClass("active")&&(e(".ps-panel--sidebar").removeClass("active"),e(".ps-site-overlay").removeClass("active"))})),e(".menu--mobile .menu-item-has-children > .sub-toggle").on("click",(function(t){t.preventDefault();var a=e(this).parent(".menu-item-has-children");e(this).toggleClass("active"),a.siblings().find(".sub-toggle").removeClass("active"),a.children(".sub-menu").slideToggle(350),a.siblings().find(".sub-menu").slideUp(350),a.hasClass("has-mega-menu")&&(a.children(".mega-menu").slideToggle(350),a.siblings(".has-mega-menu").find(".mega-menu").slideUp(350))})),e(".menu--mobile .has-mega-menu .mega-menu__column .sub-toggle").on("click",(function(t){t.preventDefault();var a=e(this).closest(".mega-menu__column");e(this).toggleClass("active"),a.siblings().find(".sub-toggle").removeClass("active"),a.children(".mega-menu__list").slideToggle(350),a.siblings().find(".mega-menu__list").slideUp(350)})),e(".ps-list--categories").length>0&&e(".ps-list--categories .menu-item-has-children > .sub-toggle").on("click",(function(t){t.preventDefault();var a=e(this).parent(".menu-item-has-children");e(this).toggleClass("active"),a.siblings().find(".sub-toggle").removeClass("active"),a.children(".sub-menu").slideToggle(350),a.siblings().find(".sub-menu").slideUp(350),a.hasClass("has-mega-menu")&&(a.children(".mega-menu").slideToggle(350),a.siblings(".has-mega-menu").find(".mega-menu").slideUp(350))})),function(t){var a=e(t);if(a.length>0)if(a.hasClass("filter")){a.imagesLoaded((function(){a.isotope({columnWidth:".grid-sizer",itemSelector:".grid-item",isotope:{columnWidth:".grid-sizer"},filter:"*"})}));var s=a.closest(".masonry-root").find(".ps-masonry-filter > li > a");s.on("click",(function(t){t.preventDefault();var a=e(this).attr("href");return s.find("a").removeClass("current"),e(this).parent("li").addClass("current"),e(this).parent("li").siblings("li").removeClass("current"),e(this).closest(".masonry-root").find(".ps-masonry").isotope({itemSelector:".grid-item",isotope:{columnWidth:".grid-sizer"},filter:a}),!1}))}else a.imagesLoaded((function(){a.masonry({columnWidth:".grid-sizer",itemSelector:".grid-item"})}))}(".ps-masonry"),e(".ps-filter__trigger").on("click",(function(t){t.preventDefault();var a=e(this);a.find(".ps-filter__icon").toggleClass("active"),a.closest(".ps-filter").find(".ps-filter__content").slideToggle()})),e(".ps-sidebar--home").length>0&&e(".ps-sidebar--home > .ps-sidebar__header > a").on("click",(function(t){t.preventDefault(),e(this).closest(".ps-sidebar--home").children(".ps-sidebar__content").slideToggle()})),e(".ps-tab-list  li > a ").on("click",(function(t){t.preventDefault();var a=e(this).attr("href");e(this).closest("li").siblings("li").removeClass("active"),e(this).closest("li").addClass("active"),e(a).addClass("active"),e(a).siblings(".ps-tab").removeClass("active"),e(".ps-tab-list li").removeClass("active"),e('.ps-tab-list li a[href="'+a+'"]').closest("li").addClass("active"),e("html, body").animate({scrollTop:e(a).offset().top-e(".header--product .navigation").height()-165+"px"},800)})),e(".ps-tab-list.owl-slider .owl-item a").on("click",(function(t){t.preventDefault();var a=e(this).attr("href");e(this).closest(".owl-item").siblings(".owl-item").removeClass("active"),e(this).closest(".owl-item").addClass("active"),e(a).addClass("active"),e(a).siblings(".ps-tab").removeClass("active")})),function(){var t=e(".ps-product--detail");if(t.length>0){var a=t.find(".ps-product__gallery"),s=t.find(".ps-product__variants"),i=t.find(".ps-product__thumbnail").data("vertical");a.slick({slidesToShow:1,slidesToScroll:1,rtl:"rtl"===e("body").prop("dir"),asNavFor:".ps-product__variants",fade:!0,dots:!1,infinite:!1,arrows:a.data("arrow"),prevArrow:"<a href='#'><i class='fa fa-angle-left'></i></a>",nextArrow:"<a href='#'><i class='fa fa-angle-right'></i></a>"}),s.slick({slidesToShow:s.data("item"),slidesToScroll:1,rtl:"rtl"===e("body").prop("dir"),infinite:!1,arrows:s.data("arrow"),focusOnSelect:!0,prevArrow:"<a href='#'><i class='fa fa-angle-up'></i></a>",nextArrow:"<a href='#'><i class='fa fa-angle-down'></i></a>",asNavFor:".ps-product__gallery",vertical:i,responsive:[{breakpoint:1200,settings:{arrows:s.data("arrow"),slidesToShow:4,vertical:!1,prevArrow:"<a href='#'><i class='fa fa-angle-left'></i></a>",nextArrow:"<a href='#'><i class='fa fa-angle-right'></i></a>"}},{breakpoint:992,settings:{arrows:s.data("arrow"),slidesToShow:4,vertical:!1,prevArrow:"<a href='#'><i class='fa fa-angle-left'></i></a>",nextArrow:"<a href='#'><i class='fa fa-angle-right'></i></a>"}},{breakpoint:480,settings:{slidesToShow:3,vertical:!1,prevArrow:"<a href='#'><i class='fa fa-angle-left'></i></a>",nextArrow:"<a href='#'><i class='fa fa-angle-right'></i></a>"}}]})}}(),(o=e(".ps-product--detail")).length>0&&(e(".ps-product__gallery").lightGallery({selector:".item a",thumbnail:!0,share:!1,fullScreen:!1,autoplay:!1,autoplayControls:!1,actualSize:!1}),o.hasClass("ps-product--sticky")&&e(".ps-product__thumbnail").lightGallery({selector:".item a",thumbnail:!0,share:!1,fullScreen:!1,autoplay:!1,autoplayControls:!1,actualSize:!1})),e(".ps-gallery--image").lightGallery({selector:".ps-gallery__item",thumbnail:!0,share:!1,fullScreen:!1,autoplay:!1,autoplayControls:!1,actualSize:!1}),e(".ps-video").lightGallery({thumbnail:!1,share:!1,fullScreen:!1,autoplay:!1,autoplayControls:!1,actualSize:!1}),e("select.ps-rating").each((function(){var t;t="true"==e(this).attr("data-read-only"),e(this).barrating({theme:"fontawesome-stars",readonly:t,emptyValue:"0"})})),n=0,l=e("#back2top"),e(window).scroll((function(){var t=e(window).scrollTop();t>n&&t>500?l.addClass("active"):l.removeClass("active"),n=t})),l.on("click",(function(){e("html, body").animate({scrollTop:"0px"},800)})),function(){e(".header").each((function(){if(!0===e(this).data("sticky")){var t=e(this);e(window).scroll((function(){e(this).scrollTop()>50?t.addClass("header--sticky"):t.removeClass("header--sticky")}))}}));var t=e("#cart-sticky");t.length>0&&e(window).scroll((function(){e(this).scrollTop()>50?t.addClass("active"):t.removeClass("active")}))}(),function(){var t=e("#contact-map");if(!(t.length>0))return!1;t.gmap3({address:t.data("address"),zoom:t.data("zoom"),mapTypeId:google.maps.MapTypeId.ROADMAP,scrollwheel:!1}).marker((function(e){return{position:e.getCenter(),icon:"img/marker.png"}})).infowindow({content:t.data("address")}).then((function(e){var t=this.get(0),a=this.get(1);a.addListener("click",(function(){e.open(t,a)}))}))}(),(r=e(".ps-modal")).length&&r.hasClass("active")&&e("body").css("overflow-y","hidden"),r.find(".ps-modal__close, .ps-btn--close").on("click",(function(t){t.preventDefault(),e(this).closest(".ps-modal").removeClass("active")})),e(".ps-modal-link").on("click",(function(t){t.preventDefault();var a=e(this).attr("href");e(a).addClass("active"),e("body").css("overflow-y","hidden")})),e(".ps-modal").on("click",(function(t){e(t.target).closest(".ps-modal__container").length||(r.removeClass("active"),e("body").css("overflow-y","auto"))})),c=e(".ps-search"),e(".ps-search-btn").on("click",(function(e){e.preventDefault(),c.addClass("active")})),c.find(".ps-btn--close").on("click",(function(e){e.preventDefault(),c.removeClass("active")})),e(".ps-countdown").each((function(){var t=e(this),a=e(this).data("time"),s=new Date(a).getTime(),i=setInterval((function(){var e=(new Date).getTime(),a=s-e,o=Math.floor(a/864e5),n=Math.floor(a%864e5/36e5),l=Math.floor(a%36e5/6e4),r=Math.floor(a%6e4/1e3);t.find(".days").html(o<10?"0"+o:o),t.find(".hours").html(n<10?"0"+n:n),t.find(".minutes").html(l<10?"0"+l:l),t.find(".seconds").html(r<10?"0"+r:r),a<0&&(clearInterval(i),t.closest(".ps-section").hide())}),1e3)})),e(".ps-carousel--animate").slick({autoplay:!0,rtl:"rtl"===e("body").prop("dir"),speed:1e3,lazyLoad:"progressive",arrows:!1,fade:!0,dots:!0,prevArrow:"<i class='slider-prev ba-back'></i>",nextArrow:"<i class='slider-next ba-next'></i>"}),e(".bg--parallax").each((function(){var a=e(this),s=e(window).height();t.any()?e(this).css("background-attachment","scroll"):e(window).scroll((function(){var t=e(window).scrollTop(),i=a.offset().top;i+a.outerHeight()<t||i>t+s||a.css("backgroundPosition","50% "+Math.round(.2*(i-t))+"px")}))})),function(){var t,a=e(".ps-product--sticky"),s=e(window).innerWidth();if(!(a.length>0))return!1;if(t=new StickySidebar(".ps-product__sticky .ps-product__info",{topSpacing:20,bottomSpacing:20,containerSelector:".ps-product__sticky"}),e(".sticky-2").length>0)var i=new StickySidebar(".ps-product__sticky .sticky-2",{topSpacing:20,bottomSpacing:20,containerSelector:".ps-product__sticky"});992>s&&(t.destroy(),i.destroy())}(),function(){var t=e(".ps-accordion");t.find(".ps-accordion__content").hide(),e(".ps-accordion.active").find(".ps-accordion__content").show(),t.find(".ps-accordion__header").on("click",(function(t){t.preventDefault(),e(this).closest(".ps-accordion").hasClass("active")?(e(this).closest(".ps-accordion").removeClass("active"),e(this).closest(".ps-accordion").find(".ps-accordion__content").slideUp(350)):(e(this).closest(".ps-accordion").addClass("active"),e(this).closest(".ps-accordion").find(".ps-accordion__content").slideDown(350),e(this).closest(".ps-accordion").siblings(".ps-accordion").find(".ps-accordion__content").slideUp()),e(this).closest(".ps-accordion").siblings(".ps-accordion").removeClass("active"),e(this).closest(".ps-accordion").siblings(".ps-accordion").find(".ps-accordion__content").slideUp()}))}(),e(".ps-progress").each((function(t){var a=e(this).data("value");e(this).find("span").css({width:a+"%"})})),function(){e("select.ps-select").select2({placeholder:e(this).data("placeholder"),minimumResultsForSearch:-1,templateSelection:function(e){return jQuery.trim(e.text)}})}(),d=e(".ps-carousel__prev"),u=e(".ps-carousel__next"),d.on("click",(function(t){t.preventDefault();var a=e(this).attr("href");e(a).trigger("prev.owl.carousel",[1e3])})),u.on("click",(function(t){t.preventDefault();var a=e(this).attr("href");e(a).trigger("next.owl.carousel",[1e3])})),e('[data-toggle="tooltip"]').tooltip(),function(){var e=document.getElementById("nonlinear");if(void 0!==e&&null!=e){noUiSlider.create(e,{connect:!0,behaviour:"tap",start:[0,1e3],range:{min:0,"10%":100,"20%":200,"30%":300,"40%":400,"50%":500,"60%":600,"70%":700,"80%":800,"90%":900,max:1e3}});var t=[document.querySelector(".ps-slider__min"),document.querySelector(".ps-slider__max")];e.noUiSlider.on("update",(function(e,a){t[a].innerHTML=Math.round(e[a])}))}}(),e("body").on("click",(function(t){(e(t.target).closest(".ps-form--search-header")||".ps-form--search-header"===t.target.className)&&e(".ps-panel--search-result").removeClass("active")}))})),e("#product-quickview").on("shown.bs.modal",(function(){e(".ps-product--quickview .ps-product__images").slick("setPosition")})),e(window).on("load",(function(){e("body").addClass("loaded")})),e.fn.menumaker=function(t){var a=e(this),s=e.extend({title:"Menu",format:"dropdown",sticky:!1},t);return this.each((function(){a.prepend('<div id="menu-button">'+s.title+"</div>"),e(this).find("#menu-button").on("click",(function(){e(this).toggleClass("menu-opened");var t=e(this).next("ul");t.hasClass("open")?t.hide().removeClass("open"):(t.show().addClass("open"),"dropdown"===s.format&&t.find("ul").show())})),a.find("li ul").parent().addClass("has-sub"),multiTg=function(){a.find(".has-sub").prepend('<span class="submenu-button"></span>'),a.find(".submenu-button").on("click",(function(){e(this).toggleClass("submenu-opened"),e(this).siblings("ul").hasClass("open")?e(this).siblings("ul").removeClass("open").hide():e(this).siblings("ul").addClass("open").show()}))},"multitoggle"===s.format?multiTg():a.addClass("dropdown"),!0===s.sticky&&a.css("position","fixed"),resizeFix=function(){e(window).width()>768&&a.find("ul").show(),e(window).width()<=768&&a.find("ul").hide().removeClass("open")}}))},e(window).width()<=980||jQuery(window).scroll((function(){jQuery(this).scrollTop()>0?jQuery("header").addClass("fix"):jQuery("header").removeClass("fix")})),e("#cssmenu").menumaker({title:"Menu",format:"multitoggle"});var a=e("#bannerCarousel"),s=e("#hero-carousel-indicators");a.find(".carousel-inner").children(".carousel-item").each((function(e){0===e?s.append("<li data-target='#bannerCarousel' data-slide-to='"+e+"' class='active'></li>"):s.append("<li data-target='#bannerCarousel' data-slide-to='"+e+"'></li>")})),a.on("slid.bs.carousel",(function(t){e(this).find("h2").addClass("animated fadeInDown"),e(this).find("p").addClass("animated fadeInUp"),e(this).find(".btn-get-started").addClass("animated fadeInUp")})),new WOW({boxClass:"wow",animateClass:"animated",offset:0,mobile:!1,live:!0}).init(),e("#indxproductsale1").owlCarousel({loop:!0,margin:20,nav:!0,autoHeight:!0,dots:!1,autoplay:!1,navText:['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],responsive:{0:{items:1},600:{items:2},1e3:{items:4}}}),snackCarousel=e("#snakbase").owlCarousel({loop:!1,margin:20,nav:!0,autoHeight:!0,dots:!1,autoplay:!1,navText:['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],responsive:{0:{items:1},600:{items:2},1e3:{items:2}}}),e(".footer-bullete li").each((function(t){e(this).prepend('<i class="fas fa-caret-right"></i>')})),e(".page-title").text(e("title").text()),e("li.contatlist").parent("ul").addClass("contatlist"),e("li.contatlist").each((function(t){e(this).removeClass("contatlist");var a=0==t?"map-marker-alt":1==t?"envelope":"phone-alt";e(this).prepend('<i class="fas fa-'+a+'"></i>')})),e(".before-contact-form").append('<form name="frm_cntct" id="frm_cntct" method="post" action="" onSubmit="return false;">                  <div class="row">                    <div class="form-group col-md-6">                      <input type="text" class="form-control form-control-lg" name="name" placeholder="Your Name*">                    </div>                    <div class="form-group col-md-6">                      <input type="email" class="form-control form-control-lg" name="email" placeholder="Your Email Id*">                    </div>                  </div>                  <div class="row">                    <div class="form-group col-md-6">                      <input type="text" class="form-control form-control-lg" name="phone" placeholder="Phone*">                    </div>                    <div class="form-group col-md-6">                      <input type="subject" class="form-control form-control-lg" name="subject" placeholder="Subject*">                    </div>                  </div>                  <div class="form-group">                    <textarea rows="4" class="form-control form-control-lg" name="message" placeholder="Your Message"></textarea>                  </div>                  <button type="submit" class="btn btn-lg btn-dark btn-block" id="submit_button">Submit</button>                </form>                <div id="message_sent" class="text-center text-danger d-block mt-3"></div>')}(jQuery);