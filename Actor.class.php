<?php

class Actor extends Database
{
    
    // Fetch Actors
    function fetchActors()
    {
        $rows =  $this->connect()->prepare('SELECT * FROM actors ORDER BY uid DESC');
        $rows->execute();
        while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
            echo '<pre>';
            echo json_encode($row, JSON_PRETTY_PRINT);
        }
    }

     // Fetch Movies By Ids
     function fetchActorsByIds($actorsIds = [])
     {
         if(count($actorsIds) == 0){
             echo 'No Actor Found';
         }
         $rows =  $this->connect()->prepare('SELECT * FROM actors WHERE uid IN (' . implode(",", $actorsIds) . ')');
         $rows->execute();
         while ($row = $rows->fetch(PDO::FETCH_ASSOC)) {
             echo '<pre>';
             echo json_encode($row, JSON_PRETTY_PRINT);
         }
     }
 
       // Add and Update Actor
       function addUpdateActors($data, $uid = NULL)
       {   
           if(!is_null($uid)){
             $data['uid'] = $uid;
             $rows =  $this->connect()->prepare('UPDATE actors SET name =:name, dob=:dob WHERE uid=:uid'); 
             $rows->execute($data);
             $lastInsertedId = $uid;
             echo '<br><br>Actor Updated Successfully';
           }else{
             $rows =  $this->connect()->prepare('INSERT INTO actors (name, dob) VALUES (:name,:dob)'); 
             $rows->execute($data);
             $lastInsertedId = $this->connect()->lastInsertId();
             echo '<br><br>Actor Added Successfully'; 
         }
           $this->fetchActorsByIds([$lastInsertedId]);
       }
 
       // Delete Movie
       function deleteActor($uid = NULL)
       {   
         $rows =  $this->connect()->prepare('DELETE FROM actors WHERE uid='. $uid); 
         $rows->execute();
         echo '<br><br>'. $uid .' uid Actor Deleted Successfully';
         $this->fetchActors(); 
       }


}
