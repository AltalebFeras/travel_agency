"use client";

// 3rd snippet (continued)
import React from "react";
import "./tripCardTeaser.css";
import Image from "next/image";

export default function TripCardTeaser(props) {
  const { name, price, image } = props; // Destructure 'name', 'price', and 'image' from props
  return (
    <div className="trip-card">
      <div className="trip-card-image">
        <Image
          width={250}
          height={250}
          src={image} 
          alt={"Image of " + name} // Use 'name' from props
        />
      </div>
      <div className="trip-card-information">
        <p className="trip-card-name">{name}</p> 
        <p className="trip-card-description">{price}</p> 
      </div>
    </div>
  );
}
