@extends ('admin-layouts.master')

@section ('content')
    @if (empty($profile))
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>No Profile!</strong> &nbsp;&nbsp;
            @if ($user->id == auth()->user()->id)
            Do you want to create your profile?
            <a href="{{route('profiles.create')}}">Create Profile</a>
            @endif
        </div>

        <a href="{{route('users.index')}}" class="btn btn-danger">BACK</a>
    @else
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>{{$user->name}}'s Profile <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-primary pull-right">Edit</a></h3>
        </div>
        <div class="panel-body padding">
            <div class="row">
                <div class="col-md-12">
                    <img src="{{$user->showImage($path)}}" class="img-circle" width="100" height="100" alt="User Image">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3 class="has-line">{{$user->name}}</h3>
                    <br>
                    <p><i class="fa fa-magic"></i> &nbsp;&nbsp; {{$role->name}}</p>
                    <p><i class="fa fa-envelope"></i> &nbsp;&nbsp;<a href="mailto:{{$user->email}}">{{ $user->email}}</a></p>
                    <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp; {{$profile->address}}</p>
                    <p><i class="fa fa-phone"></i>&nbsp;&nbsp; {{$profile->phone_no}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <a href="{{url()->previous()}}" class="btn btn-danger">Back</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection
