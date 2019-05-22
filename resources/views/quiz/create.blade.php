@extends('layouts.app')

@section('content')
<div class="container">
	<legend class="text-centered">Create Quiz</legend>
	<div class="conatiner">
	<form id="addquestion">
		<div class="form-group">
			<label>Question Number</label>
			<input type="number" id="question_number" value="{{count($questions) + 1}}" class="form-control">
		</div>
		<div class="form-group">
			<label>Question Cartigory</label>
			<input type="text" class="form-control" placeholder="type" id="type">
		</div>
		<div class="form-group">
			<label for="title">Quiz Question</label>
			<textarea type="text" name="title" class="form-control" id="title"></textarea>
		</div>
			<label>Quiz Answer</label>
			<textarea name="description" class="form-control" id="description"></textarea>
		<hr style="background-color:blue;">
		<h4>Options</h4>
		<div class="form-group">
		<label>Choice #1</label>
		<input type="text" name="choice_1" id="choice_1" class="form-control">
		</div>
		<div class="form-group">
		<label>Choice #2</label>
		<input class="form-control" type="text" name="choice_2" id="choice_2">
		</div>
		<div class="form-group">
		<label>Choice #3</label>
		<input type="text" name="choice_3" class="form-control" id="choice_3">
		</div>
		<div class="form-group">
		<label>Choice #4</label>
		<input type="text" name="choice_4" id="choice_4" class="form-control">
		</div>
		<h4>Correct Answer</h4>
		<div class="form-group">
			<label for="correct">Quiz Correct Answer</label>
			<input type="number" name="correct" class="form-control" id="correctAnswer">
		</div>
		<button class="btn btn-outline-primary btn-block">Submit</button>				
	</form>
	</div>
</div>
@endsection