<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    const PROVIDER = 'GITHUB';

    protected User $authUser;

    public function __invoke () : RedirectResponse
    {
        die;
    }
}
