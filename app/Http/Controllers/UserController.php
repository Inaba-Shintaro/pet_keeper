<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pet;
use App\Pettype;
use App\PettypeUser;

use App\Http\Requests\UserRequest;

use Illuminate\Support\Facades\Auth;//Auth使うにはこれが必要だった

use lluminate\Database\Eloquent\Builder;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $auth->load('pets');
        $pet = $auth->pets->first();


        // dd($auth->pets);
        return view('users.index',['auth'=>$auth,'pet'=>$pet]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auth = Auth::user();

        $pettypes = $auth->pettypes;

        $pettype_names = [];
        foreach($pettypes as $pettype){
            $pettype_names[] = $pettype->type_name;
        }
        
        return view('users.edit',['auth'=>$auth,'pettype_names'=>$pettype_names]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $pettype_user_ids = PettypeUser::where('user_id',$user->id)->delete();//一度ペットとユーザーの中間テーブルのレコードを削除する

            foreach( $request->pettypes as  $value ){//ペットの種類の名前が入ってる配列の中のペットの種類の名前だけ取り出す
            
            $pettype = Pettype::where('type_name',$value)->first();//pettypesテーブルから入力されたペットの種類の名前で検索
            
             PettypeUser::create([//新しく中間テーブルを作り直す
                'user_id' => $user->id,
                'pettype_id' => $pettype->id,
                ]);
        }

        if(isset($request->image)){//画像の更新があった場合
            // dd($request->image);
            $file=$request->file('image');
            $fileName=Str::random(20).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300, 200)->save(public_path('images/'.$fileName));
            $user->image=$fileName;    
        }

        if($request->email !== null){//emailの更新があった場合
            // dd($request->email);
            $user->email = $request->email;    
        }


    
        $user->name = $request->name;
        $user->host_experience = $request->host_experience;
        $user->area = $request->area;
        $user->comment = $request->comment;

        $user->save();
        // dd($user);

        $auth = Auth::user();

        $pettypes = $auth->pettypes;

        $pettype_names = [];
        foreach($pettypes as $pettype){
            $pettype_names[] = $pettype->type_name;
        }

        $update = 1;

        return redirect('/');
        // return route('index');
        // return redirect('/',$update);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function account_edit()
    {
        $auth = Auth::user();
        // dd($auth);

        return view('users.account_edit',['auth'=>$auth]);
    }

    public function account_delete()
    {
        $auth = Auth::user();
        
        $auth->delete();

        return redirect('/');
    }

    public function account_email()
    {
        $auth = Auth::user();
        return view('users.account_email',['auth'=>$auth]);
    }
}
