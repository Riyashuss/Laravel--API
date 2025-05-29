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
    
            
            $states = [
                ['up' => 1, 'down' => 0, 'left_dir' => 0, 'right_dir' => 0, 'stop' => 0],
                ['up' => 0, 'down' => 1, 'left_dir' => 0, 'right_dir' => 0, 'stop' => 0],
                ['up' => 0, 'down' => 0, 'left_dir' => 1, 'right_dir' => 0, 'stop' => 0],
                ['up' => 0, 'down' => 0, 'left_dir' => 0, 'right_dir' => 1, 'stop' => 0],
                ['up' => 0, 'down' => 0, 'left_dir' => 0, 'right_dir' => 1, 'stop' => 0],
               
                
            ];
    
           
            $currentState = [
                'up' => $move->up,
                'down' => $move->down,
                'left_dir' => $move->left_dir,
                'right_dir' => $move->right_dir,
                'stop' => $move->stop,
            ];
    
            $currentIndex = array_search($currentState, $states);
    
        
            $nextIndex = ($currentIndex === false || $currentIndex >= count($states) - 1) ? 0 : $currentIndex + 1;
    

            $move->update($states[$nextIndex]);
    
            return response()->json($move);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
}