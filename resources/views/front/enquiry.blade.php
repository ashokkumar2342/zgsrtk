@extends('front.layout.main')
@push('links')
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
@endpush
@section('body')

    <!-- Page Header Start here -->
    <section class="page-header" style="background-image: url('{{ asset('images/background/contact.jpg') }}');">
      <div class="overlay">
        <div class="container">
          <h3>&nbsp;</h3>          
        </div><!-- container -->
      </div><!-- overlay -->
    </section><!-- page header -->
    <!-- Page Header End here -->
     <!-- Page Header Start here -->
    <!-- Contact Start here -->
    <section class="contact contact-page">
      <div class="contact-details" style="padding:40px;">
        <div class="container">
        <h4>Enquiry</h4>
          <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul>
                             <li class="contact-item">
                               <span class="icon flaticon-signs"></span>
                               <div class="content">
                                 <h5 style="color:#e84b3a; ">School Campus: Play Wing</h5>
                                 <p>Zad Eduplex, HUDA Complex, Rohtak-124001(Hr.) <br> Mob: +91-8397068001</p>
                               </div>
                             </li>
                             <li class="contact-item">
                               <span class="icon flaticon-signs"></span>
                               <div class="content">
                                 <h5 style="color:#e84b3a; ">School Campus: Senior Wing</h5>
                                 <p>Zad Global School, 8th Mile Stone, Rohtak-Jind Road, N.H. 71, Rohtak-124001(Hr.) <br> Mob: +91-8570006662</p>
                               </div>
                             </li>
                            <li class="contact-item">
                             <span class="icon flaticon-signs"></span>
                             <div class="content">
                               <h5 style="color:#e84b3a; ">School Campus: OMAXE CIty</h5>
                               <p>Zad Global School, OMAXE CIty, Delhi Road Rohtak -124001(Hr.) <br> Mob: +91-8295300441</p>
                             </div>
                           </li>
                             <li class="contact-item">
                               <span class="icon flaticon-message"></span>
                               <div class="content">
                                 <h5 style="color: #fc7f0c;">Email Address</h5>
                                 <p>zgsrtk1@gmail.com</p>
                               </div>
                             </li>
                           </ul>
            </div>
            <div class="col-md-8 col-sm-6 col-xs-12">
        <div class="well well-sm">
          <form class="form-horizontal" action="{{ route('front.enquiry.post') }}" method="post">
          <fieldset>
            <legend class="text-center">Enquiry</legend>
              {!! csrf_field() !!}
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Child Name</label>
              <div class="col-md-9">
                <input id="mobile" name="name" type="text"   class="form-control" required>
                <p class="text-danger">{{ $errors->first('name') }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Father's Name</label>
              <div class="col-md-9">
                <input id="father" name="father_name" type="text"   class="form-control" required>
                <p class="text-danger">{{ $errors->first('father_name') }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="Mobile">Mobile</label>
              <div class="col-md-9">
                <input id="name" name="mobile" type="text"   class="form-control" required>
                <p class="text-danger">{{ $errors->first('mobile') }}</p>
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" class="form-control" >
                <p class="text-danger">{{ $errors->first('email') }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="Mobile">Address</label>
              <div class="col-md-9">
                <input id="name" name="address" type="text"  class="form-control" required>
                <p class="text-danger">{{ $errors->first('address') }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="state">State</label>
              <div class="col-md-9">
                <input id="name" name="state" type="text"   class="form-control" required>
                <p class="text-danger">{{ $errors->first('state') }}</p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="Mobile">City</label>
              <div class="col-md-9">
                <input id="name" name="city" type="text"   class="form-control" required>
                <p class="text-danger">{{ $errors->first('city') }}</p>
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5" required></textarea>
             <p class="text-danger">{{ $errors->first('message') }}</p>

              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
   
            </div>
          </div><!-- row -->
        </div><!-- container -->
      </div><!-- contact-details -->
    <div >
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6986.265796730783!2d76.58055703590405!3d28.894398624352345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c75e3cd94e033f2!2sZad+Eduplex+School!5e0!3m2!1sen!2sin!4v1507030634466" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    </section>
    <!-- Contact End here -->


  

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
 
