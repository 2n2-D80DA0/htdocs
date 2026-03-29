<?php

require __DIR__. "/../vendor/autoload.php";
use Core\Router;
use Admin\Controller\FilmsController;
use Admin\Controller\PropertiesController;
use Admin\Controller\FilmPropertiesController;
use Admin\Controller\PersonsController;
use Admin\Controller\FilmPersonsController;
use Admin\Controller\CommentController;
use Admin\Controller\UserController;
use Admin\Controller\RatingController;

Router::get("/404", 	[PagesController::class,"error404"]);
Router::get("/logout", 	[PagesController::class,"logout"]);
Router::get("/home", 	[PagesController::class,"home"]);


//  ███████╗██╗██╗     ███╗   ███╗███████╗
//  ██╔════╝██║██║     ████╗ ████║██╔════╝
//  █████╗  ██║██║     ██╔████╔██║███████╗
//  ██╔══╝  ██║██║     ██║╚██╔╝██║╚════██║
//  ██║     ██║███████╗██║ ╚═╝ ██║███████║
//  ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝╚══════╝                 
// echo FilmsController::index();
Router::get(    
    "admin/films", 
    [FilmsController::class,"index"]
);	//страница фильмов

Router::get(
    "admin/film/(?<id>[0-9]+)/edit",
    [FilmsController::class,"edit"]
); //страница изменения фильма для админа
    
Router::get(
    "admin/film/make",
    [FilmsController::class,"make"]
);	//страница создания фильма для админа

Router::put(
    "admin/film",
    [FilmsController::class,"addFilm"]
);	//запрос cоздание фильма 

Router::patch(
    "admin/film/(?<id>[0-9]+)", 				
    [FilmsController::class,"updateFilm"]
);	//изменения чего-то в фильме от админа

Router::delete(
    "admin/film/(?<id>[0-9]+)", 		
    [FilmsController::class,"destreoy"]
);	//удаления фильма из базы 


//  ██████╗ ██████╗  ██████╗ ██████╗ ███████╗██████╗ ████████╗██╗   ██╗
//  ██╔══██╗██╔══██╗██╔═══██╗██╔══██╗██╔════╝██╔══██╗╚══██╔══╝╚██╗ ██╔╝
//  ██████╔╝██████╔╝██║   ██║██████╔╝█████╗  ██████╔╝   ██║    ╚████╔╝ 
//  ██╔═══╝ ██╔══██╗██║   ██║██╔═══╝ ██╔══╝  ██╔══██╗   ██║     ╚██╔╝  
//  ██║     ██║  ██║╚██████╔╝██║     ███████╗██║  ██║   ██║      ██║   
//  ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚═╝     ╚══════╝╚═╝  ╚═╝   ╚═╝      ╚═╝   

Router::get(
    "admin/languages", 																
    [PropertiesController::class,"getLanguages"]
);  // получить языки 

Router::put(
    "admin/language",
    [PropertiesController::class,"addLanguage"]
);  // добавить язык в список языков

Router::patch(
    "admin/language/(?<id>[0-9]+)",
    [PropertiesController::class,"editLanguage"]
);  // удалить язык из списка языков

Router::delete(
    "admin/language/(?<id>[0-9]+)",
    [PropertiesController::class,"deleteLanguage"]
);  // удалить язык из списка языков

                                                          
Router::get(
    "admin/genres", 																
    [PropertiesController::class,"getGenres"]
);  // получить языки 

Router::put(
    "admin/genre",
    [PropertiesController::class,"addGenre"]
);  // добавить язык в список языков

Router::patch(
    "admin/genre/(?<id>[0-9]+)",
    [PropertiesController::class,"editGenre"]
);  // удалить язык из списка языков

Router::delete(
    "admin/genre/(?<id>[0-9]+)",
    [PropertiesController::class,"deleteGenre"]
);  // удалить язык из списка языков

//  ██████╗ ██████╗  ██████╗ ██████╗       ███████╗██╗██╗     ███╗   ███╗
//  ██╔══██╗██╔══██╗██╔═══██╗██╔══██╗      ██╔════╝██║██║     ████╗ ████║
//  ██████╔╝██████╔╝██║   ██║██████╔╝█████╗█████╗  ██║██║     ██╔████╔██║
//  ██╔═══╝ ██╔══██╗██║   ██║██╔═══╝ ╚════╝██╔══╝  ██║██║     ██║╚██╔╝██║
//  ██║     ██║  ██║╚██████╔╝██║           ██║     ██║███████╗██║ ╚═╝ ██║
//  ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚═╝           ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝


Router::get(
    "admin/film/(?<id>[0-9]+)/languages", 		
    [FilmPropertiesController::class,"filmLanguages"]
);  // все языки в конкретном фильме

