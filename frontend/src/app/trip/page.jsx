"use client";
import React, { useState, useEffect } from 'react';
import Navbar from '../components/navbar/Navbar';
import TripsList from '../components/tripsList/TripsList';
import Filter from '../components/Filter/Filter'; // Updated import
import "./page.css";

function FetchTrips() {
  const [loading, setLoading] = useState(true);
  const [trips, setTrips] = useState([]);
  const [countryFilter, setCountryFilter] = useState("");
  const [categoryFilter, setCategoryFilter] = useState("");
  const [startDateFilter, setStartDateFilter] = useState("");
  const [endDateFilter, setEndDateFilter] = useState("");
  const [searchQuery, setSearchQuery] = useState("");
  const [countries, setCountries] = useState([]);
  const [categories, setCategories] = useState([]);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch('https://127.0.0.1:8000/api/trips/');
        const data = await response.json();
        setTrips(data);
        setLoading(false); // Set loading to false after data is fetched
        extractFilterOptions(data); // Extract countries and categories from trips data
      } catch (error) {
        console.error('Error fetching data:', error);
        setLoading(false); // Set loading to false in case of error
      }
    };

    fetchData();
  }, []);

  // Function to extract unique countries and categories from trips data
  const extractFilterOptions = (trips) => {
    const uniqueCountries = [...new Set(trips.map(trip => trip.Destination.country))];
    setCountries(uniqueCountries);
    
    const uniqueCategories = [...new Set(trips.flatMap(trip => trip.Category.map(category => category.name)))];
    setCategories(uniqueCategories);
  };

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
      <Navbar />
      <Filter
        trips={filteredTrips}
        countryFilter={countryFilter}
        setCountryFilter={setCountryFilter}
        categoryFilter={categoryFilter}
        setCategoryFilter={setCategoryFilter}
        startDateFilter={startDateFilter}
        setStartDateFilter={setStartDateFilter}
        endDateFilter={endDateFilter}
        setEndDateFilter={setEndDateFilter}
        searchQuery={searchQuery}
        setSearchQuery={setSearchQuery}
        countries={countries}
        categories={categories}
      />

      <div className="px-3 fs-4  total-trips">Total Trips: {trips.length}</div>

      {loading ? (
        <div className="loader-container">
          <div className="loader"></div>
          <div className="loader-text">Loading...</div>
        </div>  
      ) : (
        <div>
          {/* Pass filtered trips to TripsList component */}
          <TripsList trips={filteredTrips} />
        </div>
      )}
    </>
  );
}

export default FetchTrips;
