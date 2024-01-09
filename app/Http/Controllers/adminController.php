<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;
use App\Models\permissions_roles;
use App\Models\RolesUsers;
use Illuminate\Support\Facades\DB;
use Alert;
use App\Models\Alunos;
use App\Models\Arquitetos;
use App\Models\Canais;
use App\Models\Certificados;
use App\Models\Classes;
use App\Models\Clientes;
use App\Models\Condutor;
use App\Models\Consultas;
use App\Models\Reprogramador;
use App\Models\Turmas;
use Carbon\Carbon;
use File;
use Mail;
use App\Mail\SendMail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;


class adminController extends Controller
{
    public function login()
    {
            //
         return view('conteudos.admin.app_login');
    }

    public function inicio()
    {
            //
         return view('conteudos.app_index');
    }

     public function permissoes()
    {
        $user = Auth::user();

        $permissoes = Permission::all();

        // return $permissoes;
        return view('admin.app_permissions', compact('user', 'permissoes'));
    }

    public function meu_perfil(){

        $user = Auth::user();

        return view('admin.app_meu_perfil', compact('user'));

    }

    public function aceitar_termos()
    {
        $user = Auth::user();
        return view('conteudos.termos.app_aceitar_termos', compact('user'));
    }

    public function visualizar_termos()
    {
        $user = Auth::user();

        return view('conteudos.termos.app_visualizar_termos', compact('user'));
    }

    public function resposta_aceitar_termos($resposta){
        $user = User::find(Auth::id());
        $user->aceitou_termos = $resposta;
        $user->save();


        Alert::toast('Os Termos Foram Aceites Com Sucesso', 'success');
        return redirect('/dashboard');
    }

