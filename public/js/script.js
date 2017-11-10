$(document).ready(function(){

	$('.oneRowContent button').on('click', function (){
		var data = {};
		var currentButton = $(this);
		data.row = $(this).attr('data-row');
		data.column =  $(this).attr('data-column');
		data.seansId = $(this).attr('data-seansId');
		data['_token'] = $('.token').text().trim();
		$('.informBlock').fadeIn(500);
		$('.glyphicon-refresh').fadeIn(100);
		$.ajax({
			url: "/buy-ticket",
			data: data,
			type: "POST",
			dataType: "json",
			success: function(data) {
				if(data['status'] == true){
					var buyClass = 'successMessage';
					currentButton.addClass('disabled');
				} else {
					var buyClass = 'errorMessage';
					$('.buyInformMessage').addClass(buyClass)
				}
				$('.glyphicon-refresh').fadeOut(100, function() {
				    $('.buyInformMessage').addClass(buyClass).fadeIn(500).text(data['msg']);
				    $('.informBlock').delay(2000).fadeOut(2000);
					$('.buyInformMessage').delay(2000).fadeOut(2000, function() {
					    $('.buyInformMessage').removeClass(buyClass);
					});
				});
			},
			error: function (xhr, status) {
				console.log("Sorry, there was a problem!");
			}
		});

	});
});
