require("dotenv").config();
const mysql = require("mysql");

// Add the credentials to access your database

const pool = mysql.createPool({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASS,
  database: process.env.DB_DATABASE,
});

pool.on("connection", function (connection) {
  console.log("Connected");
});

module.exports = pool;
