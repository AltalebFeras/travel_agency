"use client";
import Navbar from "./components/navbar/Navbar";
import IntroImage from "./components/introImage/IntroImage";
import Footer from "./components/footer/Footer";
import "./globals.css";
import FetchTripsRandom from "./trip/FetchTripsRandom";

export default function Home() {
  return (
    <>
      <Navbar />
      
      <div
            className="intro"
            style={{
              backgroundImage: `url(https://i.ibb.co/k8NW6ZP/Port-Marseille.jpg)`,
              backgroundSize: "cover",
              backgroundPosition: "center",
              height: "450px",
            }}
          >
            <p className="introText ">
              "Adventure awaits around every corner, go find it!"
            </p>
          </div>

          <FetchTripsRandom/>

      <Footer />
    </>
  );
}