Router::get(
    "admin/film/(?<id>[0-9]+)/Genres", 		
    [FilmPropertiesController::class,"filmGanres"]
);  // все жанры в кронкретном фильме


Router::get(
    "admin/ganre/(?<id>[0-9]+)/films", 		
    [FilmPropertiesController::class,"filmsWithGanre"]
);  // все фильмы про конкретный жанр

Router::get(
    "admin/language/(?<id>[0-9]+)/films", 		
    [FilmPropertiesController::class,"filmsWithlanguage"]
);  // все фильмы с конкретным языком

Router::post(
    "admin/film/(?<id>[0-9]+)/language/(?<id>[0-9]+)", 		
    [FilmPropertiesController::class,"linkLang"]
);  // связать язык к фильму

Router::delete(
    "admin/film/(?<id>[0-9]+)/language/(?<id>[0-9]+)",
    [FilmPropertiesController::class,"unlinkLang"]
);  // развязать язык от фильму

Router::post(
    "admin/film/(?<id>[0-9]+)/Genre/(?<id>[0-9]+)", 		
    [FilmPropertiesController::class,"linkGenre"]
);  // связать жанр к фильму

Router::delete(
    "admin/film/(?<id>[0-9]+)/Genre/(?<id>[0-9]+)",
    [FilmPropertiesController::class,"unlinkGenre"]
);  // развязать жанр от фильму


//  ██████╗ ███████╗██████╗ ███████╗ ██████╗ ███╗   ██╗███████╗
//  ██╔══██╗██╔════╝██╔══██╗██╔════╝██╔═══██╗████╗  ██║██╔════╝
//  ██████╔╝█████╗  ██████╔╝███████╗██║   ██║██╔██╗ ██║███████╗
//  ██╔═══╝ ██╔══╝  ██╔══██╗╚════██║██║   ██║██║╚██╗██║╚════██║
//  ██║     ███████╗██║  ██║███████║╚██████╔╝██║ ╚████║███████║
//  ╚═╝     ╚══════╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝

Router::get(
    "admin/persons",
    [PersonsController::class,"getPersons"]
);  // все персоны

Router::get(
    "admin/person/(?<id>[0-9]+)",
    [PersonsController::class,"personEdit"]
);  // просмотр всех персон

Router::put(
    "admin/person",
    [PersonsController::class,"addPerson"]
);  // создать персону

Router::patch(
    "admin/person/(?<id>[0-9]+)",
    [PersonsController::class,"edit"]
);	// изменить данные персоны

Router::delete(
    "admin/person/(?<id>[0-9]+)",
    [PersonsController::class,"destroy"]
);	// удаление персоны


//  ██████╗ ███████╗██████╗ ███████╗      ███████╗██╗██╗     ███╗   ███╗
//  ██╔══██╗██╔════╝██╔══██╗██╔════╝      ██╔════╝██║██║     ████╗ ████║
//  ██████╔╝█████╗  ██████╔╝███████╗█████╗█████╗  ██║██║     ██╔████╔██║
//  ██╔═══╝ ██╔══╝  ██╔══██╗╚════██║╚════╝██╔══╝  ██║██║     ██║╚██╔╝██║
//  ██║     ███████╗██║  ██║███████║      ██║     ██║███████╗██║ ╚═╝ ██║
//  ╚═╝     ╚══════╝╚═╝  ╚═╝╚══════╝      ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝
                      


Router::post(
    "admin/film/(?<id>[0-9]+)/actor/(?<id>[0-9]+)",
    [FilmPersonsController::class,"addActor"]
);
Router::delete(
    "admin/film/(?<id>[0-9]+)/actor/(?<id>[0-9]+)", 	
    [FilmPersonsController::class,"delActor"]
);
Router::post(
    "admin/film/(?<id>[0-9]+)/producer/(?<id>[0-9]+)", 	
    [FilmPersonsController::class,"addProducer"]
);
Router::delete(
    "admin/film/(?<id>[0-9]+)/producer/(?<id>[0-9]+)",
    [FilmPersonsController::class,"delProducer"]
);
Router::post(
    "admin/film/(?<id>[0-9]+)/director/(?<id>[0-9]+)", 	
    [FilmPersonsController::class,"addDirector"]
);
Router::delete(
    "admin/film/(?<id>[0-9]+)/director/(?<id>[0-9]+)",
    [FilmPersonsController::class,"delDirector"]
);


