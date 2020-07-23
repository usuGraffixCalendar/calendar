const app = require("./index");
const port = process.env.PORT || 5000;

const server = app.listen(port, () =>
  console.log("server starting on port 5000!")
);

module.exports = server;
