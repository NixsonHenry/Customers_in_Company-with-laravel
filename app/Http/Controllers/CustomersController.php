<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index']);
    //     $this->middleware('auth')->only(['index']);
    // }


    public function index()
    {
        $customers = Customer::all();
        // dd($customers);
        // $activeCustomers = Customer::active()->get();

        // $inactiveCustomers = Customer::inactive()->get();
        // $inactiveCustomers = Customer::where('active', 0)->get();
        
        return view('customers.index', compact('customers'))->with('i');
    }

   
    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    
    public function store(Request $request)
    {
        $customer = Customer::create($this->validateRequest());

        // Image: $this->storeImage($customer);

        // $customer = Customer::create($data);
        // $customer = new Customer();
        // $customer->name = request('name');
        // $customer->email = request('email');
        // $customer->active = request('active');
        // $customer->save();

        // ---------------------------------------------------------
            if($request->hasfile('image')) 
            {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/customers/', $filename);
                $customer->image = $filename;
            }   
            // $image = Image::make(public_path('uploads/customers/' . $customer->image))->fit(70, 90);
            
            $customer->save();

            return redirect('customers')->with('status', 'Customer Image Added Successfully');
        // ---------------------------------------------------------
    }

   
    public function show(Customer $customer)
    {
        // $customer = Customer::where('id', $customer)->firstOrFail();
        return view('customers.show', compact('customer'));
    }

  
    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

  
    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());

        return redirect('customers/'. $customer->id);
    }

    
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }


    public function about() 
    {
        return view('about');
    }


    public function contact() 
    {
        return view('contact');
    }


    private function validateRequest()
    {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
            'image' => 'sometimes|file|image',
            // |max:5000
        ]);

    }

}
