<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angle;
use Exception;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Log;

class AngleController extends Controller
{
    public function index(Request $request)
    {
        try {
            $move = Angle::first();
    
            if (!$move) {
                return response()->json(['message' => 'No record found'], 404);
            }
    
           
            $directions = [
                'up' => 'Up',
                'down' => 'Down',
                'left_dir' => 'Left',
                'right_dir' => 'Right',
                'stop' => 'Stop'
            ];
    
            
            if ($request->has('key')) {
                $key = $request->key;
    
                if (!array_key_exists($key, $directions)) {
                    return response()->json(['error' => 'Invalid key provided'], 400);
                }
    
             
                return response()->json([
                    'direction' => $directions[$key],
                    'value' => (int)$move->$key
                ]);
            }
    
            
            $direction = 'stop';
            $value = 0;
    
            foreach ($directions as $key => $name) {
                if ($move->$key == 1) {
                    $direction = $name;
                    $value = 1;
                    break;
                }
            }
    
            return response()->json([
                'direction' => $direction,
                'value' => $value
            ]);
    
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
    
            $validatedData = $request->validate([
                'up' => 'required|int|in:0,1',
                'down' => 'required|int|in:0,1',
                'left_dir' => 'required|int|in:0,1',
                'right_dir' => 'required|int|in:0,1',
                'stop' => 'sometimes|int|in:0,1', 
            ]);
    
            // If 'stop' is clicked (i.e., sent as 1), set all directions to 0 and stop to 0
            if (isset($validatedData['stop']) && $validatedData['stop'] == 1) {
                $validatedData['up'] = 0;
                $validatedData['down'] = 0;
                $validatedData['left_dir'] = 0;
                $validatedData['right_dir'] = 0;
                $validatedData['stop'] = 0; // Ensure stop remains 0 in the database
            }
    
            // Update the model
            $move->update($validatedData);
    
            return response()->json(['message' => 'Angle updated successfully', 'data' => $move]);
    
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    
}