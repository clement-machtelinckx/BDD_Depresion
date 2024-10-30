import React, { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { deleteDatabase } from "../../../utils/utils";
import './delete.css';

export const DeleteDatabase = () => {
  const navigate = useNavigate();
  const { databaseName } = useParams();

  const handleDelete = () => {
    deleteDatabase(databaseName)
      .then((data) => {
        console.log(data);
        navigate(`/database`);
      })
      .catch((error) => {
        console.error("Error deleting table:", error);
      });
  };

  return (
    <div className="container">
      <div className="AYS">
        <h1>Are you sure ? </h1>
      <button className="btn-delete" onClick={handleDelete}>Delete Database</button>
      <button className="btn-return" onClick={() => navigate(`/database`)}>Cancel</button>
      </div>
    </div>
  );
};
export default DeleteDatabase;