<?php
Router::get("/404", 	[PagesController::class,"error404"]);
Router::get("/logout", 	[PagesController::class,"logout"]);
Router::get("/home", 	[PagesController::class,"home"]);


//  ███████╗██╗██╗     ███╗   ███╗███████╗
//  ██╔════╝██║██║     ████╗ ████║██╔════╝
//  █████╗  ██║██║     ██╔████╔██║███████╗
//  ██╔══╝  ██║██║     ██║╚██╔╝██║╚════██║
//  ██║     ██║███████╗██║ ╚═╝ ██║███████║
//  ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝╚══════╝                 

Router::get(    
    "/films", 
    [FilmsController::class,"index"]
);	//страница фильмов

Router::get(
    "/film/([0-9]+)/edit",
    [FilmsController::class,"edit"]
); //страница изменения фильма для админа
    
Router::get(
    "/film/make",
    [FilmsController::class,"make"]
);	//страница создания фильма для админа

Router::post(
    "/film",
    [FilmsController::class,"addFilm"]
);	//запрос cоздание фильма 

Router::patch(
    "/film/([0-9]+)", 				
    [FilmsController::class,"updateFilm"]
);	//изменения чего-то в фильме от админа

Router::delate(
    "film/([0-9]+)", 		
    [FilmsController::class,"destreoy"]
);	//удаления фильма из базы 


//  ██████╗ ██████╗  ██████╗ ██████╗ ███████╗██████╗ ████████╗██╗   ██╗
//  ██╔══██╗██╔══██╗██╔═══██╗██╔══██╗██╔════╝██╔══██╗╚══██╔══╝╚██╗ ██╔╝
//  ██████╔╝██████╔╝██║   ██║██████╔╝█████╗  ██████╔╝   ██║    ╚████╔╝ 
//  ██╔═══╝ ██╔══██╗██║   ██║██╔═══╝ ██╔══╝  ██╔══██╗   ██║     ╚██╔╝  
//  ██║     ██║  ██║╚██████╔╝██║     ███████╗██║  ██║   ██║      ██║   
//  ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚═╝     ╚══════╝╚═╝  ╚═╝   ╚═╝      ╚═╝   

Router::get(
    "/languages", 																
    [PropertiesController::class,"getLanguages"]
);  // получить языки 

Router::put(
    "/language",
    [PropertiesController::class,"addLanguage"]
);  // добавить язык в список языков

Router::edit(
    "/language/([0-9]+)",
    [PropertiesController::class,"editLanguage"]
);  // удалить язык из списка языков

Router::delate(
    "/language/([0-9]+)",
    [PropertiesController::class,"deleteLanguage"]
);  // удалить язык из списка языков

                                                          
Router::get(
    "/Genres", 																
    [PropertiesController::class,"getGenres"]
);  // получить языки 

Router::put(
    "/Genre",
    [PropertiesController::class,"addGenre"]
);  // добавить язык в список языков

Router::edit(
    "/Genre/([0-9]+)",
    [PropertiesController::class,"editGenre"]
);  // удалить язык из списка языков

Router::delate(
    "/Genre/([0-9]+)",
    [PropertiesController::class,"delateGenre"]
);  // удалить язык из списка языков

//  ██████╗ ██████╗  ██████╗ ██████╗       ███████╗██╗██╗     ███╗   ███╗
//  ██╔══██╗██╔══██╗██╔═══██╗██╔══██╗      ██╔════╝██║██║     ████╗ ████║
//  ██████╔╝██████╔╝██║   ██║██████╔╝█████╗█████╗  ██║██║     ██╔████╔██║
//  ██╔═══╝ ██╔══██╗██║   ██║██╔═══╝ ╚════╝██╔══╝  ██║██║     ██║╚██╔╝██║
//  ██║     ██║  ██║╚██████╔╝██║           ██║     ██║███████╗██║ ╚═╝ ██║
//  ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚═╝           ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝


Router::get(
    "/film/([0-9]+)/languages", 		
    [FilmPropertiesController::class,"filmLanguages"]
);  // все языки в конкретном фильме

Router::get(
    "/film/([0-9]+)/Genres", 		
    [FilmPropertiesController::class,"filmGanres"]
);  // все жанры в кронкретном фильме


