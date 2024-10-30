
import React, { useState } from "react";
import { updateTableName } from "../../../utils/utils";

const UpdateTableName = ({ databaseName, tableName }) => {
  const [newTableName, setNewTableName] = useState("");
  const [isVisible, setIsVisible] = useState(false);

  const handleSubmit = async (event) => {
    event.preventDefault();
    try {
      const data = await updateTableName(databaseName, tableName, newTableName);
      console.log(data);
    } catch (error) {
      console.error("Error updating table name:", error);
    }
    window.location.reload();

  };

  return (
    <div>
      <button className="btn-hide2" onClick={() => setIsVisible(!isVisible)}>
        {isVisible ? "Hide" : "Update Name"}
      </button>
      {isVisible && (
        <form onSubmit={handleSubmit}>
          <label>
            New Table Name:
            <input
              type="text"
              value={newTableName}
              onChange={(event) => setNewTableName(event.target.value)}
            />
          </label>
          <button type="submit">Submit</button>
        </form>
      )}
    </div>
  );
};

export default UpdateTableName;
