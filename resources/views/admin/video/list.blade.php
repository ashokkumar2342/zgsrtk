 
@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

<section class="content">
    <div class="box">
        <div class="row">
            <div class="col-md-12">
                <br>
                {{ Form::open(['route'=>['admin.video.post'],'method'=>'post']) }}
                          <div class="form-group clearfix">
                          
                                 {{ Form::label('url','Video Url',['class'=>'col-lg-2 control-label']) }}
                              <div class="col-lg-10">
                                  {{ Form::text('url','',['class'=>'form-control required']) }}
                                  <p class="text-danger">{{ $errors->first('url') }}</p>
                              </div>
                          </div>
                         
                          <div class="form-group clearfix">
                              <button class="btn btn-primary pull-right" type="submit">Save</button>
                          </div>
                      {{ Form::close() }}
            </div>
        </div>
        
    </div>
    <div class="box">
      <table class="table table-hover p-table table-responsive">
            <thead>
                <tr>
                    <th width="50px">Id</th>
                    <th width="150px">Date</th>                    
                    <th width="150px">Video</th>                   
                    <th width="100px">Custom</th>
                </tr>
            </thead>
            <tbody>
            @foreach($videos as $video)
                <tr>
                    <td>{{ $video->id }}</td>
                    <td>{{ $video->created_at }}</td>
                    <td >{{ $video->url }}</td>
                  
                    <td>
                     
                        <a href="{{ route('admin.video.edit',[$video->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>


                        <!--<a href="javascript:;"  onclick="event.preventDefault(); document.getElementById('notice{{ $video->id }}').submit();" class="btn btn-danger btn-xs", ><i class="fa fa-trash-o"></i> Delete  </a>-->
                        <!--{!! Form::open(['route'=>['admin.video.delete',$video->id],'method'=>'delete','class'=>'hidden',  'id'=>'video'.$video->id]) !!}-->

               

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table> 

        <div class="row">
            <div class="col-md-12">
                {{ $videos->links() }}
            </div>
        </div>
    </div>
</section>  

     
     
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')

 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
</script>
@endpush
