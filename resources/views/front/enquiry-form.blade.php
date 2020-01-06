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
            <div class="col-lg-12 ">                  
                {{ Form::open(['route'=>'front.enquiry.post2']) }}
                   
                       <div class="row">{{--row start --}}
                          <div class="col-md-12 ">
                              <div class="form-group">
                                  <div class="col-md-12">
                                       <div class="col-lg-4">                         
                                          <div class="form-group">
                                              {{ Form::label('student_name','Child Name',['class'=>' control-label']) }}                         
                                              {{ Form::text('student_name','',['class'=>'form-control required']) }}
                                              <p class="text-danger">{{ $errors->first('student_name') }}</p>
                                          </div>
                                      </div>
                                        <div class="col-lg-4">                         
                                          <div class="form-group">
                                              {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                              {!! Form::select('gender',['male'=>'Male','female'=>'Female'], null, ['class'=>'form-control','placeholder'=>'Select Gender','required']) !!}
                                              <p class="text-danger">{{ $errors->first('gender') }}</p>
                                          </div>
                                      </div>
                                       <div class="col-lg-4">                         
                                          <div class="form-group">
                                              {{ Form::label('date_of_birth','Date of Birth',['class'=>' control-label']) }}      
                                              <div class="input-group">
                                                <div class="input-group-addon">
                                                  <i class="fa fa-calendar"></i>
                                                </div>                   
                                                  {{ Form::text('date_of_birth','',['class'=>'form-control datepicker','required']) }}
                                              </div>
                                             
                                              <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                                          </div>
                                      </div> 
                                     
                                  </div>
                              </div>
                          </div>
                      </div>{{--row end --}} 
                      <div class="row">{{--row start --}}
                         <div class="col-md-12 ">
                             <div class="form-group">
                                 <div class="col-md-12">
                                      
                                      <div class="col-lg-4">                         
                                         <div class="form-group">
                                             {{ Form::label('class','Admission to Class',['class'=>' control-label']) }}
                                             {!! Form::select('class',$classes, null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                             <p class="text-danger">{{ $errors->first('session') }}</p>
                                         </div>
                                     </div>

                                      <div class="col-lg-8">                         
                                         <div class="form-group">
                                             {{ Form::label('school_name','School Name (if already study)',['class'=>' control-label']) }}                         
                                             {{ Form::text('school_name','',['class'=>'form-control required']) }}
                                             <p class="text-danger">{{ $errors->first('school_name') }}</p>
                                         </div>
                                     </div> 
                                          
                                 </div>
                             </div>
                         </div>
                      </div> {{--row end --}}  
                      <div class="row">{{--row start --}}<hr>
                         <div class="col-md-12 ">
                             <div class="form-group">
                                 <div class="col-md-12">
                                    <p>Real Brother / Sister</p>
                                      <div class="col-lg-3">                         
                                         <div class="form-group">
                                             {{ Form::label('r_name',' Name 1',['class'=>' control-label']) }}                         
                                             {{ Form::text('r_name','',['class'=>'form-control required']) }}
                                             <p class="text-danger">{{ $errors->first('r_name') }}</p>
                                         </div>
                                     </div> 
                                      
                                     <div class="col-lg-3">                         
                                         <div class="form-group">
                                             {{ Form::label('r_age',' Age ',['class'=>' control-label']) }}                         
                                             {{ Form::text('r_age','',['class'=>'form-control required']) }}
                                             <p class="text-danger">{{ $errors->first('r_age') }}</p>
                                         </div>
                                     </div> 
                                      <div class="col-lg-3">                         
                                         <div class="form-group">
                                             {{ Form::label('school_attending',' School Attending/Attended ',['class'=>' control-label']) }}                         
                                             {{ Form::text('school_attending','',['class'=>'form-control required']) }}
                                             <p class="text-danger">{{ $errors->first('school_attending') }}</p>
                                         </div>
                                     </div> 
                                      <div class="col-lg-3">                         
                                         <div class="form-group">
                                             {{ Form::label('r_class','Class',['class'=>' control-label']) }}
                                             {!! Form::select('r_class',$classes, null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                             <p class="text-danger">{{ $errors->first('r_class') }}</p>
                                         </div>
                                     </div> 
                                      <div class="col-lg-3">                         
                                         <div class="form-group">
                                             {{ Form::label('r_name',' Name 2',['class'=>' control-label']) }}                         
                                             {{ Form::text('r_name2','',['class'=>'form-control required']) }}
                                             <p class="text-danger">{{ $errors->first('r_name') }}</p>
                                         </div>
                                     </div> 
                                      
                                     <div class="col-lg-3">                         
                                         <div class="form-group">
                                             {{ Form::label('r_age2',' Age ',['class'=>' control-label']) }}                         
                                             {{ Form::text('r_age2','',['class'=>'form-control required']) }}
                                             <p class="text-danger">{{ $errors->first('r_age2') }}</p>
                                         </div>
                                     </div> 
                                      <div class="col-lg-3">                         
                                         <div class="form-group">
                                             {{ Form::label('school_attending2',' School Attending/Attended ',['class'=>' control-label']) }}                         
                                             {{ Form::text('school_attending2','',['class'=>'form-control required']) }}
                                             <p class="text-danger">{{ $errors->first('school_attending2') }}</p>
                                         </div>
                                     </div> 
                                      <div class="col-lg-3">                         
                                         <div class="form-group">
                                             {{ Form::label('r_class2','Class',['class'=>' control-label']) }}
                                             {!! Form::select('r_class2',$classes, null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                             <p class="text-danger">{{ $errors->first('r_class2') }}</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                      </div> {{--row end --}} <hr>
                      <div class="row">{{--row start --}}
                          <div class="col-md-12 ">

                              <div class="form-group">
                                  <div class="col-md-12">
                                        <div class="col-lg-3">                         
                                           <div class="form-group">
                                               {{ Form::label('father_name','Father Name',['class'=>' control-label']) }}                         
                                               {{ Form::text('father_name','',['class'=>'form-control required']) }}
                                               <p class="text-danger">{{ $errors->first('father_name') }}</p>
                                           </div>
                                       </div>
                                        <div class="col-lg-3">                         
                                           <div class="form-group">
                                               {{ Form::label('father_qualification','Qualification',['class'=>' control-label']) }}                         
                                               {{ Form::text('father_qualification','',['class'=>'form-control required']) }}
                                               <p class="text-danger">{{ $errors->first('father_qualification') }}</p>
                                           </div>
                                       </div>
                                         <div class="col-lg-3">                         
                                           <div class="form-group">
                                               {{ Form::label('f_occupation','Occupation',['class'=>' control-label']) }}
                                               {!! Form::select('f_occupation',['private'=>'Private','govt'=>'Govt.','business'=>'Business'], null, ['class'=>'form-control','placeholder'=>'Select Occupation','required']) !!}
                                               <p class="text-danger">{{ $errors->first('f_occupation') }}</p>
                                           </div>
                                       </div>
                                        <div class="col-lg-3">                         
                                           <div class="form-group">
                                               {{ Form::label('f_income','Income',['class'=>' control-label']) }}                         
                                               {{ Form::text('f_income','',['class'=>'form-control required']) }}
                                              <p class="text-danger">{{ $errors->first('f_income') }}</p >
                                              </div>
                                          </div>
                                           <div class="col-lg-3">                         
                                              <div class="form-group">
                                                  {{ Form::label('mother_name','Mother Name',['class'=>' control-label']) }}                         
                                                  {{ Form::text('mother_name','',['class'=>'form-control required']) }}
                                                  <p class="text-danger">{{ $errors->first('mother_name') }}</p>
                                              </div>
                                          </div>
                                           <div class="col-lg-3">                         
                                              <div class="form-group">
                                                  {{ Form::label('mother_qualification','Qualification',['class'=>' control-label']) }}                         
                                                  {{ Form::text('mother_qualification','',['class'=>'form-control required']) }}
                                                  <p class="text-danger">{{ $errors->first('mother_qualification') }}</p>
                                              </div>
                                          </div>
                                            <div class="col-lg-3">                         
                                              <div class="form-group">
                                                  {{ Form::label('m_occupation','Occupation',['class'=>' control-label']) }}
                                                  {!! Form::select('m_occupation',['private'=>'Private','govt'=>'Govt.','business'=>'Business'], null, ['class'=>'form-control','placeholder'=>'Select Occupation','required']) !!}
                                                  <p class="text-danger">{{ $errors->first('m_occupation') }}</p>
                                              </div>
                                          </div>
                                           <div class="col-lg-3">                         
                                              <div class="form-group">
                                                  {{ Form::label('m_income','Income',['class'=>' control-label']) }}                         
                                                  {{ Form::text('m_income','',['class'=>'form-control required']) }}
                                                 <p class="text-danger">{{ $errors->first('m_income') }}</p >
                                                 </div>
                                             </div>
                                      </div>
                                  </div>
                              </div>
                           </div> {{--row end --}} <hr>
                          
                       <div class="row">{{--row start --}}
                          <div class="col-md-12 ">
                              <div class="form-group">
                                  <div class="col-md-12">
                                       <div class="col-lg-4">                         
                                          <div class="form-group">
                                              {{ Form::label('address','Address',['class'=>'control-label']) }}
                                               {{ Form::textarea('address','',['class'=>'form-control','rows'=>2  ,'style'=>'resize:none']) }}
                                               <p class="text-danger">{{ $errors->first('address') }}</p>
                                          </div>
                                      </div>
                                       <div class="col-lg-2">                         
                                          <div class="form-group">
                                              {{ Form::label('state','State',['class'=>' control-label']) }}
                                              {!! Form::text('state', '', ['class'=>'form-control','placeholder'=>'Select State','required']) !!}
                                              <p class="text-danger">{{ $errors->first('state') }}</p>
                                          </div>
                                      </div>
                                      <div class="col-lg-2">                         
                                          <div class="form-group">
                                              {{ Form::label('city','City',['class'=>' control-label']) }}
                                              {!! Form::text('city','', ['class'=>'form-control','placeholder'=>'Select City','required']) !!}
                                              <p class="text-danger">{{ $errors->first('city') }}</p>
                                          </div>
                                      </div>
                                       <div class="col-lg-4">                         
                                          <div class="form-group">
                                              {{ Form::label('pincode','Pincode',['class'=>' control-label']) }}                         
                                              {{ Form::text('pincode','',array('class' => 'form-control' )) }}
                                              <p class="text-danger">{{ $errors->first('pincode') }}</p>
                                          </div>
                                      </div>  
                                  </div>
                              </div>
                          </div>
                      </div> {{--row end --}}    
                          <div class="row">{{--row start --}}
                              <div class="col-md-12 "> 
                                 <div class="col-lg-3">                         
                                    <div class="form-group">
                                        {{ Form::label('tele','Tele Number',['class'=>' control-label']) }}                         
                                        {{ Form::text('tele','',['class'=>'form-control required']) }}
                                        <p class="text-danger">{{ $errors->first('tele') }}</p> 
                                    </div>
                                </div>
                                 <div class="col-lg-3">                         
                                    <div class="form-group">
                                        {{ Form::label('mobile','Contact Mobile Number',['class'=>' control-label']) }}                         
                                        {{ Form::text('mobile','',['class'=>'form-control required']) }}
                                        <p class="text-danger">{{ $errors->first('mobile') }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-3">                         
                                    <div class="form-group">
                                        {{ Form::label('whatsapps','WhatsApp Number ',['class'=>' control-label']) }}                         
                                        {{ Form::text('whatsapps','',['class'=>'form-control required']) }}
                                        <p class="text-danger">{{ $errors->first('whatsapps') }}</p>

                                    </div>
                                </div>
                                 <div class="col-lg-3">                         
                                    <div class="form-group">
                                        {{ Form::label('email','Email Id ',['class'=>' control-label']) }}                         
                                        {{ Form::text('email','',['class'=>'form-control required']) }}
                                        <p class="text-danger">{{ $errors->first('email') }}</p>

                                    </div>
                                </div> 
                                 
                                    <div class="col-lg-4">                         
                                      <div class="form-group">
                                          {{ Form::label('transport','Transport',['class'=>' control-label']) }}
                                          {!! Form::select('transport',['yes'=>'Yes','no'=>'No'], null, ['class'=>'form-control','placeholder'=>'Select','required']) !!}
                                          <p class="text-danger">{{ $errors->first('transport') }}</p>
                                      </div>
                                  </div>
                                    <div class="col-lg-8">                         
                                      <div class="form-group">
                                          {{ Form::label('how_did','How did you come  to know about Zad Global School ?',['class'=>' control-label']) }}
                                          {!! Form::select('how_did',['Newspaper'=>'Newspaper','Cable TV'=>'Cable TV','Holding'=>'Holding','Kiosk'=>'Kiosk','Zad Student'=>'Zad Student','Mkt. Executive'=>'Mkt. Executive','Zad Staff Member'=>'Zad Staff Member','Other'=>'Other',], null, ['class'=>'form-control','placeholder'=>'Select','required']) !!}
                                          <p class="text-danger">{{ $errors->first('how_did') }}</p>
                                      </div>
                                  </div>
                                  <p>If any of Your Friend's / Relative's Child who is already studying/studied in ZAD Global School.</p>
                                   <div class="col-lg-3">   
                                                         
                                      <div class="form-group">
                                          {{ Form::label('relative_name','Name ',['class'=>' control-label']) }}                         
                                          {{ Form::text('relative_name','',['class'=>'form-control required']) }}
                                          <p class="text-danger">{{ $errors->first('relative_name') }}</p>

                                      </div>
                                  </div> 
                                   <div class="col-lg-3">                         
                                      <div class="form-group">
                                          {{ Form::label('relative_class','Class',['class'=>' control-label']) }}
                                          {!! Form::select('class',$classes, null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                          <p class="text-danger">{{ $errors->first('session') }}</p>
                                      </div>
                                  </div>
                                   <div class="col-lg-3">                         
                                      <div class="form-group">
                                          {{ Form::label('year_of_joining','Year of Joining ',['class'=>' control-label']) }}                         
                                          {{ Form::text('year_of_joining','',['class'=>'form-control required']) }}
                                          <p class="text-danger">{{ $errors->first('year_of_joining') }}</p>

                                      </div>
                                  </div> 
                                    <div class="col-lg-3">                         
                                      <div class="form-group">
                                          {{ Form::label('relationship','Relationship ',['class'=>' control-label']) }}                         
                                          {{ Form::text('relationship','',['class'=>'form-control required']) }}
                                          <p class="text-danger">{{ $errors->first('relationship') }}</p>

                                      </div>
                                  </div> 
                                  <p>If any of Your Friend's / Relative's Child is interested to join  ZAD Global School.</p>
                                   <div class="col-lg-6">                         
                                      <div class="form-group">
                                          {{ Form::label('intereseed_name','Name ',['class'=>' control-label']) }}                         
                                          {{ Form::text('intereseed_name','',['class'=>'form-control required']) }}
                                          <p class="text-danger">{{ $errors->first('intereseed_name') }}</p>

                                      </div>
                                  </div>
                                    <div class="col-lg-6">                         
                                      <div class="form-group">
                                          {{ Form::label('intereseed_mobile','Mobile ',['class'=>' control-label']) }}                         
                                          {{ Form::text('intereseed_mobile','',['class'=>'form-control required']) }}
                                          <p class="text-danger">{{ $errors->first('intereseed_mobile') }}</p>

                                      </div>
                                  </div>
                                   <div class="col-lg-6">                         
                                      <div class="form-group">
                                          {{ Form::label('intereseed_name2','Name ',['class'=>' control-label']) }}                         
                                          {{ Form::text('intereseed_name2','',['class'=>'form-control required']) }}
                                          <p class="text-danger">{{ $errors->first('intereseed_name2') }}</p>

                                      </div>
                                  </div>
                                    <div class="col-lg-6">                         
                                      <div class="form-group">
                                          {{ Form::label('intereseed_mobile2','Mobile ',['class'=>' control-label']) }}                         
                                          {{ Form::text('intereseed_mobile2','',['class'=>'form-control required']) }}
                                          <p class="text-danger">{{ $errors->first('intereseed_mobile2') }}</p>

                                      </div>
                                  </div>
                              
                                               
                                           
                                     
                                 </div>
                             </div>
                         </div>

                      </div> {{--row end --}}  
                   

                       <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">Submit</button>
                        </div>
                      </div>

              </div>
                      
                  {{ Form::close() }}
              </div>
          </div>
        </div><!-- container -->
      </div><!-- contact-details -->
   
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
 
