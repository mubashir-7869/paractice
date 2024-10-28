<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Result;
use App\Models\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function create()
    {
        $sports = Sport::all();
        $countries = Country::all();

        return view('sports.create', compact('sports', 'countries'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'support_id' => 'required',
            'first' => 'required',
            'second' => 'required',
            'third' => 'required',
        ]);

        foreach ($request->support_id as $key => $sportId) {
            Result::create([
                'sport_id' => $sportId,
                'first_place' => $request->first[$key],
                'second_place' => $request->second[$key],
                'third_place' => $request->third[$key],
            ]);
        }

        return redirect()->back()->with('success', 'Results submitted successfully!');
    }

    public function show()
    {
        $results = Result::with('sport')->get();

        return view('sports.show', compact('results'));
    }
}