    public function actualizar_perfil(Request $request){

        $user = Auth::user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $usuario = User::find($user->id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        $usuario->save();


        // Verificando se a foto é válida
        if ($request->foto) {
            $foto = $request->foto;
            $extensaoI =  $foto->getClientOriginalExtension();
            if ($extensaoI!= 'jpg' && $extensaoI!= 'png' && $extensaoI!= 'jpeg' && $extensaoI!= 'JPG' && $extensaoI!= 'PNG' && $extensaoI!= 'JPEG') {
                return back()->with('erro', 'Erro: foto inválida');
            }
        }


         $usuario->save();
        // Guardar a foto na base de dados

         if ($request->foto) {
            File::move($foto, public_path().'/images/usuarios/imag_'.$usuario->id.'.'.$extensaoI);
            $usuario->foto = '/images/usuarios/imag_'.$usuario->id.'.'.$extensaoI;
            $usuario->save();
        }

        // redirecionar para a página inicial
        Alert::toast('usuario Registado Com Sucesso', 'success');

        return back();
    }

    public function dashboard()
    {
        $user = Auth::user();

        $total_usuarios = User::all()->count();
        $total_clientes = Clientes::all()->count();
        $total_classes = Classes::all()->count();
        $total_alunos = Alunos::all()->count();
        $total_turmas = Turmas::all()->count();
        $total_certificados = Certificados::all()->count();
        $total_arquitetos = Arquitetos::all()->count();
        $total_canais = Canais::all()->count();
        $total_consultas = Consultas::all()->count();
        $total_condutores = Condutor::all()->count();
        $total_reprogramadores = Reprogramador::all()->count();

        return view('dashboard', compact('user','total_usuarios','total_clientes','total_classes'
        ,'total_alunos','total_turmas','total_certificados','total_arquitetos','total_canais'
        ,'total_consultas','total_condutores','total_reprogramadores'));

    }

    public function baixar_apostila(){

        $user = Auth::user();

        $aluno = Alunos::where('usuario_id', $user->id)->first();

        return view('conteudos.apostilas.app_baixar_apostila', compact('user','aluno'));
    }

    public function enviar_email(){

        $user = Auth::user();

        $testMailData = [
            'title' => 'Test Email From AllPHPTricks.com',
            'body' => 'This is the body of test email.'
        ];

        Mail::to('pauloagostinhocarlos.carlos@gmail.com')->send(new SendMail($testMailData));

        return back();
    }

    public function criar_token_acesso(Request $request)
    {
        // Dados para obtenção do token de acesso
        $tokenData = [
            "grantType" => "clientCredentials",
            "clientId" => "658ac491d8c83f000baa71a2",
            "clientSecret" => "hSvorvY1MufROv9n7xl8ArTWHlAgZoneMPCnCltOEd5iCqxOS45k5J6HGzrCvb8TKTNUhhvkIafUpfNeRzG4fZkM4vr9a1XlQHKw9eQkEgCF4g3uV0OyxxGNSLDhuSMFrwvjW2d6P0UZrZoBhorAAkZJLdrdN46YtugoohPSN7lxS97rHRbERdvlCEBNbXajNPbrY34tomSOtia7usg8TxH3FUsQ6yLFIDnJTbt8zQ5pMCrJgITb3X5CDm1sh3vT",
            "scopes" => ["invoice", "paymentLink"]
        ];

        try {
            // Solicitação para obter o token de acesso
            $tokenResponse = Http::post('https://sandbox-auth-pay.lytex.com.br/v1/oauth/obtain_token', $tokenData);

            return $tokenResponse;

            // Verifica se a resposta foi bem-sucedida (código 2xx)
            if ($tokenResponse->successful()) {
                // Extrai o token de acesso da resposta
                $accessToken = $tokenResponse->json('access_token');




            } else {
                // Lida com a resposta de erro na obtenção do token
                return response("Erro ao obter o token de acesso: " . $tokenResponse, $tokenResponse->status());
            }
        } catch (\Throwable $th) {
            // Lida com exceções
            return response("Erro na solicitação: " . $th->getMessage(), 500);
        }
    }


    public function logout()
    {

        Session::flush();

        Auth::logout();

        return redirect('login');
    }


    public function roles_users(){
        $user = Auth::user();

        $roles = Role::all();
        $users = User::all();

        $roles_users = DB::table('roles_users')
        ->rightJoin('roles', 'roles.id', '=', 'roles_users.role_id')
        ->select('roles_users.*','roles.id as role_id','roles.name as role_name')
        ->distinct()
        ->get();

        // return $roles_users;
        return view('admin.app_roles_users', compact('roles','roles_users','users','user'));

    }
    public function permissions_roles(){
        $user = Auth::user();


        $role_id = 1;
        $roles = Role::all();
        $permissions = Permission::all();

        $permissions_roles = permissions_roles::where('role_id','=', 1)
        ->join('permissions', 'permissions.id', '=', 'permissions_roles.permission_id')
        ->select('permissions.*','permissions_roles.*')
        ->get();

        $selected = [];

        foreach ($permissions_roles as $option) {
            $selected[] = $option->name;
        }

        return view('admin.app_permissions_roles', compact('user','permissions_roles', 'role_id', 'roles', 'selected'));
    }

    public function permissions_roles_by_id($id){

        $user = Auth::user();

        $role_id = $id;
        $roles = Role::all();
        $permissions = Permission::all();

        $permissions_roles = permissions_roles::where('role_id','=', $role_id)
        ->join('permissions', 'permissions.id', '=', 'permissions_roles.permission_id')
        ->select('permissions.*','permissions_roles.*')
        ->get();

        $selected = [];

        foreach ($permissions_roles as $option) {
            $selected[] = $option->name;
        }

        return view('admin.app_permissions_roles', compact('user','permissions_roles', 'role_id', 'roles', 'selected'));
    }


    public function salvar_permissions_roles(Request $request)
    {
        // ================ PERMISSÃO PARA VISUALIZAR ========================
        if($request->visualizacao)
        {
            foreach ($request->visualizacao as $option) {

                $permissao_id = Permission::where('name', $option)->first();

                if(!$permissao_id){
                    $permissao = new Permission();
                    $permissao->name = $option;
                    $permissao->description = $option;
                    $permissao->save();
                }

                $permissao_id = Permission::where('name', $option)->first()->id;

                $localizar = permissions_roles::where('permission_id', $permissao_id)
                ->where('role_id', $request->role_id)->first();
                if(!$localizar){
                    $roles = new permissions_roles();
                    $roles->permission_id = $permissao_id;
                    $roles->role_id = $request->role_id;

                    $roles->save();
                }
            }

            $permissoes_visualizar = Permission::where('name', 'like', '%visualizar%')->get();

            foreach ($permissoes_visualizar as $item) {
                if (!in_array($item->name, $request->visualizacao)) {
                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
                }
            }
        }
        else{

            $permissoes_visualizar = Permission::where('name', 'like', '%visualizar%')->get();
            foreach ($permissoes_visualizar as $item) {

                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();

                    echo $item->id." - ";
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);

                    }
            }
        }


