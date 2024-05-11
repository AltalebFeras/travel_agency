import React from "react";
import "./filter.css";

export default function Filter(props) {
  const {
    trips,
    countryFilter,
    setCountryFilter,
    categoryFilter,
    setCategoryFilter,
    startDateFilter,
    setStartDateFilter,
    endDateFilter,
    setEndDateFilter,
    searchQuery,
    setSearchQuery,
    countries,
    categories,
  } = props;

  return (
    <>
      <div className="filter-container">
        <div className="d-flex flex-column">
          <label>Country:</label>
          <select
            value={countryFilter}
            onChange={(e) => setCountryFilter(e.target.value)}
          >
            <option value="">All</option>
            {countries.map((country, index) => (
              <option key={index} value={country}>
                {country}
              </option>
            ))}
          </select>
        </div>
        <div className="d-flex flex-column">
          <label>Category:</label>
          <select
            value={categoryFilter}
            onChange={(e) => setCategoryFilter(e.target.value)}
          >
            <option value="">All</option>
            {categories.map((category, index) => (
              <option key={index} value={category}>
                {category}
              </option>
            ))}
          </select>
        </div>
        <div className="d-flex flex-column">
          <label>Start Date:</label>
          <input
            type="date"
            value={startDateFilter}
            onChange={(e) => setStartDateFilter(e.target.value)}
          />
        </div>
        <div className="d-flex flex-column">
          <label>End Date:</label>
          <input
            type="date"
            value={endDateFilter}
            onChange={(e) => setEndDateFilter(e.target.value)}
          />
        </div>
       
        <div className="d-flex flex-column box-input">
          <label className ="mb-1">Search by Trip Name:</label>
          <div className="border">
            <input
              type="text"
              name="text"
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
              className="inputSearch"
              placeholder="type to search"
            ></input>
          </div>
        </div>
      </div>
<div className="px-3 fs-4  total-trips">Total Trips: {trips.length}</div>
    
    </>
  );
}
