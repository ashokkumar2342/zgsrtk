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
            <h4> SUMMER VACATION HOLIDAY HOMEWORK 2019-2020</h4>       
               <table class="table"> 
               
             <thead>
             <tr>  
               <th>Session</th>
               <th>Class Name</th>
            
               <th>Title</th>
               <th width="80px">Action</th>                  
             </tr>
             </thead>    
               <tbody>
                 @foreach (App\HolidayHomeworkFront::where('center_id',3)->where('session_id',3)->orderBy('class_id','asc')->get() as $holidayhomework)
                  <tr> 
                    
                    <td>{{ $holidayhomework->sessions->date or '' }}</td>
                    <td>{{ $holidayhomework->classes->name or '' }}</td>
                   
                    <td>{{ $holidayhomework->title }}</td> 
                    
                    <td align="center">
                 
                        <a class="btn-success btn-xs"  href="{{ asset('uploads/holidayhomework/'.$holidayhomework->holiday_homework) }}" target="blank"  ><i class="fa fa-download"></i></a>
                     
                    </td> 
                  </tr>
                  @endforeach
                  </tbody>
                
                
              
             
                              
                </tbody>                 
              </table>          
               
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

