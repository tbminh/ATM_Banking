@if(session('alert'))
 <section class='alert alert-success'>{{session('alert')}}</section>
 @endif

 <a href="{{ url('log-out') }}">Log Out</a>
 <h1>ATM BANKING</h1>