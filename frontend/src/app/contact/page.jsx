"use client";


import ContactForm from "../components/contactForm/ContactForm";
import Navbar from "../components/navbar/Navbar";

export default function Contact() {


    return (
        <>
    
      <Navbar />
        <div className="contactForm  pt-5">
        <ContactForm/>

        </div>
        
        
      </>
    );
  }
  