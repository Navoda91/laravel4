<?php

class GroupController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all the groups
		$groups = Group::all();

		// print_r($groups);
		// exit();

		//load the view and pass the groups 
		return View::make('groups..index')
					->with('groups',$groups);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

		return View::make('groups.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		//validate
		$rules = array(
			'name' => 'required' ,
			'description' => 'required',
			
		);

		$validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('groups/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
            $group = new Group;
            $group->name = Input::get('name');
            $group->description = Input::get('description');
            $group->status = Input::has('status'); 
            $group->save();

            // redirect
            Session::flash('message', 'Successfully created the group!');
            return Redirect::to('groups');
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

		$group = Group::find($id);

		return View::make('groups.show')
				->with('group',$group);
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

		$group = Group::find($id);

		return View::make('groups/edit')
			->with('group', $group);
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

		$rules = array(
			'name' => 'required' ,
			'description' => 'required',
			
		);

		$validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('groups/'.$id.'/update')
                ->withErrors($validator)
                ->withInput(Input::all());
        } else {
            // store
         
            $group = Group::find($id);
            $group->name = Input::get('name');
            $group->description = Input::get('description');
            $group->status = Input::has('status');
            $group->save();

            // redirect
            Session::flash('message', 'Successfully updated the group!');
            return Redirect::to('groups');
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

		$group = Group::find($id);
        $gcount = Group::find($id)->nerds()->count('*');
		// echo "<pre/>";
		// print_r($group);
		// exit();

		if ($gcount == 0)
		{
			$group->delete();
			Session::flash('message', 'Successfully deleted the group!');
		}
		else
		{
			Session::flash('message', 'Cannot delete the group! Because there are nerds assigned to it.');
		}


        // redirect
        return Redirect::to('groups');


	}


}
