var filter_element;
var app=null;
var thumb_galleries=null;
;(function($){

	$(document).ready(function(){
		app=new App;
	});


	var App = function(){
		app = this;
		app.bind();
	}


	App.prototype.bind=function(){

		if($('.slide-home-perfil').length>0){
		    // Client slider
		    $('.slide-home-perfil').owlCarousel({
		         items : 1,
		         autoPlay: false,
		         singleItem:true
		    });
		}

		if($('.home-video-slide').length>0){
		    // Client slider
		    $('.home-video-slide').owlCarousel({
		         items : 2,
		         itemsTablet:[768,2],
		         autoPlay: false
		    });
		}

		if($('.home-institutional-slide').length>0){
		    // Client slider
		    $('.home-institutional-slide').owlCarousel({
		         items : 4,
		         autoPlay: false
		    });
		}


		$('.portfolio .figure .figure-caption').each(function(){
			$(this).on('click',function(){
				var href=$(this).find('h3 a').attr('href');
				location.href=href;
			});
		});

        app.syncedGallery($("#single-gallery"),$("#single-gallery_sync2"));	

		if($('#content-archive').length>0){
			app.triggerIsotopeFilter();
		}

		if($('#bullet-page-containter').length>0){
			app.goTobullet();
		}

		$('.input-group-btn').on('click',function(e){
			var on =$(this).attr('toggle');
			if (!on){
	        	e.preventDefault();			
				$('#s').attr('style','opacity:1;width:100% !important;padding-left:25px !important;');
				$(this).attr('toggle','true');
				setTimeout(function(){
					$('.input-group-btn button').attr('style','background: none repeat scroll 0 0 transparent; z-index: 100;')
					$('.input-group-btn button').animate({
						left:'-30px'
					},200,function(){
						$('.input-group-btn button i').attr('style','color:#000000 !important');
					});		
				},800);
				$(this).attr('toggle','on');
			}
		});

		if ($.fn.infinitescroll) {

			$('.portfolio').infinitescroll({
			  navSelector  : ".pagination",            
			  nextSelector : ".mde-next-page a",    
			  itemSelector : "#content-archive .masonry-item",          
			  debug        : false,                        
			  loading: {
			    finished: undefined,
			    finishedMsg: "<em>No hay más noticias.</em>",
			    img: null,
			    msg: null,
			    msgText: "<div class='post-loader'>Cargando más noticias...</div>",
			    selector: null,
			    speed: 'slow',
			    start: undefined
			  },
			  animate      : true,      
			  extraScrollPx: 50,      
			  bufferPx     : 20,
			  errorCallback: function(){},
			  localMode    : false
			    },function(arrayOfNewElems){
			     $('.portfolio').css({height:$('.portfolio').height()+1000});
			     $('.masonry-item>div').addClass('animated');
			 	 app.c();
			 	 $('.portfolio').isotope('reloadItems');
			});
			
		}

		app.loadShortGallery();

	}

	App.prototype.triggerIsotopeFilter=function(){
		if (typeof c_f !== 'undefined'){
			var match='.filter-'+c_f.data;
			$(c_f.element).find('a').each(function(){
				if($(this).data('filter')==match){
					filter_element=$(this);
					setTimeout(function(){
						filter_element.click();
					},2000);
				}
			});
		}

	};

	App.prototype.c=function(){
		var a=$;
		a(".masonry").each(function(b, c) {
		    var d = a(c),
		        e = d.find(".masonry-item"),
		        f = d.attr("data-padding"),
		        h = (d.parents(".container-fullwidth").length > 0, -f / 2);
		    d.css({
		        margin: "0 " + h + "px"
		    }), setTimeout(function() {
		            var b = 3,
		                c = a(window).width(),
		                h = 2;
		            768 > c ? (b = d.attr("data-col-xs"), h = 1) : 992 > c ? (b = d.attr("data-col-sm"), h = 1) : 1200 > c ? (b = d.attr("data-col-md"), h = 2) : c > 1200 && (b = d.attr("data-col-lg"), h = 2);
		            var i;
		            d.hasClass("use-masonry") ? e.each(function() {
		                i = Math.floor(d.width() / b);
		                var c = a(this);
		                c.hasClass("masonry-wide") ? c.css("width", i * h) : c.css("width", i)
		            }) : (i = Math.floor(d.width() / b), e.css("width", i)), e.find(".figure,.post-masonry-inner").css("padding", f / 2 + "px"), d.isotope({
		                itemSelector: ".masonry-item",
		                getSortData: {
		                    "default": function(a) {
		                        return parseInt(a.attr("data-menu-order"))
		                    },
		                    title: function(a) {
		                        return a.attr("data-title")
		                    },
		                    date: function(a) {
		                        return Date.parse(a.attr("data-date"))
		                    },
		                    comments: function(a) {
		                        return parseInt(a.attr("data-comments"))
		                    }
		                },
		                sortBy: "default",
		                layoutMode: d.attr("data-layout"),
		                resizable: !1,
		                masonry: {
		                    columnWidth: i,
		                    gutter: f
		                }
		            }, function() {
		                //a.waypoints("refresh"), d.removeClass("no-transition"), g(e.find(".portfolio-os-animation"), d), g(e.find(".blog-os-animation"), d)
		            })
		        }, 200)
		})

	}


	App.prototype.goTobullet=function(){
		if (typeof b_nav !== 'undefined'){
			var match='#'+b_nav;
			if($(match).length>0)
				$("html, body").animate({ scrollTop: ($(match).offset().top-50) }, 5000);
		}

	};

	App.prototype.loadShortGallery=function(){

		var shortElements=$('.thumb-gallery.short-load');
			$(shortElements).each(function(){
				var image_id=$(this).find('.image-cont').attr('id');	
				var image_nav_id=$(this).find('.nav-cont').attr('id');
				app.syncedGallery($('#'+image_id),$('#'+image_nav_id));
			});


	}

	App.prototype.syncedGallery=function(sync1,sync2){

		if(sync1.length>0 && sync2.length>0){
			  function syncPosition(el){
			    var current = this.currentItem;
			    sync2
			      .find(".owl-item")
			      .removeClass("synced")
			      .eq(current)
			      .addClass("synced")
			    if(sync2.data("owlCarousel") !== undefined){
			      center(current)
			    }
			  }
			  function center(number){
			    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
			    var num = number;
			    var found = false;
			    for(var i in sync2visible){
			      if(num === sync2visible[i]){
			        var found = true;
			      }
			    }
			    if(found===false){
			      if(num>sync2visible[sync2visible.length-1]){
			        sync2.trigger("owl.goTo", num - sync2visible.length+2)
			      }else{
			        if(num - 1 === -1){
			          num = 0;
			        }
			        sync2.trigger("owl.goTo", num);
			      }
			    } else if(num === sync2visible[sync2visible.length-1]){
			      sync2.trigger("owl.goTo", sync2visible[1])
			    } else if(num === sync2visible[0]){
			      sync2.trigger("owl.goTo", num-1)
			    }
			  }
			  sync1.owlCarousel({
			    singleItem : true,
			    slideSpeed : 1000,
			    navigation: true,
			    navigationText: [
				  '<button class="nav-controls left"><i class="fa fa-angle-left"></i></button>',
				  '<button class="nav-controls right"><i class="fa fa-angle-right"></i></button>'
			    ],			    
			    pagination:false,
			    autoHeight : true,
			    afterAction : syncPosition,
			    responsiveRefreshRate : 200,
			  });
			  sync2.owlCarousel({
			    items : 6,
			    itemsDesktop      : [1199,6],
			    itemsDesktopSmall     : [979,4],
			    itemsTablet       : [768,4],
			    itemsMobile       : [479,3],
			    pagination:false,
			    navigation: true,
			    navigationText: [
				  '<button class="nav-controls left"><i class="fa fa-angle-left"></i></button>',
				  '<button class="nav-controls right"><i class="fa fa-angle-right"></i></button>'
			    ],			    
			    responsiveRefreshRate : 100,
			    afterInit : function(el){
			      el.find(".owl-item").eq(0).addClass("synced");
			    }
			  });
			  $(sync2).on("click", '.owl-item', function(e){
			    e.preventDefault();
			    console.log('click');
			    var number = $(this).data("owlItem");
			    sync1.trigger("owl.goTo",number);
			  });
			  $(sync2).on("click", '.owl-item', function(e){
			    e.preventDefault();
			    var number = $(this).data("owlItem");
			    sync1.trigger("owl.goTo",number);
			  });
			  var father_content=sync2.closest('.thumb-gallery');
			  father_content.find('.nav-controls.left');
			  $(father_content).on('click','.nav-controls.right',function(e){
			  		sync2.trigger('next.owl.carousel');
			  });
			  $(father_content).on('click','.nav-controls.left',function(e){
			  		sync2.trigger('prev.owl.carousel');
			  });
		}	  
	}


})(jQuery);

