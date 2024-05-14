"use client";

import RegistrationForm from "@/app/components/registrationForm/RegistrationForm";
import "./tripStyle.css";
import FetchTripsRandom from "../FetchTripsRandom";

export default function TripStyle(props) {
  const {
    name,
    departure,
    comingBack,
    description,
    price,
    country,
    city,
    Category,
    image,
    tripId,
  } = props;

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
  return (
    <>
      <div className="d-flex justify-content-between flex-wrap m-5">
        <img className="imageThisTrip" src={image} alt={name} />

        <div>
          <h2>{name}</h2>
          <p>Departure: {formatDate(departure)}</p>
          <p>Return: {formatDate(comingBack)}</p>
          <p>Price: {price} €</p>
          <p>Country: {country}</p>
          <p>City: {city}</p>
        </div>
      </div>
      <div className="d-flex justify-content-between flex-wrap mx-5 mb-5 ">
        <div>
          <div className="descriptionTrip">
            <h3 className="fs-3">Description:</h3>
          <p> {description}</p>
          </div>
          <h3 className="fs-3">Category: </h3>
          {Category.map((category, index) => (
            <ul key={index}>
              <li>{category.name}</li>
            </ul>
          ))}
        </div>
        <RegistrationForm tripId={tripId} />
      </div>
      <div className="mx-5" > 
        <FetchTripsRandom/>
      </div>
    </>
  );
}
