"use client";
import Link from "next/link";
import React from "react";
import RandomTripCardTeaser from "../randomTripCardTeaser/RandomTripCardTeaser";

export default function RandomTripsList(props) {
  const { trips, countryFilter, categoryFilter, dateFilter } = props;

  // Filter trips based on the provided filters
  const filteredTrips = trips.filter(trip => {
    if (countryFilter && trip.Destination.country !== countryFilter) return false;
    if (categoryFilter && !trip.Category.some(category => category.name === categoryFilter)) return false;
    if (dateFilter) {
      const tripDate = new Date(trip.departure);
      const filterDate = new Date(dateFilter);
      if (tripDate.toDateString() !== filterDate.toDateString()) return false;
    }
    return true;
  });

  return (
    <div>
      {filteredTrips && (
        <ul className="trips-list ">
          {filteredTrips.map((trip, index) => (
            <Link key={index} href={"/trip/" + trip.id}>
              <li className="shadow-lg">
                <div className="tripName ">{trip.name}</div>
                <RandomTripCardTeaser
                  name={trip.name}
                  price={trip.price + "  €"}
                  city={trip.Destination.city}
                  country={trip.Destination.country}
                  image={trip.Destination.image}
                />
              </li>
            </Link>
          ))}
        </ul>
      )}
    </div>
  );
}

