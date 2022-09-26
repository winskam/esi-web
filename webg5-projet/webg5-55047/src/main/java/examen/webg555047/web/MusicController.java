package examen.webg555047.web;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import examen.webg555047.business.Ecoute;

@Controller
public class MusicController {

    @Autowired
    Ecoute ecoute;

    @GetMapping("/")
    public String home() {
        return "home";
    }

    @GetMapping("/artists")
    public String showIndex(Model model) {
        model.addAttribute("artists", ecoute.getArtists());
        model.addAttribute("tracks", ecoute.getTracks());

        return "artists";
    }

    @GetMapping("/artists/details/{id}")
    public String showDetail(@PathVariable("id") String id, Model model) {
        model.addAttribute("artist", ecoute.getArtist(id));
        return "details";
    }

    @PostMapping("/artists/addstreams")
    public String addStreams(Long track, String artist, int streamsToAdd) {
        ecoute.addStreams(track, streamsToAdd);
        return "redirect:/artists/details/" + artist;
    }

}
