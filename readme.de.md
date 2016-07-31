#Datenbankklasse

Diese Datenbankklasse soll einen vereinfachten Umgang beim Arbeiten mit Datenbanken bieten. Dies wird dadurch erreicht, dass die oft umständlichen Funktionen in vier Hauptfunktionen gebündelt werden:

## Initialisieren

Zuerst muss eine Datenbankverbindung hergestellt werden:
`$db = new db('server', 'database', 'user', 'pass', 'prefix');`
Der letzte Pararmeter ist Optional. Wenn angegeben, wird er bei jedem Aufruf einer der Funktion vor den Tabellennamen gestellt.

Um anschließend die Methoden nutzen zu können, müssen wir noch sagen, um welche Tabelle es geht:
`$db->setCol('Blog');`

## Daten übergeben

Daten können bei allen Methoden entweder direkt als Pararmeter an die Funktion übergeben werden, oder aber vorher in `$db->data` mit den Selben Optionen deklariert werden. Die übergebenen Pararmeter haben höhere Priorität, d.h. wenn sowohl Parameter dirket an die Funktion übergeben werden als auch in `$db->data` Daten festgelegt werden, werden die Daten verwendet, die direkt übergeben wurden.

##get()

Diese Funktion wird dazu genutzt, Datensätze aus der Datenbank zu holen, sie gibt ein Array mit den Inhalten zurück.

Liefert ein Array mit den Daten zurück.

Wenn nur ein Datensatz gefunden wurde, wird dieser driekt zurückgegeben. Andernfalls werden die Datensätze als Einträge in einem Array zurückgegeben. Alle Daten sind immer in `$db->data` verfügbar. 

### Syntax

`$db->get($where = [], $link = 'AND')`

`$where` Ein Array, mit welchem Schlüsselwörter bennant und mit Werten befüllt werden können. Wenn vorhanden, werden nur die Werte zurückgegeben, auf welche die angegebenen Werte zutreffen. Schema: `['Spalte' => 'Wert']`
`$link` Wenn über `$where` mehr als ein Schlüssel übergeben wird, lässt sich über diesen Pararmeter die Art der Verknüpfung definieren. Standard ist 'AND'.

## insert()

Mit dieser Funktion können Daten in die Datenbank eingefügt werden.

Gibt `true` zurück, wenn die Daten erfolgreich eingefügt wurden. Andernfalls `false`.

### lastID()

Nachdem diese Funktion ausgeführt wurde, gibt die Funktion `lastID()` die ID des zuletzt eingefügten Datensatzes zurück.  

### Syntax

`insert($args = [])`

`$args` Ein Array, welches die Spalten mit dazugehörigen Daten enthält. Schema: `['Spalte' => 'Daten']`

## update()

Mit dieser Funktion werden bereits vorhandene Daten in der Datenbank geändert.

Gibt `true` zurück, wenn die Daten erfolgreich geändert wurden. Andernfalls `false`.

### Syntax

`update($where = [], $dataToUpdate = [], $link = 'AND')`

`$where` Ein Array, mit welchem Schlüsselwörter bennant und mit Werten befüllt werden können. Wenn vorhanden, werden nur die Datensätze geändert, auf welche die Schlüsselwörter und Werte zutreffen. **Ansonsten werden alle Datensätze in der Tabelle geändert!** Schema: `['Spalte' => 'Wert']`
`$dataToUpdate` Ein Array, der Daten, welche geändert werden sollen. Schema: `['Spalte' => 'Neuer Inhalt']`
`$link` Wenn über `$where` mehr als ein Schlüssel übergeben wird, lässt sich über diesen Pararmeter die Art der Verknüpfung definieren. Standard ist 'AND'.

## delete()

Mit dieser Funktion können Daten aus der Datenbank gelöscht werden.

Gibt `true` zurück, wenn die Daten erfolgreich geändert wurden. Andernfalls `false`.

### Syntax

`delete($where = [], $link = 'AND')`

`$where` Ein Array, mit welchem Schlüsselwörter bennant und mit Werten befüllt werden können. Wenn vorhanden, werden nur die Datensätze gelöscht, auf welche die Schlüsselwörter und Werte zutreffen. **Ansonsten werden alle Datensätze in der Tabelle gelöscht!** Schema: `['Spalte' => 'Wert']`
`$link` Wenn über `$where` mehr als ein Schlüssel übergeben wird, lässt sich über diesen Pararmeter die Art der Verknüpfung definieren. Standard ist 'AND'.

## clear()

Mit dieser Funktion wird die aktuelle Collection auf null gesetzt, damit kann man bequem auf eine andere Datenbank zugreifen.

# Beispiele

## Daten Holen

`$db = new db('localhost', 'testdeb', 'root', '123456789');`
`$db->setCol('blog');`
`$db->data['id'] = 3;`
`print_r($db->get());`
 
 _Oder:_
 
 `$db = new db('localhost', 'testdeb', 'root', '123456789');`
 `$db->setCol('blog');`
 `print_r($db->get(['id' => 3]));`
  
  Dies wird dieselben Daten zurückliefern.
  
## Daten einfügen

`$db = new db('localhost', 'testdeb', 'root', '123456789');`
`$db->setCol('blog');`
`$db->data['title'] = 'test';`
`$db->data['content'] = 'Lorem Ipsum...';`
`if($db->insert()) echo 'Daten wurden eingefügt';`

 _Oder:_
 
 `$db = new db('localhost', 'testdeb', 'root', '123456789');`
 `$db->setCol('blog');`
 `if($db->insert(['title' => 'test', 'content' => 'Lorem Ipsum...'])) echo 'Daten wurden eingefügt';`
 
## Daten Ändern

`$db = new db('localhost', 'testdeb', 'root', '123456789');`
`$db->setCol('blog');`
`$db->data['title'] = 'GAaanz Neu';`
`$db->data['content'] = 'gabs noch net';`
`$db->update(['id' => 10]);`

 _Oder:_
 
 `$db = new db('localhost', 'testdeb', 'root', '123456789');`
 `$db->setCol('blog');`
 `if($db->update(['title' => 'GAaanz Neu', 'content' => 'gabs noch net'], ['id' => 10])) echo 'Daten wurden erfolgreich geändert.';`
 
## Daten löschen
 
 `$db = new db('localhost', 'testdeb', 'root', '123456789');`
 `$db->setCol('blog');`
 `$db->data['id'] = 9;`
 `if($db->delete()) echo 'Daten wurden erfolgreich gelöscht';`
 
  _Oder:_
  
 `$db = new db('localhost', 'testdeb', 'root', '123456789');`
 `$db->setCol('blog');`
 `if($db->delete(['id' => 9])) echo 'Daten wurden erfolgreich gelöscht';`