@extends('front.layout.main')
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endpush
@section('body')   
   <!-- Banner Start here -->
   <section class=" container text-center" style="margin-top: 10px;margin-bottom:  10px">
     <div  class="row">
        <a href="{{ route('front.circular') }}" title="Circular">
       <div  class="col-lg-4 bg-primary"  style="background-color: blue">
      
          
       
         <h4 style="color:#fff">School Circulars</h4>
       </div>
        </a>
       <a href="https://smarthubeducation.hdfcbank.com/SmartFees/Landing.action?instId=4762" title="Online Pay" target="_blank">
       <div  class="col-lg-4 bg-info" style="background-color: green">
         <h4 style="color:#fff">Pay Online Fee</h4> 
       </div>
       </a>
       <div  class="col-lg-4 bg-danger"  style="background-color: red">
         <h4 style="color:#fff">Admission Form</h4> 
          
       </div>
       
     </div>
     
   </section>
    <section class="banner banner-two hidden-xs">
      <div class="banner-slider swiper-container">
        <div class="swiper-wrapper">           
          @foreach ($sliders as $slider)  
           <div class="banner-item slide-one swiper-slide">
             <div class="banner-overlay"><img src="{!! url('uploads/'.$slider->image) !!}"  width="1366" height="800px" alt=""></div>
               <div class="container">
                 <div class="banner-content">

                 </div><!-- banner-content -->
               </div><!-- container -->
           </div><!-- slide item --> 
            @endforeach 
        </div><!-- swiper-wrapper -->
        <div class="swiper-pagination"></div>
      </div><!-- swiper-container -->
    </section><!-- banner -->
    <!-- Banner End here -->
   <section class="banner banner-two hidden-lg hidden-md hidden-sm">
      <div class="banner-slider swiper-container">
        <div class="swiper-wrapper">
          @foreach ($sliders as $slider)  
           <div class="banner-item  swiper-slide">
             <img src="{!! url('uploads/'.$slider->image) !!}" class="img-responsive" width="100%" alt="">
           </div><!-- slide item -->                 
            @endforeach
          
            
        </div><!-- swiper-wrapper -->
        <div class="swiper-pagination"></div>
      </div><!-- swiper-container -->
    </section><!-- banner -->
    <!-- Banner End here -->
   
    <section class="facility facility-two" style="background-color: #f9f7f7;">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 thumbnail">
              
                 <h4 style="font-size: 26px;color: #fff;background-color: #ffc000; padding: 10px;"  >Notice</h4>
                 <div >
                 <marquee direction="up" scrollamount="3" onmouseover="this.stop();" onmouseout="this.start();" style="height: 350px;padding: 10px;">
                 @foreach ($news as $new)
                    {{-- expr --}}
                  
                 <p class="bg-warning" style="color:red">  <img src="https://zippy.gfycat.com/DownrightSneakyBrant.gif" style="height:15px;"> {{$new->news}} 
                
                    @if ($new->file!=null)
                        <a class="btn-success btn-xs"  href="{{ asset('uploads/'.$new->file) }}" target="blank"  ><i class="fa fa-download"></i></a> 
                    @endif
                 
                  
                </p>   

                  @endforeach 
                
                                 
                 </marquee>
                  
                
             </div>     
          </div>
          <div class="col-lg-4">
            <div class="container" style="margin-left: 30px">
               
                <div class="facility-item">
                  <div class="front-part">
                    <span class="icon-two "><img src="images/smart.png" style="height: 65px;"></span>
                    <h4>Smart Class Rooms</h4>
                  </div>
                  <div class="back-part">
                    <span class="icon-two  "></span>
                    <h4>Smart Class Rooms</h4>
                    <p>Smart classes use all interactive modules like videos and presentations and these visually attractive methods of teaching becomes appealing to students . </p>
                  </div>
                
              </div><!-- facility items -->
            </div><!-- container -->
            <div class="container" style="margin-left: 30px">
               <div class="facility-item" >
                 <div class="front-part">
                    <span class="icon-two "><img src="images/mini theater.png" style="height: 65px;"></span>
                   <h4>Mini Theater</h4>
                 </div>
                 <div class="back-part">
                   <!-- <span class="icon-two flaticon-avatar"></span> -->
                   <h4>Mini Theater</h4>
                   <p>A theater, theatre or playhouse, is a structure where theatrical works or plays are performed or other performances such as musical concerts may be produced.</p>
                 </div>
               </div><!-- facility item -->
            </div><!-- container -->
          </div>
          <div class="col-lg-4" style="padding-top: 5px">
            
             <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FZAD-Global-School-337867916380217%2F&tabs=timeline&width=370&height=440&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="440px" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="false"></iframe> 
          
        </div>
        
      </div>
    </section>

 


  	<!-- About Start here -->
  	<section class="about about-two padding-120">
  		<div class="container">
  			<div class="row">
        <div class="col-md-12">
            <div class="about-content">
              <h4 style="font-size: 36px;color: #ffc000;">Welcome To ZAD Global School</h4>
              <img src="{{ asset('images/about/about-2.png') }}" align="right" alt="about image" class="img-responsive" style="height: 150px;">

              <p>ZAD Education Society was inaugurated by Hon’ble PADAMSHRI SETH Shrikrishan Das (Ex. Finance Minister, Haryana Govt.) on 18 August 1996</p>
              <p>Now ZAD Education Society has reached the dizzy heights of success, after nurturing thousands of students and helping them to realize their cherished goals. It has become a house hold name through the length and breadth of the country. ZAD has always been on the path of steady and continuous growth since its inception. The institute is one of its kind with the objective of excellence, innovation and commitment. We encourage an active approach to learn and make the dreams into a breath talking reality.</p>
            <ul>
              <li><a href="{{ route('front.about') }}" class="button-default">Read More</a></li>
            </ul>
            </div><!-- about content -->
          </div>
  				 
         
  				
  			</div><!-- row -->
  		</div><!-- container -->
  	</section><!-- about -->
  	<!-- About End here -->


    <!-- Achievements Start here -->
    <section class="achievements">
      <div class="overlay padding-120">
        <div class="container">
          <div class="row">
                <div class="col-md-3 col-sm-3 col-12">
                  <div class="achievement-item">
                    <i class="icon "><img src="images/student.png"></i>
                    <span class="counter">1552</span><span>+</span>
                    <p>Total Students</p>
                  </div><!-- achievement item -->
                </div>
                <div class="col-md-3 col-sm-3 col-12">
                  <div class="achievement-item">
                    <i class="icon "><img src="images/teacher.png"></i>
                    <i class="icon  "></i>
                    <span class="counter">70</span>
                    <p>Class Rooms</p>
                  </div><!-- achievement item -->
                </div>
                <div class="col-md-3 col-sm-3 col-12">
                  <div class="achievement-item">
                    <i class="icon "><img src="images/bus.png"></i>
                    <i class="icon "></i>
                    <span class="counter">42</span><span>+</span>
                    <p>Schools bus</p>
                  </div><!-- achievement item -->
                </div>
                <div class="col-md-3 col-sm-3 col-12">
                  <div class="achievement-item">
                    <i class="icon "><img src="images/teacher-icon.png"></i>
                    <i class="icon "></i>
                    <span class="counter">125</span><span>+</span>
                    <p>Teachers &amp; Coaches</p>
                  </div><!-- achievement item -->
                </div>
              </div><!-- row -->
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- achievements -->
    <!-- Achievements End here -->


    <!-- Features Start here -->
    <section class="features padding-120">
      <div class="container">
        <div class="section-header">
          <h3>Why Choose ZAD Global School</h3>
          <p>------------------------------------</p>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="features-left">
              <div class="feature-item">
                <div class="icon flaticon-people-1"></div>
                <div class="content">
                  <h4>Art and Craft</h4>
                  <p>Arts and crafts for kids are fun for children and the young-at-heart!  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                </div>
              </div><!-- feature item -->
              <div class="feature-item">
                <div class="icon flaticon-symbols"></div>
                <div class="content">
                  <h4>Smart Class</h4>
                  <p>Smart classes use all interactive modules like videos and presentations and these visually.</p>
                </div>
              </div><!-- feature item -->
              <div class="feature-item">
                <div class="icon flaticon-microphone"></div>
                <div class="content">
                  <h4>Music Room</h4>
                  <p>Music is an art form, social activity or cultural activity whose medium is sound and silence. </p>
                </div>
              </div><!-- feature item -->
            </div><!-- feature left -->
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="feature-image">
              <img src="images/feature.png" alt="feature image" class="img-responsive">
            </div>
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="features-right">
              <div class="feature-item">
                <!-- <div class="icon flaticon-home"></div> -->
                <i class="icon fa fa-desktop" aria-hidden="true"></i>
                <div class="content">
                  <h4>Computer Lab</h4>
                  <p>ZGS has well-furnished Computer labs. Each laboratory is fully equipped with networked PCs. </p>
                </div>
              </div><!-- feature item -->
              <div class="feature-item">
                <div class="icon flaticon-line-chart"></div>
                <div class="content">
                  <h4>Science Lab</h4>
                  <p>Scientific temper is inculcated in each child through exploration, observation & discovery. </p>
                </div>
              </div><!-- feature item -->
              <div class="feature-item">
                <!-- <div class="icon flaticon-signs"></div> -->
                <i class="icon fa fa-leanpub" aria-hidden="true"></i>
                <div class="content">
                  <h4>Library </h4>
                  <p>The School library is a learning resource center in the widest sense as it houses information resources. </p>
                </div>
              </div><!-- feature item -->
            </div><!-- feature left -->
          </div>
        </div><!-- row -->
      </div><!-- container -->
    </section><!-- features -->
    <!-- Features End here -->


  	


  	<!-- Teachers Start here -->
    

