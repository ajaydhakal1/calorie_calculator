<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalorieController extends Controller
{
    public function calculate(Request $request)
    {
        $data = $request->validate([
            'age' => 'required|integer|min:3|max:100',
            'gender' => 'required|in:male,female',
            'height' => 'required|numeric|max:220',
            'weight' => 'required|numeric|max:220',
            'activity_level' => 'required|integer|between:1,5',
        ]);

        session(['calorie_data' => $data]);

        $bmr = 0;

        // BMR Calculation based on gender
        if ($data['gender'] === 'male') {
            $bmr = 88.362 + (13.397 * $data['weight']) + (4.799 * $data['height']) - (5.677 * $data['age']);
        } else {
            $bmr = 447.593 + (9.247 * $data['weight']) + (3.098 * $data['height']) - (4.330 * $data['age']);
        }

        // Activity Factor
        $activity_factor = [1.2, 1.375, 1.55, 1.725, 1.9];
        $tdee = $bmr * $activity_factor[$data['activity_level'] - 1];

        // Macronutrient distribution (percentage of total daily calorie intake)
        $protein = $tdee * 0.2 / 4; // 20% of calories
        $fat = $tdee * 0.25 / 9; // 25% of calories
        $carbs = $tdee * 0.55 / 4; // 55% of calories

        // Calorie Deficit (to lose weight)
        $minimalDeficit = $tdee - 500;  // Mild weight loss (500 kcal deficit)
        $balancedDeficit = $tdee - 750; // Balanced weight loss (750 kcal deficit)
        $extremeDeficit = $tdee - 1000; // Extreme weight loss (1000 kcal deficit)

        // Calorie Surplus (to gain weight)
        $minimalSurplus = $tdee + 500;  // Mild weight gain (500 kcal surplus)
        $balancedSurplus = $tdee + 750; // Balanced weight gain (750 kcal surplus)
        $extremeSurplus = $tdee + 1000; // Extreme weight gain (1000 kcal surplus)

        // Save user's history if logged in
        if (Auth::user()) {
            Auth::user()->histories()->create([
                'height' => $data['height'],
                'weight' => $data['weight'],
                'activity_level' => $data['activity_level'],
            ]);
        }

        return view('calorie_result', compact(
            'tdee',
            'protein',
            'fat',
            'carbs',
            'minimalDeficit',
            'balancedDeficit',
            'extremeDeficit',
            'minimalSurplus',
            'balancedSurplus',
            'extremeSurplus',
            'data'
        ));
    }

    public function dietPlan(){
        $data = session('calorie_data', []);
        // dd($data);
        return view('diet_plan', compact('data'));
    }


    public function showHistory()
    {
        $userHistories = Auth::user()->histories()->latest()->get();
        return view('user_history', compact('userHistories'));
    }
}
