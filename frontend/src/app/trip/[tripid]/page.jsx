"use client";

import Navbar from "@/app/components/navbar/Navbar";
import React, { useState, useEffect } from "react";
import "./page.css";

function TripDetail(props) {
  const [trip, setTrip] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchTrip = async () => {
      try {
        const response = await fetch(
          "https://127.0.0.1:8000/api/trip/" + props.params.tripid
        );
        const data = await response.json();
        setTrip(data);
        setLoading(false);
      } catch (error) {
        setError(error.message);
        setLoading(false);
      }
    };

    fetchTrip();
  }, []);

  if (loading)
    return (
      <div>
        <div className="middle">
          <div className="bar bar1"></div>
          <div className="bar bar2"></div>
          <div className="bar bar3"></div>
          <div className="bar bar4"></div>
          <div className="bar bar5"></div>
          <div className="bar bar6"></div>
          <div className="bar bar7"></div>
          <div className="bar bar8"></div>
        </div>
      </div>
    );
  if (error) return <div>Error: {error}</div>;

  return (
    <>
      <Navbar />
      <div>
        <h2>{trip.name}</h2>
        <p>Departure: {trip.departure}</p>
        <p>Return: {trip.comingBack}</p>
        <p>Description: {trip.description}</p>
        <p>Price: {trip.price} €</p>
        <p>Country: {trip.Destination.country}</p>
        <p>City: {trip.Destination.city}</p>
        <p>Category: </p>{" "}
        {trip.Category.map((category) => (
          <ul>
            <li>{category.name}</li>
          </ul>
        ))}
        <img src={trip.Destination.image} alt={trip.name} />
      </div>
    </>
  );
}

export default TripDetail;
