# Cellr

## Details

An object for making CSV's from arrays. etc...

## Installing

Just include the object and use it as shown below.

## Usage

```php
    //instantiate cellr object
    $spreadsheet = new Cellr();
```

If you are using composer you can instantiate the class like so:

```php
    $spreadsheet = new DannyAllen\Cellr();
```

Add data via the construct.

```php
    //initial data
    $rows = [
        
        //row 1
        array('column 1', 'column 2', 'column 3', 'column 4'),
        
        //row 2
        array('a', 'b', 'c', 'd'),
    ];

    //instantiate
    $spreadsheet = new DannyAllen\Cellr($rows);
```

Add another row after instantation.

```php
    //row 3
    $more_data = array('green', 'blue', 'yellow', 'red');

    //add another row
    $spreadsheet->addRow($more_data);
```

Close the connection.

```php
    //we're done - close the connection
    $spreadsheet->close();
```

## Options

To do... sorry.