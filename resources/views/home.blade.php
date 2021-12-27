@extends('layouts.app')
@extends('layouts.datatable')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
		<div class="card-header">{{ __('EventList') }}
                <form action="{{ route('addevent') }}">
                <input type="submit" class="btn btn-primary" value="Add Events" />
                </form>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('addevent') }}">
                        @csrf

                     <table class="table" id="table">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Event Name</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Date</th>
             <th class="text-center"></th>   
	</tr>
    </thead>
    <tbody>
       @foreach($data as $item)       
	<tr class="item{{$item->event_id}}">
 	    <td>{{$item->event_id}}</td>
            <td>{{$item->event_name}}</td>
            <td>{{$item->start_date}}</td>
	    <td>{{$item->end_date}}</td>
            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target='#myModal_{{$item->event_id}}'>Invite</button></td>
	</tr>
        @endforeach
    </tbody>
</table>

@foreach($data as $item)
<!-- The Modal -->
<div class="modal" id='myModal_{{$item->event_id}}'>
<div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Invites</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="container">
       <div class="row justify-content-center">
       <div class="col-md-12">
       <div class="card">
       <div class="card-header">{{ __('Invite List') }}</div>
       <div class="card-body">

        <div class="row mb-12">
                <div class="col-md-6" id='modalBody_{{$item->event_id}}'>
                      {{$item->event_name}}
                       
                </div>
		</div>



        <div class="row mb-12">
                <div class="col-md-6">
                <input type="email" name="invite_email" id="invite_email_{{$item->event_id}}"class="form-control">
                </div>
                <div class="col-md-3">
                <button type="button" class="btn btn-primary" onclick=sendInvite({{$item->event_id}})>Invite</button>
                 </div>
                 </div>


        </div>
       </div>
       </div>
       </div>
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>


</div>
@endforeach

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
