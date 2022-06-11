<?php

namespace App\Http\Resources;

use App\Constants\Gender;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'age' => Carbon::parse($this->birth_date)->diff(Carbon::now())->y,
            'frName' => $this->frName,
            'lsName' => $this->lsName,
            'FaName' => $this->frName . ' ' . $this->lsName,
            // 'idNumber' => $this->idNumber,
            'images' => ImageResource::collection($this->images),
            'is_login' => $this->is_login,
            'gender' => $this->gender == Gender::MALE ? 'ذكر' : 'أنثى',
            'is_block' => $this->is_block,
            'is_wait' => $this->is_wait,
            'phone_Code' => $this->phone_Code ?? "",
            'phone' => $this->phone ?? "",
            'country_id' => $this->country_id ?? "",
            'gov_id' => $this->gov_id ?? "",
            'city_id' => $this->city_id ?? "",
            'about_you' => $this->about_you ?? "",
            'about_partner' => $this->about_partner ?? "",
            'country' => $this->country->ar_title ?? "",
            'city' => $this->city->name ?? "",
            'religion' => $this->religion->name ?? "",
            'district' => $this->district->name ?? "",
            'education' => $this->education->name ?? "",
            'universty' => $this->universty->name ?? "",
            'college' => $this->college->name ?? "",
            'birth_date' => $this->birth_date ?? "",
            'info' => $this->answers()->get()->groupBy('category_id')->map(function ($item, $key) {
                return [
                    'category_id' => $key,
                    'category_name' => Category::find($key)->name,
                    'answers' => UserAnswersResource::collection($item),
                ];
            })->toArray(),

        ];
    }
}
