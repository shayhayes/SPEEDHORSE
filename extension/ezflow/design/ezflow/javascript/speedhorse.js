var jq = jQuery;
jQuery(document).ready(function($) {
  $("#calendar_items div.items").hide();
	 var theId = $("#months li a.active").attr('id');
	 $("#calendar_items #"+theId+"-div").show();
	 
	 $("#left_sidebar_content .info ul").hide();
	 $("#left_sidebar_content .active ul").show();
	 $("#left_sidebar_content ul ul.sub-ul").hide();
	 $("#left_sidebar_content li.active ul.sub-ul").show();
});
jQuery(function($){
	var imgCaps = $(".image_caption h3");
	$(".thumb_caption").each(function(i){
		this.innerHTML = imgCaps[i].innerHTML;
	});

	$("#gallery_container .the_images").each(function(){
		$(this).width($(this).children(".thumb_link").length * 118);
	});

	$("#navigation li.main").hover(function(e){ //.not(".current_page")
		$(this).css({"background-image":"url(images/bg_left_hov.png)", "background-repeat":"no-repeat", "background-position":"left top"});
		$(this).find("a.main").css({"background-image":"url(images/bg_right_hov.png)", "background-repeat":"no-repeat", "background-position":"right top"});/* , "color":"#23436a" */
		if ( $(this).hasClass("current_page") ) {
			$(this).css({"background-image":"url(images/bg_left.png)", "background-repeat":"no-repeat", "background-position":"left top"});
			$(this).find("a.main").css({"background-image":"url(images/bg_right.png)", "background-repeat":"no-repeat", "background-position":"right top","color":"#0E4281"});
		}
		if ( $(this).children().size() > 1 && $(this).hasClass("current_page") ) {
			$(this).css({"background-image":"url(images/bg_left_hov.png)", "background-repeat":"no-repeat", "background-position":"left top"});
			$(this).find("a.main").css({"background-image":"url(images/bg_right_hov.png)", "background-repeat":"no-repeat", "background-position":"right top","color":"#ffffff"});/* , "color":"#23436a" */
		}
	}, function(e){
			if ( $(this).not(".drop_open") ) {
				$(this).css({"background":"none"});
				$(this).find("a.main").css({"background":"none", "color":"white"});
				if ( $(this).hasClass("current_page") ) {
					$(this).css({"background-image":"url(images/bg_left.png)", "background-repeat":"no-repeat", "background-position":"left top"});
					$(this).find("a.main").css({"background-image":"url(images/bg_right.png)", "background-repeat":"no-repeat", "background-position":"right top","color":"#0E4281"});
				}
			}
			if ( $(this).find("div.dropdown").css("display") == "block" ) {
				$(this).find("div.dropdown").hide();
				
				if ( $(this).hasClass("current_page") ) {
					$(this).css({"background-image":"url(images/bg_left.png)", "background-repeat":"no-repeat", "background-position":"left top"});
					$(this).find("a.main").css({"background-image":"url(images/bg_right.png)", "background-repeat":"no-repeat", "background-position":"right top","color":"#0E4281"});
				}
				if ( $(this).children().size() > 1 ) {
					$(this).css({"height":"27px"});
					$(this).find("a.main").css({"height":"27px"});
					$(this).find("div.dropdown").hide();
					$(this).removeClass("drop_open");
				}
			}
	});
	$("#navigation li.main").click(function(){
		
		if ( $(this).children().size() > 1 ) {
			$(this).css({"height":"33px"});
			$(this).find("a.main").css({"height":"33px"});
			$(this).find("div.dropdown").show();
			$(this).css({"background-image":"url(images/bg_left_hov.png)", "background-repeat":"no-repeat", "background-position":"left top"});
			$(this).find("a.main").css({"background-image":"url(images/bg_right_hov.png)", "background-repeat":"no-repeat", "background-position":"right top","color":"#ffffff"});
			$(this).css({"height":"33px"});
			$(this).find("a.main").css({"height":"33px"});
		}
		$(this).addClass("drop_open");
	});
	/*$("#navigation li.main").toggle(function(){
		
		if ( $(this).children().size() > 1 ) {
			$(this).css({"height":"33px"});
			$(this).find("a.main").css({"height":"33px"});
			$(this).find("div.dropdown").show();
			$(this).css({"background-image":"url(images/bg_left_hov.png)", "background-repeat":"no-repeat", "background-position":"left top"});
			$(this).find("a.main").css({"background-image":"url(images/bg_right_hov.png)", "background-repeat":"no-repeat", "background-position":"right top","color":"#ffffff"});
			$(this).css({"height":"33px"});
			$(this).find("a.main").css({"height":"33px"});
		}
		$(this).addClass("drop_open");
	}, function(){
			if ( $(this).hasClass("current_page") ) {
				$(this).css({"background-image":"url(images/bg_left.png)", "background-repeat":"no-repeat", "background-position":"left top"});
				$(this).find("a.main").css({"background-image":"url(images/bg_right.png)", "background-repeat":"no-repeat", "background-position":"right top","color":"#0E4281"});
				$(this).css({"height":"27px"});
				$(this).find("a.main").css({"height":"27px"});
			}
			if ( $(this).children().size() > 1 ) {
				$(this).css({"height":"27px"});
				$(this).find("a.main").css({"height":"27px"});
				$(this).find("div.dropdown").hide();
				$(this).removeClass("drop_open");
			}
	});*/
	/*jq(document).click( function(event) {
			jq("#navigation li.main div.dropdown").hide();
			
			if ( $("#navigation li.main div.dropdown").parent().hasClass("current_page") ) {
				$("#navigation li.main div.dropdown").parent().css({"background-image":"url(images/bg_left.png)", "background-repeat":"no-repeat", "background-position":"left top"});
				$("#navigation li.main div.dropdown").parent().find("a.main").css({"background-image":"url(images/bg_right.png)", "background-repeat":"no-repeat", "background-position":"right top","color":"#0E4281"});
			}
			if ( $("#navigation li.main div.dropdown").parent().children().size() > 1 ) {
				$("#navigation li.main div.dropdown").parent().css({"height":"27px"});
				$("#navigation li.main div.dropdown").parent().find("a.main").css({"height":"27px"});
				$("#navigation li.main div.dropdown").parent().find("div.dropdown").hide();
				$("#navigation li.main div.dropdown").parent().removeClass("drop_open");
			}
	});*/

	$("#accordion").accordion({ fillSpace: true	});
	$("#results_tabs").tabs();
	$("#leaderboards_tabs").tabs();
	$("#sales_tabs").tabs();
	$("#videos_tabs").tabs();

	$("#slideshow_menu a").click(function(){
		var selectedLink = this;
		var selectedClass = "." + $(this).attr("id");
		$(".preview_content").removeClass("current_view");
		$("#slideshow_menu a").removeClass("current_view");
		$(".the_images").removeClass("current_view");
		$(selectedLink).addClass("current_view");
		$(selectedClass).addClass("current_view");
	});

	$(".thumb_link").click(function(){
		var clicked = this;
		$(".current_view .thumb_frame").hide();
		$(clicked).find(".thumb_frame").show();
		$(".current_view .large_image_caption_wrap").html($(clicked).children(".image_caption").html());
		$("#preview_pane .current_view img").attr("src", clicked.getElementsByTagName("img")[0].getAttribute("data-fullsize"));
	});

	$("#arrow_left").click(function(){
		var carousel = $("#gallery_container .current_view");
		var hiddenWidth = carousel.width() - 599;
		var leftOffset = parseInt(carousel.css("left"));
		if(leftOffset < -472){
			carousel.css("left", leftOffset + 472);
		} else {
			carousel.css("left", 0);
		}
	});

	$("#arrow_right").click(function(){
		var carousel = $("#gallery_container .current_view");
		var hiddenWidth = carousel.width() - 599;
		var leftOffset = parseInt(carousel.css("left"));
		if(hiddenWidth + leftOffset > 472){
			carousel.css("left", leftOffset - 472);
		} else {
			carousel.css("left", -hiddenWidth);
		}
	});
	$("#product_images #images a").click(function(){
		$("#product_images #main_img a").hide();
		var theId = $(this).attr('id');
		$("#product_images #main_img a#"+theId+"-img").show();
		return false;
	});
	$("#left_sidebar_content .info h3").toggle(function(){
			 $(this).parent().find("ul").show();
		},
		function(){
			 $(this).parent().find("ul").hide();
		}
	);
	$("#left_sidebar_content .info ul li a").toggle(function(){
			 $(this).parent().find("ul").show();
		},
		function(){
			 $(this).parent().find("ul").hide();
		}
	);
	
	$("#blog_archives li a").toggle(function(){
			 $(this).parent().find("ul.archives_year").show();
			 $(this).parent().addClass("open");
		},
		function(){
			 $(this).parent().find("ul.archives_year").hide();
			 $(this).parent().removeClass("open");
		}
	);
	
	$("#blog_archives .archives_year li a").toggle(function(){
			 $(this).parent().find("ul.archives_month").show();
			 $(this).parent().addClass("open");
		},
		function(){
			 $(this).parent().find("ul.archives_month").hide();
			 $(this).parent().removeClass("open");
		}
	);
	$("#months li a").click(function(){
		 $("#months li a").removeClass("active");
		 $(this).addClass("active");
		 $("#calendar_items div.items").hide();
		 var theId = $(this).attr('id');
		 $("#calendar_items #"+theId+"-div").show();
		 return false;
	});
	$("#main_img a, #media .media_item").click(function(){
		$("#darken").show();
		$("#lightbox-wrap").show();
		 return false;
	});
	$("#close_lighbox").click(function(){		  
		$("#darken").hide();
		$("#lightbox-wrap").hide();
		 return false;
	});
	$("#mobile-nav a").click(function(){
		 $("#mobile-nav a").parent().removeClass("active");
		 $(this).parent().addClass("active");
		 $(".content").hide();
		 var theId = $(this).parent().attr('id');
		 $("#"+theId+"_content").show();
		 return false;
	});
	$("a#select-a-section").toggle(function(){
		 $("#select-a-section-drop").show();
	},
	function(){
		 $("#select-a-section-drop").hide();
	});
	$("a#select-a-section-a").toggle(function(){
		 $("#select-a-section-drop-a").show();
	},
	function(){
		 $("#select-a-section-drop-a").hide();
	});
});