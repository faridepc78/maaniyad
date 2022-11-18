<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        try {
            if (request()->input('token')) {
                $token = request()->input('token');

                if ($token == env('PANEL_TOKEN')) {
                    return view('auth.login');
                } else {
                    abort(404);
                }
            } else {
                abort(404);
            }
        } catch (Exception $exception) {
            abort(404);
        }
    }

    protected function credentials(LoginRequest $request)
    {
        $username = $request->get('user_name');

        $field = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';

        return [
            $field => $username,
            'password' => $request->password
        ];
    }

    public function login(LoginRequest $request)
    {
        $credentials = $this->credentials($request);

        if (Auth::attempt($credentials)) {

            $user = Auth::getProvider()->retrieveByCredentials($credentials);

            Auth::login($user, $request->boolean('remember'));

            newFeedback('پیام','ورود با موفقیت انجام شد','info');

            return redirect()->route('dashboard');
        } else {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')]
            ]);
        }
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        newFeedback('پیام','خروج با موفقیت انجام شد','info');

        return redirect()->route('home');
    }
}
