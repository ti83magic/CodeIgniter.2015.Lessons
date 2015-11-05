<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Examples: Table</title>

    </head>
    <body>

        <div>
            <?php
            
            $links = array(array('examples/index','home'),array('examples/table','table'));
            echo breadcrumbs($links);
            
            echo heading('Examples: Table',1);          
            
            $this->table->setLevel(2);

            // ---------------------------------------------------------------------
            // Example 1
            echo heading('Example 1: Fully automatic',3);
            echo $this->table->create($people);

            // ---------------------------------------------------------------------
            // Example 2
            $headers = array('ID', 'First name', 'Last name', 'Married to'); 
                    
            echo heading('Example 2: Custom headers',3);
            echo $this->table->create($people, $headers);
            
            // ---------------------------------------------------------------------
            // Example 3
            $fields = array('name', 'surname', 'marriedTo->name'); 
            $headers = array('First name', 'Last name', 'Married to');
                    
            echo heading('Example 3: Custom headers and custom (nested) fields',3);
            echo $this->table->create($people, $headers, $fields);
            
            
            ?>

        </div>

    </body>
</html>