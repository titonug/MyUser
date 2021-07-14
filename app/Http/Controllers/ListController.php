<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DataTables;
use Exception;

class ListController extends Controller
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
            $title = "Index";
            $titleContent = "Selamat Datang";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url . 'users');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $list = curl_exec($curl);
            curl_close($curl);
            Log::channel('mylog')->info('Endpoint API' . $url . 'users', ['All userID', 'Result:Success']);

            $data = json_decode($list, TRUE);
            return view('list.index')
                ->with('data', $data)
                ->with('title', $title)
                ->with('titleContent', $titleContent);
        } catch (Exception $exception) {
            Log::channel('mylog')->info('Endpoint API' . $url . 'users', ['All userID', 'Result:Error']);
            return "Not Found";
        }
    }

    // public function json(Request $request)
    // {
    //     //if ($request->ajax()) {

    //         $title = "Index";
    //         $titleContent = "Selamat Datang";

    //         $curl = curl_init(); 
    //         curl_setopt($curl, CURLOPT_URL, "https://jsonplaceholder.typicode.com/users/");
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
    //         $list = curl_exec($curl); 
    //         curl_close($curl);
    //         $data = json_decode($list, TRUE);
    //         // dd($data);
    //         $dataTables = Datatables::of($list)->addIndexColumn()
    //             ->addColumn('action', function($row){
    //                $btn = '<a href="list/'.$row->id.'" class="edit btn btn-info btn-sm">View</a>';
    //                 return $btn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);


    //         return $dataTables;
    //         // return Datatables::of($data)
    //         //         ->addIndexColumn()
    //         //         ->addColumn('action', function($row){

    //         //                $btn = '<a href="list/'.$row->id.'" class="edit btn btn-info btn-sm">View</a>';
    //         //                 return $btn;
    //         //         })
    //         //         ->rawColumns(['action'])
    //         //         ->make(true);
    //    //}

    //     //return view('bookings.index');
    //     // $dataTables = DataTables::of($data)->make(true);
    //     // return ($dataTables);
    // }


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
        try {
            $url = env('JSON_BASE_URL');
            $title = "Show";
            $titleContent = "This is information about";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url . "users/" . $id);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $list = curl_exec($curl);
            curl_close($curl);
            Log::channel('mylog')->info('Endpoint API' . $url . 'users/' . $id, ['userID=' . $id, 'Result:Success']);
            $data = json_decode($list, TRUE);

            $curl2 = curl_init();
            curl_setopt($curl2, CURLOPT_URL, $url . "posts?userId=" . $id);
            curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
            $list2 = curl_exec($curl2);
            curl_close($curl2);
            Log::channel('mylog')->info('Endpoint API' . $url . 'posts/' . $id, ['userID=' . $id, 'Result:Success']);
            $data2 = json_decode($list2, TRUE);

            return view('list.show')
                ->with('data', $data)
                ->with('data2', $data2)
                ->with('titleContent', $titleContent)
                ->with('title', $title);
        } catch (Exception $exception) {
            Log::channel('mylog')->info('Endpoint API' . $url . 'users/' . $id, ['userID=' . $id, 'Result:Error']);
            return "Not Found";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $url = env('JSON_BASE_URL');
            $title = "Edit";
            $titleContent = "Edit";

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url . 'users/' . $id);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $list = curl_exec($curl);
            curl_close($curl);
            Log::channel('mylog')->info('Endpoint API' . $url . 'users/' . $id, ['userID=' . $id, 'Result:Success']);

            $data = json_decode($list, TRUE);

            return view('list.edit')
                ->with('data', $data)
                ->with('title', $title)
                ->with('titleContent', $titleContent);
        } catch (Exception $exception) {
            Log::channel('mylog')->info('Endpoint API' . $url . 'users/' . $id, ['userID=' . $id, 'Result:Error']);
            return "Not Found";
        }
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
        $json = ['name' => $request->input('name'), 'email' => $request->input('email'), 'phone' => $request->input('phone')];
        dd($json);
        return redirect()->action('ListController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->action('ListController@index');
    }
}
