const path = require("path");

// This will handle the errors when we have input validation
const ErrHTTP = require("../utils/ErrHTTP");

// Will use this once we have CRUD operations up and running
const Events = require("../models/calendar.model");

/**
 * Gets all the photos in the database or photos from a specific event
 * @param {object} response
 * @param {object} request
 * @param {object} next
 * @returns {object} A JSON object of all events found
 */
exports.getEvents = async ({ params: { monthString } }, res, next) => {
  console.log("controller");
  try {
    const foundEvents = await Events.select(monthString);
    if (foundEvents.length == 0) {
      throw new ErrHTTP("No Events this month", 404);
    }
    return res.send(foundEvents);
  } catch (err) {
     console.error(err.message);
    next(err);
  }
};
