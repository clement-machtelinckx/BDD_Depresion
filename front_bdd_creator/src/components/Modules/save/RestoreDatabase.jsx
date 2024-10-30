import React, { useState, useEffect } from "react";
import { getDatabaseSaved, restoreDatabase } from "../../../utils/utils";
import { useNavigate } from "react-router-dom";
import './restore_db.css';


export const RestoreDatabase = () => {
  const [savedDatabases, setSavedDatabases] = useState([]);
  const [newDatabaseNames, setNewDatabaseNames] = useState({});
  const navigate = useNavigate();

  useEffect(() => {
    getDatabaseSaved().then((data) => {
      const databases = Object.entries(data).map(([id, name]) => ({ id, name }));
      setSavedDatabases(databases);
    });
  }, []);

  const handleRestoreDatabase = async (databaseName) => {
    try {
      const response = await restoreDatabase(
        newDatabaseNames[databaseName],
        databaseName
      );
      console.log(response);

    } catch (error) {
      console.error("Error restoring database:", error);

    }
    // navigate(`/${newDatabaseNames[databaseName]}`);


  };

  const handleNewDatabaseNameChange = (databaseName, newName) => {
    setNewDatabaseNames({ ...newDatabaseNames, [databaseName]: newName });
  };

  return (
    <div className="container">
      <h2>Restore Database</h2>
      <div className="restore_db">
      {savedDatabases.map((database) => (
        <div key={database.id}>
          <label htmlFor="">Enter New Name </label>
          <input 
            type="text"
            value={newDatabaseNames[database.name] || ""}
            onChange={(e) =>
              handleNewDatabaseNameChange(database.name, e.target.value)
            }
          />
          <button onClick={() => handleRestoreDatabase(database.name)}>
            Restore
          </button>
          <p>{database.name}</p>
        </div>
      ))}
      </div>
    </div>
  );
};

export default RestoreDatabase;
