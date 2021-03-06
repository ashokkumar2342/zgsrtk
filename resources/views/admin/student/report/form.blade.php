@extends('admin.layout.base')
@section('body')
@push('links') 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
<style type="text/css">
  .radio label {
    padding-right: 20px;
  }
</style>
@endpush
<section class="content-header">
  <h1>  Student Fee Report  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
  </ol>
</section>
<section class="content">
  <div class="box">    
    {{ $errors->first() }}         
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-lg-12 ">  
          <div class="container">

            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#home">Receipt No</a></li>
              <li><a data-toggle="tab" href="#menu1" onclick="$('#tracking').val('')">Date Range</a></li>
              <li><a data-toggle="tab" href="#menu2" onclick="$('#tracking').val('')">Due Fee</a></li>


            </ul>

            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">

                <form id="search" class="add_form" method="post" no-reset="true" success-content-id="fee_result" action="{{ route('admin.student.fee.report.show') }}" data-table-without-pagination="fee_result_table">
                  {{ csrf_field() }}
                  <div class="col-lg-3">   
                    <div class="form-group">
                      {{ Form::label('receipt',' Receipt No',['class'=>' control-label']) }}   

                      {{ Form::text('receipt','',array('class' => 'form-control','id'=>'receipt' )) }}
                    </div>

                  </div>
                  <div class="col-lg-3">                         
                    <div class="form-group">
                      <br>                       
                      <input type="submit" value="Show" class="btn btn-success">
                    </div>

                  </div> 
                </form>
              </div>
              <div id="menu1" class="tab-pane fade">

                  <div class="row">
                     <form id="search" class="add_form" method="post" no-reset="true" success-content-id="fee_result" action="{{ route('admin.student.fee.report.show') }}" data-table-without-pagination="fee_result_table">
                  {{ csrf_field() }}
                    <div class="col-lg-12 ">  

                      <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                          <div class="form-group">
                            @php
                            $n = 12/count($centers);
                            @endphp
                            @foreach($centers as $center)
                            <div class="col-lg-{{ $n }}">
                              <div class="radio-custom radio-danger">
                                {!! Form::radio('center', $center->id, '', ['id'=>'center'.$center->id,'required']) !!}
                                {!! Form::label('center'.$center->id, $center->name, ['class'=>'control-label','style'=>'cursor:pointer']) !!}
                              </div>
                            </div>
                            @endforeach

                          </div>
                        </div>
                      </div>                    
                      <hr>
                      <div class="row">{{--row start --}}
                        <div class="col-md-12 ">
                          <div class="form-group">
                            <div class="col-md-12">
                              <div class="col-lg-2">                         
                                <div class="form-group">
                                  {{ Form::label('session','Session',['class'=>' control-label']) }}                         
                                  {!! Form::select('session',$sessions, '', ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}

                                </div>
                              </div>

                              <div class="col-lg-2">                         
                                <div class="form-group">
                                  {{ Form::label('from_date','From Date',['class'=>' control-label']) }}   

                                  {{ Form::date('from_date','',array('class' => 'form-control','data-inputmask'=>"'alias': 'dd/mm/yyyy'", 'id="datepicker"','required' )) }}
                                </div>

                              </div>

                              <div class="col-lg-2">                         
                                <div class="form-group">
                                  {{ Form::label('to_date','To Date',['class'=>' control-label']) }}   

                                  {{ Form::date('to_date','',array('class' => 'form-control','data-inputmask'=>"'alias': 'dd/mm/yyyy'", 'id="datepicker"','required' )) }}
                                </div>

                              </div>
                              <div class="col-lg-2">                         
                                <div class="form-group">
                                  <br>                       
                                  <input type="submit" value="Show" class="btn btn-success">
                                </div>

                              </div>


                            </div>  



                          </div>
                        </div>
                      </div>
                    </div><hr>

                  </form>
                </div>

              </div><div id="menu2" class="tab-pane fade">

                  <div class="row">
                     <form id="search" class="add_form" method="post" no-reset="true" success-content-id="fee_result" action="{{ route('admin.student.due.fee.report.show') }}" data-table-without-pagination="dataTable">
                  {{ csrf_field() }}
                    <div class="col-lg-12 ">  

                      <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                          <div class="form-group">
                            @php
                            $n = 12/count($centers);
                            @endphp
                            @foreach($centers as $center)
                            <div class="col-lg-{{ $n }}">
                              <div class="radio-custom radio-danger">
                                {!! Form::radio('center', $center->id, '', ['id'=>'center'.$center->id,'required']) !!}
                                {!! Form::label('center'.$center->id, $center->name, ['class'=>'control-label','style'=>'cursor:pointer']) !!}
                              </div>
                            </div>
                            @endforeach

                          </div>
                        </div>
                      </div>                    
                      <hr>
                      <div class="row">{{--row start --}}
                        <div class="col-md-12 ">
                          <div class="form-group">
                            <div class="col-md-12">
                              <div class="col-lg-2">                         
                                <div class="form-group">
                                  {{ Form::label('session','Session',['class'=>' control-label']) }}                         
                                  {!! Form::select('session',$sessions, '', ['class'=>'form-control','placeholder'=>'choose Session','required']) !!}

                                </div>
                              </div>

                              <div class="col-lg-2">                         
                                <div class="form-group">
                                  {{ Form::label('from_date','Upto Month',['class'=>' control-label']) }}   

                                  <select name="month" class="form-control">
                                    <option value="Apr - Jun">Apr - Jun</option>
                                    <option value="Jul - Sep">Jul - Sep</option>
                                    <option value="Oct - Dec">Oct - Dec</option>
                                    <option value="Jan - Mar">Jan - Mar</option>
                                
                                  </select>
                                </div>

                              </div>

                              
                              <div class="col-lg-2">                         
                                <div class="form-group">
                                  <br>                       
                                  <input type="submit" value="Show" class="btn btn-success">
                                </div>

                              </div>


                            </div>  



                          </div>
                        </div>
                      </div>
                    </div><hr>

                  </form>
                </div>

              </div>
            </div>




          </div>

        </div>

      </div>

    </div>
    <div class="row" >
      <div class="col-lg-12" id="fee_result">

      </div>

    </div>
  </div>

  <!-- /.box-body -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->

@endsection
@push('scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
  $("#session").change(function(){
    $('#class').html('<option value="">Searching ...</option>');
    $.ajax({
      method: "get",
      url: "{{ route('admin.class.search2') }}",
      data: { id: $(this).val(),center_id: $('input[name="center"]:checked').val() }
    })
    .done(function( response ) {            
      if(response.length>0){
        $('#class').html('<option value="">Select Class</option>');
        for (var i = 0; i < response.length; i++) {
          $('#class').append('<option value="'+response[i].id+'">'+response[i].alias+'</option>');
        } 
      }
      else{
        $('#class').html('<option value="">Not found</option>');
      }

    });
  });
  $("#class").change(function(){
    $('#section').html('<option value="">Searching ...</option>');   
    $.ajax({
      method: "get",
      url: "{{ route('admin.section.search') }}",
      data: { id: $(this).val(), session: $('#session').val(),center_id: $('input[name="center"]:checked').val() }
    })
    .done(function( response ) {
      if(response.section.length>0){
        $('#section').html('<option value="">Select Section</option>');
        for (var i = 0; i < response.section.length; i++) {
          $('#section').append('<option value="'+response.section[i].id+'">'+response.section[i].name+'</option>');
        } 
      }
      else{
        $('#section').html('<option value="">Not found</option>');
      }

    });
  });


</script>



@endpush