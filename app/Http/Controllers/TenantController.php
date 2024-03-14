<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();
        dd($tenants);
    }

    public function store(Request $request)
    {
        $tenant = Tenant::create($request->all());
        dd($tenant);
    }
}
