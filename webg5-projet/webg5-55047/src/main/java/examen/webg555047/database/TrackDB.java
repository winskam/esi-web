package examen.webg555047.database;

import java.util.List;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;

import examen.webg555047.model.Track;

public interface TrackDB extends CrudRepository<Track, Long> {
    @Query("SELECT id, title, stream, author FROM Track WHERE stream > :number")
    List<Object> supTracks(int number);
}
