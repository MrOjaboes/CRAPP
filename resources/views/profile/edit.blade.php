@extends('layouts.users')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
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
               <div class="card-body">
          <form action="{{route('change.details')}}" method="POST">
                                @csrf
                                    <div class="form-row">
                                        <div class="form-group col-xl-12">
                                            <label class="mr-sm-2">User Name</label>
                                            <input type="text" id="username"
                                            value="{{Auth::user()->username}}" 
                                            name="username" class="form-control" placeholder="Username">
                                        </div>
                                        <div class="form-group col-xl-12">
                                            <label class="mr-sm-2">User Email</label>
                                            <input type="email" 
                                            name="email" id="email" 
                                            class="form-control"
                                            value="{{Auth::user()->email}}"
                                                placeholder="Email">
                                            {{-- <p class="mt-2 mb-0">Enable two factor authencation on the security
                                                page
                                            </p> --}}
                                        </div>
                                         
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success waves-effect">Save </button>
                                        </div>
                                    </div>
                                </form>
                                </div>
          
          <!-- /.card-header -->

          <div class="card-body">        
                            <form action="{{route('change.password')}}" method="POST">
                                @csrf
                                    <div class="form-row">
                                        <div class="form-group col-xl-12">
                                            <label class="mr-sm-2">Current Password</label>
                                            <input type="password" id="password" name="current_password" class="form-control" placeholder="**********">
                                        </div>
                                        <div class="form-group col-xl-12">
                                            <label class="mr-sm-2">New Password</label>
                                            <input type="password" name="new_password" id="new_password" class="form-control"
                                                placeholder="**********">
                                            {{-- <p class="mt-2 mb-0">Enable two factor authencation on the security
                                                page
                                            </p> --}}
                                        </div>
                                        <div class="form-group col-xl-12">
                                            <label class="mr-sm-2">Confirm New Password</label>
                                            <input type="password" name="new_confirm_password" id="new_confirm_password" class="form-control"
                                                placeholder="**********">
                                            {{-- <p class="mt-2 mb-0">Enable two factor authencation on the security
                                                page
                                            </p> --}}
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success waves-effect">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Personal Information</h4>
                            </div>
                            <div class="card-body">
                            <form method="post" action="{{route('update-profile', Auth::user()->profile)}}" class="personal_validate" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="form-row">
                                        <div class="form-group col-xl-6">
                                            <label class="mr-sm-2">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{Auth::user()->profile->first_name ?? ''}}" name="fullname">
                                        </div>
                                   
                                            <div class="form-group col-xl-6">
                                                <label class="mr-sm-2">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" value="{{Auth::user()->profile->last_name ?? ''}}" name="fullname">
                                            </div>
                                        
                                        <div class="form-group col-xl-6">
                                            <label class="mr-sm-2">Present Address</label>
                                            <input type="text" name="address" class="form-control"
                                            value="{{Auth::user()->profile->address ?? ''}}" >
                                        </div>
                                        
                                        <div class="form-group col-xl-6">
                                            <label class="mr-sm-2">Phone</label>
                                            <input type="number" name="phone" class="form-control" value="{{Auth::user()->profile->phone ?? ''}}">
                                        </div>
                                        <div class="form-group col-xl-6">
                                            <label class="mr-sm-2">Bank Name</label>
                                            <input type="text" name="bank_name" class="form-control" value="{{Auth::user()->profile->bank_name ?? ''}}">
                                        </div>
                                        <div class="form-group col-xl-6">
                                            <label class="mr-sm-2">Account Number</label>
                                            <input type="number" name="account_number" class="form-control" value="{{Auth::user()->profile->account_number ?? ''}}">
                                        </div>
                                        <div class="form-group col-xl-12">
                                            <div class="media align-items-center mb-3">
                                                <img class="mr-3 rounded-circle mr-0 mr-sm-3"
                                                    src="{{asset('/storage/profile/'.Auth::user()->profile->avatar)}}" width="55" height="55" alt="">
                                                <div class="media-body">
                                                    <h4 class="mb-0">{{Auth::user()->username}}</h4>
                                                    <p class="mb-0">Max file size is 2mb
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="file-upload-wrapper" data-text="Change Photo">
                                                <input name="avatar" type="file"
                                                    class="file-upload-field">
                                            </div>
                                        </div>
                                    

                                        <div class="form-group col-12">
                                            <button type="submit" class="btn btn-success pl-5 pr-5">Update</button>
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