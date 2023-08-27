<?php

namespace App\Contracts;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

interface UserContract
{
    /**
     * Display a listing of users.
     *
     * @param Request $request
     * @return \Inertia\Response
     * @throws Exception
     */
    public function index(Request $request): \Inertia\Response;
}
