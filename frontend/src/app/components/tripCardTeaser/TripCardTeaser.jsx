import "./tripCardTeaser.css";
import Image from "next/image";

export default function TripCardTeaser(props) {
  return (
    <div className="character-card">
      <div className="character-card-information">
        <p className="character-card-name">{props.name}</p>
        <p className="character-card-species">{props.species}</p>
      </div>
      {props.image && (
        <Image
          className="character-card-image"
          width={250}
          height={250}
          src={props.image}
          alt={"Image de " + props.name}
        />
      )}
    </div>
  );
}
