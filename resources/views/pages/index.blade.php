@extends('layouts.layout')

@section('title')
@parent
cwrnagecrew.com
@stop

@section('content')
<div class="container">
	<!--<div class="row">
		<div class="col-md-8">
			<h2>Upcoming Events</h2>
		</div>
		<div class="col-md-4">
		<h2></h2>
		</div>
	</div>-->
	<div class="row">
		<div class="col-md-6">
			<h2>News</h2>
			@foreach($news as $item)
				<a href="/character/{{$item->character}}">{{$item->character}}</a>
				
				@if ($item->type == 'itemLoot')
					looted
				@elseif($item->type == 'itemPurchase')

					purchased
				@else
					achieved <a href="http://www.wowhead.com/achievement={{$item->achievementId}}">{{$item->achievementId}}</a> at {{date('Y-m-d g:i a',$item->timestamp /1000)}} 


				@endif

				 
				@if(($item->type == 'itemLoot') || ($item->type == 'itemPurchase'))
					<?php
						$bonus = 0;

						//build the bonus
						if ($item->bonus_0 > 0) {
							$bonus = $item->bonus_0;
						}

						if ($item->bonus_1 > 0) {
							$bonus = $bonus.':'.$item->bonus_1;
						}

						if ($item->bonus_2 > 0) {
							$bonus = $bonus.':'.$item->bonus_2;
						}

						if ($item->bonus_3 > 0) {
							$bonus = $bonus.':'.$item->bonus_3;
						} 											
					?>

					<?php

						//idono what nonsense is happening, need to set it to server time
						date_default_timezone_set('America/New_York');
					?>
					<a href="http://www.wowhead.com/item={{$item->itemId}}&bonus={{$bonus}}">{{$item->itemId}}</a> at {{date('Y-m-d g:i a',$item->timestamp /1000)}} 

					@if ($item->context != '')
						from {{$item->context}}
					@endif

					
				@endif

				<hr>
			@endforeach
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-3">
			<h2>Calendar</h2>
			<p>Tuesday: raid</p>
		</div>
	</div>
</div>
<script type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script><script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>