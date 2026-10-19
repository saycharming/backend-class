<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::post('/classroom/09-redis-cache-design-invalid', function (\Illuminate\Http\Request $request) {
    $data = $request->validate(['name' => 'required|string|min:3']);
    return response()->json(['lesson' => 'Redis, Cache Design & Invalidation', 'hello' => $data['name']], 201);
});
