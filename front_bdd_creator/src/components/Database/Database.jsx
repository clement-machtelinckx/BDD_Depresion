import React, { useEffect, useState } from "react";
import { useNavigate, Link } from "react-router-dom";
import { getDatabaseCollection } from "../../utils/utils";
import { useParams } from "react-router-dom";
import './database.css';


const Database = () => {
  const navigate = useNavigate();
  const [data, setData] = useState([]);

  useEffect(() => {
    getDatabaseCollection()
      .then((data) => {
        setData(data);
        console.log(data[0]);
      })
      .catch((error) => {
        console.error("Error fetching database collection:", error);
      });
  }, []);

  return (
    <div className="container">
      <div class="database_list">
        <div>
        <h1>Database List</h1>
          {data.length > 0 ? (
            <ul>
              {data.map((databaseName, index) => (
                <li key={index} className="list-item">
                <button className="btn-delete" onClick={() => navigate(`/${databaseName}/delete/`)}>Delete</button>
                  <Link className="custom-link" to={`/${databaseName}`}>{databaseName}</Link>
                </li>
                
              ))}

            </ul>
          ) : (
            <p>Loading...</p>
          )}
        </div>
        <div className="create_db">
          <h3>Create your database</h3>
        <Link className="custom-link" to="/database/create">Create Database</Link>
        </div>
      </div>
    </div>
  );
}

export default Database;
