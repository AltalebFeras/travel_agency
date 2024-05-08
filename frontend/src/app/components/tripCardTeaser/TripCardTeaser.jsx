"use client";

// 3rd snippet (continued)
import React from "react";
import "./tripCardTeaser.css";
import Image from "next/image";

export default function TripCardTeaser(props) {
  const { name, departure, comingBack,country, city, price, image , categoryName } = props; // Destructure 'name', 'price', and 'image' from props
  return (
    <div className="card">
      <div className="card-inner">
        <div
          className="card-front"
          style={{
            backgroundImage: `url(${image})`,
            backgroundSize: "cover",
            backgroundPosition: "center",
          }}
        >
          <p className="trip-card-name">{name}</p>
        </div>
        <div className="card-back">
          <div></div>
          <div>
            <p>Trip to</p>
            {country } /  {city}
           <p className="trip-card-description">Price : {price}</p>
           
          </div>
        </div>
      </div>
    </div>
  );
}
