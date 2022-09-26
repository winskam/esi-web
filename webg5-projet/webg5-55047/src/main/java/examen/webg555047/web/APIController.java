package examen.webg555047.web;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import examen.webg555047.business.Ecoute;

@RestController
@CrossOrigin(origins = "*")
@RequestMapping("/api")
public class APIController {

    @Autowired 
    Ecoute ecoute;

    @GetMapping("/tracks/{sup}")
    public List<Object> getSupTracks(@PathVariable("sup") int sup) {
        return ecoute.getSupTracks(sup);
    }

}
