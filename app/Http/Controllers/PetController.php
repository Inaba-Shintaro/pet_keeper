<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Pet;
use App\Pettype;

use Illuminate\Support\Facades\Auth;//Auth使うにはこれが必要だった

use lluminate\Database\Eloquent\Builder;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Str;

use App\Http\Requests\PetRequest;



class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pettypes = Pettype::all();

        return view('pets.create',['pettypes'=>$pettypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PetRequest $request)
    {

        $pet = new Pet;//さらのPostレコードを作成

        $pet->user_id = $request->user_id;
        $pet->pettype_id = $request->pettype_id;
        $pet->name = $request->name;
        $pet->gender = $request->gender;
        $pet->characteristic = $request->characteristic;

        if(isset($request->image)){
        $file=$request->file('image');
        $fileName=Str::random(20).'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(300, 200)->save(public_path('images/'.$fileName));
        $pet->image=$fileName;
        }

        $pet->save();//新しいレコードをペットテーブルにインサート

        $auth = Auth::user();//ログイン中のユーザーをマイページに渡す

        $pet = Pet::all();//ペットの全レコードを取得
        
        $pet->load('user','pettype');//petモデルのrelationをもとに、relationされているレコードの値も一緒にview渡すため
        
        $pet = Pet::where('user_id',$auth->id)->first();//ペットレコードからログイン中のユーザーのペットをマイページに渡す

        return view('users.index',['pet'=>$pet,'auth'=>$auth]);
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
    public function edit(Pet $pet)
    {
        $pet = Pet::find($pet->id);
        // dd($pet);

        $pettypes = Pettype::all();
        // dd($pettypes);

        return view('pets.edit',['pet'=>$pet,'pettypes'=>$pettypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PetRequest $request, Pet $pet)
    {


        if(isset($request->image)){
            $file=$request->file('image');
            $fileName=Str::random(20).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300, 200)->save(public_path('images/'.$fileName));
            $pet->image=$fileName;    
        } else {

        }

        $pet->user_id = $request->user_id;
        $pet->pettype_id = $request->pettype_id;
        $pet->name = $request->name;
        $pet->gender = $request->gender;
        $pet->characteristic = $request->characteristic;

        
        $pet->save();
        // dd($user);

        $auth = Auth::user();//ログイン中のユーザーをマイページに渡す

        $pet = Pet::all();//ペットの全レコードを取得
        
        $pet->load('user','pettype');//petモデルのrelationをもとに、relationされているレコードの値も一緒にview渡すため
        
        $pet = Pet::where('user_id',$auth->id)->first();//ペットレコードからログイン中のユーザーのペットをマイページに渡す

        return view('users.index',['pet'=>$pet,'auth'=>$auth]);

        // return redirect('/');
        // return view('users.index',['pet'=>$pet,'auth'=>$auth]);
        // return route('users.index',['petupdate'=>$petupdate]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {

        $pet->delete();

        // return route('index');
        return redirect('/');
    }
}
