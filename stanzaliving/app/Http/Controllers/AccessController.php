<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Role;
class AccessController extends Controller
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
          return view('pages.admin.access.addaccess');
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

        return 'storing';
        //return $request->all();
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

      //  return $id;

        $role=Role::findOrFail($id);

        $role->access_level=unserialize($role->access_level);
        //print_r($role->access_level);
        return view('pages.admin.access.editaccess',compact('role'));
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

         //print_r($id);
        
        $role=Role::findOrFail($request->role_id);

       // $role
        Role::where('id', $request->role_id)
        
          ->update(

            [
            'access_name' => $request->access_name,
            'access_level'=>serialize($request->parentcheckbox)

            ]);
            \Session::flash('message','Role Successfully Updated !');
            return \Redirect('admin/access/list');
        //return $role;
    //   dd($request->all());
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

    public function view_list(Request $request)

    {

        $roles=Role::all();

        return view('pages.admin.access.accesslist',compact('roles'));

    }

       public function save(Request $request)
    
    {

       // echo 'store';

             $this->validate($request, [
       
            'access_name' => 'required',
            'parentcheckbox'=> 'required',

                   ]);
              
           // $myjson3= serialize($_POST['parentcheckbox']);
           //          //$myjson4=unserialize($myjson3);
           //      print_r($myjson4);
           //      die();
                //echo serialize($myjson3);
               //  print_r($_POST['parentcheckbox']);


    //                return $_POST['parentcheckbox'];


               // print_r(json_decode($myjson1));
                //echo $myjson2;
                // echo "<pre>";
                // return  '$myjson2';

                // foreach ($myjson2 as $key => $value) {

                //     echo $key;

                //     # code...
                // }

           //     return  $myjson->toArray();  
           //  print_r($_POST['parentcheckbox']);
              //echo json_encode($_POST['parentcheckbox'],true);

          //    die();

             //    $data=$_POST['parentcheckbox'];
             
                
             // return json_decode($data);
             // //echo json_encode($request->parentcheckbox);
             // die();
        $access= new Role;

        $access->access_name=$_POST['access_name'];
        $access->access_level=serialize($_POST['parentcheckbox']);
            

            // $rol=serialize($_POST['parentcheckbox']);

            // return $rol;
        $access->save();

        \Session::flash('message','Role Successfully Saved !');
        return \Redirect::back();
        //return $request->all();
        //
    }

  
}
