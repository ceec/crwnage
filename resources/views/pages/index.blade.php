@extends('layouts.layout')

@section('title')
@parent
cwrnagecrew.com
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>Upcoming Events</h2>
		</div>
		<div class="col-md-4">
		<h2>Calendar</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<h2>News</h2>
			@foreach($news as $item)
				<a href="/character/{{$item->character}}">{{$item->character}}</a> got {{$item->type}}
				@if($item->type == 'itemLoot')
					<a href="http://www.wowhead.com/item={{$item->itemId}}&bonus=1642:1687:3574">{{$item->itemId}}</a> at {{date('Y-m-d g:i a',$item->timestamp /1000)}} from {{$item->context}}
				@endif

				<hr>
			@endforeach
		</div>
		<div class="col-md-6">
			<h2>Latest Posts</h2>
		</div>
	</div>
</div>
<script type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script><script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>