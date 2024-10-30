import React from "react";
import { useNavigate } from "react-router-dom";

export const BackButton = () => {
  const navigate = useNavigate();

  const handleBackButtonClick = () => {
    navigate(-1);
  };

  return <button className="back-btn" onClick={handleBackButtonClick}>Back</button>;
};

export default BackButton;