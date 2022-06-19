<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'reporter'  => $this->reporter->frName . ' ' . $this->reporter->lsName,
            'reported'  => $this->reported->frName . ' ' . $this->reported->lsName,
            'content'   => $this->content,
            'reply_at'  => $this->reply_at ?? "",
            'reply'     => $this->reply ?? "",
            'created_At' => $this->created_at,
        ];
    }
}
