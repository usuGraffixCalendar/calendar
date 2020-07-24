const express = require("express");

const app = express();
const router = express.Router();
const events = require("../controllers/calendar.controller");

// Gets all /events/all
router.get("/events", events.getEvents);

// // Gets by id /events/event/:id
// router.get("/events/:monthString", events.getEvents);

module.exports = router;
