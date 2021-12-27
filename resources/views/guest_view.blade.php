@extends('layouts.app')
@extends('layouts.datatable')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Guest Dashboard') }}</div>

                <div class="card-body">
		<form method="POST" action="{{env('APP_URL')}}/search">
	       @csrf	 
               <div class="row mb-12">
		<div class="col-md-3"><input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" required autocomplete="start_date" autofocus placeholder="Start Date"></div>
		 <div class="col-md-3"><input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date" placeholder="End Date"></div>
<div class="col-md-3"><button type="submit" class="btn btn-primary">Search</button></div></div>
                 </div></form>
                 <div class="row mb-12">

                     <table class="table" id="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Event Name</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Date</th>
	</tr>
    </thead>
    <tbody>
       @foreach($data as $item)       
	<tr class="item{{$item->event_id}}">
 	    <td>{{$item->event_id}}</td>
            <td>{{$item->event_name}}</td>
            <td>{{$item->start_date}}</td>
	    <td>{{$item->end_date}}</td>
	</tr>
        @endforeach
    </tbody>
</table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
