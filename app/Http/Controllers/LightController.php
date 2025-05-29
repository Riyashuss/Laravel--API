<?php
namespace App\Http\Controllers;

use App\Models\Light;
use Illuminate\Http\Request;

class LightController extends Controller
{
    // Show Light Status
    public function index()
    {
        $light = Light::first(); // Get first record
        if (!$light) {
            $light = Light::create(['state' => false]); // Default OFF
        }
        return response()->json(['state' => $light->state]);
    }

    // Toggle Light
    public function toggle()
    {
        $light = Light::first();
        if (!$light) {
            $light = Light::create(['state' => false]);
        }
        $light->state = !$light->state; // Toggle
        $light->save();

        return response()->json(['state' => $light->state]);
    }

    // Web View
    public function showLight()
    {
        $light = Light::first();
        return view('light', compact('light'));
    }
}
