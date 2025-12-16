#  MongoDB Comprehensive Guide (Personal Notes)

MongoDB is a **NoSQL, document-oriented database** designed for scalability, flexibility, and high performance. Instead of tables and rows (as in SQL), MongoDB stores data as **documents** in **collections**, using a JSON-like format called **BSON**.

---

##  How MongoDB Works

* MongoDB stores data in **Documents** (similar to rows).
* Documents are grouped into **Collections** (similar to tables).
* Collections exist inside **Databases**.
* MongoDB is **schema-less**, meaning documents in the same collection can have different structures.

### Data Hierarchy

```
Database
 └── Collection
      └── Document
           └── Fields
```

---

##  How Searching Works in MongoDB

MongoDB uses a powerful query system based on:

* **Filters** (conditions)
* **Operators** (comparison, logical, update operators)
* **Indexes** (to speed up searching)

Queries are written in **JavaScript syntax** inside the MongoDB shell or drivers.

---

##  Database Design in MongoDB

* You can split data into multiple databases based on:

  * Application modules
  * Environment (dev / staging / production)
* Each database contains collections grouped by purpose.
* Relationships are usually handled by:

  * **Embedding documents** (nested objects)
  * Or **Referencing** using IDs

---

# 🛠 MongoDB Shell Commands

## 🔌 Connection

```bash
mongosh
```

Create a connection.

```bash
cls
```

Clear the shell.

```bash
exit
```

Close the connection.

---

##  Databases

```bash
show dbs
```

Show all databases.

```bash
use <db_name>
```

Use or create a database (not visible until data is added).

```bash
db.dropDatabase()
```

Drop the current database.

---

##  Collections

```js
db.createCollection("<collection_name>")
```

Create a collection.

```js
db.createCollection("students", {
  capped: true,
  size: 1000000,
  max: 100
})
```

Create a **capped collection** with size or document limits.

```js
db.<collection_name>.drop()
```

Drop a collection.

---

##  Insert Data

### Insert One Document

```js
db.<collection_name>.insertOne({
  key: value,
  key2: "value"
})
```

### Insert Many Documents

```js
db.<collection_name>.insertMany([
  {},
  {}
])
```

---

##  Retrieve Data

```js
db.<collection_name>.find()
```

Show all documents.

### Retrieve Specific Data (Query + Projection)

```js
db.<collection_name>.find({ query }, { projection })
```

Examples:

```js
// name = Ahmed
db.students.find({ name: "Ahmed" })

// is_active = true
db.students.find({ is_active: true })

// is_active = true AND GPA = 3
db.students.find({ is_active: true, GPA: 3 })

// Only name field
db.students.find({ is_active: true, GPA: 3 }, { name: true })

// Only names without _id
db.students.find({}, { _id: false, name: true })
```

---

##  Data Types

Each document can contain:

* int
* float
* string
* date
* null
* object
* array

### Array Example

```js
{ nums: [1, 2, 3] }
```

### Date Example

```js
{ today: new Date() }
```

### Object Example

```js
{
  user: {
    name: "Ahmed",
    age: 25
  }
}
```

---

##  Sorting & Limiting

```js
db.<collection_name>.find().sort({ name: 1 })
```

Ascending (A → Z).

```js
db.<collection_name>.find().sort({ name: -1 })
```

Descending (Z → A).

```js
db.<collection_name>.find().limit(5)
```

Limit results.

```js
db.students.find().sort({ gpa: -1 }).limit(1)
```

Get highest GPA.

---

##  Update Documents

```js
db.<collection_name>.updateOne({ filter }, { update })
```

```js
db.<collection_name>.updateMany({ filter }, { update })
```

Examples:

```js
// GPA = 4 → is_success = true
db.students.updateOne({ GPA: 4 }, { $set: { is_success: true } })

// Update by ID
db.students.updateOne({ _id: ObjectId("4sdsdfgdfgdfg") }, { $set: { is_success: true } })

// Update all
db.students.updateMany({}, { $set: { is_success: true } })
```

---

##  Delete Documents

```js
db.<collection_name>.deleteOne({ query })
```

```js
db.<collection_name>.deleteMany({ query })
```

---

##  Comparison Operators

All operators must be inside `{}`.

* `$set` → assign value
* `$unset` → remove field
* `$exists` → check existence
* `$ne` → not equal
* `$lt` → less than
* `$gt` → greater than
* `$gte` → greater than or equal
* `$lte` → less than or equal
* `$in` → in array
* `$nin` → not in array

Examples:

```js
db.students.find({ is_active: { $exists: true } })
db.students.find({ name: { $ne: "Ahmed" } })
db.students.find({ age: { $lt: 20 } })
db.students.find({ GPA: { $gte: 2, $lte: 4 } })
```

---

##  Logical Operators

```js
// AND
db.students.find({ $and: [{ is_active: true }, { age: { $gt: 20 } }] })

// OR
db.students.find({ $or: [{ is_active: true }, { age: { $lt: 18 } }] })

// NOR
db.students.find({ $nor: [{ is_active: true }, { age: { $lt: 18 } }] })

// NOT
db.students.find({ is_active: { $not: { $eq: true } } })
```

---

##  Indexes

Indexes improve query performance.

```js
db.<collection_name>.createIndex({ name: 1 })
```

Create an index.

```js
db.<collection_name>.getIndexes()
```

Get all indexes.

```js
db.<collection_name>.dropIndex("<index_name>")
```

Drop an index.

> By default, MongoDB creates an index on `_id`.

To disable it:

```js
db.createCollection("students", { autoIndex: false })
```

---

##  Query Execution Stats

```js
db.students.find({}).explain("executionStats")
```

Get query performance details.

---



## 🟢 When to Use MongoDB

Use **MongoDB** as your database when:

- Your data structure is **dynamic** and changes frequently.
- You work with **JSON / API-driven applications**.
- You need **high read/write performance**.
- Your application requires **horizontal scalability** (Sharding).
- You store **nested or hierarchical data** (objects inside objects).
- You want fast development without strict schema constraints.

### Common Use Cases

- Real-time applications
- Analytics & logging systems
- Content management systems (CMS)
- IoT & event-based systems
- Microservices architectures

---

## ⭐ MongoDB Advantages

- **Schema-less** → faster iteration & flexibility
- **High performance** for large datasets
- **Horizontal scaling** built-in
- **Rich query language** with powerful operators
- **Embedded documents** reduce the need for joins
- **Easy integration** with modern backend frameworks

---

## ⚖️ MongoDB vs MySQL Comparison

| Feature | MongoDB | MySQL |
|------|--------|-------|
| Database Type | NoSQL (Document-based) | SQL (Relational) |
| Data Structure | Documents (BSON / JSON-like) | Tables & Rows |
| Schema | Schema-less | Fixed Schema |
| Relationships | Embedded / Referenced | Foreign Keys & Joins |
| Scalability | Horizontal (Sharding) | Vertical (Mainly) |
| Performance | High for large & dynamic data | Strong for structured data |
| Transactions | Supported (Multi-document) | Fully supported |
| Best Use Case | Big data, APIs, fast-changing apps | Financial systems, strict data integrity |
| Learning Curve | Easy for JS developers | Requires strong SQL knowledge |

---

## 📝 Final Notes

- MongoDB is flexible and fast.
- Best suited for large, evolving datasets.
- Indexing is critical for performance.
- Embedding is preferred over joins.
- **MySQL is preferred** when strong consistency, transactions, and complex joins are required.
