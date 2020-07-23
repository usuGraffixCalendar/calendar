const express = require("express");
const calendarRouter = require("./calendar.routes");
// const photosRouter = require("./photos.routes");
// const adminRouter = require("./admin.routes");
const app = express();

app.use("/calendar", calendarRouter);

// app.use("/admin", adminRouter);
module.exports = app;
