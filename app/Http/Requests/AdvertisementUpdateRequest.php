<?php

namespace App\Http\Requests;

use App\Models\Settings;
use Illuminate\Foundation\Http\FormRequest;

class AdvertisementUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this['distribute_cost'] = $this['distribute_cost'] ? 1 : 0 ;
        if(in_array(2 , auth()->user()->roles->pluck('id')->toArray())    && Settings::first()->buyer_subscription == 0  || in_array(1 , auth()->user()->roles->pluck('id')->toArray())){
            return [
                "title" => [ 'required' ],
                "description" =>  [ 'required' ],
                "category_id" =>  [ 'required' ],
                "city_id" =>  [ 'required' ],
                "phone" =>  [ 'required' ],
                "cost" => [ 'required' ],
                "number_of_partners" => [ 'required' ],
                "retail_price" => [ 'required' ],
                "wholesale_price" => [ 'required' ],
                "address" => [ 'required' ],
                "delivery_time_id" => [ 'required' ],
                "advertisement_type_id" => [ 'required' ],
                "type_of_price" => [ 'required' ],
                "publish_date" => [ 'required' ],
                "lat" => [ 'required' ],
                "long" => [ 'required' ],
            ] ;
        }else{

        return [
            "title" => [ 'required' ],
            "description" =>  [ 'required' ],
            "category_id" =>  [ 'required' ],
            "city_id" =>  [ 'required' ],
            "phone" =>  [ 'required' ],
            "cost" => [ 'required' ],
            "number_of_partners" => [ 'required' ],
            "retail_price" => [ 'required' ],
            "wholesale_price" => [ 'required' ],
            "subscription_id" => [ 'required' ,'exists:subscriptions,id' ],
            "address" => [ 'required' ],
            "delivery_time_id" => [ 'required' ],
            "advertisement_type_id" => [ 'required' ],
            "type_of_price" => [ 'required' ],
            "publish_date" => [ 'required' ],
            "lat" => [ 'required' ],
            "long" => [ 'required' ],
        ] ;
    }
}
}
