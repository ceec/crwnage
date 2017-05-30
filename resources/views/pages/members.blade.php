@extends('layouts.layout')

@section('title')
@parent
cwrnagecrew.com
@stop

@section('content')
<div class="container">


	<h1>Members</h1>


	<hr>


		@foreach($members as $member)
			<a href="/character/{{$member->character}}">{{$member->character}}</a><br>
		@endforeach







</div>