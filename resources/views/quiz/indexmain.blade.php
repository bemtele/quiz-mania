@extends('layouts.app')

@section('content')
<div class="conatiner">
	<h3 class="text-center">History South Africa Quiz</h3>
	<hr style="background-color:hue;">
	<div class="container">
		<p>Test you knowledge by answering a quiz about South African Histoty</p>
		<p>Multiple choice quiz with response per answer</p>
		<ul class="list-group">
			<li class="list-group-item">Number of Questions : <strong>{{count($questions)}}</strong></li>
			<li class="list-group-item">Type of Questions : <strong>MCQ (Multiple Choice Question)</strong></li>
			<li class="list-group-item">Time to complete : <strong>{{count($questions) * 0.5}}</strong> Minutes</li>
		</ul>
		<br>
		<button class="btn btn-outline-primary">
		<a href="/answermcq?number=1">Try It!</a>			
		</button>
	</div>
</div>
@endsection