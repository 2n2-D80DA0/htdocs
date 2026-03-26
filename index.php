<?php
require_once("vendor/autoload.php");

use Api\FilmController;
use Core\Router;
use Controller\Admin;
use Controller\Film;
use Controller\User;
use Controller\Person;
use Controller\Property;

echo "<pre>";
// films





PagesController

FilmController
PropertiesController
CommunionController

PersonPages
PersonController
CommentController
RatingController
userPages
userController


Router::get("/404", 				[PagesController::class,"error404"]);
Router::get("/logout", 			[PagesController::class,"logout"]);
Router::get("/home", 				[PagesController::class,"home"]);


Router::get("/film/([0-9]+)", 					[FilmController::class,"watch"]);									//страница фильма просмотр

Router::get("/film/([0-9]+)/edit", 			[FilmController::class,"edit"])->only('admin');		//страница изменения фильма для админа
Router::get("/film/make", 							[FilmController::class,"make"])->only('admin');		//страница создания фильма для админа

Router::post("/film", 									[FilmController::class,"addFilm"])->only('admin');			//запрос cоздание фильма 
Router::patch("/film/([0-9]+)", 				[FilmController::class,"updateFilm"])->only('admin');		//изменения чего-то в фильме от админа
Router::get("admin/film/([0-9]+)/delete", 		[FilmController::class,"desreoy"])->only('admin');			//удаления фильма из базы
Router::get("/film/([0-9]+)/comments", 	[FilmController::class,"getComments"]); 	// получить комментарии к фильму

// проперти фильма языки, жанры, асоциации
Router::get("/Lang", 																[PropertiesController::class,"getLanguages"])->only('admin');
Router::post("/Lang/([0-9]+)", 											[PropertiesController::class,"addLanguages"])->only('admin');
Router::get("/Lang/([0-9]+)/delete", 										[PropertiesController::class,"delLanguages"])->only('admin');
Router::get("/genres", 															[PropertiesController::class,"getGenres"])->only('admin');
Router::post("/genres/([0-9]+)", 										[PropertiesController::class,"addGenres"])->only('admin');
Router::get("/genres/([0-9]+)/delete", 									[PropertiesController::class,"delGenres"])->only('admin');
Router::get("/associacia", 													[PropertiesController::class,"getAssociacia"])->only('admin');
Router::post("/associacia/([0-9]+)", 								[PropertiesController::class,"addAssociacia"])->only('admin');
Router::get("/associacia/([0-9]+)/delete", 							[PropertiesController::class,"delAssociacia"])->only('admin');
Router::get("/countries", 													[PropertiesController::class,"getCountries"])->only('admin');
Router::post("/countries/([0-9]+)", 								[PropertiesController::class,"addCountries"])->only('admin');
Router::get("/countries/([0-9]+)/delete", 							[PropertiesController::class,"delCountries"])->only('admin');
Router::post("/film/([0-9]+)/language/([0-9]+)", 		[PropertiesController::class,"addLang"])->only('admin');
Router::get("/film/([0-9]+)/language/([0-9]+)/delete", 	[PropertiesController::class,"delLang"])->only('admin');
Router::post("/film/([0-9]+)/genres/([0-9]+)", 			[PropertiesController::class,"addGenres"])->only('admin');
Router::get("/film/([0-9]+)/genres/([0-9]+)/delete", 		[PropertiesController::class,"delGenres"])->only('admin');
Router::post("/film/([0-9]+)/associacia/([0-9]+)", 	[PropertiesController::class,"addAssociacia"])->only('admin');
Router::get("/film/([0-9]+)/associacia/([0-9]+)/delete",[PropertiesController::class,"delAssociacia"])->only('admin');
Router::post("/film/([0-9]+)/countries/([0-9]+)", 	[PropertiesController::class,"addCountries"])->only('admin');
Router::get("/film/([0-9]+)/countries/([0-9]+)/delete", [PropertiesController::class,"delCountries"])->only('admin');

// причастие человека к фильму
Router::post("/film/([0-9]+)/actor/([0-9]+)", 		[CommunionController::class,"addActor"])->only('admin');
Router::get("/film/([0-9]+)/actor/([0-9]+)/delete", 	[CommunionController::class,"delActor"])->only('admin');
Router::post("/film/([0-9]+)/producer/([0-9]+)", 	[CommunionController::class,"addProducer"])->only('admin');
Router::get("/film/([0-9]+)/producer/([0-9]+)/delete",[CommunionController::class,"delProducer"])->only('admin');
Router::post("/film/([0-9]+)/director/([0-9]+)", 	[CommunionController::class,"addDirector"])->only('admin');
Router::get("/film/([0-9]+)/director/([0-9]+)/delete",[CommunionController::class,"delDirector"])->only('admin');

//создание персон для сайта
Router::get("/persons", 							[page::class,"persons"]);
Router::get("/person/([0-9]+)", 			[PersonPages::class,"watch"]);								//страница персоны просмотр
Router::get("/person/([0-9]+)/edit", 	[PersonPages::class,"edit"])->only('admin');	//страница изменения персоны для админа
Router::get("/person/make", 					[PersonPages::class,"make"])->only('admin');	//страница создания персоны для админа

// персоны
Router::post("/person", 						[PersonController::class,"create"])->only('admin');		//запрос cоздание персоны 
Router::patch("/person/([0-9]+)", 	[PersonController::class,"update"])->only('admin');		//изменения чего-то в персоне от админа
Router::get("/person/([0-9]+)/delete", 	[PersonController::class,"desreoy"])->only('admin');	//удаления персоны из базы

// комментарии
Router::get("/comment/([0-9]+)", 		[CommentController::class,"watch"]);									//получть комментарий по id
Router::post("/comment", 						[CommentController::class,"create"])->only('user');		//запрос cоздание фильма 
Router::patch("/comment/([0-9]+)", 	[CommentController::class,"edit"])->only('user');			//изменения коммента
Router::get("/comment/([0-9]+)/delete", [CommentController::class,"desreoy"])->only('user');	//удаления коммента

// рейтинг
Router::post("/film/([0-9]+)/rating/([1-5])", 	[RatingController::class,"setRating"])->only('user'); 
Router::patch("/film/([0-9]+)/rating/([1-5])", 	[RatingController::class,"editRating"])->only('user');

//
Router::get("/profil", 				[userPages::class,"profil"])->only('user');									//страница фильма просмотр
Router::get("/profil/edit", 	[userPages::class,"edit"])->only('user');		//страница изменения фильма для админа


Router::get("/autentifer",		[Pages::class,"autentifer"])->only('guest');			// регистрация аккаунта
Router::post("/user/create", 	[userController::class,"auth"])->only('user');		//страница изменения фильма для админа


// Router::match(trim(parse_url($_SERVER['REQUEST_URI'])["path"]),$_SERVER['REQUEST_METHOD']);

var_dump(Router::class."@addUser");
echo "</pre>";
