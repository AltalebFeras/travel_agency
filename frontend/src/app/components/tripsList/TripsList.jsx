import "./tripsList.css";
import Link from "next/link";
import TripCardTeaser from "../tripCardTeaser/TripCardTeaser";


export default function TripsList(props) {
  return (
    <div>
      {props.trips && (
        <ul className="trips-list">
          {props.trips.map((trips, index) => (
            <Link key={index} href={"/id/" + trips.id}>
              <li>
                <TripCardTeaser
                  name={trips.name}
                />
              </li>
            </Link>
          ))}
        </ul>
      )}
    </div>
  );
}
