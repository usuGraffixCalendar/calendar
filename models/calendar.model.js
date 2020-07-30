const db = require("../db");
// This will handle the errors when we have input validation
const ErrHTTP = require("../utils/ErrHTTP");

/**
 * @typedef {Object} Event
 * @property {string} month
 * @property {string} quater
 * @property {string} year

 
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

    queryString = `SELECT * FROM usuwebdata.calevent ORDER BY start ASC WHERE year="2020" AND quater="summer" AND month IS NOT NULL `;

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
