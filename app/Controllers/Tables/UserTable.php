<?php

namespace App\Controllers\Tables;

use App\Controllers\Api\Auth;
use App\Models\Role;
use App\Traits\Grocery;

class UserTable
{
    use Grocery;

    protected $hidden = ['companies_id'];
    protected $columns = ['username', 'name','email', 'password'];

    protected function relations()
    {
        $this->crudTable->setRelation('companies_id', 'companies', 'company');
    }

    protected function rules()
    {
        $this->crudTable->uniqueFields(['username']);
    }

    protected function fieldType()
    {
        $this->crudTable->fieldType('password', 'password');
        $this->crudTable->setFieldUpload('photo', 'assets/upload/images', '/assets/upload/images');
    }

    protected function callback()
    {
        if (session('user')->role_id == 2) {
            $role = new Role();
            $roles = $role->select(['id', 'name'])
                ->whereNotIn('id', [1, 2, 4, 5, 6])
                ->whereIn('id', [3, 7, 10])
                ->orWhereIn('companies_id', [Auth::querys()->companies_id])
                ->get()
                ->getResult();

            $rolesData = [];
            foreach ($roles as $rol) {
                $rolesData[(string) $rol->id] = $rol->name;
            }
            $this->crudTable->fieldType('role_id','dropdown', $rolesData);
            $this->crudTable->where(['companies_id' => session('user')->companies_id]);
            $this->crudTable->callbackAddForm(function ($data) {
                $data['companies_id'] = session('user')->companies_id;
                return $data;
            });

        }else if(session('user')->role_id == 1){
            $this->crudTable->setRelation('role_id', 'roles', 'name' );
        }

        $this->crudTable->callbackBeforeInsert(function ($stateParameters) {
            $stateParameters->data['password'] = password_hash($stateParameters->data['password'], PASSWORD_DEFAULT);
            return $stateParameters;
        });

        $this->crudTable->callbackBeforeUpdate(function ($stateParameters) {
            if (strlen($stateParameters->data['password']) <= 20) {
                $stateParameters->data['password'] = password_hash($stateParameters->data['password'], PASSWORD_DEFAULT);
            }
            return $stateParameters;
        });
    }
}