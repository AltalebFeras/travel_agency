"use client";

import React, { useState, useEffect } from 'react';
import Navbar from '../components/navbar/Navbar';
import TripsList from '../components/tripsList/TripsList';

function FetchTrips() {
  const [trips, setTrips] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch('https://127.0.0.1:8000/api/trips/');
        const data = await response.json();
        setTrips(data);
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    };

    fetchData();
  }, []);

  return (
    <>
      <Navbar />
      <div>
        <TripsList trips={trips} /> 
      </div>
    </>
  );
}

export default FetchTrips;


