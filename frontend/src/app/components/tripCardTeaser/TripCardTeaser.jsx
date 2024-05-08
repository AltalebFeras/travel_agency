// TripCardTeaser.js
import "./tripCardTeaser.css";
import Image from "next/image";

export default function TripCardTeaser(props) {
  return (
    <div className="trip-card">
      <div className="trip-card-image">
        <Image
          width={250}
          height={250}
          src={props.image}
          alt={"Image de " + props.name}
        />
      </div>
      <div className="trip-card-information">
        <p className="trip-card-name">{props.name}</p>
        <p className="trip-card-description">{props.description}</p>
        <p className="trip-card-location">{props.city}, {props.country}</p>
      </div>
    </div>
  );
}
