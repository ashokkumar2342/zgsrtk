@extends('student.layout.base')
@section('body')
@push('links') 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style type="text/css">
      .radio label {
    padding-right: 20px;
}
  </style>
@endpush
{{-- <section class="content-header">
<h1>  <i class="fa fa-bar-chart"></i> Attendance Statistics </h1>
    <ol class="breadcrumb">
     <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
     </ol>
</section> --}}
    <section class="content">
      	<div class="box">    
                
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        <table class="table table-bordered">
                        	<thead>
                        		<tr>
                        			<th>Date</td>
                        			<th>Attendance</td>
                        		</tr>
                        	</thead>
                        	<tbody>
                          @foreach($attendances  as $attendance) 
                         {{--  @if($attendance->student_id)                            --}}
                        		<tr>
                        			<td>{{ Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</th>
                            
                              
                        		  <td>{{ $attendance->attendance->name}}</th> 	
                        		</tr> 
                           {{--  @endif --}}
                        	@endforeach            		
                        	</tbody>
                        </table>
                     </div> 
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    
@endsection
 

  
 