Router::get(
    "/ganre/([0-9]+)/films", 		
    [FilmPropertiesController::class,"filmsWithGanre"]
);  // все фильмы про конкретный жанр

Router::get(
    "/language/([0-9]+)/films", 		
    [FilmPropertiesController::class,"filmsWithlanguage"]
);  // все фильмы с конкретным языком

Router::post(
    "/film/([0-9]+)/language/([0-9]+)", 		
    [FilmPropertiesController::class,"linkLang"]
);  // связать язык к фильму

Router::delete(
    "/film/([0-9]+)/language/([0-9]+)",
    [FilmPropertiesController::class,"unlinkLang"]
);  // развязать язык от фильму

Router::post(
    "/film/([0-9]+)/Genre/([0-9]+)", 		
    [FilmPropertiesController::class,"linkGenre"]
);  // связать жанр к фильму

Router::delete(
    "/film/([0-9]+)/Genre/([0-9]+)",
    [FilmPropertiesController::class,"unlinkGenre"]
);  // развязать жанр от фильму


//  ██████╗ ███████╗██████╗ ███████╗ ██████╗ ███╗   ██╗███████╗
//  ██╔══██╗██╔════╝██╔══██╗██╔════╝██╔═══██╗████╗  ██║██╔════╝
//  ██████╔╝█████╗  ██████╔╝███████╗██║   ██║██╔██╗ ██║███████╗
//  ██╔═══╝ ██╔══╝  ██╔══██╗╚════██║██║   ██║██║╚██╗██║╚════██║
//  ██║     ███████╗██║  ██║███████║╚██████╔╝██║ ╚████║███████║
//  ╚═╝     ╚══════╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝

Router::get(
    "/persons",
    [PersonsController::class,"getPersons"]
);  // все персоны

Router::get(
    "/person/([0-9]+)",
    [PersonsController::class,"personEdit"]
);  // просмотр всех персон

Router::put(
    "/person",
    [PersonsController::class,"addPerson"]
);  // создать персону

Router::patch(
    "/person/([0-9]+)",
    [PersonsController::class,"edit"]
);	// изменить данные персоны

Router::delete(
    "/person/([0-9]+)",
    [PersonsController::class,"destroy"]
);	// удаление персоны


//  ██████╗ ███████╗██████╗ ███████╗      ███████╗██╗██╗     ███╗   ███╗
//  ██╔══██╗██╔════╝██╔══██╗██╔════╝      ██╔════╝██║██║     ████╗ ████║
//  ██████╔╝█████╗  ██████╔╝███████╗█████╗█████╗  ██║██║     ██╔████╔██║
//  ██╔═══╝ ██╔══╝  ██╔══██╗╚════██║╚════╝██╔══╝  ██║██║     ██║╚██╔╝██║
//  ██║     ███████╗██║  ██║███████║      ██║     ██║███████╗██║ ╚═╝ ██║
//  ╚═╝     ╚══════╝╚═╝  ╚═╝╚══════╝      ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝
                      


Router::post(
    "/film/([0-9]+)/actor/([0-9]+)",
    [FilmPersonsController::class,"addActor"]
);
Router::delate(
    "/film/([0-9]+)/actor/([0-9]+)", 	
    [FilmPersonsController::class,"delActor"]
);
Router::post(
    "/film/([0-9]+)/producer/([0-9]+)", 	
    [FilmPersonsController::class,"addProducer"]
);
Router::delate(
    "/film/([0-9]+)/producer/([0-9]+)",
    [FilmPersonsController::class,"delProducer"]
);
Router::post(
    "/film/([0-9]+)/director/([0-9]+)", 	
    [FilmPersonsController::class,"addDirector"]
);
Router::delate(
    "/film/([0-9]+)/director/([0-9]+)",
    [FilmPersonsController::class,"delDirector"]
);


