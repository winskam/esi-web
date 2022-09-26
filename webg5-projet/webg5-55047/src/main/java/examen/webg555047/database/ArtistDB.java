package examen.webg555047.database;

import org.springframework.data.repository.CrudRepository;

import examen.webg555047.model.Artist;


public interface ArtistDB extends CrudRepository<Artist,String>{ 

}
