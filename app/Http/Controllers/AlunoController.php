<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Aluno;
class AlunoController extends Controller
{
    //
    public function index()
    {
        return view('cadastrar', ['selecao' => 'alunos']);
    }
    
    public function create(Request $req)
    {
        $data = $req->all(); //Resgata as informações da requisição
        
        User::create([ //Insere as Informações no Banco Usando o Eloquent
            'name'      =>  $data['nome'],
            'email'     =>  $data['email'],
            'password'  =>  'aluno123',
        ]);

        $user = User::where('name', $data['nome']) //Faz um select aonde o nome for igual ao nome digitado
                    ->get()
                    ->first();

        Aluno::create([ //Cria o "Aluno"
            'numero_matricula'  => date("Y", strtotime(now())).time(),
            'user_id' => $user->id, //Insere o ID de user na tabela Aluno
        ]);
        
        return view('home');
    }

    public function show()
    {
        $alunos = Aluno::all(); //retorna tudo, ou seja, várias arrays, para "pegar os dados" 
        //é preciso fazer um foreach e inseri-los numa outra array
        foreach($alunos as $aluno){
            $discentes[] = $aluno; 
            $usuarios = User::all();
            foreach($usuarios as $usuario){
                if($usuario->id == $aluno->user_id){
                    $users[] = [
                        'id' => $aluno->id, 
                        'numero_matricula' => $aluno->numero_matricula, 
                        'nome' => $usuario->name, 
                        'email' => $usuario->email
                    ];
                }
            }
        }
        $selecao = 'alunos';
        return view('visualizar', compact('selecao', 'users'));
    }
}
