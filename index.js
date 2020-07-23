const express = require("express");
const cors = require("cors");
const router = require("./middleware/meta.routes");
const bodyParser = require("body-parser");

const app = express();

app.use(cors());
// parse application/x-www-form-urlencoded
app.use(bodyParser.urlencoded({ extended: false }));
// parse application/json
app.use(bodyParser.json());

app.use("/", router);

module.exports = app;
