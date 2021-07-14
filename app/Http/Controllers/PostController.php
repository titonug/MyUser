<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $url = env('JSON_BASE_URL');
            $curl2 = curl_init();
            curl_setopt($curl2, CURLOPT_URL, $url . "posts?userId=" . Auth::user()->id);
            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
            $list2 = curl_exec($curl2);
            curl_close($curl2);
            $data = json_decode($list2, TRUE);

            $user = DB::table('users')->where('id', Auth::user()->id)->first();
            $title = "Index";
            $titleContent = "Hello User";

            Log::channel('mylog')->info('Endpoint API' . $url . 'users', ['get', 'Result:Success']);
            return view('list.post')
                ->with('user', $user)
                ->with('data', $data)
                ->with('title', $title)
                ->with('titleContent', $titleContent);
        } catch (Exception $exception) {
            Log::channel('mylog')->info('Endpoint API' . $url . 'users', ['get', 'Result:Error']);
            return "Not Found";
        }
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
    public function store(Request $request)
    {

        // $json = ['userId' => Auth::user()->id, 'id' => '100', 'title' => $request->input('title'), 'body' => $request->input('post')];
        // dd($json);
        // return redirect()->action('ListController@index');
        try {

            $url = env('JSON_BASE_URL');

            $curl2 = curl_init();

            $data_array =  array(
                "userId"        => Auth::user()->id,
                "title"     => $request->input('title'),
                "body"      => $request->input('post')
            );
            $headers = [
                "Content-Type: 'application/json; charset=UTF-8'"
            ];

            curl_setopt($curl2, CURLOPT_URL, $url . "posts?userId=" . Auth::user()->id);
            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl2, CURLOPT_POSTFIELDS, json_encode($data_array));
            //curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers);
            $list2 = curl_exec($curl2);

            curl_close($curl2);
            $data = json_decode($list2, TRUE);
            Log::channel('mylog')->info('Endpoint API' . $url . 'posts?userId=' . Auth::user()->id, ['get', 'Result:Success']);

            dd($data);

            return redirect()->action('ListController@index');
        } catch (Exception $exception) {
            Log::channel('mylog')->info('Endpoint API' . $url . 'posts', ['get', 'Result:Error']);
            return "Not Found";
        }
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
