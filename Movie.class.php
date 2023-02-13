<?php

class Movie extends Database
{
  // Fetch Movies
  function fetchMovies()
  {
    $rows =  $this->connect()->prepare('SELECT * FROM movies ORDER BY uid DESC');
    $rows->execute();
    while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
      echo '<pre>';
      echo json_encode($row, JSON_PRETTY_PRINT);
    }
  }

  // Fetch Movies By Ids
  function fetchMoviesByIds($moviesIds = [])
  {
    if (count($moviesIds) == 0) {
      echo 'No Movie Found';
    }
    $rows =  $this->connect()->prepare('SELECT * FROM movies WHERE uid IN (' . implode(",", $moviesIds) . ')');
    $rows->execute();
    while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
      echo '<pre>';
      echo json_encode($row, JSON_PRETTY_PRINT);
    }
  }

  // Add and Update Movies
  function addUpdateMovies($data, $uid = NULL)
  {
    if (!is_null($uid)) {
      $data['uid'] = $uid;
      $rows =  $this->connect()->prepare('UPDATE movies SET title =:title, runtime=:runtime, release_date=:release_date WHERE uid=:uid');
      $rows->execute($data);
      $lastInsertedId = $uid;
      echo '<br><br>Movie Updated Successfully';
    } else {
      $rows =  $this->connect()->prepare('INSERT INTO movies (title, runtime, release_date) VALUES (:title,:runtime,:release_date)');
      $rows->execute($data);
      $lastInsertedId = $this->connect()->lastInsertId();
      echo '<br><br>Movie Added Successfully';
    }
    $this->fetchMoviesByIds([$lastInsertedId]);
  }

  // Delete Movie
  function deleteMovies($uid = NULL)
  {
    $rows =  $this->connect()->prepare('DELETE FROM movies WHERE uid=' . $uid);
    $rows->execute();
    echo '<br><br>' . $uid . ' uid Movie Deleted Successfully';
    $this->fetchMovies();
  }

  // Fetch Movies with Actors
  function fetchMoviesWithActors()
  {
    
    $rows =  $this->connect()->prepare('SELECT * FROM movies; SELECT roles.movie_id, roles.role_in_movie, roles.role_description, actors.name from roles INNER JOIN actors ON actors.uid=roles.actor_id');
    $rows->execute();
    $movies = $rows->fetchAll(PDO::FETCH_OBJ);

    $rows->nextRowset(); // shift to the total
    $roles = $rows->fetchAll(PDO::FETCH_OBJ); // get the total

    foreach($movies as $movie){
        foreach($roles as $role){
           if($role->movie_id == $movie->uid){
            $movie->{"actors"}[] = [
              'actor_name' => $role->name,
              'role_in_movie' => $role->role_in_movie,
              'description' => $role->role_description,
            ];

           }
        }
        
        echo '<pre>';
        echo json_encode($movie, JSON_PRETTY_PRINT);
    }
    

  }

   // Fetch Movies with Actors Desc Age
   function fetchMoviesActors()
   {
     
     $rows =  $this->connect()->prepare('SELECT * FROM actors ORDER BY STR_TO_DATE(dob,"%Y-%m-%d") DESC ; SELECT movies.uid, movies.title, roles.actor_id from roles INNER JOIN movies ON movies.uid=roles.movie_id');
     $rows->execute();
     $actors = $rows->fetchAll(PDO::FETCH_OBJ);
 
     $rows->nextRowset(); // shift to the total
     $roles = $rows->fetchAll(PDO::FETCH_OBJ); // get the total
 
     foreach($actors as $actor){
         foreach($roles as $role){
            if($role->actor_id == $actor->uid){
             $actor->{"movies"}[] = [
               'movie' => $role->title,
             ];
 
            }
         }
         
         echo '<pre>';
         echo json_encode($actor, JSON_PRETTY_PRINT);
     }
     
 
   }
  
}
