<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $appends = [
        "property_type",
        'transactions',
        'start_year',
        'current_year',
        'arrears',
        'unpaid_years'
    ];

    public function getUnpaidYearsAttribute(){
        $unpaid_years = [];
        $results = [];
        $start_year = $this->getStartYearAttribute();
        $current_year = $this->getCurrentYearAttribute();
        $transactions = $this->getTransactionsAttribute();

        $paid_years = [];

        foreach ($transactions as $transaction){
            array_push($paid_years, $transaction->clearance_for);
        }


        for($i = $start_year+1; $i <= $current_year; $i++){
            array_push($unpaid_years, $i);
        }

        if(count($transactions) == 0){
            return $unpaid_years;
        }


        return array_diff($unpaid_years, $paid_years);

    }



    public function getArrearsAttribute(){
        $amount = $this->attributes['accumulated_bill'] - $this->attributes['payed_bill'];
        return $amount;
    }

    public function getPropertyTypeAttribute(){
        return PropertyType::find($this->attributes['property_type_id'])->name;
    }

    public function getStartYearAttribute(){
        return Carbon::parse($this->attributes['created_at'])->year;
    }

    public function getCurrentYearAttribute(){
        return Carbon::now()->year;
    }

    public function updateState(){
        return $this->processUpdates();
    }

    public function processUpdates(){
        $this->updateAccumulatedBillColumn();
        $this->updatePayedBills();
    }
    public function updateAccumulatedBillColumn(){
        $year_registered = Carbon::parse($this->attributes['created_at'])->year;
        $current_year = Carbon::now()->year;

        if($current_year > $year_registered){
            $years = $current_year - $year_registered;
            $amounts = $years * $this->annual_rate;
            $this->accumulated_bill = $amounts;
            $this->save();
        }else{
            $this->accumulated_bill = 0.00;
            $this->save();
        }

    }

    public function updatePayedBills(){
        $transactions = $this->getTransactionsAttribute();
        if(count($transactions)>0){
            $this->payed_bill = count($transactions) * $this->annual_rate;
            $this->save();
        }else{
            $this->payed_bill = 0.00;
            $this->save();
        }
    }

    public function getTransactionsAttribute(){
        return BillPayment::where('property_id', $this->attributes['id'])->get();
    }
}
