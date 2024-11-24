<?php

namespace App\Http\Controllers;

use App\Models\Veiculos;
use Illuminate\Http\Request;

class VeiculosController extends Controller
{
    public function index(){
        
        $search = request("search");
        $search2 = request("search2");
        
        if($search){
            $list = Veiculos::where("modelo","LIKE","%".$search."%")->paginate(20);
        }else if($search2){
            $list = Veiculos::where("tipo","LIKE","%".$search2."%")->paginate(20);
        }else{
            $list = Veiculos::paginate(20);
        }
        
        return view("/crud",["list"=>$list]);


    }

    public function save(Request $request){
        
        $request->validate([
            'data_cadastro' => 'required|date|before:tomorrow|after:1900-01-01',
            'modelo' => 'required|string|max:255',
            'tipo' => 'required|string|max:100',
            'ano' => 'required|integer|between:1900,' . date('Y'),
            'valor' => 'required|numeric|min:0.01',
            'foto'=> 'required',
        ], [
            'data_cadastro.required' => 'O campo data de cadastro é obrigatório.',
            'data_cadastro.date' => 'Data inválida! Por favor, insira uma data válida.',
            'data_cadastro.before' => 'A data de cadastro não pode ser no futuro.',
            'data_cadastro.after' => 'A data de cadastro não pode ser anterior a 1900.',
            
            'modelo.required' => 'O campo modelo é obrigatório.',
            'modelo.string' => 'O modelo deve ser um texto.',
            'modelo.max' => 'O modelo deve ter no máximo 255 caracteres.',
            
            'tipo.required' => 'O campo tipo é obrigatório.',
            'tipo.string' => 'O tipo deve ser um texto.',
            'tipo.max' => 'O tipo deve ter no máximo 100 caracteres.',
            
            'ano.required' => 'O campo ano é obrigatório.',
            'ano.integer' => 'O ano deve ser um número inteiro.',
            'ano.between' => 'O ano deve ser entre 1900 e ' . date('Y') . '.',
            
            'valor.required' => 'O campo valor por dia é obrigatório.',
            'valor.numeric' => 'O valor deve ser um número.',
            'valor.min' => 'O valor por dia deve ser maior que zero.',
            
            'foto.required' => 'O campo foto é obrigatório! ',
        ]);
        
        
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            
            $file_name = date("YmdHi").$file->getClientOriginalName();
            $file->move(public_path('assets/images'), $file_name);
            $foto = $file_name;

           
            
        } else {
            dd('Nenhum arquivo enviado.');
        }
        
        
#        $veiculos = Veiculos::create($request->all());

        $veiculos = new Veiculos();
        $veiculos->modelo = $request->input('modelo');
        $veiculos->tipo = $request->input('tipo');
        $veiculos->ano = $request->input('ano');
        $veiculos->data_cadastro = $request->input('data_cadastro');
        $veiculos->valor = $request->input('valor');
        $veiculos->foto = $foto;  // Campo de foto (se houver)


        $veiculos->save();

        session()->flash('success', 'Veículo cadastrado com sucesso!');
        
        return redirect(route("edit",$veiculos->id));
    }

    public function edit(Veiculos $veiculos){
        $list = Veiculos::paginate(20);
        return view("crud",["list"=>$list,"veiculos"=> $veiculos]);

    }

    public function update(Veiculos $veiculos, Request $request){
        $veiculos->update($request->all());
        return back();
    }

    public function delete(Veiculos $veiculos){
        $veiculos->delete();
        return redirect(route('new'));
    }

}
