$(document).ready(function(){
	$.ajaxSetup({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#addquestion').on('submit', function(e){
		e.preventDefault();
		const title = $('#title').val();
		const description = $('#description').val();
		const correctAnswer = $('#correctAnswer').val();
		let question_number = $('#question_number').val();
		const queston_type = $('#type').val();
		const choice_1 = $('#choice_1').val();
		const choice_2 = $('#choice_2').val();
		const choice_3 = $('#choice_3').val();
		const choice_4 = $('#choice_4').val();

		$.ajax({
			method: 'POST',
			url : '/saveQuize',
			data : {
				title : title,
				description : description,
				correctAnswer : correctAnswer,
				question_number : question_number,
				queston_type : queston_type,
				choice_1 : choice_1,
				choice_2 : choice_2,
				choice_3 : choice_3,
				choice_4 : choice_4
			},
			success:function(data){
				
				$('#title').val('');
				$('#description').val('');
				 $('#correctAnswer').val('');
				 $('#choice_1').val('');
				 $('#choice_2').val('');
				 $('#choice_3').val('');
				 $('#choice_4').val('');
				console.log(jsonData.question.length);
			},
			error:function(data){
				console.log(data);
			}
		})



	})

})