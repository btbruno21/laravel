<?php

namespace App\Http\Controllers;

use App\Models\Reward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reward = Reward::all();
        return view('reward/rewardIndex', compact('reward'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reward/rewardCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:30|min:3',
                'description' => 'required|min:7',
                'require_points' => 'required|numeric'
            ],
            [
                'name.required' => 'O nome deve ser preenchido',
                'name.max' => 'O tamanho máximo é de 30 caracteres',
                'name.min' => 'O tamanho mínimo é 3 caracteres',
                'require_points.required' => 'Os pontos devem ser preenchidos',
                'require_points.numeric' => 'Os pontos só devem ser números',
                'description.required' => 'A descrição deve ser preenchida',
                'description.min' => 'A descrição deve ter no mínimo 7 caracteres'
            ]
        );

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $create = Reward::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'require_points' => $request->input('require_points')
            ]);
            if ($create) {
                return redirect()->route('reward.index');
            } else {
                return redirect()->back()->with('message', 'Erro na inserção');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reward = Reward::findOrFail($id);

        return view('reward/rewardShow', compact('reward'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reward = Reward::findOrFail($id);

        return view('reward/rewardEdit', compact('reward'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:30|min:3',
                'description' => 'required|min:7',
                'require_points' => 'required|numeric'
            ],
            [
                'name.required' => 'O nome deve ser preenchido',
                'name.max' => 'O tamanho máximo é de 30 caracteres',
                'name.min' => 'O tamanho mínimo é 3 caracteres',
                'require_points.required' => 'Os pontos devem ser preenchidos',
                'require_points.numeric' => 'Os pontos só devem ser números',
                'description.required' => 'A descrição deve ser preenchida',
                'description.min' => 'A descrição deve ter no mínimo 7 caracteres'
            ]
        );

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $reward = Reward::findOrFail($id);
            $update = $reward->update($request->except(['_token', '_method']));
            if ($update) {
                return redirect()->route('reward.index');
            } else {
                return redirect()->back()->with('message', 'Erro na atualização');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reward = Reward::findOrFail($id);
        $reward->delete();
        return redirect()->route('reward.index');
    }
}
