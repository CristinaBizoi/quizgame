@extends('layouts.admin')
@section('content')
      <div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Overview</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Data Table Example
    <
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
       <tbody>
       @foreach($users as $user)
       <form action="/admin/users/{{$user->id}}" method="POST" id="delete-{{$user->id}}">
        @csrf
        @method('delete')
       </form>
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role == 0 ? "User" : "Admin"}}</td>
            <td>{{$user->status == 0 ? "Inactive" : "Active"}}</td>
            <td>
              <a href="/admin/users/{{$user->id}}/edit"><i class="fas fa-user-edit"></i></a> 
              <a href="/admin/users/{{$user->id}}/change-status"><i class="fas {{$user->status == 1 ? $class='fa-user-lock' : $class='fa-user-check'}}"></i></a> 
              <a href="/admin/users/{{$user->id}}" data-id="{{$user->id}}" class="delete"><i class="fas fa-user-minus"></i></a> 
            </td>
        </tr>
       @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

</div>
@endsection
@section('bottomscripts')
<script>
$('.delete').on('click', function(e){
  e.preventDefault();
  console.log($(this).data('id'));
  $('#delete-'+$(this).data('id')).submit();
})
</script>
@endsection