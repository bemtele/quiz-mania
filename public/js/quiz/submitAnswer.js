$(document).ready(function(){
	$.ajaxSetup({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('#next').hide();
	$('#done').hide();
	$('#submitAnswer').on('submit', (e) => {
		e.preventDefault();
		const userChoice = $("input[name='choice']:checked").val();
		const questionNumber = window.location.href.split('?')[1].split('=')[1];
		const next = Number(questionNumber);
		
		$.ajax({
			method : 'POST',
			url : '/checkuseranswer',
			data : {
				userChoice : userChoice,
				questionNumber : questionNumber,
				next : next
			}
		}).done((data) => {
			const jsonData = JSON.parse(data);
			// let itemNumber = window.location.href.split('?')[1].split('=')
			// itemNumber[1] = next
			// console.log(jsonData);
			if(jsonData.correct){
				$('#submit').hide();

				$('#link').attr("href",window.location.href.replace(/.$/,jsonData.next));
				
				if(jsonData.next == 0){
					$('#next').hide();
					$('#done').show();
				}else{
					$('#next').show();
				}
				$('#output').html(`
					<div class="card text-white bg-success mb-3" style="max-width: 18rem;">
					  <div class="card-header">Correct</div>
					  <div class="card-body">
					    <h5 class="card-title">You Got It right</h5>
					    <p class="card-text">${jsonData.correct}</p>
					  </div>
					</div>
					`);
			}else{

				$('#submit').hide();
				$('#link').attr("href",window.location.href.replace(/.$/,jsonData.next));
				// console.log(window.location.href.replace(/.$/,jsonData.next))
				if(jsonData.next == 0){
					$('#next').hide();
					$('#done').show();
				}else{
					$('#submit').hide();
					$('#next').show().removeClass('btn-outline-success').addClass('btn-outline-danger');
				}
				$('#output').html(`
					<div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
					  <div class="card-header">Incorrect</div>
					  <div class="card-body">
					    <h5 class="card-title">You It wrong</h5>
					    <p class="card-text">${jsonData.incorrect}</p>
					  </div>
					</div>
					`)
			}
		})
	})
})