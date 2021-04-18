<?php


namespace App\Modules\Auth\Repositories;

use App\Modules\Auth\Models\User;
use Illuminate\Http\Request;

class AuthRepository
{
    /**
     * @var User
     */
    protected User $model;

    /**
     * AuthRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        $this->model->first_name = $request->get('first_name');
        $this->model->last_name = $request->get('last_name');
        $this->model->role = User::ROLE_BASIC_USER;
        $this->model->status = User::STATUS_ACTIVE;
        $this->model->email = $request->get('email');
        $this->model->password = bcrypt($request->get('password'));

        $this->model->save();
    }
}
