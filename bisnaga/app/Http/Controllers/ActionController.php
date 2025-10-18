<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Actions, Categories};
use Illuminate\Support\Facades\Validator;
class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actions = Actions::with('categories')->get();
        // dd($actions);
        return view('action/actionIndex', compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('action/actionCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        // dd($request->all());
         $validate = Validator::make(
            $request->all(),[
                'title'=> 'required|max:30|min:3',
                'descriptions'=> 'required|min:7',
                'category_id'=> 'required|numeric',
                'points'=> 'required|numeric'
            ],
            [
                'title.required'=>'O title deve ser preenchido',
                'title.max'=>'Titulo: O tamanho máximo é de 30 caracteres',
                'title.min'=>'Titulo: O tamanho mínimo de caracteres é 3',
                'descriptions.required'=>'A descrição deve ser preenchida',
                'descriptions.min'=>'Descrição: O tamanho mínimo é de 7 caracteres',
                'category_id.required'=>'O id precisa ser preenchido',
                'category_id.numeric'=>'ID: O id da categoria precisa ser numero',
                'points.required'=>'Os pontos precisam ser preenchidos',
                'points.numeric'=>'Os pontos precisam ser número'
            ]
        );
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        else {
            //dd($request);
            $create = Actions::create([
                'title'=>$request->input('title'),
                'descriptions'=>$request->input('descriptions'),
                'category_id'=>$request->input('category_id'),
                'points'=>$request->input('points')
            ]);
            if($create){
                return redirect()->route('action.index');
            }else {
                return redirect()->back()->with('message', 'Erro na insercao');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $action = Actions::findOrFail($id);
        //dd($action);
        return view('action/actionShow', compact('action'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $action = Actions::findOrFail($id);
        //dd($action)
        $categories = Categories::all(); 
        return view('action/actionEdit', compact('action', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $action=Actions::findOrFail($id);
        $update = $action->update($request->except(['_token','_method']));
        if($update){
            return redirect()->route('action.index');
        }else {
            return redirect()->back()->with('message', 'Erro na atualizacao');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $action = Actions::findOrFail($id);
        $action->delete();
        return redirect()->route('action.index');
    }
}