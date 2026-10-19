<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::get('/classroom/08-authorisation-rbac-api-sec', function (\Illuminate\Http\Request $request) {
    $role = $request->query('role', 'guest');
    if ($role !== 'admin') return response()->json(['message' => 'Forbidden'], 403);
    return response()->json(['lesson' => 'Authorisation, RBAC & API Security', 'granted' => true]);
});
