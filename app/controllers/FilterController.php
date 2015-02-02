<?php


class FilterController extends BaseController {


	public function __construct() {

        parent::__construct();
    }

	
	public function cities($text = null) {

		$query = City::orderBy('k_city_id') ;

		if($text) {
			$query->where('city_name','like',$text.'%') ;
		}

		$citylist = $query->get() ;
		if(Request::ajax()) {
		return $view = View::make('filter.city', compact('citylist'));
		}
	}   

 

}