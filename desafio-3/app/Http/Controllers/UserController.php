<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\User;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
 
        $search = $request->get('search');
        
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5;
        $offset = ($currentPage * $perPage) - $perPage;
        
        $users = User::select(
            'users.name',
            'users.email',
            'users.password',
            'users.dt_nascimento',
            'users.id'
        )->distinct();
        
        if($search){
            $users
            ->where('users.name', 'LIKE', '%' . $search . '%')
            ->orWhere('users.email', 'LIKE', '%'.$search.'%')
            ->orWhere('users.password','LIKE',"%{$search}%")
            ->orWhere('users.dt_nascimento','LIKE',"%{$search}%")
            ->orWhere('users.id','LIKE',"%{$search}%");
        }
        
        $totalRows = $users->count();
        
        $users->offset($offset)
            ->limit($perPage);
        
        // Paginador
        $options = ['query'=>['search'=>$request->search]];
        $paginatedItems= new LengthAwarePaginator($users->get() , $totalRows, $perPage, $currentPage, $options);
        $paginatedItems->setPath($request->url());
        
        //return view('users.index',compact('users', 'search'));
        return view('users.index',['users' => $paginatedItems,'search'=>$search]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'dt_nascimento' => 'required'
        ]);

       User::create($request->only('email', 'name', 'password','dt_nascimento')); //Retrieving only the email and password data

        return redirect()->route('users.index')
                        ->with('flash_message', 'Usuário cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return redirect('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6|confirmed',
            'dt_nascimento' => 'required'
        ]);
        
        $input = $request->only(['name', 'email', 'password','dt_nascimento']); //Retreive the name, email and password fields
        $user->fill($input)->save();
        
        return redirect()->route('users.index')
                        ->with('flash_message', 'Usuário editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $id = $request->all()["id"];
        //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
                        ->with('flash_message', 'Usuário Excluído com sucesso!');
    }

}
