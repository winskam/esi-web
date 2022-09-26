package examen.webg555047.model;

import java.util.Objects;
import java.util.Set;
import javax.persistence.Entity;
import javax.persistence.FetchType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;
import javax.validation.constraints.Size;
import com.fasterxml.jackson.annotation.JsonIgnore;
import groovy.transform.ToString;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;

@Entity
@Table(name = "Artist")
@Data
@AllArgsConstructor
@NoArgsConstructor
@ToString
public class Artist {

    @Id
    @JsonIgnore
    @Getter private String login;

    @Size(min=1, max=50,message="Ne peut pas etre vide.")
    @Getter @Setter private String name;

    @JsonIgnore
    @OneToMany(mappedBy="author", fetch=FetchType.LAZY)
    Set<Track> tracks;

    @Override
    public boolean equals(Object o) {
        if (o == this)
            return true;
        if (!(o instanceof Artist)) {
            return false;
        }
        Artist artist = (Artist) o;
        return Objects.equals(login, artist.login) && Objects.equals(name, artist.name) && Objects.equals(tracks, artist.tracks);
    }

    @Override
    public int hashCode() {
        return Objects.hash(login, name);
    }

}
