<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class DietPlanController extends Controller
{
    public function generate(Request $request)
    {
        $data = $request->validate([
            'age' => 'required|integer',
            'gender' => 'required|in:male,female',
            'height' => 'required|numeric',
            'weight' => 'required|numeric',
            'activity_level' => 'required|integer|between:1,5',
            'goal' => 'required|in:weight_loss,weight_gain,maintenance',
        ]);

        // Constructing the user-specific diet prompt
        $prompt = "Create a structured meal plan for a {$data['age']} year old {$data['gender']} "
            . "with a height of {$data['height']} cm, weight of {$data['weight']} kg, "
            . "and activity level {$data['activity_level']}. Their goal is {$data['goal']}. "
            . "Provide a breakfast, lunch, dinner, and snack recommendation with calories.";

        // Call Google Gemini API
        $dietPlan = $this->generateDietPlanFromGemini($prompt);

        return view('diet_plan_result', compact('dietPlan'));
    }

    private function generateDietPlanFromGemini($prompt)
    {
        $apiKey = env('GEMINI_API_KEY');

        if (!$apiKey) {
            return 'API Key is missing. Please configure GEMINI_API_KEY in .env file.';
        }

        $client = new Client([
            'base_uri' => 'https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent',
            'timeout' => 30.0,
        ]);

        try {
            $response = $client->post("?key={$apiKey}", [
                'json' => [
                    'contents' => [['parts' => [['text' => $prompt]]]],
                ],
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Failed to generate diet plan.';
        } catch (\Exception $e) {
            Log::error('Gemini API Error: ' . $e->getMessage());
            return 'Error processing your request.';
        }
    }
}
