  @extends('student.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

    <section class="content">
     <div class="box">       
        <div class="box-header">
        <ol class="breadcrumb text-left">         
          <li><h4>Gallery </h4></li>
        </ol>
        {{-- <form class="form-horizontal" action="#"  >
          <fieldset>
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-2 control-label" for="name">Title</label>
              <div class="col-md-10">
                <input id="mobile" name="name" type="text" placeholder="Suject" class="form-control">
              </div>
            </div>
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-2 control-label" for="message">Upload Image</label>
              <div class="col-md-10">
                <input id="mobile" name="name" type="file" placeholder="Suject" class="form-control" required>               
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
              </div>
            </div>
          </fieldset>
          </form> --}}

      </div>
       
          <!-- Trigger the modal with a button -->
         <div class="box">
           <section class="gallery padding-120">
                  <div class="container">
                     <div class="gallery-items">
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_0085.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="images/gallery/DSC_0085.jpg" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item -->     
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_0127.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_0127.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_0129.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_0129.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_0206.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_0206.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_3117.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3117.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_3220.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3220.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_3241.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3241.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_3338.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3338.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_3350.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3350.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_3358.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3358.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_3377.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3377.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        <div class="gallery-item branding packing">
                          <div class="gallery-image">
                            <img src="{{ asset('images/gallery-img/DSC_3458.jpg') }}" style="height:240px;width: 358px; " alt="dance" class="img-responsive thumbnail">
                            <div class="gallery-overlay"> </div>
                            <div class="gallery-content">
                              <a href="{{ asset('images/gallery/DSC_3458.jpg') }}" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>                               
                            </div>
                          </div>
                        </div><!-- gallery item --> 
                        

                  </div><!-- container -->
                </section><!-- gallery -->
    </section>
    <!-- /.content -->
   
@endsection
@push('links')
 
@endpush
 @push('scripts')
 
  
@endpush

 