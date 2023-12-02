<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ListingsController extends Controller
{
    // Show all listings/index page
    public function index()
    {
        $listings = DB::table('jobatho_listings')
            ->latest()
            ->when(request('tag'), function ($query, $tag) {
                return $query->where('tag', $tag);
            })
            ->when(request('search'), function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->paginate(6);

        // dd($listings);

        return view('listings.index', ['listings' => $listings]);
    }

    // Show single listings/postings
    public function show($id)
    {
        $listings = DB::table('jobatho_listings')->find($id);

        return view('listings.show', ['postings' => $listings]);
    }

    public function create()
    {
        return view('listings.create');
    }

    // Store listings data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title'       => 'required',
            'company'     => ['required', Rule::unique('jobatho_listings', 'company')],
            'location'    => 'required',
            'website'     => 'required',
            'email'       => ['required', 'email'],
            'tags'        => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $test = $formFields['logo'] = $request->file('logo')->store('upload', 'upload');

        }

        $formFields['user_id'] = auth()->id();

        DB::table('jobatho_listings')->insert($formFields);

        return redirect('/')->with('message', 'Listing Created Successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $listings = DB::table('jobatho_listings')->find($id);

        return view('listings.edit', ['listings' => $listings]);
    }

    // Update listings
    public function update(Request $request, $id)
    {

        // figure out what is listings working
        // if ($listings->user_id != auth()->id()) {
        //     abort(403, 'Unauthorized Action');
        // }

        $formFields = $request->validate([
            'title'       => 'required',
            'company'     => 'required',
            'location'    => 'required',
            'website'     => 'required',
            'email'       => ['required', 'email'],
            'tags'        => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        DB::table('jobatho_listings')->where('id', $id)->update($formFields);

        return back()->with('message', 'Listing Updated Successfully!');
    }

    // Delete listings
    public function delete($id)
    {
        $listings = DB::table('jobatho_listings')->find($id);

        if ($listings->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        DB::table('jobatho_listings')->where('id', $id)->delete();

        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }

    // Manage listings function
    public function manage()
    {
        $listings = DB::table('jobatho_listings')->where('user_id', auth()->id())->get();

        return view('listings.manage', ['listings' => $listings]);
    }
}
