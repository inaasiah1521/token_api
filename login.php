<?php
require_once "method.php";
$user = new login();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {

}
public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        if(!$user) {
            return response()->json(['message' => 'Gagal Masuk'],401);
        }
        $isValidPassword = Hash::check($password, $user->password);
        if(!$isValidPassword) {
            return response()->json(['message' => 'Gagal Masuk'],401);
        }

        $generateToken = bin2hex(random_bytes(40));
        $user->update([
            'token' => $generateToken
        ]);

        return response()->json($user);
    }