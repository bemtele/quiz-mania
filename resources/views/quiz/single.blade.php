@extends('layouts.app')

@section('content')
<h4 class="text-center" id="question">{{$question->question}}</h4>
<div class="container">
	<h5 class="text-center">Question {{$question->question_number}} of {{count($questions)}}</h5>
	<form id="submitAnswer">
		<ul class="list-group">
			@foreach($choices as $choice)
			<li class="list-group-item" id="{{$choice->id}}"><input type="radio" name="choice" value="{{$choice->id}}">{{$choice->choice}}</li>
			@endforeach
		</ul>
		<br>
		<div>
		<button class="btn btn-outline-primary" type="submit" id="submit">Submit</button>
		</div>
	</form>
	<div class="container text-center">
		<button id="next" class="btn btn-outline-success pull-right"><a id="link" style="text-decoration:none;">Next</a></button>
		<button class="btn btn-outline-primary" id="done"><a href="/donequestions" style="text-decoration:none;">DONE</a></button>
	</div>
	<br>
	<br>
	<div class="container">
		<p id="output"></p>
	</div>
</div>
@endsection