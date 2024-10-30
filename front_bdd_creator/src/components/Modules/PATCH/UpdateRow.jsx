// UpdateRow.js

import React, { useState } from "react";
import { updateRow, getInputType } from "../../../utils/utils";

const UpdateRow = ({ databaseName, tableName, rowData, colData }) => {
  const [newValues, setNewValues] = useState(rowData);
  const [isVisible, setIsVisible] = useState(false);

  const handleSubmit = async (event) => {
    event.preventDefault();
    try {
      const value = newValues.id; 
      const data = await updateRow(databaseName, tableName, "id", value, newValues);
      console.log(data);
    } catch (error) {
      console.error("Error updating row:", error);
    }
    window.location.reload();

  };
  const handleChange = (event) => {
    const { name, value } = event.target;
    setNewValues({ ...newValues, [name]: value });
  };

  return (
    <div>

  
        <form onSubmit={handleSubmit}>
          {colData.map((column) => {
            const { type, step } = getInputType(column.Type);
            return (
              <div key={column.Field}>
                {/* <label htmlFor={column.Field}>{column.Field}</label> */}
                <input type={type} name={column.Field} id={column.Field} step={step} value={newValues[column.Field]} onChange={handleChange} />
              </div>
            );
          })}
          <button type="submit">Submit</button>
        </form>
    </div>
  );
};

export default UpdateRow;
