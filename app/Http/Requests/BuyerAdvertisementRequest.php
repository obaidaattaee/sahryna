<?php

namespace App\Http\Requests;

use App\Models\Settings;
use Illuminate\Foundation\Http\FormRequest;

class BuyerAdvertisementRequest extends FormRequest
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
        if(in_array(2 , auth()->user()->roles->pluck('id')->toArray())  && in_array(1 , auth()->user()->roles->pluck('id')->toArray())  && Settings::first()->buyer_subscription == 0 ){
            return [
                "title" => [ 'required' ],
                "description" =>  [ 'required' ],
                "category_id" =>  [ 'required' ],
                "city_id" =>  [ 'required' ],
                "phone" =>  [ 'required' ],
                "imagesFiles" => [ 'required' ],
                "address" => [ 'required' ],
                "publish_date" => [ 'required' ],
                "lat" => [ 'required' ],
                "price" => [ 'required' , 'integer' ],
                "long" => [ 'required' ],
            ] ;
        }else{

        return [
            "title" => [ 'required' ],
            "description" =>  [ 'required' ],
            "category_id" =>  [ 'required' ],
            "city_id" =>  [ 'required' ],
            "phone" =>  [ 'required' ],
            "subscription_id" => [ 'required' ,'exists:subscriptions,id' ],
            "imagesFiles" => [ 'required' ],
            "address" => [ 'required' ],
            "publish_date" => [ 'required' ],
            "lat" => [ 'required' ],
            "price" => [ 'required' , 'integer' ],
            "long" => [ 'required' ],
        ] ;

    }
    }

    public function attributes()
    {
        return [
            'category_id' => 'قسم المنتج',
            'city_id' => 'المدينة ',
            'cost' => 'التكلفة',
            'number_of_partners' => 'عدد الشركاء ',
            'retail_price' => 'سعر التفرقة ',
            'wholesale_price' => 'سعر الجملة ',
            'subscription_id' => 'الاشتراك',
            'imagesFiles' => 'صور المنتج  ',
            'address' => 'العنوان   ',
            'delivery_time_id' => 'مدة تسليم المنتج للشركاء',
            'advertisement_type_id' => 'نوع الاعلان',
            'type_of_price' => 'نوع سعر المنتج',
            'publish_date' => 'موعد نشر الاعلان',
            'price' => 'سعر الجملة',

        ];
    }
}
