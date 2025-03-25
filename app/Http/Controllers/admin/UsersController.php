<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.view_users')->with('allUsers', $users);
    }

    public function create()
    {
        $role = Role::get();
        return view('admin.add_user')->with('allRoles', $role);
    }

    public function destroy($id)
{
    $user = User::find($id);
    if ($user->delete()) {
        return redirect()->route('view_users')->with(['success' => 'User deleted successfully']);
    }
    return redirect()->back();
}
    public function store(Request $request)
    {
        // التحقق من الصحة
        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    'string',
                    'max:255',
                    'unique:users,email',
                    'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'
                ],
            ],
            [
                'username.required' => 'The username field is required.',
                'username.string' => 'The username must be a string.',
                'username.max' => 'The username may not be greater than 255 characters.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'email.string' => 'The email must be a string.',
                'email.max' => 'The email may not be greater than 255 characters.',
                'email.unique' => 'The email has already been taken.',
                'email.regex' => 'The email must be a valid Gmail address (example@gmail.com).'
            ]
        );


        // إذا فشل التحقق من الصحة
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // إنشاء مستخدم جديد
        $generatedPassword = $this->randomPassword();
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($generatedPassword);

        // حفظ المستخدم
        if ($user->save()) {
            $info = array();
            $info['name'] = $request->username;
            $info['email'] = $request->email;
            $info['password'] = $generatedPassword;

            // إضافة الدور للمستخدم
            $user->addRole($request->role);

            // إرسال بريد ترحيبي (اختياري)
            // Mail::to($request->email)->send(new WelcomeEmail($info));

            return redirect()->route('view_users')->with(['success' => 'User added successfully']);
        }

        return redirect()->back();
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function updateRoles()
    {
        $user = User::find(1);
        $user->addRole('super_admin');
    }

    function randomPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
