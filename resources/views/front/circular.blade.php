 @extends('front.layout.main')
@push('styles')
 
@endpush
@section('body')

   <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/page-header-bg.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h3>&nbsp;</h3>          
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- page header -->
    <!-- Page Header End here -->
    <!-- Page Header End here -->
    <!-- facility Start here -->
    <section class="facility" style="padding-top:50px">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12">
              <h4> Circular</h4>      
                   <table class="table"> 
               
             <thead>
             <tr>   
               <th>Title</th>
               <th>Description</th>
               <th width="80px">Action</th>                  
             </tr>
             </thead>    
               <tbody>
                  @foreach ($circulars as $holidayhomework)
                  <tr>
                 
                   
                    <td>{{ $holidayhomework->title }}</td> 
                    <td>{{ $holidayhomework->body }}</td> 
                    
                    <td align="center">
                 
                        
                        @if ($holidayhomework->file!=null)
                           <a class="btn-success btn-xs"  href="{{ asset('uploads/'.$holidayhomework->file) }}" target="blank"  ><i class="fa fa-download"></i></a>
                        @else
                        
                        @endif
                     
                    </td>
                   
                  </tr>
                  @endforeach
                  </tbody>
                
                 
              
             
                              
                </tbody>                 
              </table>    
               {{ $circulars->links() }}   
               
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 sidebar">                          
                  <div class="sidebar-item">
                    <h3 class="sidebar-title">Quick links</h3>
                    <ul class="sidebar-categories">
                       <li><a href="{{ route('front.holiday-homework') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> H.W Huda Complex</a></li>
                      <li><a href="{{ route('front.holiday-homework2') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>  H.W Jind Road</a></li>
                      <li><a href="{{ route('front.holiday-homework3') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> H.W OMAXE</a></li>          
                    </ul>
                    <br><br>
                    {{-- <img src="{{ asset('images/bb2.jpg') }}" class="thumbnail"> --}}
                  </div><!-- sidebar item -->            
              </div>
        </div><!-- row -->
      </div><!-- container -->
    </section><!-- facility -->
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

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(Session::has('message'))
<script type="text/javascript">
 Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script>
@endif
@endpush

