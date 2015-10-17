$(document).ready(function(){	
	
	//// slider settings ////
    $('#slider').nivoSlider({
        directionNavHide: false, // Only show on hover
        controlNav: false, // 1,2,3... navigation
    });
	//// End slider settings ////
	
	//// navigation motions ////
	$("#navi li").has("ul").hover(function(){

			$(this).addClass("current").children("ul").fadeIn('3000');
		}, function() {

			$(this).removeClass("current").children("ul").stop(true, true).fadeOut('3000');
	});

	$("<select />").appendTo("#navi");

	$("<option />", {
	   "selected": "selected",
	   "value"   : "",
	   "text"    : "Navigation Menu"
	}).appendTo("#navi select");

	$("#navi ul li a").each(function() {
		var el = $(this);
		$("<option />", {
			"value"   : el.attr("href"),
			"text"    : el.text()
		}).appendTo("#navi select");
	});
		
	$("#navi select").change(function() {
		window.location = $(this).find("option:selected").val();
	});
	//// End navigation motions ////
	
	//// grey scaling function ////
	$(".bti").fadeTo(500, 0.4).hover(function () {
			$(this).fadeTo(500, 1);
		}, function () {
			$(this).fadeTo(500, 0.4);
	});
	
	$(".latestthree").hover(function () {
			$(this).find(".title").fadeTo(500, 0.4);
			$(this).find(".latestthreeimage").fadeTo(500, 0.4);
		}, function () {
			$(this).find(".title").fadeTo(500, 1);
			$(this).find(".latestthreeimage").fadeTo(500, 1);
	});
	//// End grey scaling function ////
	
	//// Start Scroll Top Function //// 
	$(window).bind('scroll', function(){
		if($(this).scrollTop() > 200) {
		$("#scrolltab").fadeIn('3000');
		}
		if($(this).scrollTop() < 199){
			$("#scrolltab").fadeOut('3000');
		}
	});
	
	$('#scrolltab').on('click', function(){
		$("html, body").animate({scrollTop:0}, 'slow');
	});
	//// End Scroll Top Function ////
	
	//// Start Tabs Function ////
	$('.tab').click(function () {
		$('.tabs_container > .tabs > li.active').removeClass('active');
		$(this).parent().slideDown('slow').addClass('active');
		$('.tabs_container > .tab_contents_container > div.tab_contents_active').slideUp('slow').removeClass('tab_contents_active');
		
		$(this.rel).slideDown('slow').addClass('tab_contents_active');
	});
	//// End Tabs Function ////
	
	//// Start Toggle Function ////
		$(".togglewrap .togglecontent").hide();
		$('.togglewrap .toggletitle.active').addClass('active').next().show();
	
		$(".togglewrap .toggletitle").click(function(){
			$(this).toggleClass("active").next().slideToggle("fast");
			return false;
		});
	//// End Toggle Function ////
	
	//// Start Accordian Function ////
	$('.accordionwrap .accordioncontent').hide();
	$('.accordionwrap .accordiontitle:first-child').addClass('active').next().show();
	
	$('.accordionwrap .accordiontitle').click(function() {
		if($(this).next().is(':hidden')) {
			$(this).parent().find(".accordiontitle").removeClass('active').next().slideUp('fast');
			$(this).toggleClass('active').next().slideDown('fast');
		}
		return false;
	});
	//// End Accordian Function ////
});