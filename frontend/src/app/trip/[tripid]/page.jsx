"use client";
import Navbar from "@/app/components/navbar/Navbar";
import React, { useState, useEffect } from "react";
import "./page.css";
import RegistrationForm from "@/app/components/registrationForm/RegistrationForm";
import TripStyle from "../tripeStyle/TripStyle";

function formatDate(dateString) {
  const options = {
    day: "2-digit",
    month: "2-digit",
    year: "numeric",
    hour: "2-digit",
    minute: "2-digit",
  };
  const formattedDate = new Date(dateString).toLocaleString("en-GB", options);
  return formattedDate;
}

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
      <div className="loader-container">
        <div className="loader"></div>
        <div className="loader-text">Loading...</div>
      </div>
    );
  if (error) return <div>Error: {error}</div>;

  return (
    <>
      <Navbar />
      <div className="d-flex flex-column">
       <TripStyle
       
       name={trip.name}
       departure={trip.departure}
       comingBack={trip.comingBack}
       description={trip.description}
       price={trip.price}
       country={trip.Destination.country}
       city={trip.Destination.city}
       Category={trip.Category}
       image={trip.Destination.image}
       
       />
        <RegistrationForm tripId={trip.id} />
      </div>
    </>
  );
}

export default TripDetail;
