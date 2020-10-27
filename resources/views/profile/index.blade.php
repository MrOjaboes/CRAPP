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
          <div class="row">
          <div class="col-md-4">
          <div class="card card-primary">
          <div class="card-header">
                        <h3 class="card-title">User Profile</h3>
                    </div>
                    <div class="card-body">
           
           <span>Hello</span>
            <h4 class="mb-2">{{Auth::user()->username}}</h4>
            <p class="mb-1"> <span><i class="fa fa-phone mr-2 text-primary"></i></span>{{Auth::user()->profile->phone ?? ''}}</p>
                                <p class="mb-1"> <span><i class="fa fa-envelope mr-2 text-primary"></i></span>
                                    {{Auth::user()->email}}
                                </p>  
                                <ul class="card-profile__info list-group">
                            <li class="list-group-item">
                                <h5 class="text-dark mr-4">Address</h5>
                                <span class="text-muted">{{Auth::user()->profile->address ?? ''}}</span>
                            </li>
                            <li class="mb-1 list-item list-group-item">
                                <h5 class="text-dark mr-4">Bank Name</h5>
                            <span>{{Auth::user()->profile->bank_name ?? ''}}</span>
                            </li>
                            <li class="list-group-item">
                                <h5 class="text-dark mr-4">Account Number</h5>
                                <span>{{Auth::user()->profile->account_number ?? ''}}</span>
                            </li>
                        </ul>   
                        <br>
                        <div class="justify-content-centre">
                        @if ($profile->user->user_type == 1)
                        <a href="{{route('admin')}}" class="btn btn-info">Home</a>
                            @endif
                            @if ($profile->user->user_type == 2)
                        <a href="{{route('admin')}}" class="btn btn-info">Home</a>
                            @endif
                            @if ($profile->user->user_type == 3)
                        <a href="{{route('admin')}}" class="btn btn-info">Home</a>
                            @endif
                            
                            &nbsp;
                        <a href="{{route('edit-profile', Auth::user()->profile)}}"><button class="btn btn-primary">Edit Profile</button></a> 
                        </div>
                        </div>
                        </div>      
          </div>
          <div class="col-md-4">
          <div class="card">
          <div class="card-header">
                        <h3 class="card-title">Savings</h3>
                    </div>
          <div class="card-body">
          <h4 class="card-title text-gray text-center">Balance</h4><br>
           
                        <h5 class="text-justify"></h5>

          </div>
          </div>
          </div>
          <div class="col-md-4">
          <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Save</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                                       
                            <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck"/>&nbsp;Offline
                            <input type="radio" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck"/> Online
                         
                          </div>
                          <script>
                            function yesnoCheck() {
                              if (document.getElementById('yesCheck').checked) {
                                document.getElementById('ifYes').style.display = 'block';
                                document.getElementById('online').style.display='none';
                              } else {
                                document.getElementById('ifYes').style.display = 'none';
                                document.getElementById('online').style.display='block';
                              }
                          }
                          </script>

                          <div id="ifYes" style="display:none;margin-top:3%;">
                        <form action="{{route('offline-fund')}}" method="POST" id="ifYes">
                            @csrf
                            <div class="form-group">
                                <label for="amount"> Amount</label>
                                <input type="number" name="amount" id="amount" min="20" class="form-control">
                            </div>
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                           
                            <div>
                              <button type="submit" class="btn btn-secondary">Offline Saving</button>
                            </div>
                          </form>
                        </div>

                        <div id="online" style="display:none;margin-top:3%;">
                          <form id="myForm" action="{{route('fundwallet')}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="amount"> Amount</label>
                              <input type="number" name="amount" id="amount" min="20" class="form-control">
                              
                          </div>
                          <small>Please note that service fee will be apllied.</small>
                          <div id="response"></div>
                            <div class="form-group">
                              <input type="hidden" id="stripeToken" name="stripeToken"/>
                              <input type="hidden" id="stripeEmail" name="stripeEmail"/>
                            </div>
                          </form>
                         <button id="customButton" class="btn btn-secondary">Stripe</button>
                         <script src="https://checkout.stripe.com/checkout.js"></script>
                          <script src="https://js.stripe.com/v3/"></script>
                          <script src="/admins/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>
                          <script>
                            var handler = StripeCheckout.configure({
                              key: 'pk_test_51H0bZ0KRb4imYLNrw385vboqlKqfOTgLp85jPwivDa6qLnZDPfKuKFB0WuW8x2aky9DwRc1GYTw7NlT0PULE7nlf00m434Pv9M',
                              image: '/assets/images/favicon.png',
                              token: function(token) {
                                  $("#stripeToken").val(token.id);
                                  $("#stripeEmail").val(token.email);
                                  $("#myForm").submit();
                              }
                            });
                          
                            $('#customButton').on('click', function(e) {
                              var amt = $("#amount").val() *100;
                              var amount = (2.9 / 100) * amt
                              handler.open({
                                name: 'VCASS',
                                description: 'Savings for the month',
                                amount: amount
                              });
                              e.preventDefault();
                            });
                          
                            // Close Checkout on page navigation
                            $(window).on('popstate', function() {
                              handler.close();
                            });
                            </script>
                            </div>
                    </div>
                </div>
          </div>
          </div>                 
                 
            
            
        </div>
        <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header border-0">
                        <h4 class="card-title">All Savings</h4>
                    </div>
                    <div class="card-body pt-0">
                        <div class="transaction-table">
                            <div class="table-responsive" style="overflow-y:scroll;height:200px;">
                                <table class="table mb-0 table-responsive-sm">
                                    <thead>
                                      
                                        <th scope="col">Amount</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Date</th>
                                    </thead>
                                    <tbody>
                                        @forelse($savings as $saving)
                                       
                                      
                                        <tr>
                                        
                                            <td>
                                               ${{$saving->amount}}
                                            </td>
                                            <td>
                                                {{$saving->user->username}}
                                            </td>
                                            
                                            <td>{{$saving->created_at}}</td>
                                        </tr>
                                       
                                        @empty
                                           No Savings made yet! 
                                        @endforelse
                                       
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
        <div class="col-md-1"></div>
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