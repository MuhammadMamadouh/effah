<?php

namespace App\Http\Resources;

use App\Constants\Gender;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexUsersResource extends JsonResource
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
            'gender' => $this->gender == Gender::MALE ? 'male' : 'female',
            'is_block' => $this->is_block,
            'is_wait' => $this->is_wait,
            'phone_Code' => $this->phone_Code ?? "",
            'phone' => $this->phone ?? "",
            'country' => $this->country->name ?? "",
            'city' => $this->city->name ?? "",
            'religion' => $this->religion->name ?? "",
            'about_you' => $this->about_you ?? "",
            'about_partner' => $this->about_partner ?? "",
            'district' => $this->district->name ?? "",
            'education' => $this->education->name ?? "",
            'universty' => $this->universty->name ?? "",
            'college' => $this->college->name ?? "",
            'birth_date' => $this->birth_date ?? "",
        ];
    }
}
