<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CrudController extends Controller {
    public function showData() {
        // $showData = Crud::all();
        // $showData = Crud::latest()->all();
        // $showData = Crud::latest()->paginate( 5 );
        $showData = Crud::latest()->simplepaginate( 5 );
        return view( 'show-data', compact( 'showData' ) );
    }

    public function addData() {
        return view( 'add-data' );
    }

    public function storeData( Request $request ) {
        $rules = [
            'name'  => 'required',
            'email' => 'required|email',
        ];
        $custome_msg = [
            'name.required'  => 'Please enter your name',
            'email.required' => 'Please enter your email',
        ];
        $this->validate( $request, $rules, $custome_msg );

        //store data
        $crud        = new Crud();
        $crud->name  = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session::flash( 'msg', 'Data successfully added' );
        return redirect( '/' );
    }

    public function editData( $id = null ) {
        $editData = Crud::findOrFail( $id );
        return view( 'edit-data', compact( 'editData' ) );
    }

    public function updateData( Request $request, $id ) {
        $rules = [
            'name'  => 'required',
            'email' => 'required|email',
        ];
        $custome_msg = [
            'name.required'  => 'Please enter your name',
            'email.required' => 'Please enter your email',
        ];
        $this->validate( $request, $rules, $custome_msg );

        //store data
        $crud        = Crud::findOrFail( $id );
        $crud->name  = $request->name;
        $crud->email = $request->email;
        $crud->save();
        Session::flash( 'msg', 'Data successfully updated' );
        return redirect( '/' );
    }

    public function deleteData( $id = null ) {
        $deleteData = Crud::findOrFail( $id );
        $deleteData->delete();
        // Session::flash( 'msg', 'Data successfully deleted' );
        return redirect( '/' );
    }
}