<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Aluno;
use App\roles_user;
use Illuminate\Support\Facades\Hash;

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
            'password'  =>  Hash::make('aluno123'),
        ]);

        $user = User::where('name', $data['nome']) //Faz um select aonde o nome for igual ao nome digitado
                    ->get()
                    ->first();

        Aluno::create([ //Cria o "Aluno"
            'numero_matricula'  => date("Y", strtotime(now())).time(), //O número de matricula é uma fusão entre o numero gerado pela data atual juntamente com a hora exata que ele foi criado
            'user_id' => $user->id, //Insere o ID de user na tabela Aluno
        ]);
        
        roles_user::create([
            'user_id'   => $user->id,
            'roles_id'  => '4' 
        ]);

        return $this->show();
    }

    public function show()
    {
        $discentes = Aluno::all(); //retorna tudo, ou seja, várias arrays, para "pegar os dados" 
        //é preciso fazer um foreach e inseri-los numa outra array
        foreach($discentes as $discente){
            $usuarios = User::all();
            foreach($usuarios as $usuario){
                if($usuario->id == $discente->user_id){
                    $alunos[] = [
                        'id'                => $discente->id, 
                        'numero_matricula'  => $discente->numero_matricula, 
                        'nome'              => $usuario->name, 
                        'email'             => $usuario->email
                    ];
                }
            }
        }
        if(empty($alunos)){
            $alunos = null; //Se o banco estiver limpo, essa array vazia garantirá a exibição da tela
        }
        $selecao = 'alunos';
        return view('visualizar', compact('selecao', 'alunos'));
    }

    public function delete($id)
    {
        $user_id = Aluno::find($id)->user_id;

        Aluno::find($id)->delete();
        User::find($user_id)->delete();

        return $this->show();
    }

    public function update(Request $req ,$id)
    {
        $data = $req->all();

        $user_id = Aluno::find($id)->user_id;

        $update_aluno = Aluno::find($id);
        $update_user = User::find($user_id);
        
        if(isset($data['nome'])){
            $update_user->name = $data['nome'];
            $update_user->save();
        }
        if(isset($data['email'])){
            $update_user->email = $data['email'];
            $update_user->save();
        }
        if(isset($data['matricula']) && $data['matricula'] != 2020){
            if(strlen($data['matricula']) == 14){ //Verifica se o número de matrícula é um número de 14 digitos
                $update_aluno->numero_matricula = $data['matricula'];
                $update_aluno->save();
            }else{
                return redirect()->route('editar_aluno', $id);
            }
        }

        return $this->show();
    }

    public static function quantidade()
    {
        $quantidade = Aluno::all()->count();
        return $quantidade;
    }
}
