<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Professor;

class ProfessorController extends Controller
{
    public function index() {
        return view ('cadastrar', ['selecao'=> 'docentes']);
    }

    public function create(Request $req)
    {
        $data = $req->all();

        User::create([
            'name' => $data['nome'],
            'email' => $data['email'],
            'password' => Hash::make('prof123')
        ]);
        
        $user = User::where('name', $data['nome'])
                    ->get()
                    ->first();

        Professor::create([
            'user_id' => $user->id, 
        ]);

        return $this->show();


    }

    public function show()
    {
        $docentes = Professor::all();
        foreach($docentes as $docente){
            $usuarios = User::all();
            foreach($usuarios as $usuario){
                if($usuario->id == $docente->user_id){
                    $professores[] = [
                        'id'      => $docente->id,
                        'nome'    => $usuario->name,
                        'email'   => $usuario->email, 
                    ];
                }
            }
        }
        if(empty($professores)) {
        $professores = null;
        }
        $alunos = null;
        $selecao = 'docentes';
        return view('visualizar', compact('selecao', 'professores', 'alunos'));
    }

    public function delete($id)
    {
        $user_id = Professor::find($id)->user_id;

        Professor::find($id)->delete();
        User::find($user_id)->delete();

         if(empty($professores)) {
        $professores = null;
        }
       
    }

    public function update(Request $req ,$id)
    {
        $data = $req->all();

        $user_id = Professor::find($id)->user_id;

        $update_user = User::find($user_id);
        
        if(isset($data['nome'])){
            $update_user->name = $data['nome'];
            $update_user->save();
        }
        if(isset($data['email'])){
            $update_user->email = $data['email'];
            $update_user->save();
        }
        
      
        
    
       return $this->show();
        
    }
   
}
