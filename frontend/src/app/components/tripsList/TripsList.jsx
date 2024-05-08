"use client";

import Link from "next/link";
import React from "react";
import "./tripsList.css";
import TripCardTeaser from "../tripCardTeaser/TripCardTeaser";

function TripsList(props) {
  // Destructure 'trips' directly
  return (
    <div>
      {props.trips && (
        <ul className="trips-list">
          {props.trips.map(
            (
              trip,
              index 
            ) => (
              <Link key={index} href={"/trip/" + trip.id}>
                <li>
                  <div className="tripName">{trip.name}</div>
                  <TripCardTeaser
                    // departure={trip.departure} // Change 'trips' to 'trip'
                    // comingBack={trip.comingBack} // Change 'trips' to 'trip'
                    price={trip.price + "  €"}
                    city={trip.Destination.city} // Access image from Destination object
                    country={trip.Destination.country} // Access image from Destination object
                    image={trip.Destination.image} // Access image from Destination object
                  />
                </li>
              </Link>
            )
          )}
        </ul>
      )}
    </div>
  );
}

export default TripsList;
