"use client";





import React from "react";

function TripsList({ trips }) { // Destructure 'trips' directly
  return (
    <div>
      <h1>All trips</h1>
      {trips.map((trip) => (
        <div key={trip.id}>
          <h2>{trip.name}</h2>
          <p>Departure: {new Date(trip.departure).toLocaleDateString()}</p>
          <p>Return: {new Date(trip.comingBack).toLocaleDateString()}</p>
          <p>Description: {trip.description}</p>
          <p>Price: {trip.price}</p>
          <p>
            Categories:{" "}
            {trip.Category.map((category) => category.name).join(", ")}
          </p>
          <p>Country: {trip.Destination.country}</p>
          <p>City: {trip.Destination.city}</p>
          <img
            src={trip.Destination.image}
            alt={trip.Destination.city}
            style={{ maxWidth: "200px" }}
          />
        </div>
      ))}
    </div>
  );
}

export default TripsList;
