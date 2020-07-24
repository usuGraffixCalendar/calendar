const app = require("./index");
const port = process.env.PORT || 5000;
const server = app.listen(port, () => console.log("server starting now "));
module.exports = server;
