<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
{
    private $token = null;
    public function __construct($resource, $token = null)
    {
        $this->token = $token;
        parent::__construct($resource);
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (isset($this->token)) {
            $role = new RolesResource($this->roles);

            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'token' => $this->token,
                'banned_until' => $this->banned_until,
                'role' => $role,
            ];
        } else {
            $role = new RolesResource($this->roles);

            return [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'banned_until' => $this->banned_until,
                'role' => $role,
            ];
        }
    }
}
