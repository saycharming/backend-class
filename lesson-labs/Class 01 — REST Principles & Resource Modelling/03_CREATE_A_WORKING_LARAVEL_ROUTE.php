<?php

// Pintop training only: add the Route declaration below to the local copy of routes/api.php.
\Illuminate\Support\Facades\Route::get('/classroom/01-rest-principles-resource-m/wallets/{id}', function (string $id) {
    return response()->json(['resource' => 'wallet', 'id' => $id, 'balance_minor' => 5000]);
});
