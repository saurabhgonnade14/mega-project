<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class UserController extends Controller
{

    public function create()
    {
        $data['countries'] = Country::get(["name", "id"]);
        return view('user.create', $data);
    }
    public function fetchState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }public function store (Request $request)
     {
        // dd($request);
         $user=new User();
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=$request->password;
         $user->contact_number=$request->contact_number;
         $user->address=$request->address;
         $user->pin=$request->pin;
         $user->country_id=$request->country_id;
         $user->state_id=$request->state_id;
         $user->city_id=$request->city_id;
         $user->save();
         return redirect()->route('user.index')->with('message','added successfully');
     }

    public function index(Request $request)
    {
        $user_name = $request->input('user_search');
        $data=User::with(['country','state','city']) ->where('name', 'LIKE', '%' . $user_name . '%')
                                                     ->orWhere('email', 'LIKE', '%' . $user_name . '%')
                                                     ->orWhere('password', 'LIKE', '%' . $user_name . '%')
                                                     ->orWhere('contact_number', 'LIKE', '%' . $user_name . '%')
                                                     ->orWhere('address', 'LIKE', '%' . $user_name . '%')
                                                     ->orWhere('pin', 'LIKE', '%' . $user_name . '%')->get();

        // dd($data);
        // $data=User::all();
        return view('user.index',compact('data'));
    }

    public function edit($id)
    {
        $data['data']=User::find($id);

        $data['countries'] = Country::get(["name", "id"]);
        return view('user.edit', $data);
        // $data=User::find($id);
        // $countries=Country::get(["name","id"]);
        // $data=State::get(["name","id"]);
        // $data=City::get(["name","id"]);
        //  return view('user.edit',compact('data'user','countries'));

    }

    public function update (Request $request,$id)
    {
         $user=User::find($id);
         $user->name=$request->name;
         $user->email=$request->email;
         $user->password=$request->password;
         $user->contact_number=$request->contact_number;
         $user->address=$request->address;
         $user->pin=$request->pin;
         $user->country_id=$request->country_id;
         $user->state_id=$request->state_id;
         $user->city_id=$request->city_id;
         $user->update();
         return redirect()->route('user.index')->with('message','update successfully');
    }

    public function delete($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('message','delete successfully');

    }
}
