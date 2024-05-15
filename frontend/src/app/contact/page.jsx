"use client";

import ContactForm from "../components/contactForm/ContactForm";
import Footer from "../components/footer/Footer";
import Navbar from "../components/navbar/Navbar";
import "./contact.css"

export default function Contact() {
  return (
    <>
      <Navbar />
      <div
        className="introContact"
        style={{
          backgroundImage: `url(https://i.ibb.co/k8NW6ZP/Port-Marseille.jpg)`,
          backgroundSize: "cover",
          backgroundPosition: "center",
          height: "170px",
        }}
      >
        <p className="introTextContact ">
       Don't hesitate; your next great adventure could be just a step away.
        </p>
      </div>
      <div className="contactForm  pt-3">
        <ContactForm />
      </div>
      <Footer />
    </>
  );
}
