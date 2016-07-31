# PHP Database-Class

This Database-Class is made to make handling databases (and database-operations) in PHP more easy.

##Other Databases

You can add support for any other database by using the file `db-blank.php`. I'm currently working to support mongodb.

## Examples

Examples can be found in `examples.php` or in the "Examples"-Section of this document.

## Initialize

First, you need to create an connection to your database:
```php
$db = new db('server', 'database', 'user', 'password', 'prefix');
```
The last pararmeter is optional. If provided, it will be put in front of each table name. This is useful if you have multiple applications in one database.

To use the methods, you need to first specify the table:

```php
$db->setCol('Blog');
```

## Provide Data

You can provide data either directly in the function (via pararmeters) or before via `$db->data` with the same options.
Parameters you provide directly in the function, are of higher priority as data provided via `$db->data`.

##get()

Get data with this function, it returns an array with the data.

All data is available via `$db->data`.

### Syntax

`$db->get($where = [], $link = 'AND')`

`$where`
 An array to return specific data. If provided, only data which matches is returnend. Scheme: `['key' => 'value']`.
 
 You can also provde the data via `$db->data['key'] = 'value'`.

`$link` 
 If you provide more than one key, you can choose via this pararmeter how to connect them, currently via `AND` or `OR`. Standard is `AND`.
 
To see it in action, take a look at `example.php` or the "Examples"-Section at the bottom of this document.

## insert()

Inserts data provided via `$db->data` or directly via the function.

Returns `true` on success, otherwise `false`.

### lastID()

After running `$db->insert()`, this function returns the ID of the lastly inserted Data.  

### Syntax

`insert($args = [])`

`$args` An array which contains the data to insert. Scheme: `['Spalte' => 'Daten']`

## update()

Updates already existing data in the database.

Returns `true` on success, otherwise `false`.

### Syntax

`update($where = [], $dataToUpdate = [], $link = 'AND')`

`$where` 
An array to update specific data. If provided, only data which matches is updated. Scheme: `['key' => 'value']`.
**If not provided, all data is updated!**
 
`$dataToUpdate` 
An array with data to update. Scheme: `['Spalte' => 'Neuer Inhalt']`

You can also provde the data via `$db->data['key'] = 'value'`.

`$link` 
If you provide more than one key, you can choose via this pararmeter how to connect them, currently via `AND` or `OR`. Standard is `AND`.

## delete()

Deletes data from the database.

Returns `true` on success, otherwise `false`.

### Syntax

`delete($where = [], $link = 'AND')`

`$where`
An array to update specific data. If provided, only data which matches is deleted. Scheme: `['key' => 'value']`.
**If not provided, all data is deleted!**

`$link`
If you provide more than one key, you can choose via this pararmeter how to connect them, currently via `AND` or `OR`. Standard is `AND`.

## clear()

Resets the current table and contents of `$db->data`. This function will be executed automatically if you execute `$db->setCol()`.

# Examples

## Getting Data

```php
`$db = new db('localhost', 'testdb', 'root', '123456789');`
`$db->setCol('blog');`
`$db->data['id'] = 3;`
`print_r($db->get());`
```

 _Or:_

```php 
 `$db = new db('localhost', 'testdb', 'root', '123456789');`
 `$db->setCol('blog');`
 `print_r($db->get(['id' => 3]));`
```
  
  Will return the same data.
  
## Insert Data

```php
`$db = new db('localhost', 'testdb', 'root', '123456789');`
`$db->setCol('blog');`
`$db->data['title'] = 'test';`
`$db->data['content'] = 'Lorem Ipsum...';`
`if($db->insert()) echo 'Data was inserted';`
```

 _Or:_
 
```php
 `$db = new db('localhost', 'testdb', 'root', '123456789');`
 `$db->setCol('blog');`
 `if($db->insert(['title' => 'test', 'content' => 'Lorem Ipsum...'])) echo 'Data was inserted';`
```
 
## Update Data

```php
`$db = new db('localhost', 'testdb', 'root', '123456789');`
`$db->setCol('blog');`
`$db->data['title'] = 'New';`
`$db->data['content'] = 'Lorem';`
`$db->update(['id' => 10]);`
```

 _Or:_

```php 
 `$db = new db('localhost', 'testdb', 'root', '123456789');`
 `$db->setCol('blog');`
 `if($db->update(['title' => 'New', 'content' => 'Lorem'], ['id' => 10])) echo 'Data was updated successfully.';`
```
 
## Delete Data

```php 
 `$db = new db('localhost', 'testdb', 'root', '123456789');`
 `$db->setCol('blog');`
 `$db->data['id'] = 9;`
 `if($db->delete()) echo 'Data was deleted successfully.';`
 ```
 
  _Or:_
  
 ```php
 `$db = new db('localhost', 'testdb', 'root', '123456789');`
 `$db->setCol('blog');`
 `if($db->delete(['id' => 9])) echo 'Data was deleted successfully.';`
 ```