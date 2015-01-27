<?php

class ArticleController extends BaseController {

	
	public function articles($id) {

		//$menu = \App::make('MenuController')->menu();
		$total = ArticleCat::find($id)->articles()->count() ;
		//$thisObject = $this->paginationObject($total) ;

		

		$articlelist = ArticleCat::where('cat_id','=',$id)->first() ;
		return View::make('articles.articles',array(
								//		'menu' =>$menu,
										'list'=>$articlelist)) ;

	}



	public function articleDetails($id) {

		//$menu = \App::make('MenuController')->menu();
		$articlelist = Article::where('article_id','=',$id)->first() ;
		
		$catlist = $this->articleCat() ;
		return View::make('articles.article_details',array(	//'menu' =>$menu,
															'article'=>$articlelist,'catlist'=>$catlist)) ;
	}

	
	public function articleCat() {

		$articlecat = ArticleCat::where('show_nav','=',1)->where('parent_id','=',0)->get() ;
		return View::make('articles.articlecatlist',array('catlist'=>$articlecat)) ;
	}
	


}
