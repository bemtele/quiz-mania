@extends('layouts.app')

@section('content')
<div class="container">
	<h1 class="text-center">Welcome to Quiz Mania</h1>
	<div class="row">
		<div class="col">Infor Tab</div>
		<div class="col">
			<ul class="list-group">
				<li class="list-group-item-header">Topics</li>
				<li class="list-group-item"><a href="/history">History</a></li>
				<li class="list-group-item"><a href="/science">Science</a></li>
				<li class="list-group-item"><a href="/mathematics">Mathematics</a></li>
				<li class="list-group-item"><a href="/english">English</a></li>
				<li class="list-group-item"><a href="/general">General Knowladge</a></li>
			</ul>
		</div>
		<div class="col"></div>
	</div>
</div>
@endsections