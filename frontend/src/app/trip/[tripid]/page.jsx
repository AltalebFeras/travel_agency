"use client";


import Navbar from '@/app/components/navbar/Navbar';
// TripDetail.js
import React, { useState, useEffect } from 'react';

function TripDetail(props) {
  const [trip, setTrip] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchTrip = async () => {
      try {
        const response = await fetch("https://127.0.0.1:8000/api/trip/" + props.params.tripid);
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

  if (loading) return <div>Loading...</div>;
  if (error) return <div>Error: {error}</div>;

  return (
    <>
    <Navbar />
    <div>
      <h2>{trip.name}</h2>
      <p>Description: {trip.description}</p>
      <p>Price: {trip.price}</p>
      <p>Country: {trip.Destination.country}</p>
      <p>City: {trip.Destination.city}</p>
      <img src={trip.Destination.image} alt={trip.name} />
    </div>
    </>
  );
}

export default TripDetail;
