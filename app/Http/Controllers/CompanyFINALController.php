<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyFINALController extends Controller
{
    // Create Index
    public function index() {
        $data['companies'] = Company::orderBy('id', 'desc')->paginate(5);
        return view('companies.index', $data);
    }

    // Create resource
    public function create() {
        return view('companies.create');
    }

    //Store resource
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'addres' => 'required'
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->addres = $request->addres;
        $company->save();
        return redirect()->route('companies.index')->with('success', 'Company has been created successfully.');
    }
}
