import React from "react";
import { deleteRow } from "../../../utils/utils";
import { useNavigate, useParams } from "react-router-dom";

const DeleteRow = ({ databaseName, tableName, columnName, value }) => {

    const handleDelete = async () => {

    try {
      const data = await deleteRow(databaseName, tableName, columnName, value);
      console.log(data);
    } catch (error) {
      console.error("Error deleting row:", error);
    }
    window.location.reload();

  };

  return <button className="btn-delete" onClick={handleDelete}>Delete Row</button>;
};

export default DeleteRow;
