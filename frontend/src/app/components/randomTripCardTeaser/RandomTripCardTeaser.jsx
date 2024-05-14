"use client";
import React from "react";
import "./randomTripCardTeaser.css"

export default function RandomTripCardTeaser(props) {
  const { name, country, city, price, image } = props;

  return (
    <div className="cardRandom ">
      <div className="cardRandom-inner">
        <div
          className="cardRandom-front"
          style={{
            backgroundImage: `url(${image})`,
            backgroundSize: "cover",
            backgroundPosition: "center",
          }}
        >
        </div>
        <div className="cardRandom-back">
          <div></div>
          <div>
            <p>Trip to</p>
            {country} / {city}
            <p className="trip-cardRandom-description">Price : {price}</p>
          </div>
        </div>
      </div>
    </div>
  );
}
