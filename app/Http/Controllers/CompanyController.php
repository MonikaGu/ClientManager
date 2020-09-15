<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        return view('companies.index', ['companies' => Company::orderBy('name')->get()]);
    }

    public function create() {
       return view('companies.create');
   }

    public function store(Request $request) {
      
        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas

            'name' => 'required:companies,name',
            'address' => 'required',
            ]);
            
        $company = new Company();
         // can be used for seeing the insides of the incoming request
         // var_dump($request->all()); die();
        $company->fill($request->all());

        return ($company->save() !==1 ) ? 
        redirect()->route('company.index')->with('status_success', 'Sukurta!') :
        redirect()->route('company.index')->with('status_error', 'Nesukurta!');///<- NOTIFICATION LOGIKA su printu i puslapy
    }

        
    //     $company->save();
    //     return redirect()->route('company.index');
    // }

    // public function show(Company $company)
    // {
    //     //
    // }

    public function edit(Company $company)
    {
        return view('companies.edit', ['company' => $company]);
    }

    public function update(Request $request, Company $company){

        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas

            'name' => 'required:companies,name',
            'address' => 'required',
            ]);

        $company->fill($request->all());

        return ($company->save() !==1 ) ? 
            redirect()->route('company.index')->with('status_success', 'Atnaujinta!') :
            redirect()->route('company.index')->with('status_error', 'Neatnaujinta!');///<- NOTIFICATION LOGIKA su printu i puslapy
        }

    //     $company->save();
    //     return redirect()->route('company.index');
    // }

    public function destroy(Company $company){

        return ($company->delete() ) ? 
        redirect()->route('company.index')->with('status_success', 'Ištrinta!'):
        redirect()->route('company.index')->with('status_error', 'Nesukurta!');

        // $company->delete();
        // return redirect()->route('company.index');
    }
    
}