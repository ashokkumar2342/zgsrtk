<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnlinePaymentHistory extends Model
{
	protected $fillable = [
	    'student_id',
	    'session_id',
	    'total_fees',
	    'other_fee',
	    'discount_type_id',
	    'discount_name',
	    'discount',
	    'receipt_no',
	    'receipt_date',
	    'amount_payable',
	    'cheque_no',
	    'bank_name',
	    'cheque_date',
	    'received_fee',
	    'balance_fee',
	    'installment_fees',
	    'admission_fee',
	    'admission_form_fee',
	    'registration_fee',
	    'annual_charge',
	    'caution_money',
	    'activity_charge',
	    'smart_class_fee',
	    'sms_charge',
	    'tution_fee',
	    'transport_fee',
	    'previous_balance',
	    'late_fee',
	    'month_name',
	    'payment_mode',
	 
	];
    public function student(){
        return $this->hasOne('App\Student','id','student_id');
    }

   
}
