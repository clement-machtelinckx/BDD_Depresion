import React from "react";
import { Link } from "react-router-dom";
import './header.css';

const Header = () => {
  return (
    <div className="container">
        <header className="header">
        <nav>

            <p><Link to="/">Home</Link></p>
            <p><Link to="/database">Database</Link></p>
            <p><Link to="/restore">Restore Database</Link></p>
        </nav>
        </header>
    </div>
  );
};

export default Header;
