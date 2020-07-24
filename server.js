const app = require("./index");
const port = process.env.PORT || 3306;

const server = app.listen(port, () => console.log("server starting "));

module.exports = server;
