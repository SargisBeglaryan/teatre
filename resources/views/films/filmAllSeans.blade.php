@extends('template.default')

@section('title') {{'some title'}}@endsection

@section('keywords'){{'some keywords'}}@endsection

@section('description'){{'some description'}}@endsection


@section('content')
<div class='container'>
		<div class="token">{{ csrf_token() }}</div>
		<div class="row">
			<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
				@for ($i = 0; $i < count($allSeans); $i++)
					<div class="filmSeansInformation">
						<span class="seansHallName">{{$allSeans[$i]->halls->name}}</span>
						<span class="seansFilmName">{{$allSeans[$i]->films->name}}</span>
						<span class="seansWeeday">{{$allSeans[$i]->weekdays->name}}</span>
						<span class="seansTime">{{$allSeans[$i]->seans_time}}</span>
						<a class="seansLink btn" href="{{asset('halls/seans').'/'.$allSeans[$i]->id}}"><span>Buy Tickets</span></a>
					</div>
				@endfor
			</div>
		</div>
	</div>
@endsection

