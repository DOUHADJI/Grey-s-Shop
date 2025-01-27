<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\UseCases\UserUseCase;
use Livewire\Component;

class UserController extends Component
{
    protected $userUseCase;

    public function __construct(UserUseCase $userUseCase)
    {
        $this->userUseCase = $userUseCase;
    }

    public function render()
    {
        $users = $this->userUseCase->getAllUsers();
        return view('livewire.users.index', compact('users'));
    }

    public function store(UserCreateRequest $request)
    {
        $this->userUseCase->createUser($request->validated());
        session()->flash('success', 'User created successfully.');
        return redirect()->route('users.index');
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $this->userUseCase->updateUser($id, $request->validated());
        session()->flash('success', 'User updated successfully.');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $this->userUseCase->deleteUser($id);
        session()->flash('success', 'User deleted successfully.');
        return redirect()->route('users.index');
    }
}

