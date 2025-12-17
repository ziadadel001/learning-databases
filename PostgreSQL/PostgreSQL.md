# PostgreSQL Basics, Notes, and Comparison with MySQL

---

##  Important Information About PostgreSQL

PostgreSQL is an advanced **open-source relational database management system (RDBMS)** known for its reliability, strong data integrity, and full SQL standards compliance. It supports advanced data types, complex queries, indexing strategies, and strict transactional consistency.

### Key Characteristics

* Fully ACID compliant
* Strong support for complex queries and large datasets
* Advanced indexing (B-Tree, Hash, GIN, GiST, BRIN)
* Native support for JSON/JSONB
* Strong data type enforcement (strict typing)
* Case-sensitive by default for identifiers

---

##  PostgreSQL vs MySQL 

| Feature                 | PostgreSQL                          | MySQL                       |
| ----------------------- | ----------------------------------- | --------------------------- |
| SQL Standard Compliance | Very High                           | Medium                      |
| Data Type Strictness    | Strict                              | Flexible (sometimes unsafe) |
| JSON Support            | Advanced (JSONB)                    | Basic                       |
| Indexing                | Advanced & multiple types           | Mostly B-Tree               |
| Performance             | Better for complex queries          | Faster for simple reads     |
| ALTER TABLE             | Slower (safe & strict)              | Faster (less strict)        |
| Use Case                | Complex systems, fintech, analytics | Simple to medium web apps   |

### When to Use Each

* **Use PostgreSQL**: complex queries, financial systems, analytics, large data, strict consistency
* **Use MySQL**: simple CRUD apps, CMS systems, read-heavy workloads

---

##  Speed Comparison 

| Operation | Fastest → Slowest                        |
| --------- | ---------------------------------------- |
| SELECT    | Indexed SELECT → Normal SELECT           |
| INSERT    | Simple INSERT → INSERT with constraints  |
| UPDATE    | UPDATE with index → UPDATE without index |
| DELETE    | DELETE with index → DELETE without index |
| ALTER     | MySQL faster than PostgreSQL             |
| DROP      | Usually fast in both                     |

> PostgreSQL prioritizes data safety over speed in schema changes.

---

##  PostgreSQL GUI & pgAdmin Notes

* pgAdmin is a powerful GUI to manage everything visually
* Default database: `postgres`
* Open Query Tool: **ALT + SHIFT + Q**
* Execute query: **F5** or Execute button

### Important Notes

* PostgreSQL identifiers are **case-sensitive**
* SQL keywords should be written in **UPPERCASE** (best practice)
* Strings must use **single quotes `' '`**
* NULL comparison uses `IS NULL`, not `= NULL`

---

##  Basic SQL Queries (PostgreSQL)

### Create Table

```sql
CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    product_name VARCHAR(200),
    price INTEGER
);
```

### Insert Data

```sql
INSERT INTO products (product_name, price)
VALUES ('Ziad', 50);
```

### Select Data

```sql
SELECT * FROM products;
SELECT product_name FROM products;
SELECT * FROM products WHERE price < 20;
```

### Update Data

```sql
UPDATE products SET price = 100;
UPDATE products SET price = 100 WHERE product_name = 'Ziad';
```

### Delete Data

```sql
DELETE FROM products WHERE price IS NULL;
```

---

##  ALTER TABLE Operations

### Add Column

```sql
ALTER TABLE products ADD COLUMN is_active BOOLEAN DEFAULT true;
```

### Change Column Type

```sql
ALTER TABLE products
ALTER COLUMN price TYPE VARCHAR(255);
```

### Using Clause (When Data Exists)

```sql
ALTER TABLE products
ALTER COLUMN price TYPE NUMERIC
USING price::NUMERIC;
```

---

##  Creating Relationships (Foreign Keys)

### One-to-Many Example

```sql
CREATE TABLE orders (
    id SERIAL PRIMARY KEY,
    product_id INTEGER,
    CONSTRAINT fk_product
        FOREIGN KEY (product_id)
        REFERENCES products(id)
        ON DELETE CASCADE
);
```

### Add Relation to Existing Table

```sql
ALTER TABLE orders
ADD COLUMN product_id INTEGER;

ALTER TABLE orders
ADD CONSTRAINT fk_product
FOREIGN KEY (product_id)
REFERENCES products(id);
```

---

##  Indexing in PostgreSQL

### Create Index

```sql
CREATE INDEX idx_products_price ON products(price);
```

### Unique Index

```sql
CREATE UNIQUE INDEX idx_products_name ON products(product_name);
```

### When to Use Indexes

* Columns used in WHERE
* Columns used in JOIN
* Columns used in ORDER BY

NOTE Too many indexes slow down INSERT and UPDATE.

---

##  JOINs in PostgreSQL (Same as MySQL)

| JOIN Type  | Description               |
| ---------- | ------------------------- |
| INNER JOIN | Matching rows only        |
| LEFT JOIN  | All left + matched right  |
| RIGHT JOIN | All right + matched left  |
| FULL JOIN  | All rows from both tables |

### Example

```sql
SELECT products.product_name, orders.id
FROM products
INNER JOIN orders ON products.id = orders.product_id;
```

### PostgreSQL vs MySQL JOINs

* Syntax is **identical**
* PostgreSQL optimizer is usually smarter with complex joins
* PostgreSQL supports FULL JOIN (MySQL does not natively)

---

##  Final Notes

* PostgreSQL is strict and safe
* MySQL is flexible and fast
* PostgreSQL is preferred for long-term scalable systems
* MySQL is easier for beginners and CMS-based apps

---

> Recommendation: Learn MySQL first, then PostgreSQL to understand strict SQL behavior.
