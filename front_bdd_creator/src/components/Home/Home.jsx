
import "./home.css";
import React from "react";
// import ImageLoop from "../Test/Test";



import { useNavigate, Link } from "react-router-dom";

const Home = () => {
const navigate = useNavigate();

  return (
    <div className="container">
      <div className="home">
        <h1>yoyo</h1>
        <h1 className="welcome-message">Welcome on BDD Creator</h1>
        <h3>the best DatabaseManager </h3>
        <p>made by wish</p>
        <div>
          <img src="https://picsum.photos/id/200/200/300" alt="lorem image" />
          <img src="https://picsum.photos/id/169/200/300" alt="lorem image" />
          <img src="https://picsum.photos/id/190/200/300" alt="lorem image" />
          <img src="https://picsum.photos/id/292/200/300" alt="lorem image" />
        </div>
      </div>
      <test/>
    </div>
  );
};


export default Home;