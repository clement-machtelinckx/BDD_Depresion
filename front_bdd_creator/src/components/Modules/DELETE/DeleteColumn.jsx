import React, { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { deleteColumn, getTableColumnValue } from "../../../utils/utils";

export const DeleteColumn = () => {
  const navigate = useNavigate();
  const { databaseName, tableName } = useParams();
  const [colData, setColData] = useState([]);
  const [selectedColumn, setSelectedColumn] = useState("");

  useEffect(() => {
    console.log(databaseName, tableName);
    getTableColumnValue(databaseName, tableName)
      .then((colData) => {
        setColData(colData);
        console.log(colData);
      })
      .catch((error) => {
        console.error("Error fetching column data:", error);
      });
  }, [databaseName, tableName]);

  const handleDelete = () => {
    deleteColumn(databaseName, tableName, selectedColumn)
      .then((data) => {
        console.log(data);
        navigate(`/${databaseName}/${tableName}`);
      })
      .catch((error) => {
        console.error("Error deleting column:", error);
      });
      window.location.reload();

  };

  return (
    <div>
      <h2>Delete Column</h2>
      <form>
        <label htmlFor="column">Select column to delete:</label>
        <select
          id="column"
          value={selectedColumn}
          onChange={(e) => setSelectedColumn(e.target.value)}
        >
          <option value="">-- Select column --</option>
          {colData.map((column) => (
            <option key={column.Field} value={column.Field}>
              {column.Field}
            </option>
          ))}
        </select>
        <button className="btn-delete" type="button" onClick={handleDelete}>
          Delete Column
        </button>
      </form>
    </div>
  );
};

export default DeleteColumn;
