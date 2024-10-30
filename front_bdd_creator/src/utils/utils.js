

export const getInputType = (type) => {
  if (type.startsWith("int")) {
    return { type: "number" };
  } else if (type.startsWith("varchar")) {
    return { type: "text" };
  } else if (type.startsWith("date")) {
    return { type: "date" };
  } else if (type.startsWith("text")) {
    return { type: "textarea" };
  } else if (type.startsWith("decimal")) {
    return { type: "number", step: "0.01" };
  } else {
    return { type: "text" };
  }
};


export const getDatabaseCollection = async () => {
    try {
      const response = await fetch(`http://localhost/src/routes/GET/database/getCollectionDatabases.php`);

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      return data;
    } catch (error) {
      console.error('Error fetching database collection:', error);
    }
  };

export const getTableCollection = async (databaseName) => {
    try {
      const response = await fetch(`http://localhost/src/routes/GET/table/getCollectionTable.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ databaseName }),

      });

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      return data;
    } catch (error) {
      console.error('Error fetching table collection:', error);
    }
  }

export const getTable = async (databaseName, tableName) => {
    try {
      const response = await fetch(`http://localhost/src/routes/GET/table/getTable.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ databaseName, tableName }),
      });

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      return data;
    } catch (error) {
      console.error('Error fetching table:', error);
    }
  }

export const getTableColumnValue = async (databaseName, tableName) => {
    try {
      const response = await fetch(`http://localhost/src/routes/GET/table/getTableColumnValue.php`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ databaseName, tableName }),
      });

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const data = await response.json();
      return data;
    } catch (error) {
      console.error('Error fetching table columns:', error);
    }
  }

export const insertRow = async (databaseName, tableName, values) => {
    try{
        const responce = await fetch(`http://localhost/src/routes/POST/table/insertRow.php`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ databaseName, tableName, values }),
        });
        if(!responce.ok){
            throw new Error(`HTTP error! status: ${responce.status}`);
        }

        const data = await responce.json();
        return data;
    } catch (error) {
        console.error('Error inserting row:', error);
    }
}
export const createTable = async (databaseName, tableName) => {
  try {
    const response = await fetch(`http://localhost/src/routes/POST/table/createTable.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        databaseName,
        tableName,
        columns: "id INT PRIMARY KEY AUTO_INCREMENT PRIMARY KEY",
      }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error creating table:", error);
  }
};

export const createDatabase = async (databaseName) => {
  try {
    const response = await fetch(`http://localhost/src/routes/POST/database/createDatabase.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error creating database:", error);
  }
};  

export const addColumn = async (databaseName, tableName, columnName, columnType) => {
  try {
    const response = await fetch(`http://localhost/src/routes/POST/table/createColumn.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName, tableName, columnName, columnType }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error adding column:", error);
  }
}

export const deleteTable = async (databaseName, tableName) => {
  try {
    const response = await fetch(`http://localhost/src/routes/DELETE/table/dropTables.php`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName, tableName }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error deleting table:", error);
  }
}

export const deleteDatabase = async (databaseName) => {
  try {
    const response = await fetch(`http://localhost/src/routes/DELETE/database/dropDatabase.php`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error deleting database:", error);
  }
}

export const deleteRow = async (databaseName, tableName, columnName, value) => {
  try {
    const response = await fetch(`http://localhost/src/routes/DELETE/table/dropRow.php`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName, tableName, columnName, value }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error deleting row:", error);
  }
}

export const deleteColumn = async (databaseName, tableName, columnName) => {
  try {
    const response = await fetch(`http://localhost/src/routes/DELETE/table/dropColumn.php`, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName, tableName, columnName }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error deleting column:", error);
  }
}

export const updateTableName = async (databaseName, tableName, newTableName) => {
  try {
    const response = await fetch(`http://localhost/src/routes/PATCH/table/updateTableName.php`, {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName, tableName, newTableName }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error updating table name:", error);
  }
}

export const updateRow = async (databaseName, tableName, columnName, value, data) => {
  try {
    const response = await fetch(`http://localhost/src/routes/PATCH/table/updateRow.php`, {
      method: "PATCH",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName, tableName, columnName, value, data }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const res = await response.json();
    return res;
  } catch (error) {
    console.error("Error updating row:", error);
  }
}

export const dumpBase = async (databaseName) => {
  try {
    const response = await fetch(`http://localhost/src/routes/POST/database/dumpDatabase.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseName }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const res = await response.json();
    return res;
  } catch (error) {
    console.error("Error dumping database:", error);
  }
}

export const getDatabaseSaved = async () => {
  try {
    const response = await fetch(`http://localhost/src/routes/GET/database/getDatabaseSave.php`);

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Error fetching database collection:', error);
  }
};

export const restoreDatabase = async (databaseNewName, databaseName) => {
  try {
    const response = await fetch(`http://localhost/src/routes/POST/database/restoreDatabase.php`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ databaseNewName, databaseName }),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! status: ${response.status}`);
    }

    const res = await response.json();
    return res;
  } catch (error) {
    console.error("Error restoring database:", error);
  }
};