<!-- Classes Start here -->
    <section class="classes">
      <div class="container">
        <div class="section-header">
          <h3>Video</h3>
          <p>---------------------------------</p>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/MRQO2OBIipI" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item -->
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">               
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/_u9B-50RUmc" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item -->
          </div>
           <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">               
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/aVjynEQTVeM" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item -->
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">               
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/UYFlH7pIFaI" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item --> 
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">               
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/Wqv-pPMtVlM" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item --> 
          </div>

 
           <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="class-item">
              <iframe width="100%" height="250" src="https://www.youtube.com/embed/BS_J6r0O2Ck" frameborder="0" allowfullscreen></iframe>          
            </div><!-- class item --> 
          </div>
          </div>
        </div><!-- row -->
        <div class="class-button">
          <a href="https://www.youtube.com/channel/UCjWKaM74-ZjKk2p9mVEsf6Q/videos" target="blank" class="button-default">See More </a>
        </div>
      </div><!-- container -->
    </section><!-- classes -->
    <!-- Classes End here -->
     

  	<!-- Gallery Start here -->
  	<section class="gallery gallery-two">
  		<div class="overlay padding-120">
  			<div class="section-header bg">
          <h3>Our School Gallery</h3>
          <p>-------------------------</p>
        </div>

          <div class="gallery-two-items">
            <div class="gallery-item">
              <div class="gallery-image">
                <img src="images/gallery/gallery_07.jpg" alt="gallery image" class="img-responsive">
                <div class="gallery-overlay"><div class="bg"></div></div>
                <div class="gallery-content">
                  <a href="images/gallery/gallery_bg_01.jpg" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>
                 
                  
                </div>
              </div>
            </div><!-- gallery item -->
            <div class="gallery-item">
              <div class="gallery-image">
                <img src="images/gallery/gallery_08.jpg" alt="gallery image" class="img-responsive">
                <div class="gallery-overlay"><div class="bg"></div></div>
                <div class="gallery-content">
                  <a href="images/gallery/8b.jpg" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>
                  
                </div>
              </div>
            </div><!-- gallery item -->
            <div class="gallery-item">
              <div class="gallery-image">
                <img src="images/gallery/gallery_09.jpg" alt="gallery image" class="img-responsive">
                <div class="gallery-overlay"><div class="bg"></div></div>
                <div class="gallery-content">
                  <a href="images/gallery/gallery_09.jpg" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>
                 
                </div>
              </div>
            </div><!-- gallery item -->
            <div class="gallery-item">
              <div class="gallery-image">
                <img src="images/gallery/gallery_10.jpg" alt="gallery image" class="img-responsive">
                <div class="gallery-overlay"><div class="bg"></div></div>
                <div class="gallery-content">
                  <a href="images/gallery/gallery_10.jpg" data-rel="lightcase:myCollection"><i class="icon flaticon-expand"></i></a>
                  
                </div>
              </div>
            </div><!-- gallery item -->
          </div><!-- gallery items -->
          <div class="gallery-button"><a href="{{ route('front.gallery') }}" class="button-default">View More Gallery</a></div>
  		</div><!-- overlay -->
  	</section><!-- gallery -->
  	<!-- Gallery End here -->


  	<!-- Testimonial Start here -->
  	<section class="testimonial padding-120">
  		<div class="container">
  			<div class="section-header">
				<h3>What Parents Say</h3>
				<p>--------------------------</p>
			</div>
			<div class="testimonial-items">
				<div class="testimonial-slider-two swiper-container">
				  <div class="swiper-wrapper">
					<div class="testimonial-item swiper-slide">
					  <div class="testimonial-details">
					  	<p>I openly propose this school to each and every one. I am blissful through the progress my son has made in her first year. The staff is all hospitable and pleasant and it indisputably consider like a family. Whenever there has been a problem it has been dealt with straight away. </p>
					  	<h4>GOURAV ARORA <span></span></h4>
					  	<img src="images/testimonial/testimonial_icon_01.jpg" alt="testimonial icon" class="img-responsive">
					  </div>
					  <div class="testimonial-image">
					  	<img src="images/testimonial/testimonial_01.jpg" alt="client image" class="img-responsive">
					  </div>
					</div><!-- testimonial-item -->
					<div class="testimonial-item swiper-slide">
					  <div class="testimonial-details">
					  	<p>The school report was tremendous and not only told me how my daughter was doing in class and learning, it also gave me information on how she gets on with peers and concentrates which was a real insight. Thank you to all at ZAD</p>
					  	<h4>KRISHAN DAYAL <span></span></h4>
					  	<img src="images/testimonial/testimonial_icon_02.jpg" alt="testimonial icon" class="img-responsive">
					  </div>
					  <div class="testimonial-image">
					  	<img src="images/testimonial/testimonial_01.jpg" alt="client image" class="img-responsive">
					  </div>
					</div><!-- testimonial-item -->
					<div class="testimonial-item swiper-slide">
					  <div class="testimonial-details">
					  	<p>The school is very good. All teachers are friendly and treat the brood similar to they have. The coaching usual is high. My daughter has enhanced her reading and writing skills. Thanks for all assist the school provides. "I am very happy with all my kid’s progress. The school is very caring with any of my anxiety." </p>
					  	<h4>RAJU KUMAR <span></span></h4>
					  	<img src="images/testimonial/testimonial_icon_03.jpg" alt="testimonial icon" class="img-responsive">
					  </div>
					  <div class="testimonial-image">
					  	<img src="images/testimonial/testimonial_01.jpg" alt="client image" class="img-responsive">
					  </div>
					</div><!-- testimonial-item -->
					<div class="testimonial-item swiper-slide">
					  <div class="testimonial-details">
					  	<p>I'm truly delighted by way of how fine my son stepped forward in year 1. He has had hold up when he desired it and I encompassed a considerable upgrading with his reading and Science. Any disquiet or queries are responded hastily by his tutor and my son in fact enjoys coming to school every day."</p>
					  	<h4>NITTIN KATHURIA <span></span></h4>
					  	<img src="images/testimonial/testimonial_icon_01.jpg" alt="testimonial icon" class="img-responsive">
					  </div>
					  <div class="testimonial-image">
					  	<img src="images/testimonial/testimonial_01.jpg" alt="client image" class="img-responsive">
					  </div>
					</div><!-- testimonial-item -->
				  </div><!-- swiper-wrapper -->
				</div><!-- swiper-container -->
	        </div><!-- testimonial-items -->
  		</div><!-- container -->
  	</section><!-- testimonial -->
  	<!-- Testimonial End here -->


    <!-- Blog Start here -->
    <section class="blog">
      <div class="overlay padding-120">
        <div class="container">
          <div class="section-header bg">
            <h3>Events</h3>
            <p>------------------------------</p>
            
          </div>
          <div class="blog-items">
            <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="blog-item">
                  <div class="blog-image">
                    <a href="{{ route('front.smart-class-rooms') }} "><img src="{{ asset('images/blog/blog_01.jpg') }}" alt="blog image" class="img-responsive"></a>
                  </div>
                  <div class="blog-content">
                    <h4><a href="{{ route('front.smart-class-rooms') }}">ZGS Celebrate Garba</a></h4>
                    <p>Deepawali or Diwali is certainly the biggest and the brightest of all Hindu festivals. Historically, the origin of Diwali can be traced back to ancient India, when it was probably an important harvest festival. </p>
                  </div>
                  <ul class="text-center">
                    <li ><a href="{{ route('front.smart-class-rooms') }}">Read More</a></li>
                  </ul>
                </div><!-- blog item -->
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="blog-item">
                  <div class="blog-image">
                    <a href="{{ route('front.diwali') }}"><img src="{{ asset('images/blog/blog_02.jpg') }}" alt="ZGS Celebrate Diwali" class="img-responsive"></a>
                  </div>
                  <div class="blog-content">
                    <h4><a href="{{ route('front.diwali') }}">ZGS Celebrate Diwali</a></h4>
                    <p>Deepawali or Diwali is certainly the biggest and the brightest of all Hindu festivals. ... Historically, the origin of Diwali can be traced back to ancient India, when it was probably an important harvest festival. </p>
                  </div>
                  <ul class="text-center">
                    <li ><a href="{{ route('front.diwali') }}">Read More</a></li>
                  </ul>
                </div><!-- blog item -->
              </div>
              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="blog-item">
                  <div class="blog-image">
                    <a href="{{ route('front.white-day') }}"><img src="{{ asset('images/blog/blog_03.jpg') }}" alt="ZGS Celebrate White Day" class="img-responsive"></a>
                  </div>
                  <div class="blog-content">
                    <h4><a href="{{ route('front.white-day') }}">ZGS Celebrate White Day</a></h4>
                    <p>White is color at its most complete and pure, the color of perfection. The color meaning of white is purity, innocence, wholeness and completion.<br><br></p>

                  </div>
                  <ul class="text-center">
                    <li ><a href="{{ route('front.white-day') }}">Read More</a></li>
                  </ul>
                </div><!-- blog item -->
              </div>

              </div>
            </div><!-- row -->
          </div><!-- blog items -->
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- blog -->
    <!-- Blog End here -->


  	 


  	<!-- Subscribe Start here -->
  	<section class="subscribe subscribe-two">
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12 col-sm-12 col-xs-12">
  					<h3>&#8220;Creativity is the key to Success in the future, and primary education is where teachers can bring ceativity in children at that level&#8221;</h3>
  				</div>
  				 
  			</div><!-- row -->
  		</div><!-- container -->
  	</section><!-- subscribe -->
  	<!-- Subscribe End here -->
@endsection
@push('scripts')

<script type="text/javascript">
// if(getCookie('modal') == ''){
  // $(document).ready(function(){
  //    alert("The paragraph was clicked.");
  //   console.log('dsffd');
  //   $('#myModal').modal(true);
  // });
  // setCookie("modal", 'add', 1);
//}
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(Session::has('message'))
<script type="text/javascript">
    Command: toastr["{{ Session::get('class') }}"]("{{ Session::get('message') }}");
</script> 
@endif
<script type="text/javascript">  
     $(window).load(function(){        
     // $('#myModal').modal('show');
   }); 
   
</script>

@endpush

