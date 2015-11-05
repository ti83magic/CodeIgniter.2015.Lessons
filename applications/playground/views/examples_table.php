<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Examples: Table</title>
        <?php echo link_tag('css/bootstrap.css'); ?>        
    </head>
    <body>

        <div class="container">
            <?php
            echo heading('Examples: Table', 1);

            $this->table->level = 3;

            // ---------------------------------------------------------------------
            // Example 1
            echo heading('Example 1: Fully automatic', 3);
            echo $this->table->create($people);

            // ---------------------------------------------------------------------
            // Example 2
            $headers = array('ID', 'First name', 'Last name', 'Married to');

            echo heading('Example 2: Custom headers', 3);
            echo $this->table->create($people, $headers);

            // ---------------------------------------------------------------------
            // Example 3
            $fields = array('name', 'surname', 'marriedTo->name');
            $headers = array('First name', 'Last name', 'Married to');

            echo heading('Example 3: Custom headers and custom (nested) fields', 3);
            echo $this->table->create($people, $headers, $fields);

            // ---------------------------------------------------------------------
            // Example 4
            $headers = array('Name', 'Married to');
            $this->table->class = 'table table-bordered';

            echo heading('Example 4: Constructed, with different markup', 3);

            echo $this->table->open($headers);
            foreach ($people as $person) {
                echo $this->table->rowOpen();
                echo $this->table->data($person->name . ' ' . $person->surname);
                echo $this->table->data(($person->marriedTo == null ? 'No one' : $person->marriedTo->name . ' ' . $person->marriedTo->surname));
                echo $this->table->rowClose();
            }
            echo $this->table->close();
            ?>

        </div>

    </body>
</html>