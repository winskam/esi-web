package examen.webg555047.model;

import java.util.Objects;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.validation.constraints.Positive;
import javax.validation.constraints.Size;
import com.fasterxml.jackson.annotation.JsonIgnore;
import lombok.AllArgsConstructor;
import lombok.Data;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.Setter;
import lombok.ToString;

@Entity
@Table(name = "Track")
@Data
@AllArgsConstructor
@NoArgsConstructor
@ToString
public class Track {

    @Id
    @GeneratedValue
    @Getter @Setter private Long id;

    @Size(min=1, max=50,message="Ne peut pas etre vide.")
    @Getter @Setter private String title;

    @Positive
    @Getter @Setter private int stream;

    @ManyToOne @JsonIgnore
    @Getter @Setter private Artist author;


    @Override
    public boolean equals(Object o) {
        if (o == this)
            return true;
        if (!(o instanceof Track)) {
            return false;
        }
        Track track = (Track) o;
        return Objects.equals(id, track.id) && Objects.equals(title, track.title) && stream == track.stream && Objects.equals(author, track.author);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, title, stream);
    }    

}
