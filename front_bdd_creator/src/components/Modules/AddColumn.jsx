import React, { useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { addColumn } from "../../utils/utils";

export const AddColumn = () => {
  const { databaseName, tableName } = useParams();
  const navigate = useNavigate();
  const [columnName, setColumnName] = useState("");
  const [columnType, setColumnType] = useState("VARCHAR(255)");

  const handleColumnNameChange = (event) => {
    setColumnName(event.target.value);
  };

  const handleColumnTypeChange = (event) => {
    setColumnType(event.target.value);
  };

  const handleAddColumnSubmit = async (event) => {
    event.preventDefault();

    try {
      const response = await addColumn(databaseName, tableName, columnName, columnType);

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      console.log(data);

    } catch (error) {
      console.error("Error adding column:", error);
    }
    window.location.reload();

  };

  return (
    <div>
      <h2>Add Column</h2>
      <form onSubmit={handleAddColumnSubmit}>
        <div>
          <label htmlFor="columnName">Column Name</label>
          <input type="text" name="columnName" id="columnName" onChange={handleColumnNameChange} />
        </div>
        <div>
          <label htmlFor="columnType">Column Type</label>
          <select name="columnType" id="columnType" onChange={handleColumnTypeChange}>
            <option value="">--Select Type--</option>
            <option value="INT(9)">INT(9)</option>
            <option value="VARCHAR(255)">VARCHAR(255)</option>
            <option value="TEXT">TEXT</option>
            <option value="DECIMAL(10,2)">DECIMAL(10,2)</option>
            <option value="DATE">DATE</option>
          </select>
        </div>
        <button type="submit">Add Column</button>
      </form>
    </div>
  );
};

export default AddColumn;
