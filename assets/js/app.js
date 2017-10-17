/* 
* Build by : Safayat Jamil 
* Date : sept 15, 2017;
* Developers Website: http://safjammed.me;
* Developed For: woodland Away;
* 
*/




//

$(function(){
	$('form').parents('.card').height($('form').height()*3.5 +'px');
	new WOW().init();	
		$('.datepicker').pickadate({
			format: 'yyyy-m-d',
		    selectMonths: true, 
		    selectYears: 15, 
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    closeOnSelect: true
		  });
		$('select').material_select();
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

	//FILTERS
	$('.start-date').change(function(){
		var start_date = $(this).val();
		var that = $(this);
		if (start_date != '') {
		$('.package-link').map(function(){
			$(this).show();
			var target = $(this).data('start-date');
			if (target != start_date) {
				$(this).fadeOut('fast');
			}

		});
	}else{
		$('.end-date').val('');
		$('.package-link').fadeIn('fast');
	}

	});

	$('.end-date').change(function(){
		var end_date = $(this).val();
		var that = $(this);
		if (end_date != '') {
		$('.package-link').map(function(){
			$(this).show();
			var target = $(this).data('end-date');
			if (target != end_date) {
				$(this).fadeOut('fast');
			}
		});
		}else{
			$('.start-date').val('');
			$('.package-link').fadeIn('fast');
		}

	});
	$('select.area').change(function(){
		var area_id = $(this).val();
		var that = $(this);
		$('.package-link').map(function(){
			$(this).show();
			var target = $(this).data('area');
			if (target != area_id) {
				$(this).fadeOut('fast');
			}
			if (area_id == ''){
				$(this).fadeIn('fast');
			} 

		});
	});
	$('select.type').change(function(){
		var type_id = $(this).val();
		var that = $(this);
		$('.package-link').map(function(){
			$(this).show();
			var target = $(this).data('type');
			if (target != type_id) {
				$(this).fadeOut('fast');
			}
			if (type_id == ''){
				$(this).fadeIn('fast');
			} 

		});
	});
/*CURRENCY CONVERSION*/

//get rates 


// $.getJSON('http://api.fixer.io/latest?base=USD',function(data){
// 	var rates = data;
// 	console.log(data);
// 	$('select.currency').change(function(){ // Currency selection
// 		var selectedCurrency  = $(this).val();
// 		var base = $('h4.price').siblings('.currencysign')[0];
// 		base = $(base).text();
// 		// var txt = '';
// 		// if (selectedCurrency == 'USD') {
// 		// 	txt = '$';
// 		// }else if(selectedCurrency == 'GBP'){
// 		// 	txt = '£';
// 		// }else if (selectedCurrency == 'EUR') {
// 		// 	txt = '€';
// 		// }
// 		$('h4.price').each(function(index, el) {
// 			var currentVal=parseFloat($(this).text());
// 			if (base == 'USD') {
// 				$(this).text((parseFloat(rates[selectedCurrency]) * currentVal));
// 				console.log('changed');
// 				console.log(rates[selectedCurrency]);
// 				console.log(currentVal);
// 			}else{
// 				console.log('un changed '+base);
// 			}
			
// 		});
// 	});

// });

	$('select.currency').change(function(){
		console.log('money changed');
	$('.package-base-price').each(function(){
		console.log('inside baseprice');
		var toCurrency = $('select.currency').val();
		var pPriceObj = $(this);
		var amount = pPriceObj.val();
		var fromCurrency = 'USD';
		if(toCurrency != 'USD'){
			$.ajax({
				method: "GET",
				url: "googleCurrencyConverter.php",
				data: { toCur: toCurrency, fromCur: fromCurrency, amnt: amount}
			}).done(function( price ) {
				pPriceObj.siblings('.package-price').html(price);
				$('h4.package-price,span.package-price').siblings('.currencysign').map(function(index, elem) {
					$(this).text(toCurrency);
					console.log('NOT USD');
				});
				// alert( "Data: " + msg );
			});
		}else{
			pPriceObj.siblings('.package-price').html(amount);
			$('h4.package-price,span.package-price').siblings('.currencysign').map(function(index, elem) {
					$(this).text('USD');
					console.log('ONLY USD');
				});
		}
	});
	//fromCurrency = $('#currency').val();
	
});
});
