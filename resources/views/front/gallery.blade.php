@extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/gallery.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h3>&nbsp;</h3>          
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- page header -->
    <!-- Page Header End here -->
      <!-- facility Start here -->
      <section style="padding-top: 20px;">
        <div class="container">
          
          <div class="row">
            <div class="col-lg-6">
              <select name="center" class="form-control" id="center">
                 <option>Select Center</option>
                @foreach (App\Center::all() as $center)

                <option value="{{ $center->id }}">{{ $center->name }}</option>
                 @endforeach 
              </select>
            </div>
            <div class="col-lg-6">
              <select name="category" class="form-control" id="category">
         
                @foreach (App\GalleryCategory::all() as $category)

                <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach 
              </select>
            </div>
          </div>
        </div>
      </section>
   <section class="gallery " style="padding-top: 30px;">
            
            <div class="container">            
               <div class="gallery-items">  
               @php
                $galleries= App\Gallery::orderBy('id','desc')->paginate(12);
               @endphp
                @foreach ($galleries as $gallery)  
                  <div class="gallery-item branding packing">
                    <div class="gallery-image">
                      <img src="{!! url('uploads/'.$gallery->image) !!}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                      <div class="gallery-overlay"> </div>
                      <div class="gallery-content">
                        <a href="{!! url('uploads/'.$gallery->image) !!}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                      </div>
                    </div>
                  </div><!-- gallery item -->                   
                  @endforeach
                                  
              </div><!-- container --> 
              <div class="row">
                    <div class="com-md-12">
                    {{ $galleries->links() }}
                    </div>
                  </div>    
            </section><!-- gallery -->
    <!-- facility End here -->
    <!-- About Start here -->
    <section class="about">
      <div class="overlay padding-2">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="about-image">
                
              </div>
            </div>
            <div class="col-md-6">
              
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- about -->
    <!-- About End here -->
@endsection
 @push('scripts')
  <script>
    $('#category').change(function(event) {
      $.ajax({
        url: '{{ route('front.gallery.show') }}',
        type: 'get',
        
        data: {id: $('#category').val(),center_id: $('#center').val()},
      })
      .done(function(response) {
        $('.gallery').html(response);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    });
       $('#center').change(function(event) {
      $.ajax({
        url: '{{ route('front.gallery.show') }}',
        type: 'get',
        
        data: {id: $('#category').val(),center_id: $('#center').val()},
      })
      .done(function(response) {
        $('.gallery').html(response);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    });
  </script>
 @endpush


 
