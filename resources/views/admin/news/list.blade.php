 
@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

<section class="content">
    <div class="box">
      <div class="box-body" >      
        {{ Form::open(['route'=>'admin.news.post','class'=>'validate cmxform tasi-form','files'=>true]) }}
                <div class="form-group clearfix">
                    {{ Form::label('news','News & Events',['class'=>'col-lg-2 control-label']) }}
                    <div class="col-lg-8">
                        {{ Form::text('news','',['class'=>'form-control required']) }}
                        <p class="text-danger">{{ $errors->first('news') }}</p>
                    </div>
                    <div class="col-lg-2">

                        <input type="file" name="file" class="form-control">
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                    </div>
                </div>
           
                
                <div class="form-group">
                    <button class="btn btn-primary pull-right" type="submit">Create News</button>
                </div>
            {{ Form::close() }}
    </div>
    </div>
    <div class="box">
      <table class="table table-hover p-table table-responsive">
            <thead>
                <tr>
                    <th width="50px">Id</th>
                    <th width="150px">Date</th>                    
                    <th width="150px">News &amp; Events</th>                   
                    <th width="100px">Custom</th>
                </tr>
            </thead>
            <tbody>
            @foreach($news as $new)
                <tr>
                    <td>{{ $new->id }}</td>
                    <td>{{ $new->created_at }}</td>
                    <td >{{ $new->news }}</td>
                  
                    <td>
                        @if ($new->file!=null)
                            <a class="btn-success btn-xs"  href="{{ asset('uploads/'.$new->file) }}" target="blank"  ><i class="fa fa-download"></i></a>
                        @else
                        <button type="button" class="btn-danger btn-xs disabled"  href="#" target="blank" >_</button>
                        @endif
                       
                     
                        <a href="{{ route('admin.news.edit',[$new->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>


                        <a href="javascript:;"  onclick="event.preventDefault(); document.getElementById('news{{ $new->id }}').submit();" class="btn btn-danger btn-xs", ><i class="fa fa-trash-o"></i> Delete  </a>
                        {!! Form::open(['route'=>['admin.news.delete',$new->id],'method'=>'delete','class'=>'hidden',  'id'=>'news'.$new->id]) !!}

               

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table> 

        <div class="row">
            <div class="col-md-12">
                {{ $news->links() }}
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
 @if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
@endpush
