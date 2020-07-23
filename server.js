const app = require("./index");
const port = 5000;

const server = app.listen(process.env.PORT || port, () =>
  console.log("server starting on port 5000!")
);

module.exports = server;
