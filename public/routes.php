<?php

// ███████╗██╗██╗     ███╗   ███╗
// ██╔════╝██║██║     ████╗ ████║
// █████╗  ██║██║     ██╔████╔██║
// ██╔══╝  ██║██║     ██║╚██╔╝██║
// ██║     ██║███████╗██║ ╚═╝ ██║
// ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝

use Core\Router;
use User\Controller\FilmsController;
use User\Controller\UserController;
use User\Controller\CommentController;
use User\Controller\RatingController;
use User\Controller\SearchController;
use User\Controller\GenreController;
use User\Controller\PersonsController;

Router::get(
  "", 
  [FilmsController::class,"index"]
);	//страница фильмов

Router::get(
  "home", 
  [FilmsController::class,"index"]
);	//страница фильмов

Router::get(
  "film/(?<id>[0-9]+)",
  [FilmsController::class,"watch"]
); //смотреть конкретный фильм

Router::get(
  "films/(?<param>[a-zA-Zа-яА-ЯёЁ]+)",
  [FilmsController::class,"films"]
);

Router::get(
  "login",
  [UserController::class,"loginPage"]
);

Router::get(
  "register",
  [UserController::class,"registerPage"]
);

Router::put(
  "login",
  [UserController::class,"login"]
);
Router::put(
  "register",
  [UserController::class,"register"]
);

Router::get(
  "logout",
  [UserController::class,"logout"]
);

Router::put(
  "comment/(?<film_id>[0-9]+)",
  [CommentController::class,"addComment"]
);
// echo(CommentController::addComment(1));
Router::put(
  "rating/(?<film_id>[0-9]+)",
  [RatingController::class,"addRating"]
);




Router::get(
  "search/(?<param>[a-zA-Zа-яА-ЯёЁ]+)/(?<page>[0-9]+)",
  [SearchController::class,"index"]
);
Router::get(
  "search/(?<param>[a-zA-Zа-яА-ЯёЁ]+)",
  [SearchController::class,"index"]
);





Router::get(
  "topComments/(?<page>[0-9]+)",
  [CommentController::class,"Comments"]
);
Router::get(
  "topComments",
  [CommentController::class,"Comments"]
);


Router::get(
  "topRating/(?<page>[0-9]+)",
  [RatingController::class,"index"]
);
Router::get(
  "topRating",
  [RatingController::class,"index"]
);


Router::get(
  "now/(?<page>[0-9]+)",
  [FilmsController::class,"now"]
);
Router::get(
  "now",
  [FilmsController::class,"now"]
);




Router::get(
  "genre/(?<genre_id>[0-9]+)/(?<page>[0-9]+)",
  [GenreController::class,"index"]
);
Router::get(
  "genre/(?<genre_id>[0-9]+)",
  [GenreController::class,"index"]
);




Router::get(
  "person/(?<person_id>[0-9]+)",
  [PersonsController::class,"index"]
);



// //  ██████╗ ██████╗  ██████╗ ██████╗ ███████╗██████╗ ████████╗██╗   ██╗
// //  ██╔══██╗██╔══██╗██╔═══██╗██╔══██╗██╔════╝██╔══██╗╚══██╔══╝╚██╗ ██╔╝
// //  ██████╔╝██████╔╝██║   ██║██████╔╝█████╗  ██████╔╝   ██║    ╚████╔╝ 
// //  ██╔═══╝ ██╔══██╗██║   ██║██╔═══╝ ██╔══╝  ██╔══██╗   ██║     ╚██╔╝  
// //  ██║     ██║  ██║╚██████╔╝██║     ███████╗██║  ██║   ██║      ██║   
// //  ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚═╝     ╚══════╝╚═╝  ╚═╝   ╚═╝      ╚═╝   

// Router::get(
//   "languages", 																
//   [LanguageController::class,"getLanguages"]
// );  // получить языки 


// Router::patch(
//   "language/(?<id>[0-9]+)",
//   [LanguageController::class,"editLanguage"]
// );  // удалить язык из списка языков

// Router::delete(
//   "language/(?<id>[0-9]+)",
//   [LanguageController::class,"deleteLanguage"]
// );  // удалить язык из списка языков

                                                          
// Router::get(
//   "genres", 																
//   [GenreController::class,"getGenres"]
// );  // получить языки 

// //  ██████╗ ██████╗  ██████╗ ██████╗       ███████╗██╗██╗     ███╗   ███╗
// //  ██╔══██╗██╔══██╗██╔═══██╗██╔══██╗      ██╔════╝██║██║     ████╗ ████║
// //  ██████╔╝██████╔╝██║   ██║██████╔╝█████╗█████╗  ██║██║     ██╔████╔██║
// //  ██╔═══╝ ██╔══██╗██║   ██║██╔═══╝ ╚════╝██╔══╝  ██║██║     ██║╚██╔╝██║
// //  ██║     ██║  ██║╚██████╔╝██║           ██║     ██║███████╗██║ ╚═╝ ██║
// //  ╚═╝     ╚═╝  ╚═╝ ╚═════╝ ╚═╝           ╚═╝     ╚═╝╚══════╝╚═╝     ╚═╝


// Router::get(
//   "film/(?<id>[0-9]+)/languages", 		
//   [FilmPropertiesController::class,"filmLanguages"]
// );  // все языки в конкретном фильме

