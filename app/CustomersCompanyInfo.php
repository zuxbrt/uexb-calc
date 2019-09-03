<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomersCompanyInfo extends Model
{
    protected $table = "customers_company_info";
    protected $fillable = ['company_id','company_address','assignee','customer_id'];
}
