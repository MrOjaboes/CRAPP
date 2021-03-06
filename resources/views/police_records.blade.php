@extends('layouts.users')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Police Records</h1>
          </div>
          <div class="col-sm-6">
         
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Police Records</li>
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
          <h3 class="card-title">Police Records</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
         <br>
        <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>                       
                      <th style="width: 20%">
                          Suspects Names
                      </th>                       
                       
                      <th style="width: 20%" class="text-center">
                          File Name
                      </th>
                      <th style="width: 20%">
                     Nature Of Offence
                      </th>
                      <th style="width: 20%">
                      Date Arrested
                      </th>
                      <th style="width: 15%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach($policerecords as $record)
                  
                  <tr>                      
                      <td>
                          <a>
                         {{$record->suspect_name}}
                          </a>
                          
                      </td>
                      <td>
                          <a>
                         {{$record->file_number}}
                          </a>
                          
                      </td>
                      
                      <td>
                          <a>
                         {{$record->nature_of_offence}}
                          </a>
                          
                      </td>
                       
                      <td>
                          <a>
                         {{$record->date_of_arrest}}
                          </a>
                          
                      </td>
                        
                      
                      <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" title="record details" href="{{route('police-record',$record->id)}}">
                               <i class="fas fa-folder">
                              </i>
                              
                          </a>   
 
                          
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