//   ██████╗ ██████╗ ███╗   ███╗███╗   ███╗███████╗███╗   ██╗████████╗███████╗
//  ██╔════╝██╔═══██╗████╗ ████║████╗ ████║██╔════╝████╗  ██║╚══██╔══╝██╔════╝
//  ██║     ██║   ██║██╔████╔██║██╔████╔██║█████╗  ██╔██╗ ██║   ██║   ███████╗
//  ██║     ██║   ██║██║╚██╔╝██║██║╚██╔╝██║██╔══╝  ██║╚██╗██║   ██║   ╚════██║
//  ╚██████╗╚██████╔╝██║ ╚═╝ ██║██║ ╚═╝ ██║███████╗██║ ╚████║   ██║   ███████║
//   ╚═════╝ ╚═════╝ ╚═╝     ╚═╝╚═╝     ╚═╝╚══════╝╚═╝  ╚═══╝   ╚═╝   ╚══════╝

Router::get(
    "admin/film/(?<id>[0-9]+)/comments", 	
    [CommentController::class,"filmComments"]
); 	// получить комментарии к фильму   

Router::get(
    "admin/user/(?<id>[0-9]+)/comments", 	
    [CommentController::class,"userComments"]
); 	// получить комментарии от юзера

Router::get(
    "admin/users/(?<id>[0-9]+)/films/(?<id>[0-9]+)/comments", 	
    [CommentController::class,"userFilmComments"]
); 	// получить комментарии от юзера-фильма



Router::patch(
    "admin/comment/(?<id>[0-9]+)",  
    [CommentController::class,"edit"]
);//изменения коммента

Router::delete(
    "admin/comment/(?<id>[0-9]+)", 
    [CommentController::class,"desreoy"]
);//удаления коммента


//  ██╗   ██╗███████╗███████╗██████╗ ███████╗
//  ██║   ██║██╔════╝██╔════╝██╔══██╗██╔════╝
//  ██║   ██║███████╗█████╗  ██████╔╝███████╗
//  ██║   ██║╚════██║██╔══╝  ██╔══██╗╚════██║
//  ╚██████╔╝███████║███████╗██║  ██║███████║
//   ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝╚══════╝

Router::get(
    "admin/users",
    [UserController::class,"getUsers"]
);  // все юзеры

Router::get(
    "admin/user/(?<id>[0-9]+)",
    [UserController::class,"editPage"]
);  // просмотр всех юзеров

Router::put(
    "admin/user",
    [UserController::class,"add"]
);  // создать юзера

Router::patch(
    "admin/user/(?<id>[0-9]+)",
    [UserController::class,"edit"]
);	// изменить данные юзера

Router::delete(
    "admin/user/(?<id>[0-9]+)",
    [UserController::class,"destroy"]
);	// удаление юзера

Router::post(
    "admin/user/(?<id>[0-9]+)/ban",
    [UserController::class,"ban"]
);	// бан юзера

Router::post(
    "admin/user/(?<id>[0-9]+)/unban",
    [UserController::class,"unban"]
);	// разбан юзера





//  ██████╗  █████╗ ████████╗██╗███╗   ██╗ ██████╗ 
//  ██╔══██╗██╔══██╗╚══██╔══╝██║████╗  ██║██╔════╝ 
//  ██████╔╝███████║   ██║   ██║██╔██╗ ██║██║  ███╗
//  ██╔══██╗██╔══██║   ██║   ██║██║╚██╗██║██║   ██║
//  ██║  ██║██║  ██║   ██║   ██║██║ ╚████║╚██████╔╝
//  ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝╚═╝  ╚═══╝ ╚═════╝ 
                                               

Router::get(
    "admin/film/(?<id>[0-9]+)/ratings", 	
    [RatingController::class,"filmRating"]
); 	// получить рейтинг к фильму   

Router::get(
    "admin/user/(?<id>[0-9]+)/rating", 	
    [RatingController::class,"userRating"]
); 	// получить рейтинг от юзера

Router::get(
    "admin/users/(?<id>[0-9]+)/films/(?<id>[0-9]+)/rating", 	
    [RatingController::class,"userFilmRating"]
); 	// получить рейтинг от юзера-фильма


Router::patch(
    "admin/users/(?<id>[0-9]+)",  
    [RatingController::class,"edit"]
);  // изменения рейтинга

Router::delete(
    "admin/users/(?<id>[0-9]+)", 
    [RatingController::class,"desreoy"]
);  // удаления рейтинга

echo "<pre>";
// print_r($_SERVER);


if($_SERVER['REQUEST_METHOD'] === "GET"){
    Router::match($_SERVER['REDIRECT_URL'],"GET");
}else {
    Router::match($_SERVER['request_uri'],$post["method"]);
}
echo "</pre>";

?>





<!-- CREATE TABLE comments (
    id         INT PRIMARY KEY AUTO_INCREMENT,
    user_id     INT NOT NULL,
    film_id   INT NOT NULL,
    comment    TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)  REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (film_id) REFERENCES films(id) ON DELETE CASCADE ON UPDATE CASCADE
); -->