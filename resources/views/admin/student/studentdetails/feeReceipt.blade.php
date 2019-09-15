


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>

</title>
    <style type="text/css">
        .style1
        {
            width: 184px;
            font-weight: bold;
            font-size: small;
            font-family: "Arial";
        }
        .style4
        {
            width: 891px;
        }
    </style>
</head>
<body>
<br> 
<div>
    @php  
     
    $firstPaymentId =App\StudentFee::where('student_id',$studentFee->student_id)->where('session_id',$studentFee->session_id)->first()->id; 
     @endphp
    <div id="p1" style="font-family:Arial;">    
        <center>
            <table>
                <tr>
                    <td>
                        <div style="width: 450px;">
                            <table width="100%">
                                <tr>
                                    <td colspan="4">
                                        <div style="width: 450px;" align="center">
                                            <img src="{{asset('images/logo.png')}}" alt="" height="50px" /><br />
                                            <span id="lblheader" style="font-family:Arial;font-size:Small;">ZAD Eduplex, HUDA Complex, Tele : +91-8397068001</br>8th km., Jind Road, N.H. 71, Tele : +91-8570006662<br/>OMAXE CIty, Delhi Road Rohtak -124001(Hr.)-+91-8295300441</br>Fee Receipt (Office Copy) Session : {{$studentFee->student->sessions->date}}</span>
                                            <hr />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees0" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Receipt No : </span>
                                    </td>
                                    <td class="style4">
                                        <span id="lblReceiptNo" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{ $studentFee->receipt_no }}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees4" style="font-family:Arial;font-size:Small;text-align: left;">Date :</span>
                                    </td>
                                    <td>
                                        <span id="lblReceiptDate" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->receipt_date}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Student Id : </span>
                                    </td>
                                    <td class="style4">
                                        <span id="lblStudentId" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->username}}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees5" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Class : </span>
                                    </td>
                                    <td>
                                        <span id="lblClass" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->classes->alias}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblStudentName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Name: </span>
                                    </td>
                                    <td>
                                        <span id="lblName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->name}}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees6" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Section:</span>
                                    </td>
                                    <td>
                                        <span id="lblSection" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->sections->name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Father's Name:</span>
                                    </td>
                                    <td>
                                        <span id="lblFather" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->father_name}}</span>
                                    </td>
                                    <td class="style1">
                                        
                                        <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Mother's Name:</span>
                                    </td>
                                    <td>
                                        
                                        <span id="lblMother1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->mother_name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                     <td class="style1">
                                        
                                        <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Month:</span>
                                    </td>
                                    <td>

                                        <span id="lblMother1" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">{{ $studentFee->month_name }}</span> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="width: 450px; margin-top: 10px;">
                             <table width="100%" cellpadding="1">
                                <tr>
                                    <td align="left" style="border-style: solid none solid none; font-weight: bold; font-size: small;">
                                        Particulars
                                    </td>
                                    <td align="right" style="border-style: solid none solid none; font-weight: bold;
                                        font-size: small;">
                                        Amount
                                    </td>
                                </tr>
                               @if($studentFee->id ==$firstPaymentId)
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Registration Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblRegFees" style="font-family:Arial;font-size:Small;">{{$studentFee->registration_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblAdmissionFee" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Admission Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAdmissionFees" style="font-family:Arial;font-size:Small;">{{$studentFee->admission_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblAdmissionFee" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">Admission Form Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAdmissionFees" style="font-family:Arial;font-size:Small;">{{$studentFee->admission_form_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblDevelopmentCharges" style="display:inline-block;font-family:Arial;font-size:Small;width:220px;text-align: left;">Exam/Assign/Sci Lab/Computer</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAnnualCharges" style="font-family:Arial;font-size:Small;">{{$studentFee->annual_charge}}</span>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Tuition Fee (Annual/Quarterly)
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblTutionFees" style="font-family:Arial;font-size:Small;">{{$studentFee->tution_fee}}</span>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Smart Class
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblSmartClass" style="font-family:Arial;font-size:Small;">{{$studentFee->smart_class_fee}}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        SMS/App Charges
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblSMS" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: right;">{{$studentFee->sms_charge}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                       Sports/Activity Charges
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblActivity" style="font-family:Arial;font-size:Small;">{{$studentFee->activity_charge}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Transport Maintenance Charges
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblTransport" style="font-family:Arial;font-size:Small;">{{$studentFee->transport_fee}}</span>
                                    </td>
                                </tr>
                                 <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblCaution" style="display:inline-block;font-family:Arial;font-size:Small;width:220px;text-align: left;">Meal (Annual/Quarterly)</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblCautionMoney" style="font-family:Arial;font-size:Small;">{{$studentFee->caution_money}}</span>
                                    </td>
                                </tr>
                                <tr>
                                <td align="Right" style="font-weight: bold; font-size: small;">
                                    <span id="lblLessLbl" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Previous Balance </span>
                                     </td>
                                    <td align="right" style=" font-size: small;">
                                        <span id="lblLess" style="font-family:Arial;font-size:Small;">{{$studentFee->previous_balance}}</span>
                                    </td>
                                </tr>
                                <tr>
                                <td align="Right" style="font-weight: bold; font-size: small;">
                                    <span id="lblLessLbl" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Late Fee </span>
                                     </td>
                                    <td align="right" style=" font-size: small;">
                                        <span id="lblLess" style="font-family:Arial;font-size:Small;">{{$studentFee->late_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblLateFeeFine" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblFineAmt" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                    </td>
                                    <td align="right" style="font-size: small;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Payable Fee</span>
                                    </td>
                                    <td align="right" style="border-style: solid none none none; font-size: small;">
                                        <span id="lblPayableFees" style="font-family:Arial;font-size:Small;">{{($studentFee->amount_payable + $studentFee->discount)}}</span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount0" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right">
                                        <span id="lblPreviousBalance" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right">
                                        <span id="lblSiblingStaff" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount2" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">Sibling/School Staff/Others Discount (-)</span>
                                    </td>
                                    <td align="right">
                                        <span id="lblOtherDiscount" style="font-family:Arial;font-size:Small;">{{$studentFee->discount}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblLessLbl" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Current Balance </span>
                                    </td>
                                    <td align="right" style=" font-size: small;">
                                        <span id="lblLess" style="font-family:Arial;font-size:Small;">{{$studentFee->balance_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Received Amount </span>
                                    </td>
                                    <td align="right" style="border-style: solid none Solid none; font-size: small;">
                                        <span id="lblNetPaid" style="font-family:Arial;font-size:Small;">{{$studentFee->received_fee}}</span>
                                    </td>
                                </tr>
                                
                            </table>
                            <hr />
                        </div>
                        <div style="width: 450px;" align="Left">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <span id="Label1" style="font-weight: bold;
                                            font-size: small;">Rupees (In Words):</span>
                                        <span id="lblRupee" class="rupees_word" style="font-size: small;"> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="Label2" style="font-weight: bold;
                                            font-size: small;">Cheque no:</span>
                                        <span id="lblChequeNo" style="font-size: small;">{{($studentFee->cheque_no)?$studentFee->cheque_no:'_______'}}</span>
                                        &nbsp;<span id="Label3" style="font-weight: bold;
                                            font-size: small;">Date:</span>
                                        <span id="lblChequeDate" style="font-size: small;">{{($studentFee->bank_name)?$studentFee->bank_name:'__/__/____'}}</span>
                                        &nbsp;<span id="Label4" style="font-weight: bold;
                                            font-size: small;">Bank Name: </span>
                                        <span id="lblbankName" style="font-size: small;">{{($studentFee->cheque_date)?$studentFee->cheque_date:'________'}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                       <span id="Label2" style="font-weight: bold;
                                            font-size: small;">Note: Cheque should be in favour of <b>ZAD EDUCATION SOCIETY</span> 
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <div style="margin-top: 30px;">
                                            <span id="Label5" style="font-size: small;">Auth. Sign.</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div style="width: 50px;">
                        </div>
                    </td>
        <td>
                        <div style="width: 450px;">
                            <table width="100%">
                                <tr>
                                    <td colspan="4">
                                        <div style="width: 450px;" align="center">
                                            <img src="{{asset('images/logo.png')}}" alt="" height="50px" /><br />
                                            <span id="lblheader" style="font-family:Arial;font-size:Small;">ZAD Eduplex, HUDA Complex, Tele : +91-8397068001</br>8th km., Jind Road, N.H. 71, Tele : +91-8570006662<br/>OMAXE CIty, Delhi Road Rohtak -124001(Hr.)-+91-8295300441</br>Fee Receipt (Parents Copy) Session : {{$studentFee->student->sessions->date}}</span>
                                            <hr />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees0" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Receipt No : </span>
                                    </td>
                                    <td class="style4">
                                        <span id="lblReceiptNo" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{ $studentFee->receipt_no }}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees4" style="font-family:Arial;font-size:Small;text-align: left;">Date :</span>
                                    </td>
                                    <td>
                                        <span id="lblReceiptDate" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->receipt_date}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Student Id : </span>
                                    </td>
                                    <td class="style4">
                                        <span id="lblStudentId" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->username}}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees5" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Class : </span>
                                    </td>
                                    <td>
                                        <span id="lblClass" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->classes->alias}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblStudentName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Name: </span>
                                    </td>
                                    <td>
                                        <span id="lblName" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->name}}</span>
                                    </td>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees6" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Section:</span>
                                    </td>
                                    <td>
                                        <span id="lblSection" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->sections->name}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Father's Name:</span>
                                    </td>
                                    <td>
                                        <span id="lblFather" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->father_name}}</span>
                                    </td>
                                    <td class="style1">
                                        
                                        <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Mother's Name:</span>
                                    </td>
                                    <td>
                                        
                                        <span id="lblMother1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">{{$studentFee->student->mother_name}}</span>
                                    </td>
                                </tr>
                                   <tr>
                                     <td class="style1">
                                        
                                        <span id="lblRegistraionFees7" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Month:</span>
                                    </td>
                                    <td>

                                        <span id="lblMother1" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">{{ $studentFee->month_name }}</span> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div style="width: 450px; margin-top: 10px;">
                             <table width="100%" cellpadding="1">
                                <tr>
                                    <td align="left" style="border-style: solid none solid none; font-weight: bold; font-size: small;">
                                        Particulars
                                    </td>
                                    <td align="right" style="border-style: solid none solid none; font-weight: bold;
                                        font-size: small;">
                                        Amount
                                    </td>
                                </tr>
                                @if($studentFee->id ==$firstPaymentId)
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblRegistraionFees" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Registration Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblRegFees" style="font-family:Arial;font-size:Small;">{{$studentFee->registration_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblAdmissionFee" style="display:inline-block;font-family:Arial;font-size:Small;width:220px;text-align: left;">Admission Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAdmissionFees" style="font-family:Arial;font-size:Small;">{{$studentFee->admission_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblAdmissionFee" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">Admission Form Fee</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAdmissionFees" style="font-family:Arial;font-size:Small;">{{$studentFee->admission_form_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblDevelopmentCharges" style="display:inline-block;font-family:Arial;font-size:Small;width:220px;text-align: left;">Exam/Assign/Sci Lab/Computer</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblAnnualCharges" style="font-family:Arial;font-size:Small;">{{$studentFee->annual_charge}}</span>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Tuition Fee (Annual/Quarterly)
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblTutionFees" style="font-family:Arial;font-size:Small;">{{$studentFee->tution_fee}}</span>
                                    </td>
                                </tr>
                             
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Smart Class
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblSmartClass" style="font-family:Arial;font-size:Small;">{{$studentFee->smart_class_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        SMS/App Charges
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblSMS" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: right;">{{$studentFee->sms_charge}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                       Sports/Activity Charges
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblActivity" style="font-family:Arial;font-size:Small;">{{$studentFee->activity_charge}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        Transport Maintenance Charges
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblTransport" style="font-family:Arial;font-size:Small;">{{$studentFee->transport_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblCaution" style="display:inline-block;font-family:Arial;font-size:Small;width:220px;text-align: left;">Meal (Annual/Quarterly)</span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblCautionMoney" style="font-family:Arial;font-size:Small;">{{$studentFee->caution_money}}</span>
                                    </td>
                                </tr>
                                <tr>
                                <td align="Right" style="font-weight: bold; font-size: small;">
                                    <span id="lblLessLbl" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Previous Balance </span>
                                     </td>
                                    <td align="right" style=" font-size: small;">
                                        <span id="lblLess" style="font-family:Arial;font-size:Small;">{{$studentFee->previous_balance}}</span>
                                    </td>
                                </tr>
                                   <tr>
                                <td align="Right" style="font-weight: bold; font-size: small;">
                                    <span id="lblLessLbl" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Late Fee </span>
                                     </td>
                                    <td align="right" style=" font-size: small;">
                                        <span id="lblLess" style="font-family:Arial;font-size:Small;">{{$studentFee->late_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                        <span id="lblLateFeeFine" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right" style="font-size: small;">
                                        <span id="lblFineAmt" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-weight: bold; font-size: small;">
                                    </td>
                                    <td align="right" style="font-size: small;">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount1" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Payable Fee</span>
                                    </td>
                                    <td align="right" style="border-style: solid none none none; font-size: small;">
                                        <span id="lblPayableFees" style="font-family:Arial;font-size:Small;">{{($studentFee->amount_payable + $studentFee->discount)}}</span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount0" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right">
                                        <span id="lblPreviousBalance" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;"></span>
                                    </td>
                                    <td align="right">
                                        <span id="lblSiblingStaff" style="font-family:Arial;font-size:Small;"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount2" style="display:inline-block;font-family:Arial;font-size:Small;text-align: left;">Sibling/School Staff/Others Discount (-)</span>
                                    </td>
                                    <td align="right">
                                        <span id="lblOtherDiscount" style="font-family:Arial;font-size:Small;">{{$studentFee->discount}}</span>
                                    </td>
                                </tr>
                                 <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblLessLbl" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Current Balance </span>
                                    </td>
                                    <td align="right" style=" font-size: small;">
                                        <span id="lblLess" style="font-family:Arial;font-size:Small;">{{$studentFee->balance_fee}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="Right" style="font-weight: bold; font-size: small;">
                                        <span id="lblSSDiscount3" style="display:inline-block;font-family:Arial;font-size:Small;width:120px;text-align: left;">Received Amount </span>
                                    </td>
                                    <td align="right" style="border-style: solid none Solid none; font-size: small;">
                                        <span id="lblNetPaid" style="font-family:Arial;font-size:Small;">{{$studentFee->received_fee}}</span>
                                    </td>
                                </tr>
                               
                            </table>
                            <hr />
                        </div>
                        <div style="width: 450px;" align="Left">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <span id="Label1" style="font-weight: bold;
                                            font-size: small;">Rupees (In Words):</span>
                                        <span id="lblRupee" class="rupees_word" style="font-size: small;"> </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span id="Label2" style="font-weight: bold;
                                            font-size: small;">Cheque no:</span>
                                        <span id="lblChequeNo" style="font-size: small;">{{($studentFee->cheque_no)?$studentFee->cheque_no:'_______'}}</span>
                                        &nbsp;<span id="Label3" style="font-weight: bold;
                                            font-size: small;">Date:</span>
                                        <span id="lblChequeDate" style="font-size: small;">{{($studentFee->bank_name)?$studentFee->bank_name:'__/__/____'}}</span>
                                        &nbsp;<span id="Label4" style="font-weight: bold;
                                            font-size: small;">Bank Name: </span>
                                        <span id="lblbankName" style="font-size: small;">{{($studentFee->cheque_date)?$studentFee->cheque_date:'________'}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                       <span id="Label2" style="font-weight: bold;
                                            font-size: small;">Note: Cheque should be in favour of <b>ZAD EDUCATION SOCIETY</span> 
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <div style="margin-top: 30px;">
                                            <span id="Label5" style="font-size: small;">Auth. Sign.</span>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>           
                </tr>
            </table>
        </center>
    
</div>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<script>
    window.onload = function() {
        var word =convertNumberToWords({{$studentFee->received_fee}})
         $('.rupees_word').html(word)
  
    };
    
    function convertNumberToWords(amount) {

        var words = new Array();
        words[0] = '';
        words[1] = 'One';
        words[2] = 'Two';
        words[3] = 'Three';
        words[4] = 'Four';
        words[5] = 'Five';
        words[6] = 'Six';
        words[7] = 'Seven';
        words[8] = 'Eight';
        words[9] = 'Nine';
        words[10] = 'Ten';
        words[11] = 'Eleven';
        words[12] = 'Twelve';
        words[13] = 'Thirteen';
        words[14] = 'Fourteen';
        words[15] = 'Fifteen';
        words[16] = 'Sixteen';
        words[17] = 'Seventeen';
        words[18] = 'Eighteen';
        words[19] = 'Nineteen';
        words[20] = 'Twenty';
        words[30] = 'Thirty';
        words[40] = 'Forty';
        words[50] = 'Fifty';
        words[60] = 'Sixty';
        words[70] = 'Seventy';
        words[80] = 'Eighty';
        words[90] = 'Ninety';
        amount = amount.toString();
        var atemp = amount.split(".");
        var number = atemp[0].split(",").join("");
        var n_length = number.length;
        var words_string = "";
        if (n_length <= 9) {
            var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
            var received_n_array = new Array();
            for (var i = 0; i < n_length; i++) {
                received_n_array[i] = number.substr(i, 1);
            }
            for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                n_array[i] = received_n_array[j];
            }
            for (var i = 0, j = 1; i < 9; i++, j++) {
                if (i == 0 || i == 2 || i == 4 || i == 7) {
                    if (n_array[i] == 1) {
                        n_array[j] = 10 + parseInt(n_array[j]);
                        n_array[i] = 0;
                    }
                }
            }
            value = "";
            for (var i = 0; i < 9; i++) {
                if (i == 0 || i == 2 || i == 4 || i == 7) {
                    value = n_array[i] * 10;
                } else {
                    value = n_array[i];
                }
                if (value != 0) {
                    words_string += words[value] + " ";
                }
                if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Crores ";
                }
                if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Lakhs ";
                }
                if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                    words_string += "Thousand ";
                }
                if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                    words_string += "Hundred and ";
                } else if (i == 6 && value != 0) {
                    words_string += "Hundred ";
                }
            }
            words_string = words_string.split("  ").join(" ");
        }
        return words_string;
    }
</script>
</body>
</html>


