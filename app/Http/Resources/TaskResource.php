<?php

namespace App\Http\Resources;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\ProjectCollection;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'status'=>$this->status,
            'project'=>new ProjectResource ($this->project),
            'employee '=>$this->user->name,
        ];
    }
}
