@extends('front.layout.main')
@push('styles') 
@endpush
@section('body')
    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/mission.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h3>&nbsp;</h3>          
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- page header -->
    <!-- Page Header End here -->
      <!-- facility Start here -->
    <section class="facility" style="padding-top:50px">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-sm-9 col-xs-12">
             <h4>Our Mission</h4>
              <p align="justify">We embark on the mission of creating individuals who are confident about their potential and are goal oriented, sensitive to their environment and above all, co-creators of their own destiny. Our aim is to help children realize their inner strength and give them a conducive environment to grow & evolve as a good social being and a global citizen.</p>
              <p align="justify">Our aim to provide an academic environment which treats each child as a uniquer individual and develops him/her to the maximum potential and to provide a variety of learning experience which promotes integrative growth in all areas, be it physical intellectual, moral, emotional or social.</p>
              <p align="justify">Our mission is to accomplish the vision by facilitating globally advanced, innovative and highly customized knowledge products and solutions for every local market across the globe. Shriram New Horizons is determined and exclusively focused on education through skill building.</p> 
              <p align="justify">We pursue our mission through concrete and clearly drawn differentiators that include: </p> 
              {{-- <img src="{{ asset('images/bb.jpg') }}" align="right" class="thumbnail"> --}}
              <ul style="padding-left: 20px;">
                <li>Breaking the parity with resourceful innovations</li>
                <li>Providing the right environment for all –round excellence</li>
                <li>Providing highly advanced courses by highly experienced faculty</li>
                 
              </ul>
                   <h4>Our Vision</h4>
                   <p justify> 
                    To become a comprehensive education centre with a reputation for excellence in academics, career development and co-curricular programmes, which will act as a model of creative and innovative solutions that meet the changing emotional, physical and educational needs of the students. The community will be enhanced through a variety of social, recreational and cultural activities to ensure the overall growth of the young minds.
                </p>                 
                

              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-12 sidebar">                          
                  <div class="sidebar-item">
                    <h3 class="sidebar-title">Quick links</h3>

                    <ul class="sidebar-categories">
                       
                      <li><a href="{{ route('front.about') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> About Group</a></li>
                      <li><a href="{{ route('front.vision-mission') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Vision and Mission</a></li>
                      <li><a href="{{ route('front.chairman-message') }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Chairman's Message</a></li>                
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

