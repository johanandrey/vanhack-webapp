<?php

namespace App\Http\Controllers;

use App\Preference;
use App\Pet;
use App\Color;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preferences = Preference::latest()->paginate(5);
        return view('preferences.index',compact('preferences'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors  = Color::orderBy('color')->get();
        $pets = Pet::orderBy('id')->get();
        $front = [ $colors, $pets ];
        return view('preferences.create', compact('front'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:preferences|max:50',
            'pet_id' => 'required',
            'color_id' => 'required',
        ]);
  
        Preference::create($request->all());

        return redirect()->route('preferences.index')
                        ->with('success','Preference stored.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function show(Preference $preference)
    {
        return view('preferences.show',compact('preferences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function edit(Preference $preference)
    {
        $colors  = Color::orderBy('color')->get();
        $pets = Pet::orderBy('id')->get();
        $front = [ $preference, $colors, $pets ];
        return view('preferences.edit',compact('front'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Preference $preference)
    {
        $request->validate([
            'name' => 'required|max:50',
            'pet_id' => 'required',
            'color_id' => 'required',
        ]);
  
        $preference->update($request->all());

        return redirect()->route('preferences.index')
                        ->with('success','Preference updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Preference  $preference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Preference $preference)
    {
        $preference->delete();
        return redirect()->route('preferences.index')
                        ->with('success','Preference deleted');
    }
}