        // ================ PERMISSÃO PARA CADASTRAR ========================
        if($request->inclusao)
        {
            foreach ($request->inclusao as $option) {

                $permissao_id = Permission::where('name', $option)->first();

                if(!$permissao_id){
                    $permissao = new Permission();
                    $permissao->name = $option;
                    $permissao->description = $option;
                    $permissao->save();
                }

                $permissao_id = Permission::where('name', $option)->first()->id;

                $localizar = permissions_roles::where('permission_id', $permissao_id)
                ->where('role_id', $request->role_id)->first();
                if(!$localizar){
                    $roles = new permissions_roles();
                    $roles->permission_id = $permissao_id;
                    $roles->role_id = $request->role_id;

                    $roles->save();
                }
            }

            $permissoes_visualizar = Permission::where('name', 'like', '%registrar%')->get();

            foreach ($permissoes_visualizar as $item) {
                if (!in_array($item->name, $request->inclusao)) {
                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
                }
            }

        }
        else{

            $permissoes_visualizar = Permission::where('name', 'like', '%registrar%')->get();
            foreach ($permissoes_visualizar as $item) {

                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();

                    echo $item->id." - ";
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
            }
        }

        // // ================ PERMISSÃO PARA EDITAR ========================
        if($request->edicao)
        {
            foreach ($request->edicao as $option) {

                $permissao_id = Permission::where('name', $option)->first();

                if(!$permissao_id){
                    $permissao = new Permission();
                    $permissao->name = $option;
                    $permissao->description = $option;
                    $permissao->save();
                }

                $permissao_id = Permission::where('name', $option)->first()->id;

                $localizar = permissions_roles::where('permission_id', $permissao_id)
                ->where('role_id', $request->role_id)->first();
                if(!$localizar){
                    $roles = new permissions_roles();
                    $roles->permission_id = $permissao_id;
                    $roles->role_id = $request->role_id;

                    $roles->save();
                }
            }

            $permissoes_visualizar = Permission::where('name', 'like', '%editar%')->get();

            foreach ($permissoes_visualizar as $item) {
                if (!in_array($item->name, $request->edicao)) {
                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
                }
            }



        }
        else{

            $permissoes_visualizar = Permission::where('name', 'like', '%editar%')->get();
            foreach ($permissoes_visualizar as $item) {

                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();

                    echo $item->id." - ";
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);

                    }

            }
        }

        // // ================ PERMISSÃO PARA EXCLUIR ========================
        if($request->exclusao)
        {
            foreach ($request->exclusao as $option) {

                $permissao_id = Permission::where('name', $option)->first();

                if(!$permissao_id){
                    $permissao = new Permission();
                    $permissao->name = $option;
                    $permissao->description = $option;
                    $permissao->save();
                }

                $permissao_id = Permission::where('name', $option)->first()->id;

                $localizar = permissions_roles::where('permission_id', $permissao_id)
                ->where('role_id', $request->role_id)->first();
                if(!$localizar){
                    $roles = new permissions_roles();
                    $roles->permission_id = $permissao_id;
                    $roles->role_id = $request->role_id;

                    $roles->save();
                }
            }

            $permissoes_visualizar = Permission::where('name', 'like', '%eliminar%')->get();

            foreach ($permissoes_visualizar as $item) {
                if (!in_array($item->name, $request->exclusao)) {
                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);
                    }
                }
            }
        }
        else{

            $permissoes_visualizar = Permission::where('name', 'like', '%eliminar%')->get();
            foreach ($permissoes_visualizar as $item) {

                    $localizar_id_ignorado = permissions_roles::where('permission_id', $item->id)
                        ->where('role_id', $request->role_id)
                        ->first();

                    echo $item->id." - ";
                    if ($localizar_id_ignorado) {

                        permissions_roles::destroy($localizar_id_ignorado->id);

                    }

            }
        }

        Alert::toast('Alteração efetuada Com Sucesso', 'success');
        return back();
    }

    public function salvar_roles_users(Request $request)
    {
        //
        $roles = new RolesUsers();
        $roles->user_id = $request->user_id;
        $roles->role_id = $request->role_id;

        $roles->save();

        Alert::toast('Alteração efetuada Com Sucesso', 'success');
        return $roles;
    }

    public function actualizar_roles_users(Request $request)
    {
        //
        $user_id = RolesUsers::where('user_id', $request->user_id)->first();

        if($user_id){
            $roles = RolesUsers::find($user_id->id);
            $roles->user_id = $request->user_id;
            $roles->role_id = $request->role_id;

            $roles->save();

            return $roles;
        }
        else{

            $roles = new RolesUsers();
            $roles->user_id = $request->user_id;
            $roles->role_id = $request->role_id;

            $roles->save();

            return $roles;
        }

        Alert::toast('Alteração efetuada Com Sucesso', 'success');
        return back();
    }
}
