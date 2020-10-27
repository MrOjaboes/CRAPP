@extends('layouts.header')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
         
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Registered users</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0"> 
        <br>  
           <h5 class="card-title ml-3"><a class="btn btn-secondary" href="{{route('add-user')}}"><i class="fas fa-plus"></i> New user</a></h5>
                        <br><br>     
        <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>                       
                      <th style="width: 20%">
                         Names
                      </th>                       
                       
                      <th style="width: 20%">
                          Emails
                      </th> 
                      <th style="width: 20%">
                          Roles
                      </th>                       
                       
                      <th style="width: 8%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                  
                  <tr>                      
                      <td>
                          <a>
                         {{$user->username}}
                          </a>
                           
                      </td>
                      <td>
                          <a>
                         {{$user->email}}
                          </a>
                           
                      </td>

                      <td>
                      @if($user->user_type == 2)
                          <a>
                        Editor
                          </a>
                          @endif

                          @if($user->user_type == 1)
                          <a>
                        Admin
                          </a>
                          @endif

                          @if($user->user_type == 0)
                          <a>
                        Viewer
                          </a>
                          @endif
                           
                      </td>
                       
                       
                      
                      
                      <td class="project-actions text-right">
                       
                         

                          <a class="btn btn-success btn-sm" title="edit user" href="{{route('edit-user', $user->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                               
                          </a>
                           
                          @if(Auth::check() AND Auth::user()->user_type == 1)
                          <span onclick="event.preventDefault();
                        if(confirm('Continue with Delete?')){
                        document.getElementById('form-delete-{{$user->id}}').submit()}"             
                         class="btn btn-danger btn-sm" title="delete project"><i class="fas fa-trash"></i></a>
                        <form style="display: none;" action="{{route('admin-delete', $user->id)}}" id="{{'form-delete-'.$user->id}}" method="post">
                        @csrf
                        @method('delete')
                    </form>
                      @endif
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
       

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
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection