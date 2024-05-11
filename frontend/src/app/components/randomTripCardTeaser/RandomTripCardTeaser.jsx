"use client";
import React from "react";
import "./randomTripCardTeaser.css"

export default function RandomTripCardTeaser(props) {
  const { name, country, city, price, image } = props;

  return (
    <div className="card ">
      <div className="card-inner">
        <div
          className="card-front"
          style={{
            backgroundImage: `url(${image})`,
            backgroundSize: "cover",
            backgroundPosition: "center",
          }}
        >
        </div>
        <div className="card-back">
          <div></div>
          <div>
            <p>Trip to</p>
            {country} / {city}
            <p className="trip-card-description">Price : {price}</p>
          </div>
        </div>
      </div>
    </div>
  );
}
