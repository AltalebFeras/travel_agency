"use client";


import React, { useState, useEffect } from 'react';
import Navbar from '../components/navbar/Navbar';
import TripsList from '../components/tripsList/TripsList';
import "./page.css"

function FetchTrips() {
  const [loading, setLoading] = useState(true);
  const [trips, setTrips] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch('https://127.0.0.1:8000/api/trips/');
        const data = await response.json();
        setTrips(data);
        setLoading(false); // Set loading to false after data is fetched
      } catch (error) {
        console.error('Error fetching data:', error);
        setLoading(false); // Set loading to false in case of error
      }
    };

    fetchData();
  }, []);

  return (
    <>
      <Navbar />
      {loading ? ( // Conditionally render loading spinner while loading
       <div className="loader-container">
       <div className="loader"></div>
       <div className="loader-text">Loading...</div>
     </div>  
      ) : (
        <div>
          <TripsList trips={trips} />
        </div>
      )}
    </>
  );
}

export default FetchTrips;
