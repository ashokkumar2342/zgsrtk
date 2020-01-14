@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Add New Bus <small>Details</small> </h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">
      	<div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{ Form::open(['route'=>['admin.transport.post']]) }} 
                         <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group">
                                        @php
                                            $n = 12/count($centers);
                                        @endphp
                                        @foreach($centers as $center)
                                            <div class="col-lg-{{ $n }}">
                                                <div class="radio-custom radio-danger">
                                                    {!! Form::radio('center', $center->id, '', ['id'=>'center'.$center->id]) !!}
                                                    {!! Form::label('center'.$center->id, $center->name, ['class'=>'control-label','style'=>'cursor:pointer']) !!}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p class="text-danger">{{ $errors->first('center') }}</p>
                                </div>
                            </div>                   
                            <hr>                             
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('driver_name','Driver Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('driver_name','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('driver_name') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('driver_contact','Driver Contact',['class'=>' control-label']) }}                         
                                                    {{ Form::text('driver_contact','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('driver_contact') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('vehical_no','Vehical No',['class'=>' control-label']) }}                         
                                                    {{ Form::text('vehical_no','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('vehical_no') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}}
                            <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('bus_name','Bus Name (As given by school)',['class'=>' control-label']) }}                         
                                                    {{ Form::text('bus_name','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('bus_name') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('first_stoppage','First Stoppage',['class'=>' control-label']) }}                         
                                                    {{ Form::text('first_stoppage','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('first_stoppage') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('last_stoppage','Last Stoppage',['class'=>' control-label']) }}                         
                                                    {{ Form::text('last_stoppage','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('last_stoppage') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}} 
                            <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('bus_starting_time','Bus Starting Time
                                                        ',['class'=>' control-label']) }}                         
                                                    {{ Form::text('bus_starting_time','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('bus_starting_time') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('bus_arrival_time','Bus Arrival Time',['class'=>' control-label']) }}                         
                                                    {{ Form::text('bus_arrival_time','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('bus_arrival_time') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-4">                         
                                                <div class="form-group">
                                                    {{ Form::label('bus_terminal','Bus Terminals
                                                        ',['class'=>' control-label']) }}                         
                                                    {{ Form::text('bus_terminal','',['class'=>'form-control required']) }}
                                                    <p class="text-danger">{{ $errors->first('bus_terminal') }}</p>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>{{--row end --}}     
                             
                            <hr> 
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        @foreach($routes as $route)
                                            <div class="col-md-2">
                                                <div class="radio-custom radio-danger">
                                                    {!! Form::radio('route', $route->id, '', ['id'=>'route'.$route->id]) !!}
                                                    {!! Form::label('route'.$route->id, $route->name, ['class'=>'control-label','style'=>'cursor:pointer']) !!}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <p class="text-danger">{{ $errors->first('route') }}</p>
                                </div>
                            </div>               
                            <hr>
                             <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                            
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- /.box-header -->
        <div class="box">
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>id</th>                
                  <th>Driver Name</th>
                  <th>Center</th>
                  <th>Route</th>
                  <th width="80px">Action</th>                     
                </tr>
                </thead>
                <tbody>
                @foreach($transports as $transport)
                <tr>
                  <td>{{ $transport->id }}</td>
                  <td>{{ $transport->driver_name }}</td>
                  <td>{{ $transport->center->name or '' }}</td>
                  <td>{{ $transport->route->name or '' }}</td>
                  <td align="center">
                    <a class="btn btn-info btn-xs" href="{{ route('admin.transport.edit',$transport->id) }}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.transport.delete',$transport->id) }}"><i class="fa fa-trash"></i></a>
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->


@endsection
