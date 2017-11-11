@extends('template.default')

@section('title') {{'some title'}}@endsection

@section('keywords'){{'some keywords'}}@endsection

@section('description'){{'some description'}}@endsection


@section('content')
<div class='container'>
		<div class="token">{{ csrf_token() }}</div>
		<div class="row">
			<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
				<div class="filmCurrentSeansInformation">
					<span class="seansHallName">{{$currentSeans->halls->name}}</span>
					<span class="seansFilmName">{{$currentSeans->films->name}}</span>
					<span class="seansWeeday">{{$currentSeans->weekdays->name}}</span>
					<span class="seansTime">{{$currentSeans->seans_time}}</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
				<div class="hallPlaces">
					@for($i = 1; $i <= intval($currentSeans->halls->row); $i++)
						<div class="oneRowContent">
						<span class="showRowNumber">{{$i}}</span>
						@for($j = 1; $j <= intval($currentSeans->halls->column); $j++)
							{{$disabledClass= ""}}
							@for($l = 0; $l < count($buyedTicket); $l++)
							@if($i == $buyedTicket[$l]->row && $j == $buyedTicket[$l]->column)
								@php 
									$disabledClass = "disabled"; break;
								@endphp
							@endif
							@endfor
							<button type="button" data-row="{{$i}}" data-column="{{$j}}" data-seansId="{{$id}}" class="columnsNumbers btn {{$disabledClass}}" style="width:{{100/intval($currentSeans->halls->column)-1.5}}%" {{$disabledClass}}>{{$j}}</button>
						@endfor
						</div>
					@endfor
				</div>
			</div>
		</div>
		<div class="informBlock">
			<span class="glyphicon glyphicon-refresh"></span>
			<p class="buyInformMessage"></p>
		</div>
	</div>
@endsection

