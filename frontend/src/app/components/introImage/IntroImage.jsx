import { useState, useEffect } from "react";  

export default function IntroImage() {
  const [activeIndex, setActiveIndex] = useState(0);  

  useEffect(() => {
    const intervalId = setInterval(() => {
      setActiveIndex((prevIndex) => (prevIndex === 4 ? 0 : prevIndex + 1));
    }, 2100);  

    return () => clearInterval(intervalId);  
  }, []);  

  const handleIndicatorClick = (index) => {
    setActiveIndex(index);  
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
      return ""; 
  }
}
