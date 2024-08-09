<?php

namespace App\Http\Controllers;

use App\Models\DriverLicense;
use App\Models\Query;
use App\Models\QueryValue;
use Illuminate\Http\Request;

class DriverLicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driverLicenseQueries = Query::whereHas('driverLicense')->get() ?? collect();
        return view('driverLicense.index', ['queries' => $driverLicenseQueries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('driverLicense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['cpf' => 'required|string|max:11']);

        $user = auth()->user();
        $queryValue = QueryValue::where('enterprise_id', $user->enterprise_id)->first();
        $driverLicenseValue = $queryValue->driverLicense;
        $query = new Query;
        $query->type = 'driverLicense';
        $query->status = "pending";
        $query->enterprise_id = $user->enterprise_id;
        $query->user_id = $user->id;
        $query->value = $driverLicenseValue;
        $query->save();

        $driverLicense = new DriverLicense;
        $driverLicense->cpf = $request->cpf;
        $driverLicense->uf_license = $request->uf_license;
        $driverLicense->license_number = $request->license_number;
        $driverLicense->security_code = $request->security_code;
        $driverLicense->query_id = $query->id;
        $driverLicense->save();

        return redirect()->route('driverLicense.index')->with('success', 'Consulta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DriverLicense $driverLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DriverLicense $driverLicense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DriverLicense $driverLicense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DriverLicense $driverLicense)
    {
        //
    }
}
