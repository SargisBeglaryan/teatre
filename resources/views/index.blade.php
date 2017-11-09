@extends('template.default')

@section('title') {{'some title'}}@endsection

@section('keywords'){{'some keywords'}}@endsection

@section('description'){{'some description'}}@endsection


@section('content')
<div class='container'>
		<div class="token">{{ csrf_token() }}</div>
		<div class="row buttonBlocks">
			<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
				@foreach ($object->halls as $hall)
					<a class="hals btn" href="{{asset('halls/').'/'.$hall->id}}"><span>{{$hall->name}}</span></a>
				@endforeach
			</div>
			<div class='col-xs-12 col-sm-6col-md-6 col-lg-6'>
				@foreach ($object->films as $film)
					<a class="films btn" href="{{asset('films/').'/'.$film->id}}"><span>{{$film->name}}</span></a>
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('script')
@endsection
