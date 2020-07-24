const express = require("express");
const calendarRouter = require("./calendar.routes");
const app = express();


app.use("/calendar", calendarRouter);


module.exports = app;
