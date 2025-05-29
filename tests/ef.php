<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angle;
use Exception;

class AngleController extends Controller
{
    public function index()
    {
        try {
            $move = Angle::first();

            if (!$move) {
                $move = Angle::create([
                    'up' => 0,
                    'down' => 0,
                    'left_dir' => 0,
                    'right_dir' => 0,
                    'stop' => 1,
                ]);
            }

            return response()->json($move);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $move = Angle::first();

            if (!$move) {
                return response()->json(['message' => 'No record found'], 404);
            }

            $move->update([
                'up' => 0,
                'down' => 0,
                'left_dir' => 0,
                'right_dir' => 0,
                'stop' => 0,
            ]);

            if ($request->has('direction') && in_array($request->direction, ['up', 'down', 'left_dir', 'right_dir', 'stop'])) {
                $move->update([$request->direction => 1]);
            } else {
                return response()->json(['message' => 'Invalid direction'], 400);
            }

            return response()->json($move);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
