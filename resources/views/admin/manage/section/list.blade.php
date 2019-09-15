@extends('admin.layout.base')
@section('body')
<!-- Modal -->
<div id="add_section" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     {!! Form::open(['route'=>@($sectionEdit)?['admin.section.update',$sectionEdit->id]:'admin.section.add','class'=>"form-horizontal"]) !!}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@if(@$sectionEdit) Update @else Add @endif Section</h4>
      </div>
      <div class="modal-body">
         <div class="col-md-12">
              <div class="form-group">
                {!! Form::label('session', 'Session : ', ['class'=>"control-label"]) !!}      
                {!! Form::select('session', $sessions, @$sectionEdit->session_id, ['placeholder'=>'choose session','class'=>'form-control']) !!}
                <p class="text-danger">{{ $errors->first('session') }}</p>              
                </div>
              <div class="form-group">
                {!! Form::label('class', 'Class : ', ['class'=>"control-label"]) !!}            
                {!! Form::select('class', [], '', ['placeholder'=>'choose class','class'=>'form-control']) !!}
                <p class="text-danger">{{ $errors->first('class') }}</p>
              </div>
              <div class="form-group">
                {!! Form::label('sectionName', 'Section Name :', ['class'=>"control-label"]) !!}
                {!! Form::text('sectionName', @$sectionEdit->name, ['class'=>"form-control",'placeholder'=>"section Name",'autocomplete'=>'off']) !!}
                <p class="text-danger">{{ $errors->first('sectionName') }}</p>
              </div>  
         </div>
      </div>
     <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary pull-right">@if(@$sectionEdit) Update @else Save @endif</button>
      </div>
      {!! Form::close() !!}  
       </div>

  </div>
</div>

    <section class="content">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Section List</h3>
              <span style="float: right"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_section">Add Section</button></span>


            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Section id</th>                
                  <th>Session</th>
                  <th>Class Name</th>
                  <th>Section Name</th>
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($sections as $section)
                <tr>
                  <td>{{ $section->id }}</td>
                  <td>{{ $section->sessions->date or '' }}</td>
                  <td>{{ $section->classes->alias or '' }}</td>
                  <td>{{ $section->name }}</td>
                  <td align="center">
                    <a class="btn btn-info btn-xs" href="{{ route('admin.section.edit',$section->id) }}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data ?')" href="{{ route('admin.section.delete',$section->id) }}"><i class="fa fa-trash"></i></a>
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->


    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
        if ($("#session").val()) {
          $.ajax({
              method: "get",
              url: "{{ route('admin.class.search') }}",
              data: { id: $("#session").val() }
            })
            .done(function( response ) {            
                if(response.length>0){
                    var selVal = {{  (@$sectionEdit->class_id)?$sectionEdit->class_id: 0  }};
                    $('#class').html('<option value="">Select Class</option>');
                    for (var i = 0; i < response.length; i++) {
                        
                        
                          var selected=(response[i].id==selVal)?"selected":"";
                        $('#class').append('<option value="'+response[i].id+'" '+selected+' >'+response[i].alias+'</option>');
                    } 
                }
                else{
                    $('#class').html('<option value="">Not found</option>');
                }
                
            });
        }
      });
     @if(@$sectionEdit || $errors->first())
     $('#add_section').modal('show'); 
     @endif
    
    $("#session").change(function(){
        $('#class').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.class.search') }}",
          data: { id: $(this).val() }
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
 </script>
@endpush