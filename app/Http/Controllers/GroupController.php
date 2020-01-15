<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Requset;

use App\User;
use App\Group;
use Illuminate\Support\Facades\Auth;//Auth使うにはこれが必要だった

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //ログインしているユーザーのデータ取得
        $auth = Auth::user();

        $search_check = 0;

        //Groupテーブルの中に自分のidがあるかないかの検索=相手がいるのかいないのかの確認
        $pet_holder  = Group::where('pet_holder_id',$auth->id)->get();

        $pet_keeper  = Group::where('pet_keeper_id',$auth->id)->get();

        if($pet_holder->first() == null && $pet_keeper->first() == null){
            //預ける側でも預かる側でもない場合
            //=Groupテーブルの中に自分のidがない
            //＝相手がいない場合の処理
            $search_check = 1;
            $pet_holders = 1;
            $pet_keepers = 1;
            
            return view('groups.index',['pet_holders'=>$pet_holders,'pet_keepers'=>$pet_keepers,'search_check'=>$search_check]);
        
        } else {
            //Groupテーブルの中に自分のidがある
            //＝相手がいる場合の処理

            //userの中間テーブルを利用してリレーションを組む
            // $users = User::with('petkeeps')->get();
            $users = User::with('petkeepers','petholders')->get();
            // dd($users);
            
            // //ログインしているユーザーのデータ取得
            // $auth = Auth::user();
            // dd($users);
            //配列準備
            
            
            //上記の文ではUsersテーブル全てのレコードを取得しているので
            //その中でも自分のデータとそのお相手のデータのみをpartnerに代入する
            foreach ($users as $user){
                if($user->id == $auth->id){
                    $partners = $user;
                }
            }

            //その相手全員のレコード取得
            
            // dd($partners->petholders);

            $pet_holders = [];

            foreach ($partners->petholders as $petholder){
                // dd($petholder);
                $pet_holders[] = $petholder;
            }
            // dd($pet_holders);

            $pet_keepers = [];

            foreach ($partners->petkeepers as $petkeeper){
                // dd($petkeeper);
                $pet_keepers[] = $petkeeper;
            }
            // dd($pet_keepers);

            //この引数に合わせてあげるようにしてあげる
            // $pet_holder = User::find($group->pet_holder_id);
            // $pet_keeper = User::find($group->pet_keeper_id);

            // return view('groups.index',['pet_holder'=>$pet_holder,'pet_keeper'=>$pet_keeper]);
            
            // if(isset($pet_holders)){
            //     dd($pet_holders);// []と表示されたらisset使える
            // }
            
            // dd($pet_keepers);
            return view('groups.index',['pet_holders'=>$pet_holders,'pet_keepers'=>$pet_keepers,'search_check'=>$search_check]);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $search_check = 0;

        //Groupテーブルの中に自分のidがあるかないかの検索=相手がいるのかいないのかの確認
        // $groups = Group::where('pet_holder_id',$request->pet_holder_id)
        //                 ->where('pet_keeper_id',$request->pet_keeper_id)
        //                 ->get();

        // dd($request->pet_holder_id);4
        // dd($request->pet_keeper_id);8

        //Groupテーブルの中に自分のidがあるかないかの検索=相手がいるのかいないのかの確認
        $pet_holder = Group::where('pet_holder_id',$request->pet_holder_id)->get();
        // dd($pet_holder);
        $pet_keeper = Group::where('pet_keeper_id',$request->pet_keeper_id)->get();
        // dd($pet_keeper);

        //Groupテーブルの中に自分のidがない＝相手がいない場合の処理
        // if($groups->first() == null){
        if($pet_holder->first() == null || $pet_keeper->first() == null){
            //相手がいない場合の処理

            $group = new Group;//新規にレコードを作成する

            $group->pet_holder_id = $request->pet_holder_id;
            $group->pet_keeper_id = $request->pet_keeper_id;
            
            $group->save();

            

            // $pet_holder = User::find($group->pet_holder_id);
            // $pet_keeper = User::find($group->pet_keeper_id);
    
            $users = User::with('petkeepers','petholders')->get();
            // dd($users);

            $auth = Auth::user();

            foreach ($users as $user){
                if($user->id == $auth->id){
                    $partners = $user;
                }
            }

            // dd($partners);


            $pet_holders = [];

            foreach ($partners->petholders as $petholder){
                // dd($petholder);
                $pet_holders[] = $petholder;
            }
            // dd($pet_holders);

            $pet_keepers = [];

            foreach ($partners->petkeepers as $petkeeper){
                // dd($petkeeper);
                $pet_keepers[] = $petkeeper;
            }

            // dd($pet_keeper);
            // dd($pet_holder);
    
            // return view('groups.index',['pet_holder'=>$pet_holder,'pet_keeper'=>$pet_keeper,'search_check'=>$search_check]);

            return view('groups.index',['pet_holders'=>$pet_holders,'pet_keepers'=>$pet_keepers,'search_check'=>$search_check]);
            
        } else {
            //相手がいる場合の処理

        $users = User::with('petkeepers','petholders')->get();
        // dd($users);

        $auth = Auth::user();

        foreach ($users as $user){
            if($user->id == $auth->id){
                $partners = $user;
            }
        }

        // dd($partners);


        $pet_holders = [];

        foreach ($partners->petholders as $petholder){
            // dd($petholder);
            $pet_holders[] = $petholder;
        }
        // dd($pet_holders);

        $pet_keepers = [];

        foreach ($partners->petkeepers as $petkeeper){
            // dd($petkeeper);
            $pet_keepers[] = $petkeeper;
        }

        // dd($pet_keepers);
        

        // $groups = Group::where('pet_holder_id',$auth->id);

        // dd($groups);

        // $group = new Group;

        // $group->pet_holder_id = $request->pet_holder_id;
        // $group->pet_keeper_id = $request->pet_keeper_id;
        
        // $group->save();

        // $pet_holder = User::find($group->pet_holder_id);
        // $pet_keeper = User::find($group->pet_keeper_id);

        // dd($pet_keeper);
        // dd($pet_holder);

        // return view('groups.index',['pet_holder'=>$pet_holder,'pet_keeper'=>$pet_keeper,'search_check'=>$search_check]);

        //以下の形で渡してあげる それぞれを配列にしてから渡す 
        return view('groups.index',['pet_holders'=>$pet_holders,'pet_keepers'=>$pet_keepers,'search_check'=>$search_check]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
