"use client";

import Link from "next/link";
import React from "react";
import "./tripsList.css"
import TripCardTeaser from "../tripCardTeaser/TripCardTeaser";

function TripsList(props) { // Destructure 'trips' directly
  return (
    <div>
      {props.trips && (
        <ul className="trips-list">
          {props.trips.map((trip, index) => ( // Change 'trips' to 'trip'
            <Link key={index} href={"/trip/" + trip.id}> 
              <li>
                <TripCardTeaser
                  name={trip.name} // Change 'trips' to 'trip'
                  price={trip.price + "  €"} // Change 'trips' to 'trip'
                  image={trip.Destination.image} // Access image from Destination object
                />
              </li>
            </Link>
          ))}
        </ul>
      )}
    </div>
  );
}

export default TripsList;