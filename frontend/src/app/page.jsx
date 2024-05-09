'use client'

import { useState, useEffect } from 'react'; // Import useState and useEffect hooks
import Navbar from "./components/navbar/Navbar";
import TripsList from "./components/tripsList/TripsList";
import "./page.module.css"


export default function Home() {
  const [activeIndex, setActiveIndex] = useState(0); // State to track active slide index

  useEffect(() => {
    const intervalId = setInterval(() => {
      // Increment activeIndex to switch to the next slide
      setActiveIndex(prevIndex => (prevIndex === 2 ? 0 : prevIndex + 1));
    }, 3000); // Change slide every 3 seconds

    return () => clearInterval(intervalId); // Clean up the interval when component unmounts
  }, []); // Run this effect only once when component mounts

  const handleIndicatorClick = (index) => {
    setActiveIndex(index); // Change activeIndex when indicator clicked
  };

  return (
    <>
      <Navbar />
      <h1>Hello</h1>
      <div id="carouselExampleIndicators" className="carousel slide" data-ride="carousel">
      
        <div className="carousel-inner">
          {[0, 1, 2].map(index => (
            <div key={index} className={`carousel-item ${index === activeIndex ? "active" : ""}`}>
              <div className='intro' style={{backgroundImage: `url(https://i.ibb.co/${getImageURL(index)})`, backgroundSize: 'cover', backgroundPosition: 'center', height: '450px'}}></div>
            </div>
          ))}
        </div>
      </div>
    </>
  );
}

function getImageURL(index) {
  // Return the appropriate image URL based on the index
  switch (index) {
    case 0:
      return "C7tGZGG/beach.jpg";
    case 1:
      return "zSxC4qf/prague.jpg";
    case 2:
      return "VVDCtzK/dubai.jpg";
    default:
      return ""; // Handle default case if needed
  }
}
