@extends('layouts.header')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Police Record Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Police Record Details</li>
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
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove label-danger"></i></button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          
                    <br><br>
            <form action="{{route('edit-police-record',$police_record->id)}}" method="POST">
              @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name Of Suspect</label>
                  <input type="text" disabled value="{{$police_record->suspect_name}}" class="form-control" name="suspect_name" id="">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>File Number</label>
                 <input type="text" disabled value="{{$police_record->file_number}}"  name="file_number" class="form-control" id="">
                </div>

                <div class="form-group">
                  <label>Police Formation</label>
                 <input type="text" disabled value="{{$police_record->police_formation}}" name="police_formation" class="form-control" id="">
                </div>
                
                <div class="form-group">
                <label for="">Date Of Arrest</label>
               <input type="date" disabled value="{{$police_record->date_of_arrest}}" name="date_of_arrest" class="form-control">
                </div>

                 
                         
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nature Of Offence</label>
                   <input type="text" disabled value="{{$police_record->nature_of_offence}}" name="nature_of_offence" class="form-control">
                </div>
                <!-- /.form-group -->
                   <div class="form-group">
                     <label for="">Admin Suspect</label>
                     <select name="admin_suspect" disabled class="form-control">
                     <option value="{{$police_record->admin_suspect}}">{{$police_record->admin_suspect}}</option>
                     <option value="on bail">On Bail</option>
                     <option value="arraignment">Arraignment</option>
                     </select>
                   </div>

                

                <div class="form-group">
                  <label>Remarks</label>
                <textarea name="remarks" value="{{$police_record->remarks}}" disabled class="form-control">{{$police_record->remarks}}</textarea>
                  <!-- /.input group -->
                </div>

                

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                 
                <a href="{{route('admin-police-records')}}" class="btn btn-warning" type="button">Police Records</a>
              </div>
              <div class="col-md-3"></div>
            </div>
</form>
            <!-- /.row -->
 
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
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

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script> 
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
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>

<!-- Page script -->
<script>

var show = true; 

function showCheckboxes() { 
  var checkboxes = 
    document.getElementById("checkBoxes"); 

  if (show) { 
    checkboxes.style.display = "block"; 
    show = false; 
  } else { 
    checkboxes.style.display = "none"; 
    show = true; 
  } 
} 


  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
</script>


@endsection()