
import "./home.css";
import React from "react";
// import ImageLoop from "../Test/Test";

const Home = () => {


  return (
    <div className="container">
      <div className="home">
        <h1>yoyoyoyoy</h1>
        <h1 className="welcome-message">Welcome on BDD Creator</h1>
        <h3>the best DatabaseManager </h3>
        <p>made by wish</p>
        <div>
          <img src="https://picsum.photos/id/200/200/300" alt="lorem" />
          <img src="https://picsum.photos/id/169/200/300" alt="lorem" />
          <img src="https://picsum.photos/id/190/200/300" alt="lorem" />
          <img src="https://picsum.photos/id/292/200/300" alt="lorem" />
        </div>
      </div>
      <test/>
    </div>
  );
};


export default Home;