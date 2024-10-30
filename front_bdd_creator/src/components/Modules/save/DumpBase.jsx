import React, { useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { dumpBase } from "../../../utils/utils";

export const DumpBase = () => {
  const { databaseName } = useParams();
  const navigate = useNavigate();
  const [message, setMessage] = useState("");

  const handleDumpBase = async () => {
    try {
      const response = await dumpBase(databaseName)
        .then((data) => {
        console.log(data);
        if (data.result === "success") {
          setMessage(data.message);
        } else {
          setMessage("Error dumping base. Please try again.");
        }
      });
    } catch (error) {
      console.error("Error dumping base:", error);
      setMessage("Error dumping base. Please try again.");
    }
  };
  

  return (
    <div>
      <button onClick={handleDumpBase}>Save Database</button>
      {message && <p>{message}</p>}
    </div>
  );
};

export default DumpBase;
