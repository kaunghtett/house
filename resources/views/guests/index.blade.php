@extends ('admin.master')

@section ('page-header')
    <h1><strong>Home</strong></h1>
@endsection

@section ('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Home</li>
    </ol>
@endsection

@section ('content')
    <h1>{{ $user->name }}</h1>
@endsection
