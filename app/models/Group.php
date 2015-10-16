<?php

    class Group extends Eloquent
    {
    	
    	public function nerds()
    	{
    		return $this->belongsToMany('Nerd');
    		//return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    	}
    }

  ?> 