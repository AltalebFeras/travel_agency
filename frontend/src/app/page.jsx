'use client'

import Navbar from "./components/navbar/Navbar";
import TripsList from "./components/tripsList/TripsList";



export default function Home() {
  return (
    <>
    
    <Navbar/>
    <h1>Hello</h1>
    <div className="grid grid-cols-3 p-4 gap-2">
      <img alt="gallery" className="block object-cover object-center w-full h-full rounded-lg" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(73).webp" />
      <img alt="gallery" className="block object-cover object-center w-full h-full rounded-lg" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(74).webp" />
      <img alt="gallery" className="block object-cover object-center w-full h-full rounded-lg" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(75).webp" />
      <img alt="gallery" className="block object-cover object-center w-full h-full rounded-lg" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(76).webp" />
      <img alt="gallery" className="block object-cover object-center w-full h-full rounded-lg" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(77).webp" />
      <img alt="gallery" className="block object-cover object-center w-full h-full rounded-lg" src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/Nature/4-col/img%20(78).webp" />
    </div>
        </>
  );
}
