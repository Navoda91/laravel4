<?php

class NerdController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		// get all the nerds
        $nerds = Nerd::all(); 

  //       echo '<pre>';
		// print_r($nerds);
		// exit();

        // load the view and pass the nerds
        return View::make('nerds.index')
            ->with('nerds', $nerds);

		//echo $_SERVER["APP_DB"];
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//Collection
		// $arr = [
		// 	[
		// 		'name' => 'dsads asd ad',
		// 		'age' => 50,
		// 	],
		// 	[
		// 		'name' => 'dsads hkgkgasd ad',
		// 		'age' => 34,
		// 	],
		// 	[
		// 		'name' => 'dsadsrtyr asd ad',
		// 		'age' => 23,
		// 	],
		// 	[
		// 		'name' => 'dssd asd aads asd ad',
		// 		'age' => 40,
		// 	],
		// ];

		// echo '<pre>';
		// print_r($arr);

		// $col = new \Illuminate\Support\Collection($arr);
		// print_r($col);
		// print_r($col->lists('name', 'age'));

		$group_list = Group::where('status', 1)->lists('name', 'id');

		// load the create form (app/views/nerds/create.blade.php)
        return View::make('nerds.create')
        			 ->with('group_list', $group_list);

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		// echo "<pre/>";
		// print_r(Input::all());
		// exit();

		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric',
            'nerd_groups' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('nerds/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = new Nerd;
            $nerd->name       = Input::get('name');
            $nerd->email      = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();

         	$nerd->groups()->attach(Input::get('nerd_groups'));

            // redirect
            Session::flash('message', 'Successfully created nerd!');
            return Redirect::to('nerds');
        }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//

		// get the nerd
        $nerd = Nerd::find($id);
        //$groups = array();

        // echo "<pre/>";
		// print_r($nerd->groups());
		// exit();

        // show the view and pass the nerd to it
        return View::make('nerds.show')
            ->with('nerd', $nerd);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//

		// get the nerd
        $nerd = Nerd::find($id);

        $group_list = Group::where('status', 1)->lists('name', 'id');

        // show the edit form and pass the nerd
        return View::make('nerds.edit')
            ->with(array(

            	'nerd' => $nerd, 
            	'group_list' => $group_list  

            ));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//

		// validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'nerd_level' => 'required|numeric',
            'nerd_groups' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('nerds/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $nerd = Nerd::find($id);
            $nerd->name       = Input::get('name');
            $nerd->email      = Input::get('email');
            $nerd->nerd_level = Input::get('nerd_level');
            $nerd->save();

            $nerd->groups()->sync(Input::get('nerd_groups'));

            // redirect
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('nerds');
        }

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//

		// delete
        $nerd = Nerd::find($id);
        $nerd->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the nerd!');
        return Redirect::to('nerds');
	}


}
