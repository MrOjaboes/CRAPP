@extends('layouts.users')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
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
        <form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="username">UserName</label>
            <input type="text" value="{{$user->username}}" name="username" id="username" placeholder="User Name" class="form-control @error('username') is-invalid @enderror" autocomplete="username">
            @error('username')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
            <input type="text" value="{{$user->email}}" name="email" placeholder="Email" id="email" class="form-control @error('email') is-invalid @enderror" autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div> 
             
            <div class="form-group col-12">
                <button type="submit" class="btn btn-warning pl-5 pr-5">Save Changes</button>
            </div>
        </form>
           
            </div>

            <div class="card-body">        
                            <form action="{{route('user.password')}}" method="POST">
                                @csrf
                                    <div class="form-row">
                                        <div class="form-group col-xl-12">
                                            <label class="mr-sm-2">Current Password</label>
                                            <input type="password" id="password" name="oldpassword" class="form-control" placeholder="**********">
                                        </div>
                                        <div class="form-group col-xl-12">
                                            <label class="mr-sm-2">New Password</label>
                                            <input type="password" name="password" id="new_password" class="form-control"
                                                placeholder="**********">
                                            
                                        </div>
                                        <div class="form-group col-xl-12">
                                            <label class="mr-sm-2">Confirm New Password</label>
                                            <input type="password" name="confirm_password" id="new_confirm_password" class="form-control"
                                                placeholder="**********">
                                             
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success waves-effect">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
           
        </div>
         
      </div><!-- /.container-fluid -->
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

<script src="{{ asset('admins2/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('admins2/dist/js/adminlte.js') }}"></script> 
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('admins2/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>
 
@endsection()