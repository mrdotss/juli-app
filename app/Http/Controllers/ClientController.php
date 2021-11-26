<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClientsExport;
use Ramsey\Uuid\Uuid;
use Auth;
use Gate;

class ClientController extends Controller
{
    /**
     * Policy before going to deep :b.
     *
     * @return void
     */
    public function __construct()
    {
        $this -> middleware('auth');
    }

    /**
     * Display a listing of the client.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new client.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::pluck('name', 'code');
        return view('client.create', ['provinces'=>$provinces]);
    }

    /**
     * Store a newly created client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'dealer_group' => 'required',
            'full_name' => 'required|max:50',
            'birth_place' => 'required|max:20',
            'birth_date' => 'required',
            'gender' => 'required|max:10',
            'religion' => 'required|max:15',
            'education' => 'required|max:45',
            'marital_status' => 'required|max:15',
            'honda_id' => 'required|max:10',

            
            'id_card_number' => 'required|max:16', 
            'id_card_address' => 'required|max:100', 
            'id_card_province' => 'required|max:20',
            'id_card_city' => 'required|max:20', 
            'id_card_districts' => 'required|max:20', 
            'id_card_village' => 'required|max:20',
            'id_card_postal_code' => 'required|max:5', 
            'id_card_picture' => 'required|image|mimes:png,jpg,jpeg|max:1024',

            'home_address' => 'required|max:100', 
            'home_province' => 'required|max:20', 
            'home_city' => 'required|max:20', 
            'home_districts' => 'required|max:20',
            'home_village' => 'required|max:20', 
            'home_postal_code' => 'required|max:5',

            'email_user' => 'required|max:30', 
            'facebook_id' => 'max:30|nullable', 
            'instagram_id' => 'max:30|nullable', 
            'twitter_id' => 'max:30|nullable',
            'telph_number' => 'max:15|nullable', 
            'phone_number' => 'required|max:20', 
            'relatives_phone_number' => 'max:15|nullable',
            'user_hobby_1' => 'max:20|nullable', 
            'user_hobby_2' => 'max:20|nullable', 
            'user_hobby_3' => 'max:20|nullable',
            'user_supervisor' => 'max:30|nullable', 
            'user_coordinator' => 'max:30|nullable',
            'user_position' => 'max:20|nullable',
            'user_position_start_date' => 'required',
            'user_selfie' => 'required|image|mimes:png,jpg,jpeg|max:1024',
            ]);

            $user_selfie = $request->file('user_selfie');
            $user_selfie->storeAs('client/photos/user_selfie', $user_selfie->hashName(), 's3Public');

            $id_card_picture = $request->file('id_card_picture');
            $id_card_picture->storeAs('client/photos/id_card', $id_card_picture->hashName(), 's3Public');

            // $id_card_province = $request->id_card_province;
            // $id_card_province = Province::where('code', $id_card_province)->value('name');

            // $id_card_city = $request->id_card_city;
            // $id_card_city = City::where('code', $id_card_city)->value('name');
            
            // $id_card_districts = $request->id_card_districts;
            // $id_card_districts = District::where('code', $id_card_districts)->value('name'); 

            // $id_card_village = $request->id_card_village;
            // $id_card_village = Village::where('code', $id_card_village)->value('name');

            $client = Client::create([    
            'user_id' => Auth::id(),
            'dealer_group' => $request->dealer_group,
            'full_name' => $request->full_name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'education' => $request->education,
            'marital_status' => $request->marital_status,
            'honda_id' => $request->honda_id,

            'id_card_number' => $request->id_card_number, 
            'id_card_address' => $request->id_card_address,
            // 'id_card_province' => $id_card_province,
            // 'id_card_city' => $id_card_city, 
            // 'id_card_districts' => $id_card_districts, 
            // 'id_card_village' => $id_card_village,
            'id_card_province' => $request->id_card_province,
            'id_card_city' => $request->id_card_city, 
            'id_card_districts' => $request->id_card_districts, 
            'id_card_village' => $request->id_card_village,        
            'id_card_postal_code' => $request->id_card_postal_code, 
            'id_card_picture' => $id_card_picture->hashName(),

            'home_address' => $request->home_address, 
            'home_province' => $request->home_province, 
            'home_city' => $request->home_city, 
            'home_districts' => $request->home_districts,
            'home_village' => $request->home_village, 
            'home_postal_code' => $request->home_postal_code,

            'email_user' => $request->email_user, 
            'facebook_id' => $request->facebook_id, 
            'instagram_id' => $request->instagram_id, 
            'twitter_id' => $request->twitter_id,
            'telph_number' => $request->telph_number, 
            'phone_number' => $request->phone_number, 
            'relatives_phone_number' => $request->relatives_phone_number,
            'user_hobby_1' => $request->user_hobby_1, 
            'user_hobby_2' => $request->user_hobby_2, 
            'user_hobby_3' => $request->user_hobby_3,
            'user_supervisor' => $request->user_supervisor, 
            'user_coordinator' => $request->user_coordinator, 
            'user_position' => $request->user_position,
            'user_position_start_date' => $request->user_position_start_date,
            'user_selfie' => $user_selfie->hashName(),
            ]);

            return back()->with('success', 'Data berhasil diinput.');

            // if($client){
            //     //redirect dengan pesan sukses
            //     return redirect()->route('client.index')->with(['success' => 'Data berhasil diinput.']);
            // }else{
            //     //redirect dengan pesan error
            //     return redirect()->route('client.index')->with(['error' => 'Data gagal diinput.']);
            // }
    }

    /**
     * Display the specified client.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cities = City::pluck('name', 'code');
        $client = Client::findOrFail($id);

        if (Gate::denies('client.show', $client) AND $client->user_id != Auth::id()) {
            abort(403);
        }

        return view('client.show', ['client' => $client], compact('cities'));
    }

    /**
     * Show the form for editing the specified client.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinces = Province::select('name', 'code')->get();
        $cities = City::select('name', 'province_code', 'code')->get();
        $districts = District::select('name', 'city_code', 'code')->get();
        $villages = Village::select('name', 'district_code', 'code')->get();

        $client = Client::findOrFail($id);
    
        if (Gate::denies('client.edit', $client) AND $client->user_id != Auth::id()) {
            abort(403);
        }

        return view('client.edit', ['client' => $client], compact('provinces', 'cities', 'districts', 'villages'));
    }

    /**
     * Update the specified client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);
        
        $request->validate([ 
            'dealer_group' => 'required',
            'full_name' => 'required|max:50',
            'birth_place' => 'required|max:20',
            'birth_date' => 'required',
            'gender' => 'required|max:10',
            'religion' => 'required|max:15',
            'education' => 'required|max:45',
            'marital_status' => 'required|max:15',
            'honda_id' => 'required|max:10',

            'id_card_number' => 'required|max:16', 
            'id_card_address' => 'required|max:100',
            'id_card_province' => 'required|max:20',
            'id_card_city' => 'required|max:20', 
            'id_card_districts' => 'required|max:20', 
            'id_card_village' => 'required|max:20',
            'id_card_postal_code' => 'required|max:5', 

            'home_address' => 'required|max:100', 
            'home_province' => 'required|max:20', 
            'home_city' => 'required|max:20', 
            'home_districts' => 'required|max:20',
            'home_village' => 'required|max:20', 
            'home_postal_code' => 'required|max:5',

            'email_user' => 'required|max:30', 
            'facebook_id' => 'max:30|nullable', 
            'instagram_id' => 'max:30|nullable', 
            'twitter_id' => 'max:30|nullable',
            'telph_number' => 'max:15|nullable', 
            'phone_number' => 'required|max:20', 
            'relatives_phone_number' => 'max:15|nullable',
            'user_hobby_1' => 'max:20|nullable', 
            'user_hobby_2' => 'max:20|nullable', 
            'user_hobby_3' => 'max:20|nullable',
            'user_supervisor' => 'max:30|nullable', 
            'user_coordinator' => 'max:30|nullable',
            'user_position' => 'max:20|nullable',
            'user_position_start_date' => 'required',
            ]);

        if($request->file('id_card_picture') == "" && $request->file('user_selfie') == ""){

            $client->update([    
                'dealer_group' => $request->dealer_group,
                'full_name' => $request->full_name,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'education' => $request->education,
                'marital_status' => $request->marital_status,
                'honda_id' => $request->honda_id,

                'id_card_number' => $request->id_card_number, 
                'id_card_address' => $request->id_card_address, 
                'id_card_province' => $request->id_card_province,
                'id_card_city' => $request->id_card_city, 
                'id_card_districts' => $request->id_card_districts, 
                'id_card_village' => $request->id_card_village,        
                'id_card_postal_code' => $request->id_card_postal_code, 

                'home_address' => $request->home_address, 
                'home_province' => $request->home_province, 
                'home_city' => $request->home_city, 
                'home_districts' => $request->home_districts,
                'home_village' => $request->home_village, 
                'home_postal_code' => $request->home_postal_code,

                'email_user' => $request->email_user, 
                'facebook_id' => $request->facebook_id, 
                'instagram_id' => $request->instagram_id, 
                'twitter_id' => $request->twitter_id,
                'telph_number' => $request->telph_number, 
                'phone_number' => $request->phone_number, 
                'relatives_phone_number' => $request->relatives_phone_number,
                'user_hobby_1' => $request->user_hobby_1, 
                'user_hobby_2' => $request->user_hobby_2, 
                'user_hobby_3' => $request->user_hobby_3,
                'user_supervisor' => $request->user_supervisor, 
                'user_coordinator' => $request->user_coordinator, 
                'user_position' => $request->user_position,
                'user_position_start_date' => $request->user_position_start_date,
                ]);
            return back()->with('success', 'Data telah diupdate.');

        }else if($request->file('id_card_picture') == ""){

            Storage::disk('s3Public')->delete('client/photos/user_selfie/'.$client->user_selfie);

            $user_selfie = $request->file('user_selfie');
            $user_selfie->storeAs('client/photos/user_selfie', $user_selfie->hashName(), 's3Public');

            $client->update([    
                'dealer_group' => $request->dealer_group,
                'full_name' => $request->full_name,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'education' => $request->education,
                'marital_status' => $request->marital_status,
                'honda_id' => $request->honda_id,

                'id_card_number' => $request->id_card_number, 
                'id_card_address' => $request->id_card_address, 
                'id_card_province' => $request->id_card_province,
                'id_card_city' => $request->id_card_city, 
                'id_card_districts' => $request->id_card_districts, 
                'id_card_village' => $request->id_card_village,        
                'id_card_postal_code' => $request->id_card_postal_code, 

                'home_address' => $request->home_address, 
                'home_province' => $request->home_province, 
                'home_city' => $request->home_city, 
                'home_districts' => $request->home_districts,
                'home_village' => $request->home_village, 
                'home_postal_code' => $request->home_postal_code,

                'email_user' => $request->email_user, 
                'facebook_id' => $request->facebook_id, 
                'instagram_id' => $request->instagram_id, 
                'twitter_id' => $request->twitter_id,
                'telph_number' => $request->telph_number, 
                'phone_number' => $request->phone_number, 
                'relatives_phone_number' => $request->relatives_phone_number,
                'user_hobby_1' => $request->user_hobby_1, 
                'user_hobby_2' => $request->user_hobby_2, 
                'user_hobby_3' => $request->user_hobby_3,
                'user_supervisor' => $request->user_supervisor, 
                'user_coordinator' => $request->user_coordinator, 
                'user_position' => $request->user_position,
                'user_position_start_date' => $request->user_position_start_date,
                'user_selfie' => $user_selfie->hashName(),
                ]);

            return back()->with('success', 'Data telah diupdate dengan foto Selfie baru.');

        }else if($request->file('user_selfie') == ""){


            Storage::disk('s3Public')->delete('client/photos/id_card/'.$client->id_card_picture);

            $id_card_picture = $request->file('id_card_picture');
            $id_card_picture->storeAs('client/photos/id_card', $id_card_picture->hashName(), 's3Public');

            $client->update([    
                'dealer_group' => $request->dealer_group,
                'full_name' => $request->full_name,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'education' => $request->education,
                'marital_status' => $request->marital_status,
                'honda_id' => $request->honda_id,

                'id_card_number' => $request->id_card_number, 
                'id_card_address' => $request->id_card_address, 
                'id_card_province' => $request->id_card_province,
                'id_card_city' => $request->id_card_city, 
                'id_card_districts' => $request->id_card_districts, 
                'id_card_village' => $request->id_card_village,        
                'id_card_postal_code' => $request->id_card_postal_code,
                'id_card_picture' => $id_card_picture->hashName(),

                'home_address' => $request->home_address, 
                'home_province' => $request->home_province, 
                'home_city' => $request->home_city, 
                'home_districts' => $request->home_districts,
                'home_village' => $request->home_village, 
                'home_postal_code' => $request->home_postal_code,

                'email_user' => $request->email_user, 
                'facebook_id' => $request->facebook_id, 
                'instagram_id' => $request->instagram_id, 
                'twitter_id' => $request->twitter_id,
                'telph_number' => $request->telph_number, 
                'phone_number' => $request->phone_number, 
                'relatives_phone_number' => $request->relatives_phone_number,
                'user_hobby_1' => $request->user_hobby_1, 
                'user_hobby_2' => $request->user_hobby_2, 
                'user_hobby_3' => $request->user_hobby_3,
                'user_supervisor' => $request->user_supervisor, 
                'user_coordinator' => $request->user_coordinator, 
                'user_position' => $request->user_position,
                'user_position_start_date' => $request->user_position_start_date,
                ]);

            return back()->with('success', 'Data telah diupdate dengan foto KTP baru.');

        }
        else{
            $client = Client::findOrFail($id);
            

            Storage::disk('s3Public')->delete('client/photos/id_card/'.$client->id_card_picture);
            Storage::disk('s3Public')->delete('client/photos/user_selfie/'.$client->user_selfie);

            $id_card_picture = $request->file('id_card_picture');
            $id_card_picture->storeAs('client/photos/id_card', $id_card_picture->hashName(), 's3Public');

            $user_selfie = $request->file('user_selfie');
            $user_selfie->storeAs('client/photos/user_selfie', $user_selfie->hashName(), 's3Public');

            $client->update([    
            'dealer_group' => $request->dealer_group,
            'full_name' => $request->full_name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'education' => $request->education,
            'marital_status' => $request->marital_status,
            'honda_id' => $request->honda_id,
            
            'id_card_number' => $request->id_card_number, 
            'id_card_address' => $request->id_card_address, 
            'id_card_province' => $request->id_card_province,
            'id_card_city' => $request->id_card_city, 
            'id_card_districts' => $request->id_card_districts, 
            'id_card_village' => $request->id_card_village,        
            'id_card_postal_code' => $request->id_card_postal_code, 
            'id_card_picture' => $id_card_picture->hashName(),

            'home_address' => $request->home_address, 
            'home_province' => $request->home_province, 
            'home_city' => $request->home_city, 
            'home_districts' => $request->home_districts,
            'home_village' => $request->home_village, 
            'home_postal_code' => $request->home_postal_code,

            'email_user' => $request->email_user, 
            'facebook_id' => $request->facebook_id, 
            'instagram_id' => $request->instagram_id, 
            'twitter_id' => $request->twitter_id,
            'telph_number' => $request->telph_number, 
            'phone_number' => $request->phone_number, 
            'relatives_phone_number' => $request->relatives_phone_number,
            'user_hobby_1' => $request->user_hobby_1, 
            'user_hobby_2' => $request->user_hobby_2, 
            'user_hobby_3' => $request->user_hobby_3,
            'user_supervisor' => $request->user_supervisor, 
            'user_coordinator' => $request->user_coordinator, 
            'user_position' => $request->user_position,
            'user_position_start_date' => $request->user_position_start_date,
            'user_selfie' => $user_selfie->hashName(),
            ]);

            return back()->with('success', 'Data telah diupdate dengan foto KTP dan Selfie baru.');
        }
    }

    /**
     * Remove the specified client from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        Storage::disk('s3Public')->delete('client/photos/id_card/'.$client->id_card_picture);
        Storage::disk('s3Public')->delete('client/photos/user_selfie/'.$client->user_selfie);
        $client->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        $file_name = 'clients-' . time() .  '.xlsx';
        return Excel::download(new ClientsExport, $file_name);
    }

}
