<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller{

    public function index(Request $request){
        if(isset($request->company_id) && $request->company_id !== 0)
            $customers = \App\Customer::where('company_id', $request->company_id)->orderBy('surname')->get();
        else
            $customers = \App\Customer::orderBy('surname')->get();
            $companies = \App\Company::orderBy('name')->get();
        return view('customers.index', ['customers' => $customers, 'companies' => $companies]);
    }
    public function create(){
        $companies = \App\Company::orderBy('name')->get();
        return view('customers.create', ['companies' => $companies]);
    }
    public function store(Request $request){

        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas

            'name' => 'required|alpha:customers,name',
            'surname' => 'required|alpha',
            'phone' => 'required|unique:customers,phone',
            'email' => 'required|unique:customers,email',
            // 'comment' => 'required',
            // 'company_id' => 'required',
            ]);
            
        // $customer = new Customer();
        // // can be used for seeing the insides of the incoming request
        // // var_dump($request->all()); die();
        // $customer->fill($request->all());
        // if ($customer->experience < $customer->registered) {
        //     return back()->withErrors(['error' => ['Something went wrong!']]);
        // }
        // $customer->save();
        // return redirect()->route('customers.index');

        
        $customer = new Customer();
        // can be used for seeing the insides of the incoming request
        // var_dump($request->all()); die();
        $customer->fill($request->all());
        $customer->save();
        return redirect()->route('customers.index');



    }
    public function show(Customer $customer){
        //
    }
    public function edit(Customer $customer){
        $companies = \App\Company::orderBy('name')->get();
        return view('customers.edit', ['customer' => $customer, 'companies' => $companies]);
    }
    public function update(Request $request, Customer $customer){

        $this->validate($request, [
            // [Dėmesio] validacijoje unique turi būti nurodytas teisingas lentelės pavadinimas!
            // galime pažiūrėti, kas bus jei bus neteisingas

            'name' => 'required|alpha:customers,name',
            'surname' => 'required|alpha',
            'phone' => 'required',
            'email' => 'required',
            // 'comment' => 'required',
            // 'company_id' => 'required',
            ]);

            $customer->fill($request->all());
            $customer->save();
            return redirect()->route('customers.index');
        }

    //     $customer->fill($request->all());
    //     if ($customer->experience < $customer->registered) {
    //         return back()->withErrors(['error' => ['Something went wrong!']]);
    //     }
    //     $customer->save();
    //     return redirect()->route('customers.index');
    // }

    public function destroy(Customer $customer, Request $request)
    {
        $customer->delete();
        return redirect()->route('customers.index', ['company_id'=> $request->input('company_id')]);
    }
}
