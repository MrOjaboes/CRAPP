@extends('layouts.header')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Police Invitation Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">Police Invitation Details</li>
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
            <form action="" method="POST">
              @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Name Of Officer</label>
                  <input type="text" disabled value="{{$invitation->officer_name}}" class="form-control" name="officer_name" id="">
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                  <label>Rank/Position</label>
                 <input type="text" disabled value="{{$invitation->rank}}"  name="rank" class="form-control" id="">
                </div>

                <div class="form-group">
                  <label>Name Of Invitee</label>
                 <input type="text" disabled value="{{$invitation->invitee_name}}" name="invitee_name" class="form-control" id="">
                </div>
                
                <div class="form-group">
                <label for="">Gender</label>
                <select class="form-control" disabled name="gender"  data-placeholder="Select project Stat" style="width: 100%;">
                    <option value="{{$invitation->gender}}">{{$invitation->gender}}</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>                                         
                  </select>
                </div>

                <div class="form-group">
                <label for="">Reason For Invitation</label>
                <textarea name="reason" disabled value="{{$invitation->reason}}" id="" class="form-control">{{$invitation->reason}}</textarea>
                </div>
                         
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label>Invitation Date</label>
                   <input type="date" disabled value="{{$invitation->invitation_date}}" name="invitation_date" class="form-control">
                </div>
                <!-- /.form-group -->
                   <div class="form-group">
                     <label for="">Police District</label>
                     <input type="text" disabled value="{{$invitation->police_district}}" name="police_district" class="form-control">
                   </div>

                <div class="form-group">
                  <label>Station Code</label>
                 <input type="text" disabled value="{{$invitation->station_code}}" name="station_code" class="form-control">
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Invitee Address</label>
                <textarea name="invitee_address" disabled value="{{$invitation->invitee_address}}" class="form-control">{{$invitation->invitee_address}}</textarea>
                  <!-- /.input group -->
                </div>

                <div class="form-group">
                  <label>Response Date</label>
                <input type="date" disabled value="{{$invitation->response_date}}" name="response_date" class="form-control">
                  <!-- /.input group -->
                </div>

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">
                 
                <a href="{{route('admin-police-invitations')}}" class="btn btn-warning mr-4" type="button">Invitations</a>              
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