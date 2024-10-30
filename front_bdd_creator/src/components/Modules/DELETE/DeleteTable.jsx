import { useNavigate, useParams } from "react-router-dom";
import { deleteTable } from "../../../utils/utils";

export const DeleteTable = () => {
  const navigate = useNavigate();
  const { databaseName, tableName } = useParams();

  const handleDelete = () => {
    deleteTable(databaseName, tableName)
      .then((data) => {
        console.log(data);
        navigate(`/${databaseName}`);
      })
      .catch((error) => {
        console.error("Error deleting table:", error);
      });
  };

  return (
    <div className="container">
      <div className="AYS">
          <h1>Are you sure ? </h1>
        <button className="btn-delete" onClick={handleDelete}>Delete Table</button>
        <button className="btn-return" onClick={() => navigate(`/${databaseName}`)}>Cancel</button>
      </div>
    </div>
  );
};
export default DeleteTable;