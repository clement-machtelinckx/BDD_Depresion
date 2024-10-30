// SelectedTable.js

import React, { useEffect, useState } from "react";
import { useNavigate, Link, useParams } from "react-router-dom";
import { getTable, getTableColumnValue, getInputType, insertRow } from "../../utils/utils";
import "./selectedTable.css";
import AddColumn from "../Modules/AddColumn";
import DeleteColumn from "../Modules/DELETE/DeleteColumn";
import DeleteRow from "../Modules/DELETE/DeleteRow";
import UpdateRow from "../Modules/PATCH/UpdateRow";
import BackButton from "../Modules/BackButton";

const SelectedTable = () => {
  const navigate = useNavigate();
  const [data, setData] = useState([]);
  const [colData, setColData] = useState([]);
  const { databaseName, tableName } = useParams();
  const [formData, setFormData] = useState({});

  useEffect(() => {
    getTableColumnValue(databaseName, tableName)
      .then((colData) => {
        setColData(colData);
        console.log(colData);
      })

    getTable(databaseName, tableName)
      .then((data) => {
        setData(data);
        console.log(data);
      })
      .catch((error) => {
        console.error("Error fetching table collection:", error);
      });
  }, []);

  const handleInputChange = (event) => {
    const { name, value } = event.target;
    setFormData({ ...formData, [name]: value });
  };

  const handleSubmit = async (event) => {
    event.preventDefault();

    try {
      const response = await insertRow(databaseName, tableName, [formData]);

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      console.log(data);
      
    } catch (error) {
      console.error("Error inserting row:", error);
    }
    window.location.reload();

  };

  return (
    <div className="container">
      <BackButton/>
      <h1> Table {tableName}</h1>
      <AddColumn/><DeleteColumn/>
      <table>
        <thead>
          <tr>
            {colData.map((col, index) => (
              <th key={index}>{col.Field}</th>
            ))}
          </tr>
        </thead>
        <tbody>
          {data.map((row, index) => (
            <React.Fragment key={index}>
              <tr>
              <td colSpan={colData.length + 1}>
                  <UpdateRow
                    databaseName={databaseName}
                    tableName={tableName}
                    rowData={row}
                    colData={colData}
                  />
                </td>
                <DeleteRow
                  databaseName={databaseName}
                  tableName={tableName}
                  columnName="id"
                  value={row.id}
                />
              </tr>
              <tr>
                {/* <td colSpan={colData.length + 1}>
                  <UpdateRow
                    databaseName={databaseName}
                    tableName={tableName}
                    rowData={row}
                    colData={colData}
                  />
                </td> */}
              </tr>
            </React.Fragment>
          ))}
        </tbody>
      </table>

      <div>
        <h1>Insert Row</h1>
        {colData.length > 0 && (
          <form onSubmit={handleSubmit}>
            {colData.map((column) => {
              const { type, step } = getInputType(column.Type);
              return (
                <div key={column.Field} className="insert-row">
                  <label htmlFor={column.Field}>{column.Field}</label>
                  <input type={type} name={column.Field} id={column.Field} step={step} onChange={handleInputChange} />
                </div>
              );
            })}
            <button type="submit">Submit</button>
          </form>
        )}
      </div>
    </div>
  )
}

export default SelectedTable;
