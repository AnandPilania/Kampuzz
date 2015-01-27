<?php

class ArticleCat extends Eloquent {

	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'article_cats';

	/**
	 * The primary key of the table used by the model.
	 *
	 * @var string
	 */
	protected $primaryKey = 'cat_id';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	// protected $hidden = array('password', 'remember_token');

	
	public function articles() {

		return $this->belongsToMany('Article','article_to_cats','cat_id','article_id'); ;
	}

	public function childcats() {

		return ArticleCat::where('parent_id','=',$this->cat_id)->get() ;
	}

}