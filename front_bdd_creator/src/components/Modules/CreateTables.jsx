import React, { useEffect, useState } from "react";
import { useNavigate, Link, useParams } from "react-router-dom";
import { createTable } from "../../utils/utils";
import BackButton from "./BackButton";
import './create.css';

const CreateTables = () => {
  const { databaseName } = useParams();
  const navigate = useNavigate();
  const [data, setData] = useState([]);
  const [tableName, setTableName] = useState("");

  const handleCreateTableInputChange = (event) => {
    setTableName(event.target.value);
  };

  const handleCreateTableSubmit = async (event) => {
    event.preventDefault();

    try {
      const response = await createTable(databaseName, tableName);

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      console.log(data);
    } catch (error) {
      console.error("Error creating table:", error);
    }
    navigate(`/${databaseName}`);
  };
  

  return (
    <div className="container">
      <BackButton/>
      <h2>Create Table</h2>
      <form onSubmit={handleCreateTableSubmit}>
        <div>
          <label htmlFor="tableName">Table Name</label>
          <input type="text" name="tableName" id="tableName" onChange={handleCreateTableInputChange} />
        </div>
        <button type="submit">Create Table</button>
      </form>
    </div>
  );
};

export default CreateTables;
