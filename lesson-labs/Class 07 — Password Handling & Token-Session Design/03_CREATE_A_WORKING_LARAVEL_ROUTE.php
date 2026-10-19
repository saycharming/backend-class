<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::get('/classroom/07-password-handling-token-se', function (\Illuminate\Http\Request $request) {
    $name = $request->query('name', 'Pintop student');
    return response()->json(['lesson' => 'Password Handling & Token-Session Design', 'message' => "Hello, {$name}"]);
});
