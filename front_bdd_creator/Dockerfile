# Use an official Node.js runtime as a parent image
FROM node:20

# Set the working directory in the container to /app
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install any needed packages specified in package.json
RUN npm install

# Expose port 3000 to the outside world
EXPOSE 3000

# Run the React app
CMD ["npm", "start"]
