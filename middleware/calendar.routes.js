const express = require("express");

const app = express();
const router = express.Router();
const events = require("../controllers/calendar.controller");

// Gets all calendar/events
router.get("/events", events.getEvents);

// Gets by date calendar/events/:monthString
router.get("/events/:monthString", events.getEvents);

module.exports = router;