//   ██████╗ ██████╗ ███╗   ███╗███╗   ███╗███████╗███╗   ██╗████████╗███████╗
//  ██╔════╝██╔═══██╗████╗ ████║████╗ ████║██╔════╝████╗  ██║╚══██╔══╝██╔════╝
//  ██║     ██║   ██║██╔████╔██║██╔████╔██║█████╗  ██╔██╗ ██║   ██║   ███████╗
//  ██║     ██║   ██║██║╚██╔╝██║██║╚██╔╝██║██╔══╝  ██║╚██╗██║   ██║   ╚════██║
//  ╚██████╗╚██████╔╝██║ ╚═╝ ██║██║ ╚═╝ ██║███████╗██║ ╚████║   ██║   ███████║
//   ╚═════╝ ╚═════╝ ╚═╝     ╚═╝╚═╝     ╚═╝╚══════╝╚═╝  ╚═══╝   ╚═╝   ╚══════╝

Router::get(
    "/film/([0-9]+)/comments", 	
    [CommentController::class,"filmComments"]
); 	// получить комментарии к фильму   

Router::get(
    "/user/([0-9]+)/comments", 	
    [CommentController::class,"userComments"]
); 	// получить комментарии от юзера

Router::get(
    "/users/([0-9]+)/films/([0-9]+)/comments", 	
    [CommentController::class,"userFilmComments"]
); 	// получить комментарии от юзера-фильма



Router::patch(
    "/comment/([0-9]+)",  
    [CommentController::class,"edit"]
);//изменения коммента

Router::delete(
    "/comment/([0-9]+)", 
    [CommentController::class,"desreoy"]
);//удаления коммента


//  ██╗   ██╗███████╗███████╗██████╗ ███████╗
//  ██║   ██║██╔════╝██╔════╝██╔══██╗██╔════╝
//  ██║   ██║███████╗█████╗  ██████╔╝███████╗
//  ██║   ██║╚════██║██╔══╝  ██╔══██╗╚════██║
//  ╚██████╔╝███████║███████╗██║  ██║███████║
//   ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝╚══════╝

Router::get(
    "/users",
    [UserController::class,"getUsers"]
);  // все юзеры

Router::get(
    "/user/([0-9]+)",
    [UserController::class,"editPage"]
);  // просмотр всех юзеров

Router::put(
    "/user",
    [UserController::class,"add"]
);  // создать юзера

Router::patch(
    "/user/([0-9]+)",
    [UserController::class,"edit"]
);	// изменить данные юзера

Router::delete(
    "/user/([0-9]+)",
    [UserController::class,"destroy"]
);	// удаление юзера

Router::post(
    "/user/([0-9]+)/ban",
    [UserController::class,"ban"]
);	// бан юзера

Router::post(
    "/user/([0-9]+)/unban",
    [UserController::class,"unban"]
);	// разбан юзера





//  ██████╗  █████╗ ████████╗██╗███╗   ██╗ ██████╗ 
//  ██╔══██╗██╔══██╗╚══██╔══╝██║████╗  ██║██╔════╝ 
//  ██████╔╝███████║   ██║   ██║██╔██╗ ██║██║  ███╗
//  ██╔══██╗██╔══██║   ██║   ██║██║╚██╗██║██║   ██║
//  ██║  ██║██║  ██║   ██║   ██║██║ ╚████║╚██████╔╝
//  ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝╚═╝  ╚═══╝ ╚═════╝ 
                                               

Router::get(
    "/film/([0-9]+)/ratings", 	
    [RatingController::class,"filmRating"]
); 	// получить рейтинг к фильму   

Router::get(
    "/user/([0-9]+)/rating", 	
    [RatingController::class,"userRating"]
); 	// получить рейтинг от юзера

Router::get(
    "/users/([0-9]+)/films/([0-9]+)/rating", 	
    [RatingController::class,"userFilmRating"]
); 	// получить рейтинг от юзера-фильма


Router::patch(
    "/users/([0-9]+)",  
    [RatingController::class,"edit"]
);  // изменения рейтинга

Router::delete(
    "/users/([0-9]+)", 
    [RatingController::class,"desreoy"]
);  // удаления рейтинга


?>



RatingController
UserController
CommentController
FilmPersonsController
PersonsController
FilmPropertiesController
PropertiesController
FilmController



CREATE TABLE comments (
    id         INT PRIMARY KEY AUTO_INCREMENT,
    user_id     INT NOT NULL,
    film_id   INT NOT NULL,
    comment    TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)  REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (film_id) REFERENCES films(id) ON DELETE CASCADE ON UPDATE CASCADE
);