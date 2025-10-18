<?php

namespace App\Http\Controllers;

use App\Models\Categories;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categories::all();
        return view('category/categoryIndex', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category/categoryCreate');
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
                'description' => 'required|min:7'
            ],
            [
                'name.required' => 'O nome deve ser preenchido',
                'name.max' => 'O tamanho máximo é de 30 caracteres',
                'name.min' => 'O tamanho mínimo é 3 caracteres',
                'description.required' => 'A descrição deve ser preenchida',
                'description.min' => 'A descrição deve ter no mínimo 7 caracteres'
            ]
        );

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            // dd($request);
            $create = Categories::create([
                'name' => $request->input('name'),
                'description' => $request->input('description')
            ]);
            if ($create) {
                return redirect()->route('category.index');
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
        $category = Categories::findOrFail($id);

        return view('category/categoryShow', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categories::findOrFail($id);

        return view('category/categoryEdit', compact('category'));
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
                'description' => 'required|min:7'
            ],
            [
                'name.required' => 'O nome deve ser preenchido',
                'name.max' => 'O tamanho máximo é de 30 caracteres',
                'name.min' => 'O tamanho mínimo é 3 caracteres',
                'description.required' => 'A descrição deve ser preenchida',
                'description.min' => 'A descrição deve ter no mínimo 7 caracteres'
            ]
        );

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            // dd($request);
            //outra maneira de quebrar o request para salvar
            $category = Categories::findOrFail($id);
            $update = $category->update($request->except(['_token', '_method']));
            if ($update) {
                return redirect()->route('category.index');
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
        $category = Categories::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
