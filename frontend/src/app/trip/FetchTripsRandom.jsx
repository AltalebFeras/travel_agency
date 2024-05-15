"use client";
import React, { useState, useEffect } from 'react';
import Navbar from '../components/navbar/Navbar';
import TripsList from '../components/tripsList/TripsList';
import Filter from '../components/filter/Filter'; // Updated import
import "./page.css";
import Footer from '../components/footer/Footer';
import RandomTrips from '../components/randomTrips/RandomTrips';

export default function FetchTripsRandom() {
  const [loading, setLoading] = useState(true);
  const [trips, setTrips] = useState([]);
  const [countryFilter, setCountryFilter] = useState("");
  const [categoryFilter, setCategoryFilter] = useState("");
  const [startDateFilter, setStartDateFilter] = useState("");
  const [endDateFilter, setEndDateFilter] = useState("");
  const [searchQuery, setSearchQuery] = useState("");
//   const [countries, setCountries] = useState([]);
//   const [categories, setCategories] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch('https://127.0.0.1:8000/api/trips/');
        const data = await response.json();
        setTrips(data);
        setLoading(false); // Set loading to false after data is fetched
        // extractFilterOptions(data); // Extract countries and categories from trips data
      } catch (error) {
        console.error('Error fetching data:', error);
        setLoading(false); // Set loading to false in case of error
      }
    };

    fetchData();
  }, []);

//   // Function to extract unique countries and categories from trips data
//   const extractFilterOptions = (trips) => {
//     const uniqueCountries = [...new Set(trips.map(trip => trip.Destination.country))];
//     setCountries(uniqueCountries);
    
//     const uniqueCategories = [...new Set(trips.flatMap(trip => trip.Category.map(category => category.name)))];
//     setCategories(uniqueCategories);
//   };

  // Function to filter trips based on the selected filters
  const filterTrips = (trip) => {
    if (countryFilter && trip.Destination.country !== countryFilter) return false;
    if (categoryFilter && !trip.Category.some(category => category.name === categoryFilter)) return false;
    if (startDateFilter && new Date(trip.departure) < new Date(startDateFilter)) return false;
    if (endDateFilter && new Date(trip.departure) > new Date(endDateFilter)) return false;
    if (searchQuery && !trip.name.toLowerCase().includes(searchQuery.toLowerCase())) return false;
    return true;
  };

  // Filtered trips based on selected filters
  const filteredTrips = trips.filter(filterTrips);

  return (
    <>
    

      {loading ? (
        <div className="loader-container">
          <div className="loader"></div>
          <div className="loader-text">Loading...</div>
        </div>  
      ) : (
        <div>
            <div className='m-3'><h2>Favorites destinations</h2></div>
          <RandomTrips tripsData={filteredTrips} />
        </div>
      )}


    </>
  );
}

