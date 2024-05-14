import React, { useState, useEffect } from 'react';
import RandomTripsList from '../randomTripsList/RandomTripsList';

function RandomTrips({ tripsData }) {
  const [randomTrips, setRandomTrips] = useState([]);

  useEffect(() => {
    selectRandomTrips(tripsData);
  }, [tripsData]);

  const selectRandomTrips = (data) => {
    const randomIndices = [];
    while (randomIndices.length < 4) {
      const randomIndex = Math.floor(Math.random() * data.length);
      if (!randomIndices.includes(randomIndex)) {
        randomIndices.push(randomIndex);
      }
    }
    const randomSelectedTrips = randomIndices.map(index => data[index]);
    setRandomTrips(randomSelectedTrips);
  };

  return (
    <div>
      <RandomTripsList trips={randomTrips} />
    </div>
  );
}

export default RandomTrips;
