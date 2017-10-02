/* 
* Build by : Safayat Jamil 
* Date : sept 15, 2017;
* Developers Website: http://safjammed.me;
* Developed For: ArianDreamHolidays.com;
* 
*/




// 
$(function(){
	new WOW().init();	
	$(".dropdown-button").dropdown();
	$(".button-collapse").sideNav();
	$('.scrollspy').scrollSpy();
	$('.tooltipped').tooltip({delay: 50});
	$('.slider').slider({indicators: false});
	$('.pushpinned').pushpin({
      top: 00,
      bottom: 1000,
      offset: 0
    });

	//Footer show
	$(".all-wrap").css('marginBottom', $('.page-footer').height() + "px");

});
