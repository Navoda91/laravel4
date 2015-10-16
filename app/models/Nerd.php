
<?php

    class Nerd extends Eloquent
    {
    	
    	public function groups()
    	{
    		return $this->belongsToMany('Group');
    		//return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    	}
    }

  ?> 