// Router::get(
//   "film/(?<id>[0-9]+)/Genres", 		
//   [FilmPropertiesController::class,"filmGanres"]
// );  // все жанры в кронкретном фильме


// Router::get(
//   "ganre/(?<id>[0-9]+)/films", 		
//   [FilmPropertiesController::class,"filmsWithGanre"]
// );  // все фильмы про конкретный жанр

// Router::get(
//   "language/(?<id>[0-9]+)/films", 		
//   [FilmPropertiesController::class,"filmsWithlanguage"]
// );  // все фильмы с конкретным языком


// //  ██████╗ ███████╗██████╗ ███████╗ ██████╗ ███╗   ██╗███████╗
// //  ██╔══██╗██╔════╝██╔══██╗██╔════╝██╔═══██╗████╗  ██║██╔════╝
// //  ██████╔╝█████╗  ██████╔╝███████╗██║   ██║██╔██╗ ██║███████╗
// //  ██╔═══╝ ██╔══╝  ██╔══██╗╚════██║██║   ██║██║╚██╗██║╚════██║
// //  ██║     ███████╗██║  ██║███████║╚██████╔╝██║ ╚████║███████║
// //  ╚═╝     ╚══════╝╚═╝  ╚═╝╚══════╝ ╚═════╝ ╚═╝  ╚═══╝╚══════╝

// Router::get(
//   "persons",
//   [PersonsController::class,"index"]
// );  // все персоны

// Router::get(
//   "person/(?<id>[0-9]+)",
//   [PersonsController::class,"personEdit"]
// );  // просмотр персон


// //   ██████╗ ██████╗ ███╗   ███╗███╗   ███╗███████╗███╗   ██╗████████╗███████╗
// //  ██╔════╝██╔═══██╗████╗ ████║████╗ ████║██╔════╝████╗  ██║╚══██╔══╝██╔════╝
// //  ██║     ██║   ██║██╔████╔██║██╔████╔██║█████╗  ██╔██╗ ██║   ██║   ███████╗
// //  ██║     ██║   ██║██║╚██╔╝██║██║╚██╔╝██║██╔══╝  ██║╚██╗██║   ██║   ╚════██║
// //  ╚██████╗╚██████╔╝██║ ╚═╝ ██║██║ ╚═╝ ██║███████╗██║ ╚████║   ██║   ███████║
// //   ╚═════╝ ╚═════╝ ╚═╝     ╚═╝╚═╝     ╚═╝╚══════╝╚═╝  ╚═══╝   ╚═╝   ╚══════╝

// Router::get(
//   "film/(?<id>[0-9]+)/comments", 	
//   [CommentController::class,"filmComments"]
// ); 	// получить комментарии к фильму   

// Router::get(
//   "users/(?<id>[0-9]+)/films/(?<id>[0-9]+)/comments", 	
//   [CommentController::class,"userFilmComments"]
// ); 	// получить комментарии от юзера-фильма

// Router::patch(
//   "comment/(?<id>[0-9]+)",  
//   [CommentController::class,"edit"]
// );//изменения коммента

// Router::delete(
//   "comment/(?<id>[0-9]+)", 
//   [CommentController::class,"desreoy"]
// );//удаления коммента


// //  ██╗   ██╗███████╗███████╗██████╗ ███████╗
// //  ██║   ██║██╔════╝██╔════╝██╔══██╗██╔════╝
// //  ██║   ██║███████╗█████╗  ██████╔╝███████╗
// //  ██║   ██║╚════██║██╔══╝  ██╔══██╗╚════██║
// //  ╚██████╔╝███████║███████╗██║  ██║███████║
// //   ╚═════╝ ╚══════╝╚══════╝╚═╝  ╚═╝╚══════╝


// //  ██████╗  █████╗ ████████╗██╗███╗   ██╗ ██████╗ 
// //  ██╔══██╗██╔══██╗╚══██╔══╝██║████╗  ██║██╔════╝ 
// //  ██████╔╝███████║   ██║   ██║██╔██╗ ██║██║  ███╗
// //  ██╔══██╗██╔══██║   ██║   ██║██║╚██╗██║██║   ██║
// //  ██║  ██║██║  ██║   ██║   ██║██║ ╚████║╚██████╔╝
// //  ╚═╝  ╚═╝╚═╝  ╚═╝   ╚═╝   ╚═╝╚═╝  ╚═══╝ ╚═════╝ 
                                               

// Router::get(
//   "film/(?<id>[0-9]+)/ratings", 	
//   [RatingController::class,"filmRating"]
// ); 	// получить рейтинг к фильму   

// Router::get(
//   "user/(?<id>[0-9]+)/rating", 	
//   [RatingController::class,"userRating"]
// ); 	// получить рейтинг от юзера


// Router::patch(
//   "users/(?<id>[0-9]+)",  
//   [RatingController::class,"edit"]
// );  // изменения рейтинга

// Router::delete(
//   "users/(?<id>[0-9]+)", 
//   [RatingController::class,"desreoy"]
// );  // удаления рейтинга
    


























// echo "</pre>";
// <!-- CREATE TABLE comments (
//     id         INT PRIMARY KEY AUTO_INCREMENT,
//     user_id     INT NOT NULL,
//     film_id   INT NOT NULL,
//     comment    TEXT NOT NULL,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

//     FOREIGN KEY (user_id)  REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
//     FOREIGN KEY (film_id) REFERENCES films(id) ON DELETE CASCADE ON UPDATE CASCADE
// ); -->
?>





