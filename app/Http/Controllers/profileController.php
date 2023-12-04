<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class profileController extends Controller
{
    public function profile()
    {

        return view('profile.index');
    }

    public function edit($id)
    {
        $profile = DB::table('jobatho_profile')->where('jobatho_user_id', $id)->first();
        return view('profile.edit', ['profile' => $profile]);
    }

    public function update(Request $request, $id)
    {

        $formFields = [
            'profession'       => $request->get('profession'),
            'nid'     => $request->get('nid'),
            'about'    => $request->get('about'),
            'current_address'     => $request->get('current_address'),
            'permanent_address'       => $request->get('permanent_address'),
            'primary_contact'        => $request->get('primary_contact'),
            'secendary_contact' => $request->get('secendary_contact'),
            'ref' => $request->get('ref'),
        ];

        // percentage calculation
        $filledValue = 0;
        foreach ($formFields as $field) {
            // Check if the field is set and not null
            if (isset($field) && !is_null($field)) {
                $filledValue++;
            }
        }

        $arraySize = count($formFields);
        $percentage = ($filledValue / $arraySize) * 100;
        // dd($percentage);

        $formFields['percentage'] = $percentage;
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('profile', 'profileImage');
        }

        DB::table('jobatho_profile')->where('id', $id)->update($formFields);

        return redirect('/profiles')->with('message', 'Profile Updated Successfully!');
    }
}
