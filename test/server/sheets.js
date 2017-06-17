var faker = require('faker')
function generateSheets () {
    var sheets = []
    for (var id = 0; id < 50; id++) {
      
      var color = faker.commerce.color();
      var department = faker.commerce.department();
      var productName = faker.commerce.productName();

      sheets.push({
        "id": id,
        "color": color,
        "department": department,
        "productName": productName
      })
    }
  return {"sheets":sheets}
}

module.exports = generateSheets