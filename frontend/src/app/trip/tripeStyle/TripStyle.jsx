"use client";

export default function TripStyle(props) {
  const {
    name,
    departure,
    comingBack,
    description,
    price,
    country,
    city,
    Category,
    image,
  } = props;

  function formatDate(dateString) {
    const options = {
      day: "2-digit",
      month: "2-digit",
      year: "numeric",
      hour: "2-digit",
      minute: "2-digit",
    };
    const formattedDate = new Date(dateString).toLocaleString("en-GB", options);
    return formattedDate;
  }
  return (
    <>
      <div>
        <h2>{name}</h2>
        <p>Departure: {formatDate(departure)}</p>
        <p>Return: {formatDate(comingBack)}</p>
        <p>Description: {description}</p>
        <p>Price: {price} €</p>
        <p>Country: {country}</p>
        <p>City: {city}</p>
        <p>Category: </p>{" "}
        {Category.map((category, index) => (
          <ul key={index}>
            <li>{category.name}</li>
          </ul>
        ))}
      </div>
      <div>
        <img src={image} alt={name} />
      </div>
    </>
  );
}
