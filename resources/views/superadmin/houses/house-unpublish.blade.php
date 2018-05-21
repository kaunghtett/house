@extends ('admin-layouts.master')

@section ('page-header')
<section class="content-header">
    <h1>All Houses</h1>
    <ol class="breadcrumb">
        <li><a href="/backend/user/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">All Houses</a></li>
    </ol>
</section>
@endsection

@section ('content')
    <section class="content">
        <table class="table table-bordered table-hover" id="houses-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Period</th>
                    <th>Price</th>
                    <th>Area</th>
                    <th>Rooms</th>
                    <th>Host By</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Details</th>
                    <th>To Publish</th>
                </tr>
            </thead>
        </table>
    </section>
@endsection

@push ('js')
<script>
$(function() {
    $('#houses-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('houses.unpublishData') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'house_type.type_name', name: 'house_type.type_name' },
            { data: 'period', name: 'period' },
            { data: 'price', name: 'price' },
            { data: 'area', name: 'area' },
            { data: 'rooms', name: 'rooms' },
            { data: 'user.name', name: 'users.name' },
            { data: 'edit', name: 'edit', 'orderable': false},
            { data: 'delete', name: 'delete', 'orderable': false },
            { data: 'detail', name: 'detail', 'orderable': false },
            { data: 'publish', name: 'publish', 'orderable': false },
        ]
    });
});
</script>
@endpush
