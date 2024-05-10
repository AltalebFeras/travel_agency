import React, { useState } from 'react';
import './contactForm.css';
import Link from 'next/link';

export default function ContactForm({ tripId }) {
    const [formData, setFormData] = useState({
        firstName: '',
        lastName: '',
        email: '',
        message: ''
    });

    const [errors, setErrors] = useState({
        firstName: '',
        lastName: '',
        email: '',
        message: ''
    });

    const [message, setMessage] = useState('');
    const [messageError, setMessageError] = useState('');

    const handleChange = (e) => {
        const { name, value } = e.target;
        setFormData(prevState => ({
            ...prevState,
            [name]: value
        }));
        // Clear error when user starts typing
        setErrors(prevErrors => ({
            ...prevErrors,
            [name]: ''
        }));
    };

    const handleSubmit = async (e) => {
        e.preventDefault();

        // Verification
        let newErrors = {};

        if (formData.firstName.length < 3) {
            newErrors.firstName = 'First name must be at least 3 characters long.';
        }

        if (formData.lastName.length < 3) {
            newErrors.lastName = 'Last name must be at least 3 characters long.';
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(formData.email)) {
            newErrors.email = 'Invalid email address.';
        }

        // No need to validate message length, as it's not specified in the backend entity

        if (Object.keys(newErrors).length > 0) {
            setErrors(newErrors);
            return;
        }

        // Prepare data for backend
        const requestData = {
            firstName: formData.firstName,
            lastName: formData.lastName,
            email: formData.email,
            message: formData.message,
            status: { id: 1 } // Assuming this is the status ID required by the backend
        };

        // Submit data to API
        try {
            const response = await fetch('https://127.0.0.1:8000/api/contact/new', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(requestData)
            });

            if (response.ok) {
                const successMessage = 'Reservation submitted successfully.';
                setMessage(successMessage);
                setFormData({
                    firstName: '',
                    lastName: '',
                    email: '',
                    message: ''
                });
            } else {
                setMessageError('There is already a reservation request with this email.');
            }
        } catch (error) {
            const messageError = 'Network error: ' + error.message;
            setMessageError(messageError);
        }
    };

    return (
        <div>
            <form className="form" onSubmit={handleSubmit}>
                <p className="title">Contact request</p>
                <p className="fs-5">Fill out your information.</p>
                {errors.firstName && <p className="error">{errors.firstName}</p>}
                {errors.lastName && <p className="error">{errors.lastName}</p>}
                {errors.email && <p className="error">{errors.email}</p>}
                {message && <p className="message fs-6">{message}</p>}
                {messageError && <p className="messageError fs-6">{messageError}</p>}
                <div className="flex">
                    <label>
                        <span>First name</span>
                        <input required placeholder="John" type="text" className="input" name="firstName" value={formData.firstName} onChange={handleChange} />
                    </label>

                    <label>
                        <span>Last name</span>
                        <input required placeholder="Cena" type="text" className="input" name="lastName" value={formData.lastName} onChange={handleChange} />
                    </label>
                </div>

                <label>
                    <span>Email</span>
                    <input required placeholder="JohnCena@mail.com" type="email" className="input" name="email" value={formData.email} onChange={handleChange} />
                </label>
                <label>
                    <span>Message</span>
                    <input required placeholder="Type your message" type="text" className="input" name="message" value={formData.message} onChange={handleChange} />
                </label>
                <div  className="d-flex justify-content-end">

                <button type="submit" className="submit px-5 mx-3 d-flex justify-content-end">Send</button>
                </div>
                {/* <p className="signin">For any other info, you can <Link href="/contact">Contact us</Link></p> */}
            </form>
        </div>
    );
}
