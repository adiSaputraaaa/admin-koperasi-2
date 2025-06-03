<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfilResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'accountId' => $this->account_id,
            'cooperativesId' => $this->cooperatives_id,
            'fullName' => $this->full_name,
            'gender' => $this->gender,
            'address' => $this->address,
            'urlPhotoProfil' => $this->url_photo_profil,
            'phone' => $this->phone,
            'birthDate' => $this->birth_date,
            'birthDatePlace' => $this->birth_date_place,
            'diploma' => $this->diploma,
            'nik' => $this->nik,
            'urlFileKtp' => $this->url_file_ktp,
            'kk' => $this->kk,
            'urlFileKk' => $this->url_file_kk,
            'salary' => $this->salary,
            // 'cooperatives' => new CooperativesResource($this->whenLoaded('cooperatives')),
        ];
    }
}
