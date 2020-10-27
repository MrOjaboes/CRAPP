@extends('layouts.header')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times label-danger"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
        <form action="{{route('update-user', $user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
           
            <div class="form-group">
                <label for="username">UserName</label>
            <input type="text" disabled value="{{$user->username}}" name="username" id="username" placeholder="User Name" class="form-control @error('username') is-invalid @enderror" autocomplete="username">
            
            </div>
            <div class="form-group">
                <label for="username">Email</label>
            <input type="email" disabled value="{{$user->email}}" name="username" id="username" placeholder="User Name" class="form-control @error('username') is-invalid @enderror" autocomplete="username">
            
            </div>
        
            <div class="form-group">
                <label for="email">Role</label>
          <select name="user_type" id="user_type" class="form-control" required>
            <option value="{{$user->user_type}}">
            @if ($user->user_type == 0)
            Viewer
            @endif
            @if ($user->user_type == 1)
            Admin
            @endif
             
            @if ($user->user_type == 2)
            Editor
            @endif
                  
            </option>
            <option value="0">Viewer</option>
            <option value="2">Editor</option>            
            <option value="1">Admin</option>
          </select>
           
            </div>

            <div class="form-group col-12">
                <button type="submit" class="btn btn-success pl-5 pr-5">Update</button>
            </div>
        </form>
        </div>
    </div>
</section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  
@endsection()