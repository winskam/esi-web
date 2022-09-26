package examen.webg555047.business;

import java.util.ArrayList;
import java.util.List;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import examen.webg555047.database.ArtistDB;
import examen.webg555047.database.TrackDB;
import examen.webg555047.model.Artist;
import examen.webg555047.model.Track;

@Service
public class Ecoute {
    @Autowired
    private ArtistDB artistDB;

    @Autowired
    private TrackDB trackDB;

    public List<Track> getTracks() {
        List<Track> result = new ArrayList<>();
        trackDB.findAll().forEach(result::add);
        return result;
    }

    public Track getTrack(Long login) {
        if (trackDB.findById(login).isPresent()) {
            return trackDB.findById(login).get();
        } else
            return null;
    }

    public List<Artist> getArtists() {
        List<Artist> result = new ArrayList<>();
        artistDB.findAll().forEach(result::add);
        return result;
    }

    public Artist getArtist(String $login) {
        if (artistDB.findById($login).isPresent()) {
            return artistDB.findById($login).get();
        } else
            return null;
    }

    public void addStreams(Long id, int streamsToAdd) {
        Track track = getTrack(id);
        int currentStreams = track.getStream();
        track.setStream(currentStreams + streamsToAdd);
        trackDB.save(track);
    }

    public List<Object> getSupTracks(int sup) {
        return trackDB.supTracks(sup);
    }

}
