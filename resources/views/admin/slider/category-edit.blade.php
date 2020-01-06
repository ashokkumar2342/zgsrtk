@extends('admin.layout.base')
@section('body')
    <section class="content">


     {{-- {{  Form::open(['route'=>['admin.gallery.post'], 'files'=>true, 'enctype'=>'multipart/form-data', 'class'=>'dropzone', 'id'=>'myImageDropzone'])  }}   

     <p>{{ $errors->first('file') }} </p> 
   
    {!! Form::close() !!} --}}
    <form action="{{ route('admin.gallery-category.update') }}"  method="post">
    	{{ csrf_field() }}
      <div>
        <label>Category Name</label>
        <input name="name" value="{{ $galleryCategory->name }}" class="form-control" type="text"  />
        <label>Description</label>
        <input name="description" value="{{ $galleryCategory->description }}" class="form-control" type="text"  />
        <input type="submit" class="btn btn-success" name="submit" value="Update">
      </div>
       
    </form>
</section>
 

@endsection
@push('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.css" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/dropzone.js"></script>
<script type="text/javascript">
 Dropzone.autoDiscover = false;

$('#myImageDropzone').dropzone({
     
    resizeWidth:1000,
    resizeHeight:600,
    addRemoveLinks: true,

    dictRemoveFile: "Remove image"
});

</script>
 
 @if(Session::has('message'))
<script type="text/javascript">

    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
@endpush