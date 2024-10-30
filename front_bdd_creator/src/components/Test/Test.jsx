import React from "react";

const ImageLoop = () => {
  const imageIds = Array.from({ length: 300 }, (_, i) => i + 1);

  return (
    <div>
      {imageIds.map((id) => (
        <img
          key={id}
          src={`https://picsum.photos/id/${id}/200/300`}
          alt={`lorem image ${id}`}
        />
      ))}
    </div>
  );
};

export default ImageLoop;
