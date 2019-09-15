@extends('admin.layout.base')
@section('body')
    <section class="content">
    	 
    {{ Form::open(['route'=>'admin.curcular.post','class'=>'validate cmxform tasi-form','files'=>true]) }}
        
    	  <div class="form-group">
    	    <label for="title">Title</label>
    	    <input type="text" class="form-control" name="title" placeholder="Enter title here">
    	  </div>
    	  <div class="form-group">
    	    <label for="comment">Circular:</label>
    	    <textarea class="form-control" rows="7" name="body"></textarea>
    	  </div>
         <div class="form-group">

              <input type="file" name="file" class="form-control">
              <p class="text-danger">{{ $errors->first('file') }}</p>
          </div>
    	   
    	  <button type="submit" class="btn btn-default">Submit</button>
    	</form>
</section>
 

@endsection
@push('links')
 
@endpush
@push('scripts')
 
<script type="text/javascript">

</script>
 
 @if(Session::has('message'))
<script type="text/javascript">

    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
@endpush