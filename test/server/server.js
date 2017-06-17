//server.js
const jsonServer = require('json-server')
const customers = require('./customers')
const sheets = require('./sheets')
const server = jsonServer.create()
const router_customers = jsonServer.router(customers())
const router_sheets = jsonServer.router(sheets())
const middlewares = jsonServer.defaults()

server.use(middlewares)
server.use('/customers',router_customers)
server.use('/sheets',router_sheets)
server.listen(3000, () => {
  console.log('JSON Server is running')
})