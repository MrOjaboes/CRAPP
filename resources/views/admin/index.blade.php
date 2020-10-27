@extends('layouts.header')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Medical Records</h1>
          </div>
          <div class="col-sm-6">
         
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Medical Slips</li>
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
          <h3 class="card-title">medical Slips</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">

        
                    <br><br>
                    <h5 class="card-title ml-3"><a class="btn btn-secondary" href="{{route('admin-medical-record')}}"><i class="fas fa-plus"></i> New Record</a></h5>
                        <br><br>
        <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>                       
                      <th style="width: 20%">
                          Victim Names
                      </th>                       
                       
                      <th style="width: 20%" class="text-center">
                        Station Code
                      </th>
                      <th style="width: 20%">
                      Case Type
                      </th>
                      <th style="width: 20%">
                      Hospital Name
                      </th>
                      <th style="width: 15%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($medical_slips as $record)
                  
                  <tr>                      
                      <td>
                          <a>
                         {{$record->victim_name}}
                          </a>
                           
                      </td>

                      <td>
                          <a>
                         {{$record->station_code}}
                          </a>
                           
                      </td>
                       
                      <td>
                          <a>
                         {{$record->case_type}}
                          </a>
                           
                      </td>
                        
                      <td>
                          <a>
                         {{$record->hospital_name}}
                          </a>
                           
                      </td>
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" title="record details" href="{{route('medical-record-details',$record->id)}}">
                               <i class="fas fa-folder">
                              </i>
                              
                          </a>   

                          <a class="btn btn-success btn-sm" title="edit record" href="{{route('edit-medical-record',$record->id)}}">
                               <i class="fas fa-edit">
                              </i>
                              
                          </a>    
                          @if(Auth::check() AND Auth::user()->user_type == 1)
                          <span onclick="event.preventDefault();
                        if(confirm('Continue with Delete?')){
                        document.getElementById('form-delete-{{$record->id}}').submit()}"             
                         class="btn btn-danger btn-sm" title="delete record"><i class="fas fa-trash"></i></a>
                        <form style="display: none;" action="{{route('delete-medical-record', $record->id)}}" id="{{'form-delete-'.$record->id}}" method="post">
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