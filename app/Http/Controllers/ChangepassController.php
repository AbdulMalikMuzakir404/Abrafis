<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ChangePassRequest;

class ChangepassController extends Controller
{
    public function changepass()
    {
        return view('pages.changepass');
    }

    public function changepassproses(ChangePassRequest $request)
    {
        $old_password = Auth::user()->password;
        $user_id = Auth::user()->id;

        if(Hash::check($request->input('old_password'), $old_password))
        {
            $user = User::find($user_id);
            $user->password = Hash::make($request->input('password'));

            if($user->save())
            {
                return redirect()->route('changepass')->with('successcp', 'Success to Change Password');
            } else
            {
                return redirect()->route('changepass')->with('errorcp', 'Old Password Invalid!');
            }
        } else
        {
            return redirect()->route('changepass')->with('errorcp', 'Old Password Invalid!');
        }
    }

    public function changeemailproses(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:70', 'min:10', 'unique:users']
        ]);

        $email_id = Auth::user()->id;
        $email = User::find($email_id);
        $email->update($request->all());

        if($email)
        {
            return redirect()->route('changepass')->with('successce', 'Success to Change Email');
        } else
        {
            return redirect()->route('changepass')->with('errorce', 'Invalid to Change Email!');
        }
    }
}
