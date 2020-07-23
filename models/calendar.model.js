const path = require("path");
const db = require("../db");
// This will handle the errors when we have input validation
const ErrHTTP = require("../utils/ErrHTTP");
const { param } = require("../middleware/calendar.routes");

/**
 * @typedef {Object} Event
 * @property {Integer} id
 * @property {string} eventName
 * @property {string} eventLocation
 * @property {Date} eventDate
 * @property {Time} eventTime
 * @property {Image} eventImage
 * @property {string} eventTags
 
 */

/**
 * Selects all the objects in the database.
 * Accepts optional query object to filter results.
 * @param {Object} [query] Event Name
 * @returns {Promise<[Object]>} A JSON object of all relevant events
 */
exports.select = async (query = {}) => {
  try {
    let queryString = "";
    const param = query;

    if (typeof query === "string") {
      queryString = `select * from calevent where month=? and quater=? and year =? `;
    } else {
      queryString = `SELECT eventThumb from calevent`;
    }
    let results = await new Promise((resolve, reject) =>
      db.query(queryString, (err, results) => {
        if (err) {
          reject(err);
        } else {
          resolve(results);
        }
      })
    );

    return results;
  } catch (err) {
    console.log(err.message);

    throw new ErrHTTP("Table or events not found", 404);
  }
};
