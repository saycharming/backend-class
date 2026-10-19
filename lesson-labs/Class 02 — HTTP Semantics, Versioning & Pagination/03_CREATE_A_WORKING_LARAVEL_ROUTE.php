<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::get('/classroom/02-http-semantics-versioning-', function (\Illuminate\Http\Request $request) {
    $page = max(1, (int) $request->query('page', 1));
    $all = ['Ada', 'Bola', 'Chidi', 'Dami', 'Efe'];
    return response()->json(['page' => $page, 'items' => array_slice($all, ($page-1)*2, 2)]);
});
