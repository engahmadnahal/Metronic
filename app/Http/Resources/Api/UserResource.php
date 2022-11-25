<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [
            'code_active_debug' => $this->code_active_debug,
            'id' => $this->id,
            'name' => $this->first_name . ' ' . $this->last_name,
            'date' => $this->created_at->diffForHumans(),
            'birth_date' => $this->birth_date,
            'address' => $this->address,
            'street_name' => $this->street_name,
            'phone_number' => $this->phone_number,
            'flat_number' => $this->flat_number,
            'account_type' => $this->account_type,
            'home_number' => $this->home_number,
            'region_id' => $this->region->name,
            'email' => $this->email,
            'gender' => $this->gender == 'M' ? 'Male' : 'Female',
            'token' => $this->token,
            'token_type' => $this->token_type
            
        ];
    }
}
