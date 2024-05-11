import { useState, useEffect } from "react"; // Import useState and useEffect hooks

export default function IntroImage() {
  const [activeIndex, setActiveIndex] = useState(0); // State to track active slide index

  useEffect(() => {
    const intervalId = setInterval(() => {
      // Increment activeIndex to switch to the next slide
      setActiveIndex((prevIndex) => (prevIndex === 4 ? 0 : prevIndex + 1));
    }, 2100); // Change slide every 3 seconds

    return () => clearInterval(intervalId); // Clean up the interval when component unmounts
  }, []); // Run this effect only once when component mounts

  const handleIndicatorClick = (index) => {
    setActiveIndex(index); // Change activeIndex when indicator clicked
  };

  return (
    <div className="">
      {[0, 1, 2, 3, 4].map((index) => (
        <div
          key={index}
          className={`carousel-item ${index === activeIndex ? "active" : ""}`}
        >
          <div
            className="intro"
            style={{
              backgroundImage: `url(https://i.ibb.co/${getImageURL(index)})`,
              backgroundSize: "cover",
              backgroundPosition: "center",
              height: "450px",
            }}
          >
            <p className="introText ">
              "Adventure awaits around every corner, go find it!"
            </p>
          </div>
        </div>
      ))}
    </div>
  );
}

function getImageURL(index) {
  // Return the appropriate image URL based on the index
  switch (index) {
    case 0:
      return "kGbfHqF/Northern-Lights-Scandinavia-Norway.jpg";
    case 1:
      return "DLBKBLN/Moselle-River.jpg";
    case 2:
      return "k8NW6ZP/Port-Marseille.jpg";
    case 3:
      return "bL4NzC2/Guadalupe-Texas.jpg";
    case 4:
      return "D5JBXvW/Piotr-chrobot.jpg";
    default:
      return ""; // Handle default case if needed
  }
}
